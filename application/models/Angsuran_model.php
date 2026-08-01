<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran_model extends CI_Model
{
    private $table = 'angsuran';

    // Ambil angsuran terakhir per pinjaman beserta status lunas
    public function get_latest_per_pinjaman($search = '')
    {
        $this->db->select('p.id AS pinjaman_id, p.anggota_id, p.jumlah_pinjam, p.bunga, p.tenor, ag.nama AS nama_anggota');
        $this->db->from('pinjaman p');
        $this->db->join('anggota ag', 'p.anggota_id = ag.id');
        $this->db->where('p.deleted', 0);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('ag.nama', $search);
            $this->db->or_like('p.id', $search);
            $this->db->group_end();
        }

        $pinjaman_list = $this->db->order_by('p.created_at', 'DESC')->get()->result_array();
        $data = [];

        foreach ($pinjaman_list as $pinjaman) {
            // Ambil semua angsuran untuk pinjaman ini
            $angsuran_all = $this->db->where('pinjaman_id', $pinjaman['pinjaman_id'])
                ->where('deleted', 0)
                ->order_by('angsuran_ke', 'DESC')
                ->get($this->table)
                ->result_array();

            $latest_angsuran = $angsuran_all[0] ?? null;

            // Hitung total pinjaman + bunga flat (sesuai tenor)
            $jumlah_pinjam  = floatval($pinjaman['jumlah_pinjam']);
            $bunga          = floatval($pinjaman['bunga']);
            $tenor          = intval($pinjaman['tenor']);
            $total_pinjaman = $jumlah_pinjam + ($jumlah_pinjam * $bunga / 100 * $tenor);

            // Total sudah dibayar
            $total_bayar = $this->get_total_bayar($pinjaman['pinjaman_id']);
            $sisa = max(0, $total_pinjaman - $total_bayar);

            $status_badge = ($sisa <= 0)
                ? '<span class="badge bg-success">Lunas</span>'
                : '<span class="badge bg-warning">Belum Lunas</span>';

            // Ambil bukti terakhir yang ada
            $latest_bukti = null;
            foreach ($angsuran_all as $a) {
                if (!empty($a['bukti_pembayaran'])) {
                    $latest_bukti = $a['bukti_pembayaran'];
                    break;
                }
            }
            $buktiUrl = $latest_bukti ? base_url('uploads/bukti/' . $latest_bukti) : null;

            $data[] = [
                'id'               => $pinjaman['pinjaman_id'],
                'anggota_id'       => $pinjaman['anggota_id'],
                'nama_anggota'     => $pinjaman['nama_anggota'] ?? '-',
                'angsuran_ke'      => $latest_angsuran['angsuran_ke'] ?? 0,
                'jumlah_bayar'     => $latest_angsuran['jumlah_bayar'] ?? 0,
                'tanggal_bayar'    => $latest_angsuran['tanggal_bayar'] ?? '-',
                'bukti_pembayaran' => $buktiUrl,
                'sisa_pinjaman'    => 'Rp ' . number_format($sisa, 0, ',', '.'),
                'status'           => $status_badge
            ];
        }

        return $data;
    }

    // Ambil angsuran terakhir per pinjaman (untuk store)
    public function get_latest_by_pinjaman($pinjaman_id)
    {
        return $this->db->where('pinjaman_id', $pinjaman_id)
            ->where('deleted', 0)
            ->order_by('angsuran_ke', 'DESC') // lebih konsisten dengan angsuran_ke
            ->limit(1)
            ->get($this->table)
            ->row();
    }

    // Total bayar per pinjaman
    public function get_total_bayar($pinjaman_id)
    {
        $this->db->select_sum('jumlah_bayar');
        $this->db->from($this->table);
        $this->db->where('pinjaman_id', $pinjaman_id);
        $this->db->where('deleted', 0);
        $row = $this->db->get()->row_array();
        return floatval($row['jumlah_bayar'] ?? 0);
    }

    // Hitung jumlah angsuran yang sudah dibayar untuk angsuran_ke berikutnya
    public function count_by_pinjaman($pinjaman_id)
    {
        $this->db->where('pinjaman_id', $pinjaman_id);
        $this->db->where('deleted', 0);
        return $this->db->count_all_results($this->table);
    }

    // Insert angsuran baru
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Ambil semua angsuran per anggota (riwayat)
    // Ambil semua angsuran per anggota (riwayat)
    public function get_all_by_anggota($anggota_id)
    {
        $this->db->select('a.*, p.jumlah_pinjam, p.bunga, p.tenor');
        $this->db->from('angsuran a');
        $this->db->join('pinjaman p', 'a.pinjaman_id = p.id');
        $this->db->where('p.anggota_id', $anggota_id);
        $this->db->where('a.deleted', 0);
        $this->db->order_by('a.angsuran_ke', 'ASC');

        $result = $this->db->get()->result_array();
        foreach ($result as &$row) {
            $row['jumlah_bayar'] = floatval($row['jumlah_bayar']);
            // Sisa pinjaman bisa tetap dihitung, tapi status di riwayat harus Lunas
            $row['status'] = 'Lunas'; // **Perubahan utama**
        }

        return $result;
    }
}
