<?php
require __DIR__ . '/koneksi/koneksi.php';
require __DIR__ . '/functions/session-check.php';
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
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
                <h1 class="page-title"></h1>
            </div>
        </div><!-- Main Wrapper -->

        <?php require __DIR__ . '/layouts/footer.php'; ?>