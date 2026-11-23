<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Anggota_model',
            'Pinjaman_model',
            'Angsuran_model',
            'Keuangan_model'
        ]);

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
        $data['title']   = 'Transaksi Pinjaman';
        $data['anggota'] = $this->Anggota_model->get_all();
        $data['saldo']   = $this->calculate_saldo_tersedia();

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/pinjaman', $data);
        $this->load->view('_partials/footer', $data);
    }

    private function calculate_saldo_tersedia()
    {
        $saldo = 0;

        $keuangan = $this->Keuangan_model->get_all();
        if (is_array($keuangan)) {
            foreach ($keuangan as $k) {
                if (isset($k['jenis'], $k['jumlah'])) {
                    $saldo += ($k['jenis'] === 'pemasukan') ? floatval($k['jumlah']) : -floatval($k['jumlah']);
                }
            }
        }

        $pinjaman = $this->Pinjaman_model->get_all();
        if (is_array($pinjaman)) {
            foreach ($pinjaman as $p) {
                $saldo -= floatval($p->jumlah_pinjam);
            }
        }

        // Ambil semua angsuran aktif (deleted = 0)
        $angsuran = $this->db->select('jumlah_bayar')
            ->from('angsuran')
            ->where('deleted', 0)
            ->get()
            ->result_array();

        if (!empty($angsuran)) {
            foreach ($angsuran as $a) {
                $saldo += floatval($a['jumlah_bayar'] ?? 0);
            }
        }

        return $saldo;
    }

    public function get_saldo_tersedia()
    {
        $saldo = $this->calculate_saldo_tersedia();
        echo json_encode(['success' => true, 'saldo' => $saldo]);
    }

    public function get_all()
    {
        $pinjaman = $this->Pinjaman_model->get_all();
        $data = [];

        if (!$pinjaman || !is_array($pinjaman)) {
            echo json_encode(['data' => []]);
            return;
        }

        foreach ($pinjaman as $row) {
            $jumlah_pinjam = floatval($row->jumlah_pinjam ?? 0);
            $bunga = floatval($row->bunga ?? 0);
            $tenor = max(1, intval($row->tenor ?? 0));
            $total_dibayar = $this->Pinjaman_model->get_total_dibayar($row->id);
            $total_pinjaman = $jumlah_pinjam + ($jumlah_pinjam * $bunga / 100 * $tenor);
            $sisa_pinjaman = max(0, $total_pinjaman - $total_dibayar);

            $status_text = ($sisa_pinjaman <= 0) ? 'Lunas' : 'Aktif';

            // Badge warna status
            $status_badge = ($status_text === 'Lunas') ? '<span class="badge bg-success">Lunas</span>' :
                '<span class="badge bg-warning text-dark">Aktif</span>';

            $btnBayar = '<button class="btn btn-warning btn-sm me-1 btn-bayar" data-id="' . $row->id . '" title="Bayar Cicilan">
                        <i class="fas fa-money-bill-wave"></i> Bayar
                     </button>';

            $btnHapus = '<a href="javascript:void(0)" class="btn btn-danger btn-sm btn-hapus" data-id="' . $row->id . '">
                        <i class="fas fa-trash-alt"></i> Hapus
                     </a>';

            $data[] = [
                'id'             => $row->id ?? 0,
                'nama_anggota'   => $row->nama_anggota ?? '-',
                'tanggal_pinjam' => $row->tanggal_pinjam ?? '-',
                'jumlah_pinjam'  => 'Rp ' . number_format($jumlah_pinjam, 0, ',', '.'),
                'jumlah_pinjam_raw' => $jumlah_pinjam,
                'bunga'          => $bunga . '%',
                'bunga_raw'      => $bunga,
                'tenor'          => $tenor,
                'total_tagihan'  => $total_pinjaman,
                'total_dibayar'  => $total_dibayar,
                'sisa_pinjaman'  => $sisa_pinjaman,
                'angsuran_per_bulan' => round($total_pinjaman / $tenor, 0),
                'status_label'   => $status_text,
                'status'         => $status_badge,
                'created_at'     => $row->created_at ?? '-',
                'aksi'           => $btnBayar . ' ' . $btnHapus
            ];
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['data' => $data]);
    }


    public function store()
    {
        $saldo_tersedia = $this->calculate_saldo_tersedia();

        $anggota_id     = $this->input->post('anggota_id');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $jumlah_pinjam  = floatval($this->input->post('jumlah_pinjam'));
        $bunga          = floatval($this->input->post('bunga'));
        $tenor          = intval($this->input->post('tenor'));

        if ($jumlah_pinjam > $saldo_tersedia) {
            echo json_encode(['success' => false, 'message' => 'Nominal pinjaman melebihi saldo BUMDes tersedia']);
            return;
        }

        $data = [
            'anggota_id'     => $anggota_id,
            'tanggal_pinjam' => $tanggal_pinjam,
            'jumlah_pinjam'  => $jumlah_pinjam,
            'bunga'          => $bunga,
            'tenor'          => $tenor,
            'status'         => 'Belum Lunas',
            'created_at'     => date('Y-m-d H:i:s'),
            'deleted'        => 0
        ];

        $insert = $this->Pinjaman_model->insert($data);
        echo json_encode([
            'success' => $insert ? true : false,
            'message' => $insert ? 'Pinjaman berhasil ditambahkan' : 'Gagal menambahkan pinjaman'
        ]);
    }

    public function soft_delete($id)
    {
        $pinjaman = $this->Pinjaman_model->get_by_id($id);

        if (!$pinjaman) {
            echo json_encode([
                'success' => false,
                'message' => 'Data pinjaman tidak ditemukan'
            ]);
            return;
        }

        // Hitung total bayar
        $total_dibayar_row = $this->db->select_sum('jumlah_bayar')
            ->where('pinjaman_id', $pinjaman->id)
            ->where('deleted', 0)
            ->get('angsuran')
            ->row_array();
        $total_dibayar = floatval($total_dibayar_row['jumlah_bayar'] ?? 0);

        // Hitung total pinjaman + bunga
        $total_pinjaman = floatval($pinjaman->jumlah_pinjam ?? 0) + (floatval($pinjaman->jumlah_pinjam ?? 0) * floatval($pinjaman->bunga ?? 0) / 100 * max(1, intval($pinjaman->tenor ?? 0)));

        // Cek status lunas
        if ($total_dibayar < $total_pinjaman) {
            echo json_encode([
                'success' => false,
                'message' => 'Pinjaman belum lunas, tidak bisa dihapus'
            ]);
            return;
        }

        // Soft delete pinjaman
        $hapusPinjaman = $this->Pinjaman_model->soft_delete($id);

        // Soft delete semua angsuran terkait
        $hapusAngsuran = $this->db->where('pinjaman_id', $id)
            ->update('angsuran', [
                'deleted' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        if ($hapusPinjaman && $hapusAngsuran !== false) {
            echo json_encode([
                'success' => true,
                'message' => 'Data pinjaman dan angsuran terkait berhasil dihapus'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Gagal menghapus data pinjaman atau angsuran'
            ]);
        }
    }


    public function get_detail($id)
    {
        header('Content-Type: application/json; charset=utf-8');

        $pinjaman = $this->Pinjaman_model->get_by_id($id);
        if (!$pinjaman) {
            echo json_encode(['success' => false, 'message' => 'Pinjaman tidak ditemukan']);
            return;
        }

        $jumlah_pinjam = floatval($pinjaman->jumlah_pinjam);
        $bunga         = floatval($pinjaman->bunga);
        $tenor         = intval($pinjaman->tenor);

        // Total pinjaman + bunga flat
        $total_pinjaman = $jumlah_pinjam + ($jumlah_pinjam * $bunga / 100 * $tenor);

        // Total sudah dibayar
        $total_dibayar = $this->Angsuran_model->get_total_bayar($id);

        // Sisa pinjaman
        $sisa_pinjaman = max(0, $total_pinjaman - $total_dibayar);

        if ($sisa_pinjaman <= 0) {
            echo json_encode([
                'success' => false,
                'status' => 'lunas',
                'message' => 'Pinjaman sudah lunas'
            ]);
            return;
        }

        // Angsuran ke berikutnya
        $latest = $this->Angsuran_model->get_latest_by_pinjaman($id);
        $angsuran_ke_berikutnya = ($latest->angsuran_ke ?? 0) + 1;

        // Cicilan normal per bulan
        $cicilan_per_bulan = round($total_pinjaman / $tenor, 0);

        // Jika angsuran terakhir, gunakan sisa
        if ($angsuran_ke_berikutnya < $tenor) {
            $jumlah_per_angsuran = $cicilan_per_bulan;
        } else {
            $jumlah_per_angsuran = round($sisa_pinjaman, 0);
        }

        echo json_encode([
            'success' => true,
            'pinjaman_id' => $id,
            'angsuran_ke_berikutnya' => $angsuran_ke_berikutnya,
            'jumlah_per_angsuran' => $jumlah_per_angsuran
        ]);
    }
}
