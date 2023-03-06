<?php
require_once("Conexion.php");
require_once("PerfilDAO.php");
class Perfil
{

    private $GR_USER_ID;
    private $USUARIO;
    private $PASSWORD;
    private $USER;    
    private $PerfilDAO;
    private $conexion;

    function __construct(
        $GR_USER_ID = "",
        $USUARIO = "",
        $PASSWORD = "",
        $USER = ""
    ) {

        $this->GR_USER_ID = $GR_USER_ID;
        $this->USUARIO = $USUARIO;
        $this->PASSWORD = $PASSWORD;
        $this->USER = $USER;

        $this->PerfilDAO = new PerfilDAO(
            $GR_USER_ID,
            $USUARIO,
            $PASSWORD
        );

        $this->conexion = new Conexion();
    }

    function setGR_USER_ID($GR_USER_ID)
    {
        $this->GR_USER_ID = $GR_USER_ID;
    }

    function getGR_USER_ID()
    {
        return $this->GR_USER_ID;
    }

    function setUSUARIO($USUARIO)
    {
        $this->USUARIO = $USUARIO;
    }

    function getUSUARIO()
    {
        return $this->USUARIO;
    }

    function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;
    }

    function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    function setUSER($USER)
    {
        $this->USER = $USER;
    }

    function getUSER()
    {
        return $this->USER;
    }

    function actualizar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->PerfilDAO->actualizar());
        $this->conexion->cerrar();
    }

    function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->PerfilDAO->consultar());
        $resultado = $this->conexion->extraer();
        $num_rows = $this->conexion->numFilas();
        $this->conexion->cerrar();

        if ($num_rows > 0) {

            $this->GR_USER_ID = $resultado[0];
            $this->USUARIO = $resultado[1];
            $this->USER = $resultado[2];
            $this->PASSWORD = $resultado[3];
        }

        return $num_rows;
    }    

}
