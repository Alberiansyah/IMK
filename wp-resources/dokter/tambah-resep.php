<?php
require __DIR__ . '/../../functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$dataObat = tampilData("SELECT idObat, namaObat FROM tb_obat WHERE NOT EXISTS (SELECT idObat FROM tb_resep)");

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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Resep Obat</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Data Resep</h1>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card mt-n3">
                        <div class="card-body">
                            <form method="POST" action="<?= $hostToResources ?>dokter/functions/tambah-resep">
                                <div class="form-group">
                                    <label for="namaObat" class="form-label"><b>Nama Obat</b></label>
                                    <select name="idObat" id="namaObat" class="form-control">
                                        <option value="">- Pilih Obat -</option>
                                        <?php foreach ($dataObat as $row) : ?>
                                            <option value="<?= $row->idObat ?>"><?= $row->namaObat ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="resepInfo" class="form-label"><b>Resep Info</b></label>
                                    <textarea class="form-control" name="resepInfo" id="resepInfo" placeholder="Masukkan Resep Info" required></textarea>
                                    <label for="resepDosis" class="form-label"><b>Resep Dosis</b></label>
                                    <input type="text" class="form-control" name="resepDosis" id="resepDosis" placeholder="Masukkan Resep Dosis ..." required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/../../layouts/footer.php'; ?>