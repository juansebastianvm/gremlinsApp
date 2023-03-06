<?php
require_once ("Conexion.php");
require_once ("VistaDetalleDAO.php");
class VistaDetalle {

    private $GR_VIEW_LINE_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $GR_VIEW_ID;
    private $GR_ROLE_ID;
    private $ROL;
    private $VistaDetalleDAO;
    private $conexion;

    function __construct($GR_VIEW_LINE_ID = "", $ACTIVO  = "", $ACTUALIZADO_POR = "",$ULTIMA_ACTUALIZACION = "",
                            $GR_VIEW_ID = "",$GR_ROLE_ID = "",$ROL = "") {

        $this -> GR_VIEW_LINE_ID = $GR_VIEW_LINE_ID;
        $this -> ACTIVO = $ACTIVO;
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this -> GR_VIEW_ID = $GR_VIEW_ID;
        $this -> GR_ROLE_ID = $GR_ROLE_ID;
        $this -> ROL = $ROL;

        $this -> VistaDetalleDAO = new VistaDetalleDAO ($GR_VIEW_LINE_ID, $ACTIVO, $ACTUALIZADO_POR,$ULTIMA_ACTUALIZACION,
                                              $GR_VIEW_ID,$GR_ROLE_ID);

        $this -> conexion = new Conexion();                                              

    }      

    function setGR_VIEW_LINE_ID ($GR_VIEW_LINE_ID) {
        $this -> GR_VIEW_LINE_ID = $GR_VIEW_LINE_ID;
    }

    function getGR_VIEW_LINE_ID () {
        return $this -> GR_VIEW_LINE_ID;
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
    
    function setGR_ROLE_ID ($GR_ROLE_ID) {
        $this -> GR_ROLE_ID = $GR_ROLE_ID;
    }

    function getGR_ROLE_ID () {
        return $this -> GR_ROLE_ID;
    }  

    function setROL ($ROL) {
        $this -> ROL = $ROL;
    }

    function getROL () {
        return $this -> ROL;
    }  

    function setGR_VIEW_ID ($GR_VIEW_ID) {
        $this -> GR_VIEW_ID = $GR_VIEW_ID;
    }

    function getGR_VIEW_ID () {
        return $this -> GR_VIEW_ID;
    }     

    function insertar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function actualizar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    
    function consultar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $num_rows = $this->conexion->numFilas();
        $this -> conexion -> cerrar();

        if ($num_rows > 0) {        

        $this -> GR_VIEW_LINE_ID = $resultado[0];
        $this -> ACTIVO = $resultado[1];
        $this -> ACTUALIZADO_POR = $resultado[2];
        $this -> ULTIMA_ACTUALIZACION = $resultado[3];
        $this -> GR_VIEW_ID = $resultado[4];
        $this -> GR_ROLE_ID = $resultado[5];
        $this -> ROL = $resultado[6];
    }

    return $num_rows;        
    }

    function consultarTodo () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> consultarTodo());
        $vistasDetalle = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistasDetalle, new VistaDetalle ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6]));
        }

        $this -> conexion -> cerrar();
        return $vistasDetalle;
    }
    
    function consultarTodoOrden ($campo, $direccion) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> consultarTodoOrden($campo, $direccion));
        $vistasDetalle = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistasDetalle, new VistaDetalle ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $vistasDetalle;
    }
    
    function buscar ($filtro) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> buscar($filtro));
        $vistasDetalle = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistasDetalle, new VistaDetalle ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $vistasDetalle;
    }
    
    function eliminar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDetalleDAO -> eliminar());
        $this -> conexion -> cerrar();
    }    

}
