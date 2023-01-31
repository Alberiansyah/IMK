<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);

$idDiagnosa = $_GET['idDiagnosa'];

$tampilSemuaInfoHeader = tampilDataFetchOnly("SELECT * FROM tb_diagnosa INNER JOIN tb_transaksi ON tb_transaksi.idDiagnosa = tb_diagnosa.idDiagnosa INNER JOIN tb_obat ON tb_obat.idObat = tb_transaksi.idObat INNER JOIN tb_users ON tb_users.idUser = tb_diagnosa.idPasien");

$tampilSemuaInfo = tampilData("SELECT * FROM tb_diagnosa INNER JOIN tb_transaksi ON tb_transaksi.idDiagnosa = tb_diagnosa.idDiagnosa INNER JOIN tb_obat ON tb_obat.idObat = tb_transaksi.idObat INNER JOIN tb_users ON tb_users.idUser = tb_diagnosa.idPasien WHERE tb_diagnosa.idDiagnosa = '$idDiagnosa'");

$tampilTotal = tampilDataFetchOnly("SELECT SUM(hargaObat) as total FROM tb_transaksi WHERE idDiagnosa = '$idDiagnosa'");

$no = 1;
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
                        <li class="breadcrumb-item active" aria-current="page">Info Transaksi</li>
                    </ol>
                </nav>
                <h1 class="page-title"></h1>
            </div>
        </div><!-- Main Wrapper -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card mt-n3">
                    <div class="card-body">
                        <center>
                            <table class="  ">
                                <tr>
                                    <td>Id Diagnosa</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $tampilSemuaInfoHeader->idDiagnosa ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Id Transaksi</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $tampilSemuaInfoHeader->idTransaksi ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $tampilSemuaInfoHeader->nama ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Total Harga Obat</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="Rp. <?= number_format($tampilTotal->total, 0, ',', '.') ?>" readonly></td>
                                </tr>
                            </table>
                        </center>
                        <br>
                        <h2 class="text-center">Detail Info</h3>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Diagnosa</th>
                                        <th>Keluhan</th>
                                        <th>Nama Obat</th>
                                        <th>Harga Obat</th>
                                    </tr>
                                    <tbody>
                                        <?php foreach ($tampilSemuaInfo as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->jk ?></td>
                                                <td><?= $row->tglDiagnosa ?></td>
                                                <td><?= $row->keluhan ?></td>
                                                <td><?= $row->namaObat ?></td>
                                                <td><?= $row->hargaObat ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require __DIR__ . '/layouts/footer.php'; ?>