<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
$queryObat = tampilData("SELECT * FROM tb_obat");
$countData = count($queryObat);
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
                        <li class="breadcrumb-item active" aria-current="page">Data Obat</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Data Obat</h1>
            </div>

            <!-- Tambah Dokter -->
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
                            <h5 class="card-title">Pencarian Obat</h5>
                            <div class="row justify-content-center">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="search" name="cariObat" id="cariObat" class="form form-control md-0" placeholder="Cari Nama Obat ...">
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
                                            <a href="<?= $hostToRoot ?>tambah-obat"><button class="btn btn-primary text-white" title="Tambah Obat"><i class="fa fa-plus"></i></button></a>
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Obat</th>
                                                    <th>Stok Obat</th>
                                                    <th>Jenis Obat</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($countData < 1) : ?>
                                                    <tr>
                                                        <td colspan="6" style="text-align: center;">Tidak terdapat data obat, silahkan tambah terlebih dahulu.</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($queryObat as $row) : ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $row->namaObat ?></td>
                                                            <td><?= $row->stokObat ?></td>
                                                            <td><?= $row->jenisObat ?></td>
                                                            <td><?= $row->hargaObat ?></td>
                                                            <td>
                                                                <a href="<?= $hostToRoot ?>edit-data-obat?idObat=<?= $row->idObat ?>" class="text-white"><button class="btn btn-info button-indent" id="btnEditDokter"><i class="fa fa-edit"></i> Ubah</button></a>
                                                                <a href="<?= $hostToRoot ?>functions/hapus-obat?idObat=<?= $row->idObat ?>" id="hapusObat"><button class="btn btn-danger button-indent" id="btnHapusObat" data-nama="<?= $row->namaObat ?>"><i class="fa fa-trash text-white"></i></a> Hapus</button>
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