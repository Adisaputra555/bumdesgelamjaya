<div class="card my-5">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="mb-0"><b>Sign up</b></h3>
            <a href="<?= site_url('auth') ?>" class="link-primary">Already have an account?</a>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-warning">
                <?= $this->session->flashdata('message') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('auth/register') ?>">
            <div class="form-group mb-3">
                <label class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email Address" required>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            </div>
            <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">Create Account</button>
            </div>
        </form>
    </div>
</div>