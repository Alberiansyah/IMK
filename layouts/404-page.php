<?php require_once __DIR__ . '/../koneksi/koneksi.php' ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="ReD,Projects,Renamer,Bookmark">
    <meta name="author" content="ReD">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $title ?></title>

    <!-- Styles -->
    <link href="<?= $hostToRoot ?>wp-content/icons/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= $hostToRoot ?>wp-content/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $hostToRoot ?>wp-content/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="<?= $hostToRoot ?>wp-content/assets/plugins/icomoon/style.css" rel="stylesheet">
    <link href="<?= $hostToRoot ?>wp-content/assets/plugins/switchery/switchery.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="<?= $hostToRoot ?>wp-content/assets/css/concept.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<!-- Page Container -->
<div class="page-container">
    <div class="error-404">
        <div class="error-bg"></div>
        <div class="error-info">
            <div class="error-text">
                <div class="error-header">
                    <h3>404</h3>
                </div>
                <div class="error-body">
                    <p>Halaman yang anda cari tidak ditemukan.<br>Klik <a href="<?= $hostToRoot ?>"> disini</a> untuk kembali.
                </div>
                <div class="error-footer">
                    <p><?= date('Y') ?> &copy; ReD | Projects <?= $version ?></p>
                </div>
            </div>
        </div>
    </div>
</div><!-- /Page Container -->