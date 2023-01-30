<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$idDokter = $_GET['idUser'];
$tampilEditDokter = tampilDataFetchOnly("SELECT * FROM tb_users WHERE idUser = '$idDokter'");
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
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= $hostToRoot ?>data-dokter">Data Dokter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Dokter</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Edit Dokter</h1>
            </div>
        </div><!-- Main Wrapper -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card mt-n3">
                    <div class="card-body">
                        <form method="POST" action="<?= $hostToRoot ?>functions/edit-dokter">
                            <div class="form-group">
                                <input type="hidden" name="idUser" value="<?= $tampilEditDokter->idUser ?>">
                                <label for="nama" class="form-label"><b>Nama Dokter</b></label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Dokter ..." value="<?= $tampilEditDokter->nama ?>" required>
                                <label for="email" class="form-label"><b>Email</b></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email ..." value="<?= $tampilEditDokter->email ?>" required>
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control" name="password" id="nama" placeholder="Masukkan Password ..." required>
                                <label for="password1" class="form-label"><b>Konfirmasi Password</b></label>
                                <input type="password" class="form-control" name="password1" id="password1" placeholder="Konfirmasi Password ..." required>
                                <label for="noTelp" class="form-label"><b>Nomer Telepon</b></label>
                                <input type="text" class="form-control" name="noTelp" id="noTelp" placeholder="Masukkan Nomer Telepon ..." value="<?= $tampilEditDokter->noTelp ?>" required>
                                <label for="alamat" class="form-label"><b>Alamat</b></label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat ..."><?= $tampilEditDokter->alamat ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php require __DIR__ . '/layouts/footer.php'; ?>