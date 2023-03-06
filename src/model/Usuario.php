<?php 
require_once("Conexion.php");
require_once("UsuarioDAO.php");
class Usuario
{

    private $GR_USER_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $USUARIO;
    private $DESCRIPCION;
    private $GR_ROLE_ID;
    private $USER;
    private $PASSWORD;
    private $UsuarioDAO;
    private $conexion;
    private $ROL;

    function __construct(
        $GR_USER_ID = "",
        $ACTIVO  = "",
        $ACTUALIZADO_POR = "",
        $ULTIMA_ACTUALIZACION = "",
        $USUARIO = "",
        $DESCRIPCION = "",
        $GR_ROLE_ID = "",
        $USER = "",
        $PASSWORD = "",
        $ROL = ""
    ) {

        $this->GR_USER_ID = $GR_USER_ID;
        $this->ACTIVO = $ACTIVO;
        $this->ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this->ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this->USUARIO = $USUARIO;
        $this->DESCRIPCION = $DESCRIPCION;
        $this->GR_ROLE_ID = $GR_ROLE_ID;
        $this->USER = $USER;
        $this->PASSWORD = $PASSWORD;
        $this->ROL = $ROL;

        $this->UsuarioDAO = new UsuarioDAO(
            $GR_USER_ID,
            $ACTIVO,
            $ACTUALIZADO_POR,
            $ULTIMA_ACTUALIZACION,
            $USUARIO,
            $DESCRIPCION,
            $GR_ROLE_ID,
            $USER,
            $PASSWORD,
            $ROL
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

    function setACTIVO($ACTIVO)
    {
        $this->ACTIVO = $ACTIVO;
    }

    function getACTIVO()
    {
        return $this->ACTIVO;
    }

    function setACTUALIZADO_POR($ACTUALIZADO_POR)
    {
        $this->ACTUALIZADO_POR = $ACTUALIZADO_POR;
    }

    function getACTUALIZADO_POR()
    {
        return $this->ACTUALIZADO_POR;
    }

    function setULTIMA_ACTUALIZACION($ULTIMA_ACTUALIZACION)
    {
        $this->ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
    }

    function getULTIMA_ACTUALIZACION()
    {
        return $this->ULTIMA_ACTUALIZACION;
    }

    function setUSUARIO($USUARIO)
    {
        $this->USUARIO = $USUARIO;
    }

    function getUSUARIO()
    {
        return $this->USUARIO;
    }

    function setDESCRIPCION($DESCRIPCION)
    {
        $this->DESCRIPCION = $DESCRIPCION;
    }

    function getDESCRIPCION()
    {
        return $this->DESCRIPCION;
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

    function insertar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->insertar());
        $this->conexion->cerrar();
    }

    function actualizar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->actualizar());
        $this->conexion->cerrar();
    }

    function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->consultar());
        $resultado = $this->conexion->extraer();
        $num_rows = $this->conexion->numFilas();
        $this->conexion->cerrar();

        if ($num_rows > 0) {

            $this->GR_USER_ID = $resultado[0];
            $this->ACTIVO = $resultado[1];
            $this->ACTUALIZADO_POR = $resultado[2];
            $this->ULTIMA_ACTUALIZACION = $resultado[3];
            $this->USUARIO = $resultado[4];
            $this->DESCRIPCION = $resultado[5];
            $this->GR_ROLE_ID = $resultado[6];
            $this->USER = $resultado[7];
            $this->PASSWORD = $resultado[8];
            $this->ROL = $resultado[9];
        }

        return $num_rows;
    }

    function consultarTodo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->consultarTodo());
        $usuarios = array();
        while ($resultado = $this->conexion->extraer()) {
            array_push($usuarios, new Usuario($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7], $resultado[8], $resultado[9]));
        }

        $this->conexion->cerrar();
        return $usuarios;
    }

    function consultarTodoOrden($campo, $direccion)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->consultarTodoOrden($campo, $direccion));
        $usuarios = array();
        while ($resultado = $this->conexion->extraer()) {
            array_push($usuarios, new Usuario($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7], $resultado[8], $resultado[9]));
        }

        $this->conexion->cerrar();
        return $usuarios;
    }

    function buscar($filtro)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->buscar($filtro));
        $usuarios = array();
        while ($resultado = $this->conexion->extraer()) {
            array_push($usuarios, new Usuario($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7], $resultado[8], $resultado[9]));
        }

        $this->conexion->cerrar();
        return $usuarios;
    }

    function eliminar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->UsuarioDAO->eliminar());
        $this->conexion->cerrar();
    }
}

?>