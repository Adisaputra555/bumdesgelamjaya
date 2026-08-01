<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $data['title'] = "Laporan";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('_partials/footer', $data);
    }


    // Untuk PDF bisa menggunakan Dompdf
    public function cetak_pdf()
    {
        $this->load->library('pdf'); // Dompdf wrapper
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['keuangan'] = $this->Laporan_model->get_keuangan_filter($tgl_awal, $tgl_akhir);
        $data['pinjaman'] = $this->Laporan_model->get_pinjaman_filter($tgl_awal, $tgl_akhir);
        $data['angsuran'] = $this->Laporan_model->get_angsuran_filter($tgl_awal, $tgl_akhir);

        $html = $this->load->view('admin/laporan_pdf', $data, true);
        $this->pdf->createPDF($html, 'laporan_keuangan', false);
    }



 public function cetak_pinjaman()
{
    $tanggal_awal  = date('Y-m-d', strtotime($this->input->get('tanggal_awal')));
    $tanggal_akhir = date('Y-m-d', strtotime($this->input->get('tanggal_akhir')));

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'landscape');

    $this->db->select('p.*, a.nama, a.alamat');
    $this->db->from('pinjaman p');
    $this->db->join('anggota a', 'a.id = p.anggota_id');
    $this->db->where('p.deleted', 0);
    $this->db->where('DATE(p.tanggal_pinjam) >=', $tanggal_awal);
    $this->db->where('DATE(p.tanggal_pinjam) <=', $tanggal_akhir);
    $data = $this->db->get()->result();

    // Hitung total
    $total_pokok = 0;
    $total_plus_bunga = 0;

        foreach ($data as $row) {
            $total_pokok += $row->jumlah_pinjam;
            $total_plus_bunga += $row->jumlah_pinjam + ($row->jumlah_pinjam * $row->bunga / 100 * $row->tenor);
        }

    $html = '
    <h3 style="text-align:center;">LAPORAN DATA PINJAMAN</h3>
    <p>Periode: ' . date('d/m/Y', strtotime($tanggal_awal)) . ' s/d ' . date('d/m/Y', strtotime($tanggal_akhir)) . '</p>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Bunga (%)</th>
                <th>Tenor</th>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Jumlah + Bunga</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {
            $jumlah_plus_bunga = $row->jumlah_pinjam + ($row->jumlah_pinjam * $row->bunga / 100 * $row->tenor);

            $html .= '
    <tr>
        <td>' . $row->nama . '</td>
        <td>' . date('d/m/Y', strtotime($row->tanggal_pinjam)) . '</td>
        <td>' . $row->bunga . '</td>
        <td>' . $row->tenor . ' bulan</td>
        <td>' . ucfirst($row->status) . '</td>
        <td>Rp ' . number_format($row->jumlah_pinjam, 0, ',', '.') . '</td>
        <td>Rp ' . number_format($jumlah_plus_bunga, 0, ',', '.') . '</td>
    </tr>';
        }

    $html .= '
        <tr>
            <td colspan="5" style="text-align:right;"><strong>Total</strong></td>
            <td><strong>Rp ' . number_format($total_pokok, 0, ',', '.') . '</strong></td>
            <td><strong>Rp ' . number_format($total_plus_bunga, 0, ',', '.') . '</strong></td>
        </tr>
        </tbody>
    </table>';

    $this->pdf->loadHtml($html);
    $this->pdf->render();
    $this->pdf->stream("laporan_pinjaman.pdf", array("Attachment" => false));
}



public function cetak_keuangan()
{
    $tanggal_awal = $this->input->get('tanggal_awal');
    $tanggal_akhir = $this->input->get('tanggal_akhir');

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'landscape');

    $this->db->from('keuangan');
    $this->db->where('tanggal >=', $tanggal_awal);
    $this->db->where('tanggal <=', $tanggal_akhir);
    $this->db->order_by('tanggal', 'ASC');
    $data = $this->db->get()->result();

    $total_masuk = 0;
    $total_keluar = 0;
    $saldo = 0;

    $html = '
    <h3 style="text-align:center;">LAPORAN KEUANGAN</h3>
    <p>Periode: ' . date('d/m/Y', strtotime($tanggal_awal)) . ' s/d ' . date('d/m/Y', strtotime($tanggal_akhir)) . '</p>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Pemasukan (Rp)</th>
                <th>Pengeluaran (Rp)</th>
                <th>Saldo (Rp)</th>
            </tr>
        </thead><tbody>';

    foreach ($data as $row) {
        $pemasukan = $row->jenis === 'pemasukan' ? $row->jumlah : 0;
        $pengeluaran = $row->jenis === 'pengeluaran' ? $row->jumlah : 0;

        $total_masuk += $pemasukan;
        $total_keluar += $pengeluaran;

        $saldo += $pemasukan - $pengeluaran;

        $html .= '
        <tr>
            <td>' . date('d/m/Y', strtotime($row->tanggal)) . '</td>
            <td>' . $row->keterangan . '</td>
            <td style="text-align:right;">' . ($pemasukan ? 'Rp ' . number_format($pemasukan, 0, ',', '.') : '-') . '</td>
            <td style="text-align:right;">' . ($pengeluaran ? 'Rp ' . number_format($pengeluaran, 0, ',', '.') : '-') . '</td>
            <td style="text-align:right;font-weight:bold;">Rp ' . number_format($saldo, 0, ',', '.') . '</td>
        </tr>';
    }

    // Tambahkan total di bagian bawah
    $html .= '
    <tr>
        <td colspan="2" style="text-align:center;font-weight:bold;">TOTAL</td>
        <td style="text-align:right;font-weight:bold;">Rp ' . number_format($total_masuk, 0, ',', '.') . '</td>
        <td style="text-align:right;font-weight:bold;">Rp ' . number_format($total_keluar, 0, ',', '.') . '</td>
        <td style="text-align:right;font-weight:bold;">Rp ' . number_format($saldo, 0, ',', '.') . '</td>
    </tr>';

    $html .= '</tbody></table>';

    $this->pdf->loadHtml($html);
    $this->pdf->render();
    $this->pdf->stream("laporan_keuangan.pdf", array("Attachment" => false));
}

    public function cetak_angsuran()
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');

        $this->db->select('angsuran.*, anggota.nama');
        $this->db->from('angsuran');
        $this->db->join('pinjaman', 'pinjaman.id = angsuran.pinjaman_id');
        $this->db->join('anggota', 'anggota.id = pinjaman.anggota_id');
        $this->db->where('angsuran.deleted', 0);
        $this->db->where('tanggal_bayar >=', $tanggal_awal);
        $this->db->where('tanggal_bayar <=', $tanggal_akhir);
        $data = $this->db->get()->result();

        // Hitung total seluruh angsuran
        $total_bayar = 0;
        foreach ($data as $row) {
            $total_bayar += $row->jumlah_bayar;
        }

        $html = '
    <h3 style="text-align:center;">LAPORAN ANGSURAN</h3>
    <p>Periode: ' . date('d/m/Y', strtotime($tanggal_awal)) . ' s/d ' . date('d/m/Y', strtotime($tanggal_akhir)) . '</p>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal Bayar</th>
                <th>Angsuran Ke</th>
                <th>Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {
            $html .= '
            <tr>
                <td>' . $row->nama . '</td>
                <td>' . date('d/m/Y', strtotime($row->tanggal_bayar)) . '</td>
                <td>' . $row->angsuran_ke . '</td>
                <td>Rp ' . number_format($row->jumlah_bayar, 0, ',', '.') . '</td>
            </tr>';
        }

        // Tambahkan total di bagian bawah
        $html .= '
            <tr>
                <td colspan="3" style="text-align:right;"><strong>Total</strong></td>
                <td><strong>Rp ' . number_format($total_bayar, 0, ',', '.') . '</strong></td>
            </tr>
        </tbody>
    </table>';

        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_angsuran.pdf", array("Attachment" => false));
    }
}
