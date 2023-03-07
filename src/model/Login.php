<?php
require_once("Conexion.php");
require_once("LoginDAO.php");
class Login
{

    private $GR_USER_ID;
    private $USUARIO;
    private $GR_ROLE_ID;
    private $USER;
    private $PASSWORD;
    private $ROL;
    private $PASSWORDIN;
    private $LoginDAO;
    private $conexion;


    function __construct(
        $GR_USER_ID = "",
        $USUARIO = "",
        $GR_ROLE_ID = "",
        $USER = "",
        $PASSWORD = "",
        $ROL = "",
        $PASSWORDIN = ""
    ) {

        $this->GR_USER_ID = $GR_USER_ID;
        $this->USUARIO = $USUARIO;
        $this->GR_ROLE_ID = $GR_ROLE_ID;
        $this->USER = $USER;
        $this->PASSWORD = $PASSWORD;
        $this->ROL = $ROL;
        $this->PASSWORDIN = $PASSWORDIN;

        $this->LoginDAO = new LoginDAO(
            $USER
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

    function setROL($ROL)
    {
        $this->ROL = $ROL;
    }

    function getROL()
    {
        return $this->ROL;
    }

    function setGR_ROLE_ID($GR_ROLE_ID)
    {
        $this->GR_ROLE_ID = $GR_ROLE_ID;
    }

    function getGR_ROLE_ID()
    {
        return $this->GR_ROLE_ID;
    }

    function setUSER($USER)
    {
        $this->USER = $USER;
    }

    function getUSER()
    {
        return $this->USER;
    }

    function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;
    }

    function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    function setPASSWORDIN($PASSWORDIN)
    {
        $this->PASSWORDIN = $PASSWORDIN;
    }

    function getPASSWORDIN()
    {
        return $this->PASSWORDIN;
    }

    function verificar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->LoginDAO->verificar());

        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();

            $this->GR_USER_ID = $resultado[0];
            $this->USUARIO = $resultado[1];
            $this->GR_ROLE_ID = $resultado[2];
            $this->USER = $resultado[3];
            $this->PASSWORD = $resultado[4];
            $this->ROL = $resultado[5];

            if (password_verify($this->PASSWORDIN, $this->PASSWORD)) {
                $this->conexion->cerrar();
                return true;
            } else {
                $this->conexion->cerrar();
                return false;
            }
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }
}

?>