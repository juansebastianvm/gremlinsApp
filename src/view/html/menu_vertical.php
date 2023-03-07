<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div>
                        <a class="nav-link" href="?pid=principal">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>Inicio
                        </a>
                    </div>
                    <?php

                    $menu = new Menu("", "", $user['GR_USER_ID']);
                    $menus = $menu->consultarTodo();

                    foreach ($menus as $r) {
                    ?>
                        <div class="sb-sidenav-menu-heading" id=<?php echo $r->getGR_MENU_ID(); ?>><?php echo $r->getMENU(); ?></div>

                        <?php
                        $submenu = new SubMenu("", "", $r->getGR_MENU_ID(), "", $user['GR_USER_ID']);
                        $submenus = $submenu->consultarTodo();
                        foreach ($submenus as $d) {
                        ?>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts-<?php echo $d->getGR_SUB_MENU_ID(); ?>" aria-expanded="false" aria-controls="collapseLayouts-<?php echo $d->getGR_SUB_MENU_ID(); ?>">
                                <div class="sb-nav-link-icon"><i class="<?php echo $d->getICONO(); ?>"></i></div>
                                <?php echo $d->getSUBMENU(); ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts-<?php echo $d->getGR_SUB_MENU_ID(); ?>" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php
                                    $ventana = new Vista("", "", "", "", "", "", $d->getGR_SUB_MENU_ID(), "", $user['GR_USER_ID']);
                                    $ventanas = $ventana->consultarTodoMenu();
                                    foreach ($ventanas as $v) {
                                    ?>
                                        <a class="nav-link" href="?pid=<?php echo $v->getVENTANA(); ?>"><?php echo $v->getVISTA(); ?></a>
                                    <?php
                                    }
                                    ?>
                                </nav>
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Conectado como:</div>
                <?php echo $user['USUARIO']; ?>
            </div>
        </nav>
    </div>