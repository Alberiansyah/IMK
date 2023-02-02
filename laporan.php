<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$queryDiagnosaBelumSelesai = tampilData("SELECT * FROM tb_diagnosa INNER JOIN tb_users ON tb_users.idUser = tb_diagnosa.idPasien WHERE tb_diagnosa.keterangan = 'BELUM SELESAI'");
$queryDiagnosaSelesai = tampilData("SELECT * FROM tb_diagnosa INNER JOIN tb_users ON tb_users.idUser = tb_diagnosa.idPasien WHERE tb_diagnosa.keterangan = 'SELESAI'");
$countDataDiagnosaBelumSelesai = count($queryDiagnosaBelumSelesai);
$countDataDiagnosaSelesai = count($queryDiagnosaSelesai);
$no1 = 1;
$no2 = 1;
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
                        <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
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
                <div id="searchPasienTransaksi">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card mt-n3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="float-right">
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Diagnos</th>
                                                    <th>Keluhan</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($queryDiagnosaBelumSelesai as $row) : ?>
                                                    <tr>
                                                        <td><?= $no1++ ?></td>
                                                        <td><?= $row->nama ?></td>
                                                        <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                                        <td><?= $row->jk ?></td>
                                                        <td><?= $row->tglDiagnosa ?></td>
                                                        <td><?= $row->keluhan ?></td>
                                                        <td><?= $row->keterangan ?></td>
                                                        <td>
                                                            <a href="<?= $hostToRoot ?>tambah-transaksi?idPasien=<?= $row->idUser ?>&&idDiagnosa=<?= $row->idDiagnosa ?>"><button class="btn btn-primary button-indent"><i class="fa fa-plus fa-fw"></i> Transaksi Baru</button></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-header">
                <h1 class="page-title ml-3">Data Transaksi</h1>
            </div>

            <div id="reset">
                <div id="search">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card mt-n3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="float-right">
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Diagnosa</th>
                                                    <th>Keluhan</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($queryDiagnosaSelesai as $row) : ?>
                                                    <tr>
                                                        <td><?= $no2++ ?></td>
                                                        <td><?= $row->nama ?></td>
                                                        <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                                        <td><?= $row->jk ?></td>
                                                        <td><?= $row->tglDiagnosa ?></td>
                                                        <td><?= $row->keluhan ?></td>
                                                        <td><?= $row->keterangan ?></td>
                                                        <td>
                                                            <a href="<?= $hostToRoot ?>info-transaksi?idDiagnosa=<?= $row->idDiagnosa ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-info"></i> Info</button></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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

        <?php require __DIR__ . '/layouts/footer.php'; ?>