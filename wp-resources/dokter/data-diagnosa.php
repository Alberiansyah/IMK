<?php
require __DIR__ . '/../../functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);

$idPasien = $_GET['idPasien'];

$queryDiagnosa = tampilData("SELECT * FROM tb_diagnosa INNER JOIN tb_users WHERE tb_users.idUser = tb_diagnosa.idPasien AND tb_users.idUser = '$idPasien'");
$countData = count($queryDiagnosa);
$i = 1;
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
                        <li class="breadcrumb-item active" aria-current="page">Data Diagnosa</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Data Diagnosa</h1>
            </div>

            <?php if (isset($_SESSION['berhasil'])) : ?>
                <?php if ($_SESSION['berhasil']['type'] === true) : ?>
                    <div class="alert" data-tambah="<?= $_SESSION['berhasil']['message'] ?>"></div>
                    <?php unset($_SESSION['berhasil']); ?>
                <?php elseif ($_SESSION['berhasil']['type'] === false) : ?>
                    <div class="alertGagal" data-tambah="<?= $_SESSION['berhasil']['message'] ?>"></div>
                    <?php unset($_SESSION['berhasil']); ?>
                <?php endif; ?>
            <?php endif; ?>

            <div id="reset">
                <div id="search">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card mt-n3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Email</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Diagnosa</th>
                                                    <th>Keluhan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($countData < 1) : ?>
                                                    <tr>
                                                        <td colspan="8" style="text-align: center;">Tidak terdapat data diagnosa, silahkan tambah terlebih dahulu.</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($queryDiagnosa as $row) : ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $row->nama ?></td>
                                                            <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                                            <td><?= $row->jk ?></td>
                                                            <td><?= $row->tglDiagnosa ?></td>
                                                            <td><?= $row->keluhan ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/../../layouts/footer.php'; ?>