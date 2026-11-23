<style>
    .usaha-page {
        --usaha-ink: #1d2742;
        --usaha-muted: #778198;
        --usaha-border: #e9edf5;
        padding-top: 18px;
        padding-bottom: 30px;
        background: #f6f7fc;
        min-height: calc(100vh - 120px);
    }

    .usaha-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        color: #788198;
        font-size: 0.68rem;
    }

    .usaha-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .usaha-breadcrumbs a:hover,
    .usaha-breadcrumbs strong {
        color: #2920a6;
    }

    .usaha-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 14px;
    }

    .usaha-heading-kicker {
        margin-bottom: 5px;
        color: #3026ad;
        font-size: 0.62rem;
        font-weight: 700;
        letter-spacing: 0.09em;
        text-transform: uppercase;
    }

    .usaha-heading-kicker span {
        margin-left: 5px;
        color: var(--usaha-muted);
        font-size: 0.63rem;
        font-weight: 400;
        letter-spacing: 0;
        text-transform: none;
    }

    .usaha-heading h1 {
        margin: 0 0 4px;
        color: var(--usaha-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 650;
        letter-spacing: -0.035em;
    }

    .usaha-heading p {
        margin: 0;
        color: var(--usaha-muted);
        font-size: 0.72rem;
    }

    .usaha-heading-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .usaha-heading-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 7px;
        font-size: 0.68rem;
        font-weight: 550;
    }

    .usaha-btn-export {
        border: 1px solid var(--usaha-border);
        color: #3c465d;
        background: #fff;
    }

    .usaha-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .usaha-btn-add:hover {
        border-color: #1b1079;
        color: #fff;
        background: #1b1079;
    }

    .usaha-summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 14px;
    }

    .usaha-summary-card {
        min-width: 0;
        padding: 14px 15px 11px;
        border: 1px solid var(--usaha-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, 0.035);
    }

    .usaha-summary-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 10px;
    }

    .usaha-summary-label {
        color: #737d93;
        font-size: 0.6rem;
        font-weight: 650;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .usaha-summary-icon {
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

    .usaha-summary-card:nth-child(2) .usaha-summary-icon {
        color: #138363;
        background: #dcfaef;
    }

    .usaha-summary-card:nth-child(3) .usaha-summary-icon {
        color: #6a54d8;
        background: #eeebff;
    }

    .usaha-summary-card:nth-child(4) .usaha-summary-icon {
        color: #3158b8;
        background: #e8f0ff;
    }

    .usaha-summary-value {
        margin: 0;
        color: var(--usaha-ink);
        font-size: clamp(1.12rem, 1.8vw, 1.42rem);
        font-weight: 700;
        letter-spacing: -0.04em;
        overflow-wrap: anywhere;
    }

    .usaha-summary-note {
        margin: 3px 0 8px;
        color: var(--usaha-muted);
        font-size: 0.61rem;
    }

    .usaha-summary-bar {
        height: 3px;
        overflow: hidden;
        border-radius: 99px;
        background: #e8edff;
    }

    .usaha-summary-bar span {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        background: #2c1aa2;
    }

    .usaha-summary-card:nth-child(2) .usaha-summary-bar span {
        background: #138363;
    }

    .usaha-summary-card:nth-child(3) .usaha-summary-bar span {
        background: #7866e4;
    }

    .usaha-summary-card:nth-child(4) .usaha-summary-bar span {
        background: #3f67c7;
    }

    .usaha-table-card,
    .usaha-performance-card,
    .usaha-info-card {
        border: 1px solid var(--usaha-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, 0.035);
    }

    .usaha-table-card {
        padding: 14px 15px 0;
        margin-bottom: 14px;
    }

    .usaha-toolbar {
        display: grid;
        grid-template-columns: minmax(200px, 1fr) minmax(140px, 180px) minmax(130px, 160px);
        gap: 9px;
        margin-bottom: 12px;
    }

    .usaha-search-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
        min-height: 36px;
        padding: 0 10px;
        border: 1px solid #edf0f7;
        border-radius: 6px;
        color: #788198;
        background: #f8f9fd;
    }

    .usaha-search-wrap input {
        width: 100%;
        min-width: 0;
        border: 0;
        outline: 0;
        color: var(--usaha-ink);
        background: transparent;
        font-size: 0.67rem;
    }

    .usaha-search-wrap input::placeholder {
        color: #8a91a3;
    }

    .usaha-filter {
        min-height: 36px;
        border-color: #edf0f7;
        border-radius: 6px;
        color: #38425b;
        background-color: #fff;
        font-size: 0.66rem;
    }

    .usaha-table-wrap {
        overflow-x: auto;
    }

    .usaha-table {
        width: 100%;
        min-width: 790px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .usaha-page .usaha-table thead th {
        padding: 10px 9px;
        border: 0;
        color: #737d93;
        background: #f0f4ff;
        font-size: 0.58rem;
        font-weight: 700;
        letter-spacing: 0.055em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .usaha-page .usaha-table thead th:first-child {
        border-radius: 6px 0 0 6px;
    }

    .usaha-page .usaha-table thead th:last-child {
        border-radius: 0 6px 6px 0;
        text-align: right;
    }

    .usaha-page .usaha-table tbody td {
        padding: 10px 9px;
        border-bottom: 1px solid #f0f2f7;
        color: #39435a;
        font-size: 0.67rem;
        vertical-align: middle;
    }

    .usaha-page .usaha-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .usaha-number {
        width: 28px;
        color: #788198 !important;
    }

    .usaha-name-cell {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 200px;
    }

    .usaha-row-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        flex: 0 0 28px;
        border-radius: 7px;
        color: #3026ad;
        background: #ecebff;
    }

    .usaha-row-icon.color-green {
        color: #087c60;
        background: #d9faee;
    }

    .usaha-row-icon.color-blue {
        color: #3158b8;
        background: #e5efff;
    }

    .usaha-row-icon.color-purple {
        color: #674bd3;
        background: #f0eaff;
    }

    .usaha-name {
        display: block;
        color: #202944;
        font-weight: 650;
    }

    .usaha-description {
        display: block;
        max-width: 230px;
        margin-top: 3px;
        overflow: hidden;
        color: #778198;
        font-size: 0.59rem;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .usaha-type-badge {
        display: inline-block;
        padding: 5px 8px;
        border-radius: 99px;
        color: #2d487f;
        background: #e8f0ff;
        font-size: 0.6rem;
        font-weight: 550;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .usaha-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 8px;
        border-radius: 99px;
        color: #087c53;
        background: #d8faeb;
        font-size: 0.59rem;
        font-weight: 600;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .usaha-status::before {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
        content: "";
    }

    .usaha-status.is-inactive {
        color: #647087;
        background: #edf0f5;
    }

    .usaha-actions {
        display: flex;
        justify-content: flex-end;
        gap: 5px;
    }

    .usaha-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        border: 1px solid #e8ebf3;
        border-radius: 6px;
        color: #515d75;
        background: #fff;
    }

    .usaha-action-btn:hover {
        color: #3026ad;
        background: #f1f2ff;
    }

    .usaha-action-btn.is-delete:hover {
        color: #c33c4d;
        background: #fff0f2;
    }

    .usaha-table-empty {
        padding: 28px !important;
        color: #788198 !important;
        text-align: center;
    }

    .usaha-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        min-height: 48px;
        color: #788198;
        font-size: 0.62rem;
    }

    .usaha-pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .usaha-page-btn {
        min-width: 27px;
        height: 27px;
        padding: 0 7px;
        border: 1px solid #edf0f7;
        border-radius: 6px;
        color: #59647a;
        background: #fff;
        font-size: 0.62rem;
    }

    .usaha-page-btn:disabled {
        color: #a4abba;
        cursor: default;
        background: #fafbfe;
    }

    .usaha-page-btn.is-current {
        border-color: #25149f;
        color: #fff;
        background: #25149f;
    }

    .usaha-bottom-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.8fr) minmax(210px, 0.8fr);
        gap: 12px;
    }

    .usaha-performance-card {
        padding: 15px;
    }

    .usaha-bottom-eyebrow {
        color: #788198;
        font-size: 0.58rem;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
    }

    .usaha-bottom-heading {
        margin: 3px 0 12px;
        color: var(--usaha-ink);
        font-size: 0.83rem;
        font-weight: 600;
    }

    .usaha-performance-list {
        display: grid;
        gap: 9px;
    }

    .usaha-performance-row {
        min-width: 0;
    }

    .usaha-performance-meta {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 4px;
        color: #3d465d;
        font-size: 0.61rem;
    }

    .usaha-performance-meta strong {
        overflow: hidden;
        font-weight: 550;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .usaha-performance-meta span {
        flex: 0 0 auto;
        color: #657087;
    }

    .usaha-performance-track {
        height: 4px;
        overflow: hidden;
        border-radius: 99px;
        background: #e7edff;
    }

    .usaha-performance-track span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: #2c1aa2;
    }

    .usaha-performance-row:nth-child(even) .usaha-performance-track span {
        background: #087c60;
    }

    .usaha-performance-empty {
        color: #788198;
        font-size: 0.65rem;
    }

    .usaha-info-card {
        padding: 17px;
        background: #eaf0ff;
    }

    .usaha-info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        margin-bottom: 10px;
        border-radius: 8px;
        color: #fff;
        background: #25149f;
        font-size: 1rem;
    }

    .usaha-info-card h2 {
        margin: 0 0 6px;
        color: var(--usaha-ink);
        font-size: 0.82rem;
        font-weight: 600;
    }

    .usaha-info-card p {
        margin: 0;
        color: #606b82;
        font-size: 0.64rem;
        line-height: 1.6;
    }

    @media (max-width: 991.98px) {
        .usaha-summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .usaha-bottom-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .usaha-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .usaha-heading-actions {
            width: 100%;
        }

        .usaha-heading-actions .btn {
            justify-content: center;
            flex: 1 1 0;
        }

        .usaha-toolbar {
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        }

        .usaha-search-wrap {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 480px) {
        .usaha-summary-grid {
            gap: 8px;
        }

        .usaha-summary-card {
            padding: 11px;
        }

        .usaha-table-card {
            padding-right: 10px;
            padding-left: 10px;
        }

        .usaha-table-footer {
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
            padding: 8px 0;
        }

        .usaha-breadcrumbs {
            margin-bottom: 12px;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content usaha-page">
        <nav class="usaha-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?= base_url('dashboard') ?>"><i class="ti ti-home-2"></i> Beranda</a>
            <span>/</span><a href="<?= base_url('dashboard') ?>">Dasbor</a>
            <span>/</span><strong>Usaha</strong>
        </nav>

        <header class="usaha-heading">
            <div>
                <div class="usaha-heading-kicker">Unit Bisnis <span>· Tahun <?= date('Y') ?></span></div>
                <h1>Manajemen Unit Usaha</h1>
                <p>Kelola data dan pantau status unit usaha BUMDes Sukses Mandiri.</p>
            </div>
            <div class="usaha-heading-actions">
                <button type="button" class="btn usaha-btn-export" id="btnExportUsaha"><i class="ti ti-download"></i> Ekspor Data</button>
                <button type="button" class="btn usaha-btn-add" id="btnTambahUsaha"><i class="ti ti-plus"></i> Tambah Usaha</button>
            </div>
        </header>

        <section class="usaha-summary-grid" aria-label="Ringkasan unit usaha">
            <article class="usaha-summary-card">
                <div class="usaha-summary-top">
                    <span class="usaha-summary-label">Total Unit Usaha</span>
                    <span class="usaha-summary-icon"><i class="ti ti-building-store"></i></span>
                </div>
                <p class="usaha-summary-value" id="totalUsaha">—</p>
                <p class="usaha-summary-note">Unit usaha terdaftar</p>
                <div class="usaha-summary-bar"><span></span></div>
            </article>
            <article class="usaha-summary-card">
                <div class="usaha-summary-top">
                    <span class="usaha-summary-label">Usaha Aktif</span>
                    <span class="usaha-summary-icon"><i class="ti ti-circle-check"></i></span>
                </div>
                <p class="usaha-summary-value" id="usahaAktif">—</p>
                <p class="usaha-summary-note">Berstatus aktif</p>
                <div class="usaha-summary-bar"><span id="usahaAktifBar"></span></div>
            </article>
            <article class="usaha-summary-card">
                <div class="usaha-summary-top">
                    <span class="usaha-summary-label">Jenis Usaha</span>
                    <span class="usaha-summary-icon"><i class="ti ti-briefcase"></i></span>
                </div>
                <p class="usaha-summary-value" id="jenisUsaha">—</p>
                <p class="usaha-summary-note">Kategori berbeda</p>
                <div class="usaha-summary-bar"><span></span></div>
            </article>
            <article class="usaha-summary-card">
                <div class="usaha-summary-top">
                    <span class="usaha-summary-label">Total Modal Awal</span>
                    <span class="usaha-summary-icon"><i class="ti ti-building-bank"></i></span>
                </div>
                <p class="usaha-summary-value" id="totalModalAwal">—</p>
                <p class="usaha-summary-note">Akumulasi modal tercatat</p>
                <div class="usaha-summary-bar"><span></span></div>
            </article>
        </section>

        <section class="usaha-table-card" aria-label="Daftar unit usaha">
            <div class="usaha-toolbar">
                <label class="usaha-search-wrap" for="searchInput">
                    <i class="ti ti-search"></i>
                    <input type="search" id="searchInput" placeholder="Cari nama usaha atau deskripsi..." autocomplete="off">
                </label>
                <select class="form-select usaha-filter" id="categoryFilter" aria-label="Filter jenis usaha">
                    <option value="">Semua Jenis</option>
                </select>
                <select class="form-select usaha-filter" id="statusFilter" aria-label="Filter status">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>

            <div id="alertPlaceholder"></div>

            <div class="usaha-table-wrap">
                <table class="table usaha-table" id="usahaTable">
                    <thead>
                        <tr>
                            <th class="usaha-number">#</th>
                            <th>Nama Usaha</th>
                            <th>Jenis</th>
                            <th>Modal Awal</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="usahaBody">
                        <tr><td colspan="7" class="usaha-table-empty">Memuat data unit usaha…</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="usaha-table-footer">
                <span id="usahaCount">Memuat data...</span>
                <div class="usaha-pagination">
                    <button class="usaha-page-btn" id="prevPage" type="button">‹ Sebelumnya</button>
                    <button class="usaha-page-btn is-current" id="pageIndicator" type="button" aria-current="page">1 / 1</button>
                    <button class="usaha-page-btn" id="nextPage" type="button">Selanjutnya ›</button>
                </div>
            </div>
        </section>

        <section class="usaha-bottom-grid" aria-label="Ringkasan modal dan informasi">
            <article class="usaha-performance-card">
                <div class="usaha-bottom-eyebrow">Ringkasan Modal</div>
                <h2 class="usaha-bottom-heading">Modal Awal per Unit Usaha</h2>
                <div class="usaha-performance-list" id="usahaPerformanceList">
                    <span class="usaha-performance-empty">Data usaha akan ditampilkan di sini.</span>
                </div>
            </article>
            <aside class="usaha-info-card">
                <span class="usaha-info-icon"><i class="ti ti-building-community"></i></span>
                <h2>Pengelolaan Unit Usaha</h2>
                <p>Pastikan nama, jenis usaha, deskripsi, modal awal, dan status selalu diperbarui agar informasi unit usaha tercatat dengan baik.</p>
            </aside>
        </section>
    </div>
</div>

<!-- Modal Tambah Usaha -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Usaha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="createNamaUsaha" class="form-label">Nama Usaha *</label>
                    <input type="text" class="form-control" id="createNamaUsaha" name="nama_usaha" required />
                    <div class="invalid-feedback">Nama usaha wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createJenis" class="form-label">Jenis *</label>
                    <select class="form-select" id="createJenis" name="jenis" required>
                        <option value="">Pilih Jenis</option>
                        <option value="pertanian">Pertanian</option>
                        <option value="perdagangan">Perdagangan</option>
                        <option value="jasa">Jasa</option>
                        <option value="keuangan">Keuangan</option>
                    </select>
                    <div class="invalid-feedback">Jenis wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label for="createDeskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="createDeskripsi" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="createModalAwal" class="form-label">Modal Awal *</label>
                    <input type="number" class="form-control" id="createModalAwal" name="modal_awal" required />
                    <div class="invalid-feedback">Modal awal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createStatus" class="form-label">Status *</label>
                    <select class="form-select" id="createStatus" name="status" required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">Status wajib dipilih.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Usaha -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Usaha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id" />
                <div class="mb-3">
                    <label for="editNamaUsaha" class="form-label">Nama Usaha *</label>
                    <input type="text" class="form-control" id="editNamaUsaha" name="nama_usaha" required />
                    <div class="invalid-feedback">Nama usaha wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editJenis" class="form-label">Jenis *</label>
                    <select class="form-select" id="editJenis" name="jenis" required>
                        <option value="">Pilih Jenis</option>
                        <option value="pertanian">Pertanian</option>
                        <option value="perdagangan">Perdagangan</option>
                        <option value="jasa">Jasa</option>
                        <option value="keuangan">Keuangan</option>
                    </select>
                    <div class="invalid-feedback">Jenis wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label for="editDeskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="editModalAwal" class="form-label">Modal Awal *</label>
                    <input type="number" class="form-control" id="editModalAwal" name="modal_awal" required />
                    <div class="invalid-feedback">Modal awal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editStatus" class="form-label">Status *</label>
                    <select class="form-select" id="editStatus" name="status" required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">Status wajib dipilih.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const usahaBody = document.getElementById('usahaBody');
        const searchInput = document.getElementById('searchInput');
        const btnTambahUsaha = document.getElementById('btnTambahUsaha');

        const createModalEl = document.getElementById('createModal');
        const editModalEl = document.getElementById('editModal');
        const createModal = new bootstrap.Modal(createModalEl, {
            // backdrop: true
        });
        const editModal = new bootstrap.Modal(editModalEl, {
            // backdrop: true
        });

        const categoryFilter = document.getElementById('categoryFilter');
        const statusFilter = document.getElementById('statusFilter');
        const pageSize = 6;
        let usahaData = [];
        let currentPage = 1;

        const escapeHtml = value => String(value == null ? '' : value).replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[character]);

        const amountOf = usaha => Number(usaha.modal_awal) || 0;
        const formatCurrency = amount => new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(amount);

        const filteredUsaha = () => {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const selectedCategory = categoryFilter.value.toLocaleLowerCase('id-ID');
            const selectedStatus = statusFilter.value.toLocaleLowerCase('id-ID');

            return usahaData.filter(usaha => {
                const searchableText = [usaha.nama_usaha, usaha.jenis, usaha.deskripsi]
                    .map(value => String(value || '').toLocaleLowerCase('id-ID'))
                    .join(' ');
                const category = String(usaha.jenis || '').toLocaleLowerCase('id-ID');
                const status = String(usaha.status || '').toLocaleLowerCase('id-ID');

                return (!keyword || searchableText.includes(keyword)) &&
                    (!selectedCategory || category === selectedCategory) &&
                    (!selectedStatus || status === selectedStatus);
            });
        };

        const updateSummary = () => {
            const activeCount = usahaData.filter(usaha =>
                String(usaha.status || '').toLowerCase() === 'aktif'
            ).length;
            const categories = new Set(usahaData.map(usaha =>
                String(usaha.jenis || '').trim().toLowerCase()
            ).filter(Boolean));
            const totalCapital = usahaData.reduce((total, usaha) => total + amountOf(usaha), 0);
            const activePercent = usahaData.length ? Math.round((activeCount / usahaData.length) * 100) : 0;

            document.getElementById('totalUsaha').textContent = usahaData.length.toLocaleString('id-ID');
            document.getElementById('usahaAktif').textContent = activeCount.toLocaleString('id-ID');
            document.getElementById('jenisUsaha').textContent = categories.size.toLocaleString('id-ID');
            document.getElementById('totalModalAwal').textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                notation: 'compact',
                maximumFractionDigits: 1
            }).format(totalCapital);
            document.getElementById('usahaAktifBar').style.width = activePercent + '%';

            const previousCategory = categoryFilter.value;
            const categoryOptions = Array.from(new Set(usahaData.map(usaha =>
                String(usaha.jenis || '').trim()
            ).filter(Boolean))).sort((a, b) => a.localeCompare(b, 'id-ID'));
            categoryFilter.replaceChildren(new Option('Semua Jenis', ''));
            categoryOptions.forEach(category => categoryFilter.add(new Option(category, category)));
            if (categoryOptions.includes(previousCategory)) {
                categoryFilter.value = previousCategory;
            }

            renderPerformance(totalCapital);
        };

        const renderPerformance = totalCapital => {
            const performanceList = document.getElementById('usahaPerformanceList');
            const topUsaha = usahaData.slice()
                .sort((a, b) => amountOf(b) - amountOf(a))
                .slice(0, 4);

            if (topUsaha.length === 0) {
                performanceList.innerHTML = '<span class="usaha-performance-empty">Belum ada data unit usaha.</span>';
                return;
            }

            performanceList.innerHTML = topUsaha.map(usaha => {
                const modal = amountOf(usaha);
                const share = totalCapital > 0 ? Math.round((modal / totalCapital) * 100) : 0;
                const name = escapeHtml(usaha.nama_usaha || 'Usaha tanpa nama');

                return `<div class="usaha-performance-row">
                    <div class="usaha-performance-meta">
                        <strong title="${name}">${name}</strong>
                        <span>${formatCurrency(modal)} (${share}%)</span>
                    </div>
                    <div class="usaha-performance-track" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="${share}">
                        <span style="width:${share}%"></span>
                    </div>
                </div>`;
            }).join('');
        };

        const renderTable = () => {
            const filtered = filteredUsaha();
            const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
            currentPage = Math.min(currentPage, pageCount);
            const pageItems = filtered.slice((currentPage - 1) * pageSize, currentPage * pageSize);

            usahaBody.innerHTML = '';
            if (pageItems.length === 0) {
                usahaBody.innerHTML = '<tr><td colspan="7" class="usaha-table-empty">Tidak ada unit usaha yang cocok dengan pencarian.</td></tr>';
            } else {
                pageItems.forEach((usaha, index) => {
                    const status = String(usaha.status || 'Tidak diketahui');
                    const active = status.toLowerCase() === 'aktif';
                    const name = escapeHtml(usaha.nama_usaha || 'Usaha tanpa nama');
                    const description = escapeHtml(usaha.deskripsi || 'Belum ada deskripsi');
                    const category = escapeHtml(usaha.jenis || 'Belum dikategorikan');
                    const createdAt = escapeHtml(String(usaha.created_at || '').slice(0, 10) || '-');
                    const rowNumber = ((currentPage - 1) * pageSize) + index + 1;

                    usahaBody.innerHTML += `<tr>
                        <td class="usaha-number">${rowNumber}</td>
                        <td>
                            <div class="usaha-name-cell">
                                <span class="usaha-row-icon"><i class="ti ti-building-store"></i></span>
                                <span><strong class="usaha-name">${name}</strong><small class="usaha-description">${description}</small></span>
                            </div>
                        </td>
                        <td><span class="usaha-type-badge">${category}</span></td>
                        <td>${formatCurrency(amountOf(usaha))}</td>
                        <td><span class="usaha-status ${active ? '' : 'is-inactive'}">${escapeHtml(status)}</span></td>
                        <td>${createdAt}</td>
                        <td>
                            <div class="usaha-actions">
                                <button class="usaha-action-btn" type="button" data-id="${escapeHtml(usaha.id)}" data-action="edit" aria-label="Edit ${name}" title="Edit"><i class="ti ti-edit"></i></button>
                                <button class="usaha-action-btn is-delete" type="button" data-id="${escapeHtml(usaha.id)}" data-action="hapus" aria-label="Hapus ${name}" title="Hapus"><i class="ti ti-trash"></i></button>
                            </div>
                        </td>
                    </tr>`;
                });
            }

            const start = filtered.length ? ((currentPage - 1) * pageSize) + 1 : 0;
            const end = Math.min(currentPage * pageSize, filtered.length);
            document.getElementById('usahaCount').textContent =
                `Menampilkan ${start}-${end} dari ${filtered.length} unit usaha`;
            document.getElementById('pageIndicator').textContent = `${currentPage} / ${pageCount}`;
            document.getElementById('prevPage').disabled = currentPage <= 1;
            document.getElementById('nextPage').disabled = currentPage >= pageCount;
        };

        const fetchUsaha = async () => {
            try {
                const response = await fetch('<?= base_url('usaha/get_all'); ?>');
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status);
                }

                const data = await response.json();
                if (!Array.isArray(data)) {
                    throw new Error('Format data usaha tidak sesuai.');
                }

                usahaData = data;
                updateSummary();
                renderTable();
            } catch (error) {
                usahaBody.innerHTML = '<tr><td colspan="7" class="usaha-table-empty">Data usaha gagal dimuat. Silakan coba lagi.</td></tr>';
                Swal.fire('Gagal', 'Gagal mengambil data usaha.', 'error');
            }
        };

        searchInput.addEventListener('input', () => {
            currentPage = 1;
            renderTable();
        });

        categoryFilter.addEventListener('change', () => {
            currentPage = 1;
            renderTable();
        });

        statusFilter.addEventListener('change', () => {
            currentPage = 1;
            renderTable();
        });

        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });

        document.getElementById('nextPage').addEventListener('click', () => {
            const pageCount = Math.max(1, Math.ceil(filteredUsaha().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderTable();
            }
        });

        document.getElementById('btnExportUsaha').addEventListener('click', () => {
            const csvCell = value => {
                const text = String(value == null ? '' : value).replace(/^[\t\r ]*[=+\-@]/, "'$&");
                return '"' + text.replace(/"/g, '""') + '"';
            };
            const headers = ['Nama Usaha', 'Jenis', 'Deskripsi', 'Modal Awal', 'Status', 'Dibuat Pada'];
            const rows = filteredUsaha().map(usaha => [
                usaha.nama_usaha,
                usaha.jenis,
                usaha.deskripsi,
                usaha.modal_awal,
                usaha.status,
                usaha.created_at
            ]);
            const csv = [headers, ...rows].map(row => row.map(csvCell).join(',')).join('\r\n');
            const blob = new Blob(['\uFEFF', csv], { type: 'text/csv;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'data-unit-usaha.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 1000);
        });

        const addUsaha = async (data) => {
            try {
                const res = await fetch(`<?= base_url('usaha/store'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                const result = await res.json();
                if (result.success) {
                    Swal.fire('Berhasil', 'Usaha berhasil ditambahkan.', 'success');
                    document.getElementById('createForm').reset();
                    createModal.hide();
                    fetchUsaha();
                } else {
                    Swal.fire('Gagal', result.message || 'Gagal menambahkan usaha.', 'error');
                }
            } catch (err) {
                Swal.fire('Error', 'Gagal menambahkan usaha.', 'error');
            }
        };

        const deleteUsaha = async (id) => {
            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: 'Data akan dihapus permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(async (res) => {
                if (res.isConfirmed) {
                    try {
                        const req = await fetch(`<?= base_url('usaha/delete'); ?>/${id}`, {
                            method: 'DELETE'
                        });
                        const resJson = await req.json();
                        if (resJson.success) {
                            Swal.fire('Berhasil', 'Usaha dihapus.', 'success');
                            fetchUsaha();
                        } else {
                            Swal.fire('Gagal', resJson.message || 'Gagal menghapus usaha.', 'error');
                        }
                    } catch (err) {
                        Swal.fire('Error', 'Gagal menghapus usaha.', 'error');
                    }
                }
            });
        };

        document.getElementById('createForm').addEventListener('submit', e => {
            e.preventDefault();
            const formData = new FormData(e.target);
            addUsaha(Object.fromEntries(formData.entries()));
        });

        document.getElementById('editForm').addEventListener('submit', async e => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            try {
                const res = await fetch(`<?= base_url('usaha/update'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                const result = await res.json();
                if (result.success) {
                    Swal.fire('Berhasil', 'Usaha diperbarui.', 'success');
                    editModal.hide();
                    fetchUsaha();
                } else {
                    Swal.fire('Gagal', result.message || 'Gagal memperbarui usaha.', 'error');
                }
            } catch (err) {
                Swal.fire('Error', 'Gagal memperbarui usaha.', 'error');
            }
        });

        btnTambahUsaha.addEventListener('click', () => createModal.show());

        usahaBody.addEventListener('click', e => {
            const btn = e.target.closest('button');
            if (!btn) return;
            const id = btn.dataset.id;
            const action = btn.dataset.action;
            const usaha = usahaData.find(u => u.id == id);

            if (action === 'edit' && usaha) {
                document.getElementById('editId').value = usaha.id;
                document.getElementById('editNamaUsaha').value = usaha.nama_usaha;
                document.getElementById('editJenis').value = usaha.jenis;
                document.getElementById('editDeskripsi').value = usaha.deskripsi;
                document.getElementById('editModalAwal').value = usaha.modal_awal;
                document.getElementById('editStatus').value = usaha.status;
                editModal.show();
            } else if (action === 'hapus') {
                deleteUsaha(id);
            }
        });

        fetchUsaha();
    });
</script>