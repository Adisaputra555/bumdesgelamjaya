<div class="pc-container">
    <div class="pc-content">

        <!-- ================= Header ================= -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 fw-bold">Data Keuangan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Keuangan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= Grafik ================= -->
        <div class="card shadow-lg rounded-3 mb-3 border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 id="currentMonth" class="fw-bold text-primary mb-1"></h6>
                        <small id="dateRange" class="text-muted"></small>
                    </div>
                    <div class="d-flex gap-2">
                        <!-- Tombol Bulan Sebelumnya -->
                        <button class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" id="prevMonth" style="width:36px; height:36px;">
                            &lt;
                        </button>
                        <!-- Tombol Bulan Berikutnya -->
                        <button class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" id="nextMonth" style="width:36px; height:36px;">
                            &gt;
                        </button>
                    </div>
                </div>
                <canvas id="financeChart" style="max-height:400px;"></canvas>
            </div>
        </div>

        <!-- ================= Tab Navigasi ================= -->
        <ul class="nav nav-pills mb-3 justify-content-center" id="financeTab" role="tablist">
            <!-- Pemasukan -->
            <li class="nav-item me-3" role="presentation">
                <button class="nav-link tab-smooth d-flex align-items-center p-3 active" id="pemasukan-tab" data-bs-toggle="pill" data-bs-target="#pemasukan" type="button" role="tab" style="min-width:200px;">
                    <div class="rounded-circle icon-pemasukan d-flex align-items-center justify-content-center me-2" style="width:40px; height:40px; font-size:18px;">
                        &#8595;
                    </div>
                    <div class="d-flex flex-column align-items-start">
                        <small class="tab-text">Pemasukan</small>
                        <span id="totalPemasukan" class="tab-nominal">Rp 0</span>
                    </div>
                </button>
            </li>
            <!-- Pengeluaran -->
            <li class="nav-item" role="presentation">
                <button class="nav-link tab-smooth d-flex align-items-center p-3" id="pengeluaran-tab" data-bs-toggle="pill" data-bs-target="#pengeluaran" type="button" role="tab" style="min-width:200px;">
                    <div class="rounded-circle icon-pengeluaran d-flex align-items-center justify-content-center me-2" style="width:40px; height:40px; font-size:18px;">
                        &#8593;
                    </div>
                    <div class="d-flex flex-column align-items-start">
                        <small class="tab-text">Pengeluaran</small>
                        <span id="totalPengeluaran" class="tab-nominal">Rp 0</span>
                    </div>
                </button>
            </li>
        </ul>

        <!-- ================= CSS Tab ================= -->
        <style>
            .tab-smooth {
                transition: all 0.3s ease;
                border: none;
                border-radius: 12px;
                background-color: #ffffff;
            }

            .tab-smooth .icon-pemasukan {
                background-color: #28a745;
                color: white;
                transition: all 0.3s ease;
            }

            .tab-smooth .icon-pengeluaran {
                background-color: #dc3545;
                color: white;
                transition: all 0.3s ease;
            }

            .tab-smooth .tab-text {
                color: #6c757d;
                transition: color 0.3s ease;
            }

            .tab-smooth .tab-nominal {
                color: #000;
                transition: color 0.3s ease;
            }

            .tab-smooth:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .nav-pills .nav-link.active.tab-smooth {
                background-color: #0d6efd;
            }

            .nav-pills .nav-link.active.tab-smooth .tab-text,
            .nav-pills .nav-link.active.tab-smooth .tab-nominal {
                color: white;
            }
        </style>

        <div class="tab-content" id="financeTabContent">
            <!-- ================= Tabel Pemasukan ================= -->
            <div class="tab-pane fade show active" id="pemasukan" role="tabpanel">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h6 class="mb-0 fw-bold">Daftar Pemasukan</h6>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" data-jenis="pemasukan">+ Tambah</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover align-middle" id="tablePemasukan">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Usaha</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th class="text-end">Jumlah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ================= Tabel Pengeluaran ================= -->
            <div class="tab-pane fade" id="pengeluaran" role="tabpanel">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h6 class="mb-0 fw-bold">Daftar Pengeluaran</h6>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#createModal" data-jenis="pengeluaran">+ Tambah</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover align-middle" id="tablePengeluaran">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Usaha</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th class="text-end">Jumlah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ================= Modal Tambah ================= -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title">Tambah Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="createJenisHidden" name="jenis">
                <div class="mb-3">
                    <label class="form-label">Usaha *</label>
                    <select class="form-select" id="createUsaha" name="usaha_id" required>
                        <option value="">Pilih usaha...</option>
                        <?php foreach ($usaha as $row): ?>
                            <option value="<?= $row->id; ?>"><?= $row->nama_usaha; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Usaha wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal *</label>
                    <input type="date" class="form-control" id="createTanggal" name="tanggal" value="<?= date('Y-m-d'); ?>" required>
                    <div class="invalid-feedback">Tanggal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah *</label>
                    <input type="number" class="form-control" id="createJumlah" name="jumlah" min="1" required>
                    <div class="invalid-feedback">Jumlah wajib diisi dan > 0.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" id="createKeterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= Modal Edit ================= -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title">Edit Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id">
                <div class="mb-3">
                    <label class="form-label">Usaha *</label>
                    <select class="form-select" id="editUsaha" name="usaha_id" required>
                        <option value="">Pilih usaha...</option>
                        <?php foreach ($usaha as $row): ?>
                            <option value="<?= $row->id; ?>"><?= $row->nama_usaha; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Usaha wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal *</label>
                    <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    <div class="invalid-feedback">Tanggal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah *</label>
                    <input type="number" class="form-control" id="editJumlah" name="jumlah" min="1" required>
                    <div class="invalid-feedback">Jumlah wajib diisi dan > 0.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" id="editKeterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= Script Chart & AJAX ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const monthLabel = document.getElementById("currentMonth");
        const dateRange = document.getElementById("dateRange");
        const totalPemasukanLabel = document.getElementById("totalPemasukan");
        const totalPengeluaranLabel = document.getElementById("totalPengeluaran");
        const ctx = document.getElementById('financeChart').getContext('2d');

        let currentDate = new Date();
        let currentMonth = currentDate.getMonth() + 1;
        let currentYear = currentDate.getFullYear();
        let financeChart = null;

        function daysInMonth(month, year) {
            return new Date(year, month, 0).getDate();
        }

        function gradient(color) {
            const grad = ctx.createLinearGradient(0, 0, 0, 300);
            let c = color === 'green' ? '0,128,0' : '255,0,0';
            grad.addColorStop(0, `rgba(${c},0.5)`);
            grad.addColorStop(1, `rgba(${c},0.1)`);
            return grad;
        }

        function renderTable(selector, items) {
            let rows = "";
            if (items.length > 0) {
                items.forEach((item, i) => {
                    rows += `<tr>
                <td>${i+1}</td>
                <td>${item.nama_usaha||'-'}</td>
                <td>${item.tanggal}</td>
                <td>${item.keterangan||'-'}</td>
                <td class="text-end">Rp ${Number(item.jumlah).toLocaleString()}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-warning btn-edit" data-item='${JSON.stringify(item)}'>Edit</button>
                    <button class="btn btn-sm btn-danger btn-delete" data-item='${JSON.stringify(item)}'>Hapus</button>
                </td>
            </tr>`;
                });
            } else rows = `<tr><td colspan="6" class="text-center text-muted">Tidak ada data</td></tr>`;
            document.querySelector(selector).innerHTML = rows;
        }

        function loadFinance(month, year) {
            const totalDays = daysInMonth(month, year);
            monthLabel.textContent = `${monthNames[month-1]} ${year}`;
            dateRange.textContent = `1 ${monthNames[month-1]} ${year} - ${totalDays} ${monthNames[month-1]} ${year}`;

            fetch(`<?= base_url('keuangan/get_data'); ?>?month=${month}&year=${year}`)
                .then(res => res.json())
                .then(data => {
                    const pemasukanArr = new Array(totalDays).fill(0);
                    const pengeluaranArr = new Array(totalDays).fill(0);
                    let totalPemasukan = 0,
                        totalPengeluaran = 0;

                    data.pemasukan.forEach(d => {
                        const day = new Date(d.tanggal).getDate();
                        pemasukanArr[day - 1] += Number(d.jumlah);
                        totalPemasukan += Number(d.jumlah);
                    });

                    data.pengeluaran.forEach(d => {
                        const day = new Date(d.tanggal).getDate();
                        pengeluaranArr[day - 1] += Number(d.jumlah);
                        totalPengeluaran += Number(d.jumlah);
                    });

                    totalPemasukanLabel.textContent = `Rp ${totalPemasukan.toLocaleString()}`;
                    totalPengeluaranLabel.textContent = `Rp ${totalPengeluaran.toLocaleString()}`;

                    renderTable("#tablePemasukan tbody", data.pemasukan);
                    renderTable("#tablePengeluaran tbody", data.pengeluaran);

                    const labels = Array.from({
                        length: totalDays
                    }, (_, i) => i + 1);

                    if (financeChart) {
                        financeChart.data.labels = labels;
                        financeChart.data.datasets[0].data = pemasukanArr;
                        financeChart.data.datasets[1].data = pengeluaranArr;
                        financeChart.update();
                        return;
                    }

                    financeChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Pemasukan',
                                    data: pemasukanArr,
                                    borderColor: 'green',
                                    backgroundColor: gradient('green'),
                                    fill: true,
                                    tension: 0.3,
                                    pointRadius: 5
                                },
                                {
                                    label: 'Pengeluaran',
                                    data: pengeluaranArr,
                                    borderColor: 'red',
                                    backgroundColor: gradient('red'),
                                    fill: true,
                                    tension: 0.3,
                                    pointRadius: 5
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                }
                            }
                        }
                    });
                });
        }

        loadFinance(currentMonth, currentYear);

        document.getElementById("prevMonth").addEventListener("click", () => {
            currentMonth--;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            }
            loadFinance(currentMonth, currentYear);
        });

        document.getElementById("nextMonth").addEventListener("click", () => {
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            loadFinance(currentMonth, currentYear);
        });

        // ================= Modal Tambah =================
        const createModalEl = document.getElementById("createModal");
        const createForm = document.getElementById("createForm");

        createModalEl.addEventListener("show.bs.modal", function(event) {
            const button = event.relatedTarget;
            const jenis = button.getAttribute("data-jenis");
            document.getElementById("createJenisHidden").value = jenis;
        });

        createForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("<?= base_url('keuangan/store'); ?>", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        bootstrap.Modal.getInstance(createModalEl).hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        loadFinance(currentMonth, currentYear);
                        createForm.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.message || "Gagal menyimpan data!"
                        });
                    }
                }).catch(err => {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan jaringan!'
                    });
                });
        });

        // ================= Modal Edit =================
        const editModalEl = document.getElementById("editModal");
        const editForm = document.getElementById("editForm");

        document.addEventListener("click", function(e) {
            if (e.target && e.target.matches(".btn-edit")) {
                const data = JSON.parse(e.target.dataset.item);
                editForm.reset();
                document.getElementById("editId").value = data.id;
                document.getElementById("editUsaha").value = data.usaha_id;
                document.getElementById("editTanggal").value = data.tanggal;
                document.getElementById("editJumlah").value = data.jumlah;
                document.getElementById("editKeterangan").value = data.keterangan || '';
                new bootstrap.Modal(editModalEl).show();
            }
        });

        editForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("<?= base_url('keuangan/update'); ?>", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        bootstrap.Modal.getInstance(editModalEl).hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil diperbarui!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        loadFinance(currentMonth, currentYear);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.message || "Gagal mengupdate data!"
                        });
                    }
                }).catch(err => {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan jaringan!'
                    });
                });
        });

        // ================= Tombol Delete =================
        document.addEventListener("click", function(e) {
            if (e.target && e.target.matches(".btn-delete")) {
                const data = JSON.parse(e.target.dataset.item);

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data tanggal ${data.tanggal} akan dihapus!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const fd = new FormData();
                        fd.append('id', data.id);

                        fetch("<?= base_url('keuangan/delete'); ?>", {
                                method: "POST",
                                body: fd
                            })
                            .then(res => res.json())
                            .then(res => {
                                if (res.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Data berhasil dihapus!',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                    loadFinance(currentMonth, currentYear);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: res.message || "Gagal menghapus data!"
                                    });
                                }
                            }).catch(err => {
                                console.error(err);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Terjadi kesalahan jaringan!'
                                });
                            });
                    }
                });
            }
        });

    });
</script>