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
            width: 250px;
            transition: all 0.3s ease-in-out;
        }

        .pc-sidebar .navbar-content {
            flex: 1;
            overflow-y: scroll;
            /* pastikan pakai scroll */
            padding-right: 10px;
            /* tambahkan space buat scrollbar */
            margin-right: -10px;
            /* supaya gak ngedorong konten */
            padding-bottom: 80px;
            /* jaga agar item bawah gak ketimpa */
        }

        .pc-sidebar .m-header img.logo-lg {
            height: 40px;
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

                <a href="<?= base_url('dashboard'); ?>" class="d-flex align-items-center text-decoration-none ms-3">
                    <img src="<?= base_url('assets/images/logo_bumdes.png'); ?>" alt="Logo BUMDes" style="height:40px;">
                    <span class="ms-2 fw-bold text-dark">Aplikasi BUMDes</span>
                </a>
            </div>

            <ul class="list-unstyled d-flex mb-0">
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button">
                        <img src="<?= base_url('assets/images/user/avatar-2.jpg') ?>" alt="user-image" class="user-avtar">
                        <span><?= $this->session->userdata('username') ?></span>
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