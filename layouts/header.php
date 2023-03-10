<!-- Page Header -->
<div class="page-header">
    <div class="search-form">
        <form action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Ketik sesuatu...">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                </span>
            </div>
        </form>
    </div>
    <nav class="navbar navbar-default navbar-expand-md">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="logo-sm">
                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>
                    <a class="logo-box" href="index.html"><span>concept</span></a>
                </div>
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <i class="fas fa-angle-down"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse justify-content-between" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fas fa-bars"></i></a></li>
                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fas fa-expand"></i></a></li>
                    <!-- <li><a href="javascript:void(0)" id="search-button"><i class="fas fa-search"></i></a></li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
            <ul class="nav navbar-nav">
                <li class="dropdown nav-item d-md-block">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?= $hostToRoot ?>/wp-content/assets/u-images/default.png" alt="" class="rounded-circle"></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <li><a href="<?= $hostToRoot ?>logout">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.container-fluid -->
    </nav>
</div><!-- /Page Header -->