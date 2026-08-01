<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Usaha</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Usaha</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="alertPlaceholder"></div>

        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" id="btnTambahUsaha">Tambah Usaha</button>
            <div class="d-flex w-50">
                <input type="search" id="searchInput" class="form-control" placeholder="Cari usaha..." autofocus />
                <button type="button" class="btn btn-secondary ms-2" id="btnSearch">Cari</button>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="usahaTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Usaha</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Modal Awal</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="usahaBody"></tbody>
            </table>
        </div>
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

        let usahaData = [];
        let showAlert = false;

        const fetchUsaha = async (term = '', showSwal = false, showEmpty = false) => {
            try {
                const res = await fetch(`<?= base_url('usaha/get_all'); ?>?search=${encodeURIComponent(term)}`);
                const data = await res.json();
                usahaData = data;
                renderTable(showEmpty);

                if (usahaData.length === 0 && showSwal) {
                    Swal.fire('Tidak ditemukan', `Data usaha dengan kata kunci "${term}" tidak ditemukan.`, 'info');
                }
            } catch (err) {
                Swal.fire('Gagal', 'Gagal mengambil data usaha.', 'error');
            }
        };

        const renderTable = (showEmpty = false) => {
            usahaBody.innerHTML = '';
            if (usahaData.length === 0) {
                if (showEmpty) {
                    usahaBody.innerHTML = `<tr><td colspan="8" class="text-center">Data usaha tidak ditemukan</td></tr>`;
                }
                return;
            }
            usahaData.forEach((u, i) => {
                usahaBody.innerHTML += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${u.nama_usaha}</td>
                    <td>${u.jenis}</td>
                    <td>${u.deskripsi}</td>
                    <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(u.modal_awal)}</td>
                    <td>${u.status}</td>
                    <td>${u.created_at}</td>
                    <td>
                        <button class="btn btn-warning btn-sm me-1" data-id="${u.id}" data-action="edit"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm" data-id="${u.id}" data-action="hapus"><i class="fas fa-trash-alt"></i> Hapus</button>
                    </td>
                </tr>`;
            });
        };

        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = searchInput.value.trim();
                fetchUsaha(keyword, true, true);
            }
        });

        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim();
            if (keyword === '') {
                fetchUsaha('', false, false);
            }
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