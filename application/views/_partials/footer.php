<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm my-1">
                <p class="m-0">BUMDes &#9829; Sukses Mandiri</p>
            </div>
            <div class="col-sm my-1">
                <p class="m-0">Powered By Desa Gelam Jaya</p>
            </div>
            <div class="col-auto my-1">
                <ul class="list-inline footer-link mb-0">
                    <li class="list-inline-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Required Scripts -->
<script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js') ?>"></script>

<!-- Optional Charts or Page Specific -->
<script src="<?= base_url('assets/js/plugins/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/dashboard-default.js') ?>"></script>

<!-- Layout Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const body = document.body;
        const desktopToggle = document.getElementById("sidebar-hide");
        const mobileToggle = document.getElementById("mobile-collapse");

        function toggleSidebar(e) {
            e.preventDefault();
            body.classList.toggle("sidebar-collapsed");
        }

        if (desktopToggle) desktopToggle.addEventListener("click", toggleSidebar);
        if (mobileToggle) mobileToggle.addEventListener("click", toggleSidebar);
    });
</script>
</body>

</html>