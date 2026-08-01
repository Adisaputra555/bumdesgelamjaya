<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman_model extends CI_Model
{
    private $table = 'pinjaman';

    /**
     * Ambil semua pinjaman + nama anggota + saldo tersisa
     */
    public function get_all()
    {
        $this->db->select('p.*, ag.nama as nama_anggota, p.created_at,
        ((p.jumlah_pinjam + (p.jumlah_pinjam * p.bunga / 100)) / p.tenor) * p.tenor
        - IFNULL(SUM(a.jumlah_bayar),0) as sisa_saldo,
        ((p.jumlah_pinjam + (p.jumlah_pinjam * p.bunga / 100)) / p.tenor) as cicilan_per_bulan');
        $this->db->from('pinjaman p');
        $this->db->join('anggota ag', 'ag.id = p.anggota_id', 'left');
        $this->db->join('angsuran a', 'a.pinjaman_id = p.id', 'left');
        $this->db->where('p.deleted', 0);
        $this->db->group_by('p.id');
        $this->db->order_by('p.created_at', 'DESC');
        return $this->db->get()->result();
    }


    /**
     * Insert pinjaman baru
     */
    public function insert($data)
    {
        $data['status'] = 'Belum Lunas'; // default status
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['deleted'] = 0;

        return $this->db->insert($this->table, $data);
    }

    /**
     * Update status pinjaman
     */
    public function update_status($id, $status)
    {
        return $this->db->where('id', $id)
            ->update($this->table, [
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }

    /**
     * Soft delete pinjaman
     */
    public function soft_delete($id)
    {
        return $this->db->where('id', $id)
            ->update($this->table, [
                'deleted' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }

    /**
     * Ambil pinjaman by ID + saldo tersisa
     */
    public function get_by_id($id)
    {
        $this->db->select('p.*, ag.nama as nama_anggota, p.created_at,
        ((p.jumlah_pinjam + (p.jumlah_pinjam * p.bunga / 100 * p.tenor)) - IFNULL(SUM(a.jumlah_bayar),0)) as sisa_saldo,
        ((p.jumlah_pinjam + (p.jumlah_pinjam * p.bunga / 100 * p.tenor)) / p.tenor) as cicilan_per_bulan');
        $this->db->from('pinjaman p');
        $this->db->join('anggota ag', 'ag.id = p.anggota_id', 'left');
        $this->db->join('angsuran a', 'a.pinjaman_id = p.id AND a.deleted = 0', 'left');
        $this->db->where('p.id', $id);
        $this->db->group_by('p.id');
        return $this->db->get()->row();
    }

    /**
     * Ambil total dibayar per pinjaman
     */
    public function get_total_dibayar($pinjaman_id)
    {
        $row = $this->db->select_sum('jumlah_bayar')
            ->where('pinjaman_id', $pinjaman_id)
            ->where('deleted', 0)
            ->get('angsuran')
            ->row_array();

        return floatval($row['jumlah_bayar'] ?? 0);
    }
}
