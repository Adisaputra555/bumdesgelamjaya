<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usaha extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usaha_model'); // Memuat model

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
        $data['title'] = 'Usaha';
        $keyword = $this->input->get('keyword', TRUE);
        $data['usaha'] = $this->Usaha_model->get_all($keyword); // ubah jadi huruf kecil

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/usaha', $data);
        $this->load->view('_partials/footer', $data);
    }


    public function get_all()
    {
        $keyword = $this->input->get('search'); // Ambil kata kunci pencarian dari parameter GET
        $this->db->select('*');
        $this->db->from('usaha');

        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('nama_usaha', $keyword);
            $this->db->or_like('jenis', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->group_end();
        }

        $query = $this->db->get();
        echo json_encode($query->result()); // Kembalikan hasil pencarian dalam format JSON
    }

    public function store()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $data = [
            'nama_usaha' => $input['nama_usaha'],
            'jenis' => $input['jenis'],
            'deskripsi' => $input['deskripsi'],
            'modal_awal' => $input['modal_awal'],
            'status' => $input['status'],
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $result = $this->Usaha_model->insert($data);
        echo json_encode(['success' => $result]);
    }


    public function update()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $data = [
            'nama_usaha' => $input['nama_usaha'],
            'jenis' => $input['jenis'],
            'deskripsi' => $input['deskripsi'],
            'modal_awal' => $input['modal_awal'],
            'status' => $input['status'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = $this->Usaha_model->update($id, $data);
        echo json_encode(['success' => $result]);
    }


    public function delete($id)
    {
        $result = $this->Usaha_model->delete($id);
        echo json_encode(['success' => $result]);
    }
}
