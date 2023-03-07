<?php
session_start();
require_once("../model/Perfil.php");
require_once("Router.php");

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

        $nuevoPerfil = new Perfil($gr_user_id, $usuario, $password,"");
        $nuevoPerfil->actualizar();
        $_SESSION['user']['USUARIO']=$usuario;

        header("Location: http://".$Router."/gremlinsApp/index.php?pid=perfil&msj=3");
        exit();
    }
}

?>