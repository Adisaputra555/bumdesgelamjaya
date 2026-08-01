
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Anggota</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Anggota</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="alertPlaceholder"></div>

        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Anggota</button>
            <div class="d-flex w-50">
                <input type="search" id="searchInput" class="form-control" placeholder="Cari anggota..." />
                <button type="button" class="btn btn-secondary ms-2" id="btnSearch">Cari</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="anggotaTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="anggotaBody">
                    <!-- Data anggota akan muncul di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Anggota -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="createNama" class="form-label">Nama *</label>
                    <input type="text" class="form-control" id="createNama" name="nama" required />
                    <div class="invalid-feedback">Nama wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createAlamat" class="form-label">Alamat *</label>
                    <textarea class="form-control" id="createAlamat" name="alamat" rows="3" required></textarea>
                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="createNoHp" class="form-label">No HP *</label>
                    <input type="tel" class="form-control" id="createNoHp" name="no_hp" pattern="^[0-9+]+$" required />
                    <div class="invalid-feedback">No HP wajib diisi dan hanya boleh angka dan +.</div>
                </div>
                <div class="mb-3">
                    <label for="createEmail" class="form-label">Email *</label>
                    <input type="email" class="form-control" id="createEmail" name="email" required />
                    <div class="invalid-feedback">Email wajib diisi dan harus valid.</div>
                </div>
                <div class="mb-3">
                    <label for="createStatus" class="form-label">Status *</label>
                    <select class="form-select" id="createStatus" name="status" required>
                        <option value="">Pilih status...</option>
                        <option value="aktif" selected>Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
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

<!-- Modal Edit Anggota -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id" />
                <div class="mb-3">
                    <label for="editNama" class="form-label">Nama *</label>
                    <input type="text" class="form-control" id="editNama" name="nama" required />
                    <div class="invalid-feedback">Nama wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editAlamat" class="form-label">Alamat *</label>
                    <textarea class="form-control" id="editAlamat" name="alamat" rows="3" required></textarea>
                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label for="editNoHp" class="form-label">No HP *</label>
                    <input type="tel" class="form-control" id="editNoHp" name="no_hp" pattern="^[0-9+]+$" required />
                    <div class="invalid-feedback">No HP wajib diisi dan hanya boleh angka dan +.</div>
                </div>
                <div class="mb-3">
                    <label for="editEmail" class="form-label">Email *</label>
                    <input type="email" class="form-control" id="editEmail" name="email" required />
                    <div class="invalid-feedback">Email wajib diisi dan harus valid.</div>
                </div>
                <div class="mb-3">
                    <label for="editStatus" class="form-label">Status *</label>
                    <select class="form-select" id="editStatus" name="status" required>
                        <option value="">Pilih status...</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
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
    (() => {
        const anggotaBody = document.getElementById('anggotaBody');
        const searchInput = document.getElementById('searchInput');
        const editForm = document.getElementById('editForm');
        const editModalEl = document.getElementById('editModal');
        const createForm = document.getElementById('createForm');
        const createModalEl = document.getElementById('createModal');
        const createModal = new bootstrap.Modal(createModalEl);

        let anggotaData = [];

        function renderTable(searchTerm = '') {
            anggotaBody.innerHTML = '';
            let filtered = anggotaData;
            if (searchTerm) {
                filtered = anggotaData.filter(a =>
                    a.nama.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    a.email.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    a.no_hp.includes(searchTerm)
                );
            }
            if (filtered.length === 0) {
                anggotaBody.innerHTML = `<tr><td colspan="8" class="text-center fw-semibold py-4">Data anggota tidak ditemukan</td></tr>`;
                return;
            }
            filtered.forEach((a, index) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                <td>${index + 1}</td>
                <td>${a.nama}</td>
                <td>${a.alamat}</td>
                <td>${a.no_hp}</td>
                <td>${a.email}</td>
                <td>${a.status.charAt(0).toUpperCase() + a.status.slice(1)}</td>
                <td>${a.created_at}</td>
                <td>
                    <button class="btn btn-warning btn-sm me-1 btn-edit" data-id="${a.id}" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="${a.id}" title="Hapus">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </td>
            `;
                anggotaBody.appendChild(tr);
            });
        }

        async function fetchAnggota(searchTerm = '', showAlert = false) {
            try {
                const response = await fetch(`<?= base_url('anggota/get_all'); ?>?keyword=${encodeURIComponent(searchTerm)}`);
                if (!response.ok) throw new Error('Network response was not ok');
                anggotaData = await response.json();

                if (anggotaData.length === 0 && showAlert && searchTerm !== '') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Tidak ditemukan!',
                        text: `Anggota dengan kata kunci "${searchTerm}" tidak ditemukan.`,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }

                renderTable(searchTerm);
            } catch (error) {
                console.error('Gagal mengambil data anggota:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Gagal mengambil data anggota.',
                    showConfirmButton: true
                });
            }
        }

        async function addAnggota(data) {
            try {
                const res = await fetch(`<?= base_url('anggota/store'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                const result = await res.json();
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Anggota berhasil ditambahkan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    fetchAnggota();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: result.message || 'Gagal menambahkan anggota.'
                    });
                }
            } catch (error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Gagal menambahkan anggota.'
                });
            }
        }

        async function deleteAnggota(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anggota ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const res = await fetch(`<?= base_url('anggota/delete'); ?>/${id}`, {
                            method: 'DELETE'
                        });
                        const result = await res.json();
                        if (result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Anggota berhasil dihapus.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            fetchAnggota();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: result.message || 'Gagal menghapus anggota.'
                            });
                        }
                    } catch (error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal menghapus anggota.'
                        });
                    }
                }
            });
        }

        createForm.addEventListener('submit', e => {
            e.preventDefault();
            if (!createForm.checkValidity()) return;

            const formData = new FormData(createForm);
            const newData = Object.fromEntries(formData.entries());

            addAnggota(newData);
            createForm.reset();

            const modalInstance = bootstrap.Modal.getInstance(createModalEl);
            if (modalInstance) {
                modalInstance.hide();

                setTimeout(() => {
                    document.body.classList.remove('modal-open');
                    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                }, 300);
            }
        });

        // 🔍 Klik tombol "Cari"
        document.getElementById('btnSearch').addEventListener('click', () => {
            const keyword = searchInput.value.trim();
            fetchAnggota(keyword, true);
        });

        // ⌨ Tekan Enter
        searchInput.addEventListener('keydown', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = searchInput.value.trim();
                fetchAnggota(keyword, true);
            }
        });

        // 🧹 Kosongkan input = tampilkan semua data
        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim();
            if (keyword === '') {
                fetchAnggota('', false);
            }
        });

        editForm.addEventListener('submit', async e => {
            e.preventDefault();

            const formData = new FormData(editForm);
            const updatedData = Object.fromEntries(formData.entries());

            try {
                const response = await fetch(`<?= base_url('anggota/update'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(updatedData)
                });
                const result = await response.json();
                if (result.success) {
                    fetchAnggota();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Anggota berhasil diperbarui.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    const editModalInstance = bootstrap.Modal.getInstance(editModalEl);
                    if (editModalInstance) {
                        editModalInstance.hide();
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: result.message || 'Gagal memperbarui anggota.'
                    });
                }
            } catch (error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Gagal memperbarui anggota.'
                });
            }
        });

        anggotaBody.addEventListener('click', e => {
            const target = e.target.closest('button');
            if (!target) return;
            const id = target.dataset.id;

            if (target.classList.contains('btn-delete')) {
                deleteAnggota(id);
            }

            if (target.classList.contains('btn-edit')) {
                const anggota = anggotaData.find(a => a.id == id);
                if (anggota) {
                    document.getElementById('editId').value = anggota.id;
                    document.getElementById('editNama').value = anggota.nama;
                    document.getElementById('editAlamat').value = anggota.alamat;
                    document.getElementById('editNoHp').value = anggota.no_hp;
                    document.getElementById('editEmail').value = anggota.email;
                    document.getElementById('editStatus').value = anggota.status;

                    // Bersihkan validasi lama
                    editForm.classList.remove('was-validated');

                    // Gunakan instance modal yang sudah ada jika ada
                    let editModalInstance = bootstrap.Modal.getInstance(editModalEl);
                    if (!editModalInstance) {
                        editModalInstance = new bootstrap.Modal(editModalEl);
                    }
                    editModalInstance.show();
                }
            }
        });

        // Inisialisasi data awal
        fetchAnggota();
    })();
</script>
