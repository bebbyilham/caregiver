<!-- Query Menu -->
<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu` 
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id
              ORDER BY `user_access_menu`.`menu_id` ASC
                ";
$menu = $this->db->query($queryMenu)->result_array();
?>
<!-- End query Menu -->

<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand mt-2" href="<?= base_url('auth'); ?>">
                <div class="row ml-4">
                    <!-- <img src="<?= base_url(); ?>assets/img/logo.png" class="navbar-brand-img" alt="..."> -->
                    <h3 class="text-primary">HEBRINGS</strong></h3>
                </div>
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <hr>


        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Nav items -->
                <?php foreach ($menu as $m) : ?>
                    <ul class="navbar-nav">

                        <li class="nav-item active">
                            <a class="nav-link " href="#navbar-<?php echo $m['id']; ?>" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-<?php echo $m['id']; ?>">
                                <!-- <i class="<?php echo $m['icon']; ?>"></i> -->
                                <i class="far fa-circle text-primary"></i>
                                <span class="nav-link-text"><b><?= $m['menu']; ?></b></span>
                            </a>

                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT *
                                                FROM `user_sub_menu` 
                                                WHERE `menu_id` = $menuId
                                                AND `is_active` = 1
                                                ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>

                            <div class="collapse show" id="navbar-<?php echo $m['id']; ?>">
                                <?php foreach ($subMenu as $sm) : ?>
                                    <ul class="nav nav-sm flex-column">
                                        <?php if ($title == $sm['title']) : ?>
                                            <li class="nav-item active">
                                            <?php else : ?>
                                            <li class="nav-item ">
                                            <?php endif; ?>

                                            <a class="nav-link " href="<?= base_url($sm['url']); ?>">
                                                <i class="text-primary <?php echo $sm['icon']; ?>"></i>
                                                <b><?= $sm['title']; ?></b>
                                            </a>
                                            </li>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                            <hr class="my-2">
                        </li>
                    </ul>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
</nav>