<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');

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
        $data['title'] = "Laporan";
        $period = $this->selected_period();

        if ($period === false) {
            $data['period_error'] = 'Rentang tanggal tidak valid. Pilih tanggal awal dan akhir yang benar.';
            $period = [date('Y-01-01'), date('Y-m-d')];
            $data['summary'] = null;
        } else {
            $data['period_error'] = '';
            $data['summary'] = $this->Laporan_model->get_report_summary($period[0], $period[1]);
        }

        $data['tanggal_awal'] = $period[0];
        $data['tanggal_akhir'] = $period[1];

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('_partials/footer', $data);
    }

    public function export_csv($jenis = '')
    {
        $period = $this->selected_period(false);
        if ($period === false) {
            show_error('Rentang tanggal laporan tidak valid.', 400);
        }

        $report = $this->csv_report($jenis, $period[0], $period[1]);
        if ($report === false) {
            show_error('Jenis laporan tidak dikenal.', 404);
        }

        $filename = 'laporan-' . $jenis . '-' . $period[0] . '-sampai-' . $period[1] . '.csv';
        $this->output
            ->set_content_type('text/csv', 'utf-8')
            ->set_header('Content-Disposition: attachment; filename="' . $filename . '"')
            ->set_output($report);
    }

    public function unduh_semua()
    {
        $period = $this->selected_period(false);
        if ($period === false) {
            show_error('Rentang tanggal laporan tidak valid.', 400);
        }
        if (!class_exists('ZipArchive')) {
            show_error('Ekstensi ZIP PHP tidak tersedia. Unduh laporan satu per satu dalam format CSV.', 500);
        }

        $zip_path = tempnam(sys_get_temp_dir(), 'bumdes-laporan-');
        if ($zip_path === false) {
            show_error('Berkas sementara untuk ZIP laporan tidak dapat dibuat.', 500);
        }

        $zip = new ZipArchive();
        if ($zip->open($zip_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            unlink($zip_path);
            show_error('Arsip ZIP laporan tidak dapat dibuat.', 500);
        }

        foreach (['pinjaman', 'keuangan', 'angsuran'] as $jenis) {
            $csv = $this->csv_report($jenis, $period[0], $period[1]);
            if ($csv === false || !$zip->addFromString('laporan-' . $jenis . '.csv', $csv)) {
                $zip->close();
                unlink($zip_path);
                show_error('Salah satu berkas laporan gagal ditambahkan ke ZIP.', 500);
            }
        }

        if (!$zip->close()) {
            unlink($zip_path);
            show_error('Arsip ZIP laporan gagal disimpan.', 500);
        }

        $archive = file_get_contents($zip_path);
        unlink($zip_path);
        if ($archive === false) {
            show_error('Arsip ZIP laporan tidak dapat dibaca.', 500);
        }

        $filename = 'laporan-bumdes-' . $period[0] . '-sampai-' . $period[1] . '.zip';
        $this->output
            ->set_content_type('application/zip')
            ->set_header('Content-Disposition: attachment; filename="' . $filename . '"')
            ->set_output($archive);
    }

    public function cetak_ringkasan()
    {
        $period = $this->selected_period(false);
        if ($period === false) {
            show_error('Rentang tanggal laporan tidak valid.', 400);
        }

        $data['tanggal_awal'] = $period[0];
        $data['tanggal_akhir'] = $period[1];
        $data['summary'] = $this->Laporan_model->get_report_summary($period[0], $period[1]);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'portrait');
        $html = $this->load->view('admin/laporan_ringkasan_pdf', $data, true);
        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $this->pdf->stream('ringkasan-laporan-bumdes.pdf', ['Attachment' => false]);
    }

    private function selected_period($allow_default = true)
    {
        $awal = $this->input->get('tanggal_awal', true);
        $akhir = $this->input->get('tanggal_akhir', true);

        if ($allow_default && !$awal && !$akhir) {
            $quarter_start_month = (int) (floor(((int) date('n') - 1) / 3) * 3 + 1);
            return [date('Y-m-01', mktime(0, 0, 0, $quarter_start_month, 1)), date('Y-m-d')];
        }

        if (!$this->valid_date($awal) || !$this->valid_date($akhir) || $awal > $akhir) {
            return false;
        }

        return [$awal, $akhir];
    }

    private function valid_date($date)
    {
        if (!is_string($date) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return false;
        }

        $parts = explode('-', $date);
        return checkdate((int) $parts[1], (int) $parts[2], (int) $parts[0]);
    }

    private function csv_report($jenis, $awal, $akhir)
    {
        $headers = [];
        $rows = [];

        if ($jenis === 'pinjaman') {
            $headers = ['ID Pinjaman', 'Nama Anggota', 'Alamat', 'Tanggal Pinjam', 'Pokok Pinjaman', 'Bunga per Bulan (%)', 'Tenor (Bulan)', 'Total Tagihan', 'Status'];
            foreach ($this->Laporan_model->get_pinjaman_filter($awal, $akhir) as $item) {
                $pokok = (float) $item->jumlah_pinjam;
                $tenor = (int) $item->tenor;
                $tagihan = $pokok + ($pokok * (float) $item->bunga / 100 * $tenor);
                $rows[] = [$item->id, $item->nama, $item->alamat, $item->tanggal_pinjam, $pokok, $item->bunga, $tenor, $tagihan, $item->status];
            }
        } elseif ($jenis === 'keuangan') {
            $headers = ['Tanggal', 'Unit Usaha', 'Jenis', 'Keterangan', 'Jumlah'];
            foreach ($this->Laporan_model->get_keuangan_filter($awal, $akhir) as $item) {
                $rows[] = [$item->tanggal, $item->nama_usaha ?? '-', $item->jenis, $item->keterangan, $item->jumlah];
            }
        } elseif ($jenis === 'angsuran') {
            $headers = ['ID Pinjaman', 'Nama Anggota', 'Tanggal Bayar', 'Angsuran Ke', 'Jumlah Bayar'];
            foreach ($this->Laporan_model->get_angsuran_filter($awal, $akhir) as $item) {
                $rows[] = [$item->pinjaman_id, $item->nama, $item->tanggal_bayar, $item->angsuran_ke, $item->jumlah_bayar];
            }
        } else {
            return false;
        }

        $stream = fopen('php://temp', 'r+');
        if ($stream === false) {
            show_error('Berkas CSV sementara tidak dapat dibuat.', 500);
        }

        fwrite($stream, "\xEF\xBB\xBF");
        fputcsv($stream, $headers, ',', '"', '\\');
        foreach ($rows as $row) {
            $safe_row = array_map([$this, 'safe_csv_value'], $row);
            fputcsv($stream, $safe_row, ',', '"', '\\');
        }
        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);

        if ($csv === false) {
            show_error('Berkas CSV laporan tidak dapat dibaca.', 500);
        }

        return $csv;
    }

    private function safe_csv_value($value)
    {
        if (is_string($value) && !is_numeric($value) && preg_match('/^[\t\r ]*[=+\-@]/', $value)) {
            return "'" . $value;
        }
        return $value;
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
    $period = $this->selected_period(false);
    if ($period === false) {
        show_error('Rentang tanggal laporan pinjaman tidak valid.', 400);
    }
    $tanggal_awal = $period[0];
    $tanggal_akhir = $period[1];
    $tanggal_akhir_exclusive = date('Y-m-d', strtotime($tanggal_akhir . ' +1 day'));

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'landscape');

    $this->db->select('p.*, a.nama, a.alamat');
    $this->db->from('pinjaman p');
    $this->db->join('anggota a', 'a.id = p.anggota_id');
    $this->db->where('p.deleted', 0);
    $this->db->where('p.tanggal_pinjam >=', $tanggal_awal);
    $this->db->where('p.tanggal_pinjam <', $tanggal_akhir_exclusive);
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
    $period = $this->selected_period(false);
    if ($period === false) {
        show_error('Rentang tanggal laporan keuangan tidak valid.', 400);
    }
    $tanggal_awal = $period[0];
    $tanggal_akhir = $period[1];
    $tanggal_akhir_exclusive = date('Y-m-d', strtotime($tanggal_akhir . ' +1 day'));

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'landscape');

    $this->db->from('keuangan');
    $this->db->where('tanggal >=', $tanggal_awal);
    $this->db->where('tanggal <', $tanggal_akhir_exclusive);
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
        $period = $this->selected_period(false);
        if ($period === false) {
            show_error('Rentang tanggal laporan angsuran tidak valid.', 400);
        }
        $tanggal_awal = $period[0];
        $tanggal_akhir = $period[1];
        $tanggal_akhir_exclusive = date('Y-m-d', strtotime($tanggal_akhir . ' +1 day'));

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');

        $this->db->select('angsuran.*, anggota.nama');
        $this->db->from('angsuran');
        $this->db->join('pinjaman', 'pinjaman.id = angsuran.pinjaman_id');
        $this->db->join('anggota', 'anggota.id = pinjaman.anggota_id');
        $this->db->where('angsuran.deleted', 0);
        $this->db->where('pinjaman.deleted', 0);
        $this->db->where('tanggal_bayar >=', $tanggal_awal);
        $this->db->where('tanggal_bayar <', $tanggal_akhir_exclusive);
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
