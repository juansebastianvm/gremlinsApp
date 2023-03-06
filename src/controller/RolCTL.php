<?php
session_start();
require_once("../model/Rol.php");

if (isset($_POST["guardar"])) {

    if (isset($_POST["gr_role_id"]) && ($_POST["gr_role_id"] != "")) {

        $gr_role_id = "";
        if (isset($_POST["gr_role_id"])) {
            $gr_role_id = $_POST["gr_role_id"];
        }
        $rol = "";
        if (isset($_POST["inputRol"])) {
            $rol = $_POST["inputRol"];
        }
        $descripcion = "";
        if (isset($_POST["inputDescripcion"])) {
            $descripcion = $_POST["inputDescripcion"];
        }
        $activo = "";
        if (isset($_POST["selectActivo"])) {
            $activo = $_POST["selectActivo"];
        }

        $nuevoRol = new Rol($gr_role_id, $activo, 2, null, $rol, $descripcion);
        $nuevoRol->actualizar();


        header("Location: http://localhost/gremlinsApp/index.php?pid=rol&sid=" . $gr_role_id."&msj=3");
        exit();
    }

    if (!isset($_POST["gr_role_id"]) || ($_POST["gr_role_id"] == "")) {

        $rol = "";
        if (isset($_POST["inputRol"])) {
            $rol = $_POST["inputRol"];
        }
        $descripcion = "";
        if (isset($_POST["inputDescripcion"])) {
            $descripcion = $_POST["inputDescripcion"];
        }
        $activo = "";
        if (isset($_POST["selectActivo"])) {
            $activo = $_POST["selectActivo"];
        }

        $nuevoRol = new Rol(null, $activo, 2, null, $rol, $descripcion);
        $nuevoRol->insertar();


        header("Location: http://localhost/gremlinsApp/index.php?pid=rol&msj=2");
        exit();
    }
}

if (isset($_POST["eliminar"])) {

    if (isset($_POST["gr_role_id"]) && ($_POST["gr_role_id"] != "")) {

        $gr_role_id = "";
        if (isset($_POST["gr_role_id"])) {
            $gr_role_id = $_POST["gr_role_id"];
        }

        $eliminarRol = new Rol($gr_role_id);
        $eliminarRol->eliminar();

        header("Location: http://localhost/gremlinsApp/index.php?pid=rol&msj=1");
        exit();
    }
}

if (isset($_POST["nuevo"])) {

    header("Location: http://localhost/gremlinsApp/index.php?pid=rol&sid=0");
    exit();
}

if (isset($_POST["atras"])) {

    header("Location: http://localhost/gremlinsApp/index.php?pid=rol");
    exit();
}

?>