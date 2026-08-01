<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }

        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
            redirect('dashboard');
        }

        $this->load->model([
            'Dashboard_model',
            'Pinjaman_model',
            'Anggota_model',
            'Keuangan_model',
            'Angsuran_model'
        ]);
    }

    // Halaman dashboard
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['total_anggota'] = $this->Dashboard_model->get_total_anggota();
        $data['total_pinjaman_belum_lunas'] = $this->Dashboard_model->get_total_pinjaman_belum_lunas();
        $data['saldo'] = $this->Dashboard_model->get_saldo(); // saldo real-time
        $data['total_pemasukan'] = $this->Dashboard_model->get_total_pemasukan();
        $data['total_pengeluaran'] = $this->Dashboard_model->get_total_pengeluaran();


        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('_partials/footer', $data);
    }

    // Endpoint AJAX untuk saldo real-time
    public function get_saldo_ajax()
    {
        $saldo = $this->Dashboard_model->get_saldo();
        echo json_encode([
            'status' => true,
            'saldo' => number_format($saldo, 0, ',', '.')
        ]);
    }

    // Endpoint AJAX untuk total bunga minggu ini
    public function get_total_bunga_mingguan()
    {
        $tanggal_sekarang = date('Y-m-d');
        $tanggal_seminggu = date('Y-m-d', strtotime('-7 days'));

        $this->db->select('a.jumlah_bayar, p.jumlah_pinjam, p.bunga');
        $this->db->from('angsuran a');
        $this->db->join('pinjaman p', 'a.pinjaman_id = p.id');
        $this->db->where('a.tanggal_bayar >=', $tanggal_seminggu);
        $this->db->where('a.tanggal_bayar <=', $tanggal_sekarang);
        $this->db->where('a.deleted', 0);
        $angsuran = $this->db->get()->result();

        $total_bunga = 0;

        foreach ($angsuran as $a) {
            $jumlah_pinjam = floatval($a->jumlah_pinjam);
            $bunga_persen = floatval($a->bunga);
            $jumlah_bayar = floatval($a->jumlah_bayar);

            // Hitung bunga proporsional berdasarkan jumlah bayar
            $bunga = $jumlah_pinjam * $bunga_persen / 100;
            $proporsi_bunga = min($jumlah_bayar, $bunga);
            $total_bunga += $proporsi_bunga;
        }

        echo json_encode([
            'status' => true,
            'total_bunga' => round($total_bunga)
        ]);
    }

    // Total Pemasukan dari tabel keuangan saja
    public function get_total_pemasukan_ajax()
    {
        $total = $this->Dashboard_model->get_total_pemasukan();
        echo json_encode([
            'status' => true,
            'total_pemasukan' => number_format($total, 0, ',', '.')
        ]);
    }

    public function get_total_pengeluaran_ajax()
    {
        $total = $this->Dashboard_model->get_total_pengeluaran();
        echo json_encode([
            'status' => true,
            'total_pengeluaran' => number_format($total, 0, ',', '.')
        ]);
    }




    // Grafik pinjaman per tanggal (termasuk pinjaman lunas yang sudah di-soft delete)
    public function get_grafik_pinjaman()
    {
        $this->db->select('p.tanggal_pinjam, p.jumlah_pinjam, p.bunga, p.tenor, 
                       IFNULL(SUM(a.jumlah_bayar),0) as total_dibayar');
        $this->db->from('pinjaman p');
        $this->db->join('angsuran a', 'a.pinjaman_id = p.id', 'left');
        $this->db->where('p.deleted', 0); // ambil semua pinjaman aktif
        $this->db->group_by('p.id');
        $pinjaman = $this->db->get()->result();

        $grafik = [];
        foreach ($pinjaman as $p) {
            $tanggal = $p->tanggal_pinjam ?? date('Y-m-d');
            $pokok = floatval($p->jumlah_pinjam ?? 0);
            $bunga = floatval($p->bunga ?? 0);
            $total_harus_bayar = $pokok + ($pokok * $bunga / 100);
            $dibayar = floatval($p->total_dibayar ?? 0);

            if (!isset($grafik[$tanggal])) {
                $grafik[$tanggal] = ['dibayar' => 0, 'belum_dibayar' => 0];
            }

            $grafik[$tanggal]['dibayar'] += $dibayar;
            $grafik[$tanggal]['belum_dibayar'] += max(0, $total_harus_bayar - $dibayar);
        }

        $categories = array_keys($grafik);
        $dibayar = [];
        $belum_dibayar = [];
        foreach ($categories as $tanggal) {
            $dibayar[] = $grafik[$tanggal]['dibayar'];
            $belum_dibayar[] = $grafik[$tanggal]['belum_dibayar'];
        }

        echo json_encode([
            'categories' => $categories,
            'dibayar' => $dibayar,
            'belum_dibayar' => $belum_dibayar
        ]);
    }


    // Grafik laba pinjaman per bulan (termasuk soft deleted)
    public function get_grafik_bunga_per_bulan()
    {
        $this->db->select("DATE_FORMAT(a.tanggal_bayar, '%Y-%m') as bulan,
                       SUM(LEAST(a.jumlah_bayar, p.jumlah_pinjam * p.bunga / 100)) as total_bunga");
        $this->db->from('angsuran a');
        $this->db->join('pinjaman p', 'a.pinjaman_id = p.id');
        $this->db->group_by("DATE_FORMAT(a.tanggal_bayar, '%Y-%m')");
        $this->db->order_by("DATE_FORMAT(a.tanggal_bayar, '%Y-%m')");
        $result = $this->db->get()->result();

        $categories = [];
        $values = [];

        foreach ($result as $r) {
            $categories[] = $r->bulan;
            $values[] = floatval($r->total_bunga ?? 0);
        }

        echo json_encode([
            'categories' => $categories,
            'values' => $values
        ]);
    }
}
