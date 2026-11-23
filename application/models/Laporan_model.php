<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function get_keuangan()
    {
        return $this->db->order_by('tanggal', 'DESC')->get('keuangan')->result();
    }

    public function get_pinjaman()
    {
        $sql = "
            SELECT 
                p.*, 
                a.nama, 
                a.alamat, 
                a.no_hp,
                (
                    SELECT SUM(jumlah_bayar) 
                    FROM angsuran 
                    WHERE pinjaman_id = p.id AND deleted = 0
                ) AS total_angsuran
            FROM pinjaman p
            JOIN anggota a ON a.id = p.anggota_id
            WHERE p.deleted = 0
            ORDER BY p.tanggal_pinjam DESC
        ";
        return $this->db->query($sql)->result();
    }

    public function get_angsuran()
    {
        $sql = "
            SELECT an.*, p.jumlah_pinjam, a.nama
            FROM angsuran an
            JOIN pinjaman p ON p.id = an.pinjaman_id
            JOIN anggota a ON a.id = p.anggota_id
            WHERE an.deleted = 0
            ORDER BY an.tanggal_bayar DESC
        ";
        return $this->db->query($sql)->result();
    }
    public function get_total_keuangan($jenis, $start, $end)
    {
        return $this->db->select_sum('jumlah')
            ->where('jenis', $jenis)
            ->where('tanggal >=', $start)
            ->where('tanggal <=', $end)
            ->get('keuangan')->row()->jumlah ?? 0;
    }

    public function get_total_pinjaman($start, $end)
    {
        return $this->db->select_sum('jumlah_pinjam')
            ->where('deleted', 0)
            ->where('tanggal_pinjam >=', $start)
            ->where('tanggal_pinjam <=', $end)
            ->get('pinjaman')->row()->jumlah_pinjam ?? 0;
    }

    public function get_report_summary($awal, $akhir)
    {
        $akhir_exclusive = date('Y-m-d', strtotime($akhir . ' +1 day'));

        $keuangan = $this->db
            ->select("COUNT(*) AS jumlah, COALESCE(SUM(CASE WHEN jenis = 'pemasukan' THEN jumlah ELSE 0 END), 0) AS pemasukan, COALESCE(SUM(CASE WHEN jenis = 'pengeluaran' THEN jumlah ELSE 0 END), 0) AS pengeluaran", false)
            ->where('tanggal >=', $awal)
            ->where('tanggal <', $akhir_exclusive)
            ->get('keuangan')
            ->row_array();

        $pinjaman = $this->db
            ->select('COUNT(*) AS jumlah, COALESCE(SUM(jumlah_pinjam), 0) AS total_pokok', false)
            ->where('deleted', 0)
            ->where('tanggal_pinjam >=', $awal)
            ->where('tanggal_pinjam <', $akhir_exclusive)
            ->get('pinjaman')
            ->row_array();

        $angsuran = $this->db
            ->select('COUNT(*) AS jumlah, COALESCE(SUM(angsuran.jumlah_bayar), 0) AS total_dibayar', false)
            ->from('angsuran')
            ->join('pinjaman', 'pinjaman.id = angsuran.pinjaman_id')
            ->where('angsuran.deleted', 0)
            ->where('pinjaman.deleted', 0)
            ->where('angsuran.tanggal_bayar >=', $awal)
            ->where('angsuran.tanggal_bayar <', $akhir_exclusive)
            ->get()
            ->row_array();

        $latest_keuangan = $this->db
            ->select_max('tanggal')
            ->where('tanggal >=', $awal)
            ->where('tanggal <', $akhir_exclusive)
            ->get('keuangan')
            ->row()
            ->tanggal;

        $latest_pinjaman = $this->db
            ->select_max('tanggal_pinjam')
            ->where('deleted', 0)
            ->where('tanggal_pinjam >=', $awal)
            ->where('tanggal_pinjam <', $akhir_exclusive)
            ->get('pinjaman')
            ->row()
            ->tanggal_pinjam;

        $latest_angsuran = $this->db
            ->select_max('angsuran.tanggal_bayar')
            ->from('angsuran')
            ->join('pinjaman', 'pinjaman.id = angsuran.pinjaman_id')
            ->where('angsuran.deleted', 0)
            ->where('pinjaman.deleted', 0)
            ->where('angsuran.tanggal_bayar >=', $awal)
            ->where('angsuran.tanggal_bayar <', $akhir_exclusive)
            ->get()
            ->row()
            ->tanggal_bayar;

        $latest_dates = array_filter([$latest_keuangan, $latest_pinjaman, $latest_angsuran]);
        $latest_activity = $latest_dates ? max($latest_dates) : null;
        $jumlah_catatan = intval($keuangan['jumlah']) + intval($pinjaman['jumlah']) + intval($angsuran['jumlah']);

        return [
            'jumlah_catatan' => $jumlah_catatan,
            'terakhir_dicatat' => $latest_activity,
            'keuangan' => [
                'jumlah' => intval($keuangan['jumlah']),
                'pemasukan' => floatval($keuangan['pemasukan']),
                'pengeluaran' => floatval($keuangan['pengeluaran']),
                'selisih' => floatval($keuangan['pemasukan']) - floatval($keuangan['pengeluaran'])
            ],
            'pinjaman' => [
                'jumlah' => intval($pinjaman['jumlah']),
                'total_pokok' => floatval($pinjaman['total_pokok'])
            ],
            'angsuran' => [
                'jumlah' => intval($angsuran['jumlah']),
                'total_dibayar' => floatval($angsuran['total_dibayar'])
            ]
        ];
    }

    public function get_keuangan_filter($awal = null, $akhir = null)
    {
        $this->db->select('keuangan.*, usaha.nama_usaha')
            ->from('keuangan')
            ->join('usaha', 'usaha.id = keuangan.usaha_id', 'left');

        if ($awal) {
            $this->db->where('keuangan.tanggal >=', $awal);
        }
        if ($akhir) {
            $this->db->where('keuangan.tanggal <', date('Y-m-d', strtotime($akhir . ' +1 day')));
        }
        return $this->db->order_by('keuangan.tanggal', 'DESC')->get()->result();
    }

    public function get_pinjaman_filter($awal = null, $akhir = null)
    {
        $this->db->select('p.*, a.nama, a.alamat, (SELECT SUM(jumlah_bayar) FROM angsuran WHERE pinjaman_id = p.id AND deleted = 0) AS total_angsuran', false)
            ->from('pinjaman p')
            ->join('anggota a', 'a.id = p.anggota_id')
            ->where('p.deleted', 0);

        if ($awal) {
            $this->db->where('p.tanggal_pinjam >=', $awal);
        }
        if ($akhir) {
            $this->db->where('p.tanggal_pinjam <', date('Y-m-d', strtotime($akhir . ' +1 day')));
        }
        return $this->db->order_by('p.tanggal_pinjam', 'DESC')->get()->result();
    }

    public function get_angsuran_filter($awal = null, $akhir = null)
    {
        $this->db->select('an.*, p.id AS pinjaman_id, a.nama')
            ->from('angsuran an')
            ->join('pinjaman p', 'p.id = an.pinjaman_id')
            ->join('anggota a', 'a.id = p.anggota_id')
            ->where('an.deleted', 0)
            ->where('p.deleted', 0);

        if ($awal) {
            $this->db->where('an.tanggal_bayar >=', $awal);
        }
        if ($akhir) {
            $this->db->where('an.tanggal_bayar <', date('Y-m-d', strtotime($akhir . ' +1 day')));
        }
        return $this->db->order_by('an.tanggal_bayar', 'DESC')->get()->result();
    }
}
