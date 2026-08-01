<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk menambahkan user baru
    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    // Fungsi untuk mendapatkan data user berdasarkan username (untuk login)
    public function check_login($username)
    {
        $query = $this->db->get_where('users', ['username' => $username]);
        return $query->row(); // Mengembalikan satu baris user (objek)
    }

    // Fungsi untuk mengecek apakah username sudah ada (opsional, bisa digunakan saat validasi tambahan)
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', ['username' => $username]);
        return $query->num_rows() > 0;
    }

}