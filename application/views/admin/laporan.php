<?php
$summaryAvailable = isset($summary) && is_array($summary);
$formatReportMoney = function ($value) {
    return 'Rp ' . number_format((float) $value, 0, ',', '.');
};
$displayDate = function ($value) {
    return $value ? date('d/m/Y', strtotime($value)) : 'Belum ada catatan';
};
$periodQuery = 'tanggal_awal=' . rawurlencode($tanggal_awal) . '&tanggal_akhir=' . rawurlencode($tanggal_akhir);
?>

<style>
    .laporan-page {
        --laporan-ink: #1d2742;
        --laporan-muted: #778198;
        --laporan-border: #e9edf5;
        --laporan-primary: #3026ad;
        min-height: calc(100vh - 120px);
        padding: 18px 0 30px;
        background: #f6f7fc;
        color: var(--laporan-ink);
    }

    .laporan-page .laporan-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        color: #788198;
        font-size: .66rem;
    }

    .laporan-page .laporan-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .laporan-page .laporan-breadcrumbs a:hover,
    .laporan-page .laporan-breadcrumbs strong {
        color: var(--laporan-primary);
    }

    .laporan-page .laporan-context {
        margin-left: auto;
        padding: 5px 9px;
        border-radius: 99px;
        background: #e9f8f2;
        color: #087c57;
        font-size: .58rem;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .laporan-page .laporan-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 13px;
        padding: 17px 18px;
        border: 1px solid var(--laporan-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .laporan-page .laporan-kicker {
        margin-bottom: 5px;
        color: var(--laporan-primary);
        font-size: .6rem;
        font-weight: 750;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .laporan-page .laporan-hero h1 {
        margin: 0 0 5px;
        color: var(--laporan-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 680;
        letter-spacing: -.035em;
    }

    .laporan-page .laporan-hero p {
        max-width: 650px;
        margin: 0;
        color: var(--laporan-muted);
        font-size: .7rem;
        line-height: 1.6;
    }

    .laporan-page .laporan-hero-actions {
        display: flex;
        flex: 0 0 auto;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 8px;
    }

    .laporan-page .laporan-hero-actions .btn,
    .laporan-page .report-actions .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border-radius: 7px;
        font-size: .65rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .laporan-page .btn-laporan-outline {
        border: 1px solid var(--laporan-border);
        background: #fff;
        color: #3c465d;
    }

    .laporan-page .btn-laporan-primary {
        border: 1px solid #25149f;
        background: #3026ad;
        color: #fff;
    }

    .laporan-page .btn-laporan-primary:hover {
        border-color: #1b1079;
        background: #25149f;
        color: #fff;
    }

    .laporan-page .btn-laporan-outline:hover {
        border-color: #c9c7f5;
        color: var(--laporan-primary);
    }

    .laporan-page .laporan-filter {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 13px;
        padding: 13px 15px;
        border: 1px solid var(--laporan-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .laporan-page .filter-fields {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        gap: 10px;
    }

    .laporan-page .filter-title {
        align-self: center;
        margin-right: 4px;
        color: #45516a;
        font-size: .67rem;
        font-weight: 700;
    }

    .laporan-page .filter-field label {
        display: block;
        margin: 0 0 4px;
        color: #788198;
        font-size: .58rem;
        font-weight: 650;
    }

    .laporan-page .filter-field input {
        width: 145px;
        min-height: 35px;
        padding: 5px 9px;
        border: 1px solid #e4e8f0;
        border-radius: 6px;
        color: #394660;
        background: #fff;
        font-size: .65rem;
    }

    .laporan-page .filter-field input:focus {
        outline: 0;
        border-color: #aaa4ed;
        box-shadow: 0 0 0 3px rgba(48, 38, 173, .08);
    }

    .laporan-page .filter-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .laporan-page .filter-actions .btn {
        min-height: 35px;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: .64rem;
        font-weight: 650;
    }

    .laporan-page .filter-note {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #718098;
        font-size: .58rem;
        white-space: nowrap;
    }

    .laporan-page .filter-note i {
        color: #25866b;
    }

    .laporan-page .period-error {
        margin-bottom: 13px;
        padding: 9px 12px;
        border: 1px solid #f3c7c7;
        border-radius: 7px;
        color: #a73232;
        background: #fff4f4;
        font-size: .68rem;
    }

    .laporan-page .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
        margin-bottom: 13px;
    }

    .laporan-page .summary-card {
        display: flex;
        min-height: 89px;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 13px;
        border: 1px solid var(--laporan-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .laporan-page .summary-label {
        color: #7b8498;
        font-size: .57rem;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .laporan-page .summary-value {
        margin-top: 5px;
        color: var(--laporan-ink);
        font-size: 1.03rem;
        font-weight: 700;
        letter-spacing: -.025em;
        line-height: 1.2;
    }

    .laporan-page .summary-note {
        margin-top: 3px;
        color: #8a93a6;
        font-size: .57rem;
    }

    .laporan-page .summary-icon {
        display: grid;
        flex: 0 0 34px;
        width: 34px;
        height: 34px;
        place-items: center;
        border-radius: 9px;
        background: var(--summary-bg, #eeedff);
        color: var(--summary-color, #3026ad);
        font-size: 17px;
    }

    .laporan-page .report-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 13px;
    }

    .laporan-page .report-card {
        position: relative;
        display: flex;
        min-width: 0;
        flex-direction: column;
        overflow: hidden;
        padding: 14px;
        border: 1px solid var(--laporan-border);
        border-top: 3px solid var(--report-accent, #3026ad);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .laporan-page .report-card-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 9px;
    }

    .laporan-page .report-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 7px;
        border-radius: 20px;
        background: var(--report-soft, #eeedff);
        color: var(--report-accent, #3026ad);
        font-size: .52rem;
        font-weight: 750;
        letter-spacing: .025em;
        text-transform: uppercase;
    }

    .laporan-page .report-icon {
        display: grid;
        flex: 0 0 30px;
        width: 30px;
        height: 30px;
        place-items: center;
        border-radius: 9px;
        background: var(--report-soft, #eeedff);
        color: var(--report-accent, #3026ad);
        font-size: 16px;
    }

    .laporan-page .report-card h2 {
        min-height: 38px;
        margin: 10px 0 4px;
        color: #202b43;
        font-size: .88rem;
        font-weight: 690;
        letter-spacing: -.02em;
        line-height: 1.35;
    }

    .laporan-page .report-description {
        min-height: 40px;
        margin: 0;
        color: #788198;
        font-size: .62rem;
        line-height: 1.55;
    }

    .laporan-page .report-metrics {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 7px;
        margin: 11px 0 9px;
        padding: 9px;
        border-radius: 7px;
        background: #f1f3ff;
    }

    .laporan-page .report-card.finance .report-metrics {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        background: #eff8f3;
    }

    .laporan-page .report-card.installment .report-metrics {
        background: #f1f3ff;
    }

    .laporan-page .metric-label {
        color: #788198;
        font-size: .52rem;
        line-height: 1.35;
    }

    .laporan-page .metric-value {
        margin-top: 4px;
        color: #26334e;
        font-size: .68rem;
        font-weight: 750;
        line-height: 1.35;
        overflow-wrap: anywhere;
    }

    .laporan-page .report-card.finance .metric-value {
        font-size: .59rem;
    }

    .laporan-page .report-note {
        min-height: 34px;
        margin: 0 0 10px;
        color: #7d8799;
        font-size: .56rem;
        line-height: 1.5;
    }

    .laporan-page .report-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: auto;
    }

    .laporan-page .report-actions .btn {
        flex: 1 1 105px;
        min-height: 32px;
        padding: 6px 8px;
        font-size: .59rem;
    }

    .laporan-page .report-actions .btn-print {
        border: 1px solid var(--report-accent, #3026ad);
        background: var(--report-accent, #3026ad);
        color: #fff;
    }

    .laporan-page .report-actions .btn-csv {
        border: 1px solid var(--laporan-border);
        background: #fff;
        color: #42506a;
    }

    .laporan-page .report-actions .btn-csv:hover {
        border-color: #c9c7f5;
        color: var(--laporan-primary);
    }

    .laporan-page .bottom-grid {
        display: grid;
        grid-template-columns: 1.15fr .85fr;
        gap: 12px;
    }

    .laporan-page .info-panel {
        padding: 14px 15px;
        border: 1px solid var(--laporan-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .laporan-page .info-panel h3 {
        margin: 0 0 5px;
        color: #26334e;
        font-size: .78rem;
        font-weight: 720;
    }

    .laporan-page .info-panel > p {
        margin: 0 0 10px;
        color: #7b8599;
        font-size: .61rem;
        line-height: 1.55;
    }

    .laporan-page .coverage-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px 12px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .laporan-page .coverage-list li {
        display: flex;
        align-items: flex-start;
        gap: 7px;
        color: #68758c;
        font-size: .58rem;
        line-height: 1.5;
    }

    .laporan-page .coverage-list i {
        margin-top: 1px;
        color: #16835d;
        font-size: 13px;
    }

    .laporan-page .format-list {
        display: grid;
        gap: 7px;
    }

    .laporan-page .format-row {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 8px 9px;
        border-radius: 7px;
        background: #f2f4ff;
        color: #4a5872;
        font-size: .59rem;
    }

    .laporan-page .format-row i {
        color: var(--laporan-primary);
        font-size: 14px;
    }

    .laporan-page .format-row small {
        display: block;
        margin-top: 2px;
        color: #8993a5;
        font-size: .52rem;
    }

    .laporan-page .format-disclaimer {
        margin: 9px 0 0 !important;
        font-size: .56rem !important;
    }

    @media (max-width: 1050px) {
        .laporan-page .report-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767px) {
        .laporan-page .laporan-hero,
        .laporan-page .laporan-filter {
            align-items: flex-start;
            flex-direction: column;
        }

        .laporan-page .laporan-hero-actions {
            justify-content: flex-start;
        }

        .laporan-page .summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .laporan-page .filter-fields {
            width: 100%;
        }

        .laporan-page .filter-title {
            flex: 1 0 100%;
        }

        .laporan-page .filter-field {
            flex: 1 1 130px;
        }

        .laporan-page .filter-field input {
            width: 100%;
        }

        .laporan-page .filter-note {
            white-space: normal;
        }

        .laporan-page .report-grid,
        .laporan-page .bottom-grid {
            grid-template-columns: 1fr;
        }

        .laporan-page .report-card h2,
        .laporan-page .report-description,
        .laporan-page .report-note {
            min-height: 0;
        }
    }

    @media (max-width: 440px) {
        .laporan-page .summary-grid {
            gap: 7px;
        }

        .laporan-page .summary-card {
            min-height: 82px;
            padding: 9px;
        }

        .laporan-page .summary-icon {
            flex-basis: 29px;
            width: 29px;
            height: 29px;
        }

        .laporan-page .summary-value {
            font-size: .88rem;
        }

        .laporan-page .coverage-list {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="pc-container">
<div class="pc-content">
<main class="container-fluid laporan-page">
    <div class="laporan-breadcrumbs">
        <a href="<?= base_url('dashboard') ?>"><i class="ti ti-home-2 me-1"></i> Beranda</a>
        <span>/</span>
        <a href="<?= base_url('dashboard') ?>">Dasbor</a>
        <span>/</span>
        <strong>Laporan</strong>
        <span class="laporan-context"><i class="ti ti-database me-1"></i> Pusat laporan data BUMDes</span>
    </div>

    <section class="laporan-hero">
        <div>
            <div class="laporan-kicker">Rekapitulasi &amp; dokumen</div>
            <h1>Pusat Laporan BUMDes</h1>
            <p>Akses laporan pinjaman, pencatatan keuangan, dan penerimaan angsuran berdasarkan rentang tanggal yang dipilih.</p>
        </div>
        <div class="laporan-hero-actions">
            <form action="<?= base_url('laporan/unduh_semua') ?>" method="get">
                <input type="hidden" name="tanggal_awal" value="<?= html_escape($tanggal_awal) ?>">
                <input type="hidden" name="tanggal_akhir" value="<?= html_escape($tanggal_akhir) ?>">
                <button type="submit" class="btn btn-laporan-outline">
                    <i class="ti ti-archive"></i> Unduh Semua Laporan (ZIP)
                </button>
            </form>
            <form action="<?= base_url('laporan/cetak_ringkasan') ?>" method="get" target="_blank">
                <input type="hidden" name="tanggal_awal" value="<?= html_escape($tanggal_awal) ?>">
                <input type="hidden" name="tanggal_akhir" value="<?= html_escape($tanggal_akhir) ?>">
                <button type="submit" class="btn btn-laporan-primary">
                    <i class="ti ti-printer"></i> Cetak Ringkasan Periode
                </button>
            </form>
        </div>
    </section>

    <?php if (!empty($period_error)) : ?>
        <div class="period-error" role="alert"><i class="ti ti-alert-circle me-1"></i><?= html_escape($period_error) ?></div>
    <?php endif; ?>

    <form class="laporan-filter" action="<?= base_url('laporan') ?>" method="get">
        <div class="filter-fields">
            <div class="filter-title"><i class="ti ti-adjustments-horizontal me-1"></i> Filter Periode</div>
            <div class="filter-field">
                <label for="tanggal_awal">Dari tanggal</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal" value="<?= html_escape($tanggal_awal) ?>" required>
            </div>
            <div class="filter-field">
                <label for="tanggal_akhir">Sampai tanggal</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="<?= html_escape($tanggal_akhir) ?>" required>
            </div>
        </div>
        <div class="filter-actions">
            <span class="filter-note"><i class="ti ti-calendar"></i> Kalender tanggal transaksi</span>
            <a href="<?= base_url('laporan') ?>" class="btn btn-laporan-outline">Reset</a>
            <button type="submit" class="btn btn-laporan-primary"><i class="ti ti-filter"></i> Terapkan</button>
        </div>
    </form>

    <section class="summary-grid" aria-label="Ringkasan periode">
        <article class="summary-card">
            <div>
                <div class="summary-label">Jenis laporan</div>
                <div class="summary-value">3 kategori</div>
                <div class="summary-note">Pinjaman, keuangan, angsuran</div>
            </div>
            <span class="summary-icon" style="--summary-bg:#eeedff;--summary-color:#3026ad"><i class="ti ti-files"></i></span>
        </article>
        <article class="summary-card">
            <div>
                <div class="summary-label">Catatan dalam periode</div>
                <div class="summary-value"><?= $summaryAvailable ? number_format($summary['jumlah_catatan'], 0, ',', '.') : '—' ?></div>
                <div class="summary-note">Gabungan tiga sumber data</div>
            </div>
            <span class="summary-icon" style="--summary-bg:#e9f8f2;--summary-color:#16835d"><i class="ti ti-list-check"></i></span>
        </article>
        <article class="summary-card">
            <div>
                <div class="summary-label">Catatan terbaru</div>
                <div class="summary-value" style="font-size:.87rem"><?= $summaryAvailable ? html_escape($displayDate($summary['terakhir_dicatat'])) : '—' ?></div>
                <div class="summary-note">Tanggal transaksi terakhir pada periode</div>
            </div>
            <span class="summary-icon" style="--summary-bg:#eaf2ff;--summary-color:#3e70c8"><i class="ti ti-calendar-event"></i></span>
        </article>
        <article class="summary-card">
            <div>
                <div class="summary-label">Periode laporan</div>
                <div class="summary-value" style="font-size:.88rem"><?= html_escape($displayDate($tanggal_awal)) ?> – <?= html_escape($displayDate($tanggal_akhir)) ?></div>
                <div class="summary-note">Batas tanggal diterapkan ke setiap laporan</div>
            </div>
            <span class="summary-icon" style="--summary-bg:#fff4e5;--summary-color:#bd7812"><i class="ti ti-calendar"></i></span>
        </article>
    </section>

    <section class="report-grid" aria-label="Daftar laporan">
        <article class="report-card" style="--report-accent:#3026ad;--report-soft:#eeedff">
            <div class="report-card-head">
                <span class="report-chip"><i class="ti ti-briefcase"></i> Portofolio pinjaman</span>
                <span class="report-icon"><i class="ti ti-report-analytics"></i></span>
            </div>
            <h2>Laporan Data Pinjaman</h2>
            <p class="report-description">Rekap pokok pinjaman yang dicatat pada periode terpilih beserta data anggota dan tenor.</p>
            <div class="report-metrics">
                <div>
                    <div class="metric-label">Pinjaman tercatat</div>
                    <div class="metric-value"><?= $summaryAvailable ? number_format($summary['pinjaman']['jumlah'], 0, ',', '.') . ' pinjaman' : '—' ?></div>
                </div>
                <div>
                    <div class="metric-label">Total pokok disalurkan</div>
                    <div class="metric-value"><?= $summaryAvailable ? $formatReportMoney($summary['pinjaman']['total_pokok']) : '—' ?></div>
                </div>
            </div>
            <p class="report-note">Tanggal laporan mengikuti tanggal pinjaman. Nilai ini tidak mengukur tunggakan atau kolektibilitas.</p>
            <div class="report-actions">
                <a class="btn btn-print" href="<?= base_url('laporan/cetak_pinjaman?' . $periodQuery) ?>" target="_blank" rel="noopener">
                    <i class="ti ti-eye"></i> Pratinjau PDF
                </a>
                <a class="btn btn-csv" href="<?= base_url('laporan/export_csv/pinjaman?' . $periodQuery) ?>">
                    <i class="ti ti-table-export"></i> Ekspor CSV
                </a>
            </div>
        </article>

        <article class="report-card finance" style="--report-accent:#087c57;--report-soft:#e7f8ef">
            <div class="report-card-head">
                <span class="report-chip"><i class="ti ti-building-bank"></i> Pencatatan keuangan</span>
                <span class="report-icon"><i class="ti ti-chart-bar"></i></span>
            </div>
            <h2>Laporan Arus Keuangan</h2>
            <p class="report-description">Ringkasan pemasukan dan pengeluaran berdasarkan transaksi keuangan yang tersimpan.</p>
            <div class="report-metrics">
                <div>
                    <div class="metric-label">Pemasukan</div>
                    <div class="metric-value"><?= $summaryAvailable ? $formatReportMoney($summary['keuangan']['pemasukan']) : '—' ?></div>
                </div>
                <div>
                    <div class="metric-label">Pengeluaran</div>
                    <div class="metric-value"><?= $summaryAvailable ? $formatReportMoney($summary['keuangan']['pengeluaran']) : '—' ?></div>
                </div>
                <div>
                    <div class="metric-label">Selisih</div>
                    <div class="metric-value"><?= $summaryAvailable ? $formatReportMoney($summary['keuangan']['selisih']) : '—' ?></div>
                </div>
            </div>
            <p class="report-note"><?= $summaryAvailable ? number_format($summary['keuangan']['jumlah'], 0, ',', '.') . ' transaksi. Selisih bukan laporan laba/rugi usaha.' : 'Ringkasan tidak tersedia untuk rentang tanggal ini.' ?></p>
            <div class="report-actions">
                <a class="btn btn-print" href="<?= base_url('laporan/cetak_keuangan?' . $periodQuery) ?>" target="_blank" rel="noopener">
                    <i class="ti ti-eye"></i> Pratinjau PDF
                </a>
                <a class="btn btn-csv" href="<?= base_url('laporan/export_csv/keuangan?' . $periodQuery) ?>">
                    <i class="ti ti-table-export"></i> Ekspor CSV
                </a>
            </div>
        </article>

        <article class="report-card installment" style="--report-accent:#5750c9;--report-soft:#efefff">
            <div class="report-card-head">
                <span class="report-chip"><i class="ti ti-receipt"></i> Penerimaan angsuran</span>
                <span class="report-icon"><i class="ti ti-cash"></i></span>
            </div>
            <h2>Laporan Pembayaran Angsuran</h2>
            <p class="report-description">Rekap setoran angsuran yang benar-benar tercatat selama periode laporan.</p>
            <div class="report-metrics">
                <div>
                    <div class="metric-label">Pembayaran tercatat</div>
                    <div class="metric-value"><?= $summaryAvailable ? number_format($summary['angsuran']['jumlah'], 0, ',', '.') . ' transaksi' : '—' ?></div>
                </div>
                <div>
                    <div class="metric-label">Total diterima</div>
                    <div class="metric-value"><?= $summaryAvailable ? $formatReportMoney($summary['angsuran']['total_dibayar']) : '—' ?></div>
                </div>
            </div>
            <p class="report-note">Jadwal jatuh tempo dan status keterlambatan tidak tersedia pada data angsuran.</p>
            <div class="report-actions">
                <a class="btn btn-print" href="<?= base_url('laporan/cetak_angsuran?' . $periodQuery) ?>" target="_blank" rel="noopener">
                    <i class="ti ti-eye"></i> Pratinjau PDF
                </a>
                <a class="btn btn-csv" href="<?= base_url('laporan/export_csv/angsuran?' . $periodQuery) ?>">
                    <i class="ti ti-table-export"></i> Ekspor CSV
                </a>
            </div>
        </article>
    </section>

    <section class="bottom-grid">
        <article class="info-panel">
            <h3>Cakupan &amp; batasan laporan</h3>
            <p>Rekap mengambil transaksi dari rentang tanggal terpilih; isi laporan mengikuti field yang tersimpan di aplikasi.</p>
            <ul class="coverage-list">
                <li><i class="ti ti-circle-check"></i><span>Keuangan memuat arus pemasukan dan pengeluaran dari catatan transaksi.</span></li>
                <li><i class="ti ti-circle-check"></i><span>Pinjaman memakai tanggal pencatatan dan jumlah pokok pinjaman.</span></li>
                <li><i class="ti ti-circle-check"></i><span>Angsuran memuat pembayaran yang tercatat, bukan proyeksi jadwal.</span></li>
                <li><i class="ti ti-info-circle"></i><span>Unit usaha tidak bisa diterapkan seragam karena pinjaman dan angsuran tidak terhubung ke unit usaha.</span></li>
            </ul>
        </article>
        <article class="info-panel">
            <h3>Format ekspor &amp; pencetakan</h3>
            <p>Gunakan tombol di masing-masing kartu untuk mengambil laporan sesuai kategori.</p>
            <div class="format-list">
                <div class="format-row">
                    <i class="ti ti-file-text"></i>
                    <span>PDF per kategori<small>Dibuka di tab baru untuk ditinjau atau dicetak.</small></span>
                </div>
                <div class="format-row">
                    <i class="ti ti-table-export"></i>
                    <span>CSV per kategori<small>Dapat dibuka di aplikasi spreadsheet.</small></span>
                </div>
                <div class="format-row">
                    <i class="ti ti-archive"></i>
                    <span>ZIP seluruh laporan<small>Berisi tiga berkas CSV sesuai periode yang dipilih.</small></span>
                </div>
            </div>
            <p class="format-disclaimer">Riwayat unduhan dan status audit tidak dicatat oleh aplikasi.</p>
        </article>
    </section>
</main>
</div>
</div>
