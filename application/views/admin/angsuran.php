<style>
    .installment-page {
        --installment-ink: #172b4d;
        --installment-muted: #78869a;
        --installment-line: #e8edf4;
        --installment-primary: #6258d9;
        color: var(--installment-ink);
    }

    .installment-page .page-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .installment-page .eyebrow {
        color: var(--installment-primary);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .installment-page .page-heading h2 {
        margin: 5px 0 6px;
        color: var(--installment-ink);
        font-size: 25px;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .installment-page .page-heading p {
        margin: 0;
        color: var(--installment-muted);
        font-size: 13px;
    }

    .installment-page .btn-primary {
        border: 0;
        border-radius: 11px;
        background: linear-gradient(135deg, #7168e8, #554bc8);
        box-shadow: 0 7px 16px rgba(98, 88, 217, .2);
        font-weight: 650;
    }

    .installment-page .btn-primary:hover {
        background: #5148c4;
    }

    .installment-page .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 15px;
        margin-bottom: 22px;
    }

    .installment-page .summary-card {
        position: relative;
        min-height: 132px;
        overflow: hidden;
        padding: 18px;
        border: 1px solid var(--installment-line);
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 5px 20px rgba(31, 45, 70, .035);
    }

    .installment-page .summary-card:after {
        position: absolute;
        right: -24px;
        bottom: -34px;
        width: 96px;
        height: 96px;
        border-radius: 50%;
        background: var(--card-tint, rgba(98, 88, 217, .08));
        content: "";
    }

    .installment-page .summary-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .installment-page .summary-label {
        color: var(--installment-muted);
        font-size: 12px;
        font-weight: 650;
    }

    .installment-page .summary-icon {
        display: grid;
        width: 36px;
        height: 36px;
        place-items: center;
        border-radius: 11px;
        background: var(--icon-bg, #f0efff);
        color: var(--icon-color, var(--installment-primary));
        font-size: 18px;
    }

    .installment-page .summary-value {
        margin-top: 13px;
        color: var(--installment-ink);
        font-size: 22px;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .installment-page .summary-note {
        position: relative;
        z-index: 1;
        margin-top: 2px;
        color: var(--installment-muted);
        font-size: 11px;
    }

    .installment-page .data-card {
        overflow: hidden;
        border: 1px solid var(--installment-line);
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 5px 20px rgba(31, 45, 70, .035);
    }

    .installment-page .data-card-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        padding: 19px 21px 14px;
    }

    .installment-page .data-card-heading h3 {
        margin: 0;
        color: var(--installment-ink);
        font-size: 16px;
        font-weight: 720;
    }

    .installment-page .data-card-heading p {
        margin: 4px 0 0;
        color: var(--installment-muted);
        font-size: 12px;
    }

    .installment-page .table-tools {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        padding: 0 21px 15px;
    }

    .installment-page .search-box {
        position: relative;
        flex: 1 1 250px;
    }

    .installment-page .search-box i {
        position: absolute;
        top: 50%;
        left: 12px;
        color: #97a2b3;
        transform: translateY(-50%);
    }

    .installment-page .search-box input {
        padding-left: 35px;
    }

    .installment-page .form-select,
    .installment-page .form-control {
        min-height: 39px;
        border-color: #e3e8f0;
        border-radius: 9px;
        color: #34445d;
        font-size: 12px;
        box-shadow: none;
    }

    .installment-page .form-select:focus,
    .installment-page .form-control:focus {
        border-color: #a9a4f0;
        box-shadow: 0 0 0 3px rgba(98, 88, 217, .1);
    }

    .installment-page .filter-select {
        flex: 0 0 160px;
    }

    .installment-page .btn-tool {
        min-height: 39px;
        border: 1px solid #e3e8f0;
        border-radius: 9px;
        background: #fff;
        color: #53627a;
        font-size: 12px;
        font-weight: 650;
    }

    .installment-page .btn-tool:hover {
        border-color: #cbc8f7;
        color: var(--installment-primary);
    }

    .installment-page .table-responsive {
        border-top: 1px solid var(--installment-line);
    }

    .installment-page table {
        min-width: 930px;
        margin: 0;
    }

    .installment-page thead th {
        padding: 12px 14px;
        border-bottom: 1px solid var(--installment-line);
        background: #f8f9fc;
        color: #8290a4;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: .06em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .installment-page tbody td {
        padding: 14px;
        border-bottom: 1px solid #f0f2f6;
        color: #526179;
        font-size: 12px;
        vertical-align: middle;
    }

    .installment-page tbody tr:last-child td {
        border-bottom: 0;
    }

    .installment-page .debtor-name {
        color: #263752;
        font-size: 12px;
        font-weight: 700;
    }

    .installment-page .cell-sub {
        display: block;
        margin-top: 4px;
        color: #929daf;
        font-size: 10px;
    }

    .installment-page .money {
        color: #253650;
        font-weight: 700;
        white-space: nowrap;
    }

    .installment-page .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .installment-page .status-pill:before {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        content: "";
    }

    .installment-page .status-active {
        background: #fff5e7;
        color: #bd7812;
    }

    .installment-page .status-paid {
        background: #eaf8f1;
        color: #219268;
    }

    .installment-page .row-actions {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .installment-page .btn-icon {
        display: inline-grid;
        width: 30px;
        height: 30px;
        place-items: center;
        border: 1px solid #e7eaf1;
        border-radius: 8px;
        background: #fff;
        color: #687890;
    }

    .installment-page .btn-icon:hover {
        border-color: #cbc8f7;
        color: var(--installment-primary);
    }

    .installment-page .btn-icon.pay {
        border-color: #e0defb;
        background: #f4f3ff;
        color: var(--installment-primary);
    }

    .installment-page .empty-state {
        padding: 38px 15px !important;
        color: #8a96a8 !important;
        text-align: center;
    }

    .installment-page .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 13px 20px;
        border-top: 1px solid var(--installment-line);
        color: var(--installment-muted);
        font-size: 11px;
    }

    .installment-page .pagination {
        gap: 4px;
        margin: 0;
    }

    .installment-page .pagination button {
        min-width: 29px;
        height: 29px;
        border: 0;
        border-radius: 7px;
        background: transparent;
        color: #65748b;
        font-size: 11px;
    }

    .installment-page .pagination button.active {
        background: #eeedff;
        color: var(--installment-primary);
        font-weight: 750;
    }

    .installment-page .pagination button:disabled {
        cursor: default;
        opacity: .42;
    }

    .installment-page .info-grid {
        display: grid;
        grid-template-columns: 1.15fr .85fr;
        gap: 15px;
        margin-top: 18px;
    }

    .installment-page .info-panel {
        display: flex;
        gap: 13px;
        padding: 16px 18px;
        border: 1px solid var(--installment-line);
        border-radius: 14px;
        background: #fff;
    }

    .installment-page .info-icon {
        display: grid;
        flex: 0 0 34px;
        width: 34px;
        height: 34px;
        place-items: center;
        border-radius: 10px;
        background: #f1f0ff;
        color: var(--installment-primary);
    }

    .installment-page .info-panel h4 {
        margin: 1px 0 5px;
        color: #34445d;
        font-size: 12px;
        font-weight: 750;
    }

    .installment-page .info-panel p {
        margin: 0;
        color: var(--installment-muted);
        font-size: 11px;
        line-height: 1.55;
    }

    .installment-page .modal-content {
        border: 0;
        border-radius: 16px;
        box-shadow: 0 18px 55px rgba(22, 35, 57, .2);
    }

    .installment-page .modal-header {
        padding: 19px 22px;
        border-bottom-color: var(--installment-line);
    }

    .installment-page .modal-title {
        color: var(--installment-ink);
        font-size: 16px;
        font-weight: 750;
    }

    .installment-page .modal-body {
        padding: 20px 22px;
    }

    .installment-page .form-label {
        margin-bottom: 6px;
        color: #45546c;
        font-size: 11px;
        font-weight: 700;
    }

    .installment-page .form-hint {
        margin-top: 5px;
        color: var(--installment-muted);
        font-size: 10px;
    }

    @media (max-width: 991px) {
        .installment-page .summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767px) {
        .installment-page .page-heading,
        .installment-page .data-card-heading {
            flex-direction: column;
        }

        .installment-page .page-heading .btn {
            width: 100%;
        }

        .installment-page .summary-grid {
            gap: 10px;
        }

        .installment-page .summary-card {
            min-height: 120px;
            padding: 14px;
        }

        .installment-page .summary-value {
            font-size: 18px;
        }

        .installment-page .table-tools {
            padding-right: 14px;
            padding-left: 14px;
        }

        .installment-page .filter-select {
            flex: 1 1 130px;
        }

        .installment-page .info-grid {
            grid-template-columns: 1fr;
        }

        .installment-page .table-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="container-fluid installment-page">
    <div class="page-heading">
        <div>
            <div class="eyebrow">Keuangan / Angsuran</div>
            <h2>Data Angsuran &amp; Pelunasan</h2>
            <p>Pantau pembayaran terbaru dan sisa tagihan setiap pinjaman.</p>
        </div>
        <button type="button" class="btn btn-primary px-3 py-2" data-bs-toggle="modal" data-bs-target="#modalCatatAngsuran" <?= empty($pinjaman) ? 'disabled' : '' ?>>
            <i class="ti ti-plus me-1"></i> Catat Angsuran
        </button>
    </div>

    <div class="alert alert-success d-none" id="paymentSuccess" role="status"></div>

    <div class="summary-grid">
        <div class="summary-card" style="--icon-bg:#f0efff;--icon-color:#6258d9;--card-tint:rgba(98,88,217,.08)">
            <div class="summary-top">
                <span class="summary-label">Total Angsuran Diterima</span>
                <span class="summary-icon"><i class="ti ti-wallet"></i></span>
            </div>
            <div class="summary-value" id="summaryTotalDibayar">—</div>
            <div class="summary-note">Akumulasi dari seluruh pembayaran tercatat</div>
        </div>
        <div class="summary-card" style="--icon-bg:#eaf8f1;--icon-color:#22966a;--card-tint:rgba(34,150,106,.08)">
            <div class="summary-top">
                <span class="summary-label">Pinjaman Lunas</span>
                <span class="summary-icon"><i class="ti ti-circle-check"></i></span>
            </div>
            <div class="summary-value" id="summaryLunas">—</div>
            <div class="summary-note">Status berdasarkan total tagihan dan pembayaran</div>
        </div>
        <div class="summary-card" style="--icon-bg:#fff5e7;--icon-color:#c1801d;--card-tint:rgba(193,128,29,.08)">
            <div class="summary-top">
                <span class="summary-label">Pinjaman Aktif</span>
                <span class="summary-icon"><i class="ti ti-clock"></i></span>
            </div>
            <div class="summary-value" id="summaryAktif">—</div>
            <div class="summary-note">Masih memiliki sisa tagihan</div>
        </div>
        <div class="summary-card" style="--icon-bg:#eaf4ff;--icon-color:#3981cb;--card-tint:rgba(57,129,203,.08)">
            <div class="summary-top">
                <span class="summary-label">Sisa Tagihan</span>
                <span class="summary-icon"><i class="ti ti-file-invoice"></i></span>
            </div>
            <div class="summary-value" id="summarySisa">—</div>
            <div class="summary-note">Total sisa tagihan seluruh pinjaman aktif</div>
        </div>
    </div>

    <div class="data-card">
        <div class="data-card-heading">
            <div>
                <h3>Angsuran Terakhir per Pinjaman</h3>
                <p>Setiap pinjaman ditampilkan satu kali dengan pembayaran terakhirnya.</p>
            </div>
            <button type="button" class="btn btn-tool px-3" id="exportAngsuran">
                <i class="ti ti-download me-1"></i> Ekspor CSV
            </button>
        </div>
        <div class="table-tools">
            <div class="search-box">
                <i class="ti ti-search"></i>
                <input type="search" class="form-control" id="filterSearch" placeholder="Cari nama atau ID pinjaman...">
            </div>
            <select class="form-select filter-select" id="filterStatus" aria-label="Filter status">
                <option value="">Semua status</option>
                <option value="Aktif">Aktif</option>
                <option value="Lunas">Lunas</option>
            </select>
            <select class="form-select filter-select" id="filterSort" aria-label="Urutkan data">
                <option value="newest">Pembayaran terbaru</option>
                <option value="amount">Jumlah pembayaran</option>
                <option value="remaining">Sisa tagihan</option>
                <option value="name">Nama debitur</option>
            </select>
            <button type="button" class="btn btn-tool px-3" id="resetFilter">
                <i class="ti ti-refresh me-1"></i> Reset
            </button>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Debitur &amp; ID Pinjaman</th>
                        <th>Angsuran Terakhir</th>
                        <th>Jumlah Dibayar</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Sisa Tagihan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="angsuranTableBody">
                    <tr><td colspan="7" class="empty-state">Memuat data angsuran...</td></tr>
                </tbody>
            </table>
        </div>
        <div class="table-footer">
            <span id="tableCount">Memuat data...</span>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>

    <div class="info-grid">
        <div class="info-panel">
            <span class="info-icon"><i class="ti ti-calculator"></i></span>
            <div>
                <h4>Perhitungan Sisa Tagihan</h4>
                <p>Sisa tagihan dihitung dari pokok pinjaman ditambah bunga flat per bulan sesuai tenor, dikurangi seluruh pembayaran yang tercatat.</p>
            </div>
        </div>
        <div class="info-panel">
            <span class="info-icon"><i class="ti ti-info-circle"></i></span>
            <div>
                <h4>Status Pembayaran</h4>
                <p>Data saat ini tidak menyimpan jadwal jatuh tempo. Karena itu, status terlambat maupun tanggal jatuh tempo tidak ditampilkan atau diperkirakan.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade installment-page" id="modalCatatAngsuran" tabindex="-1" aria-labelledby="modalCatatAngsuranLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <div class="eyebrow">Pembayaran Pinjaman</div>
                    <h5 class="modal-title mt-1" id="modalCatatAngsuranLabel">Catat Angsuran</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <form id="formCatatAngsuran" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pinjaman_id" class="form-label">Pilih pinjaman</label>
                        <select name="pinjaman_id" id="pinjaman_id" class="form-select" required>
                            <option value="">Pilih debitur</option>
                            <?php foreach ($pinjaman as $item): ?>
                                <option value="<?= (int) $item->id ?>"><?= html_escape($item->nama_anggota ?? 'Anggota') ?> — #<?= (int) $item->id ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="angsuranKe" class="form-label">Angsuran ke</label>
                            <input type="text" id="angsuranKe" class="form-control" placeholder="Pilih pinjaman" readonly>
                        </div>
                        <div class="col-6">
                            <label for="jumlahBayar" class="form-label">Jumlah pembayaran</label>
                            <input type="text" id="jumlahBayar" class="form-control" placeholder="Pilih pinjaman" readonly>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="tanggal_bayar" class="form-label">Tanggal pembayaran</label>
                        <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti pembayaran <span class="fw-normal text-muted">(opsional)</span></label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                        <div class="form-hint">Unggah foto atau PDF jika tersedia.</div>
                    </div>
                    <div class="alert alert-danger py-2 mt-3 d-none" id="paymentError" role="alert"></div>
                </div>
                <div class="modal-footer border-top-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submitPayment" disabled>
                        <i class="ti ti-check me-1"></i> Simpan Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('angsuranTableBody');
    const searchInput = document.getElementById('filterSearch');
    const statusSelect = document.getElementById('filterStatus');
    const sortSelect = document.getElementById('filterSort');
    const countLabel = document.getElementById('tableCount');
    const pagination = document.getElementById('pagination');
    const paymentSuccess = document.getElementById('paymentSuccess');
    const perPage = 7;
    let rows = [];
    let currentPage = 1;

    function escapeHtml(value) {
        return String(value == null ? '' : value).replace(/[&<>"']/g, function (char) {
            return {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'}[char];
        });
    }

    function money(value) {
        return 'Rp ' + Number(value || 0).toLocaleString('id-ID', {maximumFractionDigits: 0});
    }

    function filteredRows() {
        const search = searchInput.value.trim().toLocaleLowerCase('id-ID');
        const status = statusSelect.value;
        const result = rows.filter(function (row) {
            const name = String(row.nama_anggota || '').toLocaleLowerCase('id-ID');
            const id = String(row.pinjaman_id || row.id || '');
            const matchesSearch = !search || name.includes(search) || id.includes(search);
            const matchesStatus = !status || row.status_label === status;
            return matchesSearch && matchesStatus;
        });

        result.sort(function (a, b) {
            if (sortSelect.value === 'amount') {
                return Number(b.jumlah_bayar || 0) - Number(a.jumlah_bayar || 0);
            }
            if (sortSelect.value === 'remaining') {
                return Number(b.sisa_pinjaman_raw || 0) - Number(a.sisa_pinjaman_raw || 0);
            }
            if (sortSelect.value === 'name') {
                return String(a.nama_anggota || '').localeCompare(String(b.nama_anggota || ''), 'id');
            }
            return String(b.tanggal_bayar || '').localeCompare(String(a.tanggal_bayar || ''));
        });
        return result;
    }

    function renderPagination(pageCount) {
        pagination.innerHTML = '';
        if (pageCount <= 1) return;

        const previous = document.createElement('button');
        previous.type = 'button';
        previous.innerHTML = '<i class="ti ti-chevron-left"></i>';
        previous.disabled = currentPage === 1;
        previous.setAttribute('aria-label', 'Halaman sebelumnya');
        previous.addEventListener('click', function () {
            currentPage--;
            render();
        });
        pagination.appendChild(previous);

        for (let page = 1; page <= pageCount; page++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = page;
            button.className = page === currentPage ? 'active' : '';
            button.setAttribute('aria-label', 'Halaman ' + page);
            button.addEventListener('click', function () {
                currentPage = page;
                render();
            });
            pagination.appendChild(button);
        }

        const next = document.createElement('button');
        next.type = 'button';
        next.innerHTML = '<i class="ti ti-chevron-right"></i>';
        next.disabled = currentPage === pageCount;
        next.setAttribute('aria-label', 'Halaman berikutnya');
        next.addEventListener('click', function () {
            currentPage++;
            render();
        });
        pagination.appendChild(next);
    }

    function render() {
        const filtered = filteredRows();
        const pageCount = Math.max(1, Math.ceil(filtered.length / perPage));
        currentPage = Math.min(currentPage, pageCount);
        const start = (currentPage - 1) * perPage;
        const pageRows = filtered.slice(start, start + perPage);

        if (!pageRows.length) {
            tableBody.innerHTML = '<tr><td colspan="7" class="empty-state">Tidak ada data yang sesuai dengan pencarian.</td></tr>';
        } else {
            tableBody.innerHTML = pageRows.map(function (row) {
                const isPaid = row.status_label === 'Lunas';
                const hasPayment = Number(row.jumlah_transaksi || 0) > 0;
                const loanId = Number(row.pinjaman_id || row.id || 0);
                const latestInstallment = hasPayment
                    ? 'Angsuran ke-' + escapeHtml(row.angsuran_ke) + ' dari ' + escapeHtml(row.tenor)
                    : 'Belum ada pembayaran';
                const paymentAmount = hasPayment ? money(row.jumlah_bayar) : '—';
                const paymentDate = hasPayment ? escapeHtml(row.tanggal_bayar) : '—';
                const status = isPaid
                    ? '<span class="status-pill status-paid">Lunas</span>'
                    : '<span class="status-pill status-active">Aktif</span>';
                const payAction = isPaid ? '' :
                    '<button type="button" class="btn-icon pay js-pay-loan" data-id="' + loanId + '" title="Catat angsuran" aria-label="Catat angsuran"><i class="ti ti-plus"></i></button>';
                const proofAction = row.bukti_pembayaran
                    ? '<a class="btn-icon" href="' + escapeHtml(row.bukti_pembayaran) + '" target="_blank" rel="noopener noreferrer" title="Lihat bukti pembayaran" aria-label="Lihat bukti pembayaran"><i class="ti ti-paperclip"></i></a>'
                    : '';

                return '<tr>' +
                    '<td><span class="debtor-name">' + escapeHtml(row.nama_anggota || 'Anggota') + '</span><span class="cell-sub">ID pinjaman #' + loanId + '</span></td>' +
                    '<td>' + latestInstallment + (hasPayment ? '<span class="cell-sub">' + Number(row.jumlah_transaksi || 0) + ' pembayaran tercatat</span>' : '') + '</td>' +
                    '<td><span class="money">' + paymentAmount + '</span>' + (hasPayment ? '<span class="cell-sub">pembayaran terakhir</span>' : '') + '</td>' +
                    '<td>' + paymentDate + '</td>' +
                    '<td><span class="money">' + money(row.sisa_pinjaman_raw) + '</span></td>' +
                    '<td>' + status + '</td>' +
                    '<td><div class="row-actions">' + payAction + proofAction +
                    '<a class="btn-icon" href="<?= base_url('angsuran/riwayat/') ?>' + encodeURIComponent(row.anggota_id) + '" title="Riwayat anggota" aria-label="Riwayat anggota"><i class="ti ti-history"></i></a>' +
                    '</div></td>' +
                    '</tr>';
            }).join('');
        }

        countLabel.textContent = filtered.length
            ? 'Menampilkan ' + (start + 1) + '–' + Math.min(start + perPage, filtered.length) + ' dari ' + filtered.length + ' pinjaman'
            : 'Tidak ada pinjaman yang ditampilkan';
        renderPagination(pageCount);
    }

    function updateSummary() {
        const totalDibayar = rows.reduce(function (sum, row) {
            return sum + Number(row.total_dibayar || 0);
        }, 0);
        const totalSisa = rows.reduce(function (sum, row) {
            return sum + Number(row.sisa_pinjaman_raw || 0);
        }, 0);
        const lunas = rows.filter(function (row) {
            return row.status_label === 'Lunas';
        }).length;
        document.getElementById('summaryTotalDibayar').textContent = money(totalDibayar);
        document.getElementById('summaryLunas').textContent = lunas.toLocaleString('id-ID');
        document.getElementById('summaryAktif').textContent = (rows.length - lunas).toLocaleString('id-ID');
        document.getElementById('summarySisa').textContent = money(totalSisa);
    }

    async function loadRows() {
        tableBody.innerHTML = '<tr><td colspan="7" class="empty-state">Memuat data angsuran...</td></tr>';
        try {
            const response = await fetch('<?= base_url('angsuran/get_all') ?>', {
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            });
            if (!response.ok) throw new Error('Gagal memuat data angsuran.');
            const result = await response.json();
            if (!result.success || !Array.isArray(result.data)) {
                throw new Error(result.message || 'Format data angsuran tidak valid.');
            }
            rows = result.data;
            updateSummary();
            currentPage = 1;
            render();
        } catch (error) {
            tableBody.innerHTML = '<tr><td colspan="7" class="empty-state text-danger">' + escapeHtml(error.message) + '</td></tr>';
            countLabel.textContent = 'Data gagal dimuat';
            document.getElementById('summaryTotalDibayar').textContent = '—';
            document.getElementById('summaryLunas').textContent = '—';
            document.getElementById('summaryAktif').textContent = '—';
            document.getElementById('summarySisa').textContent = '—';
        }
    }

    searchInput.addEventListener('input', function () {
        currentPage = 1;
        render();
    });
    statusSelect.addEventListener('change', function () {
        currentPage = 1;
        render();
    });
    sortSelect.addEventListener('change', function () {
        currentPage = 1;
        render();
    });
    document.getElementById('resetFilter').addEventListener('click', function () {
        searchInput.value = '';
        statusSelect.value = '';
        sortSelect.value = 'newest';
        currentPage = 1;
        render();
    });
    document.getElementById('exportAngsuran').addEventListener('click', function () {
        const data = filteredRows();
        if (!data.length) return;
        const csvEscape = function (value) {
            return '"' + String(value == null ? '' : value).replace(/"/g, '""') + '"';
        };
        const content = [
            ['ID Pinjaman', 'Nama Anggota', 'Angsuran Ke', 'Jumlah Pembayaran Terakhir', 'Tanggal Pembayaran Terakhir', 'Total Dibayar', 'Sisa Tagihan', 'Status'].map(csvEscape).join(','),
            ...data.map(function (row) {
                return [
                    row.pinjaman_id || row.id,
                    row.nama_anggota,
                    row.angsuran_ke,
                    row.jumlah_bayar,
                    row.tanggal_bayar,
                    row.total_dibayar,
                    row.sisa_pinjaman_raw,
                    row.status_label
                ].map(csvEscape).join(',');
            })
        ].join('\r\n');
        const blob = new Blob(['\ufeff' + content], {type: 'text/csv;charset=utf-8;'});
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'rekap-angsuran.csv';
        link.click();
        URL.revokeObjectURL(link.href);
    });

    const loanSelect = document.getElementById('pinjaman_id');
    const installmentNumber = document.getElementById('angsuranKe');
    const paymentAmount = document.getElementById('jumlahBayar');
    const submitPayment = document.getElementById('submitPayment');
    const paymentError = document.getElementById('paymentError');
    const paymentForm = document.getElementById('formCatatAngsuran');
    const paymentModal = document.getElementById('modalCatatAngsuran');

    async function loadLoanDetail(loanId) {
        installmentNumber.value = '';
        paymentAmount.value = '';
        submitPayment.disabled = true;
        paymentError.classList.add('d-none');
        paymentError.textContent = '';
        if (!loanId) return;

        try {
            const response = await fetch('<?= base_url('pinjaman/get_detail/') ?>' + encodeURIComponent(loanId), {
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            });
            if (!response.ok) throw new Error('Detail pinjaman gagal dimuat.');
            const result = await response.json();
            if (!result.success || !result.data) {
                throw new Error(result.message || 'Detail pinjaman tidak tersedia.');
            }
            installmentNumber.value = result.angsuran_ke_berikutnya;
            paymentAmount.value = money(result.jumlah_per_angsuran);
            submitPayment.disabled = false;
        } catch (error) {
            paymentError.textContent = error.message;
            paymentError.classList.remove('d-none');
        }
    }

    loanSelect.addEventListener('change', function () {
        loadLoanDetail(this.value);
    });

    tableBody.addEventListener('click', function (event) {
        const button = event.target.closest('.js-pay-loan');
        if (button) {
            loanSelect.value = button.dataset.id;
            loadLoanDetail(button.dataset.id);
            bootstrap.Modal.getOrCreateInstance(paymentModal).show();
        }
    });

    paymentForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        submitPayment.disabled = true;
        paymentError.classList.add('d-none');
        paymentError.textContent = '';
        try {
            const response = await fetch('<?= base_url('angsuran/store') ?>', {
                method: 'POST',
                body: new FormData(paymentForm),
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            });
            const result = await response.json();
            if (!response.ok || !result.success) {
                throw new Error(result.message || 'Pembayaran tidak dapat disimpan.');
            }
            paymentSuccess.textContent = result.message || 'Angsuran berhasil disimpan.';
            paymentSuccess.classList.remove('d-none');
            bootstrap.Modal.getOrCreateInstance(paymentModal).hide();
            paymentForm.reset();
            installmentNumber.value = '';
            paymentAmount.value = '';
            document.getElementById('tanggal_bayar').value = '<?= date('Y-m-d') ?>';
            await loadRows();
        } catch (error) {
            paymentError.textContent = error.message;
            paymentError.classList.remove('d-none');
            submitPayment.disabled = false;
        }
    });

    paymentModal.addEventListener('hidden.bs.modal', function () {
        paymentForm.reset();
        installmentNumber.value = '';
        paymentAmount.value = '';
        submitPayment.disabled = true;
        paymentError.classList.add('d-none');
        paymentError.textContent = '';
        document.getElementById('tanggal_bayar').value = '<?= date('Y-m-d') ?>';
    });

    loadRows();
});
</script>
