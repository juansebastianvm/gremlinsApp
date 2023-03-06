<?php
session_start();
require_once("../model/Login.php");

if (isset($_POST["login"])) {

    if (isset($_POST["inputUser"]) && (isset($_POST["inputPassword"]))) {

        if (($_POST["inputUser"] != "") && (($_POST["inputPassword"]) != "")) {

            $USER = $_POST["inputUser"];
            $PASSWORD = $_POST["inputPassword"];

            $nuevoLogin = new Login("", "", "", $USER, "","", $PASSWORD);
            $login = $nuevoLogin->verificar();

            if ($login) {
                $_SESSION['user'] = array (
                    'GR_USER_ID' => $nuevoLogin -> getGR_USER_ID(), 
                    'GR_ROLE_ID' => $nuevoLogin -> getGR_ROLE_ID(), 
                    'USUARIO' => $nuevoLogin -> getUSUARIO(),
                    'ROL' => $nuevoLogin -> getROL(),
                    'FECHA' =>  $fecha_actual = date("Y-m-d h:i:s")
                );
                header("Location: http://34.168.147.27/gremlinsApp/index.php?pid=principal"); 
                exit();
            } else {
                session_destroy();
                header("Location: http://34.168.147.27/gremlinsApp/index.php?pid=login");
                exit();                
            }
        }
    }
}

?>