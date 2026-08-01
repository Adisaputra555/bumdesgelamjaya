<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
{
    protected $table = 'keuangan';

    /**
     * Ambil data harian untuk chart
     */
    public function get_daily_summary($month, $year)
    {
        $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $pemasukan = array_fill(0, $totalDays, 0);
        $pengeluaran = array_fill(0, $totalDays, 0);

        $query = $this->db->select('tanggal, jenis, jumlah')
            ->from($this->table)
            ->where('MONTH(tanggal)', $month)
            ->where('YEAR(tanggal)', $year)
            ->get()
            ->result_array();

        foreach ($query as $row) {
            $dayIndex = max(0, (int)date('j', strtotime($row['tanggal'])) - 1);
            $jenis = $row['jenis'] ?? 'pemasukan';
            $jumlah = floatval($row['jumlah'] ?? 0);

            if ($jenis === 'pemasukan') {
                $pemasukan[$dayIndex] += $jumlah;
            } else {
                $pengeluaran[$dayIndex] += $jumlah;
            }
        }

        return [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ];
    }

    /**
     * Ambil semua data keuangan
     * Selalu return array konsisten
     */
    public function get_all($month = null, $year = null)
    {
        $query = $this->db->select('keuangan.*, IFNULL(usaha.nama_usaha,"-") as nama_usaha')
            ->from($this->table)
            ->join('usaha', 'usaha.id = keuangan.usaha_id', 'left');

        if ($month && $year) {
            $query->where('MONTH(tanggal)', $month)
                ->where('YEAR(tanggal)', $year);
        }

        $query->order_by('tanggal', 'ASC');
        $result = $query->get()->result_array();

        // Pastikan setiap record punya key 'jenis' & 'jumlah'
        foreach ($result as &$row) {
            $row['jenis']  = $row['jenis'] ?? 'pemasukan';
            $row['jumlah'] = isset($row['jumlah']) ? floatval($row['jumlah']) : 0;
        }

        return $result;
    }

    /**
     * Insert data keuangan
     */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update data keuangan
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Hapus data keuangan
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
