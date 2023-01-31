<?php
require __DIR__ . '/../../functions/functions.php';
require __DIR__ . '/functions/session-check.php';

$idUserSesion =  $_SESSION['idUser'];
$userSesi = tampilUserArray("SELECT * FROM tb_users INNER JOIN tb_level WHERE tb_level.idLevel = tb_users.idLevel AND tb_users.idUser = ?", [$idUserSesion]);
?>
<?php require __DIR__ . '/../../layouts/resources.php'; ?>

<body class="page-sidebar-fixed">


    <?php require __DIR__ . '/layouts/sidebar.php'; ?>
    <?php require __DIR__ . '/../../layouts/header.php'; ?>

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
                <?php foreach ($query as $row) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12">
                        <div class="card">
                            <a href="<?= $hostToResources . $row->url ?>">
                                <?php if ($row->showcase == '') : ?>
                                    <img src="<?= $hostToRoot ?>wp-content/img/projek-images/default.png" class="card-img-top " alt="<?= $row->namaProjek ?>" title="<?= $row->namaProjek ?>">
                                <?php else : ?>
                                    <img src="<?= $hostToRoot ?>wp-content/img/projek-images/<?= $row->showcase ?>" class="card-img-top" alt="<?= $row->namaProjek ?>" title="<?= $row->namaProjek ?>">
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <b>
                                    <h1 class="card-title text-center"><?= $row->namaProjek ?></h1>
                                </b>
                                <p class="card-text">
                                    <?= $row->deskripsi ?>
                                </p>
                                <div class="text-center">
                                    <a href="<?= $hostToResources . $row->url ?>" class="btn btn-outline-success">Menuju ke Aplikasi</a>
                                    <a href="<?= $row->gitHubUrl ?>" target="_blank"><button class="btn btn-primary"><i class="fa fa-star" style="color:yellow"></i> Star</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/../../layouts/footer.php'; ?>