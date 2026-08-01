
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Laporan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Laporan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Card Laporan Pinjaman -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Pinjaman</h5>
                        <p class="card-text">Cetak laporan data pinjaman berdasarkan rentang tanggal.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPinjaman">Cetak</button>
                    </div>
                </div>
            </div>

            <!-- Card Laporan Keuangan -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Keuangan</h5>
                        <p class="card-text">Cetak laporan pemasukan dan pengeluaran keuangan.</p>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalKeuangan">Cetak</button>
                    </div>
                </div>
            </div>

            <!-- Card Laporan Angsuran -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Angsuran</h5>
                        <p class="card-text">Cetak laporan pembayaran angsuran berdasarkan pinjaman.</p>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalAngsuran">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pinjaman -->
<div class="modal fade" id="modalPinjaman" tabindex="-1" aria-labelledby="modalPinjamanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('laporan/cetak_pinjaman') ?>" method="get" target="_blank" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPinjamanLabel">Filter Laporan Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <label>Dari Tanggal</label>
                <input type="date" name="tanggal_awal" class="form-control mb-2" required>
                <label>Sampai Tanggal</label>
                <input type="date" name="tanggal_akhir" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak PDF</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Keuangan -->
<div class="modal fade" id="modalKeuangan" tabindex="-1" aria-labelledby="modalKeuanganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('laporan/cetak_keuangan') ?>" method="get" target="_blank" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKeuanganLabel">Filter Laporan Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <label>Dari Tanggal</label>
                <input type="date" name="tanggal_awal" class="form-control mb-2" required>
                <label>Sampai Tanggal</label>
                <input type="date" name="tanggal_akhir" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak PDF</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Angsuran -->
<div class="modal fade" id="modalAngsuran" tabindex="-1" aria-labelledby="modalAngsuranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('laporan/cetak_angsuran') ?>" method="get" target="_blank" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAngsuranLabel">Filter Laporan Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <label>Dari Tanggal</label>
                <input type="date" name="tanggal_awal" class="form-control mb-2" required>
                <label>Sampai Tanggal</label>
                <input type="date" name="tanggal_akhir" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Cetak PDF</button>
            </div>
        </form>
    </div>
</div>