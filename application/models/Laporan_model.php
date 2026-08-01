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

    public function get_keuangan_filter($awal = null, $akhir = null)
    {
        if ($awal && $akhir) {
            $this->db->where('tanggal >=', $awal);
            $this->db->where('tanggal <=', $akhir);
        }
        return $this->db->order_by('tanggal', 'DESC')->get('keuangan')->result();
    }

    public function get_pinjaman_filter($awal = null, $akhir = null)
    {
        $sql = "
        SELECT p.*, a.nama,
            (SELECT SUM(jumlah_bayar) FROM angsuran WHERE pinjaman_id = p.id AND deleted = 0) AS total_angsuran
        FROM pinjaman p
        JOIN anggota a ON a.id = p.anggota_id
        WHERE p.deleted = 0
    ";
        if ($awal && $akhir) {
            $sql .= " AND p.tanggal_pinjam BETWEEN '$awal' AND '$akhir'";
        }
        $sql .= " ORDER BY p.tanggal_pinjam DESC";
        return $this->db->query($sql)->result();
    }

    public function get_angsuran_filter($awal = null, $akhir = null)
    {
        $sql = "
        SELECT an.*, a.nama 
        FROM angsuran an
        JOIN pinjaman p ON p.id = an.pinjaman_id
        JOIN anggota a ON a.id = p.anggota_id
        WHERE an.deleted = 0
    ";
        if ($awal && $akhir) {
            $sql .= " AND an.tanggal_bayar BETWEEN '$awal' AND '$akhir'";
        }
        $sql .= " ORDER BY an.tanggal_bayar DESC";
        return $this->db->query($sql)->result();
    }
}
