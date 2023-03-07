<?php
require_once ("Conexion.php");
require_once ("RolDAO.php");
class Rol {

    private $GR_ROLE_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $ROL;
    private $DESCRIPCION;
    private $RolDAO;
    private $conexion;

    function __construct($GR_ROLE_ID = "", $ACTIVO  = "", $ACTUALIZADO_POR = "",$ULTIMA_ACTUALIZACION = "",
                            $ROL = "",$DESCRIPCION = "") {

        $this -> GR_ROLE_ID = $GR_ROLE_ID;
        $this -> ACTIVO = $ACTIVO;
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this -> ROL = $ROL;
        $this -> DESCRIPCION = $DESCRIPCION;

        $this -> RolDAO = new RolDAO ($GR_ROLE_ID, $ACTIVO, $ACTUALIZADO_POR,$ULTIMA_ACTUALIZACION,
                                              $ROL,$DESCRIPCION);

        $this -> conexion = new Conexion();                                              

    }      

    function setGR_ROLE_ID ($GR_ROLE_ID) {
        $this -> GR_ROLE_ID = $GR_ROLE_ID;
    }

    function getGR_ROLE_ID () {
        return $this -> GR_ROLE_ID;
    }    

    function setACTIVO ($ACTIVO) {
        $this -> ACTIVO = $ACTIVO;
    }

    function getACTIVO () {
        return $this -> ACTIVO;
    }  
    
    function setACTUALIZADO_POR ($ACTUALIZADO_POR) {
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
    }

    function getACTUALIZADO_POR () {
        return $this -> ACTUALIZADO_POR;
    }  

    function setULTIMA_ACTUALIZACION ($ULTIMA_ACTUALIZACION) {
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
    }

    function getULTIMA_ACTUALIZACION () {
        return $this -> ULTIMA_ACTUALIZACION;
    } 
    
    function setDESCRIPCION ($DESCRIPCION) {
        $this -> DESCRIPCION = $DESCRIPCION;
    }

    function getDESCRIPCION () {
        return $this -> DESCRIPCION;
    }  

    function setROL ($ROL) {
        $this -> ROL = $ROL;
    }

    function getROL () {
        return $this -> ROL;
    }     

    function insertar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function actualizar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    
    function consultar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $num_rows = $this->conexion->numFilas();
        $this -> conexion -> cerrar();

        if ($num_rows > 0) {        

        $this -> GR_ROLE_ID = $resultado[0];
        $this -> ACTIVO = $resultado[1];
        $this -> ACTUALIZADO_POR = $resultado[2];
        $this -> ULTIMA_ACTUALIZACION = $resultado[3];
        $this -> ROL = $resultado[4];
        $this -> DESCRIPCION = $resultado[5];
    }

    return $num_rows;        
    }

    function consultarTodo () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> consultarTodo());
        $roles = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($roles, new Rol ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $roles;
    }
    
    function consultarTodoOrden ($campo, $direccion) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> consultarTodoOrden($campo, $direccion));
        $roles = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($roles, new Rol ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $roles;
    }
    
    function buscar ($filtro) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> buscar($filtro));
        $roles = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($roles, new Rol ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $roles;
    }
    
    function eliminar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RolDAO -> eliminar());
        $this -> conexion -> cerrar();
    }    

}

?>