<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <?php
    $role_id = $this->session->userdata('role_id');
    if ($role_id == 1) {
        $url = 'Shipyard';
    } else if ($role_id == 2) {
        $url = 'AdminOwner';
    } else if ($role_id == 3) {
        $url = 'Superintendent';
    } else if ($role_id == 4) {
        $url = 'DockMon';
    } else if ($role_id == 5) {
        $url = 'ShipMan';
    } else if ($role_id == 6) {
        $url = 'ProjectLeader';
    } else if ($role_id == 7) {
        $url = 'Qcqa';
    } else if ($role_id == 8) {
        $url = 'WorkshopOfficer';
    } else if ($role_id == 9) {
        $url = 'Planning';
    } else if ($role_id == 0) {
        $url = 'SuperAdmin';
    } else {
        $url = 'Auth';
    }
    ?>

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="javascript:history.back()">Back</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <?php
                if ($user['image'] == NULL) {
                    $profile = 'default.jpg';
                } else {
                    $profile = $user['image'];
                }
                ?>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">

                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $profile; ?>">
                    </a>

                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php
                                                        if ($role_id == 0) {
                                                            echo '#';
                                                        } else {
                                                            echo base_url($url . '/profil');
                                                        } ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('Auth/logout'); ?>" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->