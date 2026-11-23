<?php
$formatMoney = function ($value) {
    return 'Rp ' . number_format((float) $value, 0, ',', '.');
};
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <style>
        body {
            color: #23304a;
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            line-height: 1.5;
        }

        h1 {
            margin: 0 0 4px;
            color: #2920a6;
            font-size: 20px;
            text-align: center;
        }

        .subtitle {
            margin: 0;
            color: #68758c;
            text-align: center;
        }

        .period {
            margin: 20px 0 12px;
            padding: 8px 10px;
            border: 1px solid #e4e8f0;
            background: #f5f6fc;
        }

        h2 {
            margin: 17px 0 6px;
            color: #293650;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 7px 8px;
            border: 1px solid #dfe4ed;
            text-align: left;
        }

        th {
            width: 58%;
            background: #f5f6fc;
            font-weight: bold;
        }

        .note {
            margin-top: 18px;
            color: #68758c;
            font-size: 9px;
        }

        .generated {
            margin-top: 22px;
            color: #8791a3;
            font-size: 8px;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Ringkasan Laporan BUMDes</h1>
    <p class="subtitle">BUMDes Sukses Mandiri · Desa Gelam Jaya</p>
    <div class="period">
        <strong>Periode:</strong>
        <?= html_escape(date('d/m/Y', strtotime($tanggal_awal))) ?>
        s.d.
        <?= html_escape(date('d/m/Y', strtotime($tanggal_akhir))) ?>
    </div>

    <h2>Ringkasan Data</h2>
    <table>
        <tbody>
            <tr><th>Catatan dari seluruh kategori</th><td><?= number_format($summary['jumlah_catatan'], 0, ',', '.') ?></td></tr>
            <tr><th>Pinjaman tercatat</th><td><?= number_format($summary['pinjaman']['jumlah'], 0, ',', '.') ?></td></tr>
            <tr><th>Total pokok pinjaman</th><td><?= $formatMoney($summary['pinjaman']['total_pokok']) ?></td></tr>
            <tr><th>Transaksi keuangan</th><td><?= number_format($summary['keuangan']['jumlah'], 0, ',', '.') ?></td></tr>
            <tr><th>Total pemasukan</th><td><?= $formatMoney($summary['keuangan']['pemasukan']) ?></td></tr>
            <tr><th>Total pengeluaran</th><td><?= $formatMoney($summary['keuangan']['pengeluaran']) ?></td></tr>
            <tr><th>Selisih pemasukan dan pengeluaran</th><td><?= $formatMoney($summary['keuangan']['selisih']) ?></td></tr>
            <tr><th>Pembayaran angsuran tercatat</th><td><?= number_format($summary['angsuran']['jumlah'], 0, ',', '.') ?></td></tr>
            <tr><th>Total pembayaran angsuran</th><td><?= $formatMoney($summary['angsuran']['total_dibayar']) ?></td></tr>
        </tbody>
    </table>

    <p class="note">
        Ringkasan ini disusun dari transaksi yang tercatat pada aplikasi. Selisih pemasukan dan pengeluaran bukan laporan laba/rugi usaha.
        Data jadwal jatuh tempo, status keterlambatan, serta hubungan pinjaman dan angsuran dengan unit usaha tidak tersedia pada ringkasan ini.
    </p>
    <p class="generated">Dicetak pada <?= html_escape(date('d/m/Y H:i')) ?></p>
</body>
</html>
