<!-- Page Container -->
<div class="page-container">
    <!-- Page Sidebar -->
    <div class="page-sidebar">
        <div class="page-sidebar-inner">
            <div class="page-sidebar-menu">
                <ul>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Dashboard"><i class="menu-icon icon-home"></i></a>
                    </li>
                    <!-- <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="News"><i class="fas fa-globe-africa"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Inbox"><i class="fas fa-inbox"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Chat"><i class="far fa-comments"></i></a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="sign-out">
            <a href="<?= $hostToRoot ?>logout" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
    <div class="settings-overlay"></div>
    <!-- Page Content -->
    <div class="page-content">
        <div class="secondary-sidebar">
            <div class="secondary-sidebar-bar">
                <a href="#" class="logo-box">IMK</a>
            </div>
            <div class="secondary-sidebar-menu">
                <ul class="accordion-menu">
                    <li id="dashboard">
                        <a href="<?= $hostToRoot ?>index">
                            <i class="fa fa-home fa-fw"></i><span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li id="data-dokter">
                        <a href="data-dokter" id="dataDokter">
                            <i class="fa fa-stethoscope fa-fw"></i><span class="ml-3">Data Dokter</span>
                        </a>
                    </li>
                    <li id="data-obat">
                        <a href="data-obat" id="dataObat">
                            <i class="fa fa-capsules fa-fw"></i><span class="ml-3">Data Obat</span>
                        </a>
                    </li>
                    <li id="data-pasien">
                        <a href="data-pasien" id="dataPasien">
                            <i class="fa fa-users fa-fw"></i><span class="ml-3">Data Pasien</span>
                        </a>
                    </li>
                    <li id="data-resep">
                        <a href="data-resep" id="dataResep">
                            <i class="fas fa-receipt fa-fw"></i><span class="ml-3">Data Resep</span>
                        </a>
                    </li>
                    <li id="laporan">
                        <a href="<?= $hostToRoot ?>laporan">
                            <i class="fa fa-print fa-fw"></i><span class="ml-3">Laporan</span>
                        </a>
                    </li>
                    <li class="menu-divider"></li>
                    <li id="role" style="position: fixed; bottom: 0;" class="mb-3">
                        <a href="#">
                            <i class="fa fa-user-check fa-fw text-primary"></i><span class="ml-3 text-primary">Halo, <?= $userSesi->namaLevel ?></span>
                        </a>
                    </li>
                </ul>
                <h3 class="bottom-align-text ml-4 mb-4"></h3>
            </div>
        </div>