<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keuangan_model');
        $this->load->model('Usaha_model');
        $this->load->library('form_validation');

        // Middleware: hanya admin
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
        $data['title'] = 'Data Keuangan';
        $data['usaha'] = $this->Usaha_model->get_all();

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/keuangan', $data);
        $this->load->view('_partials/footer');
    }

    /**
     * API untuk ambil data keuangan berdasarkan bulan & tahun
     * Output JSON: pemasukan[], pengeluaran[], chart{}
     */
    public function get_data()
    {
        $month = (int)$this->input->get('month'); // 1-12
        $year  = (int)$this->input->get('year');  // contoh: 2025

        // Default jika month/year tidak valid
        if ($month < 1 || $month > 12 || $year < 2000) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'pemasukan'   => [],
                    'pengeluaran' => [],
                    'chart'       => [
                        'pemasukan'   => [],
                        'pengeluaran' => []
                    ]
                ]));
            return;
        }

        // Ambil data keuangan bulan & tahun ini
        $this->db->select('keuangan.*, IFNULL(usaha.nama_usaha, "-") as nama_usaha');
        $this->db->from('keuangan');
        $this->db->join('usaha', 'usaha.id = keuangan.usaha_id', 'left');
        $this->db->where('MONTH(keuangan.tanggal) =', $month, false);
        $this->db->where('YEAR(keuangan.tanggal) =', $year, false);
        $this->db->order_by('keuangan.tanggal', 'ASC');
        $result = $this->db->get()->result_array();

        $pemasukan   = [];
        $pengeluaran = [];

        foreach ($result as $row) {
            $row['jumlah']  = (float)$row['jumlah']; // pastikan float
            $row['tanggal'] = date('Y-m-d', strtotime($row['tanggal'])); // format uniform

            $jenis = strtolower(trim($row['jenis'])); // handle variasi kapitalisasi
            if ($jenis === 'pemasukan') {
                $pemasukan[] = $row;
            } elseif ($jenis === 'pengeluaran') {
                $pengeluaran[] = $row;
            }
        }

        // Buat array chart harian
        $daysInMonth      = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $chartPemasukan   = array_fill(0, $daysInMonth, 0);
        $chartPengeluaran = array_fill(0, $daysInMonth, 0);

        foreach ($pemasukan as $d) {
            $day = (int)date('j', strtotime($d['tanggal'])) - 1;
            if ($day >= 0 && $day < $daysInMonth) {
                $chartPemasukan[$day] += $d['jumlah'];
            }
        }

        foreach ($pengeluaran as $d) {
            $day = (int)date('j', strtotime($d['tanggal'])) - 1;
            if ($day >= 0 && $day < $daysInMonth) {
                $chartPengeluaran[$day] += $d['jumlah'];
            }
        }

        // Output JSON dengan header
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'pemasukan'   => $pemasukan,
                'pengeluaran' => $pengeluaran,
                'chart'       => [
                    'pemasukan'   => $chartPemasukan,
                    'pengeluaran' => $chartPengeluaran
                ]
            ]));
    }

    public function store()
    {
        $jenis = $this->input->post('jenis');
        $usaha_id = $this->input->post('usaha_id');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        if (!$usaha_id || !$tanggal || !$jumlah) {
            echo json_encode(['success' => false, 'message' => 'Data wajib diisi']);
            return;
        }

        $data = [
            'jenis' => $jenis,
            'usaha_id' => $usaha_id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        ];

        $insert = $this->Keuangan_model->insert($data);

        if ($insert) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Data tidak ditemukan']);
        }
    }


    public function update()
    {
        $id = $this->input->post('id');
        $usaha_id = $this->input->post('usaha_id');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        if (!$id || !$usaha_id || !$tanggal || !$jumlah) {
            echo json_encode(['success' => false, 'message' => 'Data wajib diisi']);
            return;
        }

        $data = [
            'usaha_id' => $usaha_id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        ];

        $update = $this->Keuangan_model->update($id, $data);

        if ($update) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Data tidak ditemukan']);
        }
    }


    public function delete()
    {
        $id = $this->input->post('id');
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID tidak ditemukan!']);
            return;
        }

        $deleted = $this->Keuangan_model->delete($id);

        if ($deleted) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Data gagal dihapus!']);
        }
    }
}
