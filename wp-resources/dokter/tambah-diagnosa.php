<?php
require __DIR__ . '/../../functions/functions.php';
require __DIR__ . '/functions/session-check.php';

if ($_GET['idPasien'] === '') {
    header('Location: laporan');
    exit;
}

$idPasien = $_GET['idPasien'];

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$queryDokter = tampilData("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_level.namaLevel = 'DOKTER'");
$queryObat = tampilData("SELECT * FROM tb_obat");
$queryPasien = tampilDataFetchOnly("SELECT * FROM tb_users WHERE idUser = '$idPasien'")
?>
<?php require __DIR__ . '/../../layouts/resources.php'; ?>

<body class="page-sidebar-fixed">


    <?php require __DIR__ . '/layouts/sidebar.php'; ?>
    <?php require __DIR__ . '/../../layouts/header.php'; ?>

    <!-- Page Inner -->
    <div class="page-inner no-page-title">
        <div id="main-wrapper">
            <div class="content-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= $hostToResources ?>dokter/data-pasien">Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Diagnosa</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Tambah Diagnosa</h1>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card mt-n3">
                        <div class="card-body">
                            <form method="POST" action="<?= $hostToResources ?>dokter/functions/tambah-diagnosa">
                                <div class="form-group">
                                    <input type="hidden" name="idDokter" value="<?= $userSesi->idUser ?>">
                                    <input type="hidden" name="idPasien" value="<?= $queryPasien->idUser ?>">
                                    <h3 class="text-center">Diagnosa baru atas nama <span class="text-primary"><?= $queryPasien->nama ?></span></h3>
                                    <label for="tglDiagnosa" class="form-label"><b>Tanggal Diagnosa</b></label>
                                    <input type="date" min="<?= date('Y-m-d') ?>" class="form-control" name="tglDiagnosa" id="tglDiagnosa" placeholder="Masukkan tanggalDiagnosa Dokter ..." required>
                                    <label for="keluhan" class="form-label"><b>Keluhan</b></label>
                                    <textarea name="keluhan" id="keluhan" class="form-control" placeholder="Masukkan keluhan ..."></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/../../layouts/footer.php'; ?>