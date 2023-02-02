<?php
require __DIR__ . '/functions/functions.php';
if ($_SESSION['idLevel'] === '9lKih') {
    header("Location: wp-resources/dokter/home");
    exit;
}

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);

$queryDokter = tampilData("SELECT * FROM tb_users WHERE idLevel = '9lKih'");
$queryObat = tampilData("SELECT * FROM tb_obat");
$queryPasien = tampilData("SELECT * FROM tb_users WHERE idLevel = 'Vts7f'");

$totalDokter = count($queryDokter);
$totalObat = count($queryObat);
$totalPasien = count($queryPasien);

$queryDiagnosaSelesai = tampilData("SELECT * FROM tb_diagnosa INNER JOIN tb_users ON tb_users.idUser = tb_diagnosa.idPasien WHERE tb_diagnosa.keterangan = 'SELESAI'");
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
                <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav> -->
                <h1 class="page-title ml-3">Halaman Utama</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mt-n3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="ds-stat">
                                        <span class="ds-stat-name">Dokter</span>
                                        <h3 class="ds-stat-number"><?= $totalDokter ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ds-stat">
                                        <span class="ds-stat-name">Obat</span>
                                        <h3 class="ds-stat-number"><?= $totalObat ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ds-stat">
                                        <span class="ds-stat-name">Pasien</span>
                                        <h3 class="ds-stat-number"><?= $totalPasien ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-header">
                <h1 class="page-title ml-3">Transaksi Terakhir</h1>
            </div <div id="reset">
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
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                                    <td><?= $row->jk ?></td>
                                                    <td><?= $row->tglDiagnosa ?></td>
                                                    <td><?= $row->keluhan ?></td>
                                                    <td><?= $row->keterangan ?></td>
                                                    <td>
                                                        <a href="<?= $hostToRoot ?>info-transaksi?idDiagnosa=<?= $row->idDiagnosa ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-edit"></i> Info</button></a>
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