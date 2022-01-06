        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    if ($role_id == 0) {
                        echo 'Super-Admin';
                    } else if ($role_id == 1) {
                        echo 'Shipyard';
                    } else if ($role_id == 2) {
                        echo 'Ship Owner';
                    } else if ($role_id == 3) {
                        echo 'Ship Owner';
                    } else if ($role_id == 4) {
                        echo 'Ship Owner';
                    } else if ($role_id == 5) {
                        echo 'Ship Owner';
                    } else if ($role_id == 6) {
                        echo 'Shipyard';
                    } else if ($role_id == 7) {
                        echo 'Shipyard';
                    } else if ($role_id == 8) {
                        echo 'Shipyard';
                    } else if ($role_id == 9) {
                        echo 'Shipyard';
                    } else {
                        echo 'Ship Owner';
                    }
                    ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT user_menu.id, menu, nama
                            FROM user_menu JOIN user_access_menu
                            ON user_menu.id = user_access_menu.menu_id
                            WHERE user_access_menu.role_id = $role_id 
                            ORDER BY user_access_menu.menu_id ASC
                            ";
            $menu = $this->db->query($queryMenu)->result_array();

            ?>

            <?php foreach ($menu as $m) : ?>
                <div class="sidebar-heading">
                    <?= $m['nama']; ?>
                </div>

                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                            FROM user_sub_menu JOIN user_menu
                            ON user_sub_menu.menu_id = user_menu.id
                            WHERE user_sub_menu.menu_id = $menuId
                            AND user_sub_menu.is_active = 1";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link pb-0" href="<?= base_url($sm['url']) ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>

                    <hr class="sidebar-divider mt-3">
                <?php endforeach; ?>

                <?php foreach ($menu as $m) :
                    $url = $m['menu'];
                    break;
                endforeach;
                ?>

                <?php
                if ($title == 'Ongoing Project') {
                    echo '<li class="nav-item active">';
                } else {
                    echo '<li class="nav-item">';
                }
                ?>
                <?php
                if ($role_id == 0 || $role_id == 1 || $role_id == 2 || $role_id == 4 || $role_id == 9) {
                    echo '';
                } else {
                    echo '
                        <a class="nav-link" href=' . base_url($url) . '/ongoing>
                            <i class=" fas fa-fw fa-spinner"></i>
                            <span>Ongoing Project</span>
                        </a>
                        </li>
                        ';
                }
                ?>



                <li class="nav-item">
                    <a class="nav-link pt-0" href="<?= base_url('Auth/logout'); ?>">
                        <i class=" fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->