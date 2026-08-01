<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Jenis Transaksi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item">Keuangan</li>
                            <li class="breadcrumb-item" aria-current="page">Jenis Transaksi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <button id="btnTambah" class="btn btn-primary">Tambah Jenis</button>
            <div class="d-flex w-50">
                <input type="search" id="searchInput" class="form-control" placeholder="Cari jenis transaksi..." autofocus />
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="jenisTransaksiBody"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Transaksi</label>
                    <input type="text" name="nama_transaksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <select name="tipe" class="form-select" required>
                        <option value="">Pilih Tipe...</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
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
    <div class="modal-dialog">
        <form id="editForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title">Edit Jenis Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="editId">
                <div class="mb-3">
                    <label class="form-label">Nama Transaksi</label>
                    <input type="text" name="nama_transaksi" id="editNamaTransaksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <select name="tipe" id="editTipe" class="form-select" required>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi" class="form-control"></textarea>
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
        const body = document.getElementById('jenisTransaksiBody');
        const searchInput = document.getElementById('searchInput');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');

        const createModalEl = document.getElementById('createModal');
        const createModal = new bootstrap.Modal(createModalEl);
        const editModalEl = document.getElementById('editModal');
        const editModal = new bootstrap.Modal(editModalEl);

        let dataList = [];

        function renderTable(filtered = dataList) {
            body.innerHTML = '';
            if (filtered.length === 0) {
                body.innerHTML = `<tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>`;
                return;
            }
            filtered.forEach((item, index) => {
                body.innerHTML += `
        <tr>
          <td>${index + 1}</td>
          <td>${item.nama_transaksi}</td>
          <td>${item.tipe}</td>
          <td>${item.deskripsi}</td>
          <td>${item.created_at}</td>
          <td>
            <button class="btn btn-warning btn-sm me-1" data-id="${item.id}">Edit</button>
            <button class="btn btn-danger btn-sm" data-id="${item.id}">Hapus</button>
          </td>
        </tr>
      `;
            });
        }

        async function fetchData(keyword = '', showAlert = false) {
            try {
                const res = await fetch(`<?= base_url('jenistransaksi/get_all'); ?>?search=${encodeURIComponent(keyword)}`);
                const data = await res.json();
                dataList = data;
                renderTable(dataList);

                if (showAlert && keyword.trim() !== '' && data.length === 0) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Tidak ditemukan!',
                        text: `Jenis transaksi dengan kata kunci "${keyword}" tidak ditemukan.`,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            } catch (err) {
                console.error(err);
                Swal.fire('Error', 'Gagal mengambil data jenis transaksi.', 'error');
            }
        }

        async function storeData(data) {
            const res = await fetch(`<?= base_url('jenistransaksi/store'); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            const result = await res.json();
            if (result.success) {
                Swal.fire('Sukses', 'Data ditambahkan', 'success');
                createForm.reset();
                createModal.hide();
                fetchData();
            } else {
                Swal.fire('Gagal', result.message || 'Gagal menambah data', 'error');
            }
        }

        async function updateData(data) {
            const res = await fetch(`<?= base_url('jenistransaksi/update'); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            const result = await res.json();
            if (result.success) {
                Swal.fire('Sukses', 'Data diperbarui', 'success');
                editModal.hide();
                fetchData();
            } else {
                Swal.fire('Gagal', result.message || 'Gagal memperbarui data', 'error');
            }
        }

        async function deleteData(id) {
            const confirm = await Swal.fire({
                title: 'Yakin?',
                text: 'Data akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            });
            if (!confirm.isConfirmed) return;

            const res = await fetch(`<?= base_url('jenistransaksi/delete'); ?>/${id}`, {
                method: 'DELETE'
            });
            const result = await res.json();
            if (result.success) {
                Swal.fire('Sukses', 'Data dihapus', 'success');
                fetchData();
            } else {
                Swal.fire('Gagal', result.message || 'Gagal hapus data', 'error');
            }
        }

        document.getElementById('btnTambah').addEventListener('click', () => {
            createForm.reset();
            createModal.show();
        });

        createModalEl.addEventListener('hidden.bs.modal', () => {
            document.body.classList.remove('modal-open');
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        });
        editModalEl.addEventListener('hidden.bs.modal', () => {
            document.body.classList.remove('modal-open');
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        });

        createForm.addEventListener('submit', e => {
            e.preventDefault();
            if (!createForm.checkValidity()) return;
            const data = Object.fromEntries(new FormData(createForm).entries());
            storeData(data);
        });

        editForm.addEventListener('submit', e => {
            e.preventDefault();
            if (!editForm.checkValidity()) return;
            const data = Object.fromEntries(new FormData(editForm).entries());
            updateData(data);
        });

        body.addEventListener('click', e => {
            const btn = e.target.closest('button');
            if (!btn) return;
            const id = btn.dataset.id;
            const item = dataList.find(x => x.id == id);
            if (btn.classList.contains('btn-danger')) deleteData(id);
            else if (btn.classList.contains('btn-warning') && item) {
                document.getElementById('editId').value = item.id;
                document.getElementById('editNamaTransaksi').value = item.nama_transaksi;
                document.getElementById('editTipe').value = item.tipe;
                document.getElementById('editDeskripsi').value = item.deskripsi;
                editModal.show();
            }
        });

        const btnSearch = document.createElement('button');
        btnSearch.textContent = 'Cari';
        btnSearch.className = 'btn btn-secondary ms-2';
        btnSearch.type = 'button';
        btnSearch.id = 'btnSearch';
        searchInput.after(btnSearch);

        btnSearch.addEventListener('click', () => {
            const keyword = searchInput.value.trim();
            fetchData(keyword, true);
        });

        searchInput.addEventListener('keydown', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = searchInput.value.trim();
                fetchData(keyword, true);
            }
        });

        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim();
            if (keyword === '') fetchData();
        });

        fetchData();
    })();
</script>