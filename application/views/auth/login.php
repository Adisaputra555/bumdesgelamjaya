<style>
    .auth-main .auth-wrapper.v3 {
        display: block;
        height: auto;
        min-height: 100vh;
        background: #f7f8ff;
    }

    .auth-main .auth-wrapper.v3 .auth-form {
        display: block;
        width: 100%;
        min-height: 100vh;
        padding: 14px clamp(16px, 2.5vw, 36px) 12px;
        background: #f7f8ff;
    }

    .auth-main .auth-wrapper.v3 .auth-form::after,
    .auth-main .auth-wrapper.v3 .auth-header,
    .auth-main .auth-wrapper.v3 .auth-footer {
        display: none;
    }

    .auth-main .auth-wrapper.v3 .auth-form > * {
        position: static;
    }

    .login-page {
        width: min(1320px, 100%);
        margin: 0 auto;
        color: #18213b;
        font-family: "Public Sans", sans-serif;
    }

    .login-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 38px;
        margin-bottom: 24px;
    }

    .login-brand {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: #24389e;
        text-decoration: none;
    }

    .login-brand-mark {
        position: relative;
        width: 30px;
        height: 30px;
        overflow: hidden;
        border-radius: 7px;
        background: #2820a8;
    }

    .login-brand-mark img {
        position: absolute;
        top: -1px;
        left: 50%;
        width: 44px;
        height: 44px;
        max-width: none;
        object-fit: cover;
        filter: brightness(0) invert(1);
        transform: translateX(-50%);
    }

    .login-brand-name {
        display: block;
        font-size: 0.88rem;
        font-weight: 650;
        line-height: 1.2;
    }

    .login-brand-subtitle {
        display: block;
        margin-top: 2px;
        color: #535b70;
        font-size: 0.62rem;
        font-weight: 400;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .login-portal-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #087c53;
        font-size: 0.72rem;
        font-weight: 550;
    }

    .login-main {
        display: grid;
        grid-template-columns: minmax(290px, 0.8fr) minmax(0, 1.15fr);
        align-items: center;
        gap: 22px;
        margin-bottom: 22px;
    }

    .login-intro {
        display: flex;
        min-height: 546px;
        flex-direction: column;
        padding: 28px;
        border-radius: 9px;
        color: #fff;
        background:
            radial-gradient(circle at 90% 8%, rgba(71, 88, 207, 0.5), transparent 34%),
            linear-gradient(145deg, #303f9f 0%, #2112a0 58%, #25149a 100%);
        box-shadow: 0 12px 26px rgba(37, 32, 132, 0.14);
    }

    .login-system-badge {
        display: inline-flex;
        align-self: flex-start;
        align-items: center;
        gap: 7px;
        padding: 6px 10px;
        margin-bottom: 26px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 99px;
        color: #f1f3ff;
        background: rgba(255, 255, 255, 0.13);
        font-size: 0.64rem;
    }

    .login-system-badge::before {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #65e4bf;
        box-shadow: 0 0 9px rgba(101, 228, 191, 0.75);
        content: "";
    }

    .login-intro-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        margin-bottom: 10px;
        border-radius: 10px;
        color: #fff;
        background: rgba(255, 255, 255, 0.16);
        font-size: 1.35rem;
    }

    .login-intro h1 {
        margin: 0 0 8px;
        color: #fff;
        font-size: clamp(1.35rem, 2vw, 1.65rem);
        font-weight: 650;
        letter-spacing: -0.035em;
    }

    .login-intro-lead {
        margin: 0 0 20px;
        color: rgba(239, 241, 255, 0.84);
        font-size: 0.76rem;
        line-height: 1.65;
    }

    .login-feature-list {
        display: grid;
        gap: 10px;
    }

    .login-feature {
        display: flex;
        gap: 10px;
        padding: 12px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 7px;
        background: rgba(255, 255, 255, 0.105);
    }

    .login-feature-icon {
        flex: 0 0 auto;
        margin-top: 1px;
        color: #67ebc8;
        font-size: 1rem;
    }

    .login-feature h2 {
        margin: 0 0 3px;
        color: #fff;
        font-size: 0.76rem;
        font-weight: 600;
    }

    .login-feature p {
        margin: 0;
        color: rgba(239, 241, 255, 0.76);
        font-size: 0.64rem;
        line-height: 1.5;
    }

    .login-security-score {
        padding: 13px;
        margin-top: auto;
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 7px;
        background: rgba(255, 255, 255, 0.12);
    }

    .login-security-score-title {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 5px;
        color: #f3f4ff;
        font-size: 0.69rem;
        font-weight: 600;
    }

    .login-security-score p {
        margin: 0;
        color: rgba(239, 241, 255, 0.76);
        font-size: 0.63rem;
        line-height: 1.5;
    }

    .login-card {
        width: 100%;
        padding: clamp(24px, 4vw, 34px);
        border: 1px solid #eef0f7;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(29, 39, 72, 0.08);
    }

    .login-card-eyebrow {
        margin-bottom: 7px;
        color: #087c53;
        font-size: 0.66rem;
        font-weight: 700;
        letter-spacing: 0.09em;
        text-transform: uppercase;
    }

    .login-card h2 {
        margin: 0 0 6px;
        color: #18213b;
        font-size: 1.25rem;
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    .login-card-description {
        margin: 0 0 20px;
        color: #667085;
        font-size: 0.74rem;
        line-height: 1.55;
    }

    .login-credential-note {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 12px;
        margin-bottom: 18px;
        border: 1px solid #e7edff;
        border-radius: 7px;
        background: #f0f4ff;
    }

    .login-credential-note > i {
        color: #2820a8;
        font-size: 1rem;
    }

    .login-credential-note strong {
        display: block;
        color: #202944;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .login-credential-note small {
        display: block;
        margin-top: 2px;
        color: #667085;
        font-size: 0.62rem;
    }

    .login-alert {
        padding: 9px 11px;
        margin-bottom: 14px;
        border-radius: 6px;
        font-size: 0.72rem;
    }

    .login-field {
        margin-bottom: 14px;
    }

    .login-field label {
        display: block;
        margin-bottom: 6px;
        color: #252d42;
        font-size: 0.7rem;
        font-weight: 550;
    }

    .login-input-wrap {
        display: flex;
        align-items: center;
        min-height: 42px;
        padding: 0 11px;
        border: 1px solid #e8ebf2;
        border-radius: 7px;
        background: #fff;
        transition: border-color 0.18s ease, box-shadow 0.18s ease;
    }

    .login-input-wrap:focus-within {
        border-color: #7772df;
        box-shadow: 0 0 0 3px rgba(82, 72, 194, 0.1);
    }

    .login-input-wrap > i {
        flex: 0 0 auto;
        color: #38425b;
        font-size: 0.95rem;
    }

    .login-input-wrap input {
        width: 100%;
        min-width: 0;
        height: 40px;
        padding: 0 9px;
        border: 0;
        outline: 0;
        color: #18213b;
        background: transparent;
        font: inherit;
        font-size: 0.73rem;
        box-shadow: none;
    }

    .login-input-wrap input::placeholder {
        color: #8a91a3;
    }

    .login-password-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border: 0;
        color: #59627a;
        background: transparent;
        cursor: pointer;
    }

    .login-submit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        min-height: 43px;
        margin-top: 18px;
        border: 0;
        border-radius: 7px;
        color: #fff;
        background: #25139d;
        font-size: 0.78rem;
        font-weight: 600;
        transition: background-color 0.18s ease, transform 0.18s ease;
    }

    .login-submit:hover {
        color: #fff;
        background: #1d0f82;
        transform: translateY(-1px);
    }

    .login-security-note {
        display: flex;
        gap: 10px;
        padding: 12px;
        margin-top: 20px;
        border-radius: 7px;
        color: #25304a;
        background: #f0f4ff;
    }

    .login-security-note > i {
        flex: 0 0 auto;
        margin-top: 1px;
        color: #087c53;
        font-size: 1rem;
    }

    .login-security-note strong {
        display: block;
        margin-bottom: 3px;
        font-size: 0.68rem;
        font-weight: 600;
    }

    .login-security-note p {
        margin: 0;
        color: #667085;
        font-size: 0.63rem;
        line-height: 1.5;
    }

    .login-help-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 32px;
    }

    .login-help-card {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 56px;
        padding: 10px 12px;
        border: 1px solid #edf0f7;
        border-radius: 7px;
        background: #fff;
    }

    .login-help-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border-radius: 7px;
        color: #3026ad;
        background: #eaf0ff;
    }

    .login-help-card strong {
        display: block;
        color: #202944;
        font-size: 0.65rem;
        font-weight: 600;
    }

    .login-help-card small {
        display: block;
        margin-top: 2px;
        color: #697287;
        font-size: 0.59rem;
        line-height: 1.4;
    }

    .login-page-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        color: #697287;
        font-size: 0.58rem;
    }

    @media (max-width: 900px) {
        .login-main {
            grid-template-columns: minmax(250px, 0.75fr) minmax(0, 1.25fr);
            gap: 14px;
        }

        .login-intro {
            min-height: 520px;
            padding: 22px;
        }
    }

    @media (max-width: 700px) {
        .auth-main .auth-wrapper.v3 .auth-form {
            padding: 12px 14px;
        }

        .login-topbar {
            margin-bottom: 16px;
        }

        .login-main {
            grid-template-columns: minmax(0, 1fr);
        }

        .login-intro {
            min-height: auto;
            padding: 22px;
        }

        .login-system-badge {
            margin-bottom: 16px;
        }

        .login-security-score {
            margin-top: 14px;
        }

        .login-card {
            padding: 22px;
        }

        .login-help-grid {
            grid-template-columns: minmax(0, 1fr);
            gap: 8px;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 420px) {
        .login-portal-label {
            font-size: 0;
        }

        .login-portal-label i {
            font-size: 0.9rem;
        }

        .login-intro h1 {
            font-size: 1.35rem;
        }

        .login-page-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="login-page">
    <header class="login-topbar">
        <a class="login-brand" href="<?= base_url('auth') ?>">
            <span class="login-brand-mark">
                <img src="<?= base_url('assets/images/Logo_BUMDes.png') ?>" alt="">
            </span>
            <span>
                <strong class="login-brand-name">BUMDes Sukses Mandiri</strong>
                <small class="login-brand-subtitle">Pemerintah Desa Gelam Jaya</small>
            </span>
        </a>
        <span class="login-portal-label"><i class="ti ti-shield-check"></i> Portal Keuangan Terpadu</span>
    </header>

    <main class="login-main">
        <section class="login-intro">
            <div class="login-system-badge">Portal resmi BUMDes Gelam Jaya</div>
            <div class="login-intro-icon"><i class="ti ti-building-community"></i></div>
            <h1>BUMDes Sukses Mandiri</h1>
            <p class="login-intro-lead">Sistem tata kelola finansial dan operasional usaha Desa Gelam Jaya yang transparan dan mudah digunakan.</p>

            <div class="login-feature-list">
                <article class="login-feature">
                    <i class="login-feature-icon ti ti-shield-check"></i>
                    <div>
                        <h2>Transparan &amp; Akuntabel</h2>
                        <p>Pencatatan pemasukan, pengeluaran, dan saldo dalam satu sistem.</p>
                    </div>
                </article>
                <article class="login-feature">
                    <i class="login-feature-icon ti ti-users"></i>
                    <div>
                        <h2>Data Anggota &amp; Unit Usaha</h2>
                        <p>Kelola data anggota, usaha, pinjaman, serta angsuran.</p>
                    </div>
                </article>
                <article class="login-feature">
                    <i class="login-feature-icon ti ti-chart-line"></i>
                    <div>
                        <h2>Laporan Keuangan</h2>
                        <p>Pantau arus keuangan dan perkembangan pembayaran.</p>
                    </div>
                </article>
            </div>

            <div class="login-security-score">
                <div class="login-security-score-title"><i class="ti ti-lock"></i> Akses khusus pengelola terdaftar</div>
                <p>Gunakan akun yang diberikan administrator dan jaga kerahasiaan kata sandi Anda.</p>
            </div>
        </section>

        <section class="login-card" aria-labelledby="login-title">
            <div class="login-card-eyebrow">Otoritas Akses BUMDes</div>
            <h2 id="login-title">Masuk ke Akun Anda</h2>
            <p class="login-card-description">Silakan masukkan username dan kata sandi akun pengelola BUMDes Gelam Jaya.</p>

            <div class="login-credential-note">
                <i class="ti ti-user"></i>
                <div>
                    <strong>Kredensial Pengelola</strong>
                    <small>Gunakan akun yang telah terdaftar pada sistem.</small>
                </div>
            </div>

            <?php if ($this->session->flashdata('logout_message')) : ?>
                <div class="alert alert-success alert-dismissible fade show login-alert" role="alert">
                    <?= html_escape($this->session->flashdata('logout_message')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show login-alert" role="alert">
                    <?= html_escape($this->session->flashdata('error')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-warning alert-dismissible fade show login-alert" role="alert">
                    <?= html_escape($this->session->flashdata('message')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('auth/login') ?>">
                <div class="login-field">
                    <label for="username">Nama Pengguna</label>
                    <div class="login-input-wrap">
                        <i class="ti ti-user"></i>
                        <input type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="username" required>
                    </div>
                </div>

                <div class="login-field">
                    <label for="password">Kata Sandi</label>
                    <div class="login-input-wrap">
                        <i class="ti ti-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                        <button class="login-password-toggle" type="button" aria-label="Tampilkan kata sandi" aria-pressed="false">
                            <i class="ti ti-eye"></i>
                        </button>
                    </div>
                </div>

                <button class="login-submit" type="submit">
                    <span>Masuk ke Aplikasi BUMDes</span><i class="ti ti-login"></i>
                </button>
            </form>

            <div class="login-security-note">
                <i class="ti ti-shield-check"></i>
                <div>
                    <strong>Protokol Keamanan Lembaga Desa</strong>
                    <p>Akses hanya diberikan kepada pengelola yang berwenang. Jangan bagikan username atau kata sandi Anda.</p>
                </div>
            </div>
        </section>
    </main>

    <section class="login-help-grid" aria-label="Informasi bantuan">
        <div class="login-help-card">
            <span class="login-help-icon"><i class="ti ti-headset"></i></span>
            <span><strong>Layanan Bantuan Pengelola</strong><small>Hubungi administrator BUMDes jika akses bermasalah.</small></span>
        </div>
        <div class="login-help-card">
            <span class="login-help-icon"><i class="ti ti-book"></i></span>
            <span><strong>Panduan Aplikasi</strong><small>Gunakan akun yang diberikan oleh administrator.</small></span>
        </div>
        <div class="login-help-card">
            <span class="login-help-icon"><i class="ti ti-building"></i></span>
            <span><strong>Kantor BUMDes Gelam Jaya</strong><small>Pemerintah Desa Gelam Jaya.</small></span>
        </div>
    </section>

    <footer class="login-page-footer">
        <span>© <?= date('Y') ?> BUMDes Sukses Mandiri · Pemerintah Desa Gelam Jaya</span>
        <span>Portal Keuangan Terpadu · Akses Pengelola</span>
    </footer>
</div>

<script>
    (function() {
        const toggle = document.querySelector('.login-password-toggle');
        const password = document.getElementById('password');

        if (!toggle || !password) {
            return;
        }

        toggle.addEventListener('click', function() {
            const showPassword = password.type === 'password';
            password.type = showPassword ? 'text' : 'password';
            toggle.setAttribute('aria-pressed', showPassword ? 'true' : 'false');
            toggle.setAttribute('aria-label', showPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
            toggle.innerHTML = showPassword ? '<i class="ti ti-eye-off"></i>' : '<i class="ti ti-eye"></i>';
        });
    })();
</script>
