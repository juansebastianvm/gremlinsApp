<?php
require_once("src/model/Login.php");
$user = $_SESSION['user'];
require_once("src/model/Vista.php");
require_once("src/model/Menu.php");
require_once("src/model/SubMenu.php");

require_once("src/view/html/menu_superior.php");
require_once("src/view/html/menu_vertical.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mt-4">Bienvenido</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user me-1 "></i>
                            Datos de Ingreso
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="inputUsuario" class="col-form-label">Usuario: </label>
                                </div>
                                <div class="col">
                                    <label for="inputUsuario" class="col-form-label"><?php echo $user['USUARIO'];?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="inputUsuario" class="col-form-label">Fecha: </label>
                                </div>
                                <div class="col">
                                    <label for="inputUsuario" class="col-form-label"><?php echo $user['FECHA'];?></label>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col">
                                    <label for="inputUsuario" class="col-form-label">Rol: </label>
                                </div>
                                <div class="col">
                                    <label for="inputUsuario" class="col-form-label"><?php echo $user['ROL'];?></label>
                                </div>
                            </div>                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("src/view/html/footer.php");
    ?>