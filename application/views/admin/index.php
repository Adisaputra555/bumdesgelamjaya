<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- Breadcrumb -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Home</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Jumlah Anggota</h6>
                        <h4 class="mb-3"><?= number_format($total_anggota) ?>
                            <span class="badge bg-light-primary border border-primary">
                                <i class="ti ti-users"></i>
                            </span>
                        </h4>
                        <p class="mb-0 text-muted text-sm">Data anggota aktif dalam sistem</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Saldo Tersedia</h6>
                        <h4 class="mb-3">Rp <?= number_format($saldo, 0, ',', '.') ?>
                            <span class="badge bg-light-success border border-success">
                                <i class="ti ti-currency-dollar"></i>
                            </span>
                        </h4>
                        <p class="mb-0 text-muted text-sm">Total saldo berdasarkan transaksi</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Pinjaman Belum Lunas</h6>
                        <h4 class="mb-3">Rp <?= number_format($total_pinjaman_belum_lunas, 0, ',', '.') ?>
                            <span class="badge bg-light-danger border border-danger">
                                <i class="ti ti-credit-card"></i>
                            </span>
                        </h4>
                        <p class="mb-0 text-muted text-sm">Jumlah akumulasi pinjaman belum dilunasi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row baru di bawah tiga card utama -->
        <div class="row mt-3">
            <!-- Total Pemasukan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-2 f-w-400 text-muted">Total Pemasukan</h6>
                            <h4 class="mb-0">Rp <span id="total-pemasukan">0</span></h4>
                            <p class="mb-0 text-muted text-sm">Jumlah total pemasukan dari transaksi keuangan</p>
                        </div>
                        <span class="badge bg-light-success border border-success fs-3">
                            <i class="ti ti-arrow-up-right"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Total Pengeluaran -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-2 f-w-400 text-muted">Total Pengeluaran</h6>
                            <h4 class="mb-0">Rp <span id="total-pengeluaran">0</span></h4>
                            <p class="mb-0 text-muted text-sm">Jumlah total pengeluaran dari transaksi keuangan</p>
                        </div>
                        <span class="badge bg-light-danger border border-danger fs-3">
                            <i class="ti ti-arrow-down-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="row mt-4">
            <div class="col-md-8">
                <h5 class="mb-3">Grafik Pinjaman</h5>
                <div class="card">
                    <div class="card-body">
                        <div id="grafik-batang"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h5 class="mb-3">Laba Pinjaman</h5>
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total bunga minggu ini</h6>
                        <h3 class="mb-3">Rp <span id="bunga-mingguan">0</span></h3>
                        <div id="grafik_bunga"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- [ Main Content ] end -->

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
                    height: 350,
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
                        rotate: -45
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
                        endingShape: 'rounded'
                    }
                },
                colors: ['#00E396', '#FF4560']
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
                colors: ['#3B82F6']
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

        async function refreshDashboard() {
            await updateTotalBunga();
            await updateGrafikPinjaman();
            await updateGrafikBunga();
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
            } catch (error) {
                console.error('Gagal update total pemasukan/pengeluaran:', error);
            }
        }

        // Update fungsi refreshDashboard agar memanggil pemasukan/pengeluaran juga
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