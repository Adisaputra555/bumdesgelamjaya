<style>
    .kategori-page {
        --kategori-ink: #1d2742;
        --kategori-muted: #778198;
        --kategori-border: #e9edf5;
        min-height: calc(100vh - 120px);
        padding-top: 18px;
        padding-bottom: 30px;
        background: #f6f7fc;
    }

    .kategori-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        color: #788198;
        font-size: 0.66rem;
    }

    .kategori-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .kategori-breadcrumbs strong {
        color: #3026ad;
        font-weight: 600;
    }

    .kategori-toolbar-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 10px;
    }

    .kategori-toolbar-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        color: #6d778d;
        font-size: 0.62rem;
    }

    .kategori-year-pill {
        padding: 5px 8px;
        border-radius: 99px;
        color: #3026ad;
        background: #e9e9ff;
        font-size: 0.58rem;
        font-weight: 650;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .kategori-sync {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .kategori-sync i {
        color: #14946b;
    }

    .kategori-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 16px 18px;
        margin-bottom: 13px;
        border: 1px solid #e8ebf8;
        border-radius: 10px;
        background: linear-gradient(110deg, #fff 0%, #fff 65%, #eaf9f7 100%);
    }

    .kategori-heading h1 {
        margin: 0 0 4px;
        color: var(--kategori-ink);
        font-size: clamp(1.25rem, 2vw, 1.6rem);
        font-weight: 650;
        letter-spacing: -0.035em;
    }

    .kategori-heading p {
        max-width: 700px;
        margin: 0;
        color: #69748a;
        font-size: 0.68rem;
        line-height: 1.55;
    }

    .kategori-heading-note {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 190px;
        padding: 10px;
        border-radius: 7px;
        color: #2920a6;
        background: #eef2ff;
    }

    .kategori-heading-note i {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        flex: 0 0 28px;
        border-radius: 6px;
        color: #3426ba;
        background: #e0e5ff;
    }

    .kategori-heading-note small,
    .kategori-heading-note strong {
        display: block;
    }

    .kategori-heading-note small {
        color: #788198;
        font-size: 0.54rem;
        text-transform: uppercase;
    }

    .kategori-heading-note strong {
        margin-top: 2px;
        font-size: 0.66rem;
        font-weight: 600;
    }

    .kategori-actions {
        display: flex;
        justify-content: flex-end;
        gap: 7px;
        margin-bottom: 12px;
    }

    .kategori-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 6px;
        font-size: 0.64rem;
        font-weight: 550;
    }

    .kategori-btn-export {
        border: 1px solid var(--kategori-border);
        color: #3c465d;
        background: #fff;
    }

    .kategori-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .kategori-btn-add:hover {
        border-color: #1d0f82;
        color: #fff;
        background: #1d0f82;
    }

    .kategori-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
        margin-bottom: 12px;
    }

    .kategori-stat {
        min-width: 0;
        padding: 12px;
        border: 1px solid var(--kategori-border);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 3px 10px rgba(32, 49, 88, 0.035);
    }

    .kategori-stat-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 7px;
        margin-bottom: 8px;
    }

    .kategori-stat-label {
        color: #737d93;
        font-size: 0.55rem;
        font-weight: 650;
        letter-spacing: 0.055em;
        text-transform: uppercase;
    }

    .kategori-stat-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        flex: 0 0 25px;
        border-radius: 6px;
        color: #3026ad;
        background: #ecebff;
    }

    .kategori-stat:nth-child(2) .kategori-stat-icon {
        color: #10835f;
        background: #d9faee;
    }

    .kategori-stat:nth-child(3) .kategori-stat-icon {
        color: #5746c8;
        background: #ebe8ff;
    }

    .kategori-stat:nth-child(4) .kategori-stat-icon {
        color: #b06b2c;
        background: #fff1df;
    }

    .kategori-stat-value {
        margin: 0;
        color: var(--kategori-ink);
        font-size: 1.16rem;
        font-weight: 700;
        letter-spacing: -0.035em;
    }

    .kategori-stat-note {
        min-height: 25px;
        margin: 3px 0 7px;
        color: #727d92;
        font-size: 0.57rem;
        line-height: 1.4;
    }

    .kategori-stat-bar {
        height: 3px;
        overflow: hidden;
        border-radius: 99px;
        background: #e7edff;
    }

    .kategori-stat-bar span {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        background: #3020a7;
    }

    .kategori-stat:nth-child(2) .kategori-stat-bar span {
        background: #138363;
    }

    .kategori-stat:nth-child(3) .kategori-stat-bar span {
        background: #6c59d4;
    }

    .kategori-stat:nth-child(4) .kategori-stat-bar span {
        background: #cb8a35;
    }

    .kategori-table-card,
    .kategori-distribution-card,
    .kategori-guide-card {
        border: 1px solid var(--kategori-border);
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 3px 10px rgba(32, 49, 88, 0.035);
    }

    .kategori-table-card {
        padding: 12px 12px 0;
        margin-bottom: 12px;
    }

    .kategori-filter-row {
        display: grid;
        grid-template-columns: minmax(200px, 1fr) minmax(140px, 180px) minmax(150px, 190px) 34px;
        gap: 8px;
        margin-bottom: 11px;
    }

    .kategori-search {
        display: flex;
        align-items: center;
        gap: 7px;
        min-height: 34px;
        padding: 0 9px;
        border: 1px solid #edf0f7;
        border-radius: 6px;
        color: #788198;
        background: #f7f8fd;
    }

    .kategori-search input {
        width: 100%;
        min-width: 0;
        border: 0;
        outline: 0;
        color: var(--kategori-ink);
        background: transparent;
        font-size: 0.62rem;
    }

    .kategori-search input::placeholder {
        color: #8a91a3;
    }

    .kategori-filter {
        min-height: 34px;
        border-color: #edf0f7;
        border-radius: 6px;
        color: #38425b;
        font-size: 0.61rem;
    }

    .kategori-sort-icon {
        width: 34px;
        height: 34px;
        border: 1px solid #edf0f7;
        border-radius: 6px;
        color: #59647a;
        background: #fff;
    }

    .kategori-table-wrap {
        overflow-x: auto;
    }

    .kategori-table {
        width: 100%;
        min-width: 760px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .kategori-page .kategori-table thead th {
        padding: 9px 8px;
        border: 0;
        color: #737d93;
        background: #f0f4ff;
        font-size: 0.54rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .kategori-page .kategori-table thead th:first-child {
        border-radius: 5px 0 0 5px;
    }

    .kategori-page .kategori-table thead th:last-child {
        border-radius: 0 5px 5px 0;
        text-align: right;
    }

    .kategori-page .kategori-table tbody td {
        padding: 9px 8px;
        border-bottom: 1px solid #eff2f8;
        color: #3d465d;
        font-size: 0.62rem;
        vertical-align: middle;
    }

    .kategori-page .kategori-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .kategori-number {
        width: 24px;
        color: #788198 !important;
    }

    .kategori-name-cell {
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 165px;
    }

    .kategori-row-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        flex: 0 0 27px;
        border-radius: 7px;
        color: #3026ad;
        background: #e9e9ff;
    }

    .kategori-row-icon.color-green {
        color: #087c60;
        background: #d9faee;
    }

    .kategori-row-icon.color-blue {
        color: #3158b8;
        background: #e5efff;
    }

    .kategori-row-icon.color-orange {
        color: #b06b2c;
        background: #fff1df;
    }

    .kategori-name {
        display: block;
        color: #202944;
        font-weight: 650;
    }

    .kategori-code {
        display: block;
        margin-top: 2px;
        color: #3026ad;
        font-size: 0.54rem;
    }

    .kategori-description {
        display: block;
        max-width: 340px;
        color: #626d83;
        line-height: 1.45;
    }

    .kategori-completeness {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 7px;
        border-radius: 99px;
        color: #087c53;
        background: #d8faeb;
        font-size: 0.55rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .kategori-completeness.is-incomplete {
        color: #97631c;
        background: #fff1d9;
    }

    .kategori-actions {
        display: flex;
        justify-content: flex-end;
        gap: 4px;
    }

    .kategori-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border: 1px solid transparent;
        border-radius: 5px;
        color: #4d5871;
        background: transparent;
    }

    .kategori-action-btn:hover {
        border-color: #e8eaff;
        color: #3026ad;
        background: #f1f2ff;
    }

    .kategori-action-btn.is-delete:hover {
        border-color: #ffe1e5;
        color: #c33c4d;
        background: #fff0f2;
    }

    .kategori-table-empty {
        padding: 26px !important;
        color: #788198 !important;
        text-align: center;
    }

    .kategori-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        min-height: 45px;
        color: #788198;
        font-size: 0.58rem;
    }

    .kategori-pagination {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .kategori-page-btn {
        min-width: 26px;
        height: 26px;
        padding: 0 7px;
        border: 1px solid #edf0f7;
        border-radius: 5px;
        color: #59647a;
        background: #fff;
        font-size: 0.58rem;
    }

    .kategori-page-btn:disabled {
        color: #a4abba;
        cursor: default;
        background: #fafbfe;
    }

    .kategori-page-btn.is-current {
        border-color: #25149f;
        color: #fff;
        background: #25149f;
    }

    .kategori-bottom-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
        gap: 12px;
    }

    .kategori-distribution-card,
    .kategori-guide-card {
        padding: 14px;
    }

    .kategori-bottom-head {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .kategori-bottom-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        flex: 0 0 28px;
        border-radius: 7px;
        color: #3026ad;
        background: #e9e9ff;
    }

    .kategori-bottom-head h2 {
        margin: 0;
        color: var(--kategori-ink);
        font-size: 0.73rem;
        font-weight: 600;
    }

    .kategori-bottom-head p {
        margin: 2px 0 0;
        color: #788198;
        font-size: 0.55rem;
    }

    .kategori-recent-list {
        display: grid;
        gap: 8px;
    }

    .kategori-recent-item {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 10px;
        padding-bottom: 7px;
        border-bottom: 1px solid #f0f2f7;
    }

    .kategori-recent-item:last-child {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .kategori-recent-item strong {
        display: block;
        color: #303a52;
        font-size: 0.59rem;
        font-weight: 550;
    }

    .kategori-recent-item small {
        display: block;
        margin-top: 2px;
        color: #788198;
        font-size: 0.54rem;
    }

    .kategori-recent-item time {
        flex: 0 0 auto;
        color: #69748a;
        font-size: 0.54rem;
    }

    .kategori-guide-card {
        background: linear-gradient(140deg, #eaf0ff, #f0fbf7);
    }

    .kategori-guide-card > p {
        margin: 0 0 10px;
        color: #606b82;
        font-size: 0.62rem;
        line-height: 1.6;
    }

    .kategori-guide-tip {
        display: flex;
        gap: 7px;
        padding: 9px;
        border-radius: 6px;
        color: #3a4760;
        background: rgba(255, 255, 255, 0.72);
        font-size: 0.56rem;
        line-height: 1.5;
    }

    .kategori-guide-tip i {
        flex: 0 0 auto;
        color: #3026ad;
    }

    @media (max-width: 991.98px) {
        .kategori-stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .kategori-bottom-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .kategori-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .kategori-heading-note {
            width: 100%;
        }

        .kategori-filter-row {
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        }

        .kategori-search {
            grid-column: 1 / -1;
        }

        .kategori-sort-icon {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .kategori-toolbar-meta {
            align-items: flex-start;
            flex-direction: column;
            gap: 5px;
        }

        .kategori-stats {
            gap: 8px;
        }

        .kategori-stat {
            padding: 10px;
        }

        .kategori-table-footer {
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
            padding: 8px 0;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content kategori-page">
        <div class="kategori-toolbar-head">
            <div class="kategori-toolbar-meta">
                <span class="kategori-year-pill">Klasifikasi Bisnis · Tahun <?= date('Y') ?></span>
                <span class="kategori-sync"><i class="ti ti-refresh"></i> Data kategori tersedia di sistem</span>
            </div>
            <nav class="kategori-breadcrumbs mb-0" aria-label="Breadcrumb">
                <a href="<?= base_url('dashboard') ?>">Beranda</a><span>/</span>
                <a href="<?= base_url('dashboard') ?>">Dasbor</a><span>/</span><strong>Kategori Usaha</strong>
            </nav>
        </div>

        <div class="kategori-actions">
            <button type="button" class="btn kategori-btn-export" id="btnExportKategori"><i class="ti ti-download"></i> Ekspor Data</button>
            <button type="button" class="btn kategori-btn-add" id="btnTambahKategori"><i class="ti ti-plus"></i> Tambah Kategori</button>
        </div>

        <section class="kategori-heading">
            <div>
                <h1>Kategori Usaha BUMDes</h1>
                <p>Kelola klasifikasi dan deskripsi kategori untuk membantu pengelompokan serta pemantauan unit usaha.</p>
            </div>
            <div class="kategori-heading-note">
                <i class="ti ti-briefcase"></i>
                <span><small>Jenis Data</small><strong>Klasifikasi Unit Usaha</strong></span>
            </div>
        </section>

        <section class="kategori-stats" aria-label="Ringkasan kategori usaha">
            <article class="kategori-stat">
                <div class="kategori-stat-head">
                    <span class="kategori-stat-label">Total Kategori</span>
                    <span class="kategori-stat-icon"><i class="ti ti-folder"></i></span>
                </div>
                <p class="kategori-stat-value" id="totalKategori">—</p>
                <p class="kategori-stat-note">Kategori tercatat pada sistem</p>
                <div class="kategori-stat-bar"><span></span></div>
            </article>
            <article class="kategori-stat">
                <div class="kategori-stat-head">
                    <span class="kategori-stat-label">Deskripsi Tersedia</span>
                    <span class="kategori-stat-icon"><i class="ti ti-file-text"></i></span>
                </div>
                <p class="kategori-stat-value" id="kategoriLengkap">—</p>
                <p class="kategori-stat-note" id="kategoriLengkapNote">Kategori dengan deskripsi</p>
                <div class="kategori-stat-bar"><span id="kategoriLengkapBar"></span></div>
            </article>
            <article class="kategori-stat">
                <div class="kategori-stat-head">
                    <span class="kategori-stat-label">Ditambahkan Tahun Ini</span>
                    <span class="kategori-stat-icon"><i class="ti ti-calendar-plus"></i></span>
                </div>
                <p class="kategori-stat-value" id="kategoriTahunIni">—</p>
                <p class="kategori-stat-note">Berdasarkan tanggal dibuat</p>
                <div class="kategori-stat-bar"><span id="kategoriTahunIniBar"></span></div>
            </article>
            <article class="kategori-stat">
                <div class="kategori-stat-head">
                    <span class="kategori-stat-label">Perlu Dilengkapi</span>
                    <span class="kategori-stat-icon"><i class="ti ti-alert-circle"></i></span>
                </div>
                <p class="kategori-stat-value" id="kategoriKurang">—</p>
                <p class="kategori-stat-note">Nama atau deskripsi kosong</p>
                <div class="kategori-stat-bar"><span id="kategoriKurangBar"></span></div>
            </article>
        </section>

        <section class="kategori-table-card" aria-label="Daftar kategori usaha">
            <div class="kategori-filter-row">
                <label class="kategori-search" for="searchInput">
                    <i class="ti ti-search"></i>
                    <input type="search" id="searchInput" placeholder="Cari kategori, kode, deskripsi..." autocomplete="off">
                </label>
                <select id="completenessFilter" class="form-select kategori-filter" aria-label="Filter kelengkapan">
                    <option value="">Semua Status</option>
                    <option value="complete">Informasi Lengkap</option>
                    <option value="incomplete">Perlu Dilengkapi</option>
                </select>
                <select id="sortKategori" class="form-select kategori-filter" aria-label="Urutkan kategori">
                    <option value="name">Urutkan: Nama A-Z</option>
                    <option value="newest">Urutkan: Terbaru</option>
                    <option value="oldest">Urutkan: Terlama</option>
                </select>
                <button class="kategori-sort-icon" id="resetKategoriFilters" type="button" aria-label="Reset semua filter" title="Reset semua filter"><i class="ti ti-filter"></i></button>
            </div>
            <div id="alertPlaceholder"></div>
            <div class="kategori-table-wrap">
                <table class="table kategori-table" id="kategoriTable">
                    <thead>
                        <tr>
                            <th class="kategori-number">#</th>
                            <th>Nama Kategori &amp; Kode</th>
                            <th>Keterangan &amp; Ruang Lingkup</th>
                            <th>Kelengkapan</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kategoriBody">
                        <tr><td colspan="6" class="kategori-table-empty">Memuat kategori usaha…</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="kategori-table-footer">
                <span id="kategoriCount">Memuat data...</span>
                <div class="kategori-pagination">
                    <button class="kategori-page-btn" id="prevKategoriPage" type="button">‹ Sebelumnya</button>
                    <button class="kategori-page-btn is-current" id="kategoriPageIndicator" type="button" aria-current="page">1 / 1</button>
                    <button class="kategori-page-btn" id="nextKategoriPage" type="button">Selanjutnya ›</button>
                </div>
            </div>
        </section>

        <section class="kategori-bottom-grid" aria-label="Ringkasan kategori">
            <article class="kategori-distribution-card">
                <div class="kategori-bottom-head">
                    <span class="kategori-bottom-icon"><i class="ti ti-calendar"></i></span>
                    <div>
                        <h2>Kategori Terbaru</h2>
                        <p>Urutan berdasarkan tanggal dibuat</p>
                    </div>
                </div>
                <div class="kategori-recent-list" id="kategoriRecentList">
                    <span class="kategori-recent-item"><small>Memuat data kategori…</small></span>
                </div>
            </article>
            <aside class="kategori-guide-card">
                <div class="kategori-bottom-head">
                    <span class="kategori-bottom-icon" style="color:#087c53;background:#d9faee"><i class="ti ti-shield-check"></i></span>
                    <div>
                        <h2>Pedoman Klasifikasi</h2>
                        <p>Informasi kategori yang konsisten</p>
                    </div>
                </div>
                <p>Gunakan nama kategori yang mudah dipahami dan deskripsi yang menjelaskan ruang lingkupnya agar unit usaha dapat dikelompokkan dengan jelas.</p>
                <div class="kategori-guide-tip">
                    <i class="ti ti-info-circle"></i>
                    <span>Periksa kelengkapan nama dan deskripsi sebelum menyimpan kategori baru.</span>
                </div>
            </aside>
        </section>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="createNamaKategori" class="form-label">Nama Kategori *</label>
                    <input type="text" class="form-control" id="createNamaKategori" name="nama_kategori" required />
                    <div class="invalid-feedback">Nama kategori wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createDeskripsi" class="form-label">Deskripsi *</label>
                    <textarea class="form-control" id="createDeskripsi" name="deskripsi" rows="3" required></textarea>
                    <div class="invalid-feedback">Deskripsi wajib diisi.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id" />
                <div class="mb-3">
                    <label for="editNamaKategori" class="form-label">Nama Kategori *</label>
                    <input type="text" class="form-control" id="editNamaKategori" name="nama_kategori" required />
                    <div class="invalid-feedback">Nama kategori wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editDeskripsi" class="form-label">Deskripsi *</label>
                    <textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="3" required></textarea>
                    <div class="invalid-feedback">Deskripsi wajib diisi.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (() => {
        const kategoriBody = document.getElementById('kategoriBody');
        const searchInput = document.getElementById('searchInput');
        const completenessFilter = document.getElementById('completenessFilter');
        const sortKategori = document.getElementById('sortKategori');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const createModal = new bootstrap.Modal(document.getElementById('createModal'), {
            backdrop: true
        });
        const editModal = new bootstrap.Modal(document.getElementById('editModal'), {
            backdrop: true
        });

        let kategoriData = [];
        let currentPage = 1;
        const pageSize = 6;

        const escapeHtml = value => String(value == null ? '' : value).replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[character]);

        const hasCompleteInfo = kategori =>
            Boolean(String(kategori.nama_kategori || '').trim() && String(kategori.deskripsi || '').trim());

        const dateValue = kategori => {
            const value = String(kategori.created_at || '').trim();
            const date = new Date(value.replace(' ', 'T'));
            return Number.isNaN(date.getTime()) ? 0 : date.getTime();
        };

        const formatDate = kategori => {
            const timestamp = dateValue(kategori);
            return timestamp
                ? new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }).format(timestamp)
                : '—';
        };

        const filteredKategori = () => {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const completeness = completenessFilter.value;
            const filtered = kategoriData.filter(kategori => {
                const idCode = `kat-${kategori.id || ''}`.toLocaleLowerCase('id-ID');
                const text = [kategori.nama_kategori, kategori.deskripsi, idCode]
                    .map(value => String(value || '').toLocaleLowerCase('id-ID'))
                    .join(' ');
                const complete = hasCompleteInfo(kategori);

                return (!keyword || text.includes(keyword)) &&
                    (!completeness || (completeness === 'complete' ? complete : !complete));
            });

            if (sortKategori.value === 'newest') {
                filtered.sort((a, b) => dateValue(b) - dateValue(a));
            } else if (sortKategori.value === 'oldest') {
                filtered.sort((a, b) => dateValue(a) - dateValue(b));
            } else {
                filtered.sort((a, b) => String(a.nama_kategori || '').localeCompare(String(b.nama_kategori || ''), 'id-ID'));
            }

            return filtered;
        };

        const renderSummary = () => {
            const total = kategoriData.length;
            const complete = kategoriData.filter(hasCompleteInfo).length;
            const incomplete = total - complete;
            const currentYear = String(new Date().getFullYear());
            const createdThisYear = kategoriData.filter(kategori =>
                String(kategori.created_at || '').slice(0, 4) === currentYear
            ).length;
            const percentage = value => total ? Math.round((value / total) * 100) : 0;

            document.getElementById('totalKategori').textContent = total.toLocaleString('id-ID');
            document.getElementById('kategoriLengkap').textContent = complete.toLocaleString('id-ID');
            document.getElementById('kategoriLengkapNote').textContent = `${percentage(complete)}% memiliki nama dan deskripsi`;
            document.getElementById('kategoriTahunIni').textContent = createdThisYear.toLocaleString('id-ID');
            document.getElementById('kategoriKurang').textContent = incomplete.toLocaleString('id-ID');
            document.getElementById('kategoriLengkapBar').style.width = percentage(complete) + '%';
            document.getElementById('kategoriTahunIniBar').style.width = percentage(createdThisYear) + '%';
            document.getElementById('kategoriKurangBar').style.width = percentage(incomplete) + '%';
        };

        const renderRecent = () => {
            const recentList = document.getElementById('kategoriRecentList');
            const recent = kategoriData.slice()
                .sort((a, b) => dateValue(b) - dateValue(a))
                .slice(0, 4);

            if (!recent.length) {
                recentList.innerHTML = '<span class="kategori-recent-item"><small>Belum ada kategori yang tercatat.</small></span>';
                return;
            }

            recentList.innerHTML = recent.map(kategori => `
                <div class="kategori-recent-item">
                    <span>
                        <strong>${escapeHtml(kategori.nama_kategori || 'Kategori tanpa nama')}</strong>
                        <small>KAT-${escapeHtml(kategori.id)} · ${escapeHtml(String(kategori.deskripsi || 'Deskripsi belum tersedia'))}</small>
                    </span>
                    <time>${escapeHtml(formatDate(kategori))}</time>
                </div>
            `).join('');
        };

        const renderTable = () => {
            const filtered = filteredKategori();
            const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
            currentPage = Math.min(currentPage, pageCount);
            const pageItems = filtered.slice((currentPage - 1) * pageSize, currentPage * pageSize);

            kategoriBody.innerHTML = '';
            if (!pageItems.length) {
                kategoriBody.innerHTML = '<tr><td colspan="6" class="kategori-table-empty">Tidak ada kategori yang cocok dengan pencarian.</td></tr>';
            } else {
                pageItems.forEach((kategori, index) => {
                    const complete = hasCompleteInfo(kategori);
                    const name = escapeHtml(kategori.nama_kategori || 'Kategori tanpa nama');
                    const description = escapeHtml(kategori.deskripsi || 'Deskripsi belum tersedia.');
                    const code = `KAT-${escapeHtml(kategori.id)}`;
                    const rowNumber = ((currentPage - 1) * pageSize) + index + 1;

                    kategoriBody.innerHTML += `<tr>
                        <td class="kategori-number">${rowNumber}</td>
                        <td>
                            <div class="kategori-name-cell">
                                <span class="kategori-row-icon"><i class="ti ti-briefcase"></i></span>
                                <span><strong class="kategori-name">${name}</strong><small class="kategori-code">${code}</small></span>
                            </div>
                        </td>
                        <td><span class="kategori-description">${description}</span></td>
                        <td><span class="kategori-completeness ${complete ? '' : 'is-incomplete'}"><i class="ti ti-${complete ? 'check' : 'alert-circle'}"></i>${complete ? 'Lengkap' : 'Perlu dilengkapi'}</span></td>
                        <td>${escapeHtml(formatDate(kategori))}</td>
                        <td>
                            <div class="kategori-actions">
                                <button class="kategori-action-btn" type="button" data-action="edit" data-id="${escapeHtml(kategori.id)}" aria-label="Edit ${name}" title="Edit"><i class="ti ti-edit"></i></button>
                                <button class="kategori-action-btn is-delete" type="button" data-action="delete" data-id="${escapeHtml(kategori.id)}" aria-label="Hapus ${name}" title="Hapus"><i class="ti ti-trash"></i></button>
                            </div>
                        </td>
                    </tr>`;
                });
            }

            const start = filtered.length ? ((currentPage - 1) * pageSize) + 1 : 0;
            const end = Math.min(currentPage * pageSize, filtered.length);
            document.getElementById('kategoriCount').textContent =
                `Menampilkan ${start}-${end} dari ${filtered.length} kategori usaha`;
            document.getElementById('kategoriPageIndicator').textContent = `${currentPage} / ${pageCount}`;
            document.getElementById('prevKategoriPage').disabled = currentPage <= 1;
            document.getElementById('nextKategoriPage').disabled = currentPage >= pageCount;
        };

        const fetchKategori = async () => {
            try {
                const response = await fetch('<?= base_url('KategoriUsaha/get_all'); ?>');
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status);
                }

                const data = await response.json();
                if (!Array.isArray(data)) {
                    throw new Error('Format data kategori tidak sesuai.');
                }

                kategoriData = data;
                renderSummary();
                renderRecent();
                renderTable();
            } catch (error) {
                kategoriBody.innerHTML = '<tr><td colspan="6" class="kategori-table-empty">Data kategori gagal dimuat. Silakan coba lagi.</td></tr>';
                Swal.fire('Error', 'Gagal mengambil data kategori.', 'error');
            }
        };

        const sendKategoriRequest = async (url, method, data) => {
            const response = await fetch(url, {
                method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            if (!response.ok) {
                throw new Error('HTTP ' + response.status);
            }
            return response.json();
        };

        async function addKategori(data) {
            try {
                const result = await sendKategoriRequest('<?= base_url('KategoriUsaha/store'); ?>', 'POST', data);
                if (!result.success) {
                    throw new Error(result.message || 'Gagal menambahkan kategori.');
                }
                createModal.hide();
                createForm.reset();
                createForm.classList.remove('was-validated');
                currentPage = 1;
                await fetchKategori();
                Swal.fire('Berhasil!', 'Kategori berhasil ditambahkan.', 'success');
            } catch (error) {
                Swal.fire('Gagal!', error.message || 'Terjadi kesalahan saat menyimpan kategori.', 'error');
            }
        }

        async function updateKategori(data) {
            try {
                const result = await sendKategoriRequest(`<?= base_url('KategoriUsaha/update'); ?>/${encodeURIComponent(data.id)}`, 'PUT', data);
                if (!result.success) {
                    throw new Error(result.message || 'Gagal memperbarui kategori.');
                }
                editModal.hide();
                editForm.classList.remove('was-validated');
                await fetchKategori();
                Swal.fire('Berhasil!', 'Kategori berhasil diperbarui.', 'success');
            } catch (error) {
                Swal.fire('Gagal!', error.message || 'Terjadi kesalahan saat memperbarui kategori.', 'error');
            }
        }

        async function deleteKategori(id) {
            const confirmation = await Swal.fire({
                title: 'Yakin ingin hapus?',
                text: 'Kategori ini akan dihapus dari daftar.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            });
            if (!confirmation.isConfirmed) return;

            try {
                const response = await fetch(`<?= base_url('kategoriusaha/delete'); ?>/${encodeURIComponent(id)}`, {
                    method: 'DELETE'
                });
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status);
                }
                const result = await response.json();
                if (!result.success) {
                    throw new Error(result.message || 'Gagal menghapus kategori.');
                }
                await fetchKategori();
                Swal.fire('Berhasil!', 'Kategori berhasil dihapus.', 'success');
            } catch (error) {
                Swal.fire('Gagal!', error.message || 'Terjadi kesalahan saat menghapus kategori.', 'error');
            }
        }

        kategoriBody.addEventListener('click', event => {
            const button = event.target.closest('button[data-action]');
            if (!button) return;

            const kategori = kategoriData.find(item => String(item.id) === button.dataset.id);
            if (!kategori) return;

            if (button.dataset.action === 'edit') {
                document.getElementById('editId').value = kategori.id;
                document.getElementById('editNamaKategori').value = kategori.nama_kategori || '';
                document.getElementById('editDeskripsi').value = kategori.deskripsi || '';
                editForm.classList.remove('was-validated');
                editModal.show();
            } else if (button.dataset.action === 'delete') {
                deleteKategori(kategori.id);
            }
        });

        document.getElementById('btnTambahKategori').addEventListener('click', () => {
            createForm.reset();
            createForm.classList.remove('was-validated');
            createModal.show();
        });

        createForm.addEventListener('submit', event => {
            event.preventDefault();
            if (!createForm.checkValidity()) {
                createForm.classList.add('was-validated');
                return;
            }

            addKategori({
                nama_kategori: document.getElementById('createNamaKategori').value.trim(),
                deskripsi: document.getElementById('createDeskripsi').value.trim()
            });
        });

        editForm.addEventListener('submit', event => {
            event.preventDefault();
            if (!editForm.checkValidity()) {
                editForm.classList.add('was-validated');
                return;
            }

            updateKategori({
                id: document.getElementById('editId').value,
                nama_kategori: document.getElementById('editNamaKategori').value.trim(),
                deskripsi: document.getElementById('editDeskripsi').value.trim()
            });
        });

        searchInput.addEventListener('input', () => {
            currentPage = 1;
            renderTable();
        });

        completenessFilter.addEventListener('change', () => {
            currentPage = 1;
            renderTable();
        });

        sortKategori.addEventListener('change', () => {
            currentPage = 1;
            renderTable();
        });

        document.getElementById('resetKategoriFilters').addEventListener('click', () => {
            searchInput.value = '';
            completenessFilter.value = '';
            sortKategori.value = 'name';
            currentPage = 1;
            renderTable();
        });

        document.getElementById('prevKategoriPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });

        document.getElementById('nextKategoriPage').addEventListener('click', () => {
            const pageCount = Math.max(1, Math.ceil(filteredKategori().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderTable();
            }
        });

        document.getElementById('btnExportKategori').addEventListener('click', () => {
            const csvCell = value => {
                const text = String(value == null ? '' : value).replace(/^[\t\r ]*[=+\-@]/, "'$&");
                return '"' + text.replace(/"/g, '""') + '"';
            };
            const rows = filteredKategori().map(kategori => [
                kategori.id,
                kategori.nama_kategori,
                kategori.deskripsi,
                kategori.created_at
            ]);
            const csv = [['ID', 'Nama Kategori', 'Deskripsi', 'Dibuat Pada'], ...rows]
                .map(row => row.map(csvCell).join(',')).join('\r\n');
            const blob = new Blob(['\uFEFF', csv], { type: 'text/csv;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'data-kategori-usaha.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 1000);
        });

        fetchKategori();
    })();
</script>