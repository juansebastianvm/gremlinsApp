<?php
session_start(); 
require_once("../model/Vista.php");
require_once("Router.php");

if (isset($_POST["guardar"])) {

    if (isset($_POST["gr_view_id"]) && ($_POST["gr_view_id"] != "")) {

        $gr_view_id = "";
        if (isset($_POST["gr_view_id"])) {
            $gr_view_id = $_POST["gr_view_id"];
        }
        $vista = "";
        if (isset($_POST["inputVista"])) {
            $vista = $_POST["inputVista"];
        }
        $descripcion = "";
        if (isset($_POST["inputDescripcion"])) {
            $descripcion = $_POST["inputDescripcion"];
        }
        $activo = "";
        if (isset($_POST["selectActivo"])) {
            $activo = $_POST["selectActivo"];
        }

        $nuevoVista = new Vista($gr_view_id, $activo, 2, null, $vista, $descripcion);
        $nuevoVista->actualizar();


        header("Location: http://".$Router."/gremlinsApp/index.php?pid=vista&sid=" . $gr_view_id."&msj=3");
        exit();
    }

    if (!isset($_POST["gr_view_id"]) || ($_POST["gr_view_id"] == "")) {

        $vista = "";
        if (isset($_POST["inputVista"])) {
            $vista = $_POST["inputVista"];
        }
        $descripcion = "";
        if (isset($_POST["inputDescripcion"])) {
            $descripcion = $_POST["inputDescripcion"];
        }
        $activo = "";
        if (isset($_POST["selectActivo"])) {
            $activo = $_POST["selectActivo"];
        }

        $nuevoVista = new Vista(null, $activo, 2, null, $vista, $descripcion);
        $nuevoVista->insertar();


        header("Location: http://".$Router."/gremlinsApp/index.php?pid=vista&msj=2");
        exit();
    }
}

if (isset($_POST["eliminar"])) {

    if (isset($_POST["gr_view_id"]) && ($_POST["gr_view_id"] != "")) {

        $gr_view_id = "";
        if (isset($_POST["gr_view_id"])) {
            $gr_view_id = $_POST["gr_view_id"];
        }

        $eliminarVista = new Vista($gr_view_id);
        $eliminarVista->eliminar();

        header("Location: http://".$Router."/gremlinsApp/index.php?pid=vista&msj=1");
        exit();
    }
}

if (isset($_POST["nuevo"])) {

    header("Location: http://".$Router."/gremlinsApp/index.php?pid=vista&sid=0");
    exit();
}

if (isset($_POST["atras"])) {

    header("Location: http://".$Router."/gremlinsApp/index.php?pid=vista");
    exit();
}

?>