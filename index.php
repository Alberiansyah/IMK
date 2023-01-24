<?php
require __DIR__ . '/koneksi/koneksi.php';
require __DIR__ . '/functions/has-login.php';

if (isset($_GET['destination'])) {
    $_SESSION['destination'] = $_GET['destination'];
}

?>
<?php require __DIR__ . '/layouts/resources.php'; ?>

<body>

    <!-- Page Container -->
    <div class="page-container">
        <div class="login">
            <div class="login-bg"></div>
            <div class="login-content">
                <div class="login-box">
                    <div class="login-header">
                        <h3>Login</h3>
                        <p>Selamat Datang kembali, silahkan login untuk melanjutkan</p>
                    </div>
                    <div class="login-body">
                        <form method="POST" action="<?= $hostToRoot ?>functions/login">
                            <div class="form-group">
                                <input type="text" name="usernameEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email/Nama Pengguna ..." required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Kata Sandi ..." required>
                            </div>
                            <div class="custom-control custom-checkbox form-group">
                                <input type="checkbox" class="custom-control-input" id="ingat">
                                <label class="custom-control-label" for="ingat">Ingat saya</label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                        <p class="m-t-sm"><a href="">Lupa Kata Sandi?</a><br><a href="<?= $hostToRoot ?>register">Buat Akun.</a></p>
                    </div>
                    <div class="login-footer">
                        <p><?= date('Y') ?> &copy; IMK | <?= $version ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /Page Container -->

    </div><!-- /Page Content -->
    </div><!-- /Page Container -->
    <!-- Javascripts -->
    <!-- Template JS -->
    <script src="<?= $hostToRoot ?>wp-content/template/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
    <script src="<?= $hostToRoot ?>wp-content/template/assets/plugins/bootstrap/popper.min.js"></script>
    <script src="<?= $hostToRoot ?>wp-content/template/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $hostToRoot ?>wp-content/template/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= $hostToRoot ?>wp-content/template/assets/plugins/switchery/switchery.min.js"></script>
    <script src="<?= $hostToRoot ?>wp-content/template/assets/js/concept.min.js"></script>
    <!-- JS -->
</body>

</html>