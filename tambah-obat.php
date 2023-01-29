<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
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
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= $hostToRoot ?>data-obat">Data Obat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Obat</li>
                    </ol>
                </nav>
                <h1 class="page-title ml-3">Data Obat</h1>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card mt-n3">
                        <div class="card-body">
                            <form method="POST" action="<?= $hostToRoot ?>functions/tambah-obat">
                                <div class="form-group">
                                    <label for="namaObat" class="form-label"><b>Nama Obat</b></label>
                                    <input type="text" class="form-control" name="namaObat" id="namaObat" placeholder="Masukkan Nama Obat ..." required>
                                    <label for="stokObat" class="form-label"><b>Stok Obat</b></label>
                                    <input type="number" min="1" class="form-control" name="stokObat" id="stokObat" placeholder="Masukkan Stok Obat ..." required>
                                    <label for="Jenis Obat" class="form-label"><b>Jenis Obat</b></label>
                                    <input type="text" class="form-control" name="jenisObat" id="Jenis Obat" placeholder="Masukkan Jenis Obat ..." required>
                                    <label for="hargaObat" class="form-label"><b>Harga Obat</b></label>
                                    <input type="number" min="1" class="form-control" name="hargaObat" id="nama" placeholder="Masukkan Harga Obat ..." required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/layouts/footer.php'; ?>