<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">User</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">User</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="alertPlaceholder"></div>

        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Pengguna</button>
            <div class="d-flex w-50">
                <input type="search" id="searchInput" class="form-control" placeholder="Cari pengguna..." />
                <button type="button" class="btn btn-secondary ms-2" id="btnSearch">Cari</button>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th style="display: none;">Role</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="userBody">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $index => $user): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->email; ?></td>
                                <td style="display: none;"><?= ucfirst($user->role); ?></td>
                                <td><?= $user->is_active ? 'Aktif' : 'Nonaktif'; ?></td>
                                <td><?= $user->created_at; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $user->id; ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $user->id; ?>">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pengguna.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php if (!empty($users)): ?>
    <?php foreach ($users as $user): ?>
        <div class="modal fade" id="editModal<?= $user->id; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="post" action="<?= base_url('User/update/' . $user->id); ?>" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $user->username; ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $user->email; ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-3" style="display: none;">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="admin" <?= $user->role === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                <option value="staff" <?= $user->role === 'staff' ? 'selected' : ''; ?>>Staff</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select" required>
                                <option value="1" <?= $user->is_active ? 'selected' : ''; ?>>Aktif</option>
                                <option value="0" <?= !$user->is_active ? 'selected' : ''; ?>>Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="<?= base_url('User/store'); ?>" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>
                <div class="mb-3" style="display: none;">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select" required>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        const userBody = document.getElementById('userBody');
        let userData = [];

        // Ambil data dari server
        const fetchUsers = async (keyword = '', showAlert = false, showEmptyMessage = false) => {
            try {
                const res = await fetch(`<?= base_url('user/get_all'); ?>?search=${encodeURIComponent(keyword)}`);
                const data = await res.json();

                // Tunggu data selesai diambil baru render
                if (Array.isArray(data)) {
                    userData = data;
                    renderTable(showEmptyMessage);

                    if (showAlert && keyword.trim() !== '' && userData.length === 0) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Tidak ditemukan!',
                            text: `Pengguna dengan kata kunci "${keyword}" tidak ditemukan.`,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }
            } catch (err) {
                console.error('Gagal fetch data pengguna:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat mengambil data pengguna.',
                });
            }
        };

        const renderTable = (showEmptyMessage = false) => {
            userBody.innerHTML = '';

            if (userData.length === 0) {
                if (showEmptyMessage) {
                    userBody.innerHTML = `<tr><td colspan="7" class="text-center">Data pengguna tidak ditemukan.</td></tr>`;
                }
                return;
            }

            userData.forEach((user, i) => {
                userBody.innerHTML += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${user.username}</td>
                    <td>${user.email}</td>
                    <td style="display: none;">${user.role}</td>
                    <td>${user.is_active == 1 ? 'Aktif' : 'Nonaktif'}</td>
                    <td>${user.created_at}</td>
                   <td>
                         <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal${user.id}">Edit</button>
                         <button class="btn btn-danger btn-sm btn-delete" data-id="${user.id}">Hapus</button>
                   </td>
                </tr>
            `;
            });
        };

        // 🔍 Klik tombol cari
        document.getElementById('btnSearch').addEventListener('click', () => {
            const keyword = searchInput.value.trim();
            fetchUsers(keyword, true, true);
        });

        // ⌨ Tekan enter di input
        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = searchInput.value.trim();
                fetchUsers(keyword, true, true);
            }
        });
        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim();
            if (keyword === '') {
                fetchUsers('', false, false); // fetch semua data tanpa alert dan tanpa pesan kosong
            }
        });

        // ⏬ Load awal tanpa filter
        fetchUsers('', false, false);

        // Flash message PHP
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata('success'); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php elseif ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= $this->session->flashdata('error'); ?>',
                showConfirmButton: true
            });
        <?php endif; ?>
    });

    // Delegasi event untuk tombol hapus
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-delete')) {
            e.preventDefault();
            const userId = e.target.getAttribute('data-id');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data pengguna yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `<?= base_url('User/delete/') ?>${userId}`;
                }
            });
        }
    });
</script>