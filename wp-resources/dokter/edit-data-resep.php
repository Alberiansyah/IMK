<?php
require __DIR__ . '/../../functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$idResep = $_GET['idResep'];
$tampilEditResep = tampilDataFetchOnly("SELECT * FROM tb_resep INNER JOIN tb_obat WHERE tb_obat.idObat = tb_resep.idObat AND tb_resep.idResep = '$idResep'");
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
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= $hostToResources ?>dokter/data-resep">Data Resep</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Resep</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Edit Resep</h1>
            </div>
        </div><!-- Main Wrapper -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card mt-n3">
                    <div class="card-body">
                        <form method="POST" action="<?= $hostToResources ?>dokter/functions/edit-resep">
                            <div class="form-group">
                                <input type="hidden" name="idResep" value="<?= $tampilEditResep->idResep ?>">
                                <label for="namaObat" class="form-label"><b>Nama Obat</b></label>
                                <input type="text" class="form-control" value="<?= $tampilEditResep->namaObat ?>" placeholder="Masukkan Nama Obat ..." required disabled>
                                <label for="resepInfo" class="form-label"><b>Resep Info</b></label>
                                <textarea class="form-control" name="resepInfo" id="resepInfo" placeholder=" Masukkan Resep Info ..." required><?= $tampilEditResep->resepInfo ?></textarea>
                                <label for="resepDosis" class="form-label"><b>Resep Dosis</b></label>
                                <textarea class="form-control" name="resepDosis" id="resepDosis" placeholder="Masukkan Resep Dosis ..." required><?= $tampilEditResep->resepDosis ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php require __DIR__ . '/../../layouts/footer.php'; ?>