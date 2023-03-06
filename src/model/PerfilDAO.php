<?php
class PerfilDAO {

    private $GR_USER_ID;
    private $USUARIO;
    private $PASSWORD;

    function __construct($GR_USER_ID = "", $USUARIO = "",$PASSWORD = "") {

        $this -> GR_USER_ID = $GR_USER_ID;
        $this -> USUARIO = $USUARIO;
        $this -> PASSWORD = $PASSWORD;
    }

    function actualizar () {
        if ($this -> PASSWORD == "*") {        
            return "UPDATE gr_user SET USUARIO='".$this -> USUARIO."' WHERE GR_USER_ID = ".$this -> GR_USER_ID;
        } else {
            return "UPDATE gr_user SET USUARIO='".$this -> USUARIO."', PASSWORD='".$this -> PASSWORD."' WHERE GR_USER_ID = ".$this -> GR_USER_ID;                        
        }
    }

    function consultar () {
        return "SELECT GR_USER_ID, USUARIO, USER, PASSWORD FROM gr_user WHERE GR_USER_ID = ".$this -> GR_USER_ID;        
    }    

}
