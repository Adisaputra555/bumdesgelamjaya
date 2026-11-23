<style>
    .jenis-page {
        --jenis-ink: #1d2742;
        --jenis-muted: #778198;
        --jenis-border: #e9edf5;
        padding: 18px 0 30px;
        background: #f6f7fc;
        min-height: calc(100vh - 120px);
    }

    .jenis-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 15px;
        color: #788198;
        font-size: .68rem;
    }

    .jenis-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .jenis-breadcrumbs a:hover,
    .jenis-breadcrumbs strong {
        color: #2920a6;
    }

    .jenis-breadcrumbs .jenis-context {
        margin-left: auto;
        padding: 5px 9px;
        border-radius: 99px;
        color: #3026ad;
        background: #e9eaff;
        font-size: .56rem;
        font-weight: 650;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .jenis-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 13px;
        padding: 16px;
        border: 1px solid var(--jenis-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .jenis-hero-kicker {
        margin-bottom: 5px;
        color: #3026ad;
        font-size: .6rem;
        font-weight: 700;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .jenis-hero h1 {
        margin: 0 0 4px;
        color: var(--jenis-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 650;
        letter-spacing: -.035em;
    }

    .jenis-hero p {
        max-width: 640px;
        margin: 0;
        color: var(--jenis-muted);
        font-size: .7rem;
        line-height: 1.6;
    }

    .jenis-hero-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .jenis-hero-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 7px;
        font-size: .66rem;
        font-weight: 550;
        white-space: nowrap;
    }

    .jenis-btn-export {
        border: 1px solid var(--jenis-border);
        color: #3c465d;
        background: #fff;
    }

    .jenis-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .jenis-btn-add:hover {
        border-color: #1b1079;
        color: #fff;
        background: #1b1079;
    }

    .jenis-summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 11px;
        margin-bottom: 13px;
    }

    .jenis-summary-card {
        min-width: 0;
        padding: 13px 14px 10px;
        border: 1px solid var(--jenis-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .jenis-summary-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 7px;
        min-height: 31px;
    }

    .jenis-summary-label {
        max-width: 130px;
        color: #737d93;
        font-size: .57rem;
        font-weight: 650;
        letter-spacing: .055em;
        line-height: 1.45;
        text-transform: uppercase;
    }

    .jenis-summary-icon {
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

    .jenis-summary-card:nth-child(2) .jenis-summary-icon {
        color: #138363;
        background: #dcfaef;
    }

    .jenis-summary-card:nth-child(3) .jenis-summary-icon {
        color: #d34e4c;
        background: #ffe3e1;
    }

    .jenis-summary-card:nth-child(4) .jenis-summary-icon {
        color: #5747cb;
        background: #e9e6ff;
    }

    .jenis-summary-value {
        display: flex;
        align-items: baseline;
        gap: 5px;
        margin: 2px 0 0;
        color: var(--jenis-ink);
        font-size: clamp(1.1rem, 1.8vw, 1.4rem);
        font-weight: 700;
        letter-spacing: -.04em;
    }

    .jenis-summary-card:nth-child(2) .jenis-summary-value {
        color: #138363;
    }

    .jenis-summary-card:nth-child(3) .jenis-summary-value {
        color: #d34e4c;
    }

    .jenis-summary-card:nth-child(4) .jenis-summary-value {
        color: #3026ad;
    }

    .jenis-summary-unit {
        color: #7a849a;
        font-size: .58rem;
        font-weight: 500;
        letter-spacing: 0;
    }

    .jenis-summary-note {
        min-height: 24px;
        margin: 4px 0 7px;
        color: var(--jenis-muted);
        font-size: .58rem;
        line-height: 1.5;
    }

    .jenis-summary-bar {
        height: 3px;
        overflow: hidden;
        border-radius: 99px;
        background: #e8edff;
    }

    .jenis-summary-bar span {
        display: block;
        width: 0;
        height: 100%;
        border-radius: inherit;
        background: #3026ad;
        transition: width .25s ease;
    }

    .jenis-summary-card:nth-child(2) .jenis-summary-bar span {
        background: #19b884;
    }

    .jenis-summary-card:nth-child(3) .jenis-summary-bar span {
        background: #ef7670;
    }

    .jenis-summary-card:nth-child(4) .jenis-summary-bar span {
        background: #7161df;
    }

    .jenis-toolbar {
        display: grid;
        grid-template-columns: minmax(190px, 1.45fr) minmax(125px, .7fr) minmax(135px, .8fr) 34px;
        gap: 8px;
        margin-bottom: 11px;
        padding: 9px;
        border: 1px solid var(--jenis-border);
        border-radius: 9px;
        background: #fff;
    }

    .jenis-search {
        position: relative;
    }

    .jenis-search i {
        position: absolute;
        top: 50%;
        left: 10px;
        color: #7d879e;
        transform: translateY(-50%);
    }

    .jenis-search input,
    .jenis-filter {
        min-height: 34px;
        border-color: transparent;
        border-radius: 6px;
        background-color: #f1f4ff;
        color: #39445b;
        font-size: .63rem;
        box-shadow: none !important;
    }

    .jenis-search input {
        padding-left: 31px;
    }

    .jenis-search input:focus,
    .jenis-filter:focus {
        border-color: #c9c4fa;
        background-color: #fff;
    }

    .jenis-filter-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        min-height: 34px;
        border: 1px solid var(--jenis-border);
        border-radius: 6px;
        color: #4c5870;
        background: #fff;
    }

    .jenis-filter-reset:hover {
        color: #3026ad;
        background: #f6f5ff;
    }

    .jenis-table-card {
        overflow: hidden;
        border: 1px solid var(--jenis-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .jenis-table-wrap {
        overflow-x: auto;
    }

    .jenis-table {
        width: 100%;
        min-width: 760px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .jenis-table thead th {
        padding: 11px 10px;
        border: 0;
        color: #6b748b;
        background: #f0f3ff;
        font-size: .56rem;
        font-weight: 700;
        letter-spacing: .055em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .jenis-table tbody td {
        padding: 12px 10px;
        border-bottom: 1px solid #f0f2f7;
        color: #354057;
        font-size: .64rem;
        vertical-align: middle;
    }

    .jenis-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .jenis-table tbody tr:hover {
        background: #fafbff;
    }

    .jenis-number {
        width: 34px;
        color: #7c869b !important;
    }

    .jenis-name-cell {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 225px;
    }

    .jenis-row-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 31px;
        height: 31px;
        flex: 0 0 31px;
        border-radius: 7px;
        color: #138363;
        background: #d8faee;
        font-size: .83rem;
    }

    .jenis-row-icon.is-out {
        color: #c64a48;
        background: #ffe3e1;
    }

    .jenis-row-icon.is-unknown {
        color: #667085;
        background: #eef0f4;
    }

    .jenis-name {
        display: block;
        max-width: 240px;
        overflow: hidden;
        color: #202a42;
        font-size: .67rem;
        font-weight: 650;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .jenis-reference {
        display: inline-block;
        margin-top: 3px;
        padding: 2px 5px;
        border-radius: 4px;
        color: #485778;
        background: #edf1ff;
        font-size: .52rem;
        font-weight: 600;
        letter-spacing: .02em;
    }

    .jenis-description {
        display: -webkit-box;
        max-width: 210px;
        overflow: hidden;
        color: #647087;
        font-size: .6rem;
        line-height: 1.5;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }

    .jenis-description.is-empty {
        color: #a0a7b6;
        font-style: italic;
    }

    .jenis-flow {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 99px;
        font-size: .57rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .jenis-flow.is-in {
        color: #087352;
        background: #d7faeb;
    }

    .jenis-flow.is-out {
        color: #b74644;
        background: #ffe0de;
    }

    .jenis-flow.is-unknown {
        color: #59647a;
        background: #eef0f4;
    }

    .jenis-date {
        color: #626d84;
        font-size: .59rem;
        white-space: nowrap;
    }

    .jenis-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .jenis-action-btn {
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

    .jenis-action-btn:hover {
        border-color: #d9d4ff;
        color: #3026ad;
        background: #f6f5ff;
    }

    .jenis-action-btn.is-danger:hover {
        border-color: #ffd2d2;
        color: #c14444;
        background: #fff5f5;
    }

    .jenis-empty {
        padding: 35px 16px !important;
        color: #7b859a !important;
        text-align: center;
    }

    .jenis-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 13px;
        border-top: 1px solid #eef0f6;
        color: #788198;
        font-size: .6rem;
    }

    .jenis-pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .jenis-page-btn {
        min-width: 27px;
        height: 27px;
        padding: 0 8px;
        border: 1px solid transparent;
        border-radius: 6px;
        color: #354057;
        background: transparent;
        font-size: .59rem;
    }

    .jenis-page-btn:disabled {
        color: #a4aabc;
        cursor: default;
    }

    .jenis-page-btn:not(:disabled):hover {
        background: #f1f3ff;
    }

    .jenis-page-indicator {
        color: #fff;
        background: #3026ad;
    }

    .jenis-page-indicator:hover {
        color: #fff;
        background: #3026ad !important;
    }

    .jenis-info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-top: 13px;
    }

    .jenis-info-card {
        min-width: 0;
        padding: 15px;
        border: 1px solid var(--jenis-border);
        border-radius: 9px;
        background: #fff;
    }

    .jenis-info-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0 0 8px;
        color: #25304a;
        font-size: .74rem;
        font-weight: 650;
    }

    .jenis-info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border-radius: 7px;
        color: #3026ad;
        background: #edf0ff;
    }

    .jenis-info-card p {
        margin: 0 0 10px;
        color: #69748c;
        font-size: .62rem;
        line-height: 1.65;
    }

    .jenis-info-note {
        padding: 9px 10px;
        border-radius: 7px;
        color: #394568;
        background: #f2f4ff;
        font-size: .6rem;
        line-height: 1.6;
    }

    .jenis-check-list {
        display: grid;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .jenis-check-list li {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        padding: 7px 8px;
        border-radius: 6px;
        color: #525e75;
        background: #f2f5ff;
        font-size: .59rem;
        line-height: 1.5;
    }

    .jenis-check-list i {
        margin-top: 1px;
        color: #138363;
        font-size: .78rem;
    }

    .jenis-modal .modal-content {
        overflow: hidden;
        border: 1px solid #e9edf5;
        border-radius: 12px;
        box-shadow: 0 18px 50px rgba(26, 34, 60, .16);
    }

    .jenis-modal .modal-header {
        border-bottom-color: #edf0f6;
        background: #fafbff;
    }

    .jenis-modal .modal-title {
        color: var(--jenis-ink);
        font-size: .95rem;
        font-weight: 650;
    }

    .jenis-modal .form-label {
        margin-bottom: 5px;
        color: #46516a;
        font-size: .7rem;
        font-weight: 600;
    }

    .jenis-modal .form-control,
    .jenis-modal .form-select {
        min-height: 39px;
        border-color: #e2e7f0;
        border-radius: 7px;
        font-size: .74rem;
    }

    .jenis-modal .form-control:focus,
    .jenis-modal .form-select:focus {
        border-color: #aaa4ed;
        box-shadow: 0 0 0 .18rem rgba(48, 38, 173, .1);
    }

    .jenis-modal .modal-footer .btn {
        border-radius: 7px;
        font-size: .72rem;
    }

    @media (max-width: 850px) {
        .jenis-summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .jenis-toolbar {
            grid-template-columns: minmax(170px, 1fr) minmax(125px, .7fr);
        }

        .jenis-search {
            grid-column: 1 / -1;
        }

        .jenis-filter-reset {
            width: 100%;
        }
    }

    @media (max-width: 600px) {
        .jenis-page {
            padding-top: 12px;
        }

        .jenis-breadcrumbs .jenis-context {
            display: none;
        }

        .jenis-hero {
            align-items: flex-start;
            flex-direction: column;
        }

        .jenis-hero-actions {
            width: 100%;
        }

        .jenis-hero-actions .btn {
            flex: 1;
            justify-content: center;
        }

        .jenis-toolbar {
            grid-template-columns: 1fr 1fr;
        }

        .jenis-info-grid {
            grid-template-columns: 1fr;
        }

        .jenis-table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .jenis-pagination {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content">
        <main class="jenis-page">
            <nav class="jenis-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url('dashboard'); ?>">Beranda</a>
                <span>›</span>
                <a href="<?= base_url('dashboard'); ?>">Dasbor</a>
                <span>›</span>
                <strong aria-current="page">Jenis Transaksi</strong>
                <span class="jenis-context"><i class="ti ti-arrows-left-right"></i> Master arus kas</span>
            </nav>

            <header class="jenis-hero">
                <div>
                    <div class="jenis-hero-kicker">Klasifikasi arus kas • Master data keuangan</div>
                    <h1>Master Jenis Transaksi</h1>
                    <p>Kelola kategori pemasukan dan pengeluaran agar pencatatan transaksi serta laporan keuangan lebih terstruktur.</p>
                </div>
                <div class="jenis-hero-actions">
                    <button class="btn jenis-btn-export" id="btnExportJenis" type="button"><i class="ti ti-download"></i> Ekspor Data</button>
                    <button class="btn jenis-btn-add" id="btnTambah" type="button"><i class="ti ti-plus"></i> Tambah Jenis Transaksi</button>
                </div>
            </header>

            <section class="jenis-summary-grid" aria-label="Ringkasan jenis transaksi">
                <article class="jenis-summary-card">
                    <div class="jenis-summary-top">
                        <span class="jenis-summary-label">Total Jenis Transaksi</span>
                        <span class="jenis-summary-icon"><i class="ti ti-apps"></i></span>
                    </div>
                    <p class="jenis-summary-value"><span id="summaryJenis">—</span><small class="jenis-summary-unit">jenis</small></p>
                    <p class="jenis-summary-note" id="summaryJenisNote">Kategori yang tersimpan</p>
                    <div class="jenis-summary-bar"><span id="summaryJenisBar"></span></div>
                </article>
                <article class="jenis-summary-card">
                    <div class="jenis-summary-top">
                        <span class="jenis-summary-label">Arus Pemasukan (Inflow)</span>
                        <span class="jenis-summary-icon"><i class="ti ti-arrow-down-left"></i></span>
                    </div>
                    <p class="jenis-summary-value"><span id="summaryPemasukan">—</span><small class="jenis-summary-unit">jenis</small></p>
                    <p class="jenis-summary-note" id="summaryPemasukanNote">Klasifikasi penerimaan kas</p>
                    <div class="jenis-summary-bar"><span id="summaryPemasukanBar"></span></div>
                </article>
                <article class="jenis-summary-card">
                    <div class="jenis-summary-top">
                        <span class="jenis-summary-label">Arus Pengeluaran (Outflow)</span>
                        <span class="jenis-summary-icon"><i class="ti ti-arrow-up-right"></i></span>
                    </div>
                    <p class="jenis-summary-value"><span id="summaryPengeluaran">—</span><small class="jenis-summary-unit">jenis</small></p>
                    <p class="jenis-summary-note" id="summaryPengeluaranNote">Klasifikasi pembayaran kas</p>
                    <div class="jenis-summary-bar"><span id="summaryPengeluaranBar"></span></div>
                </article>
                <article class="jenis-summary-card">
                    <div class="jenis-summary-top">
                        <span class="jenis-summary-label">Kelengkapan Deskripsi</span>
                        <span class="jenis-summary-icon"><i class="ti ti-check"></i></span>
                    </div>
                    <p class="jenis-summary-value"><span id="summaryDeskripsi">—</span><small class="jenis-summary-unit">terisi</small></p>
                    <p class="jenis-summary-note" id="summaryDeskripsiNote">Deskripsi pada jenis transaksi</p>
                    <div class="jenis-summary-bar"><span id="summaryDeskripsiBar"></span></div>
                </article>
            </section>

            <section class="jenis-toolbar" aria-label="Pencarian dan filter jenis transaksi">
                <label class="jenis-search">
                    <i class="ti ti-search" aria-hidden="true"></i>
                    <input type="search" class="form-control" id="searchInput" placeholder="Cari nama jenis atau keterangan..." autocomplete="off" aria-label="Cari jenis transaksi">
                </label>
                <select class="form-select jenis-filter" id="filterArusKas" aria-label="Filter arus kas">
                    <option value="">Semua Arus Kas</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
                <select class="form-select jenis-filter" id="sortJenis" aria-label="Urutkan data">
                    <option value="id-asc">Urutkan: ID Sistem (A–Z)</option>
                    <option value="name-asc">Urutkan: Nama (A–Z)</option>
                    <option value="newest">Urutkan: Terbaru</option>
                </select>
                <button class="jenis-filter-reset" id="resetFilterJenis" type="button" aria-label="Reset semua filter" title="Reset semua filter"><i class="ti ti-filter"></i></button>
            </section>

            <section class="jenis-table-card" aria-label="Daftar jenis transaksi">
                <div class="jenis-table-wrap">
                    <table class="table jenis-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID / Nama Jenis</th>
                                <th>Arus Kas</th>
                                <th>Keterangan</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="jenisTransaksiBody">
                            <tr><td class="jenis-empty" colspan="6">Memuat data jenis transaksi...</td></tr>
                        </tbody>
                    </table>
                </div>
                <footer class="jenis-table-footer">
                    <span id="jenisTransaksiCount">Memuat data...</span>
                    <nav class="jenis-pagination" aria-label="Navigasi halaman jenis transaksi">
                        <button class="jenis-page-btn" id="prevJenisPage" type="button">‹ Sebelumnya</button>
                        <span class="jenis-page-btn jenis-page-indicator" id="jenisPageIndicator" aria-current="page">1 / 1</span>
                        <button class="jenis-page-btn" id="nextJenisPage" type="button">Selanjutnya ›</button>
                    </nav>
                </footer>
            </section>

            <section class="jenis-info-grid" aria-label="Informasi klasifikasi transaksi">
                <article class="jenis-info-card">
                    <h2 class="jenis-info-title"><span class="jenis-info-icon"><i class="ti ti-wallet"></i></span>Klasifikasi Arus Kas</h2>
                    <p>Jenis transaksi digunakan untuk mengelompokkan pencatatan kas ke dalam pemasukan atau pengeluaran. Pilih arus yang sesuai saat membuat jenis baru.</p>
                    <div class="jenis-info-note"><strong>Pemasukan</strong> mencatat penerimaan kas. <strong>Pengeluaran</strong> mencatat pembayaran atau biaya yang dibukukan.</div>
                </article>
                <article class="jenis-info-card">
                    <h2 class="jenis-info-title"><span class="jenis-info-icon"><i class="ti ti-receipt"></i></span>Penggunaan Data Jenis</h2>
                    <p>Gunakan nama yang mudah dikenali dan deskripsi yang membantu petugas memilih kategori secara konsisten.</p>
                    <ul class="jenis-check-list">
                        <li><i class="ti ti-circle-check"></i><span>Pastikan nama jenis tidak membingungkan dan sesuai arus kasnya.</span></li>
                        <li><i class="ti ti-circle-check"></i><span>Isi keterangan untuk menjelaskan cakupan transaksi yang termasuk.</span></li>
                        <li><i class="ti ti-circle-check"></i><span>Perubahan jenis akan tercermin pada pilihan kategori transaksi.</span></li>
                    </ul>
                </article>
            </section>
        </main>
    </div>
</div>

<div class="modal fade jenis-modal" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="createModalLabel">Tambah Jenis Transaksi</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="createNamaTransaksi">Nama Transaksi <span class="text-danger">*</span></label>
                    <input type="text" name="nama_transaksi" id="createNamaTransaksi" class="form-control" maxlength="150" required>
                    <div class="invalid-feedback">Nama transaksi wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createTipe">Arus Kas <span class="text-danger">*</span></label>
                    <select name="tipe" id="createTipe" class="form-select" required>
                        <option value="">Pilih arus kas...</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                    <div class="invalid-feedback">Arus kas wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createDeskripsi">Keterangan <span class="text-muted fw-normal">(opsional)</span></label>
                    <textarea name="deskripsi" id="createDeskripsi" class="form-control" rows="3" maxlength="500" placeholder="Jelaskan jenis transaksi ini..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="createSubmit">Simpan Jenis</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade jenis-modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="editModalLabel">Edit Jenis Transaksi</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="editId">
                <div class="mb-3">
                    <label class="form-label" for="editNamaTransaksi">Nama Transaksi <span class="text-danger">*</span></label>
                    <input type="text" name="nama_transaksi" id="editNamaTransaksi" class="form-control" maxlength="150" required>
                    <div class="invalid-feedback">Nama transaksi wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editTipe">Arus Kas <span class="text-danger">*</span></label>
                    <select name="tipe" id="editTipe" class="form-select" required>
                        <option value="">Pilih arus kas...</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                    <div class="invalid-feedback">Arus kas wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editDeskripsi">Keterangan <span class="text-muted fw-normal">(opsional)</span></label>
                    <textarea name="deskripsi" id="editDeskripsi" class="form-control" rows="3" maxlength="500" placeholder="Jelaskan jenis transaksi ini..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="editSubmit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.getElementById('jenisTransaksiBody');
        const searchInput = document.getElementById('searchInput');
        const flowFilter = document.getElementById('filterArusKas');
        const sortSelect = document.getElementById('sortJenis');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const pageSize = 6;
        let dataList = [];
        let currentPage = 1;

        const createModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal'));
        const editModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal'));

        const escapeHTML = (value) => String(value == null ? '' : value).replace(/[&<>"']/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[char]);

        const formatDate = (value) => {
            if (!value || value === '-') return '—';
            const date = new Date(String(value).replace(' ', 'T'));
            if (Number.isNaN(date.getTime())) return '—';
            return new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            }).format(date);
        };

        const normalizeType = (item) => String(item.tipe || '').trim().toLowerCase();

        function updateSummary() {
            const inflow = dataList.filter((item) => normalizeType(item) === 'pemasukan').length;
            const outflow = dataList.filter((item) => normalizeType(item) === 'pengeluaran').length;
            const descriptions = dataList.filter((item) => String(item.deskripsi || '').trim() !== '').length;
            const total = dataList.length;
            const completeness = total ? Math.round((descriptions / total) * 100) : 0;

            document.getElementById('summaryJenis').textContent = total;
            document.getElementById('summaryPemasukan').textContent = inflow;
            document.getElementById('summaryPengeluaran').textContent = outflow;
            document.getElementById('summaryDeskripsi').textContent = completeness + '%';
            document.getElementById('summaryJenisNote').textContent = total + ' kategori tersimpan';
            document.getElementById('summaryPemasukanNote').textContent = inflow + ' kategori arus masuk';
            document.getElementById('summaryPengeluaranNote').textContent = outflow + ' kategori arus keluar';
            document.getElementById('summaryDeskripsiNote').textContent = descriptions + ' dari ' + total + ' jenis memiliki keterangan';

            const inflowPercent = total ? (inflow / total) * 100 : 0;
            const outflowPercent = total ? (outflow / total) * 100 : 0;
            document.getElementById('summaryJenisBar').style.width = total ? '100%' : '0%';
            document.getElementById('summaryPemasukanBar').style.width = inflowPercent + '%';
            document.getElementById('summaryPengeluaranBar').style.width = outflowPercent + '%';
            document.getElementById('summaryDeskripsiBar').style.width = completeness + '%';
        }

        function getFilteredData() {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const flow = flowFilter.value;
            const filtered = dataList.filter((item) => {
                const haystack = [
                    item.id,
                    item.nama_transaksi,
                    item.tipe,
                    item.deskripsi
                ].join(' ').toLocaleLowerCase('id-ID');
                return (!keyword || haystack.includes(keyword)) &&
                    (!flow || normalizeType(item) === flow);
            });

            if (sortSelect.value === 'name-asc') {
                filtered.sort((a, b) => String(a.nama_transaksi || '').localeCompare(String(b.nama_transaksi || ''), 'id'));
            } else if (sortSelect.value === 'newest') {
                filtered.sort((a, b) => String(b.created_at || '').localeCompare(String(a.created_at || '')));
            } else {
                filtered.sort((a, b) => Number(a.id) - Number(b.id));
            }
            return filtered;
        }

        function renderTable() {
            const filtered = getFilteredData();
            const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
            currentPage = Math.min(currentPage, pageCount);
            const startIndex = (currentPage - 1) * pageSize;
            const pageRows = filtered.slice(startIndex, startIndex + pageSize);

            if (!pageRows.length) {
                const message = dataList.length ? 'Tidak ada jenis transaksi yang sesuai dengan pencarian atau filter.' : 'Belum ada data jenis transaksi.';
                body.innerHTML = '<tr><td colspan="6" class="jenis-empty">' + message + '</td></tr>';
            } else {
                body.innerHTML = pageRows.map((item, index) => {
                    const isInflow = normalizeType(item) === 'pemasukan';
                    const isOutflow = normalizeType(item) === 'pengeluaran';
                    const typeLabel = isInflow ? 'Pemasukan' : (isOutflow ? 'Pengeluaran' : (item.tipe || 'Tidak diketahui'));
                    const description = String(item.deskripsi || '').trim();
                    const id = Number(item.id) || 0;
                    const name = escapeHTML(item.nama_transaksi || 'Tanpa nama');
                    const flowClass = isInflow ? 'is-in' : (isOutflow ? 'is-out' : 'is-unknown');
                    const flowIcon = isInflow ? 'ti-arrow-down-left' : (isOutflow ? 'ti-arrow-up-right' : 'ti-alert-circle');

                    return '<tr>' +
                        '<td class="jenis-number">' + (startIndex + index + 1) + '</td>' +
                        '<td><div class="jenis-name-cell">' +
                            '<span class="jenis-row-icon ' + (isInflow ? '' : (isOutflow ? 'is-out' : 'is-unknown')) + '"><i class="ti ' + flowIcon + '"></i></span>' +
                            '<span><strong class="jenis-name" title="' + name + '">' + name + '</strong><small class="jenis-reference">ID Sistem #' + id + '</small></span>' +
                        '</div></td>' +
                        '<td><span class="jenis-flow ' + flowClass + '"><i class="ti ' + flowIcon + '"></i>' + escapeHTML(typeLabel) + '</span></td>' +
                        '<td><span class="jenis-description ' + (description ? '' : 'is-empty') + '">' + escapeHTML(description || 'Belum ada keterangan') + '</span></td>' +
                        '<td><span class="jenis-date">' + escapeHTML(formatDate(item.created_at)) + '</span></td>' +
                        '<td><div class="jenis-actions">' +
                            '<button type="button" class="jenis-action-btn btn-edit-jenis" data-id="' + id + '" title="Edit jenis transaksi" aria-label="Edit ' + name + '"><i class="ti ti-edit"></i></button>' +
                            '<button type="button" class="jenis-action-btn is-danger btn-delete-jenis" data-id="' + id + '" title="Hapus jenis transaksi" aria-label="Hapus ' + name + '"><i class="ti ti-trash"></i></button>' +
                        '</div></td>' +
                    '</tr>';
                }).join('');
            }

            const start = filtered.length ? startIndex + 1 : 0;
            const end = Math.min(startIndex + pageSize, filtered.length);
            document.getElementById('jenisTransaksiCount').textContent =
                'Menampilkan ' + start + '–' + end + ' dari ' + filtered.length + ' jenis transaksi';
            document.getElementById('jenisPageIndicator').textContent = currentPage + ' / ' + pageCount;
            document.getElementById('prevJenisPage').disabled = currentPage <= 1;
            document.getElementById('nextJenisPage').disabled = currentPage >= pageCount;
        }

        async function fetchData() {
            body.innerHTML = '<tr><td colspan="6" class="jenis-empty">Memuat data jenis transaksi...</td></tr>';
            try {
                const response = await fetch('<?= base_url('jenistransaksi/get_all'); ?>', {
                    headers: { 'Accept': 'application/json' }
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!Array.isArray(result)) throw new Error('Format data jenis transaksi tidak valid');
                dataList = result;
                currentPage = 1;
                updateSummary();
                renderTable();
            } catch (error) {
                console.error('Gagal memuat jenis transaksi:', error);
                body.innerHTML = '<tr><td colspan="6" class="jenis-empty">Data gagal dimuat. Muat ulang halaman untuk mencoba kembali.</td></tr>';
                document.getElementById('jenisTransaksiCount').textContent = 'Gagal memuat data';
                Swal.fire('Gagal memuat data', 'Terjadi kesalahan saat mengambil daftar jenis transaksi.', 'error');
            }
        }

        async function sendData(url, method, data) {
            const options = {
                method: method,
                headers: { 'Accept': 'application/json' }
            };
            if (data) {
                options.headers['Content-Type'] = 'application/json';
                options.body = JSON.stringify(data);
            }
            const response = await fetch(url, options);
            if (!response.ok) throw new Error('HTTP ' + response.status);
            const result = await response.json();
            if (!result || typeof result.success === 'undefined') throw new Error('Respons server tidak valid');
            return result;
        }

        function setFormLoading(form, loading) {
            const button = form.querySelector('button[type="submit"]');
            if (button) button.disabled = loading;
        }

        async function storeData(data) {
            setFormLoading(createForm, true);
            try {
                const result = await sendData('<?= base_url('jenistransaksi/store'); ?>', 'POST', data);
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Jenis transaksi tidak dapat ditambahkan.', 'error');
                    return;
                }
                createModal.hide();
                createForm.reset();
                createForm.classList.remove('was-validated');
                await fetchData();
                Swal.fire('Berhasil', 'Jenis transaksi berhasil ditambahkan.', 'success');
            } catch (error) {
                console.error('Gagal menambahkan jenis transaksi:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat menyimpan jenis transaksi.', 'error');
            } finally {
                setFormLoading(createForm, false);
            }
        }

        async function updateData(data) {
            setFormLoading(editForm, true);
            try {
                const result = await sendData('<?= base_url('jenistransaksi/update'); ?>', 'POST', data);
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Jenis transaksi tidak dapat diperbarui.', 'error');
                    return;
                }
                editModal.hide();
                editForm.classList.remove('was-validated');
                await fetchData();
                Swal.fire('Berhasil', 'Jenis transaksi berhasil diperbarui.', 'success');
            } catch (error) {
                console.error('Gagal memperbarui jenis transaksi:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat memperbarui jenis transaksi.', 'error');
            } finally {
                setFormLoading(editForm, false);
            }
        }

        async function deleteData(id) {
            const confirmation = await Swal.fire({
                title: 'Hapus jenis transaksi?',
                text: 'Jenis transaksi ini akan dihapus dari daftar.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#c14444',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            });
            if (!confirmation.isConfirmed) return;

            try {
                const result = await sendData('<?= base_url('jenistransaksi/delete'); ?>/' + encodeURIComponent(id), 'DELETE');
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Jenis transaksi tidak dapat dihapus.', 'error');
                    return;
                }
                await fetchData();
                Swal.fire('Berhasil', 'Jenis transaksi berhasil dihapus.', 'success');
            } catch (error) {
                console.error('Gagal menghapus jenis transaksi:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat menghapus jenis transaksi.', 'error');
            }
        }

        document.getElementById('btnTambah').addEventListener('click', function() {
            createForm.reset();
            createForm.classList.remove('was-validated');
            createModal.show();
        });

        createForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (!createForm.checkValidity()) {
                createForm.classList.add('was-validated');
                return;
            }
            storeData(Object.fromEntries(new FormData(createForm).entries()));
        });

        editForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (!editForm.checkValidity()) {
                editForm.classList.add('was-validated');
                return;
            }
            updateData(Object.fromEntries(new FormData(editForm).entries()));
        });

        body.addEventListener('click', function(event) {
            const button = event.target.closest('button[data-id]');
            if (!button) return;
            const item = dataList.find((row) => String(row.id) === String(button.dataset.id));
            if (!item) return;

            if (button.classList.contains('btn-edit-jenis')) {
                document.getElementById('editId').value = item.id;
                document.getElementById('editNamaTransaksi').value = item.nama_transaksi || '';
                document.getElementById('editTipe').value = normalizeType(item);
                document.getElementById('editDeskripsi').value = item.deskripsi || '';
                editForm.classList.remove('was-validated');
                editModal.show();
            } else if (button.classList.contains('btn-delete-jenis')) {
                deleteData(item.id);
            }
        });

        searchInput.addEventListener('input', function() {
            currentPage = 1;
            renderTable();
        });
        flowFilter.addEventListener('change', function() {
            currentPage = 1;
            renderTable();
        });
        sortSelect.addEventListener('change', function() {
            currentPage = 1;
            renderTable();
        });
        document.getElementById('resetFilterJenis').addEventListener('click', function() {
            searchInput.value = '';
            flowFilter.value = '';
            sortSelect.value = 'id-asc';
            currentPage = 1;
            renderTable();
        });
        document.getElementById('prevJenisPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        document.getElementById('nextJenisPage').addEventListener('click', function() {
            const pageCount = Math.max(1, Math.ceil(getFilteredData().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderTable();
            }
        });

        document.getElementById('btnExportJenis').addEventListener('click', function() {
            const rows = getFilteredData();
            if (!rows.length) {
                Swal.fire('Tidak ada data', 'Tidak ada jenis transaksi untuk diekspor.', 'info');
                return;
            }
            const quote = (value) => {
                let text = String(value == null ? '' : value);
                if (/^[\s]*[=+\-@]/.test(text)) text = "'" + text;
                return '"' + text.replace(/"/g, '""') + '"';
            };
            const csvRows = [
                ['ID Sistem', 'Nama Transaksi', 'Arus Kas', 'Keterangan', 'Dibuat'],
                ...rows.map((item) => [item.id, item.nama_transaksi, item.tipe, item.deskripsi, item.created_at])
            ];
            const csv = csvRows.map((row) => row.map(quote).join(',')).join('\r\n');
            const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'jenis-transaksi.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 0);
        });

        fetchData();
    });
</script>
