<?php
require __DIR__ . '/functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users WHERE idUser = ? ", [$idUserSesion]);
$queryAdmin = tampilData("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_level.idLevel = 2 AND tb_users.idUser != $userSesi->idUser");
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

            <?php if (isset($_SESSION['berhasil']) == 'Berhasil') : ?>
                <div class="flash" data-flash="flash"></div>
                <?php unset($_SESSION['berhasil']); ?>
            <?php else : ?>
                <div class="flash-failed" data-flashfailed=""></div>
                <!-- Do nothing -->
                <?php unset($_SESSION['berhasil']); ?>
            <?php endif; ?>

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
                                        <?php foreach ($queryAdmin as $row) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></td>
                                                <td><?= $row->jk ?></td>
                                                <td><?= $row->noTelp ?></td>
                                                <td><?= $row->alamat ?></td>
                                                <td>
                                                    <button class="btn btn-info button-indent"><a href="" class="text-white"><i class="fa fa-edit"></i> Ubah</a></button>
                                                    <button class="btn btn-danger button-indent" id="btnHapusAdmin" data-nama="<?= $row->nama ?>"><a href="<?= $hostToRoot ?>functions/hapus-admin?idUser=<?= $row->idUser ?>&&nama=<?= $row->nama ?>" id="hapusAdmin"><i class="fa fa-trash text-white"></i></a> Hapus</button>
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

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/layouts/footer.php'; ?>