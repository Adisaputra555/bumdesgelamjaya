<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); // Redirect ke halaman login jika belum login
        }

        // Middleware: hanya admin yang dapat mengakses controller ini
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }

        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
            redirect('dashboard');
        }
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['username'] = $this->session->userdata('username'); // Ambil username dari session
        $data['role'] = $this->session->userdata('role'); // Ambil role dari session

        // Langsung memuat file views/admin/index.php

        $this->load->view('admin/index', $data);
    }

    public function anggota()
    {
        $this->load->model('Anggota_model'); // Load model anggota
        $data['title'] = 'Data Anggota';
        $data['anggota'] = $this->Anggota_model->get_all(); // Ambil semua data anggota
        $this->load->view('admin/anggota', $data); // Muat file view anggota.php
    }

    public function angsuran()
    {

        $this->load->model('Angsuran_model'); // Load model angsuran
        $data['title'] = 'Data Angsuran'; // ✅ Tambahkan title
        $data['angsuran'] = $this->Angsuran_model->get_all();
        $this->load->view('admin/angsuran', $data);
    }
}
