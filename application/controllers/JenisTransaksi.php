<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JenisTransaksi_model');

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

    public function index()
    {
        $data['title'] = 'Jenis Transaksi';
        $keyword = $this->input->get('keyword', TRUE);
        $data['JenisTransaksi'] = $this->JenisTransaksi_model->get_all($keyword);

        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/header', $data);
        $this->load->view('admin/jenis_transaksi', $data);
        $this->load->view('_partials/footer', $data);
    }

    public function get_all()
    {
        $keyword = $this->input->get('search'); // samakan dengan nama parameter di JS
        $data = $this->JenisTransaksi_model->get_all($keyword);
        echo json_encode($data);
    }

    public function store()
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $data = [
            'nama_transaksi' => $input['nama_transaksi'] ?? null,
            'tipe' => $input['tipe'] ?? null,
            'deskripsi' => $input['deskripsi'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = $this->JenisTransaksi_model->insert($data);
        echo json_encode(['success' => $result]);
    }

    public function update()
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $id = $input['id'] ?? null;
        $data = [
            'nama_transaksi' => $input['nama_transaksi'] ?? null,
            'tipe' => $input['tipe'] ?? null,
            'deskripsi' => $input['deskripsi'] ?? null,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $result = $this->JenisTransaksi_model->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    public function delete($id)
    {
        $result = $this->JenisTransaksi_model->delete($id);
        echo json_encode(['success' => $result]);
    }
}
