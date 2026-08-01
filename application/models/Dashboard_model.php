<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    // Total anggota aktif (belum dihapus)
    public function get_total_anggota()
    {
        // Tanpa deleted
        return $this->db->count_all_results('anggota');
    }

    // Total pinjaman yang belum lunas (hanya pinjaman aktif)
    public function get_total_pinjaman_belum_lunas()
    {
        $this->db->select_sum('jumlah_pinjam');
        $this->db->where('status !=', 'lunas');
        $this->db->where('deleted', '0');
        $query = $this->db->get('pinjaman');

        return floatval($query->row()->jumlah_pinjam ?? 0);
    }

    // Hitung saldo real-time
    public function get_saldo()
    {
        // Total pemasukan
        $this->db->select_sum('jumlah');
        $this->db->where('jenis', 'pemasukan');
        $total_pemasukan = floatval($this->db->get('keuangan')->row()->jumlah ?? 0);

        // Total pengeluaran
        $this->db->select_sum('jumlah');
        $this->db->where('jenis', 'pengeluaran');
        $total_pengeluaran = floatval($this->db->get('keuangan')->row()->jumlah ?? 0);

        // Total pinjaman dicairkan
        $this->db->select_sum('jumlah_pinjam');
        $this->db->where('deleted', '0');
        $total_pinjaman = floatval($this->db->get('pinjaman')->row()->jumlah_pinjam ?? 0);

        // Total angsuran yang sudah dibayar
        $this->db->select_sum('jumlah_bayar');
        $this->db->where('deleted', '0');
        $total_angsuran = floatval($this->db->get('angsuran')->row()->jumlah_bayar ?? 0);

        // Saldo = (pemasukan + angsuran masuk) - (pengeluaran + pinjaman dicairkan)
        $saldo = ($total_pemasukan + $total_angsuran) - ($total_pengeluaran + $total_pinjaman);

        return $saldo;
    }

    // Dashboard_model.php
    public function get_total_pemasukan()
    {
        $this->db->select_sum('jumlah');
        $this->db->where('jenis', 'pemasukan');
        $query = $this->db->get('keuangan');
        return floatval($query->row()->jumlah ?? 0);
    }

    public function get_total_pengeluaran()
    {
        $this->db->select_sum('jumlah');
        $this->db->where('jenis', 'pengeluaran');
        $query = $this->db->get('keuangan');
        return floatval($query->row()->jumlah ?? 0);
    }
}
