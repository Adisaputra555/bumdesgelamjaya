<style>
    .dashboard-view {
        --dashboard-ink: #1c2742;
        --dashboard-muted: #7d879b;
        --dashboard-line: #e9edf5;
        --dashboard-accent: #5268d8;
        min-height: calc(100vh - 120px);
        background: #f6f7fc;
        padding-top: 26px;
        padding-bottom: 36px;
    }

    .dashboard-hero {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        overflow: hidden;
        min-height: 132px;
        padding: 22px 26px;
        margin-bottom: 20px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 12px;
        color: #fff;
        background:
            radial-gradient(circle at 78% 12%, rgba(148, 157, 255, 0.34), transparent 32%),
            linear-gradient(112deg, #291a9a 0%, #3929bc 58%, #334acb 100%);
        box-shadow: 0 10px 24px rgba(50, 42, 166, 0.16);
    }

    .dashboard-hero::after {
        position: absolute;
        right: 16%;
        bottom: -165px;
        width: 310px;
        height: 310px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 50%;
        content: "";
        box-shadow: 0 0 0 34px rgba(255, 255, 255, 0.035), 0 0 0 68px rgba(255, 255, 255, 0.025);
        pointer-events: none;
    }

    .dashboard-hero-content,
    .dashboard-hero-actions {
        position: relative;
        z-index: 1;
    }

    .dashboard-hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        padding: 5px 9px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 99px;
        color: #e3e7ff;
        background: rgba(255, 255, 255, 0.12);
        font-size: 0.63rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .dashboard-hero-kicker::before {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #71e2c2;
        box-shadow: 0 0 12px rgba(113, 226, 194, 0.8);
        content: "";
    }

    .dashboard-hero h1 {
        margin: 0 0 5px;
        color: #fff;
        font-size: clamp(1.45rem, 3vw, 1.8rem);
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    .dashboard-hero p {
        max-width: 560px;
        margin: 0;
        color: rgba(235, 239, 255, 0.76);
        font-size: 0.78rem;
    }

    .dashboard-hero-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        min-height: 40px;
        padding: 8px 12px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 9px;
        color: #eef1ff;
        background: rgba(255, 255, 255, 0.11);
        font-size: 0.72rem;
        backdrop-filter: blur(8px);
    }

    .dashboard-hero-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 0 0 auto;
    }

    .dashboard-report-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 40px;
        padding: 8px 12px;
        border: 1px solid #fff;
        border-radius: 9px;
        color: #3125a8;
        background: #fff;
        font-size: 0.72rem;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.18s ease, box-shadow 0.18s ease;
    }

    .dashboard-report-link:hover {
        color: #211783;
        box-shadow: 0 5px 14px rgba(23, 18, 106, 0.2);
        transform: translateY(-1px);
    }

    .dashboard-section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 0 0 10px;
    }

    .dashboard-section-label {
        margin: 0;
        color: var(--dashboard-ink);
        font-size: 0.88rem;
        font-weight: 600;
        letter-spacing: -0.01em;
    }

    .dashboard-section-meta {
        margin-left: 5px;
        color: var(--dashboard-muted);
        font-size: 0.68rem;
        font-weight: 400;
    }

    .dashboard-live-note {
        color: var(--dashboard-muted);
        font-size: 0.66rem;
    }

    .dashboard-period-pill {
        padding: 4px 8px;
        border-radius: 6px;
        color: #5d6d90;
        background: #eaf0ff;
        font-size: 0.65rem;
        font-weight: 550;
    }

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 20px;
    }

    .dashboard-stat {
        position: relative;
        min-width: 0;
        overflow: hidden;
        padding: 16px 18px;
        border: 1px solid var(--dashboard-line);
        border-radius: 11px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(32, 49, 88, 0.045);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .dashboard-stat:hover,
    .dashboard-flow-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(32, 49, 88, 0.09);
    }

    .dashboard-stat-top,
    .dashboard-flow-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .dashboard-stat-label,
    .dashboard-flow-label {
        color: var(--dashboard-muted);
        font-size: 0.68rem;
        font-weight: 550;
    }

    .dashboard-stat-icon,
    .dashboard-flow-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        flex: 0 0 34px;
        border-radius: 10px;
        font-size: 1rem;
    }

    .dashboard-stat-value {
        margin: 10px 0 8px;
        color: var(--dashboard-ink);
        font-size: clamp(1.2rem, 2.4vw, 1.48rem);
        font-weight: 700;
        letter-spacing: -0.045em;
        line-height: 1.15;
        overflow-wrap: anywhere;
    }

    .dashboard-stat-note,
    .dashboard-flow-note {
        margin: 0;
        color: var(--dashboard-muted);
        font-size: 0.65rem;
    }

    .dashboard-stat--balance {
        border-color: rgba(82, 104, 216, 0.18);
        background: linear-gradient(145deg, #fff 20%, #f5f6ff 100%);
    }

    .dashboard-stat--balance .dashboard-stat-icon {
        color: #5268d8;
        background: #edf0ff;
    }

    .dashboard-stat--members .dashboard-stat-icon {
        color: #128b77;
        background: #e8f8f4;
    }

    .dashboard-stat--loans .dashboard-stat-icon {
        color: #c27a2c;
        background: #fff4e6;
    }

    .dashboard-flow-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 22px;
    }

    .dashboard-flow-card {
        padding: 16px 18px;
        border: 1px solid var(--dashboard-line);
        border-radius: 11px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(32, 49, 88, 0.045);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .dashboard-flow-icon--in {
        color: #14866e;
        background: #e8f8f4;
    }

    .dashboard-flow-icon--out {
        color: #c34f61;
        background: #fff0f2;
    }

    .dashboard-flow-value {
        margin: 9px 0 8px;
        color: var(--dashboard-ink);
        font-size: clamp(1.12rem, 2vw, 1.42rem);
        font-weight: 700;
        letter-spacing: -0.04em;
        overflow-wrap: anywhere;
    }

    .dashboard-flow-value small {
        color: var(--dashboard-muted);
        font-size: 0.64rem;
        font-weight: 550;
        letter-spacing: 0;
    }

    .dashboard-chart-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(300px, 1fr);
        gap: 16px;
    }

    .dashboard-chart-card {
        min-width: 0;
        padding: 16px;
        border: 1px solid var(--dashboard-line);
        border-radius: 11px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(32, 49, 88, 0.045);
    }

    .dashboard-chart-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 12px;
    }

    .dashboard-chart-heading h2 {
        margin: 0 0 5px;
        color: var(--dashboard-ink);
        font-size: 0.86rem;
        font-weight: 600;
    }

    .dashboard-chart-heading p {
        margin: 0;
        color: var(--dashboard-muted);
        font-size: 0.68rem;
    }

    .dashboard-chart-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        flex: 0 0 auto;
        padding: 6px 9px;
        border-radius: 99px;
        color: #607087;
        background: #f3f5fa;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .dashboard-chart-badge::before {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #5bbd9c;
        content: "";
    }

    .dashboard-interest-total {
        margin: 9px 0 4px;
        color: var(--dashboard-ink);
        font-size: 1.38rem;
        font-weight: 700;
        letter-spacing: -0.04em;
    }

    .dashboard-flow-progress {
        height: 5px;
        overflow: hidden;
        border-radius: 99px;
        background: #e7edff;
    }

    .dashboard-flow-progress span {
        display: block;
        height: 100%;
        border-radius: inherit;
        transition: width 0.3s ease;
    }

    .dashboard-flow-progress--in span {
        background: #087c53;
    }

    .dashboard-flow-progress--out span {
        background: #d83a42;
    }

    .dashboard-flow-foot {
        display: flex;
        justify-content: space-between;
        gap: 8px;
        margin-top: 7px;
        color: var(--dashboard-muted);
        font-size: 0.62rem;
    }

    .dashboard-net-badge {
        padding: 4px 8px;
        border-radius: 99px;
        color: #087c53;
        background: #d6f8e9;
        font-size: 0.64rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .dashboard-net-badge.is-negative {
        color: #b63848;
        background: #ffe4e7;
    }

    .dashboard-interest-summary {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 10px 12px;
        margin-bottom: 4px;
        border: 1px solid #e8edfb;
        border-radius: 9px;
        background: #f5f7ff;
    }

    .dashboard-interest-caption {
        color: var(--dashboard-muted);
        font-size: 0.6rem;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    #grafik-batang,
    #grafik_bunga {
        min-height: 250px;
    }

    @media (max-width: 991.98px) {
        .dashboard-chart-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .dashboard-view {
            padding-top: 16px;
        }

        .dashboard-hero {
            align-items: flex-start;
            flex-direction: column;
            padding: 20px;
            border-radius: 18px;
        }

        .dashboard-hero-actions {
            flex-wrap: wrap;
        }

        .dashboard-section-heading {
            align-items: flex-start;
        }

        .dashboard-stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .dashboard-stat {
            padding: 17px;
        }

        .dashboard-flow-grid {
            gap: 12px;
        }

        .dashboard-flow-card,
        .dashboard-chart-card {
            padding: 18px;
        }
    }

    @media (max-width: 575.98px) {
        .dashboard-stats,
        .dashboard-flow-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .dashboard-stat {
            padding: 18px 20px;
        }
    }
</style>

<?php
$dashboardTotalFlow = (float) $total_pemasukan + (float) $total_pengeluaran;
$dashboardIncomeShare = $dashboardTotalFlow > 0 ? round(((float) $total_pemasukan / $dashboardTotalFlow) * 100) : 0;
$dashboardExpenseShare = $dashboardTotalFlow > 0 ? 100 - $dashboardIncomeShare : 0;
$dashboardNetFlow = (float) $total_pemasukan - (float) $total_pengeluaran;
?>

<div class="pc-container">
    <div class="pc-content dashboard-view">
        <section class="dashboard-hero">
            <div class="dashboard-hero-content">
                <div class="dashboard-hero-kicker">BUMDes Sukses Mandiri</div>
                <h1>Ringkasan Dashboard</h1>
                <p>Pantau kondisi keuangan, anggota, dan pinjaman dalam satu tampilan.</p>
            </div>
            <div class="dashboard-hero-actions">
                <div class="dashboard-hero-date">
                    <i class="ti ti-calendar-event"></i>
                    <span><small class="d-block text-uppercase">Tanggal</small><?= date('d/m/Y') ?></span>
                </div>
                <a class="dashboard-report-link" href="<?= base_url('Laporan') ?>">
                    <i class="ti ti-download"></i><span>Lihat Laporan</span>
                </a>
            </div>
        </section>

        <div class="dashboard-section-heading">
            <h2 class="dashboard-section-label">Ikhtisar Finansial <span class="dashboard-period-pill">Data keseluruhan</span></h2>
            <span class="dashboard-live-note">Pembaruan data otomatis</span>
        </div>
        <section class="dashboard-stats" aria-label="Ikhtisar">
            <article class="dashboard-stat dashboard-stat--balance">
                <div class="dashboard-stat-top">
                    <span class="dashboard-stat-label">Saldo tersedia</span>
                    <span class="dashboard-stat-icon"><i class="ti ti-wallet"></i></span>
                </div>
                <div class="dashboard-stat-value">Rp <?= number_format($saldo, 0, ',', '.') ?></div>
                <p class="dashboard-stat-note">Posisi saldo berdasarkan transaksi</p>
            </article>

            <article class="dashboard-stat dashboard-stat--members">
                <div class="dashboard-stat-top">
                    <span class="dashboard-stat-label">Jumlah anggota</span>
                    <span class="dashboard-stat-icon"><i class="ti ti-users"></i></span>
                </div>
                <div class="dashboard-stat-value"><?= number_format($total_anggota, 0, ',', '.') ?></div>
                <p class="dashboard-stat-note">Anggota terdaftar dalam sistem</p>
            </article>

            <article class="dashboard-stat dashboard-stat--loans">
                <div class="dashboard-stat-top">
                    <span class="dashboard-stat-label">Pinjaman belum lunas</span>
                    <span class="dashboard-stat-icon"><i class="ti ti-credit-card"></i></span>
                </div>
                <div class="dashboard-stat-value">Rp <?= number_format($total_pinjaman_belum_lunas, 0, ',', '.') ?></div>
                <p class="dashboard-stat-note">Akumulasi pinjaman aktif</p>
            </article>
        </section>

        <div class="dashboard-section-heading">
            <h2 class="dashboard-section-label">Arus Keuangan <span class="dashboard-section-meta">(Rasio pemasukan dan pengeluaran)</span></h2>
            <span id="dashboard-net-flow" class="dashboard-net-badge <?= $dashboardNetFlow < 0 ? 'is-negative' : '' ?>">Arus kas <?= $dashboardNetFlow >= 0 ? 'positif' : 'negatif' ?> · Rp <?= number_format(abs($dashboardNetFlow), 0, ',', '.') ?></span>
        </div>
        <section class="dashboard-flow-grid" aria-label="Arus keuangan">
            <article class="dashboard-flow-card">
                <div class="dashboard-flow-top">
                    <span class="dashboard-flow-label">Total pemasukan</span>
                    <span class="dashboard-flow-icon dashboard-flow-icon--in"><i class="ti ti-arrow-up-right"></i></span>
                </div>
                <div class="dashboard-flow-value"><small>Rp</small> <span id="total-pemasukan"><?= number_format($total_pemasukan, 0, ',', '.') ?></span></div>
                <div id="dashboard-income-progress" class="dashboard-flow-progress dashboard-flow-progress--in" role="progressbar" aria-label="Porsi pemasukan" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?= $dashboardIncomeShare ?>">
                    <span style="width: <?= $dashboardIncomeShare ?>%;"></span>
                </div>
                <div class="dashboard-flow-foot">
                    <span>Akumulasi transaksi pemasukan</span>
                    <strong><span id="dashboard-income-share"><?= $dashboardIncomeShare ?></span>% dari total arus</strong>
                </div>
            </article>

            <article class="dashboard-flow-card">
                <div class="dashboard-flow-top">
                    <span class="dashboard-flow-label">Total pengeluaran</span>
                    <span class="dashboard-flow-icon dashboard-flow-icon--out"><i class="ti ti-arrow-down-right"></i></span>
                </div>
                <div class="dashboard-flow-value"><small>Rp</small> <span id="total-pengeluaran"><?= number_format($total_pengeluaran, 0, ',', '.') ?></span></div>
                <div id="dashboard-expense-progress" class="dashboard-flow-progress dashboard-flow-progress--out" role="progressbar" aria-label="Porsi pengeluaran" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?= $dashboardExpenseShare ?>">
                    <span style="width: <?= $dashboardExpenseShare ?>%;"></span>
                </div>
                <div class="dashboard-flow-foot">
                    <span>Akumulasi transaksi pengeluaran</span>
                    <strong><span id="dashboard-expense-share"><?= $dashboardExpenseShare ?></span>% dari total arus</strong>
                </div>
            </article>
        </section>

        <div class="dashboard-section-heading">
            <h2 class="dashboard-section-label">Analisis &amp; Tren Pinjaman</h2>
            <span class="dashboard-live-note">Tahun <?= date('Y') ?></span>
        </div>
        <section class="dashboard-chart-grid" aria-label="Analisis pinjaman">
            <article class="dashboard-chart-card">
                <div class="dashboard-chart-heading">
                    <div>
                        <h2>Grafik Pinjaman</h2>
                        <p>Perbandingan jumlah yang sudah dan belum dibayar</p>
                    </div>
                    <span class="dashboard-chart-badge">Data terkini</span>
                </div>
                <div id="grafik-batang"></div>
            </article>

            <article class="dashboard-chart-card">
                <div class="dashboard-chart-heading">
                    <div>
                        <h2>Laba &amp; Hasil Bunga</h2>
                        <p>Total bunga terkumpul per bulan</p>
                    </div>
                    <span class="dashboard-chart-badge">Mingguan</span>
                </div>
                <div class="dashboard-interest-summary">
                    <div>
                        <div class="dashboard-interest-caption">Nominal bunga minggu ini</div>
                        <div class="dashboard-interest-total">Rp <span id="bunga-mingguan">0</span></div>
                    </div>
                </div>
                <div id="grafik_bunga"></div>
            </article>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Chart instances
        let chartPinjaman = null;
        let chartBunga = null;

        async function fetchJSON(url) {
            try {
                const res = await fetch(url);
                return await res.json();
            } catch (err) {
                console.error('Error fetching', url, err);
                return null;
            }
        }

        async function updateTotalBunga() {
            const data = await fetchJSON('<?= base_url('dashboard/get_total_bunga_mingguan') ?>');
            if (data && data.status) {
                document.getElementById('bunga-mingguan').innerText = parseInt(data.total_bunga).toLocaleString('id-ID');
            }
        }

        async function updateGrafikPinjaman() {
            const data = await fetchJSON('<?= base_url('dashboard/get_grafik_pinjaman') ?>');
            if (!data) return;

            const options = {
                chart: {
                    type: 'bar',
                    height: 320,
                    fontFamily: 'Public Sans, sans-serif',
                    foreColor: '#7d879b',
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                        name: 'Sudah Dibayar',
                        data: data.dibayar || []
                    },
                    {
                        name: 'Belum Dibayar',
                        data: data.belum_dibayar || []
                    }
                ],
                xaxis: {
                    categories: data.categories || [],
                    labels: {
                        rotate: -35,
                        style: {
                            fontSize: '11px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah (Rp)'
                    },
                    labels: {
                        formatter: val => 'Rp ' + parseInt(val).toLocaleString()
                    }
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: {
                        formatter: val => 'Rp ' + parseInt(val).toLocaleString()
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '60%',
                        borderRadius: 6
                    }
                },
                grid: {
                    borderColor: '#edf0f6',
                    strokeDashArray: 4
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'left',
                    markers: {
                        radius: 6
                    }
                },
                colors: ['#20b99a', '#6578e8']
            };

            if (!chartPinjaman) {
                chartPinjaman = new ApexCharts(document.querySelector("#grafik-batang"), options);
                chartPinjaman.render();
            } else {
                chartPinjaman.updateOptions({
                    series: options.series,
                    xaxis: {
                        categories: options.xaxis.categories
                    }
                });
            }
        }

        async function updateGrafikBunga() {
            const data = await fetchJSON('<?= base_url('dashboard/get_grafik_bunga_per_bulan') ?>');
            if (!data) return;

            const options = {
                chart: {
                    type: 'bar',
                    height: 250,
                    fontFamily: 'Public Sans, sans-serif',
                    foreColor: '#7d879b',
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Total Laba/Bunga',
                    data: data.values || []
                }],
                xaxis: {
                    categories: data.categories || [],
                    title: {
                        text: 'Bulan'
                    }
                },
                yaxis: {
                    labels: {
                        formatter: val => 'Rp ' + parseInt(val).toLocaleString()
                    }
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: {
                        formatter: val => 'Rp ' + parseInt(val).toLocaleString()
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '48%',
                        borderRadius: 6
                    }
                },
                grid: {
                    borderColor: '#edf0f6',
                    strokeDashArray: 4
                },
                colors: ['#5268d8']
            };

            if (!chartBunga) {
                chartBunga = new ApexCharts(document.querySelector("#grafik_bunga"), options);
                chartBunga.render();
            } else {
                chartBunga.updateOptions({
                    series: options.series,
                    xaxis: {
                        categories: options.xaxis.categories
                    }
                });
            }
        }

        async function updateTotalPemasukanPengeluaran() {
            try {
                const pemasukanData = await fetchJSON('<?= base_url("dashboard/get_total_pemasukan_ajax") ?>');
                if (pemasukanData && pemasukanData.status) {
                    document.getElementById('total-pemasukan').innerText = pemasukanData.total_pemasukan;
                }

                const pengeluaranData = await fetchJSON('<?= base_url("dashboard/get_total_pengeluaran_ajax") ?>');
                if (pengeluaranData && pengeluaranData.status) {
                    document.getElementById('total-pengeluaran').innerText = pengeluaranData.total_pengeluaran;
                }

                updateFlowSummary();
            } catch (error) {
                console.error('Gagal update total pemasukan/pengeluaran:', error);
            }
        }

        function updateFlowSummary() {
            const pemasukan = Number(document.getElementById('total-pemasukan').textContent.replace(/[^\d-]/g, '')) || 0;
            const pengeluaran = Number(document.getElementById('total-pengeluaran').textContent.replace(/[^\d-]/g, '')) || 0;
            const totalArus = pemasukan + pengeluaran;
            const porsiPemasukan = totalArus > 0 ? Math.round((pemasukan / totalArus) * 100) : 0;
            const porsiPengeluaran = totalArus > 0 ? 100 - porsiPemasukan : 0;

            const pemasukanProgress = document.getElementById('dashboard-income-progress');
            pemasukanProgress.setAttribute('aria-valuenow', porsiPemasukan);
            pemasukanProgress.firstElementChild.style.width = porsiPemasukan + '%';
            document.getElementById('dashboard-income-share').textContent = porsiPemasukan;

            const pengeluaranProgress = document.getElementById('dashboard-expense-progress');
            pengeluaranProgress.setAttribute('aria-valuenow', porsiPengeluaran);
            pengeluaranProgress.firstElementChild.style.width = porsiPengeluaran + '%';
            document.getElementById('dashboard-expense-share').textContent = porsiPengeluaran;

            const arusBersih = pemasukan - pengeluaran;
            const arusBadge = document.getElementById('dashboard-net-flow');
            arusBadge.classList.toggle('is-negative', arusBersih < 0);
            arusBadge.textContent = 'Arus kas ' + (arusBersih >= 0 ? 'positif' : 'negatif') +
                ' · Rp ' + Math.abs(arusBersih).toLocaleString('id-ID');
        }

        async function refreshDashboard() {
            await updateTotalBunga();
            await updateGrafikPinjaman();
            await updateGrafikBunga();
            await updateTotalPemasukanPengeluaran(); // panggil setelah update chart & bunga
        }

        // Refresh pertama kali
        refreshDashboard();

        // Refresh otomatis setiap 10 detik
        setInterval(refreshDashboard, 10000);

    });
</script>