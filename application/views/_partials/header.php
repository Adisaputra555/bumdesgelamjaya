<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= isset($title) ? $title : 'Aplikasi BUMDes'; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Aplikasi BUMDes">
    <meta name="keywords" content="BUMDes, Admin, Dashboard">
    <meta name="author" content="Mentari Cendikia">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/images/Logo_BUMDes.png') ?>" type="image/png">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>">

    <!-- Template Style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link">
    <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>">

    <style>
        body.sidebar-collapsed .pc-sidebar {
            width: 0 !important;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        body.sidebar-collapsed .pc-container {
            margin-left: 0 !important;
            transition: all 0.3s ease-in-out;
        }

        .pc-sidebar {
            width: 260px;
            transition: all 0.3s ease-in-out;
        }

        .pc-sidebar .m-header img.logo-lg {
            height: 40px;
        }

        .pc-header {
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e9edf5;
            box-shadow: 0 6px 24px rgba(37, 54, 94, 0.04);
        }

        .pc-header .bumdes-header-brand {
            color: #27324a;
            font-size: 0.96rem;
            letter-spacing: 0.01em;
        }

        .pc-header .bumdes-brand-copy {
            line-height: 1.15;
        }

        .pc-header .bumdes-brand-subtitle {
            display: block;
            margin-top: 3px;
            color: #7d879b;
            font-size: 0.65rem;
            font-weight: 400;
            letter-spacing: 0;
        }

        .pc-header .bumdes-header-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 10px;
            border: 1px solid #e3eafa;
            border-radius: 99px;
            color: #53617b;
            background: #f3f6ff;
            font-size: 0.68rem;
            font-weight: 500;
        }

        .pc-header .bumdes-header-status::before {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #22b887;
            box-shadow: 0 0 0 3px rgba(34, 184, 135, 0.12);
            content: "";
        }

        .pc-header .bumdes-profile-copy {
            display: inline-flex;
            flex-direction: column;
            gap: 2px;
            margin-left: 8px;
            line-height: 1.15;
            text-align: left;
        }

        .pc-header .bumdes-profile-copy strong {
            color: #27324a;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .pc-header .bumdes-profile-copy small {
            color: #7d879b;
            font-size: 0.63rem;
        }

        .pc-header .pc-head-link {
            transition: color 0.18s ease, background-color 0.18s ease;
        }

        .pc-header .pc-head-link:hover {
            color: #5268d8;
        }

        @media (max-width: 575.98px) {
            .pc-header .bumdes-header-status,
            .pc-header .bumdes-brand-subtitle {
                display: none;
            }
        }
    </style>
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

    <!-- Header -->
    <header class="pc-header">
        <div class="header-wrapper d-flex justify-content-between align-items-center px-3">
            <div class="d-flex align-items-center">
                <ul class="list-unstyled d-flex mb-0">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide" onclick="event.preventDefault();">


                            <i class="ti ti-menu-2 fs-4"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup d-lg-none">
                        <a href="javascript:void(0)" class="pc-head-link ms-0" id="mobile-collapse">

                            <i class="ti ti-menu-2 fs-4"></i>
                        </a>
                    </li>
                </ul>

                <a href="<?= base_url('dashboard'); ?>" class="bumdes-header-brand d-flex align-items-center text-decoration-none ms-3">
                    <img src="<?= base_url('assets/images/logo_bumdes.png'); ?>" alt="Logo BUMDes" style="height:40px;">
                    <span class="bumdes-brand-copy ms-2 fw-bold text-dark">
                        Aplikasi BUMDes
                        <small class="bumdes-brand-subtitle">Sukses Mandiri · Desa Gelam Jaya</small>
                    </span>
                </a>
            </div>

            <ul class="list-unstyled d-flex mb-0">
                <li class="pc-h-item d-flex align-items-center me-2">
                    <span class="bumdes-header-status">Sistem aktif</span>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button">
                        <img src="<?= base_url('assets/images/user/avatar-2.jpg') ?>" alt="user-image" class="user-avtar">
                        <span class="bumdes-profile-copy">
                            <strong><?= $this->session->userdata('username') ?></strong>
                            <small><?= ucfirst($this->session->userdata('role')) ?></small>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0">
                                    <img src="<?= base_url('assets/images/user/avatar-2.jpg') ?>" alt="user-image" class="user-avtar wid-35">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><?= $this->session->userdata('username') ?></h6>
                                    <span><?= $this->session->userdata('role') ?></span>
                                </div>
                                <a href="<?= base_url('auth/logout') ?>" class="pc-head-link bg-transparent">
                                    <i class="ti ti-power text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- Header end -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById("sidebar-hide");

            if (toggle) {
                toggle.addEventListener("click", function(e) {
                    e.preventDefault();
                    document.body.classList.toggle("sidebar-collapsed");
                });
            }
        });
    </script>