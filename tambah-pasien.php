<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$queryLevel = tampilDataFetchOnly("SELECT * FROM tb_level WHERE namaLevel = 'PASIEN'");
?>
<?php require __DIR__ . '/layouts/resources.php'; ?>

<body class="page-sidebar-fixed">


    <?php require __DIR__ . '/layouts/sidebar.php'; ?>
    <?php require __DIR__ . '/layouts/header.php'; ?>

    <!-- Page Inner -->
    <div class="page-inner no-page-title">
        <div id="main-wrapper">
            <div class="content-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= $hostToRoot ?>data-dokter">Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pasien</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Data Pasien</h1>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card mt-n3">
                        <div class="card-body">
                            <form method="POST" action="<?= $hostToRoot ?>functions/tambah-pasien">
                                <div class="form-group">
                                    <input type="hidden" name="idLevel" value="<?= $queryLevel->idLevel ?>">
                                    <label for="nama" class="form-label"><b>Nama Pasien</b></label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Pasien ..." required>
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email ..." required>
                                    <label for="username" class="form-label"><b>Username</b></label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username ..." required>
                                    <label for="password" class="form-label"><b>Password</b></label>
                                    <input type="password" class="form-control" name="password" id="nama" placeholder="Masukkan Password ..." required>
                                    <label for="password1" class="form-label"><b>Konfirmasi Password</b></label>
                                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Konfirmasi Password ..." required>
                                    <label for="password1" class="form-label"><b>Jenis Kelamin</b></label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="jk" class="custom-control-input" id="m" value="Laki-laki" required>
                                        <label class="custom-control-label" for="m">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="jk" class="custom-control-input" id="fm" value="Perempuan" required>
                                        <label class="custom-control-label" for="fm">
                                            Perempuan
                                        </label>
                                    </div>
                                    <label for="noTelp" class="form-label"><b>Nomer Telepon</b></label>
                                    <input type="text" class="form-control" name="noTelp" id="noTelp" placeholder="Masukkan Nomer Telepon ..." required>
                                    <label for="alamat" class="form-label"><b>Nomer Telepon</b></label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat ..."></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/layouts/footer.php'; ?>