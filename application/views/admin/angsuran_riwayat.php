<div class="pc-container">
    <div class="pc-content">
        <!-- ================= Header ================= -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Riwayat Angsuran - <?= $anggota->nama ?? '-' ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('angsuran'); ?>">Angsuran</a></li>
                            <li class="breadcrumb-item active">Riwayat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= Flash Messages ================= -->
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <!-- ================= Search ================= -->
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex w-50">
                <input type="search" id="searchInput" class="form-control" placeholder="Cari riwayat angsuran..." autofocus />
                <button type="button" id="btnSearch" class="btn btn-secondary ms-2">Cari</button>
            </div>
        </div>

        <!-- ================= Table ================= -->
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="riwayatTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Angsuran Ke</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Bukti</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="riwayatBody">
                    <?php if (!empty($angsuran)) : ?>
                        <?php foreach ($angsuran as $i => $a) : ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $a['angsuran_ke'] ?></td>
                                <td><?= number_format($a['jumlah_bayar'], 0, ',', '.') ?></td>
                                <td><?= $a['tanggal_bayar'] ?></td>
                                <td>
                                    <?php if (!empty($a['bukti_pembayaran'])) : ?>
                                        <a href="<?= base_url($a['bukti_pembayaran']) ?>" target="_blank">Lihat</a>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($a['status'] == 'Lunas') : ?>
                                        <span class="badge bg-success">Lunas</span>
                                    <?php else : ?>
                                        <span class="badge bg-warning">Belum Lunas</span>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada riwayat angsuran.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="<?= base_url('angsuran'); ?>" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const searchInput = document.getElementById('searchInput');
    const btnSearch = document.getElementById('btnSearch');
    const riwayatBody = document.getElementById('riwayatBody');
    const rows = riwayatBody.querySelectorAll("tr");

    function searchRiwayat(keyword) {
        let found = false;
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            if (text.includes(keyword.toLowerCase())) {
                row.style.display = "";
                found = true;
            } else {
                row.style.display = "none";
            }
        });

        if (!found && keyword.trim() !== "") {
            Swal.fire({
                icon: 'info',
                title: 'Tidak ditemukan!',
                text: `Data riwayat dengan kata kunci "${keyword}" tidak ditemukan.`,
                timer: 2000,
                showConfirmButton: false
            });
        }

        if (keyword.trim() === "") {
            rows.forEach(row => row.style.display = "");
        }
    }

    btnSearch.addEventListener('click', () => searchRiwayat(searchInput.value));
    searchInput.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchRiwayat(searchInput.value);
        }
    });
    searchInput.addEventListener('input', () => {
        if (searchInput.value.trim() === "") searchRiwayat("");
    });
</script>