<style>
    .bumdes-sidebar {
        --bumdes-accent: #5268d8;
        --bumdes-accent-soft: #eeebff;
        --bumdes-text: #27324a;
        --bumdes-muted: #8791a5;
        background: #fff;
        border-right: 1px solid #e9edf5;
        height: 100vh;
        width: 260px;
        display: flex;
        flex-direction: column;
    }

    .bumdes-sidebar .navbar-wrapper {
        width: 260px;
        height: 100%;
        min-height: 0;
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
    }

    .bumdes-sidebar .m-header {
        box-sizing: border-box;
        height: 60px;
        flex: 0 0 60px;
        border-color: #edf0f6 !important;
        padding: 10px 16px !important;
        gap: 8px !important;
    }

    .bumdes-sidebar .brand-mark {
        position: relative;
        width: 24px;
        height: 24px;
        flex: 0 0 24px;
        overflow: hidden;
    }

    .bumdes-sidebar .brand-mark img {
        position: absolute;
        top: 0;
        left: 50%;
        width: 36px !important;
        height: 36px !important;
        max-width: none;
        object-fit: cover;
        transform: translateX(-50%);
    }

    .bumdes-sidebar .m-header span {
        color: #273b9b !important;
        font-size: 0.9rem !important;
        font-weight: 650 !important;
    }

    .bumdes-sidebar .navbar-content {
        box-sizing: border-box;
        height: calc(100vh - 124px);
        flex: 0 0 auto;
        min-height: 0;
        overflow-x: hidden;
        overflow-y: scroll !important;
        overscroll-behavior: contain;
        -webkit-overflow-scrolling: touch;
        padding: 6px 10px !important;
    }

    .bumdes-sidebar .pc-navbar {
        display: flex;
        flex-direction: column;
        gap: 2px !important;
    }

    .bumdes-sidebar .pc-caption {
        margin: 11px 0 1px !important;
        padding: 5px 8px 3px !important;
        color: #8a91a3 !important;
        font-size: 0.62rem;
        font-weight: 700 !important;
        letter-spacing: 0.07em;
    }

    .bumdes-sidebar .bumdes-nav-link {
        position: relative;
        min-height: 36px;
        padding: 6px 10px !important;
        margin-right: 4px;
        border-radius: 7px !important;
        color: var(--bumdes-text) !important;
        font-size: 0.81rem;
        font-weight: 500;
        transition: background-color 0.18s ease, color 0.18s ease;
    }

    .bumdes-sidebar .bumdes-nav-link i {
        width: 18px;
        flex: 0 0 18px;
        color: #8993a8;
        font-size: 0.95rem !important;
        text-align: center;
        transition: color 0.18s ease;
    }

    .bumdes-sidebar .pc-navbar > .pc-item > .bumdes-nav-link::before {
        display: none;
    }

    .bumdes-sidebar .bumdes-nav-link:hover {
        background: #f5f7fc;
        color: var(--bumdes-accent) !important;
    }

    .bumdes-sidebar .pc-navbar > .pc-item.active > .bumdes-nav-link {
        background: var(--bumdes-accent-soft);
        color: #3927ad !important;
        font-weight: 650;
    }

    .bumdes-sidebar .pc-navbar > .pc-item.active:not(.pc-hasmenu) > .bumdes-nav-link::after {
        right: auto;
        left: 0;
        width: 3px;
        border-radius: 0 3px 3px 0;
        background: #3927ad;
    }

    .bumdes-sidebar .pc-item.active > .bumdes-nav-link i {
        color: #3927ad;
    }

    .bumdes-sidebar-footer {
        height: 64px;
        flex: 0 0 64px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        padding: 8px 10px;
    }

    .bumdes-sidebar .bumdes-logout {
        color: #d34b50 !important;
    }

    .bumdes-sidebar .bumdes-logout i {
        color: #d34b50;
    }

    .bumdes-sidebar .bumdes-logout:hover {
        background: #fff1f2;
        color: #a93649 !important;
    }
</style>

<?php
$currentRoute = strtolower(trim(uri_string(), '/'));
$menuGroups = [
    'Data Utama' => [
        'anggota' => ['icon' => 'ti ti-users', 'label' => 'Anggota'],
        'usaha' => ['icon' => 'ti ti-building-store', 'label' => 'Usaha'],
        'KategoriUsaha' => ['icon' => 'ti ti-briefcase', 'label' => 'Kategori Usaha'],
    ],
    'Keuangan' => [
        'Keuangan' => ['icon' => 'ti ti-wallet', 'label' => 'Keuangan'],
        'Pinjaman' => ['icon' => 'ti ti-cash', 'label' => 'Pinjaman'],
        'angsuran' => ['icon' => 'ti ti-receipt', 'label' => 'Angsuran'],
        'JenisTransaksi' => ['icon' => 'ti ti-arrows-left-right', 'label' => 'Jenis Transaksi'],
    ],
    'Laporan' => [
        'Laporan' => ['icon' => 'ti ti-chart-bar', 'label' => 'Laporan'],
    ],
];

$isRouteActive = function ($url) use ($currentRoute) {
    $route = strtolower($url);
    return $currentRoute === $route || strpos($currentRoute, $route . '/') === 0;
};
?>

<nav class="pc-sidebar bumdes-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header d-flex align-items-center gap-2 px-3 py-3 border-bottom">
            <span class="brand-mark">
                <img src="<?= base_url('assets/images/Logo_BUMDes.png') ?>" alt="">
            </span>
            <span class="fs-5 fw-bold text-dark">BUMDes</span>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar nav flex-column">
                <?php $dashboardActive = $isRouteActive('dashboard'); ?>
                <li class="pc-item <?= $dashboardActive ? 'active' : '' ?>">
                    <a href="<?= base_url('dashboard') ?>" class="pc-link nav-link bumdes-nav-link d-flex align-items-center gap-2 rounded px-3 py-2">
                        <i class="ti ti-dashboard fs-5"></i><span>Dashboard</span>
                    </a>
                </li>

                <?php foreach ($menuGroups as $groupLabel => $menus) : ?>
                    <li class="pc-item pc-caption px-3">
                        <small class="text-uppercase"><?= $groupLabel ?></small>
                    </li>
                    <?php foreach ($menus as $url => $data) :
                        $isActive = $isRouteActive($url);
                    ?>
                        <li class="pc-item <?= $isActive ? 'active' : '' ?>">
                            <a href="<?= base_url($url) ?>" class="pc-link nav-link bumdes-nav-link d-flex align-items-center gap-2 rounded px-3 py-2">
                                <i class="<?= $data['icon'] ?> fs-5"></i><span><?= $data['label'] ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <li class="pc-item pc-caption px-3">
                    <small class="text-uppercase">Pengguna</small>
                </li>
                <?php $userActive = $isRouteActive('User'); ?>
                <li class="pc-item <?= $userActive ? 'active' : '' ?>">
                    <a href="<?= base_url('User') ?>" class="pc-link nav-link bumdes-nav-link d-flex align-items-center gap-2 rounded px-3 py-2">
                        <i class="ti ti-user fs-5"></i><span>Pengguna</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bumdes-sidebar-footer">
            <a href="<?= base_url('auth/logout') ?>" class="pc-link nav-link bumdes-nav-link bumdes-logout d-flex align-items-center gap-2 rounded px-3 py-2">
                <i class="ti ti-logout fs-5"></i><span>Keluar</span>
            </a>
        </div>
    </div>
</nav>
