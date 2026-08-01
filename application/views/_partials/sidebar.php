<style>
    .pc-link:hover {
        background-color: #f0f4ff;
        color: #2c7be5 !important;
        transition: all 0.2s ease;
    }

    .pc-caption {
        margin-top: 1rem !important;
        /* lebih rapat */
        margin-bottom: 0.25rem;
    }
</style>

<!-- Sidebar -->
<nav class="pc-sidebar bg-white shadow-sm overflow-hidden">
    <div class="navbar-wrapper">
        <!-- Header Sidebar (tanpa garis bawah) -->
        <div class="m-header d-flex align-items-center gap-2 px-3 py-3 border-bottom" style="border-color: #f1f1f1;">
            <img src="<?= base_url('assets/images/Logo_BUMDes.png') ?>" alt="logo" class="img-fluid" style="height: 32px;">
            <span class="fs-5 fw-bold text-dark">BUMDes</span>
        </div>

        <!-- Sidebar Menu -->
        <div class="navbar-content px-2 py-3">
            <ul class="pc-navbar nav flex-column gap-1">

                <!-- Dashboard -->
                <li class="pc-item <?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('dashboard') ?>" class="pc-link nav-link d-flex align-items-center gap-2 rounded px-3 py-2 <?= uri_string() == 'dashboard' ? 'bg-primary text-white' : 'text-dark' ?>">
                        <i class="ti ti-dashboard fs-5"></i> <span>Dashboard</span>
                    </a>
                </li>

                <!-- Caption Master -->
                <li class="pc-item pc-caption text-muted fw-semibold px-3">
                    <small class="text-uppercase">Master</small>
                </li>

                <!-- Master Menu -->
                <?php
                $menus = [
                    'anggota' => ['icon' => 'ti ti-users', 'label' => 'Anggota'],
                    'usaha' => ['icon' => 'ti ti-building-store', 'label' => 'Usaha'],
                    'KategoriUsaha' => ['icon' => 'ti ti-briefcase', 'label' => 'Kategori Usaha'],
                    'JenisTransaksi' => ['icon' => 'ti ti-exchange', 'label' => 'Jenis Transaksi'],
                    'Pinjaman' => ['icon' => 'fas fa-hand-holding-usd', 'label' => 'Pinjaman'],
                    'angsuran' => ['icon' => 'fas fa-coins', 'label' => 'Angsuran'],
                    'Keuangan' => ['icon' => 'fas fa-wallet', 'label' => 'Keuangan'],
                    'Laporan' => ['icon' => 'fas fa-chart-bar', 'label' => 'Laporan'],
                ];

                foreach ($menus as $url => $data) :
                    $isActive = uri_string() == $url ? 'bg-primary text-white' : 'text-dark';
                ?>
                    <li class="pc-item <?= uri_string() == $url ? 'active' : '' ?>">
                        <a href="<?= base_url($url) ?>" class="pc-link nav-link d-flex align-items-center gap-2 rounded px-3 py-2 <?= $isActive ?>">
                            <i class="<?= $data['icon'] ?> fs-5"></i> <span><?= $data['label'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>

                <!-- Caption Pengguna -->
                <li class="pc-item pc-caption text-muted fw-semibold px-3">
                    <small class="text-uppercase">Pengguna</small>
                </li>

                <!-- User -->
                <li class="pc-item <?= uri_string() == 'User' ? 'active' : '' ?>">
                    <a href="<?= base_url('User') ?>" class="pc-link nav-link d-flex align-items-center gap-2 rounded px-3 py-2 <?= uri_string() == 'User' ? 'bg-primary text-white' : 'text-dark' ?>">
                        <i class="ti ti-user fs-5"></i> <span>User</span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="pc-item">
                    <a href="<?= base_url('auth/logout') ?>" class="pc-link nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-danger">
                        <i class="fas fa-sign-out-alt fs-5"></i> <span>Log out</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>