    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="<?= base_url('dashboard'); ?>" class="b-brand text-primary">
                    <!-- Logo -->
                    <img src="<?= base_url('assets/images/Logo_BUMDes.png'); ?>" class="img-fluid logo-lg" alt="logo">
                </a>
            </div>

            <div class="navbar-content">
                <ul class="pc-navbar">
                    <!-- Dashboard Menu -->
                    <li class="pc-item">
                        <a href="<?= base_url('dashboard'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    <!-- UI Components Section -->
                    <li class="pc-item pc-caption">
                        <label>UI Components</label>
                        <i class="ti ti-dashboard"></i>
                    </li>
                    <li class="pc-item">
                        <a href="<?= base_url('elements/typography'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-typography"></i></span>
                            <span class="pc-mtext">Typography</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="<?= base_url('elements/color'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                            <span class="pc-mtext">Color</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="<?= base_url('elements/icons'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                            <span class="pc-mtext">Icons</span>
                        </a>
                    </li>

                    <!-- Pages Section -->
                    <li class="pc-item pc-caption">
                        <label>Pages</label>
                        <i class="ti ti-news"></i>
                    </li>
                    <li class="pc-item">
                        <a href="<?= base_url('auth/login'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-lock"></i></span>
                            <span class="pc-mtext">Login</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="<?= base_url('auth/register'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                            <span class="pc-mtext">Register</span>
                        </a>
                    </li>

                    <!-- New Users Menu Item -->
                    <li class="pc-item">
                        <a href="<?= base_url('dashboard/users'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-users"></i></span>
                            <span class="pc-mtext">Users</span>
                        </a>
                    </li>

                    <!-- Other Section -->
                    <li class="pc-item pc-caption">
                        <label>Other</label>
                        <i class="ti ti-brand-chrome"></i>
                    </li>

                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-menu"></i></span>
                            <span class="pc-mtext">Menu levels</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
                            <li class="pc-item pc-hasmenu">
                                <a href="#!" class="pc-link">
                                    Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                                </a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                    <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                                        </a>
                                        <ul class="pc-submenu">
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Sample Page -->
                    <li class="pc-item">
                        <a href="<?= base_url('other/sample-page'); ?>" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
                            <span class="pc-mtext">Sample page</span>
                        </a>
                    </li>
                </ul>

                <!-- Card Section -->
                <div class="card text-center">
                    <div class="card-body">
                        <img src="<?= base_url('assets/images/img-navbar-card.png'); ?>" alt="image" class="img-fluid mb-2">
                        <h5>Upgrade To Pro</h5>
                        <p>To get more features and components</p>
                        <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/" target="_blank"
                            class="btn btn-success">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>