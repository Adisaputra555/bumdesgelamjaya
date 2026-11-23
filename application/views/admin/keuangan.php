<style>
    .keuangan-page {
        --keuangan-ink: #1d2742;
        --keuangan-muted: #778198;
        --keuangan-border: #e9edf5;
        padding: 18px 0 30px;
        background: #f6f7fc;
        min-height: calc(100vh - 120px);
    }

    .keuangan-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 13px;
        color: #788198;
        font-size: .66rem;
    }

    .keuangan-breadcrumbs a {
        color: #59647a;
        text-decoration: none;
    }

    .keuangan-breadcrumbs a:hover,
    .keuangan-breadcrumbs strong {
        color: #2920a6;
    }

    .keuangan-context {
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

    .keuangan-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 13px;
    }

    .keuangan-kicker {
        margin-bottom: 5px;
        color: #3026ad;
        font-size: .59rem;
        font-weight: 700;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .keuangan-heading h1 {
        margin: 0 0 4px;
        color: var(--keuangan-ink);
        font-size: clamp(1.35rem, 2.5vw, 1.8rem);
        font-weight: 650;
        letter-spacing: -.035em;
    }

    .keuangan-heading p {
        max-width: 650px;
        margin: 0;
        color: var(--keuangan-muted);
        font-size: .69rem;
        line-height: 1.6;
    }

    .keuangan-heading-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .keuangan-heading-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 7px;
        font-size: .65rem;
        font-weight: 550;
        white-space: nowrap;
    }

    .keuangan-btn-export {
        border: 1px solid var(--keuangan-border);
        color: #3c465d;
        background: #fff;
    }

    .keuangan-btn-add {
        border: 1px solid #25149f;
        color: #fff;
        background: #25149f;
    }

    .keuangan-btn-add:hover {
        border-color: #1b1079;
        color: #fff;
        background: #1b1079;
    }

    .keuangan-chart-card {
        margin-bottom: 12px;
        padding: 14px 15px 11px;
        border: 1px solid var(--keuangan-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .keuangan-chart-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 7px;
    }

    .keuangan-chart-title {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 0;
    }

    .keuangan-chart-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 31px;
        height: 31px;
        flex: 0 0 31px;
        border-radius: 8px;
        color: #3026ad;
        background: #e9eaff;
    }

    .keuangan-chart-title strong {
        display: block;
        color: #25304a;
        font-size: .77rem;
        font-weight: 650;
    }

    .keuangan-chart-title small {
        display: block;
        margin-top: 2px;
        color: var(--keuangan-muted);
        font-size: .57rem;
    }

    .keuangan-chart-controls {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 9px;
        flex-wrap: wrap;
    }

    .keuangan-period-pill {
        padding: 4px 8px;
        border-radius: 99px;
        color: #087352;
        background: #d7faeb;
        font-size: .55rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .keuangan-chart-legend {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #59647a;
        font-size: .57rem;
        white-space: nowrap;
    }

    .keuangan-legend-item {
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .keuangan-legend-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #108257;
    }

    .keuangan-legend-dot.is-out {
        background: #d53838;
    }

    .keuangan-month-nav {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px;
        border: 1px solid var(--keuangan-border);
        border-radius: 7px;
        background: #f8f9fd;
    }

    .keuangan-month-nav button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 24px;
        border: 0;
        border-radius: 5px;
        color: #505b72;
        background: transparent;
    }

    .keuangan-month-nav button:hover {
        color: #3026ad;
        background: #e9eaff;
    }

    .keuangan-month-nav span {
        min-width: 76px;
        color: #364159;
        font-size: .57rem;
        font-weight: 600;
        text-align: center;
    }

    .keuangan-chart-wrap {
        position: relative;
        height: 225px;
        margin-top: 4px;
    }

    .keuangan-summary-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 12px;
    }

    .keuangan-summary-card {
        min-width: 0;
        padding: 14px 15px 12px;
        border: 1px solid var(--keuangan-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .keuangan-summary-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 9px;
    }

    .keuangan-summary-eyebrow {
        color: #737d93;
        font-size: .56rem;
        font-weight: 650;
        letter-spacing: .065em;
        text-transform: uppercase;
    }

    .keuangan-summary-title {
        margin: 3px 0 2px;
        color: #26314a;
        font-size: .75rem;
        font-weight: 650;
    }

    .keuangan-summary-note {
        margin: 0;
        color: var(--keuangan-muted);
        font-size: .59rem;
    }

    .keuangan-summary-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border-radius: 8px;
        color: #138363;
        background: #e1f8ee;
    }

    .keuangan-summary-card.is-out .keuangan-summary-icon {
        color: #c94b49;
        background: #ffebea;
    }

    .keuangan-summary-value {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin: 10px 0 7px;
        color: #087352;
        font-size: clamp(1.25rem, 2.3vw, 1.75rem);
        font-weight: 750;
        letter-spacing: -.04em;
        overflow-wrap: anywhere;
    }

    .keuangan-summary-card.is-out .keuangan-summary-value {
        color: #d52d2d;
    }

    .keuangan-summary-count {
        padding: 4px 7px;
        border-radius: 99px;
        color: #087352;
        background: #e7f8ef;
        font-size: .54rem;
        font-weight: 600;
        letter-spacing: 0;
        white-space: nowrap;
    }

    .keuangan-summary-card.is-out .keuangan-summary-count {
        color: #b74644;
        background: #fff0ef;
    }

    .keuangan-summary-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding-top: 8px;
        border-top: 1px solid #edf0f6;
        color: #68748b;
        font-size: .57rem;
    }

    .keuangan-summary-bottom strong {
        color: #37445d;
        font-weight: 600;
    }

    .keuangan-list-card {
        overflow: hidden;
        border: 1px solid var(--keuangan-border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 49, 88, .035);
    }

    .keuangan-list-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 12px 14px;
        border-bottom: 1px solid #eef0f6;
    }

    .keuangan-list-title {
        min-width: 150px;
    }

    .keuangan-list-title h2 {
        margin: 0 0 3px;
        color: #26314a;
        font-size: .82rem;
        font-weight: 650;
    }

    .keuangan-list-title p {
        margin: 0;
        color: var(--keuangan-muted);
        font-size: .57rem;
    }

    .keuangan-list-controls {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 7px;
        flex-wrap: wrap;
    }

    .keuangan-type-switch {
        display: inline-flex;
        align-items: center;
        gap: 3px;
        padding: 3px;
        border-radius: 7px;
        background: #f1f3fb;
    }

    .keuangan-type-switch button {
        min-height: 28px;
        padding: 0 9px;
        border: 0;
        border-radius: 5px;
        color: #657087;
        background: transparent;
        font-size: .57rem;
        font-weight: 600;
    }

    .keuangan-type-switch button.is-active {
        color: #087352;
        background: #fff;
        box-shadow: 0 1px 4px rgba(35, 44, 71, .1);
    }

    .keuangan-type-switch button.is-out.is-active {
        color: #b74644;
    }

    .keuangan-search {
        position: relative;
        width: min(185px, 100%);
    }

    .keuangan-search i {
        position: absolute;
        top: 50%;
        left: 9px;
        color: #7d879e;
        transform: translateY(-50%);
    }

    .keuangan-search input,
    .keuangan-business-filter {
        min-height: 32px;
        border-color: transparent;
        border-radius: 6px;
        background: #f1f4ff;
        color: #39445b;
        font-size: .59rem;
        box-shadow: none !important;
    }

    .keuangan-search input {
        padding-left: 28px;
    }

    .keuangan-search input:focus,
    .keuangan-business-filter:focus {
        border-color: #c9c4fa;
        background: #fff;
    }

    .keuangan-business-filter {
        width: 145px;
    }

    .keuangan-add-inline {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        min-height: 31px;
        padding: 0 10px;
        border: 1px solid #25149f;
        border-radius: 6px;
        color: #fff;
        background: #25149f;
        font-size: .59rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .keuangan-add-inline:hover {
        color: #fff;
        background: #1b1079;
    }

    .keuangan-reset-filter {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 31px;
        min-height: 31px;
        border: 1px solid var(--keuangan-border);
        border-radius: 6px;
        color: #4c5870;
        background: #fff;
    }

    .keuangan-reset-filter:hover {
        color: #3026ad;
        background: #f6f5ff;
    }

    .keuangan-table-wrap {
        overflow-x: auto;
    }

    .keuangan-table {
        width: 100%;
        min-width: 730px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .keuangan-table thead th {
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

    .keuangan-table tbody td {
        padding: 10px 9px;
        border-bottom: 1px solid #f0f2f7;
        color: #354057;
        font-size: .61rem;
        vertical-align: middle;
    }

    .keuangan-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .keuangan-table tbody tr:hover {
        background: #fafbff;
    }

    .keuangan-number {
        width: 34px;
        color: #7c869b !important;
    }

    .keuangan-business {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        max-width: 150px;
        padding: 5px 7px;
        border-radius: 6px;
        color: #343293;
        background: #e8eaff;
        font-size: .57rem;
        font-weight: 600;
        line-height: 1.4;
    }

    .keuangan-business.is-green {
        color: #087352;
        background: #daf6ea;
    }

    .keuangan-business.is-blue {
        color: #3158b8;
        background: #e4edff;
    }

    .keuangan-business.is-coral {
        color: #b74644;
        background: #ffe3e1;
    }

    .keuangan-date {
        color: #59647a;
        font-size: .59rem;
        white-space: nowrap;
    }

    .keuangan-description {
        display: -webkit-box;
        max-width: 300px;
        overflow: hidden;
        color: #4e5a72;
        font-size: .6rem;
        line-height: 1.5;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .keuangan-money {
        color: #087352;
        font-size: .62rem;
        font-weight: 700;
        text-align: right;
        white-space: nowrap;
    }

    .keuangan-money.is-out {
        color: #c43232;
    }

    .keuangan-row-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .keuangan-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        border: 1px solid transparent;
        border-radius: 5px;
        color: #647087;
        background: transparent;
    }

    .keuangan-action-btn:hover {
        border-color: #d9d4ff;
        color: #3026ad;
        background: #f6f5ff;
    }

    .keuangan-action-btn.is-danger:hover {
        border-color: #ffd2d2;
        color: #c14444;
        background: #fff5f5;
    }

    .keuangan-empty {
        padding: 34px 14px !important;
        color: #7b859a !important;
        text-align: center;
    }

    .keuangan-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 13px;
        border-top: 1px solid #eef0f6;
        color: #788198;
        font-size: .59rem;
    }

    .keuangan-pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .keuangan-page-btn {
        min-width: 27px;
        height: 27px;
        padding: 0 8px;
        border: 1px solid transparent;
        border-radius: 6px;
        color: #354057;
        background: transparent;
        font-size: .58rem;
    }

    .keuangan-page-btn:disabled {
        color: #a4aabc;
        cursor: default;
    }

    .keuangan-page-btn:not(:disabled):hover {
        background: #f1f3ff;
    }

    .keuangan-page-indicator {
        color: #fff;
        background: #3026ad;
    }

    .keuangan-page-indicator:hover {
        color: #fff;
        background: #3026ad !important;
    }

    .keuangan-modal .modal-content {
        overflow: hidden;
        border: 1px solid #e9edf5;
        border-radius: 12px;
        box-shadow: 0 18px 50px rgba(26, 34, 60, .16);
    }

    .keuangan-modal .modal-header {
        border-bottom-color: #edf0f6;
        background: #fafbff;
    }

    .keuangan-modal .modal-title {
        color: var(--keuangan-ink);
        font-size: .95rem;
        font-weight: 650;
    }

    .keuangan-modal .form-label {
        margin-bottom: 5px;
        color: #46516a;
        font-size: .7rem;
        font-weight: 600;
    }

    .keuangan-modal .form-control,
    .keuangan-modal .form-select {
        min-height: 39px;
        border-color: #e2e7f0;
        border-radius: 7px;
        font-size: .74rem;
    }

    .keuangan-modal textarea.form-control {
        min-height: 75px;
    }

    .keuangan-modal .form-control:focus,
    .keuangan-modal .form-select:focus {
        border-color: #aaa4ed;
        box-shadow: 0 0 0 .18rem rgba(48, 38, 173, .1);
    }

    .keuangan-modal .modal-footer .btn {
        border-radius: 7px;
        font-size: .72rem;
    }

    @media (max-width: 900px) {
        .keuangan-list-head {
            align-items: flex-start;
            flex-direction: column;
        }

        .keuangan-list-controls {
            width: 100%;
            justify-content: flex-start;
        }

        .keuangan-search {
            flex: 1 1 160px;
        }
    }

    @media (max-width: 700px) {
        .keuangan-chart-head {
            align-items: flex-start;
            flex-direction: column;
        }

        .keuangan-chart-controls {
            width: 100%;
            justify-content: space-between;
        }

        .keuangan-chart-wrap {
            height: 200px;
        }
    }

    @media (max-width: 600px) {
        .keuangan-page {
            padding-top: 12px;
        }

        .keuangan-context {
            display: none;
        }

        .keuangan-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .keuangan-heading-actions {
            width: 100%;
        }

        .keuangan-heading-actions .btn {
            flex: 1;
            justify-content: center;
        }

        .keuangan-summary-grid {
            grid-template-columns: 1fr;
            gap: 8px;
        }

        .keuangan-list-controls {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .keuangan-type-switch,
        .keuangan-search {
            grid-column: 1 / -1;
            width: 100%;
        }

        .keuangan-business-filter {
            width: 100%;
        }

        .keuangan-add-inline {
            justify-content: center;
        }

        .keuangan-table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .keuangan-pagination {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content">
        <main class="keuangan-page">
            <nav class="keuangan-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url('dashboard'); ?>">Dasbor</a>
                <span>›</span>
                <strong aria-current="page">Keuangan</strong>
                <span class="keuangan-context">Buku kas umum • Arus kas</span>
            </nav>

            <header class="keuangan-heading">
                <div>
                    <div class="keuangan-kicker">Pembukuan • Arus kas usaha</div>
                    <h1>Data Keuangan</h1>
                    <p>Pantau arus kas, pemasukan usaha, dan pengeluaran operasional secara teratur berdasarkan periode bulanan.</p>
                </div>
                <div class="keuangan-heading-actions">
                    <button class="btn keuangan-btn-export" id="btnExportKeuangan" type="button"><i class="ti ti-download"></i> Ekspor Data</button>
                    <button class="btn keuangan-btn-add" id="btnTambahKeuangan" type="button"><i class="ti ti-plus"></i> Transaksi Kas</button>
                </div>
            </header>

            <section class="keuangan-chart-card" aria-label="Grafik arus kas bulanan">
                <div class="keuangan-chart-head">
                    <div class="keuangan-chart-title">
                        <span class="keuangan-chart-icon"><i class="ti ti-chart-line"></i></span>
                        <span>
                            <strong id="currentMonth">Memuat periode...</strong>
                            <small id="dateRange"></small>
                        </span>
                    </div>
                    <div class="keuangan-chart-controls">
                        <span class="keuangan-period-pill" id="periodStatus">Periode</span>
                        <div class="keuangan-chart-legend" aria-label="Legenda grafik">
                            <span class="keuangan-legend-item"><i class="keuangan-legend-dot"></i>Pemasukan</span>
                            <span class="keuangan-legend-item"><i class="keuangan-legend-dot is-out"></i>Pengeluaran</span>
                        </div>
                        <div class="keuangan-month-nav">
                            <button id="prevMonth" type="button" aria-label="Bulan sebelumnya"><i class="ti ti-chevron-left"></i></button>
                            <span id="monthNavLabel">—</span>
                            <button id="nextMonth" type="button" aria-label="Bulan berikutnya"><i class="ti ti-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="keuangan-chart-wrap">
                    <canvas id="financeChart" aria-label="Grafik pemasukan dan pengeluaran harian"></canvas>
                </div>
            </section>

            <section class="keuangan-summary-grid" aria-label="Ringkasan arus kas periode terpilih">
                <article class="keuangan-summary-card">
                    <div class="keuangan-summary-head">
                        <div>
                            <div class="keuangan-summary-eyebrow">Arus Kas Masuk</div>
                            <h2 class="keuangan-summary-title">Total Pemasukan (Inflow)</h2>
                            <p class="keuangan-summary-note" id="pemasukanNote">Akumulasi penerimaan kas pada periode terpilih</p>
                        </div>
                        <span class="keuangan-summary-icon"><i class="ti ti-login"></i></span>
                    </div>
                    <p class="keuangan-summary-value"><span id="totalPemasukan">Rp 0</span><small class="keuangan-summary-count" id="countPemasukan">0 transaksi</small></p>
                    <div class="keuangan-summary-bottom"><span>Jenis arus</span><strong>Pemasukan</strong></div>
                </article>
                <article class="keuangan-summary-card is-out">
                    <div class="keuangan-summary-head">
                        <div>
                            <div class="keuangan-summary-eyebrow">Arus Kas Keluar</div>
                            <h2 class="keuangan-summary-title">Total Pengeluaran (Outflow)</h2>
                            <p class="keuangan-summary-note" id="pengeluaranNote">Akumulasi pembayaran kas pada periode terpilih</p>
                        </div>
                        <span class="keuangan-summary-icon"><i class="ti ti-logout"></i></span>
                    </div>
                    <p class="keuangan-summary-value"><span id="totalPengeluaran">Rp 0</span><small class="keuangan-summary-count" id="countPengeluaran">0 transaksi</small></p>
                    <div class="keuangan-summary-bottom"><span>Jenis arus</span><strong>Pengeluaran</strong></div>
                </article>
            </section>

            <section class="keuangan-list-card" aria-label="Daftar transaksi keuangan">
                <header class="keuangan-list-head">
                    <div class="keuangan-list-title">
                        <h2 id="transactionListTitle">Daftar Pemasukan</h2>
                        <p id="transactionListDescription">Catatan penerimaan kas pada periode terpilih.</p>
                    </div>
                    <div class="keuangan-list-controls">
                        <div class="keuangan-type-switch" role="group" aria-label="Pilih jenis transaksi">
                            <button type="button" class="is-active" data-type="pemasukan" id="showPemasukan"><i class="ti ti-arrow-down-left"></i> Pemasukan</button>
                            <button type="button" class="is-out" data-type="pengeluaran" id="showPengeluaran"><i class="ti ti-arrow-up-right"></i> Pengeluaran</button>
                        </div>
                        <label class="keuangan-search">
                            <i class="ti ti-search" aria-hidden="true"></i>
                            <input type="search" class="form-control" id="searchTransaksi" placeholder="Cari transaksi..." autocomplete="off" aria-label="Cari transaksi">
                        </label>
                        <select class="form-select keuangan-business-filter" id="filterUsaha" aria-label="Filter unit usaha">
                            <option value="">Semua Unit Usaha</option>
                            <?php foreach ($usaha as $row): ?>
                                <option value="<?= (int) $row->id; ?>"><?= html_escape($row->nama_usaha); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="keuangan-reset-filter" id="resetFilterKeuangan" type="button" title="Reset filter" aria-label="Reset filter"><i class="ti ti-filter"></i></button>
                        <button class="keuangan-add-inline" id="btnTambahBaris" type="button"><i class="ti ti-plus"></i> Tambah</button>
                    </div>
                </header>
                <div class="keuangan-table-wrap">
                    <table class="table keuangan-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Usaha</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th class="text-end">Jumlah</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="keuanganBody">
                            <tr><td class="keuangan-empty" colspan="6">Memuat transaksi...</td></tr>
                        </tbody>
                    </table>
                </div>
                <footer class="keuangan-table-footer">
                    <span id="keuanganCount">Memuat data...</span>
                    <nav class="keuangan-pagination" aria-label="Navigasi halaman transaksi">
                        <button class="keuangan-page-btn" id="prevKeuanganPage" type="button">Sebelumnya</button>
                        <span class="keuangan-page-btn keuangan-page-indicator" id="keuanganPageIndicator" aria-current="page">1 / 1</span>
                        <button class="keuangan-page-btn" id="nextKeuanganPage" type="button">Selanjutnya</button>
                    </nav>
                </footer>
            </section>
        </main>
    </div>
</div>

<div class="modal fade keuangan-modal" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="createModalLabel">Tambah Transaksi Kas</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="createJenis">Jenis Arus Kas <span class="text-danger">*</span></label>
                    <select class="form-select" id="createJenis" name="jenis" required>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createUsaha">Usaha <span class="text-danger">*</span></label>
                    <select class="form-select" id="createUsaha" name="usaha_id" required>
                        <option value="">Pilih usaha...</option>
                        <?php foreach ($usaha as $row): ?>
                            <option value="<?= (int) $row->id; ?>"><?= html_escape($row->nama_usaha); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Usaha wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createTanggal">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="createTanggal" name="tanggal" value="<?= date('Y-m-d'); ?>" required>
                    <div class="invalid-feedback">Tanggal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createJumlah">Jumlah (Rp) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="createJumlah" name="jumlah" min="1" step="1" required>
                    <div class="invalid-feedback">Jumlah harus lebih dari nol.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="createKeterangan">Keterangan <span class="text-muted fw-normal">(opsional)</span></label>
                    <textarea class="form-control" id="createKeterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade keuangan-modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h2 class="modal-title" id="editModalLabel">Edit Transaksi Kas</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id">
                <div class="mb-3">
                    <label class="form-label" for="editUsaha">Usaha <span class="text-danger">*</span></label>
                    <select class="form-select" id="editUsaha" name="usaha_id" required>
                        <option value="">Pilih usaha...</option>
                        <?php foreach ($usaha as $row): ?>
                            <option value="<?= (int) $row->id; ?>"><?= html_escape($row->nama_usaha); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Usaha wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editTanggal">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    <div class="invalid-feedback">Tanggal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editJumlah">Jumlah (Rp) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="editJumlah" name="jumlah" min="1" step="1" required>
                    <div class="invalid-feedback">Jumlah harus lebih dari nol.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="editKeterangan">Keterangan <span class="text-muted fw-normal">(opsional)</span></label>
                    <textarea class="form-control" id="editKeterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const monthLabel = document.getElementById('currentMonth');
        const dateRange = document.getElementById('dateRange');
        const monthNavLabel = document.getElementById('monthNavLabel');
        const transactionBody = document.getElementById('keuanganBody');
        const searchInput = document.getElementById('searchTransaksi');
        const businessFilter = document.getElementById('filterUsaha');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const createModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal'));
        const editModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal'));
        const pageSize = 5;
        const chartContext = document.getElementById('financeChart').getContext('2d');
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth() + 1;
        let currentYear = currentDate.getFullYear();
        let currentType = 'pemasukan';
        let financeData = { pemasukan: [], pengeluaran: [], chart: {} };
        let financeChart = null;
        let currentPage = 1;
        let financeRequestId = 0;

        const formatCurrency = (amount) => 'Rp ' + new Intl.NumberFormat('id-ID', {
            maximumFractionDigits: 0
        }).format(Number(amount) || 0);

        const escapeHTML = (value) => String(value == null ? '' : value).replace(/[&<>"']/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[char]);

        const formatDate = (value) => {
            if (!value || value === '-') return '—';
            const date = new Date(String(value).slice(0, 10) + 'T00:00:00');
            if (Number.isNaN(date.getTime())) return '—';
            return new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            }).format(date);
        };

        const formatAxisValue = (value) => {
            const amount = Number(value) || 0;
            if (amount >= 1000000000) return 'Rp ' + (amount / 1000000000).toLocaleString('id-ID', { maximumFractionDigits: 1 }) + ' M';
            if (amount >= 1000000) return 'Rp ' + (amount / 1000000).toLocaleString('id-ID', { maximumFractionDigits: 1 }) + ' jt';
            if (amount >= 1000) return 'Rp ' + (amount / 1000).toLocaleString('id-ID', { maximumFractionDigits: 0 }) + ' rb';
            return 'Rp ' + amount.toLocaleString('id-ID');
        };

        function updateChart(inflow, outflow, totalDays) {
            const labels = Array.from({ length: totalDays }, (_, index) => index + 1);
            const incoming = Array.isArray(financeData.chart.pemasukan) ? financeData.chart.pemasukan : new Array(totalDays).fill(0);
            const outgoing = Array.isArray(financeData.chart.pengeluaran) ? financeData.chart.pengeluaran : new Array(totalDays).fill(0);
            const greenGradient = chartContext.createLinearGradient(0, 0, 0, 240);
            greenGradient.addColorStop(0, 'rgba(16, 130, 87, .22)');
            greenGradient.addColorStop(1, 'rgba(16, 130, 87, 0)');
            const redGradient = chartContext.createLinearGradient(0, 0, 0, 240);
            redGradient.addColorStop(0, 'rgba(213, 56, 56, .13)');
            redGradient.addColorStop(1, 'rgba(213, 56, 56, 0)');

            if (financeChart) {
                financeChart.data.labels = labels;
                financeChart.data.datasets[0].data = incoming;
                financeChart.data.datasets[0].backgroundColor = greenGradient;
                financeChart.data.datasets[1].data = outgoing;
                financeChart.data.datasets[1].backgroundColor = redGradient;
                financeChart.update();
                return;
            }

            financeChart = new Chart(chartContext, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pemasukan',
                        data: incoming,
                        borderColor: '#108257',
                        backgroundColor: greenGradient,
                        fill: true,
                        tension: .38,
                        borderWidth: 2,
                        pointRadius: 2,
                        pointHoverRadius: 5
                    }, {
                        label: 'Pengeluaran',
                        data: outgoing,
                        borderColor: '#d53838',
                        backgroundColor: redGradient,
                        fill: true,
                        tension: .38,
                        borderWidth: 2,
                        pointRadius: 2,
                        pointHoverRadius: 5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: { intersect: false, mode: 'index' },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#fff',
                            titleColor: '#25304a',
                            bodyColor: '#59647a',
                            borderColor: '#e9edf5',
                            borderWidth: 1,
                            padding: 10,
                            callbacks: {
                                label: (context) => ' ' + context.dataset.label + ': ' + formatCurrency(context.parsed.y)
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#818ba0',
                                font: { size: 9 },
                                maxTicksLimit: 16
                            },
                            border: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#edf0f6', borderDash: [3, 4] },
                            ticks: {
                                color: '#818ba0',
                                font: { size: 9 },
                                callback: formatAxisValue
                            },
                            border: { display: false }
                        }
                    }
                }
            });
        }

        function updateSummary(totalDays) {
            const income = financeData.pemasukan;
            const expenses = financeData.pengeluaran;
            const totalIncome = income.reduce((sum, item) => sum + (Number(item.jumlah) || 0), 0);
            const totalExpenses = expenses.reduce((sum, item) => sum + (Number(item.jumlah) || 0), 0);
            const net = totalIncome - totalExpenses;
            const periodText = monthNames[currentMonth - 1] + ' ' + currentYear;

            document.getElementById('totalPemasukan').textContent = formatCurrency(totalIncome);
            document.getElementById('totalPengeluaran').textContent = formatCurrency(totalExpenses);
            document.getElementById('countPemasukan').textContent = income.length + ' transaksi';
            document.getElementById('countPengeluaran').textContent = expenses.length + ' transaksi';
            document.getElementById('pemasukanNote').textContent = 'Akumulasi penerimaan kas pada ' + periodText;
            document.getElementById('pengeluaranNote').textContent = 'Akumulasi pembayaran kas pada ' + periodText;

            const now = new Date();
            const periodIndex = currentYear * 12 + currentMonth;
            const currentPeriodIndex = now.getFullYear() * 12 + now.getMonth() + 1;
            const periodStatus = periodIndex === currentPeriodIndex ? 'Periode berjalan' : (periodIndex > currentPeriodIndex ? 'Periode mendatang' : 'Periode historis');
            document.getElementById('periodStatus').textContent = periodStatus;
            monthLabel.textContent = periodText;
            monthNavLabel.textContent = monthNames[currentMonth - 1].slice(0, 3) + ' ' + currentYear;
            dateRange.textContent = '1 ' + monthNames[currentMonth - 1] + ' – ' + totalDays + ' ' + monthNames[currentMonth - 1] + ' ' + currentYear;

            const netLabel = net >= 0 ? 'Surplus kas' : 'Defisit kas';
            document.getElementById('transactionListDescription').textContent =
                (currentType === 'pemasukan' ? 'Catatan penerimaan kas' : 'Catatan pembayaran kas') + ' pada periode terpilih.';
            document.querySelector('.keuangan-summary-card:not(.is-out) .keuangan-summary-bottom').innerHTML =
                '<span>' + netLabel + '</span><strong>' + formatCurrency(Math.abs(net)) + '</strong>';
            document.querySelector('.keuangan-summary-card.is-out .keuangan-summary-bottom').innerHTML =
                '<span>Jumlah hari</span><strong>' + totalDays + ' hari</strong>';
        }

        function getFilteredTransactions() {
            const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const businessId = businessFilter.value;
            return (financeData[currentType] || []).filter((item) => {
                const searchable = [
                    item.id,
                    item.nama_usaha,
                    item.tanggal,
                    item.keterangan,
                    item.jumlah
                ].join(' ').toLocaleLowerCase('id-ID');
                return (!keyword || searchable.includes(keyword)) &&
                    (!businessId || String(item.usaha_id) === businessId);
            }).slice().sort((a, b) => String(b.tanggal || '').localeCompare(String(a.tanggal || '')));
        }

        function renderTable() {
            const rows = getFilteredTransactions();
            const pageCount = Math.max(1, Math.ceil(rows.length / pageSize));
            currentPage = Math.min(currentPage, pageCount);
            const startIndex = (currentPage - 1) * pageSize;
            const pageRows = rows.slice(startIndex, startIndex + pageSize);

            if (!pageRows.length) {
                const message = (financeData[currentType] || []).length ? 'Tidak ada transaksi yang sesuai dengan pencarian atau filter.' : 'Belum ada transaksi pada periode ini.';
                transactionBody.innerHTML = '<tr><td colspan="6" class="keuangan-empty">' + message + '</td></tr>';
            } else {
                const businessColors = ['is-blue', '', 'is-green', 'is-coral'];
                transactionBody.innerHTML = pageRows.map((item, index) => {
                    const businessName = escapeHTML(item.nama_usaha || 'Usaha tidak diketahui');
                    const description = escapeHTML(item.keterangan || '—');
                    const amount = formatCurrency(item.jumlah);
                    const id = Number(item.id) || 0;
                    const businessColor = businessColors[(startIndex + index) % businessColors.length];
                    return '<tr>' +
                        '<td class="keuangan-number">' + String(startIndex + index + 1).padStart(2, '0') + '</td>' +
                        '<td><span class="keuangan-business ' + businessColor + '"><i class="ti ti-building-store"></i>' + businessName + '</span></td>' +
                        '<td><span class="keuangan-date">' + escapeHTML(formatDate(item.tanggal)) + '</span></td>' +
                        '<td><span class="keuangan-description" title="' + description + '">' + description + '</span></td>' +
                        '<td class="keuangan-money ' + (currentType === 'pengeluaran' ? 'is-out' : '') + '">' + amount + '</td>' +
                        '<td><div class="keuangan-row-actions">' +
                            '<button type="button" class="keuangan-action-btn btn-edit-keuangan" data-id="' + id + '" title="Edit transaksi" aria-label="Edit transaksi"><i class="ti ti-edit"></i></button>' +
                            '<button type="button" class="keuangan-action-btn is-danger btn-delete-keuangan" data-id="' + id + '" title="Hapus transaksi" aria-label="Hapus transaksi"><i class="ti ti-trash"></i></button>' +
                        '</div></td>' +
                    '</tr>';
                }).join('');
            }

            document.getElementById('keuanganCount').textContent =
                'Menampilkan ' + (rows.length ? startIndex + 1 : 0) + '–' + Math.min(startIndex + pageSize, rows.length) + ' dari ' + rows.length + ' transaksi';
            document.getElementById('keuanganPageIndicator').textContent = currentPage + ' / ' + pageCount;
            document.getElementById('prevKeuanganPage').disabled = currentPage <= 1;
            document.getElementById('nextKeuanganPage').disabled = currentPage >= pageCount;
        }

        async function loadFinance(month, year) {
            const requestId = ++financeRequestId;
            currentMonth = month;
            currentYear = year;
            const totalDays = new Date(year, month, 0).getDate();
            financeData = { pemasukan: [], pengeluaran: [], chart: {} };
            currentPage = 1;
            updateSummary(totalDays);
            renderTable();
            updateChart(financeData.pemasukan, financeData.pengeluaran, totalDays);
            transactionBody.innerHTML = '<tr><td colspan="6" class="keuangan-empty">Memuat transaksi...</td></tr>';
            try {
                const response = await fetch('<?= base_url('keuangan/get_data'); ?>?month=' + month + '&year=' + year, {
                    headers: { 'Accept': 'application/json' }
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!result || !Array.isArray(result.pemasukan) || !Array.isArray(result.pengeluaran)) {
                    throw new Error('Format data keuangan tidak valid');
                }
                if (requestId !== financeRequestId) return;

                financeData = {
                    pemasukan: result.pemasukan,
                    pengeluaran: result.pengeluaran,
                    chart: result.chart || {}
                };
                updateSummary(totalDays);
                renderTable();
                updateChart(financeData.pemasukan, financeData.pengeluaran, totalDays);
            } catch (error) {
                if (requestId !== financeRequestId) return;
                console.error('Gagal memuat data keuangan:', error);
                transactionBody.innerHTML = '<tr><td colspan="6" class="keuangan-empty">Data keuangan gagal dimuat. Coba muat ulang periode ini.</td></tr>';
                document.getElementById('keuanganCount').textContent = 'Gagal memuat data';
                Swal.fire('Gagal memuat data', 'Terjadi kesalahan saat mengambil transaksi pada periode ini.', 'error');
            }
        }

        function openCreateModal() {
            createForm.reset();
            createForm.classList.remove('was-validated');
            document.getElementById('createJenis').value = currentType;
            createModal.show();
        }

        document.getElementById('btnTambahKeuangan').addEventListener('click', openCreateModal);
        document.getElementById('btnTambahBaris').addEventListener('click', openCreateModal);

        document.querySelectorAll('.keuangan-type-switch button').forEach((button) => {
            button.addEventListener('click', function() {
                currentType = this.dataset.type;
                currentPage = 1;
                document.querySelectorAll('.keuangan-type-switch button').forEach((tab) => tab.classList.toggle('is-active', tab === this));
                document.getElementById('transactionListTitle').textContent = currentType === 'pemasukan' ? 'Daftar Pemasukan' : 'Daftar Pengeluaran';
                document.getElementById('transactionListDescription').textContent = currentType === 'pemasukan' ? 'Catatan penerimaan kas pada periode terpilih.' : 'Catatan pembayaran kas pada periode terpilih.';
                renderTable();
            });
        });

        searchInput.addEventListener('input', function() {
            currentPage = 1;
            renderTable();
        });
        businessFilter.addEventListener('change', function() {
            currentPage = 1;
            renderTable();
        });
        document.getElementById('resetFilterKeuangan').addEventListener('click', function() {
            searchInput.value = '';
            businessFilter.value = '';
            currentPage = 1;
            renderTable();
        });
        document.getElementById('prevKeuanganPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        document.getElementById('nextKeuanganPage').addEventListener('click', function() {
            const pageCount = Math.max(1, Math.ceil(getFilteredTransactions().length / pageSize));
            if (currentPage < pageCount) {
                currentPage++;
                renderTable();
            }
        });

        document.getElementById('prevMonth').addEventListener('click', function() {
            currentMonth--;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            }
            loadFinance(currentMonth, currentYear);
        });
        document.getElementById('nextMonth').addEventListener('click', function() {
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            loadFinance(currentMonth, currentYear);
        });

        createForm.addEventListener('submit', async function(event) {
            event.preventDefault();
            if (!createForm.checkValidity()) {
                createForm.classList.add('was-validated');
                return;
            }

            const submitButton = createForm.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            try {
                const response = await fetch('<?= base_url('keuangan/store'); ?>', {
                    method: 'POST',
                    body: new FormData(createForm)
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Transaksi tidak dapat disimpan.', 'error');
                    return;
                }

                createModal.hide();
                createForm.reset();
                createForm.classList.remove('was-validated');
                await Swal.fire({ icon: 'success', title: 'Berhasil', text: 'Transaksi berhasil ditambahkan.', timer: 1400, showConfirmButton: false });
                await loadFinance(currentMonth, currentYear);
            } catch (error) {
                console.error('Gagal menambahkan transaksi:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat menyimpan transaksi.', 'error');
            } finally {
                submitButton.disabled = false;
            }
        });

        transactionBody.addEventListener('click', async function(event) {
            const button = event.target.closest('button[data-id]');
            if (!button) return;
            const item = (financeData[currentType] || []).find((row) => String(row.id) === String(button.dataset.id));
            if (!item) return;

            if (button.classList.contains('btn-edit-keuangan')) {
                document.getElementById('editId').value = item.id;
                document.getElementById('editUsaha').value = item.usaha_id;
                document.getElementById('editTanggal').value = String(item.tanggal || '').slice(0, 10);
                document.getElementById('editJumlah').value = item.jumlah;
                document.getElementById('editKeterangan').value = item.keterangan || '';
                editForm.classList.remove('was-validated');
                editModal.show();
                return;
            }

            if (button.classList.contains('btn-delete-keuangan')) {
                const confirmation = await Swal.fire({
                    title: 'Hapus transaksi?',
                    text: 'Transaksi tanggal ' + formatDate(item.tanggal) + ' akan dihapus.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#c14444',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                });
                if (!confirmation.isConfirmed) return;
                try {
                    const formData = new FormData();
                    formData.append('id', item.id);
                    const response = await fetch('<?= base_url('keuangan/delete'); ?>', {
                        method: 'POST',
                        body: formData
                    });
                    if (!response.ok) throw new Error('HTTP ' + response.status);
                    const result = await response.json();
                    if (!result.success) {
                        Swal.fire('Gagal', result.message || 'Transaksi tidak dapat dihapus.', 'error');
                        return;
                    }
                    await Swal.fire('Berhasil', 'Transaksi berhasil dihapus.', 'success');
                    await loadFinance(currentMonth, currentYear);
                } catch (error) {
                    console.error('Gagal menghapus transaksi:', error);
                    Swal.fire('Error', 'Gagal menghubungi server saat menghapus transaksi.', 'error');
                }
            }
        });

        editForm.addEventListener('submit', async function(event) {
            event.preventDefault();
            if (!editForm.checkValidity()) {
                editForm.classList.add('was-validated');
                return;
            }

            const submitButton = editForm.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            try {
                const response = await fetch('<?= base_url('keuangan/update'); ?>', {
                    method: 'POST',
                    body: new FormData(editForm)
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const result = await response.json();
                if (!result.success) {
                    Swal.fire('Gagal', result.message || 'Transaksi tidak dapat diperbarui.', 'error');
                    return;
                }

                editModal.hide();
                editForm.classList.remove('was-validated');
                await Swal.fire({ icon: 'success', title: 'Berhasil', text: 'Transaksi berhasil diperbarui.', timer: 1400, showConfirmButton: false });
                await loadFinance(currentMonth, currentYear);
            } catch (error) {
                console.error('Gagal memperbarui transaksi:', error);
                Swal.fire('Error', 'Gagal menghubungi server saat memperbarui transaksi.', 'error');
            } finally {
                submitButton.disabled = false;
            }
        });

        document.getElementById('btnExportKeuangan').addEventListener('click', function() {
            const rows = getFilteredTransactions();
            if (!rows.length) {
                Swal.fire('Tidak ada data', 'Tidak ada transaksi untuk diekspor pada filter ini.', 'info');
                return;
            }
            const quote = (value) => {
                let text = String(value == null ? '' : value);
                if (/^[\s]*[=+\-@]/.test(text)) text = "'" + text;
                return '"' + text.replace(/"/g, '""') + '"';
            };
            const csvRows = [
                ['Tanggal', 'Jenis', 'Usaha', 'Keterangan', 'Jumlah'],
                ...rows.map((item) => [item.tanggal, currentType, item.nama_usaha, item.keterangan, item.jumlah])
            ];
            const csv = csvRows.map((row) => row.map(quote).join(',')).join('\r\n');
            const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'transaksi-' + currentType + '-' + currentYear + '-' + String(currentMonth).padStart(2, '0') + '.csv';
            link.click();
            setTimeout(() => URL.revokeObjectURL(url), 0);
        });

        loadFinance(currentMonth, currentYear);
    });
</script>
