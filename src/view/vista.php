<?php
require_once("src/model/Usuario.php");
require_once("src/model/Rol.php");
$user = $_SESSION['user'];
require_once("src/model/Vista.php");
require_once("src/model/VistaDetalle.php");
require_once("src/model/Menu.php");
require_once("src/model/SubMenu.php");

require_once("src/view/html/menu_superior.php");
require_once("src/view/html/menu_vertical.php");


$gr_view_id = "";
$view = "";
$descripcion = "";
$activo = "";

$gr_view_line_id = "";
$gr_role_id = "";
$activoD = "";
$rol = "";

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

        $consultarVista = new Vista($_GET["sid"]);
        $num_rows = $consultarVista->consultar();

        if ($num_rows > 0) {
            $gr_view_id = $consultarVista->getGR_VIEW_ID();
            $view = $consultarVista->getVISTA();
            $descripcion = $consultarVista->getDESCRIPCION();
            $activo = $consultarVista->getACTIVO();

            $action = "edit";
        }
    } else {
        $action = "new";
    }
}

$title2 = "";

if (isset($_GET["did"])) {

    if ($_GET["did"] != "0") {

        $consultarVistaDetalle = new VistaDetalle($_GET["did"], "", "", "", $gr_view_id);
        $num_rows = $consultarVistaDetalle->consultar();

        if ($num_rows > 0) {
            $gr_view_line_id = $consultarVistaDetalle->getGR_VIEW_LINE_ID();
            $gr_role_id = $consultarVistaDetalle->getGR_ROLE_ID();
            $activoD = $consultarVistaDetalle->getACTIVO();
            $rol = $consultarVistaDetalle->getROL();

            $action = "editD";
        }
    } else {
        $action = "newD";
    }

    $title2 = " - Permisos por Rol";
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mt-4">Ventanas<?php echo $title2; ?></h1>
                </div>
                <div class="col">
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                        <?php if (!isset($_GET["did"])) { ?>
                            <form id="form_view" method="POST" action="src/controller/VistaCTL.php">
                            <?php
                        } else { ?>
                                <form id="form_view" method="POST" action="src/controller/VistaDetalleCTL.php">
                                <?php
                            } ?>
                                <input class="btn btn-primary btn-lg plus" type="submit" name="nuevo" id="nuevo" value="Nuevo">
                                <?php if ($action == "edit" || $action == "new") { ?>
                                    <input class="btn btn-primary btn-lg" type="submit" name="atras" id="atras" value="Atras">
                                <?php
                                } ?>
                                <?php if ($action == "editD" || $action == "newD") { ?>
                                    <input type="hidden" id="gr_view_id" name="gr_view_id" value="<?php echo $gr_view_id; ?>" />
                                    <input class="btn btn-primary btn-lg" type="submit" name="atras" id="atras" value="Atras">
                                <?php
                                } ?>
                                </form>
                    </div>
                </div>
            </div>

            <?php if ($msj != "") { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Proceso ejecutado correctamente:</strong> <?php echo $msj; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if ($action == "edit" || $action == "new") { ?>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1 "></i>
                                Edición
                            </div>
                            <div class="card-body">
                                <form id="form_view" method="POST" action="src/controller/VistaCTL.php">
                                    <input type="hidden" id="gr_view_id" name="gr_view_id" value="<?php echo $gr_view_id; ?>" />
                                    <div class="mb-3 row">
                                        <label for="inputVista" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputVista" name="inputVista" value="<?php echo $view; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripción</label>
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

            <?php } ?>

            <?php if ($action == "grid") { ?>

                <div class="card mb-4">
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
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $viewT = new Vista();
                                    $views = $viewT->consultarTodo();
                                    $num_reg = 0;
                                    foreach ($views as $u) {
                                    ?>
                                        <tr id="tr-<?php print_r($u->getgr_view_id()); ?>" onclick="document.location='?pid=vista&sid=<?php print_r($u->getGR_VIEW_ID()); ?>'">
                                            <td><?php $num_reg = $num_reg + 1;
                                                print_r($num_reg); ?></td>
                                            <td><?php echo $u->getVISTA(); ?></td>
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

            <?php } ?>

            <?php if ($action == "edit") { ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Listado Detalle
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped display compact table-header" id="dataTableJS" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $viewDetalle = new VistaDetalle("", "", "", "", $gr_view_id);
                                    $viewDetalles = $viewDetalle->consultarTodo();
                                    $num_regD = 0;
                                    foreach ($viewDetalles as $u) {
                                    ?>
                                        <tr id="tr-<?php print_r($u->getGR_VIEW_LINE_ID()); ?>" onclick="document.location='?pid=vista&sid=<?php print_r($gr_view_id); ?>&did=<?php print_r($u->getGR_VIEW_LINE_ID()); ?>'">
                                            <td><?php $num_regD = $num_regD + 1;
                                                print_r($num_regD); ?></td>
                                            <td><?php echo $u->getROL(); ?></td>
                                            <td><?php echo $u->getACTIVO(); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <form id="form_viewD" method="POST" action="src/controller/VistaDetalleCTL.php">
                            <input type="hidden" id="gr_view_id" name="gr_view_id" value="<?php echo $gr_view_id; ?>" />
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                                <input class="btn btn-primary btn-lg" type="submit" name="nuevo" id="nuevo" value="Nuevo Detalle">
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

            <?php if ($action == "editD" || $action == "newD") { ?>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1 "></i>
                                Edición Detalle
                            </div>
                            <div class="card-body">
                                <form id="form_viewD" method="POST" action="src/controller/VistaDetalleCTL.php">
                                    <input type="hidden" id="gr_view_line_id" name="gr_view_line_id" value="<?php echo $gr_view_line_id; ?>" />
                                    <input type="hidden" id="gr_view_id" name="gr_view_id" value="<?php echo $gr_view_id; ?>" />
                                    <div class="mb-3 row">
                                        <label for="inputVista" class="col-sm-2 col-form-label">Ventana</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputVista" name="inputVista" value="<?php echo $view; ?>" required disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="selectRol" class="col-sm-2 col-form-label">Rol</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="selectRol" name="selectRol" aria-label="selectRol" required>
                                                <?php
                                                $selectRol = new Rol($_GET["sid"]);
                                                $roles = $selectRol->consultarTodo();
                                                foreach ($roles as $r) {
                                                ?>
                                                    <option value="<?php echo $r->getGR_ROLE_ID(); ?>" <?php if ($r->getGR_ROLE_ID() == $gr_role_id) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $r->getROL(); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="selectActivo" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="selectActivoD" name="selectActivoD" aria-label="selectActivoD" required>
                                                <option value="S" <?php if ($activoD == "Activo") {
                                                                        echo "selected";
                                                                    } ?>>Activo</option>
                                                <option value="N" <?php if ($activoD == "Inactivo") {
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

            <?php } ?>

        </div>
    </main>
    <?php
    require_once("src/view/html/footer.php");
    ?>