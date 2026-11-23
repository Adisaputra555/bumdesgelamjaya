<style>
    .user-page {
        --user-ink: #1d2742;
        --user-muted: #778198;
        --user-border: #e9edf5;
        padding: 18px 0 30px;
        background: #f6f7fc;
        min-height: calc(100vh - 120px);
    }

    .user-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        color: #788198;
        font-size: .66rem;
    }

    .user-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .user-breadcrumbs a:hover,
    .user-breadcrumbs strong {
        color: #2920a6;
    }

    .user-context {
        margin-left: 4px;
        padding: 5px 9px;
        border-radius: 99px;
        color: #3026ad;
        background: #e9eaff;
        font-size: .54rem;
        font-weight: 650;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .user-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 14px;
    }

    .user-kicker {
        margin-bottom: 5px;
        color: #3026ad;
        font-size: .59rem;
        font-weight: 700;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .user-heading h1 {
        margin: 0 0 4px;
        color: var(--user-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 650;
        letter-spacing: -.035em;
    }

    .user-heading p {
        max-width: 650px;
        margin: 0;
        color: var(--user-muted);
        font-size: .69rem;
        line-height: 1.6;
    }

    .user-heading-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .user-heading-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 7px;
        font-size: .65rem;
        font-weight: 550;
        white-space: nowrap;
    }

    .user-btn-export {
        border: 1px solid var(--user-border);
        color: #3c465d;
        background: #fff;
    }

    .user-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .user-btn-add:hover {
        border-color: #1b1079;
        color: #fff;
        background: #1b1079;
    }

    .user-summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 11px;
        margin-bottom: 12px;
    }

    .user-summary-card {
        min-width: 0;
        padding: 13px 14px 10px;
        border: 1px solid var(--user-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .user-summary-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 7px;
        min-height: 30px;
    }

    .user-summary-label {
        max-width: 140px;
        color: #737d93;
        font-size: .57rem;
        font-weight: 650;
        letter-spacing: .055em;
        line-height: 1.45;
        text-transform: uppercase;
    }

    .user-summary-icon {
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

    .user-summary-card:nth-child(2) .user-summary-icon {
        color: #138363;
        background: #dcfaef;
    }

    .user-summary-card:nth-child(3) .user-summary-icon {
        color: #3158b8;
        background: #e8f0ff;
    }

    .user-summary-card:nth-child(4) .user-summary-icon {
        color: #6a54d8;
        background: #eeebff;
    }

    .user-summary-value {
        display: flex;
        align-items: baseline;
        gap: 5px;
        margin: 2px 0 0;
        color: var(--user-ink);
        font-size: clamp(1.1rem, 1.8vw, 1.4rem);
        font-weight: 700;
        letter-spacing: -.04em;
        overflow-wrap: anywhere;
    }

    .user-summary-card:nth-child(2) .user-summary-value {
        color: #138363;
    }

    .user-summary-card:nth-child(3) .user-summary-value {
        color: #3158b8;
    }

    .user-summary-unit {
        color: #7a849a;
        font-size: .58rem;
        font-weight: 500;
        letter-spacing: 0;
    }

    .user-summary-note {
        min-height: 23px;
        margin: 4px 0 7px;
        color: var(--user-muted);
        font-size: .58rem;
        line-height: 1.5;
    }

    .user-summary-bar {
        height: 3px;
        overflow: hidden;
        border-radius: 99px;
        background: #e8edff;
    }

    .user-summary-bar span {
        display: block;
        width: 0;
        height: 100%;
        border-radius: inherit;
        background: #3026ad;
        transition: width .25s ease;
    }

    .user-summary-card:nth-child(2) .user-summary-bar span {
        background: #19b884;
    }

    .user-summary-card:nth-child(3) .user-summary-bar span {
        background: #5485d4;
    }

    .user-summary-card:nth-child(4) .user-summary-bar span {
        background: #7866e4;
    }

    .user-toolbar {
        display: grid;
        grid-template-columns: minmax(190px, 1.35fr) minmax(115px, .7fr) minmax(125px, .75fr) minmax(155px, .85fr) 34px;
        gap: 8px;
        margin-bottom: 11px;
        padding: 9px;
        border: 1px solid var(--user-border);
        border-radius: 9px;
        background: #fff;
    }

    .user-search {
        position: relative;
    }

    .user-search i {
        position: absolute;
        top: 50%;
        left: 10px;
        color: #7d879e;
        transform: translateY(-50%);
    }

    .user-search input,
    .user-filter {
        min-height: 34px;
        border-color: transparent;
        border-radius: 6px;
        background: #f1f4ff;
        color: #39445b;
        font-size: .62rem;
        box-shadow: none !important;
    }

    .user-search input {
        padding-left: 31px;
    }

    .user-search input:focus,
    .user-filter:focus {
        border-color: #c9c4fa;
        background: #fff;
    }

    .user-filter-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        min-height: 34px;
        border: 1px solid var(--user-border);
        border-radius: 6px;
        color: #4c5870;
        background: #fff;
    }

    .user-filter-reset:hover {
        color: #3026ad;
        background: #f6f5ff;
    }

    .user-table-card {
        overflow: hidden;
        border: 1px solid var(--user-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .user-table-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 11px 13px;
        border-bottom: 1px solid #eef0f6;
    }

    .user-table-heading h2 {
        display: flex;
        align-items: center;
        gap: 7px;
        margin: 0;
        color: #25304a;
        font-size: .77rem;
        font-weight: 650;
    }

    .user-total-pill {
        padding: 3px 7px;
        border-radius: 99px;
        color: #4653a9;
        background: #e9eaff;
        font-size: .54rem;
        font-weight: 600;
    }

    .user-table-heading small {
        color: #778198;
        font-size: .56rem;
    }

    .user-table-wrap {
        overflow-x: auto;
    }

    .user-table {
        width: 100%;
        min-width: 780px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .user-table thead th {
        padding: 10px 9px;
        border: 0;
        color: #6b748b;
        background: #f0f3ff;
        font-size: .54rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .user-table tbody td {
        padding: 11px 9px;
        border-bottom: 1px solid #f0f2f7;
        color: #354057;
        font-size: .61rem;
        vertical-align: middle;
    }

    .user-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .user-table tbody tr:hover {
        background: #fafbff;
    }

    .user-row-number {
        width: 35px;
        color: #7c869b !important;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 210px;
    }

    .user-avatar {
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

    .user-avatar.is-green {
        color: #087352;
        background: #d6faeb;
    }

    .user-avatar.is-blue {
        color: #3158b8;
        background: #e4edff;
    }

    .user-avatar.is-coral {
        color: #b94a48;
        background: #ffe3e1;
    }

    .user-name {
        display: block;
        max-width: 190px;
        overflow: hidden;
        color: #202a42;
        font-size: .66rem;
        font-weight: 650;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .user-system-id,
    .user-email {
        display: block;
        margin-top: 3px;
        color: #7b859b;
        font-size: .56rem;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .user-role {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        max-width: 115px;
        padding: 5px 8px;
        border-radius: 99px;
        color: #5141bd;
        background: #e9e5ff;
        font-size: .56rem;
        font-weight: 650;
        line-height: 1.35;
    }

    .user-role.is-staff {
        color: #3158b8;
        background: #e4edff;
    }

    .user-role.is-user {
        color: #59647a;
        background: #eef0f4;
    }

    .user-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 99px;
        font-size: .57rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .user-status::before {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        content: "";
    }

    .user-status.is-active {
        color: #087352;
        background: #d6faeb;
    }

    .user-status.is-inactive {
        color: #59647a;
        background: #eef0f4;
    }

    .user-date {
        color: #59647a;
        font-size: .59rem;
        white-space: nowrap;
    }

    .user-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .user-action-btn {
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

    .user-action-btn:hover {
        border-color: #d9d4ff;
        color: #3026ad;
        background: #f6f5ff;
    }

    .user-action-btn.is-danger:hover {
        border-color: #ffd2d2;
        color: #c14444;
        background: #fff5f5;
    }

    .user-empty {
        padding: 35px 16px !important;
        color: #7b859a !important;
        text-align: center;
    }

    .user-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 13px;
        border-top: 1px solid #eef0f6;
        color: #788198;
        font-size: .59rem;
    }

    .user-pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .user-page-btn {
        min-width: 27px;
        height: 27px;
        padding: 0 8px;
        border: 1px solid transparent;
        border-radius: 6px;
        color: #354057;
        background: transparent;
        font-size: .58rem;
    }

    .user-page-btn:disabled {
        color: #a4aabc;
        cursor: default;
    }

    .user-page-btn:not(:disabled):hover {
        background: #f1f3ff;
    }

    .user-page-indicator {
        color: #fff;
        background: #3026ad;
    }

    .user-page-indicator:hover {
        color: #fff;
        background: #3026ad !important;
    }

    .user-info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-top: 13px;
    }

    .user-info-card {
        min-width: 0;
        padding: 15px;
        border: 1px solid var(--user-border);
        border-radius: 9px;
        background: #fff;
    }

    .user-info-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0 0 8px;
        color: #25304a;
        font-size: .74rem;
        font-weight: 650;
    }

    .user-info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border-radius: 7px;
        color: #3026ad;
        background: #edf0ff;
    }

    .user-info-card p {
        margin: 0 0 10px;
        color: #69748c;
        font-size: .62rem;
        line-height: 1.65;
    }

    .user-role-list {
        display: grid;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .user-role-list li {
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

    .user-role-list i {
        margin-top: 1px;
        color: #3026ad;
        font-size: .75rem;
    }

    .user-security-note {
        padding: 9px 10px;
        border-radius: 7px;
        color: #394568;
        background: #f2f4ff;
        font-size: .6rem;
        line-height: 1.6;
    }

    .user-security-checks {
        display: grid;
        gap: 7px;
        margin-top: 9px;
    }

    .user-security-checks span {
        display: flex;
        align-items: flex-start;
        gap: 7px;
        color: #59647a;
        font-size: .59rem;
        line-height: 1.5;
    }

    .user-security-checks i {
        margin-top: 1px;
        color: #138363;
        font-size: .75rem;
    }

    .user-modal .modal-content {
        overflow: hidden;
        border: 1px solid #e9edf5;
        border-radius: 12px;
        box-shadow: 0 18px 50px rgba(26, 34, 60, .16);
    }

    .user-modal .modal-header {
        border-bottom-color: #edf0f6;
        background: #fafbff;
    }

    .user-modal .modal-title {
        color: var(--user-ink);
        font-size: .95rem;
        font-weight: 650;
    }

    .user-modal .form-label {
        margin-bottom: 5px;
        color: #46516a;
        font-size: .7rem;
        font-weight: 600;
    }

    .user-modal .form-control,
    .user-modal .form-select {
        min-height: 39px;
        border-color: #e2e7f0;
        border-radius: 7px;
        font-size: .74rem;
    }

    .user-modal .form-control:focus,
    .user-modal .form-select:focus {
        border-color: #aaa4ed;
        box-shadow: 0 0 0 .18rem rgba(48, 38, 173, .1);
    }

    .user-modal .modal-footer .btn {
        border-radius: 7px;
        font-size: .72rem;
    }

    @media (max-width: 850px) {
        .user-summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .user-toolbar {
            grid-template-columns: minmax(170px, 1fr) minmax(125px, .7fr);
        }

        .user-search {
            grid-column: 1 / -1;
        }

        .user-filter-reset {
            width: 100%;
        }
    }

    @media (max-width: 600px) {
        .user-page {
            padding-top: 12px;
        }

        .user-context {
            display: none;
        }

        .user-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .user-heading-actions {
            width: 100%;
        }

        .user-heading-actions .btn {
            flex: 1;
            justify-content: center;
        }

        .user-toolbar {
            grid-template-columns: 1fr 1fr;
        }

        .user-info-grid {
            grid-template-columns: 1fr;
        }

        .user-table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .user-pagination {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<?php
$userSuccessMessage = $this->session->flashdata('success');
$userErrorMessage = $this->session->flashdata('error');
?>

<div class="pc-container">
    <div class="pc-content">
        <main class="user-page">
            <nav class="user-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url('dashboard'); ?>">Beranda</a>
                <span>›</span>
                <a href="<?= base_url('dashboard'); ?>">Dasbor</a>
                <span>›</span>
                <strong aria-current="page">Pengguna</strong>
                <span class="user-context"><i class="ti ti-shield-check"></i> Hak akses &amp; keamanan akun</span>
            </nav>

            <header class="user-heading">
                <div>
                    <div class="user-kicker">Administrasi sistem • Akun dan status akses</div>
                    <h1>Manajemen Pengguna BUMDes</h1>
                    <p>Kelola akun operasional, alamat email, peran, serta status aktif pengguna dalam aplikasi BUMDes.</p>
                </div>
                <div class="user-heading-actions">
                    <button class="btn user-btn-export" id="btnExportUser" type="button"><i class="ti ti-download"></i> Ekspor Data</button>
                    <button class="btn user-btn-add" id="btnTambahUser" type="button"><i class="ti ti-user-plus"></i> Tambah Pengguna</button>
                </div>
            </header>

            <div id="userFlashMessages"
                data-success="<?= html_escape($userSuccessMessage ?: ''); ?>"
                data-error="<?= html_escape($userErrorMessage ?: ''); ?>"></div>

            <section class="user-summary-grid" aria-label="Ringkasan pengguna">
                <article class="user-summary-card">
                    <div class="user-summary-top">
                        <span class="user-summary-label">Total Pengguna</span>
                        <span class="user-summary-icon"><i class="ti ti-users"></i></span>
                    </div>
                    <p class="user-summary-value"><span id="summaryTotalUsers">—</span><small class="user-summary-unit">akun</small></p>
                    <p class="user-summary-note" id="summaryTotalUsersNote">Pengguna terdaftar</p>
                    <div class="user-summary-bar"><span id="summaryTotalUsersBar"></span></div>
                </article>
                <article class="user-summary-card">
                    <div class="user-summary-top">
                        <span class="user-summary-label">Pengguna Aktif</span>
                        <span class="user-summary-icon"><i class="ti ti-user-check"></i></span>
                    </div>
                    <p class="user-summary-value"><span id="summaryActiveUsers">—</span><small class="user-summary-unit">akun</small></p>
                    <p class="user-summary-note" id="summaryActiveUsersNote">Status aktif pada akun</p>
                    <div class="user-summary-bar"><span id="summaryActiveUsersBar"></span></div>
                </article>
                <article class="user-summary-card">
                    <div class="user-summary-top">
                        <span class="user-summary-label">Administrator</span>
                        <span class="user-summary-icon"><i class="ti ti-shield-check"></i></span>
                    </div>
                    <p class="user-summary-value"><span id="summaryAdminUsers">—</span><small class="user-summary-unit">akun</small></p>
                    <p class="user-summary-note" id="summaryAdminUsersNote">Role administrator</p>
                    <div class="user-summary-bar"><span id="summaryAdminUsersBar"></span></div>
                </article>
                <article class="user-summary-card">
                    <div class="user-summary-top">
                        <span class="user-summary-label">Pengguna Nonaktif</span>
                        <span class="user-summary-icon"><i class="ti ti-user-off"></i></span>
                    </div>
                    <p class="user-summary-value"><span id="summaryInactiveUsers">—</span><small class="user-summary-unit">akun</small></p>
                    <p class="user-summary-note" id="summaryInactiveUsersNote">Status nonaktif pada akun</p>
                    <div class="user-summary-bar"><span id="summaryInactiveUsersBar"></span></div>
                </article>
            </section>

            <section class="user-toolbar" aria-label="Pencarian dan filter pengguna">
                <label class="user-search">
                    <i class="ti ti-search" aria-hidden="true"></i>
                    <input type="search" class="form-control" id="searchUser" placeholder="Cari nama pengguna, username, atau email..." autocomplete="off" aria-label="Cari pengguna">
                </label>
                <select class="form-select user-filter" id="filterRoleUser" aria-label="Filter role pengguna">
                    <option value="">Semua Role</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="user">Pengguna</option>
                </select>
                <select class="form-select user-filter" id="filterStatusUser" aria-label="Filter status pengguna">
                    <option value="">Semua Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
                <select class="form-select user-filter" id="sortUser" aria-label="Urutkan pengguna">
                    <option value="name">Urutkan: Username (A–Z)</option>
                    <option value="newest">Urutkan: Terbaru</option>
                    <option value="oldest">Urutkan: Terlama</option>
                </select>
                <button class="user-filter-reset" id="resetFilterUser" type="button" aria-label="Reset semua filter" title="Reset semua filter"><i class="ti ti-adjustments-horizontal"></i></button>
            </section>

            <section class="user-table-card" aria-label="Daftar pengguna sistem">
                <header class="user-table-heading">
                    <h2><i class="ti ti-users"></i> Daftar Pengguna Sistem <span class="user-total-pill" id="userTotalPill">— akun</span></h2>
                    <small><i class="ti ti-shield-lock"></i> Pengelolaan akun administrator</small>
                </header>
                <div class="user-table-wrap">
                    <table class="table user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pengguna &amp; Akun</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="userBody">
                            <tr><td class="user-empty" colspan="6">Memuat daftar pengguna...</td></tr>
                        </tbody>
                    </table>
                </div>
                <footer class="user-table-footer">
                    <span id="userCount">Memuat data...</span>
                    <nav class="user-pagination" aria-label="Navigasi halaman pengguna">
                        <button class="user-page-btn" id="prevUserPage" type="button">Sebelumnya</button>
                        <span class="user-page-btn user-page-indicator" id="userPageIndicator" aria-current="page">1 / 1</span>
                        <button class="user-page-btn" id="nextUserPage" type="button">Selanjutnya</button>
                    </nav>
                </footer>
            </section>

            <section class="user-info-grid" aria-label="Informasi pengelolaan pengguna">
                <article class="user-info-card">
                    <h2 class="user-info-title"><span class="user-info-icon"><i class="ti ti-shield-lock"></i></span>Role &amp; Akses Sistem</h2>
                    <p>Aplikasi menyimpan role admin, staff, dan user. Hak akses halaman administrasi diperiksa kembali oleh controller.</p>
                    <ul class="user-role-list">
                        <li><i class="ti ti-shield-check"></i><span><strong>Admin</strong> dapat membuka modul administrasi yang dibatasi role.</span></li>
                        <li><i class="ti ti-user"></i><span><strong>Staff/Pengguna</strong> tidak otomatis memperoleh akses admin.</span></li>
                    </ul>
                </article>
                <article class="user-info-card">
                    <h2 class="user-info-title"><span class="user-info-icon"><i class="ti ti-shield-lock"></i></span>Keamanan Akun</h2>
                    <p>Kelola status aktif dan informasi akun secara hati-hati. Kata sandi tidak ditampilkan dalam daftar pengguna.</p>
                    <div class="user-security-note"><strong>Ubah kata sandi:</strong> isi kolom kata sandi pada formulir edit. Biarkan kosong jika kata sandi tidak ingin diubah.</div>
                    <div class="user-security-checks">
                        <span><i class="ti ti-circle-check"></i>Gunakan kata sandi yang kuat dan jangan membagikan akses administrator.</span>
                        <span><i class="ti ti-circle-check"></i>Periksa kembali role dan status sebelum menyimpan akun.</span>
                    </div>
                </article>
            </section>
        </main>
    </div>
</div>

<div class="modal fade user-modal" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="<?= base_url('user/store'); ?>" id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="createModalLabel">Tambah Pengguna</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="createUsername">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" id="createUsername" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createEmail">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="createEmail" class="form-control" autocomplete="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createPassword">Kata Sandi <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="createPassword" class="form-control" minlength="6" autocomplete="new-password" required>
                    <div class="form-text small">Minimal 6 karakter.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createRole">Role <span class="text-danger">*</span></label>
                    <select name="role" id="createRole" class="form-select" required>
                        <option value="admin" selected>Admin</option>
                        <option value="staff">Staff</option>
                        <option value="user">Pengguna</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createStatus">Status <span class="text-danger">*</span></label>
                    <select name="is_active" id="createStatus" class="form-select" required>
                        <option value="1" selected>Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pengguna</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade user-modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="editModalLabel">Edit Pengguna</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="editUsername">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" id="editUsername" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editEmail">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="editEmail" class="form-control" autocomplete="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editPassword">Kata Sandi <span class="text-muted fw-normal">(opsional)</span></label>
                    <input type="password" name="password" id="editPassword" class="form-control" minlength="6" autocomplete="new-password">
                    <div class="form-text small">Kosongkan jika tidak ingin mengganti kata sandi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editRole">Role <span class="text-danger">*</span></label>
                    <select name="role" id="editRole" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="user">Pengguna</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editStatus">Status <span class="text-danger">*</span></label>
                    <select name="is_active" id="editStatus" class="form-select" required>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
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
        const userBody = document.getElementById('userBody');
        const searchInput = document.getElementById('searchUser');
        const roleFilter = document.getElementById('filterRoleUser');
        const statusFilter = document.getElementById('filterStatusUser');
        const sortSelect = document.getElementById('sortUser');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const createModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal'));
        const editModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal'));
        const pageSize = 6;
        let userData = [];
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

        const initials = (username) => String(username || '')
            .trim()
            .split(/[\s._-]+/)
            .filter(Boolean)
            .slice(0, 2)
            .map((part) => part.charAt(0).toUpperCase())
            .join('') || '—';

        const normalizedRole = (user) => String(user.role || '').trim().toLowerCase();
        const roleLabel = (user) => {
            const role = normalizedRole(user);
            if (role === 'admin') return 'Admin';
            if (role === 'staff') return 'Staff';
            if (role === 'user') return 'Pengguna';
            return user.role || 'Tidak diketahui';
        };

        function updateSummary() {
            const activeCount = userData.filter((user) => Number(user.is_active) === 1).length;
            const adminCount = userData.filter((user) => normalizedRole(user) === 'admin').length;
            const inactiveCount = userData.filter((user) => Number(user.is_active) !== 1).length;
            const total = userData.length;
            document.getElementById('summaryTotalUsers').textContent = total;
            document.getElementById('summaryActiveUsers').textContent = activeCount;
            document.getElementById('summaryAdminUsers').textContent = adminCount;
            document.getElementById('summaryInactiveUsers').textContent = inactiveCount;
            document.getElementById('summaryTotalUsersNote').textContent = total + ' akun terdaftar';
            document.getElementById('summaryActiveUsersNote').textContent = total ? Math.round((activeCount / total) * 100) + '% dari seluruh akun' : 'Belum ada data pengguna';
            document.getElementById('summaryAdminUsersNote').textContent = 'Akun dengan role admin';
            document.getElementById('summaryInactiveUsersNote').textContent = inactiveCount + ' akun berstatus nonaktif';
            document.getElementById('summaryTotalUsersBar').style.width = total ? '100%' : '0%';
            document.getElementById('summaryActiveUsersBar').style.width = (total ? (activeCount / total) * 100 : 0) + '%';
            document.getElementById('summaryAdminUsersBar').style.width = (total ? (adminCount / total) * 100 : 0) + '%';
            document.getElementById('summaryInactiveUsersBar').style.width = (total ? (inactiveCount / total) * 100 : 0) + '%';
            document.getElementById('userTotalPill').textContent = total + ' akun';
        }

        function getFilteredUsers() {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const selectedRole = roleFilter.value;
            const selectedStatus = statusFilter.value;
            const result = userData.filter((user) => {
                const searchable = [user.id, user.username, user.email, user.role].join(' ').toLocaleLowerCase('id-ID');
                return (!keyword || searchable.includes(keyword)) &&
                    (!selectedRole || normalizedRole(user) === selectedRole) &&
                    (!selectedStatus || String(Number(user.is_active) === 1 ? 1 : 0) === selectedStatus);
            });

            if (sortSelect.value === 'newest') {
                result.sort((a, b) => {
                    const timeA = parseDate(a.created_at);
                    const timeB = parseDate(b.created_at);
                    return (timeB ? timeB.getTime() : 0) - (timeA ? timeA.getTime() : 0);
                });
            } else if (sortSelect.value === 'oldest') {
                result.sort((a, b) => {
                    const timeA = parseDate(a.created_at);
                    const timeB = parseDate(b.created_at);
                    return (timeA ? timeA.getTime() : 0) - (timeB ? timeB.getTime() : 0);
                });
            } else {
                result.sort((a, b) => String(a.username || '').localeCompare(String(b.username || ''), 'id'));
            }
            return result;
        }

        function renderTable() {
            const filtered = getFilteredUsers();
            const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
            currentPage = Math.min(currentPage, pageCount);
            const startIndex = (currentPage - 1) * pageSize;
            const pageRows = filtered.slice(startIndex, startIndex + pageSize);

            if (!pageRows.length) {
                const message = userData.length ? 'Tidak ada pengguna yang sesuai dengan pencarian atau filter.' : 'Belum ada data pengguna.';
                userBody.innerHTML = '<tr><td colspan="6" class="user-empty">' + message + '</td></tr>';
            } else {
                const avatarClasses = ['', 'is-green', 'is-blue', 'is-coral'];
                userBody.innerHTML = pageRows.map((user, index) => {
                    const role = normalizedRole(user);
                    const roleClass = role === 'admin' ? '' : (role === 'staff' ? 'is-staff' : 'is-user');
                    const active = Number(user.is_active) === 1;
                    const username = escapeHTML(user.username || 'Tanpa username');
                    const email = escapeHTML(user.email || 'Email belum tersedia');
                    const roleText = escapeHTML(roleLabel(user));
                    const id = Number(user.id) || 0;
                    const avatarClass = avatarClasses[(startIndex + index) % avatarClasses.length];

                    return '<tr>' +
                        '<td class="user-row-number">' + (startIndex + index + 1) + '</td>' +
                        '<td><div class="user-profile">' +
                            '<span class="user-avatar ' + avatarClass + '">' + escapeHTML(initials(user.username)) + '</span>' +
                            '<span><strong class="user-name" title="' + username + '">' + username + '</strong><small class="user-email">' + email + '</small></span>' +
                        '</div></td>' +
                        '<td><span class="user-role ' + roleClass + '"><i class="ti ' + (role === 'admin' ? 'ti-shield-check' : 'ti-user') + '"></i>' + roleText + '</span></td>' +
                        '<td><span class="user-status ' + (active ? 'is-active' : 'is-inactive') + '">' + (active ? 'Aktif' : 'Nonaktif') + '</span></td>' +
                        '<td><span class="user-date">' + escapeHTML(formatDate(user.created_at)) + '</span><small class="user-system-id">Tanggal dibuat</small></td>' +
                        '<td><div class="user-actions">' +
                            '<button type="button" class="user-action-btn btn-edit-user" data-id="' + id + '" title="Edit pengguna" aria-label="Edit pengguna ' + username + '"><i class="ti ti-edit"></i></button>' +
                            '<button type="button" class="user-action-btn is-danger btn-delete-user" data-id="' + id + '" title="Hapus pengguna" aria-label="Hapus pengguna ' + username + '"><i class="ti ti-trash"></i></button>' +
                        '</div></td>' +
                    '</tr>';
                }).join('');
            }

            const start = filtered.length ? startIndex + 1 : 0;
            const end = Math.min(startIndex + pageSize, filtered.length);
            document.getElementById('userCount').textContent =
                'Menampilkan ' + start + '–' + end + ' dari ' + filtered.length + ' pengguna terdaftar';
            document.getElementById('userPageIndicator').textContent = currentPage + ' / ' + pageCount;
            document.getElementById('prevUserPage').disabled = currentPage <= 1;
            document.getElementById('nextUserPage').disabled = currentPage >= pageCount;
        }

        async function fetchUsers(showError = true) {
            userBody.innerHTML = '<tr><td colspan="6" class="user-empty">Memuat daftar pengguna...</td></tr>';
            try {
                const response = await fetch('<?= base_url('user/get_all'); ?>', {
                    headers: { 'Accept': 'application/json' }
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!Array.isArray(result)) throw new Error('Format data pengguna tidak valid');
                userData = result;
                currentPage = 1;
                updateSummary();
                renderTable();
                return true;
            } catch (error) {
                console.error('Gagal mengambil daftar pengguna:', error);
                userBody.innerHTML = '<tr><td colspan="6" class="user-empty">Data pengguna gagal dimuat. Coba muat ulang halaman.</td></tr>';
                document.getElementById('userCount').textContent = 'Gagal memuat data';
                if (showError) {
                    Swal.fire('Gagal memuat data', 'Terjadi kesalahan saat mengambil daftar pengguna.', 'error');
                }
                return false;
            }
        }

        function showFlashMessages() {
            const flash = document.getElementById('userFlashMessages');
            const success = flash.dataset.success;
            const error = flash.dataset.error;
            if (success) {
                Swal.fire({ icon: 'success', title: 'Berhasil', text: success, timer: 1800, showConfirmButton: false });
            } else if (error) {
                Swal.fire({ icon: 'error', title: 'Gagal', text: error });
            }
        }

        document.getElementById('btnTambahUser').addEventListener('click', function() {
            createForm.reset();
            createForm.classList.remove('was-validated');
            createModal.show();
        });

        userBody.addEventListener('click', async function(event) {
            const button = event.target.closest('button[data-id]');
            if (!button) return;
            const user = userData.find((item) => String(item.id) === String(button.dataset.id));
            if (!user) return;

            if (button.classList.contains('btn-edit-user')) {
                document.getElementById('editUsername').value = user.username || '';
                document.getElementById('editEmail').value = user.email || '';
                document.getElementById('editPassword').value = '';
                document.getElementById('editRole').value = normalizedRole(user);
                document.getElementById('editStatus').value = Number(user.is_active) === 1 ? '1' : '0';
                editForm.action = '<?= base_url('user/update/'); ?>' + encodeURIComponent(user.id);
                editForm.classList.remove('was-validated');
                editModal.show();
                return;
            }

            if (button.classList.contains('btn-delete-user')) {
                const confirmation = await Swal.fire({
                    title: 'Hapus pengguna?',
                    text: 'Akun ' + (user.username || '') + ' akan dihapus.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#c14444',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                });
                if (confirmation.isConfirmed) {
                    window.location.href = '<?= base_url('user/delete/'); ?>' + encodeURIComponent(user.id);
                }
            }
        });

        function renderOnFilterChange() {
            currentPage = 1;
            renderTable();
        }

        searchInput.addEventListener('input', renderOnFilterChange);
        roleFilter.addEventListener('change', renderOnFilterChange);
        statusFilter.addEventListener('change', renderOnFilterChange);
        sortSelect.addEventListener('change', renderOnFilterChange);

        document.getElementById('resetFilterUser').addEventListener('click', function() {
            searchInput.value = '';
            roleFilter.value = '';
            statusFilter.value = '';
            sortSelect.value = 'name';
            renderOnFilterChange();
        });

        document.getElementById('prevUserPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        document.getElementById('nextUserPage').addEventListener('click', function() {
            const pageCount = Math.max(1, Math.ceil(getFilteredUsers().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderTable();
            }
        });

        document.getElementById('btnExportUser').addEventListener('click', function() {
            const rows = getFilteredUsers();
            if (!rows.length) {
                Swal.fire('Tidak ada data', 'Tidak ada pengguna untuk diekspor dengan filter ini.', 'info');
                return;
            }
            const quote = (value) => {
                let text = String(value == null ? '' : value);
                if (/^[\s]*[=+\-@]/.test(text)) text = "'" + text;
                return '"' + text.replace(/"/g, '""') + '"';
            };
            const csvRows = [
                ['ID Sistem', 'Username', 'Email', 'Role', 'Status', 'Tanggal Dibuat'],
                ...rows.map((user) => [
                    user.id,
                    user.username,
                    user.email,
                    user.role,
                    Number(user.is_active) === 1 ? 'Aktif' : 'Nonaktif',
                    user.created_at
                ])
            ];
            const csv = csvRows.map((row) => row.map(quote).join(',')).join('\r\n');
            const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'data-pengguna.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 0);
        });

        fetchUsers().then(showFlashMessages);
    });
</script>
