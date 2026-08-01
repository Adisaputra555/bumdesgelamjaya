<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');

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

    // Halaman utama anggota

 public function index()
{
    $data['title'] = 'Data Anggota';
    $keyword = $this->input->get('keyword', TRUE);
    $data['anggota'] = $this->Anggota_model->get_all_filtered($keyword);

    $this->load->view('_partials/header', $data);     // pertama: header
    $this->load->view('_partials/sidebar', $data);    // kedua: sidebar
    $this->load->view('admin/anggota', $data);        // ketiga: konten utama
    $this->load->view('_partials/footer', $data);     // terakhir: footer
}


    // API: Mengambil semua data anggota (JSON)
    public function get_all()
    {
        header('Content-Type: application/json');
        $keyword = $this->input->get('keyword', TRUE);
        $anggota = $this->Anggota_model->get_all_filtered($keyword);
        echo json_encode($anggota);
    }

    // API: Menambahkan anggota baru (JSON)
    public function store()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Data tidak valid.']);
            return;
        }

        // Validasi input
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|is_unique[anggota.no_hp]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.email]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[aktif,nonaktif]');

        if ($this->form_validation->run() === FALSE) {
            http_response_code(422); // Unprocessable Entity
            echo json_encode(['success' => false, 'message' => validation_errors()]);
            return;
        }

        // Simpan ke database
        if ($this->Anggota_model->insert($data)) {
            http_response_code(201);
            echo json_encode(['success' => true, 'message' => 'Anggota berhasil ditambahkan.']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data ke database.']);
        }
    }

    public function update()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        // Validasi data
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('id', 'ID', 'required|integer');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[aktif,nonaktif]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['success' => false, 'message' => validation_errors()]);
            return;
        }

        // Update data di database
        $this->db->where('id', $data['id']);
        $this->db->update('anggota', $data);
        echo json_encode(['success' => true, 'message' => 'Anggota berhasil diperbarui.']);
    }

    // API: Menghapus anggota berdasarkan ID
    public function delete($id)
    {
        header('Content-Type: application/json');

        if (!$id) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'ID tidak valid.']);
            return;
        }

        if ($this->Anggota_model->delete_by_id($id)) {
            echo json_encode(['success' => true, 'message' => 'Anggota berhasil dihapus.']);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Anggota tidak ditemukan.']);
        }
    }
}
