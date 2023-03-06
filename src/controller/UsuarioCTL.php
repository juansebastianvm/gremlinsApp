<?php
session_start();
require_once("../model/Usuario.php");

if (isset($_POST["guardar"])) {

    if (isset($_POST["gr_user_id"]) && ($_POST["gr_user_id"] != "")) {

        $gr_user_id = "";
        if (isset($_POST["gr_user_id"])) {
            $gr_user_id = $_POST["gr_user_id"];
        }
        $usuario = "";
        if (isset($_POST["inputUsuario"])) {
            $usuario = $_POST["inputUsuario"];
        }
        $user = "";
        if (isset($_POST["inputUser"])) {
            $user = $_POST["inputUser"];
        }
        $newPass = "";
        if (isset($_POST["checkPassword"])) {
            $newPass = $_POST["checkPassword"];
        }
        $password = "*";
        if (isset($_POST["inputPassword"])) {
            if ($newPass == "on") {
                $password = password_hash($_POST["inputPassword"], PASSWORD_DEFAULT);
            }
        }
        $descripcion = "";
        if (isset($_POST["inputDescripcion"])) {
            $descripcion = $_POST["inputDescripcion"];
        }
        $rol_id = "";
        if (isset($_POST["selectRol"])) {
            $rol_id = $_POST["selectRol"];
        }
        $activo = "";
        if (isset($_POST["selectActivo"])) {
            $activo = $_POST["selectActivo"];
        }

        $nuevoUsuario = new Usuario($gr_user_id, $activo, 2, null, $usuario, $descripcion, $rol_id, $user, $password);
        $nuevoUsuario->actualizar();


        header("Location: http://localhost/gremlinsApp/index.php?pid=usuario&sid=" . $gr_user_id."&msj=3");
        exit();
    }

    if (!isset($_POST["gr_user_id"]) || ($_POST["gr_user_id"] == "")) {

        $usuario = "";
        if (isset($_POST["inputUsuario"])) {
            $usuario = $_POST["inputUsuario"];
        }
        $user = "";
        if (isset($_POST["inputUser"])) {
            $user = $_POST["inputUser"];
        }
        $password = "";
        if (isset($_POST["inputPassword"])) {
            $password = $_POST["inputPassword"];
        }
        $descripcion = "";
        if (isset($_POST["inputDescripcion"])) {
            $descripcion = $_POST["inputDescripcion"];
        }
        $rol_id = "";
        if (isset($_POST["selectRol"])) {
            $rol_id = $_POST["selectRol"];
        }
        $activo = "";
        if (isset($_POST["selectActivo"])) {
            $activo = $_POST["selectActivo"];
        }

        $nuevoUsuario = new Usuario(null, $activo, 2, null, $usuario, $descripcion, $rol_id, $user, password_hash($password, PASSWORD_DEFAULT));
        $nuevoUsuario->insertar();


        header("Location: http://localhost/gremlinsApp/index.php?pid=usuario&msj=2");
        exit();
    }
}

if (isset($_POST["eliminar"])) {

    if (isset($_POST["gr_user_id"]) && ($_POST["gr_user_id"] != "")) {

        $gr_user_id = "";
        if (isset($_POST["gr_user_id"])) {
            $gr_user_id = $_POST["gr_user_id"];
        }

        $eliminarUsuario = new Usuario($gr_user_id);
        $eliminarUsuario->eliminar();

        header("Location: http://localhost/gremlinsApp/index.php?pid=usuario&msj=1");
        exit();
    }
}

if (isset($_POST["nuevo"])) {

    header("Location: http://localhost/gremlinsApp/index.php?pid=usuario&sid=0");
    exit();
}

if (isset($_POST["atras"])) {

    header("Location: http://localhost/gremlinsApp/index.php?pid=usuario");
    exit();
}

?>