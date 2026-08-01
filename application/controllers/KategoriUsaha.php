<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriUsaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriUsaha_model');

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
        $data['title'] = 'Kategori Usaha';
        $keyword = $this->input->get('keyword', TRUE);
        $data['Kategori Usaha'] = $this->KategoriUsaha_model->get_all($keyword);

        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/header', $data);
        $this->load->view('admin/kategori_usaha', $data);
        $this->load->view('_partials/footer', $data);
    }

    public function get_all()
    {
        $keyword = $this->input->get('keyword');
        $this->db->select('*');
        $this->db->from('kategori_usaha');

        if (!empty($keyword)) {
            $this->db->like('nama_kategori', $keyword);
            $this->db->or_like('deskripsi', $keyword);
        }

        $query = $this->db->get();
        echo json_encode($query->result(), JSON_UNESCAPED_UNICODE);
    }


    public function store()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Data tidak valid.']));
            return;
        }

        $data = [
            'nama_kategori' => $input['nama_kategori'] ?? '',
            'deskripsi' => $input['deskripsi'] ?? '',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = $this->KategoriUsaha_model->insert($data);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => $result,
                'message' => $result ? 'Data berhasil ditambahkan.' : 'Gagal menambahkan data.'
            ]));
    }

    public function update()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input || !isset($input['id'])) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Data tidak valid.']));
            return;
        }

        $id = $input['id'];
        $data = [
            'nama_kategori' => $input['nama_kategori'] ?? '',
            'deskripsi' => $input['deskripsi'] ?? '',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $result = $this->KategoriUsaha_model->update($id, $data);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => $result,
                'message' => $result ? 'Data berhasil diperbarui.' : 'Gagal memperbarui data.'
            ]));
    }

    public function delete($id)
    {
        $result = $this->KategoriUsaha_model->delete($id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => $result,
                'message' => $result ? 'Data berhasil dihapus.' : 'Gagal menghapus data.'
            ]));
    }
}
