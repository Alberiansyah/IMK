<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$queryDokter = tampilData("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_level.namaLevel = 'DOKTER'");
$countData = count($queryDokter);
$i = 1;
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
                        <li class="breadcrumb-item active" aria-current="page">Data Dokter</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Data Dokter</h1>
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

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><i class=""></i>
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                            </div>
                            <h5 class="card-title">Pencarian Dokter</h5>
                            <div class="row justify-content-center">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="search" name="cariDokter" id="cariDokter" class="form form-control md-0" placeholder="Cari Email Dokter ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="reset">
                <div id="search">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card mt-n3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="float-right">
                                            <a href="<?= $hostToRoot ?>tambah-dokter"><button class="btn btn-primary text-white" title="Tambah Dokter"><i class="fa fa-plus"></i></button></a>
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>No Telepon</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($countData < 1) : ?>
                                                    <tr>
                                                        <td colspan="8" style="text-align: center;">Tidak terdapat data dokter, silahkan tambah terlebih dahulu.</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($queryDokter as $row) : ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $row->nama ?></td>
                                                            <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                                            <td><?= $row->jk ?></td>
                                                            <td><?= $row->noTelp ?></td>
                                                            <td><?= $row->alamat ?></td>
                                                            <td>
                                                                <a href="<?= $hostToRoot ?>edit-data-dokter?idUser=<?= $row->idUser ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-edit"></i> Ubah</button></a>
                                                                <a href="<?= $hostToRoot ?>functions/hapus-dokter?idUser=<?= $row->idUser ?>" id="hapusDokter"><button class="btn btn-danger button-indent" id="btnHapusDokter" data-nama="<?= $row->nama ?>"><i class="fa fa-trash text-white"></i></a> Hapus</button>
                                                            </td>
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

        <?php require __DIR__ . '/layouts/footer.php'; ?>