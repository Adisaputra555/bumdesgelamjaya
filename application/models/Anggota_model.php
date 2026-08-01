<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    // Ambil semua data anggota tanpa filter
    public function get_all()
    {
        return $this->db->get('anggota')->result();
    }

    // Ambil semua data anggota dengan filter nama/email/no_hp (opsional)
    public function get_all_filtered($keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('nama', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('no_hp', $keyword);
            $this->db->group_end();
        }

        return $this->db->get('anggota')->result();
    }

    // Cari anggota berdasarkan nama
    public function search_by_name($keyword)
    {
        $this->db->like('nama', $keyword);
        return $this->db->get('anggota')->result();
    }

    // Ambil data berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('anggota', ['id' => $id])->row();
    }

    // Simpan data baru ke tabel anggota
    public function insert($data)
    {
        $insert = $this->db->insert('anggota', $data);
        if ($insert) {
            log_message('info', 'Anggota ditambahkan: ' . json_encode($data));
            return true;
        } else {
            log_message('error', 'Gagal menambahkan anggota: ' . $this->db->error()['message']);
            return false;
        }
    }

    // Perbarui data anggota berdasarkan ID
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('anggota', $data);

        if ($update) {
            log_message('info', 'Anggota diperbarui (ID: ' . $id . '): ' . json_encode($data));
            return true;
        } else {
            log_message('error', 'Gagal memperbarui anggota ID ' . $id . ': ' . $this->db->error()['message']);
            return false;
        }
    }

    // Hapus data anggota berdasarkan ID
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('anggota');
        return $this->db->affected_rows() > 0;
    }
   
}
