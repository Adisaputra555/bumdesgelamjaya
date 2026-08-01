 <div class="card my-5 shadow-sm">
     <div class="card-body">
         <h3 class="mb-3 text-center text-dark">
             <i class="fas fa-users text-primary"></i> Login Dashboard
         </h3>

         <?php if ($this->session->flashdata('logout_message')) : ?>
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <?= $this->session->flashdata('logout_message') ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
         <?php endif; ?>

         <?php if ($this->session->flashdata('error')) : ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <?= $this->session->flashdata('error') ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
         <?php endif; ?>

         <?php if ($this->session->flashdata('message')) : ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <?= $this->session->flashdata('message') ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
         <?php endif; ?>

         <form method="post" action="<?= site_url('auth/login') ?>">
             <div class="form-group mb-3 mt-3">
                 <label for="username" class="form-label">Username</label>
                 <div class="input-group">
                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                     <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required>
                 </div>
             </div>

             <div class="form-group mb-3">
                 <label for="password" class="form-label">Password</label>
                 <div class="input-group">
                     <span class="input-group-text"><i class="fa fa-lock"></i></span>
                     <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                 </div>
             </div>

             <div class="d-grid mt-4">
                 <button type="submit" class="btn btn-primary">
                     <i class="fas fa-sign-in-alt me-1"></i> Login
                 </button>
             </div>
         </form>
     </div>
 </div>