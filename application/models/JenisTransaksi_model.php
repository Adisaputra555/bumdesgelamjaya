<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisTransaksi_model extends CI_Model
{
    protected $table = 'jenis_transaksi';

    public function get_all($keyword = null)
    {
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('nama_transaksi', $keyword);
            $this->db->or_like('tipe', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->group_end();
        }
        return $this->db->get($this->table)->result_array();  // bisa juga result() sesuai kebutuhan
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
