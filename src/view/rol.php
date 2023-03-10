<?php
require_once("src/model/Usuario.php");
$user = $_SESSION['user'];
require_once("src/model/Rol.php");
require_once("src/model/Vista.php");
require_once("src/model/Menu.php");
require_once("src/model/SubMenu.php");

require_once("src/view/html/menu_superior.php");
require_once("src/view/html/menu_vertical.php");


$gr_role_id = "";
$rol = "";
$descripcion = "";
$activo = "";

$action = "grid";
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

if (isset($_GET["sid"])) {

    if ($_GET["sid"] != "0") {

        $consultarRol = new Rol($_GET["sid"]);
        $num_rows = $consultarRol->consultar();

        if ($num_rows > 0) {
            $gr_role_id = $consultarRol->getGR_ROLE_ID();
            $rol = $consultarRol->getROL();
            $descripcion = $consultarRol->getDESCRIPCION();
            $activo = $consultarRol->getACTIVO();

            $action = "edit";
        }
    } else {
        $action = "new";
    }
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mt-4">Roles</h1>
                </div>
                <div class="col">
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                        <form id="form_rol" method="POST" action="src/controller/RolCTL.php">
                            <input class="btn btn-primary btn-lg plus" type="submit" name="nuevo" id="nuevo" value="Nuevo">
                            <?php if ($action == "edit" || $action == "new") { ?>
                                <input class="btn btn-primary btn-lg" type="submit" name="atras" id="atras" value="Atras">
                            <?php
                            } ?>
                        </form>
                    </div>
                </div>
            </div>

            <?php if ($msj != "") { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Proceso ejecutado correctamente:</strong> <?php echo $msj;?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <div class="row" <?php if ($action == "edit" || $action == "new") {
                                    echo 'style="display: block;"';
                                } else {
                                    echo 'style="display: none;"';
                                } ?>>
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user me-1 "></i>
                            Edici??n
                        </div>
                        <div class="card-body">
                            <form id="form_rol" method="POST" action="src/controller/RolCTL.php">
                                <input type="hidden" id="gr_role_id" name="gr_role_id" value="<?php echo $gr_role_id; ?>" />
                                <div class="mb-3 row">
                                    <label for="inputRol" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputRol" name="inputRol" value="<?php echo $rol; ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripci??n</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputDescripcion" name="inputDescripcion" rows="3"><?php echo $descripcion; ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="selectActivo" class="col-sm-2 col-form-label">Estado</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="selectActivo" name="selectActivo" aria-label="selectActivo" required>
                                            <option value="S" <?php if ($activo == "Activo") {
                                                                    echo "selected";
                                                                } ?>>Activo</option>
                                            <option value="N" <?php if ($activo == "Inactivo") {
                                                                    echo "selected";
                                                                } ?>>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                                    <input class="btn btn-primary btn-lg" type="submit" name="guardar" id="guardar" value="Guardar">
                                    <input class="btn btn-primary btn-lg" type="submit" name="eliminar" id="eliminar" value="Eliminar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4" <?php if ($action == "grid") {
                                        echo 'style="display: block;"';
                                    } else {
                                        echo 'style="display: none;"';
                                    } ?>>
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Listado
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped display compact table-header" id="dataTableJS" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripci??n</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripci??n</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $rol = new Rol();
                                $rols = $rol->consultarTodo();
                                $num_reg = 0;
                                foreach ($rols as $u) {
                                ?>
                                    <tr id="tr-<?php print_r($u->getgr_role_id()); ?>" onclick="document.location='?pid=rol&sid=<?php print_r($u->getGR_ROLE_ID()); ?>'">
                                        <td><?php $num_reg = $num_reg + 1;
                                            print_r($num_reg); ?></td>
                                        <td><?php echo $u->getRol(); ?></td>
                                        <td><?php echo $u->getDESCRIPCION(); ?></td>
                                        <td><?php echo $u->getACTIVO(); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("src/view/html/footer.php");
    ?>