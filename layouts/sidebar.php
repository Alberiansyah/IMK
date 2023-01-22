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
    <!-- Page Content -->
    <div class="page-content">
        <div class="secondary-sidebar">
            <div class="secondary-sidebar-bar">
                <a href="#" class="logo-box">IMK</a>
            </div>
            <div class="secondary-sidebar-menu">
                <ul class="accordion-menu">
                    <li>
                        <a href="<?= $hostToRoot ?>index">
                            <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li id="data">
                        <a href="javascript:void(0)" id="trigger">
                            <i class="icon-database icon-custom"></i><span class="">Data</span><i class="accordion-icon fas fa-angle-left"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class=""><a href="data-dokter" id="dataDokter">Data Dokter</a></li>
                            <li class=""><a href="data-obat" id="dataObat">Data Obat</a></li>
                            <li class=""><a href="data-dokter" id="dataResep">Data Dokter</a></li>
                            <li class=""><a href="data-pasien" id="dataPasien">Data Pasien</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= $hostToRoot ?>laporan">
                            <i class="icon-printe icon-custom"></i><span>Laporan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>