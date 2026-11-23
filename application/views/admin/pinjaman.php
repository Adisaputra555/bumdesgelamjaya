<style>
    .pinjaman-page {
        --pinjaman-ink: #1d2742;
        --pinjaman-muted: #778198;
        --pinjaman-border: #e9edf5;
        padding: 18px 0 30px;
        background: #f6f7fc;
        min-height: calc(100vh - 120px);
    }

    .pinjaman-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 15px;
        color: #788198;
        font-size: .68rem;
    }

    .pinjaman-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .pinjaman-breadcrumbs a:hover,
    .pinjaman-breadcrumbs strong {
        color: #2920a6;
    }

    .pinjaman-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 16px;
    }

    .pinjaman-kicker {
        margin-bottom: 5px;
        color: #3026ad;
        font-size: .62rem;
        font-weight: 700;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .pinjaman-kicker span {
        margin-left: 5px;
        color: var(--pinjaman-muted);
        font-size: .63rem;
        font-weight: 400;
        letter-spacing: 0;
        text-transform: none;
    }

    .pinjaman-heading h1 {
        margin: 0 0 4px;
        color: var(--pinjaman-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 650;
        letter-spacing: -.035em;
    }

    .pinjaman-heading p {
        max-width: 650px;
        margin: 0;
        color: var(--pinjaman-muted);
        font-size: .72rem;
        line-height: 1.6;
    }

    .pinjaman-heading-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .pinjaman-heading-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 7px;
        font-size: .68rem;
        font-weight: 550;
    }

    .pinjaman-btn-export {
        border: 1px solid var(--pinjaman-border);
        color: #3c465d;
        background: #fff;
    }

    .pinjaman-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .pinjaman-btn-add:hover {
        border-color: #1b1079;
        color: #fff;
        background: #1b1079;
    }

    .pinjaman-summary-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 14px;
    }

    .pinjaman-summary-card {
        min-width: 0;
        padding: 14px 15px 11px;
        border: 1px solid var(--pinjaman-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .pinjaman-summary-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 9px;
    }

    .pinjaman-summary-label {
        color: #737d93;
        font-size: .6rem;
        font-weight: 650;
        letter-spacing: .06em;
        text-transform: uppercase;
    }

    .pinjaman-summary-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        flex: 0 0 27px;
        border-radius: 7px;
        color: #3026ad;
        background: #edf0ff;
    }

    .pinjaman-summary-card:nth-child(2) .pinjaman-summary-icon {
        color: #138363;
        background: #dcfaef;
    }

    .pinjaman-summary-card:nth-child(3) .pinjaman-summary-icon {
        color: #6a54d8;
        background: #eeebff;
    }

    .pinjaman-summary-value {
        margin: 0;
        color: var(--pinjaman-ink);
        font-size: clamp(1.12rem, 1.8vw, 1.42rem);
        font-weight: 700;
        letter-spacing: -.04em;
        overflow-wrap: anywhere;
    }

    .pinjaman-summary-note {
        margin: 5px 0 8px;
        color: var(--pinjaman-muted);
        font-size: .61rem;
    }

    .pinjaman-summary-bar {
        height: 3px;
        overflow: hidden;
        border-radius: 99px;
        background: #e8edff;
    }

    .pinjaman-summary-bar span {
        display: block;
        width: 0;
        height: 100%;
        border-radius: inherit;
        background: #2c1aa2;
        transition: width .25s ease;
    }

    .pinjaman-summary-card:nth-child(2) .pinjaman-summary-bar span {
        background: #138363;
    }

    .pinjaman-summary-card:nth-child(3) .pinjaman-summary-bar span {
        background: #7866e4;
    }

    .pinjaman-toolbar {
        display: grid;
        grid-template-columns: minmax(180px, 1.5fr) minmax(130px, .7fr) minmax(160px, .85fr) 34px;
        gap: 8px;
        margin-bottom: 12px;
        padding: 9px;
        border: 1px solid var(--pinjaman-border);
        border-radius: 9px;
        background: #fff;
    }

    .pinjaman-search {
        position: relative;
    }

    .pinjaman-search i {
        position: absolute;
        top: 50%;
        left: 10px;
        color: #7d879e;
        transform: translateY(-50%);
    }

    .pinjaman-search input,
    .pinjaman-filter {
        min-height: 34px;
        border-color: transparent;
        border-radius: 6px;
        background-color: #f1f4ff;
        color: #39445b;
        font-size: .65rem;
        box-shadow: none !important;
    }

    .pinjaman-search input {
        padding-left: 31px;
    }

    .pinjaman-search input:focus,
    .pinjaman-filter:focus {
        border-color: #c9c4fa;
        background-color: #fff;
    }

    .pinjaman-filter-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        min-height: 34px;
        border: 1px solid var(--pinjaman-border);
        border-radius: 6px;
        color: #4c5870;
        background: #fff;
    }

    .pinjaman-filter-reset:hover {
        color: #3026ad;
        background: #f6f5ff;
    }

    .pinjaman-table-card {
        overflow: hidden;
        border: 1px solid var(--pinjaman-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .pinjaman-table-wrap {
        overflow-x: auto;
    }

    .pinjaman-table {
        width: 100%;
        min-width: 740px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .pinjaman-table thead th {
        padding: 12px 10px;
        border: 0;
        color: #6b748b;
        background: #f0f3ff;
        font-size: .58rem;
        font-weight: 700;
        letter-spacing: .055em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .pinjaman-table tbody td {
        padding: 12px 10px;
        border-bottom: 1px solid #f0f2f7;
        color: #354057;
        font-size: .66rem;
        vertical-align: middle;
    }

    .pinjaman-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .pinjaman-table tbody tr:hover {
        background: #fafbff;
    }

    .pinjaman-table .pinjaman-number {
        width: 35px;
        color: #7c869b;
    }

    .pinjaman-member {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 180px;
    }

    .pinjaman-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border-radius: 50%;
        color: #3026ad;
        background: #e7eaff;
        font-size: .58rem;
        font-weight: 700;
    }

    .pinjaman-avatar.is-green {
        color: #087352;
        background: #d6faeb;
    }

    .pinjaman-avatar.is-coral {
        color: #b94a48;
        background: #ffe3e1;
    }

    .pinjaman-avatar.is-blue {
        color: #3158b8;
        background: #e4edff;
    }

    .pinjaman-member-name {
        display: block;
        color: #202a42;
        font-size: .68rem;
        font-weight: 650;
    }

    .pinjaman-member-id,
    .pinjaman-cell-note {
        display: block;
        margin-top: 3px;
        color: #838ca0;
        font-size: .57rem;
    }

    .pinjaman-money {
        display: block;
        color: #28334b;
        font-size: .66rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .pinjaman-money.is-green {
        color: #138363;
    }

    .pinjaman-money.is-red {
        color: #d35454;
    }

    .pinjaman-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 99px;
        font-size: .58rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .pinjaman-status::before {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        content: "";
    }

    .pinjaman-status.is-active {
        color: #087352;
        background: #d6faeb;
    }

    .pinjaman-status.is-paid {
        color: #5141bd;
        background: #e9e5ff;
    }

    .pinjaman-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .pinjaman-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border: 1px solid #e8ebf3;
        border-radius: 6px;
        color: #47536d;
        background: #fff;
    }

    .pinjaman-action-btn:hover {
        border-color: #d9d4ff;
        color: #3026ad;
        background: #f6f5ff;
    }

    .pinjaman-action-btn.is-danger:hover {
        border-color: #ffd2d2;
        color: #c14444;
        background: #fff5f5;
    }

    .pinjaman-empty {
        padding: 35px 16px !important;
        color: #7b859a !important;
        text-align: center;
    }

    .pinjaman-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 13px;
        border-top: 1px solid #eef0f6;
        color: #788198;
        font-size: .61rem;
    }

    .pinjaman-pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .pinjaman-page-btn {
        min-width: 27px;
        height: 27px;
        padding: 0 8px;
        border: 1px solid transparent;
        border-radius: 6px;
        color: #354057;
        background: transparent;
        font-size: .6rem;
    }

    .pinjaman-page-btn:disabled {
        color: #a4aabc;
        cursor: default;
    }

    .pinjaman-page-btn:not(:disabled):hover {
        background: #f1f3ff;
    }

    .pinjaman-page-indicator {
        color: #fff;
        background: #3026ad;
    }

    .pinjaman-page-indicator:hover {
        color: #fff;
        background: #3026ad !important;
    }

    .pinjaman-info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-top: 13px;
    }

    .pinjaman-info-card {
        min-width: 0;
        padding: 15px;
        border: 1px solid var(--pinjaman-border);
        border-radius: 9px;
        background: #fff;
    }

    .pinjaman-info-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0 0 8px;
        color: #25304a;
        font-size: .75rem;
        font-weight: 650;
    }

    .pinjaman-info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border-radius: 7px;
        color: #3026ad;
        background: #edf0ff;
    }

    .pinjaman-info-card p {
        margin: 0 0 11px;
        color: #69748c;
        font-size: .64rem;
        line-height: 1.65;
    }

    .pinjaman-info-formula {
        padding: 9px 10px;
        border-radius: 7px;
        color: #2c3472;
        background: #f2f4ff;
        font-size: .62rem;
        line-height: 1.6;
    }

    .pinjaman-info-steps {
        display: grid;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pinjaman-info-steps li {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        padding: 7px 8px;
        border-radius: 6px;
        color: #525e75;
        background: #f2f5ff;
        font-size: .6rem;
        line-height: 1.5;
    }

    .pinjaman-step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 17px;
        height: 17px;
        flex: 0 0 17px;
        border-radius: 50%;
        color: #3026ad;
        background: #e1e6ff;
        font-size: .56rem;
        font-weight: 700;
    }

    .pinjaman-modal .modal-content {
        overflow: hidden;
        border: 1px solid #e9edf5;
        border-radius: 12px;
        box-shadow: 0 18px 50px rgba(26, 34, 60, .16);
    }

    .pinjaman-modal .modal-header {
        border-bottom-color: #edf0f6;
        background: #fafbff;
    }

    .pinjaman-modal .modal-title {
        color: var(--pinjaman-ink);
        font-size: .95rem;
        font-weight: 650;
    }

    .pinjaman-modal .form-label {
        margin-bottom: 5px;
        color: #46516a;
        font-size: .7rem;
        font-weight: 600;
    }

    .pinjaman-modal .form-control,
    .pinjaman-modal .form-select {
        min-height: 39px;
        border-color: #e2e7f0;
        border-radius: 7px;
        font-size: .74rem;
    }

    .pinjaman-modal .form-control:focus,
    .pinjaman-modal .form-select:focus {
        border-color: #aaa4ed;
        box-shadow: 0 0 0 .18rem rgba(48, 38, 173, .1);
    }

    .pinjaman-modal .modal-footer .btn {
        border-radius: 7px;
        font-size: .72rem;
    }

    @media (max-width: 800px) {
        .pinjaman-toolbar {
            grid-template-columns: minmax(150px, 1fr) minmax(125px, .7fr);
        }

        .pinjaman-search {
            grid-column: 1 / -1;
        }

        .pinjaman-filter-reset {
            width: 100%;
        }
    }

    @media (max-width: 600px) {
        .pinjaman-page {
            padding-top: 12px;
        }

        .pinjaman-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .pinjaman-heading-actions {
            width: 100%;
        }

        .pinjaman-heading-actions .btn {
            flex: 1;
            justify-content: center;
        }

        .pinjaman-summary-grid {
            grid-template-columns: 1fr;
            gap: 8px;
        }

        .pinjaman-summary-card {
            padding: 12px;
        }

        .pinjaman-toolbar {
            grid-template-columns: 1fr 1fr;
        }

        .pinjaman-info-grid {
            grid-template-columns: 1fr;
        }

        .pinjaman-table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .pinjaman-pagination {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content">
        <main class="pinjaman-page">
            <nav class="pinjaman-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url('dashboard'); ?>">Beranda</a>
                <span>/</span>
                <a href="<?= base_url('dashboard'); ?>">Dasbor</a>
                <span>/</span>
                <strong aria-current="page">Pinjaman</strong>
                <span class="ms-1">•</span>
                <span class="badge rounded-pill text-bg-light">Unit Simpan Pinjam (USP)</span>
            </nav>

            <header class="pinjaman-heading">
                <div>
                    <div class="pinjaman-kicker">Pengelolaan pembiayaan <span>• Data pinjaman BUMDes</span></div>
                    <h1>Manajemen Pinjaman</h1>
                    <p>Kelola penyaluran pinjaman, pantau angsuran, dan lihat sisa tagihan berdasarkan data pembayaran yang tercatat.</p>
                </div>
                <div class="pinjaman-heading-actions">
                    <button class="btn pinjaman-btn-export" id="btnExportPinjaman" type="button"><i class="ti ti-download"></i> Ekspor Data</button>
                    <button class="btn pinjaman-btn-add" type="button" data-bs-toggle="modal" data-bs-target="#createModal"><i class="ti ti-plus"></i> Tambah Pinjaman</button>
                </div>
            </header>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show py-2 small" role="alert">
                    <?= html_escape($this->session->flashdata('success')); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show py-2 small" role="alert">
                    <?= html_escape($this->session->flashdata('error')); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>

            <section class="pinjaman-summary-grid" aria-label="Ringkasan pinjaman">
                <article class="pinjaman-summary-card">
                    <div class="pinjaman-summary-top">
                        <span class="pinjaman-summary-label">Total Pinjaman Disalurkan</span>
                        <span class="pinjaman-summary-icon"><i class="ti ti-building-bank"></i></span>
                    </div>
                    <p class="pinjaman-summary-value" id="summaryDisbursed">—</p>
                    <p class="pinjaman-summary-note" id="summaryDisbursedNote">Pokok pinjaman seluruh data</p>
                    <div class="pinjaman-summary-bar"><span id="summaryDisbursedBar"></span></div>
                </article>
                <article class="pinjaman-summary-card">
                    <div class="pinjaman-summary-top">
                        <span class="pinjaman-summary-label">Sisa Pinjaman Aktif</span>
                        <span class="pinjaman-summary-icon"><i class="ti ti-cash"></i></span>
                    </div>
                    <p class="pinjaman-summary-value" id="summaryOutstanding">—</p>
                    <p class="pinjaman-summary-note" id="summaryOutstandingNote">Tagihan yang belum lunas</p>
                    <div class="pinjaman-summary-bar"><span id="summaryOutstandingBar"></span></div>
                </article>
                <article class="pinjaman-summary-card">
                    <div class="pinjaman-summary-top">
                        <span class="pinjaman-summary-label">Total Angsuran Tercatat</span>
                        <span class="pinjaman-summary-icon"><i class="ti ti-receipt"></i></span>
                    </div>
                    <p class="pinjaman-summary-value" id="summaryRepaid">—</p>
                    <p class="pinjaman-summary-note" id="summaryRepaidNote">Akumulasi pembayaran masuk</p>
                    <div class="pinjaman-summary-bar"><span id="summaryRepaidBar"></span></div>
                </article>
            </section>

            <section class="pinjaman-toolbar" aria-label="Pencarian dan filter pinjaman">
                <label class="pinjaman-search">
                    <i class="ti ti-search" aria-hidden="true"></i>
                    <input type="search" class="form-control" id="searchPinjaman" placeholder="Cari nama anggota atau ID pinjaman..." autocomplete="off" aria-label="Cari pinjaman">
                </label>
                <select class="form-select pinjaman-filter" id="filterStatusPinjaman" aria-label="Filter status">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="lunas">Lunas</option>
                </select>
                <select class="form-select pinjaman-filter" id="sortPinjaman" aria-label="Urutkan pinjaman">
                    <option value="newest">Urutkan: Terbaru</option>
                    <option value="amount">Urutkan: Pokok Terbesar</option>
                    <option value="oldest">Urutkan: Terlama</option>
                </select>
                <button class="pinjaman-filter-reset" id="resetFilterPinjaman" type="button" aria-label="Reset semua filter" title="Reset semua filter"><i class="ti ti-filter"></i></button>
            </section>

            <section class="pinjaman-table-card" aria-label="Daftar pinjaman">
                <div class="pinjaman-table-wrap">
                    <table class="table pinjaman-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Anggota</th>
                                <th>Pokok Pinjaman</th>
                                <th>Tenor &amp; Angsuran</th>
                                <th>Status</th>
                                <th>Tanggal Pinjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pinjamanBody">
                            <tr><td class="pinjaman-empty" colspan="7">Memuat data pinjaman...</td></tr>
                        </tbody>
                    </table>
                </div>
                <footer class="pinjaman-table-footer">
                    <span id="pinjamanCount">Memuat data...</span>
                    <nav class="pinjaman-pagination" aria-label="Navigasi halaman pinjaman">
                        <button class="pinjaman-page-btn" id="prevPinjamanPage" type="button">Sebelumnya</button>
                        <span class="pinjaman-page-btn pinjaman-page-indicator" id="pinjamanPageIndicator" aria-current="page">1 / 1</span>
                        <button class="pinjaman-page-btn" id="nextPinjamanPage" type="button">Selanjutnya</button>
                    </nav>
                </footer>
            </section>

            <section class="pinjaman-info-grid" aria-label="Informasi pinjaman">
                <article class="pinjaman-info-card">
                    <h2 class="pinjaman-info-title"><span class="pinjaman-info-icon"><i class="ti ti-calculator"></i></span>Perhitungan Pinjaman</h2>
                    <p>Jumlah angsuran dihitung dari pokok pinjaman dan bunga per bulan sesuai nilai yang dimasukkan saat pinjaman dibuat.</p>
                    <div class="pinjaman-info-formula">
                        <strong>Total tagihan</strong> = pokok + (pokok × bunga bulanan × tenor)<br>
                        <strong>Angsuran bulanan</strong> = total tagihan ÷ tenor
                    </div>
                </article>
                <article class="pinjaman-info-card">
                    <h2 class="pinjaman-info-title"><span class="pinjaman-info-icon"><i class="ti ti-shield-check"></i></span>Pengelolaan Pembayaran</h2>
                    <p>Gunakan data pembayaran tercatat untuk memantau status pinjaman. Informasi jatuh tempo tidak ditampilkan karena belum tersedia pada data pinjaman.</p>
                    <ol class="pinjaman-info-steps">
                        <li><span class="pinjaman-step-number">1</span><span>Periksa sisa tagihan sebelum menerima pembayaran berikutnya.</span></li>
                        <li><span class="pinjaman-step-number">2</span><span>Simpan pembayaran melalui tombol angsuran pada pinjaman aktif.</span></li>
                        <li><span class="pinjaman-step-number">3</span><span>Gunakan menu Angsuran untuk melihat riwayat pembayaran lebih lanjut.</span></li>
                    </ol>
                </article>
            </section>
        </main>
    </div>
</div>

<div class="modal fade pinjaman-modal" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title">Tambah Pinjaman</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="alert alert-info mx-3 mt-3 mb-0 py-2 small">
                <strong>Saldo tersedia:</strong>
                <span id="saldoTersediaText" data-saldo="<?= (float) $saldo; ?>">Rp <?= number_format($saldo, 0, ',', '.'); ?></span>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="createNama">Nama Anggota <span class="text-danger">*</span></label>
                    <select class="form-select" name="anggota_id" id="createNama" required>
                        <option value="">Pilih anggota...</option>
                        <?php foreach ($anggota as $a): ?>
                            <option value="<?= (int) $a->id; ?>"><?= html_escape($a->nama); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Nama anggota wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createTanggalPinjam">Tanggal Pinjam <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="tanggal_pinjam" id="createTanggalPinjam" required>
                    <div class="invalid-feedback">Tanggal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createJumlahPinjam">Jumlah Pinjam (Rp) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="jumlah_pinjam" id="createJumlahPinjam" min="1" step="1" required>
                    <div class="text-danger mt-1 small d-none" id="jumlahPinjamWarning">Jumlah pinjaman melebihi saldo tersedia.</div>
                    <div class="invalid-feedback">Jumlah pinjaman wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createBunga">Bunga (% per bulan) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="bunga" id="createBunga" min="0" step="0.01" required>
                    <div class="invalid-feedback">Bunga wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createTenor">Tenor (Bulan) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="tenor" id="createTenor" min="1" step="1" required>
                    <div class="invalid-feedback">Tenor wajib diisi.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="submitPinjaman">Simpan Pinjaman</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade pinjaman-modal" id="angsuranModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="angsuranForm" class="modal-content needs-validation" novalidate enctype="multipart/form-data">
            <div class="modal-header">
                <h2 class="modal-title">Bayar Angsuran</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="pinjaman_id" id="angsuranPinjamanId">
                <div class="mb-3">
                    <label class="form-label" for="angsuranKe">Angsuran Ke</label>
                    <input type="number" class="form-control" id="angsuranKe" name="angsuran_ke" readonly required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tanggalBayar">Tanggal Bayar <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggalBayar" name="tanggal_bayar" value="<?= date('Y-m-d'); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jumlahBayar">Jumlah Bayar (Rp) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="jumlahBayar" name="jumlah_bayar" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="buktiPembayaran">Bukti Pembayaran <span class="text-muted fw-normal">(opsional)</span></label>
                    <input type="file" class="form-control" id="buktiPembayaran" name="bukti_pembayaran" accept="image/*,application/pdf">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        const pinjamanBody = document.getElementById('pinjamanBody');
        const searchInput = document.getElementById('searchPinjaman');
        const statusFilter = document.getElementById('filterStatusPinjaman');
        const sortSelect = document.getElementById('sortPinjaman');
        const pageSize = 6;
        let allPinjaman = [];
        let currentPage = 1;

        const formatRupiah = (value) => 'Rp ' + new Intl.NumberFormat('id-ID', {
            maximumFractionDigits: 0
        }).format(Number(value) || 0);

        const escapeHTML = (value) => String(value == null ? '' : value).replace(/[&<>"']/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[char]);

        const parseDate = (value) => {
            if (!value || value === '-') return null;
            const date = new Date(String(value).replace(' ', 'T'));
            return Number.isNaN(date.getTime()) ? null : date;
        };

        const formatDate = (value) => {
            const date = parseDate(value);
            return date ? new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            }).format(date) : '—';
        };

        const initials = (name) => String(name || '')
            .trim()
            .split(/\s+/)
            .filter(Boolean)
            .slice(0, 2)
            .map((part) => part.charAt(0).toUpperCase())
            .join('') || '—';

        const filteredPinjaman = () => {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const selectedStatus = statusFilter.value;
            const result = allPinjaman.filter((item) => {
                const name = String(item.nama_anggota || '').toLocaleLowerCase('id-ID');
                const id = String(item.id || '').toLocaleLowerCase('id-ID');
                const status = String(item.status_label || '').toLocaleLowerCase('id-ID');
                return (!keyword || name.includes(keyword) || id.includes(keyword)) &&
                    (!selectedStatus || status === selectedStatus);
            });

            if (sortSelect.value === 'amount') {
                result.sort((a, b) => Number(b.jumlah_pinjam_raw) - Number(a.jumlah_pinjam_raw));
            } else {
                result.sort((a, b) => {
                    const dateA = parseDate(a.tanggal_pinjam);
                    const dateB = parseDate(b.tanggal_pinjam);
                    const timeA = dateA ? dateA.getTime() : 0;
                    const timeB = dateB ? dateB.getTime() : 0;
                    return sortSelect.value === 'oldest' ? timeA - timeB : timeB - timeA;
                });
            }
            return result;
        };

        const updateSummary = () => {
            const totalPrincipal = allPinjaman.reduce((sum, item) => sum + (Number(item.jumlah_pinjam_raw) || 0), 0);
            const totalBill = allPinjaman.reduce((sum, item) => sum + (Number(item.total_tagihan) || 0), 0);
            const outstanding = allPinjaman.reduce((sum, item) => sum + (Number(item.sisa_pinjaman) || 0), 0);
            const paid = allPinjaman.reduce((sum, item) => sum + (Number(item.total_dibayar) || 0), 0);
            const activeCount = allPinjaman.filter((item) => item.status_label === 'Aktif').length;
            const paidCount = allPinjaman.filter((item) => item.status_label === 'Lunas').length;

            document.getElementById('summaryDisbursed').textContent = formatRupiah(totalPrincipal);
            document.getElementById('summaryOutstanding').textContent = formatRupiah(outstanding);
            document.getElementById('summaryRepaid').textContent = formatRupiah(paid);
            document.getElementById('summaryDisbursedNote').textContent = allPinjaman.length + ' pinjaman tercatat';
            document.getElementById('summaryOutstandingNote').textContent = activeCount + ' pinjaman masih berjalan';
            document.getElementById('summaryRepaidNote').textContent = paidCount + ' pinjaman telah lunas';

            const outstandingPercent = totalBill > 0 ? Math.min(100, (outstanding / totalBill) * 100) : 0;
            const paidPercent = totalBill > 0 ? Math.min(100, (paid / totalBill) * 100) : 0;
            document.getElementById('summaryDisbursedBar').style.width = totalPrincipal > 0 ? '100%' : '0%';
            document.getElementById('summaryOutstandingBar').style.width = outstandingPercent + '%';
            document.getElementById('summaryRepaidBar').style.width = paidPercent + '%';
        };

        const renderPinjaman = () => {
            const rows = filteredPinjaman();
            const pageCount = Math.max(1, Math.ceil(rows.length / pageSize));
            currentPage = Math.min(currentPage, pageCount);
            const startIndex = (currentPage - 1) * pageSize;
            const pageRows = rows.slice(startIndex, startIndex + pageSize);

            if (!pageRows.length) {
                const message = allPinjaman.length ? 'Tidak ada pinjaman yang sesuai dengan pencarian atau filter.' : 'Belum ada data pinjaman.';
                pinjamanBody.innerHTML = '<tr><td class="pinjaman-empty" colspan="7">' + message + '</td></tr>';
            } else {
                pinjamanBody.innerHTML = pageRows.map((item, index) => {
                    const name = escapeHTML(item.nama_anggota || 'Anggota tidak diketahui');
                    const id = Number(item.id) || 0;
                    const tenor = Number(item.tenor) || 0;
                    const rate = Number(item.bunga_raw) || 0;
                    const principal = Number(item.jumlah_pinjam_raw) || 0;
                    const installment = Number(item.angsuran_per_bulan) || 0;
                    const remaining = Number(item.sisa_pinjaman) || 0;
                    const isPaid = item.status_label === 'Lunas';
                    const avatarClasses = ['is-blue', 'is-green', '', 'is-coral'];
                    const avatarClass = avatarClasses[(startIndex + index) % avatarClasses.length];
                    const date = formatDate(item.tanggal_pinjam);

                    return '<tr>' +
                        '<td class="pinjaman-number">' + (startIndex + index + 1) + '</td>' +
                        '<td><div class="pinjaman-member">' +
                            '<span class="pinjaman-avatar ' + avatarClass + '">' + escapeHTML(initials(item.nama_anggota)) + '</span>' +
                            '<span><strong class="pinjaman-member-name">' + name + '</strong><small class="pinjaman-member-id">ID pinjaman #' + id + '</small></span>' +
                        '</div></td>' +
                        '<td><strong class="pinjaman-money">' + formatRupiah(principal) + '</strong><small class="pinjaman-cell-note">Sisa: <span class="pinjaman-money ' + (remaining > 0 ? 'is-green' : '') + '">' + formatRupiah(remaining) + '</span></small></td>' +
                        '<td><strong class="pinjaman-money">' + tenor + ' Bulan <small class="fw-normal">(' + escapeHTML(rate) + '%/bln)</small></strong><small class="pinjaman-cell-note">Angsuran: ' + formatRupiah(installment) + '/bln</small></td>' +
                        '<td><span class="pinjaman-status ' + (isPaid ? 'is-paid' : 'is-active') + '">' + (isPaid ? 'Lunas' : 'Aktif') + '</span></td>' +
                        '<td><strong class="pinjaman-money fw-normal">' + escapeHTML(date) + '</strong><small class="pinjaman-cell-note">Tanggal penyaluran</small></td>' +
                        '<td><div class="pinjaman-actions">' +
                            (isPaid ? '' : '<button type="button" class="pinjaman-action-btn btn-bayar" data-id="' + id + '" title="Bayar angsuran" aria-label="Bayar angsuran untuk ' + name + '"><i class="ti ti-cash"></i></button>') +
                            '<button type="button" class="pinjaman-action-btn is-danger btn-hapus" data-id="' + id + '" title="Hapus pinjaman" aria-label="Hapus pinjaman ' + name + '"><i class="ti ti-trash"></i></button>' +
                        '</div></td>' +
                    '</tr>';
                }).join('');
            }

            const visibleStart = rows.length ? startIndex + 1 : 0;
            const visibleEnd = Math.min(startIndex + pageSize, rows.length);
            document.getElementById('pinjamanCount').textContent = 'Menampilkan ' + visibleStart + '–' + visibleEnd + ' dari ' + rows.length + ' pinjaman';
            document.getElementById('pinjamanPageIndicator').textContent = currentPage + ' / ' + pageCount;
            document.getElementById('prevPinjamanPage').disabled = currentPage <= 1;
            document.getElementById('nextPinjamanPage').disabled = currentPage >= pageCount;
        };

        const loadPinjaman = async () => {
            pinjamanBody.innerHTML = '<tr><td class="pinjaman-empty" colspan="7">Memuat data pinjaman...</td></tr>';
            try {
                const response = await fetch('<?= base_url('pinjaman/get_all'); ?>', {
                    headers: { 'Accept': 'application/json' }
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!result || !Array.isArray(result.data)) throw new Error('Format data pinjaman tidak valid');
                allPinjaman = result.data;
                currentPage = 1;
                updateSummary();
                renderPinjaman();
            } catch (error) {
                console.error('Gagal memuat data pinjaman:', error);
                pinjamanBody.innerHTML = '<tr><td class="pinjaman-empty" colspan="7">Data pinjaman gagal dimuat. Muat ulang halaman atau coba kembali.</td></tr>';
                document.getElementById('pinjamanCount').textContent = 'Gagal memuat data';
                Swal.fire('Gagal memuat data', 'Terjadi kesalahan saat mengambil data pinjaman.', 'error');
            }
        };

        searchInput.addEventListener('input', () => {
            currentPage = 1;
            renderPinjaman();
        });
        statusFilter.addEventListener('change', () => {
            currentPage = 1;
            renderPinjaman();
        });
        sortSelect.addEventListener('change', () => {
            currentPage = 1;
            renderPinjaman();
        });
        document.getElementById('resetFilterPinjaman').addEventListener('click', () => {
            searchInput.value = '';
            statusFilter.value = '';
            sortSelect.value = 'newest';
            currentPage = 1;
            renderPinjaman();
        });
        document.getElementById('prevPinjamanPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderPinjaman();
            }
        });
        document.getElementById('nextPinjamanPage').addEventListener('click', () => {
            const pageCount = Math.max(1, Math.ceil(filteredPinjaman().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderPinjaman();
            }
        });

        document.getElementById('btnExportPinjaman').addEventListener('click', () => {
            const rows = filteredPinjaman();
            if (!rows.length) {
                Swal.fire('Tidak ada data', 'Tidak ada data pinjaman untuk diekspor.', 'info');
                return;
            }

            const csvCell = (value) => '"' + String(value == null ? '' : value).replace(/"/g, '""') + '"';
            const csv = [
                ['ID Pinjaman', 'Nama Anggota', 'Tanggal Pinjam', 'Pokok Pinjaman', 'Bunga per Bulan (%)', 'Tenor (Bulan)', 'Angsuran per Bulan', 'Total Angsuran Tercatat', 'Sisa Pinjaman', 'Status'],
                ...rows.map((item) => [
                    item.id,
                    item.nama_anggota,
                    item.tanggal_pinjam,
                    item.jumlah_pinjam_raw,
                    item.bunga_raw,
                    item.tenor,
                    item.angsuran_per_bulan,
                    item.total_dibayar,
                    item.sisa_pinjaman,
                    item.status_label
                ])
            ].map((row) => row.map(csvCell).join(',')).join('\r\n');

            const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'data-pinjaman.csv';
            link.click();
            URL.revokeObjectURL(link.href);
        });

        function refreshSaldo() {
            $.getJSON('<?= base_url("pinjaman/get_saldo_tersedia"); ?>')
                .done(function(res) {
                    if (res.saldo === undefined) {
                        Swal.fire('Gagal memuat saldo', 'Server tidak mengirimkan saldo tersedia.', 'error');
                        return;
                    }
                    $('#saldoTersediaText').text(formatRupiah(res.saldo));
                    $('#saldoTersediaText').data('saldo', Number(res.saldo));
                    $('#createJumlahPinjam').trigger('input');
                })
                .fail(function() {
                    Swal.fire('Gagal memuat saldo', 'Saldo tersedia tidak dapat diperbarui.', 'error');
                });
        }

        $('#createModal').on('show.bs.modal', refreshSaldo);

        $('#createJumlahPinjam').on('input', function() {
            const amount = Number($(this).val()) || 0;
            const balance = Number($('#saldoTersediaText').data('saldo')) || 0;
            const exceedsBalance = amount > balance;
            $('#jumlahPinjamWarning').toggleClass('d-none', !exceedsBalance);
            $('#submitPinjaman').prop('disabled', exceedsBalance);
        });

        $('#createForm').on('submit', function(event) {
            event.preventDefault();
            const form = this;
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            $('#submitPinjaman').prop('disabled', true);
            $.post('<?= base_url('pinjaman/store'); ?>', $(form).serialize())
                .done(function(res) {
                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: res.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                        bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal')).hide();
                        form.reset();
                        form.classList.remove('was-validated');
                        loadPinjaman();
                        refreshSaldo();
                    } else {
                        Swal.fire('Gagal', res.message || 'Pinjaman tidak dapat disimpan.', 'error');
                    }
                })
                .fail(function() {
                    Swal.fire('Error', 'Gagal menghubungi server saat menyimpan pinjaman.', 'error');
                })
                .always(function() {
                    $('#submitPinjaman').prop('disabled', false);
                });
        });

        $('#pinjamanBody').on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Hapus pinjaman?',
                text: 'Pinjaman hanya dapat dihapus jika sudah lunas.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#c14444',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus'
            }).then(async (result) => {
                if (!result.isConfirmed) return;
                try {
                    const response = await fetch('<?= base_url('pinjaman/soft_delete/'); ?>' + encodeURIComponent(id));
                    if (!response.ok) throw new Error('HTTP ' + response.status);
                    const data = await response.json();
                    if (!data.success) {
                        Swal.fire('Tidak dapat menghapus', data.message || 'Pinjaman gagal dihapus.', 'error');
                        return;
                    }
                    await Swal.fire('Berhasil', data.message, 'success');
                    await loadPinjaman();
                    refreshSaldo();
                } catch (error) {
                    console.error('Gagal menghapus pinjaman:', error);
                    Swal.fire('Error', 'Gagal menghubungi server saat menghapus pinjaman.', 'error');
                }
            });
        });

        $('#pinjamanBody').on('click', '.btn-bayar', async function() {
            const id = $(this).data('id');
            $('#angsuranPinjamanId').val(id);
            try {
                const response = await fetch('<?= base_url('pinjaman/get_detail/'); ?>' + encodeURIComponent(id));
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const data = await response.json();
                if (data.success) {
                    $('#angsuranKe').val(data.angsuran_ke_berikutnya);
                    $('#jumlahBayar').val(data.jumlah_per_angsuran);
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('angsuranModal')).show();
                } else if (data.status === 'lunas') {
                    Swal.fire('Lunas', data.message || 'Pinjaman ini sudah lunas.', 'info');
                } else {
                    Swal.fire('Gagal', data.message || 'Detail pinjaman tidak dapat dimuat.', 'error');
                }
            } catch (error) {
                console.error('Gagal memuat detail pinjaman:', error);
                Swal.fire('Error', 'Gagal menghubungi server untuk memuat detail pinjaman.', 'error');
            }
        });

        $('#angsuranForm').on('submit', async function(event) {
            event.preventDefault();
            const form = this;
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            try {
                const response = await fetch('<?= base_url("angsuran/store"); ?>', {
                    method: 'POST',
                    body: new FormData(form)
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Pembayaran tidak dapat disimpan.', 'error');
                    return;
                }

                await Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: result.message,
                    timer: 1500,
                    showConfirmButton: false
                });
                bootstrap.Modal.getOrCreateInstance(document.getElementById('angsuranModal')).hide();
                form.reset();
                form.classList.remove('was-validated');
                await loadPinjaman();
                refreshSaldo();
            } catch (error) {
                console.error('Gagal menyimpan pembayaran:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat menyimpan pembayaran.', 'error');
            }
        });

        loadPinjaman();
    });
</script>
