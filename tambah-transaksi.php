<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

if ($_GET['idPasien'] === '') {
    header('Location: laporan');
    exit;
}

$idPasien = $_GET['idPasien'];
$idDiagnosa = $_GET['idDiagnosa'];

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$queryDokter = tampilData("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_level.namaLevel = 'DOKTER'");
$queryObat = tampilData("SELECT * FROM tb_obat");
$queryPasien = tampilDataFetchOnly("SELECT * FROM tb_users WHERE idUser = '$idPasien'");
$queryTransaksi = tampilDataFetchOnly("SELECT * FROM tb_users INNER JOIN tb_diagnosa ON tb_diagnosa.idPasien = tb_users.idUser WHERE tb_diagnosa.idDiagnosa = '$idDiagnosa'");
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
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= $hostToRoot ?>laporan">Data Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Transaksi</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Tambah Transaksi</h1>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card mt-n3">
                        <div class="card-body">
                            <form method="POST" action="<?= $hostToRoot ?>functions/tambah-transaksi">
                                <div class="form-group">
                                    <input type="hidden" name="idDiagnosa" value="<?= $queryTransaksi->idDiagnosa ?>">
                                    <input type="" name="idDokter" value="<?= $queryTransaksi->idDokter ?>">
                                    <input type="hidden" name="idPasien" value="<?= $queryTransaksi->idPasien ?>">
                                    <h3 class="text-center">Transaksi baru atas nama <span class="text-primary"><?= $queryPasien->nama ?></span></h3>
                                    <label for="tanggalDiagnosa" class="form-label"><b>Tanggal Diagnosa</b></label>
                                    <input type="text" class="form-control" name="tanggalDiagnosa" id="tanggalDiagnosa" value="<?= $queryTransaksi->tglDiagnosa ?>" readonly>
                                    <label for="keluhan" class="form-label"><b>Keluhan</b></label>
                                    <textarea name="keluhan" id="keluhan" class="form-control" readonly><?= $queryTransaksi->keluhan ?></textarea>
                                    <br>
                                    <br>
                                    <h4 class="text-center">List Obat</h4>
                                    <div class="row">
                                        <?php foreach ($queryObat as $row) : ?>
                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 m-3">
                                                <div class="input-group fileImage">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-info" id="dataObatList" data-idobat="<?= $row->idObat ?>" data-namaobat="<?= $row->namaObat ?>" data-hargaobat="<?= $row->hargaObat ?>"><i class="fa fa-plus"></i></i></button>
                                                    </div>
                                                    <span aria-describedby="inputGroupPrepend" class="p-2 bg-dark"><?= $row->namaObat ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <br>
                                    <label for="" class="form-label"><b>Obat yang dipiih</b></label>
                                    <div class="obatTerpilih">
                                    </div>
                                    <br>
                                    <label for="tanggalTransaksi" class="form-label"><b>Tanggal Transaksi</b></label>
                                    <input type="date" min="<?= date('Y-m-d') ?>" name="tanggalTransaksi" id="tanggalTransaksi" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                                <button type="button" name="resetObat" id="resetObat" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Reset List Obat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/layouts/footer.php'; ?>