<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Pinjaman</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pinjaman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Pinjaman</button>
        </div>

        <!-- Alerts -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Table Pinjaman -->
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="pinjamanTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Anggota</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jumlah Pinjam</th>
                        <th>Bunga</th>
                        <th>Tenor</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Pinjaman -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="createForm" class="modal-content needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="alert alert-info mx-3 mt-3">
                <strong>Saldo Tersedia:</strong>
                <span id="saldoTersediaText" data-saldo="<?= $saldo; ?>">Rp <?= number_format($saldo, 0, ',', '.'); ?></span>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Anggota *</label>
                    <select class="form-select" name="anggota_id" id="createNama" required>
                        <option value="">Pilih anggota...</option>
                        <?php foreach ($anggota as $a): ?>
                            <option value="<?= $a->id; ?>"><?= $a->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Nama anggota wajib dipilih.</div>
                </div>
                <div class="mb-3">
                    <label>Tanggal Pinjam *</label>
                    <input type="date" class="form-control" name="tanggal_pinjam" id="createTanggalPinjam" required>
                    <div class="invalid-feedback">Tanggal wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label>Jumlah Pinjam *</label>
                    <input type="number" class="form-control" name="jumlah_pinjam" id="createJumlahPinjam" min="1" required>
                    <div class="text-danger mt-1 d-none" id="jumlahPinjamWarning">Jumlah pinjam melebihi saldo!</div>
                </div>
                <div class="mb-3">
                    <label>Bunga (%) *</label>
                    <input type="number" class="form-control" name="bunga" id="createBunga" min="0" required>
                    <div class="invalid-feedback">Bunga wajib diisi.</div>
                </div>
                <div class="mb-3">
                    <label>Tenor (Bulan) *</label>
                    <input type="number" class="form-control" name="tenor" id="createTenor" min="1" required>
                    <div class="invalid-feedback">Tenor wajib diisi.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="submitPinjaman">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Bayar Angsuran -->
<div class="modal fade" id="angsuranModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="angsuranForm" class="modal-content needs-validation" novalidate enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Bayar Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="pinjaman_id" id="angsuranPinjamanId">
                <div class="mb-3">
                    <label>Angsuran Ke *</label>
                    <input type="number" class="form-control" id="angsuranKe" name="angsuran_ke" readonly required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Bayar *</label>
                    <input type="date" class="form-control" id="tanggalBayar" name="tanggal_bayar" value="<?= date('Y-m-d'); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Jumlah Bayar *</label>
                    <input type="number" class="form-control" id="jumlahBayar" name="jumlah_bayar" min="1" required>
                </div>
                <div class="mb-3">
                    <label>Bukti Pembayaran (opsional)</label>
                    <input type="file" class="form-control" name="bukti_pembayaran" accept="image/*,application/pdf">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        let table = $('#pinjamanTable').DataTable({
            ajax: '<?= base_url('pinjaman/get_all'); ?>',
            columns: [{
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                {
                    data: 'nama_anggota'
                },
                {
                    data: 'tanggal_pinjam'
                },
                {
                    data: 'jumlah_pinjam'
                },
                {
                    data: 'bunga'
                },
                {
                    data: 'tenor'
                },
                {
                    data: 'status'
                }, // ✅ sudah berbentuk badge dari server
                {
                    data: 'created_at'
                }, // ✅ harus ada di JSON
                {
                    data: 'aksi'
                } // Tombol Bayar + Hapus
            ]
        });

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(angka);
        }

        function refreshSaldo() {
            $.get('<?= base_url("pinjaman/get_saldo_tersedia"); ?>', function(res) {
                if (res.saldo !== undefined) {
                    $('#saldoTersediaText').text('Rp ' + formatRupiah(res.saldo));
                    $('#saldoTersediaText').data('saldo', res.saldo);
                    const jumlah = parseInt($('#createJumlahPinjam').val()) || 0;
                    if (jumlah > res.saldo) {
                        $('#jumlahPinjamWarning').removeClass('d-none');
                        $('#submitPinjaman').prop('disabled', true);
                    } else {
                        $('#jumlahPinjamWarning').addClass('d-none');
                        $('#submitPinjaman').prop('disabled', false);
                    }
                }
            }, 'json');
        }

        $('#createModal').on('show.bs.modal', refreshSaldo);

        $('#createJumlahPinjam').on('input', function() {
            const jumlah = parseInt($(this).val()) || 0;
            const saldo = parseInt($('#saldoTersediaText').data('saldo')) || 0;
            if (jumlah > saldo) {
                $('#jumlahPinjamWarning').removeClass('d-none');
                $('#submitPinjaman').prop('disabled', true);
            } else {
                $('#jumlahPinjamWarning').addClass('d-none');
                $('#submitPinjaman').prop('disabled', false);
            }
        });

        // Tambah Pinjaman
        $('#createForm').submit(function(e) {
            e.preventDefault();
            const form = this;
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }
            $.post('<?= base_url('pinjaman/store'); ?>', $(form).serialize(), function(res) {
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    bootstrap.Modal.getOrCreateInstance($('#createModal')).hide();
                    form.reset();
                    form.classList.remove('was-validated');
                    table.ajax.reload(null, false);
                    refreshSaldo();
                } else Swal.fire('Gagal', res.message, 'error');
            }, 'json').fail(() => Swal.fire('Error', 'Gagal menghubungi server', 'error'));
        });

        // Hapus Pinjaman
        $('#pinjamanTable').on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const res = await fetch(`<?= base_url('pinjaman/soft_delete/'); ?>${id}`);
                        const data = await res.json();
                        if (data.success) {
                            Swal.fire('Berhasil', data.message, 'success');
                            table.ajax.reload(null, false);
                            refreshSaldo();
                        } else Swal.fire('Gagal', data.message, 'error');
                    } catch (e) {
                        Swal.fire('Error', 'Gagal menghubungi server', 'error');
                    }
                }
            });
        });

        // Bayar Angsuran
        $('#pinjamanTable').on('click', '.btn-bayar', async function() {
            const id = $(this).data('id');
            $('#angsuranPinjamanId').val(id);
            try {
                const res = await fetch(`<?= base_url('pinjaman/get_detail/'); ?>${id}`);
                if (!res.ok) throw new Error('Server error');
                const data = await res.json();

                if (data.success) {
                    $('#angsuranKe').val(data.angsuran_ke_berikutnya);
                    $('#jumlahBayar').val(data.jumlah_per_angsuran);
                    bootstrap.Modal.getOrCreateInstance($('#angsuranModal')).show();
                } else if (data.status === 'lunas') {
                    Swal.fire('Lunas', data.message || 'Pinjaman ini sudah lunas', 'info');
                } else {
                    Swal.fire('Gagal', data.message || 'Terjadi kesalahan', 'error');
                }
            } catch (e) {
                Swal.fire('Error', 'Gagal menghubungi server', 'error');
            }
        });

        // Simpan Bayar Angsuran
        $('#angsuranForm').submit(async function(e) {
            e.preventDefault();
            const form = this;

            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            const formData = new FormData(form);

            try {
                const res = await fetch('<?= base_url("angsuran/store"); ?>', {
                    method: 'POST',
                    body: formData
                });
                const result = await res.json();

                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: result.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    bootstrap.Modal.getOrCreateInstance($('#angsuranModal')).hide();
                    form.reset();
                    form.classList.remove('was-validated');
                    table.ajax.reload(null, false);
                } else {
                    Swal.fire('Gagal', result.message, 'error');
                }
            } catch (e) {
                console.error(e);
                Swal.fire('Error', 'Gagal menghubungi server', 'error');
            }
        });
    });
</script>