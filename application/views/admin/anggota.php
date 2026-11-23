<style>
    .anggota-page {
        --anggota-ink: #1d2742;
        --anggota-muted: #778198;
        --anggota-border: #e9edf5;
        padding: 18px 0 30px;
        background: #f6f7fc;
        min-height: calc(100vh - 120px);
    }

    .anggota-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        color: #788198;
        font-size: .67rem;
    }

    .anggota-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .anggota-breadcrumbs a:hover,
    .anggota-breadcrumbs strong {
        color: #2920a6;
    }

    .anggota-context {
        margin-left: 4px;
        padding: 5px 9px;
        border-radius: 99px;
        color: #3026ad;
        background: #e9eaff;
        font-size: .55rem;
        font-weight: 650;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .anggota-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 14px;
    }

    .anggota-kicker {
        margin-bottom: 5px;
        color: #3026ad;
        font-size: .6rem;
        font-weight: 700;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .anggota-heading h1 {
        margin: 0 0 4px;
        color: var(--anggota-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 650;
        letter-spacing: -.035em;
    }

    .anggota-heading p {
        max-width: 650px;
        margin: 0;
        color: var(--anggota-muted);
        font-size: .7rem;
        line-height: 1.6;
    }

    .anggota-heading-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .anggota-heading-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 7px;
        font-size: .66rem;
        font-weight: 550;
        white-space: nowrap;
    }

    .anggota-btn-export {
        border: 1px solid var(--anggota-border);
        color: #3c465d;
        background: #fff;
    }

    .anggota-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .anggota-btn-add:hover {
        border-color: #1b1079;
        color: #fff;
        background: #1b1079;
    }

    .anggota-summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 11px;
        margin-bottom: 12px;
    }

    .anggota-summary-card {
        min-width: 0;
        padding: 13px 14px 10px;
        border: 1px solid var(--anggota-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .anggota-summary-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 7px;
        min-height: 30px;
    }

    .anggota-summary-label {
        max-width: 140px;
        color: #737d93;
        font-size: .57rem;
        font-weight: 650;
        letter-spacing: .055em;
        line-height: 1.45;
        text-transform: uppercase;
    }

    .anggota-summary-icon {
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

    .anggota-summary-card:nth-child(2) .anggota-summary-icon {
        color: #138363;
        background: #dcfaef;
    }

    .anggota-summary-card:nth-child(3) .anggota-summary-icon {
        color: #3158b8;
        background: #e8f0ff;
    }

    .anggota-summary-card:nth-child(4) .anggota-summary-icon {
        color: #6a54d8;
        background: #eeebff;
    }

    .anggota-summary-value {
        display: flex;
        align-items: baseline;
        gap: 5px;
        margin: 2px 0 0;
        color: var(--anggota-ink);
        font-size: clamp(1.1rem, 1.8vw, 1.4rem);
        font-weight: 700;
        letter-spacing: -.04em;
        overflow-wrap: anywhere;
    }

    .anggota-summary-card:nth-child(2) .anggota-summary-value {
        color: #138363;
    }

    .anggota-summary-card:nth-child(3) .anggota-summary-value {
        color: #3158b8;
    }

    .anggota-summary-unit {
        color: #7a849a;
        font-size: .58rem;
        font-weight: 500;
        letter-spacing: 0;
    }

    .anggota-summary-note {
        min-height: 23px;
        margin: 4px 0 7px;
        color: var(--anggota-muted);
        font-size: .58rem;
        line-height: 1.5;
    }

    .anggota-summary-bar {
        height: 3px;
        overflow: hidden;
        border-radius: 99px;
        background: #e8edff;
    }

    .anggota-summary-bar span {
        display: block;
        width: 0;
        height: 100%;
        border-radius: inherit;
        background: #3026ad;
        transition: width .25s ease;
    }

    .anggota-summary-card:nth-child(2) .anggota-summary-bar span {
        background: #19b884;
    }

    .anggota-summary-card:nth-child(3) .anggota-summary-bar span {
        background: #5485d4;
    }

    .anggota-summary-card:nth-child(4) .anggota-summary-bar span {
        background: #7866e4;
    }

    .anggota-toolbar {
        display: grid;
        grid-template-columns: minmax(200px, 1.5fr) minmax(130px, .7fr) minmax(160px, .85fr) 34px;
        gap: 8px;
        margin-bottom: 11px;
        padding: 9px;
        border: 1px solid var(--anggota-border);
        border-radius: 9px;
        background: #fff;
    }

    .anggota-search {
        position: relative;
    }

    .anggota-search i {
        position: absolute;
        top: 50%;
        left: 10px;
        color: #7d879e;
        transform: translateY(-50%);
    }

    .anggota-search input,
    .anggota-filter {
        min-height: 34px;
        border-color: transparent;
        border-radius: 6px;
        background-color: #f1f4ff;
        color: #39445b;
        font-size: .63rem;
        box-shadow: none !important;
    }

    .anggota-search input {
        padding-left: 31px;
    }

    .anggota-search input:focus,
    .anggota-filter:focus {
        border-color: #c9c4fa;
        background-color: #fff;
    }

    .anggota-filter-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        min-height: 34px;
        border: 1px solid var(--anggota-border);
        border-radius: 6px;
        color: #4c5870;
        background: #fff;
    }

    .anggota-filter-reset:hover {
        color: #3026ad;
        background: #f6f5ff;
    }

    .anggota-table-card {
        overflow: hidden;
        border: 1px solid var(--anggota-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .anggota-table-wrap {
        overflow-x: auto;
    }

    .anggota-table {
        width: 100%;
        min-width: 850px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .anggota-table thead th {
        padding: 11px 9px;
        border: 0;
        color: #6b748b;
        background: #f0f3ff;
        font-size: .55rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .anggota-table tbody td {
        padding: 11px 9px;
        border-bottom: 1px solid #f0f2f7;
        color: #354057;
        font-size: .62rem;
        vertical-align: middle;
    }

    .anggota-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .anggota-table tbody tr:hover {
        background: #fafbff;
    }

    .anggota-number {
        width: 34px;
        color: #7c869b !important;
    }

    .anggota-profile {
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 190px;
    }

    .anggota-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border-radius: 50%;
        color: #3026ad;
        background: #e7eaff;
        font-size: .57rem;
        font-weight: 700;
    }

    .anggota-avatar.is-green {
        color: #087352;
        background: #d6faeb;
    }

    .anggota-avatar.is-blue {
        color: #3158b8;
        background: #e4edff;
    }

    .anggota-avatar.is-coral {
        color: #b94a48;
        background: #ffe3e1;
    }

    .anggota-name {
        display: block;
        max-width: 210px;
        overflow: hidden;
        color: #202a42;
        font-size: .67rem;
        font-weight: 650;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .anggota-system-id,
    .anggota-cell-note {
        display: block;
        margin-top: 3px;
        color: #838ca0;
        font-size: .56rem;
        line-height: 1.45;
        overflow-wrap: anywhere;
    }

    .anggota-address {
        display: block;
        max-width: 170px;
        color: #566178;
        font-size: .61rem;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .anggota-contact {
        display: flex;
        align-items: flex-start;
        gap: 5px;
        max-width: 170px;
        color: #4e5a72;
        font-size: .6rem;
        overflow-wrap: anywhere;
    }

    .anggota-contact + .anggota-contact {
        margin-top: 4px;
    }

    .anggota-contact i {
        margin-top: 1px;
        color: #138363;
        font-size: .7rem;
    }

    .anggota-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 99px;
        font-size: .57rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .anggota-status::before {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        content: "";
    }

    .anggota-status.is-active {
        color: #087352;
        background: #d6faeb;
    }

    .anggota-status.is-inactive {
        color: #5141bd;
        background: #e9e5ff;
    }

    .anggota-status.is-unknown {
        color: #59647a;
        background: #eef0f4;
    }

    .anggota-date {
        color: #59647a;
        font-size: .6rem;
        white-space: nowrap;
    }

    .anggota-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .anggota-action-btn {
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

    .anggota-action-btn:hover {
        border-color: #d9d4ff;
        color: #3026ad;
        background: #f6f5ff;
    }

    .anggota-action-btn.is-danger:hover {
        border-color: #ffd2d2;
        color: #c14444;
        background: #fff5f5;
    }

    .anggota-empty {
        padding: 35px 16px !important;
        color: #7b859a !important;
        text-align: center;
    }

    .anggota-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 13px;
        border-top: 1px solid #eef0f6;
        color: #788198;
        font-size: .6rem;
    }

    .anggota-pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .anggota-page-btn {
        min-width: 27px;
        height: 27px;
        padding: 0 8px;
        border: 1px solid transparent;
        border-radius: 6px;
        color: #354057;
        background: transparent;
        font-size: .59rem;
    }

    .anggota-page-btn:disabled {
        color: #a4aabc;
        cursor: default;
    }

    .anggota-page-btn:not(:disabled):hover {
        background: #f1f3ff;
    }

    .anggota-page-indicator {
        color: #fff;
        background: #3026ad;
    }

    .anggota-page-indicator:hover {
        color: #fff;
        background: #3026ad !important;
    }

    .anggota-info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-top: 13px;
    }

    .anggota-info-card {
        min-width: 0;
        padding: 15px;
        border: 1px solid var(--anggota-border);
        border-radius: 9px;
        background: #fff;
    }

    .anggota-info-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0 0 8px;
        color: #25304a;
        font-size: .74rem;
        font-weight: 650;
    }

    .anggota-info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border-radius: 7px;
        color: #3026ad;
        background: #edf0ff;
    }

    .anggota-info-card p {
        margin: 0 0 10px;
        color: #69748c;
        font-size: .62rem;
        line-height: 1.65;
    }

    .anggota-info-note {
        padding: 9px 10px;
        border-radius: 7px;
        color: #394568;
        background: #f2f4ff;
        font-size: .6rem;
        line-height: 1.6;
    }

    .anggota-info-list {
        display: grid;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .anggota-info-list li {
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

    .anggota-info-list i {
        margin-top: 1px;
        color: #138363;
        font-size: .78rem;
    }

    .anggota-modal .modal-content {
        overflow: hidden;
        border: 1px solid #e9edf5;
        border-radius: 12px;
        box-shadow: 0 18px 50px rgba(26, 34, 60, .16);
    }

    .anggota-modal .modal-header {
        border-bottom-color: #edf0f6;
        background: #fafbff;
    }

    .anggota-modal .modal-title {
        color: var(--anggota-ink);
        font-size: .95rem;
        font-weight: 650;
    }

    .anggota-modal .form-label {
        margin-bottom: 5px;
        color: #46516a;
        font-size: .7rem;
        font-weight: 600;
    }

    .anggota-modal .form-control,
    .anggota-modal .form-select {
        min-height: 39px;
        border-color: #e2e7f0;
        border-radius: 7px;
        font-size: .74rem;
    }

    .anggota-modal textarea.form-control {
        min-height: 75px;
    }

    .anggota-modal .form-control:focus,
    .anggota-modal .form-select:focus {
        border-color: #aaa4ed;
        box-shadow: 0 0 0 .18rem rgba(48, 38, 173, .1);
    }

    .anggota-modal .modal-footer .btn {
        border-radius: 7px;
        font-size: .72rem;
    }

    @media (max-width: 850px) {
        .anggota-summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .anggota-toolbar {
            grid-template-columns: minmax(160px, 1fr) minmax(125px, .7fr);
        }

        .anggota-search {
            grid-column: 1 / -1;
        }

        .anggota-filter-reset {
            width: 100%;
        }
    }

    @media (max-width: 600px) {
        .anggota-page {
            padding-top: 12px;
        }

        .anggota-context {
            display: none;
        }

        .anggota-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .anggota-heading-actions {
            width: 100%;
        }

        .anggota-heading-actions .btn {
            flex: 1;
            justify-content: center;
        }

        .anggota-toolbar {
            grid-template-columns: 1fr 1fr;
        }

        .anggota-info-grid {
            grid-template-columns: 1fr;
        }

        .anggota-table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .anggota-pagination {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content">
        <main class="anggota-page">
            <nav class="anggota-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url('dashboard'); ?>">Beranda</a>
                <span>›</span>
                <a href="<?= base_url('dashboard'); ?>">Dasbor</a>
                <span>›</span>
                <strong aria-current="page">Anggota</strong>
                <span class="anggota-context"><i class="ti ti-users"></i> Data keanggotaan BUMDes</span>
            </nav>

            <header class="anggota-heading">
                <div>
                    <div class="anggota-kicker">Basis data warga • Pengelolaan keanggotaan</div>
                    <h1>Manajemen Data Anggota BUMDes</h1>
                    <p>Pangkalan data anggota untuk membantu pengelolaan layanan dan komunikasi BUMDes secara lebih teratur.</p>
                </div>
                <div class="anggota-heading-actions">
                    <button class="btn anggota-btn-export" id="btnExportAnggota" type="button"><i class="ti ti-download"></i> Ekspor Data</button>
                    <button class="btn anggota-btn-add" id="btnTambahAnggota" type="button"><i class="ti ti-user-plus"></i> Tambah Anggota</button>
                </div>
            </header>

            <div id="alertPlaceholder"></div>

            <section class="anggota-summary-grid" aria-label="Ringkasan anggota">
                <article class="anggota-summary-card">
                    <div class="anggota-summary-top">
                        <span class="anggota-summary-label">Total Anggota Terdaftar</span>
                        <span class="anggota-summary-icon"><i class="ti ti-users"></i></span>
                    </div>
                    <p class="anggota-summary-value"><span id="summaryTotal">—</span><small class="anggota-summary-unit">orang</small></p>
                    <p class="anggota-summary-note" id="summaryTotalNote">Data anggota tersimpan</p>
                    <div class="anggota-summary-bar"><span id="summaryTotalBar"></span></div>
                </article>
                <article class="anggota-summary-card">
                    <div class="anggota-summary-top">
                        <span class="anggota-summary-label">Anggota Aktif</span>
                        <span class="anggota-summary-icon"><i class="ti ti-user-check"></i></span>
                    </div>
                    <p class="anggota-summary-value"><span id="summaryAktif">—</span><small class="anggota-summary-unit">orang</small></p>
                    <p class="anggota-summary-note" id="summaryAktifNote">Status keanggotaan aktif</p>
                    <div class="anggota-summary-bar"><span id="summaryAktifBar"></span></div>
                </article>
                <article class="anggota-summary-card">
                    <div class="anggota-summary-top">
                        <span class="anggota-summary-label">Anggota Nonaktif</span>
                        <span class="anggota-summary-icon"><i class="ti ti-user-off"></i></span>
                    </div>
                    <p class="anggota-summary-value"><span id="summaryNonaktif">—</span><small class="anggota-summary-unit">orang</small></p>
                    <p class="anggota-summary-note" id="summaryNonaktifNote">Status keanggotaan nonaktif</p>
                    <div class="anggota-summary-bar"><span id="summaryNonaktifBar"></span></div>
                </article>
                <article class="anggota-summary-card">
                    <div class="anggota-summary-top">
                        <span class="anggota-summary-label">Kelengkapan Kontak</span>
                        <span class="anggota-summary-icon"><i class="ti ti-users"></i></span>
                    </div>
                    <p class="anggota-summary-value"><span id="summaryKontak">—</span><small class="anggota-summary-unit">lengkap</small></p>
                    <p class="anggota-summary-note" id="summaryKontakNote">Alamat, HP, dan email tersedia</p>
                    <div class="anggota-summary-bar"><span id="summaryKontakBar"></span></div>
                </article>
            </section>

            <section class="anggota-toolbar" aria-label="Pencarian dan filter anggota">
                <label class="anggota-search">
                    <i class="ti ti-search" aria-hidden="true"></i>
                    <input type="search" class="form-control" id="searchInput" placeholder="Cari nama, alamat, nomor HP, atau email..." autocomplete="off" aria-label="Cari anggota">
                </label>
                <select class="form-select anggota-filter" id="filterStatusAnggota" aria-label="Filter status anggota">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
                <select class="form-select anggota-filter" id="sortAnggota" aria-label="Urutkan anggota">
                    <option value="name">Urutkan: Nama (A–Z)</option>
                    <option value="newest">Urutkan: Terbaru</option>
                    <option value="oldest">Urutkan: Terlama</option>
                </select>
                <button class="anggota-filter-reset" id="resetFilterAnggota" type="button" aria-label="Reset semua filter" title="Reset semua filter"><i class="ti ti-filter"></i></button>
            </section>

            <section class="anggota-table-card" aria-label="Daftar anggota">
                <div class="anggota-table-wrap">
                    <table class="table anggota-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profil &amp; Email</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Bergabung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="anggotaBody">
                            <tr><td class="anggota-empty" colspan="7">Memuat data anggota...</td></tr>
                        </tbody>
                    </table>
                </div>
                <footer class="anggota-table-footer">
                    <span id="anggotaCount">Memuat data...</span>
                    <nav class="anggota-pagination" aria-label="Navigasi halaman anggota">
                        <button class="anggota-page-btn" id="prevAnggotaPage" type="button">Sebelumnya</button>
                        <span class="anggota-page-btn anggota-page-indicator" id="anggotaPageIndicator" aria-current="page">1 / 1</span>
                        <button class="anggota-page-btn" id="nextAnggotaPage" type="button">Selanjutnya</button>
                    </nav>
                </footer>
            </section>

            <section class="anggota-info-grid" aria-label="Informasi pengelolaan anggota">
                <article class="anggota-info-card">
                    <h2 class="anggota-info-title"><span class="anggota-info-icon"><i class="ti ti-users"></i></span>Data Keanggotaan BUMDes</h2>
                    <p>Data anggota pada halaman ini mencakup nama, alamat, nomor HP, email, status, dan tanggal pendaftaran.</p>
                    <div class="anggota-info-note">Pastikan perubahan nomor kontak atau alamat diperbarui agar komunikasi terkait layanan BUMDes dapat berjalan lancar.</div>
                </article>
                <article class="anggota-info-card">
                    <h2 class="anggota-info-title"><span class="anggota-info-icon"><i class="ti ti-shield-check"></i></span>Pengelolaan Status &amp; Kontak</h2>
                    <p>Gunakan informasi yang tersimpan untuk menjaga data anggota tetap rapi dan mudah ditelusuri.</p>
                    <ul class="anggota-info-list">
                        <li><i class="ti ti-circle-check"></i><span>Periksa nama dan detail kontak sebelum menyimpan perubahan.</span></li>
                        <li><i class="ti ti-circle-check"></i><span>Status dapat diubah menjadi aktif atau nonaktif melalui formulir anggota.</span></li>
                        <li><i class="ti ti-circle-check"></i><span>Kolom yang belum tersedia seperti NIK dan simpanan tidak ditampilkan sebagai data anggota.</span></li>
                    </ul>
                </article>
            </section>
        </main>
    </div>
</div>

<div class="modal fade anggota-modal" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="createModalLabel">Tambah Anggota</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="createNama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="createNama" name="nama" maxlength="150" required>
                    <div class="invalid-feedback">Nama wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createAlamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="createAlamat" name="alamat" rows="3" required></textarea>
                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createNoHp" class="form-label">Nomor HP <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="createNoHp" name="no_hp" pattern="^[0-9+]+$" required>
                    <div class="invalid-feedback">Nomor HP wajib diisi dan hanya boleh berisi angka atau tanda +.</div>
                </div>
                <div class="mb-3">
                    <label for="createEmail" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="createEmail" name="email" required>
                    <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
                </div>
                <div class="mb-3">
                    <label for="createStatus" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="createStatus" name="status" required>
                        <option value="">Pilih status...</option>
                        <option value="aktif" selected>Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                    <div class="invalid-feedback">Status wajib dipilih.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Anggota</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade anggota-modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="editModalLabel">Edit Anggota</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id">
                <div class="mb-3">
                    <label for="editNama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="editNama" name="nama" maxlength="150" required>
                    <div class="invalid-feedback">Nama wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editAlamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="editAlamat" name="alamat" rows="3" required></textarea>
                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editNoHp" class="form-label">Nomor HP <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="editNoHp" name="no_hp" pattern="^[0-9+]+$" required>
                    <div class="invalid-feedback">Nomor HP wajib diisi dan hanya boleh berisi angka atau tanda +.</div>
                </div>
                <div class="mb-3">
                    <label for="editEmail" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="editEmail" name="email" required>
                    <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
                </div>
                <div class="mb-3">
                    <label for="editStatus" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="editStatus" name="status" required>
                        <option value="">Pilih status...</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                    <div class="invalid-feedback">Status wajib dipilih.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const anggotaBody = document.getElementById('anggotaBody');
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('filterStatusAnggota');
        const sortSelect = document.getElementById('sortAnggota');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const createModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal'));
        const editModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal'));
        const pageSize = 6;
        let anggotaData = [];
        let currentPage = 1;

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

        const normalizeStatus = (member) => String(member.status || '').trim().toLowerCase();

        const getInitials = (name) => String(name || '')
            .trim()
            .split(/\s+/)
            .filter(Boolean)
            .slice(0, 2)
            .map((part) => part.charAt(0).toUpperCase())
            .join('') || '—';

        function updateSummary() {
            const activeCount = anggotaData.filter((member) => normalizeStatus(member) === 'aktif').length;
            const inactiveCount = anggotaData.filter((member) => normalizeStatus(member) === 'nonaktif').length;
            const completeCount = anggotaData.filter((member) =>
                String(member.alamat || '').trim() &&
                String(member.no_hp || '').trim() &&
                String(member.email || '').trim()
            ).length;
            const total = anggotaData.length;
            const contactPercent = total ? Math.round((completeCount / total) * 100) : 0;

            document.getElementById('summaryTotal').textContent = total;
            document.getElementById('summaryAktif').textContent = activeCount;
            document.getElementById('summaryNonaktif').textContent = inactiveCount;
            document.getElementById('summaryKontak').textContent = contactPercent + '%';
            document.getElementById('summaryTotalNote').textContent = total + ' anggota tersimpan';
            document.getElementById('summaryAktifNote').textContent = total ? Math.round((activeCount / total) * 100) + '% dari seluruh anggota' : 'Belum ada data anggota';
            document.getElementById('summaryNonaktifNote').textContent = inactiveCount + ' anggota berstatus nonaktif';
            document.getElementById('summaryKontakNote').textContent = completeCount + ' dari ' + total + ' kontak lengkap';
            document.getElementById('summaryTotalBar').style.width = total ? '100%' : '0%';
            document.getElementById('summaryAktifBar').style.width = (total ? (activeCount / total) * 100 : 0) + '%';
            document.getElementById('summaryNonaktifBar').style.width = (total ? (inactiveCount / total) * 100 : 0) + '%';
            document.getElementById('summaryKontakBar').style.width = contactPercent + '%';
        }

        function getFilteredData() {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const selectedStatus = statusFilter.value;
            const filtered = anggotaData.filter((member) => {
                const searchable = [
                    member.id,
                    member.nama,
                    member.alamat,
                    member.no_hp,
                    member.email,
                    member.status
                ].join(' ').toLocaleLowerCase('id-ID');
                return (!keyword || searchable.includes(keyword)) &&
                    (!selectedStatus || normalizeStatus(member) === selectedStatus);
            });

            if (sortSelect.value === 'newest' || sortSelect.value === 'oldest') {
                filtered.sort((a, b) => {
                    const dateA = parseDate(a.created_at);
                    const dateB = parseDate(b.created_at);
                    const timeA = dateA ? dateA.getTime() : 0;
                    const timeB = dateB ? dateB.getTime() : 0;
                    return sortSelect.value === 'oldest' ? timeA - timeB : timeB - timeA;
                });
            } else {
                filtered.sort((a, b) => String(a.nama || '').localeCompare(String(b.nama || ''), 'id'));
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
                const message = anggotaData.length ? 'Tidak ada anggota yang sesuai dengan pencarian atau filter.' : 'Belum ada data anggota.';
                anggotaBody.innerHTML = '<tr><td colspan="7" class="anggota-empty">' + message + '</td></tr>';
            } else {
                const avatarClasses = ['is-blue', '', 'is-green', 'is-coral'];
                anggotaBody.innerHTML = pageRows.map((member, index) => {
                    const status = normalizeStatus(member);
                    const statusClass = status === 'aktif' ? 'is-active' : (status === 'nonaktif' ? 'is-inactive' : 'is-unknown');
                    const statusLabel = status === 'aktif' ? 'Aktif' : (status === 'nonaktif' ? 'Nonaktif' : (member.status || 'Tidak diketahui'));
                    const name = escapeHTML(member.nama || 'Tanpa nama');
                    const email = escapeHTML(member.email || 'Email belum tersedia');
                    const address = escapeHTML(member.alamat || 'Alamat belum tersedia');
                    const phone = escapeHTML(member.no_hp || 'Nomor HP belum tersedia');
                    const id = Number(member.id) || 0;
                    const avatarClass = avatarClasses[(startIndex + index) % avatarClasses.length];

                    return '<tr>' +
                        '<td class="anggota-number">' + String(startIndex + index + 1).padStart(2, '0') + '</td>' +
                        '<td><div class="anggota-profile">' +
                            '<span class="anggota-avatar ' + avatarClass + '">' + escapeHTML(getInitials(member.nama)) + '</span>' +
                            '<span><strong class="anggota-name" title="' + name + '">' + name + '</strong><small class="anggota-system-id">ID sistem #' + id + ' · ' + email + '</small></span>' +
                        '</div></td>' +
                        '<td><span class="anggota-address">' + address + '</span></td>' +
                        '<td><span class="anggota-contact"><i class="ti ti-phone"></i>' + phone + '</span><span class="anggota-contact"><i class="ti ti-mail"></i>' + email + '</span></td>' +
                        '<td><span class="anggota-status ' + statusClass + '">' + escapeHTML(statusLabel) + '</span></td>' +
                        '<td><span class="anggota-date">' + escapeHTML(formatDate(member.created_at)) + '</span></td>' +
                        '<td><div class="anggota-actions">' +
                            '<button type="button" class="anggota-action-btn btn-edit-anggota" data-id="' + id + '" title="Edit anggota" aria-label="Edit ' + name + '"><i class="ti ti-edit"></i></button>' +
                            '<button type="button" class="anggota-action-btn is-danger btn-delete-anggota" data-id="' + id + '" title="Hapus anggota" aria-label="Hapus ' + name + '"><i class="ti ti-trash"></i></button>' +
                        '</div></td>' +
                    '</tr>';
                }).join('');
            }

            const start = filtered.length ? startIndex + 1 : 0;
            const end = Math.min(startIndex + pageSize, filtered.length);
            document.getElementById('anggotaCount').textContent =
                'Menampilkan ' + start + '–' + end + ' dari ' + filtered.length + ' anggota';
            document.getElementById('anggotaPageIndicator').textContent = currentPage + ' / ' + pageCount;
            document.getElementById('prevAnggotaPage').disabled = currentPage <= 1;
            document.getElementById('nextAnggotaPage').disabled = currentPage >= pageCount;
        }

        async function fetchAnggota(showError = true) {
            anggotaBody.innerHTML = '<tr><td colspan="7" class="anggota-empty">Memuat data anggota...</td></tr>';
            try {
                const response = await fetch('<?= base_url('anggota/get_all'); ?>', {
                    headers: { 'Accept': 'application/json' }
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!Array.isArray(result)) throw new Error('Format data anggota tidak valid');
                anggotaData = result;
                currentPage = 1;
                updateSummary();
                renderTable();
                return true;
            } catch (error) {
                console.error('Gagal mengambil data anggota:', error);
                anggotaBody.innerHTML = '<tr><td colspan="7" class="anggota-empty">Data anggota gagal dimuat. Coba muat ulang halaman.</td></tr>';
                document.getElementById('anggotaCount').textContent = 'Gagal memuat data';
                if (showError) {
                    Swal.fire('Gagal memuat data', 'Terjadi kesalahan saat mengambil daftar anggota.', 'error');
                }
                return false;
            }
        }

        async function sendJson(url, method, data) {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            const result = await response.json();
            if (!response.ok && (!result || typeof result.success === 'undefined')) {
                throw new Error('HTTP ' + response.status);
            }
            return result;
        }

        function setFormLoading(form, loading) {
            const button = form.querySelector('button[type="submit"]');
            if (button) button.disabled = loading;
        }

        async function refreshAfterMutation() {
            const refreshed = await fetchAnggota(false);
            if (refreshed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data anggota berhasil diperbarui.',
                    timer: 1600,
                    showConfirmButton: false
                });
            } else {
                Swal.fire('Data tersimpan', 'Perubahan berhasil disimpan, tetapi daftar anggota gagal dimuat ulang.', 'warning');
            }
        }

        document.getElementById('btnTambahAnggota').addEventListener('click', function() {
            createForm.reset();
            createForm.classList.remove('was-validated');
            createModal.show();
        });

        createForm.addEventListener('submit', async function(event) {
            event.preventDefault();
            if (!createForm.checkValidity()) {
                createForm.classList.add('was-validated');
                return;
            }
            setFormLoading(createForm, true);
            try {
                const data = Object.fromEntries(new FormData(createForm).entries());
                const result = await sendJson('<?= base_url('anggota/store'); ?>', 'POST', data);
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Anggota tidak dapat ditambahkan.', 'error');
                    return;
                }
                createModal.hide();
                createForm.reset();
                createForm.classList.remove('was-validated');
                await refreshAfterMutation();
            } catch (error) {
                console.error('Gagal menambahkan anggota:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat menyimpan anggota.', 'error');
            } finally {
                setFormLoading(createForm, false);
            }
        });

        editForm.addEventListener('submit', async function(event) {
            event.preventDefault();
            if (!editForm.checkValidity()) {
                editForm.classList.add('was-validated');
                return;
            }
            setFormLoading(editForm, true);
            try {
                const data = Object.fromEntries(new FormData(editForm).entries());
                const result = await sendJson('<?= base_url('anggota/update'); ?>', 'POST', data);
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Perubahan anggota tidak dapat disimpan.', 'error');
                    return;
                }
                editModal.hide();
                editForm.classList.remove('was-validated');
                await refreshAfterMutation();
            } catch (error) {
                console.error('Gagal memperbarui anggota:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat memperbarui anggota.', 'error');
            } finally {
                setFormLoading(editForm, false);
            }
        });

        anggotaBody.addEventListener('click', function(event) {
            const button = event.target.closest('button[data-id]');
            if (!button) return;
            const member = anggotaData.find((item) => String(item.id) === String(button.dataset.id));
            if (!member) return;

            if (button.classList.contains('btn-edit-anggota')) {
                document.getElementById('editId').value = member.id;
                document.getElementById('editNama').value = member.nama || '';
                document.getElementById('editAlamat').value = member.alamat || '';
                document.getElementById('editNoHp').value = member.no_hp || '';
                document.getElementById('editEmail').value = member.email || '';
                document.getElementById('editStatus').value = normalizeStatus(member);
                editForm.classList.remove('was-validated');
                editModal.show();
            } else if (button.classList.contains('btn-delete-anggota')) {
                deleteAnggota(member.id);
            }
        });

        async function deleteAnggota(id) {
            const confirmation = await Swal.fire({
                title: 'Hapus anggota?',
                text: 'Data anggota ini akan dihapus.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#c14444',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            });
            if (!confirmation.isConfirmed) return;

            try {
                const response = await fetch('<?= base_url('anggota/delete'); ?>/' + encodeURIComponent(id), {
                    method: 'DELETE',
                    headers: { 'Accept': 'application/json' }
                });
                const result = await response.json();
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Anggota tidak dapat dihapus.', 'error');
                    return;
                }
                await refreshAfterMutation();
            } catch (error) {
                console.error('Gagal menghapus anggota:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat menghapus anggota.', 'error');
            }
        }

        searchInput.addEventListener('input', function() {
            currentPage = 1;
            renderTable();
        });
        statusFilter.addEventListener('change', function() {
            currentPage = 1;
            renderTable();
        });
        sortSelect.addEventListener('change', function() {
            currentPage = 1;
            renderTable();
        });
        document.getElementById('resetFilterAnggota').addEventListener('click', function() {
            searchInput.value = '';
            statusFilter.value = '';
            sortSelect.value = 'name';
            currentPage = 1;
            renderTable();
        });
        document.getElementById('prevAnggotaPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        document.getElementById('nextAnggotaPage').addEventListener('click', function() {
            const pageCount = Math.max(1, Math.ceil(getFilteredData().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderTable();
            }
        });

        document.getElementById('btnExportAnggota').addEventListener('click', function() {
            const rows = getFilteredData();
            if (!rows.length) {
                Swal.fire('Tidak ada data', 'Tidak ada anggota untuk diekspor.', 'info');
                return;
            }
            const quote = (value) => {
                let text = String(value == null ? '' : value);
                if (/^[\s]*[=+\-@]/.test(text)) text = "'" + text;
                return '"' + text.replace(/"/g, '""') + '"';
            };
            const csvRows = [
                ['ID Sistem', 'Nama', 'Alamat', 'Nomor HP', 'Email', 'Status', 'Tanggal Bergabung'],
                ...rows.map((member) => [
                    member.id,
                    member.nama,
                    member.alamat,
                    member.no_hp,
                    member.email,
                    member.status,
                    member.created_at
                ])
            ];
            const csv = csvRows.map((row) => row.map(quote).join(',')).join('\r\n');
            const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'data-anggota.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 0);
        });

        fetchAnggota();
    });
</script>
