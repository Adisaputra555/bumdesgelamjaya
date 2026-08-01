<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Angsuran_model', 'Pinjaman_model', 'Anggota_model']);
        $this->load->helper(['form', 'url']);

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
        $data['title'] = 'Data Angsuran Terbaru';
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/angsuran', $data);
        $this->load->view('_partials/footer', $data);
    }

    public function get_all()
    {
        $search = $this->input->get('search');
        $data = $this->Angsuran_model->get_latest_per_pinjaman($search);

        foreach ($data as &$row) {
            $row['status'] = ($row['status'] == 'Lunas')
                ? '<span class="badge bg-success">Lunas</span>'
                : '<span class="badge bg-warning">Belum Lunas</span>';

            if (!empty($row['bukti_pembayaran']) && file_exists(FCPATH . 'uploads/bukti/' . basename($row['bukti_pembayaran']))) {
                $row['bukti_pembayaran'] = base_url('uploads/bukti/' . basename($row['bukti_pembayaran']));
            } else {
                $row['bukti_pembayaran'] = '';
            }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['data' => $data]));
    }

    public function store()
    {
        $pinjaman_id   = $this->input->post('pinjaman_id');
        $tanggal_bayar = $this->input->post('tanggal_bayar');

        if (!$pinjaman_id || !$tanggal_bayar) {
            echo json_encode(['success' => false, 'message' => 'Data angsuran tidak lengkap']);
            return;
        }

        $pinjaman = $this->Pinjaman_model->get_by_id($pinjaman_id);
        if (!$pinjaman) {
            echo json_encode(['success' => false, 'message' => 'Pinjaman tidak ditemukan']);
            return;
        }

        $jumlah_pinjam = floatval($pinjaman->jumlah_pinjam);
        $bunga         = floatval($pinjaman->bunga);  // persen per bulan
        $tenor         = intval($pinjaman->tenor);

        if ($tenor <= 0) {
            echo json_encode(['success' => false, 'message' => 'Tenor tidak valid']);
            return;
        }

        // Total pinjaman + bunga flat
        $total_pinjaman = $jumlah_pinjam + ($jumlah_pinjam * $bunga / 100 * $tenor);

        // Cicilan per bulan dibulatkan
        $cicilan_per_bulan = round($total_pinjaman / $tenor, 0);

        // Total sudah dibayar
        $total_dibayar = $this->Angsuran_model->get_total_bayar($pinjaman_id);

        // Hitung angsuran ke berikutnya berdasarkan jumlah angsuran yang sudah dibayar
        $angsuran_ke = $this->Angsuran_model->count_by_pinjaman($pinjaman_id) + 1;

        // Sisa pinjaman
        $sisa_pinjaman = $total_pinjaman - $total_dibayar;

        if ($sisa_pinjaman <= 0) {
            echo json_encode(['success' => false, 'status' => 'lunas', 'message' => 'Pinjaman sudah lunas']);
            return;
        }

        // Tentukan jumlah bayar angsuran ini
        if ($angsuran_ke < $tenor) {
            $jumlah_bayar = $cicilan_per_bulan;
        } else {
            // Angsuran terakhir = sisa pinjaman agar total tepat
            $jumlah_bayar = round($sisa_pinjaman, 0);
        }

        // Upload bukti pembayaran
        $bukti_file = null;
        if (!empty($_FILES['bukti_pembayaran']['name'])) {
            $config['upload_path']   = './uploads/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name']     = time() . '_' . $_FILES['bukti_pembayaran']['name'];
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_pembayaran')) {
                echo json_encode(['success' => false, 'message' => 'Gagal upload bukti: ' . $this->upload->display_errors('', '')]);
                return;
            }
            $bukti_file = $this->upload->data('file_name');
        }

        // Simpan angsuran
        $data = [
            'pinjaman_id'      => $pinjaman_id,
            'angsuran_ke'      => $angsuran_ke,
            'tanggal_bayar'    => $tanggal_bayar,
            'jumlah_bayar'     => $jumlah_bayar,
            'bukti_pembayaran' => $bukti_file,
            'deleted'          => 0,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $insert = $this->Angsuran_model->insert($data);

        // Update status lunas jika perlu
        if ($total_dibayar + $jumlah_bayar >= $total_pinjaman) {
            $this->Pinjaman_model->update_status($pinjaman_id, 'Lunas');
        }

        echo json_encode([
            'success' => $insert,
            'message' => $insert ? 'Angsuran berhasil disimpan' : 'Gagal menyimpan angsuran',
            'pinjaman_id' => $pinjaman_id,
            'angsuran_ke_berikutnya' => $angsuran_ke,
            'jumlah_per_angsuran' => $jumlah_bayar
        ]);
    }

    public function riwayat($anggota_id)
    {
        $data['anggota'] = $this->Anggota_model->get_by_id($anggota_id);
        $data['angsuran'] = $this->Angsuran_model->get_all_by_anggota($anggota_id);

        $data['title'] = 'Riwayat Angsuran';
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/angsuran_riwayat', $data);
        $this->load->view('_partials/footer', $data);
    }
}
