<?php
session_start();
require_once("../model/VistaDetalle.php");

if (isset($_POST["guardar"])) {

    if (isset($_POST["gr_view_line_id"]) && ($_POST["gr_view_line_id"] != "")) {

        $gr_view_line_id = "";
        if (isset($_POST["gr_view_line_id"])) {
            $gr_view_line_id = $_POST["gr_view_line_id"];
        }
        $gr_view_id = "";
        if (isset($_POST["gr_view_id"])) {
            $gr_view_id = $_POST["gr_view_id"];
        }
        $gr_role_id = "";
        if (isset($_POST["selectRol"])) {
            $gr_role_id = $_POST["selectRol"];
        }
        $activo = "";
        if (isset($_POST["selectActivoD"])) {
            $activo = $_POST["selectActivoD"];
        }

        $nuevoVistaDetalle = new VistaDetalle($gr_view_line_id, $activo, 2, null, $gr_view_id, $gr_role_id);
        $nuevoVistaDetalle->actualizar();


        header("Location: http://localhost/gremlinsApp/index.php?pid=vista&sid=" . $gr_view_id . "&did=" . $gr_view_line_id . "&msj=3");
        exit();
    }

    if (!isset($_POST["gr_view_line_id"]) || ($_POST["gr_view_line_id"] == "")) {

        $gr_view_id = "";
        if (isset($_POST["gr_view_id"])) {
            $gr_view_id = $_POST["gr_view_id"];
        }
        $gr_role_id = "";
        if (isset($_POST["selectRol"])) {
            $gr_role_id = $_POST["selectRol"];
        }
        $activo = "";
        if (isset($_POST["selectActivoD"])) {
            $activo = $_POST["selectActivoD"];
        }

        $nuevoVistaDetalle = new VistaDetalle("", $activo, 2, null, $gr_view_id, $gr_role_id);
        $nuevoVistaDetalle->insertar();


        header("Location: http://localhost/gremlinsApp/index.php?pid=vista&sid=" . $gr_view_id . "&msj=2");
        exit();
    }
}

if (isset($_POST["eliminar"])) {

    if (isset($_POST["gr_view_line_id"]) && ($_POST["gr_view_line_id"] != "")) {

        if (isset($_POST["gr_view_id"])) {

        $gr_view_line_id = "";
        if (isset($_POST["gr_view_line_id"])) {
            $gr_view_line_id = $_POST["gr_view_line_id"];
        }

        $eliminarVistaDetalle = new VistaDetalle($gr_view_line_id);
        $eliminarVistaDetalle->eliminar();

        header("Location: http://localhost/gremlinsApp/index.php?pid=vista&sid=" . $_POST["gr_view_id"] . "&msj=1");
        exit();
        }

    }
}

if (isset($_POST["nuevo"])) {

    if (isset($_POST["gr_view_id"])) {

        header("Location: http://localhost/gremlinsApp/index.php?pid=vista&sid=" . $_POST["gr_view_id"] . "&did=0");
        exit();
    }
}

if (isset($_POST["atras"])) {

    if (isset($_POST["gr_view_id"])) {

        header("Location: http://localhost/gremlinsApp/index.php?pid=vista&sid=" . $_POST["gr_view_id"] . "");
        exit();
    }
}
