<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function get_all($keyword = null)
    {
        $this->db->select('id, username, email, role, is_active, created_at');
        $this->db->from($this->table);

        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('username', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('role', $keyword);
            $this->db->group_end();
        }

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
