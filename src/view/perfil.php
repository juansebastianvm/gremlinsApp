<?php
require_once("src/model/Usuario.php");
$user = $_SESSION['user'];
require_once("src/model/Perfil.php");
require_once("src/model/Rol.php");
require_once("src/model/Vista.php");
require_once("src/model/Menu.php");
require_once("src/model/SubMenu.php");

require_once("src/view/html/menu_superior.php");
require_once("src/view/html/menu_vertical.php");


$gr_user_id = "";
$usuario = "";
$username = "";
$password = "";

$msj = "";

if (isset($_GET["msj"])) {

    switch ($_GET["msj"]) {
        case "0":
            $msj = "Error";
            break;
        case "1":
            $msj = "Registro eliminado";
            break;
        case "2":
            $msj = "Registro insertado";
            break;
        case "3":
            $msj = "Registro actualizado";
            break;
    }
}

$consultarPerfil = new Perfil($user['GR_USER_ID']);
$num_rows = $consultarPerfil->consultar();

if ($num_rows > 0) {
    $gr_user_id = $consultarPerfil->getGR_USER_ID();
    $usuario = $consultarPerfil->getUSUARIO();
    $username =  $consultarPerfil->getUSER();
    $password = $consultarPerfil->getPASSWORD();
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mt-4">Perfil</h1>
                </div>
            </div>

            <?php if ($msj != "") { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Proceso ejecutado correctamente:</strong> <?php echo $msj; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user me-1 "></i>
                            Edición
                        </div>
                        <div class="card-body">
                            <form id="form_perfil" method="POST" action="src/controller/PerfilCTL.php">
                                <input type="hidden" id="gr_user_id" name="gr_user_id" value="<?php echo $gr_user_id; ?>" />
                                <div class="mb-3 row">
                                    <label for="inputUsuario" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUsuario" name="inputUsuario" value="<?php echo $usuario; ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUser" name="inputUser" value="<?php echo $username; ?>" required disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" value="<?php echo $password; ?>" required disabled>
                                        <label for="checkPassword" class="col-sm-2 col-form-label">Modificar Contraseña</label>
                                        <input type="checkbox" onclick="disable('inputPassword')" id="checkPassword" name="checkPassword">
                                    </div>
                                </div>
                                <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                                    <input class="btn btn-primary btn-lg" type="submit" name="guardar" id="guardar" value="Guardar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("src/view/html/footer.php");
    ?>