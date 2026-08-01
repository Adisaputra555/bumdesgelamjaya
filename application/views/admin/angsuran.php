<div class="pc-container">
    <div class="pc-content">
        <!-- ================= Header ================= -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Angsuran</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Angsuran</li>
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
                <input type="search" id="searchInput" class="form-control" placeholder="Cari data angsuran..." autofocus />
                <button type="button" id="btnSearch" class="btn btn-secondary ms-2">Cari</button>
            </div>
        </div>

        <!-- ================= Table ================= -->
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Angsuran Ke</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="angsuranBody">
                    <!-- Data akan diisi oleh JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const angsuranBody = document.getElementById('angsuranBody');
    const searchInput = document.getElementById('searchInput');
    const btnSearch = document.getElementById('btnSearch');

    async function fetchAngsuran(keyword = '', showAlert = false) {
        try {
            const response = await fetch(`<?= base_url('angsuran/get_all'); ?>?search=${encodeURIComponent(keyword)}`);
            const res = await response.json();
            const data = res.data || [];

            // Bersihkan tabel
            angsuranBody.innerHTML = '';

            if (data.length === 0) {
                if (showAlert && keyword.trim() !== '') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Tidak ditemukan!',
                        text: `Data angsuran dengan kata kunci "${keyword}" tidak ditemukan.`,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                return;
            }

            // Pastikan hanya 1 angsuran terakhir per anggota
            const lastPerAnggota = {};
            data.forEach(a => {
                lastPerAnggota[a.anggota_id] = a; // akan menimpa otomatis, sehingga tersisa yang terakhir
            });

            Object.values(lastPerAnggota).forEach((a, i) => {
                const nama = a.nama_anggota ?? '-';
                const angsuranKe = a.angsuran_ke ?? '-';
                const jumlah = a.jumlah_bayar ?? 0;
                const tanggal = a.tanggal_bayar ?? '-';
                const bukti = a.bukti_pembayaran ? `<a href="${a.bukti_pembayaran}" target="_blank">Lihat</a>` : '-';

                // Hitung status berdasarkan sisa_pinjaman numeric
                let sisaNumeric = Number(a.sisa_pinjaman.replace(/[^0-9.-]+/g, "")); // ubah 'Rp 0' jadi 0
                const status = (sisaNumeric <= 0) ?
                    '<span class="badge bg-success">Lunas</span>' :
                    '<span class="badge bg-warning">Belum Lunas</span>';

                angsuranBody.innerHTML += `
    <tr>
        <td>${i + 1}</td>
        <td>${nama}</td>
        <td>${angsuranKe}</td>
        <td>${Number(jumlah).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}</td>
        <td>${tanggal}</td>
        <td>${bukti}</td>
        <td>${status}</td>
        <td>
            <a href="<?= base_url('angsuran/riwayat/'); ?>${a.anggota_id}" class="btn btn-sm btn-primary">Riwayat</a>
        </td>
    </tr>`;
            });


        } catch (error) {
            console.error('Gagal memuat data angsuran:', error);
            Swal.fire('Error', 'Terjadi kesalahan saat memuat data', 'error');
        }
    }

    // Event search
    btnSearch.addEventListener('click', () => fetchAngsuran(searchInput.value.trim(), true));

    searchInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            fetchAngsuran(searchInput.value.trim(), true);
        }
    });

    searchInput.addEventListener('input', () => {
        if (searchInput.value.trim() === '') fetchAngsuran();
    });

    // Load awal
    fetchAngsuran();
</script>