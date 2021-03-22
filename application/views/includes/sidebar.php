<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url() ?>/assets/images/logo-icon.png" alt="Logo" width="35" class="dark-logo" />
                </b>
                <span>
                    <img src="<?= base_url() ?>/assets/images/logo-text.png" alt="Website Name" width="205" class="dark-logo1" />
                </span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, Name Here<span class="hidden-md-down"> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <?php if ($this->session->userdata('user_details')[0]['user_type'] != "user") { ?>
                                <?php echo "<li><a href='" . base_url("user/profile") . "'></i> Profile </a></li>"; ?>
                            <?php } else { ?>
                                <?php echo "<li><a href='" . base_url("user/profile") . "'></i> Profile </a></li>"; ?>
                            <?php } ?>
                            <li><a href="<?= base_url("logout") ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">BRK Psychiatric Mental Health Services LLC</p>
    </div>
</div>

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <?php if ($this->session->userdata('user_details')[0]['user_type'] != "") { ?>
                <ul id="sidebarnav">
                    <li class="<?php if (!empty($pagename)) {
                                    echo "active";
                                } else {
                                    echo "not-active";
                                }  ?>">
                        <a class="waves-effect " href="<?= base_url("dashboard") ?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a>
                    <li> <a class="waves-effect " href="<?= base_url("") ?>" aria-expanded="false"><i class="icon-File"></i><span class="hide-menu">Sample Page 1</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("") ?>" aria-expanded="false"><i class="icon-File"></i><span class="hide-menu">Sample Page 2</span></a></li>
                    </li>
                </ul>
            <?php } else { ?>
                <ul id="sidebarnav">
                    <li class="<?php if (!empty($pagename)) {
                                    echo "active";
                                } else {
                                    echo "not-active";
                                }  ?>">
                        <a class="waves-effect " href="<?= base_url("dashboard") ?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a>
                    <li> <a class="waves-effect " href="<?= base_url("") ?>" aria-expanded="false"><i class="icon-File"></i><span class="hide-menu">Sample Page 1</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("") ?>" aria-expanded="false"><i class="icon-File"></i><span class="hide-menu">Sample Page 2</span></a></li>
                    </li>
                </ul>
            <?php } ?>
        </nav>
    </div>
</aside>