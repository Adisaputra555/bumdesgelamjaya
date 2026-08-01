<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        // Middleware: hanya admin yang dapat mengakses
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Manajemen Pengguna';
        $keyword = $this->input->get('keyword', TRUE);
        $data['users'] = $this->User_model->get_all($keyword);

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('_partials/footer', $data);
    }

    public function get_all()
    {
        $keyword = $this->input->get('search'); // pakai parameter 'search' untuk pencarian dari JS
        $data = $this->User_model->get_all($keyword);
        echo json_encode($data);
    }


    public function store()
    {
        $data = $this->input->post();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        if ($this->User_model->insert($data)) {
            $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan pengguna.');
        }
        redirect('user');
    }


    public function update($id)
    {
        // Ambil data dari form
        $data = $this->input->post();

        // Jika password tidak diisi, hapus dari array data
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            // Hash password jika diisi
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        // Update data di database
        if ($this->User_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Pengguna berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui pengguna.');
        }

        // Redirect kembali ke halaman user
        redirect('User');
    }

    public function delete($id)
    {
        if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
        }
        redirect('user');
    }
}
