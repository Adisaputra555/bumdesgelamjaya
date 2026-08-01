<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kategori Usaha</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kategori Usaha</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="alertPlaceholder"></div>

        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" id="btnTambahKategori">Tambah Kategori</button>
            <div class="d-flex w-50">
                <input type="search" id="searchInput" class="form-control" placeholder="Cari kategori usaha..." />
                <button type="button" class="btn btn-secondary ms-2" id="btnSearch">Cari</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="kategoriTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="kategoriBody"></tbody>
            </table>
        </div>
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
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const createModal = new bootstrap.Modal(document.getElementById('createModal'), {
            backdrop: true
        });
        const editModal = new bootstrap.Modal(document.getElementById('editModal'), {
            backdrop: true
        });

        let kategoriData = [];

        function renderTable() {
            kategoriBody.innerHTML = '';
            if (kategoriData.length === 0) {
                kategoriBody.innerHTML = `
                <tr><td colspan="5" class="text-center fw-semibold">Data kategori tidak ditemukan.</td></tr>`;
                return;
            }
            kategoriData.forEach((k, index) => {
                kategoriBody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${k.nama_kategori}</td>
                    <td>${k.deskripsi}</td>
                    <td>${k.created_at}</td>
                    <td>
                        <button class="btn btn-warning btn-sm me-1" data-id="${k.id}"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm" data-id="${k.id}"><i class="fas fa-trash-alt"></i> Hapus</button>
                    </td>
                </tr>`;
            });
        }

        const fetchKategori = async (keyword = '', showAlert = false) => {
            try {
                const res = await fetch(`<?= base_url('KategoriUsaha/get_all'); ?>?keyword=${encodeURIComponent(keyword)}`);;
                const data = await res.json();
                kategoriData = data;
                renderTable();

                if (showAlert && keyword.trim() !== '' && data.length === 0) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Tidak ditemukan!',
                        text: `Kategori dengan kata kunci "${keyword}" tidak ditemukan.`,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            } catch (err) {
                console.error(err);
                Swal.fire('Error', 'Gagal mengambil data kategori.', 'error');
            }
        };

        async function updateKategori(data) {
            const res = await fetch(`<?= base_url('KategoriUsaha/update'); ?>/${data.id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            const result = await res.json();
            if (result.success) {
                Swal.fire('Berhasil!', 'Kategori berhasil diupdate.', 'success');
                editModal.hide();
                // clearBackdrop();
                fetchKategori();
            } else {
                Swal.fire('Gagal!', result.message || 'Gagal update kategori.', 'error');
            }
        }

        async function deleteKategori(id) {
            const confirm = await Swal.fire({
                title: 'Yakin ingin hapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            });

            if (confirm.isConfirmed) {
                const res = await fetch(`<?= base_url('kategoriusaha/delete'); ?>/${id}`, {
                    method: 'DELETE'
                });
                const result = await res.json();
                if (result.success) {
                    Swal.fire('Berhasil!', 'Kategori dihapus.', 'success');
                    fetchKategori();
                } else {
                    Swal.fire('Gagal!', result.message || 'Gagal hapus.', 'error');
                }
            }
        }

        kategoriBody.addEventListener('click', e => {
            const btn = e.target.closest('button');
            if (!btn) return;
            const id = btn.dataset.id;
            const kategori = kategoriData.find(k => k.id == id);

            if (btn.classList.contains('btn-warning')) {
                editForm.id.value = kategori.id;
                editForm.nama_kategori.value = kategori.nama_kategori;
                editForm.deskripsi.value = kategori.deskripsi;
                editModal.show();
            } else if (btn.classList.contains('btn-danger')) {
                deleteKategori(id);
            }
        });

        document.getElementById('btnTambahKategori').addEventListener('click', () => {
            createForm.reset();
            createForm.classList.remove('was-validated');
            createModal.show();
            // clearBackdrop();
        });

        createForm.addEventListener('submit', e => {
            e.preventDefault();
            if (!createForm.checkValidity()) {
                createForm.classList.add('was-validated');
                return;
            }
            const data = {
                nama_kategori: createForm.nama_kategori.value.trim(),
                deskripsi: createForm.deskripsi.value.trim()
            };
            addKategori(data);
        });

        async function addKategori(data) {
            try {
                const res = await fetch(`<?= base_url('KategoriUsaha/store'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await res.json();
                console.log("Response tambah kategori:", result); // debug log

                if (result.success) {
                    Swal.fire('Berhasil!', 'Kategori berhasil ditambahkan.', 'success');
                    createModal.hide();
                    // clearBackdrop();
                    fetchKategori(); // refresh data
                } else {
                    Swal.fire('Gagal!', result.message || 'Gagal tambah kategori.', 'error');
                }
            } catch (err) {
                console.error("Error saat tambah kategori:", err);
                Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data.', 'error');
            }
        }


        editForm.addEventListener('submit', e => {
            e.preventDefault();
            if (!editForm.checkValidity()) {
                editForm.classList.add('was-validated');
                return;
            }
            const data = {
                id: editForm.id.value,
                nama_kategori: editForm.nama_kategori.value.trim(),
                deskripsi: editForm.deskripsi.value.trim()
            };
            updateKategori(data);
        });

        const btnSearch = document.getElementById('btnSearch');

        btnSearch.addEventListener('click', () => {
            const keyword = searchInput.value.trim();
            fetchKategori(keyword, true);
        });

        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = searchInput.value.trim();
                fetchKategori(keyword, true);
            }
        });

        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim();
            if (keyword === '') fetchKategori();
        });

        // function clearBackdrop() {
        //     document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        // }

        fetchKategori();
    })();
</script>