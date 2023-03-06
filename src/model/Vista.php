<?php
require_once ("Conexion.php");
require_once ("VistaDAO.php");
class Vista {

    private $GR_VIEW_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $VISTA;
    private $DESCRIPCION;
    private $GR_SUB_MENU_ID;
    private $VENTANA;    
    private $GR_USER_ID;    

    private $VistaDAO;
    private $conexion;

    function __construct($GR_VIEW_ID = "", $ACTIVO  = "", $ACTUALIZADO_POR = "",$ULTIMA_ACTUALIZACION = "",
                            $VISTA = "",$DESCRIPCION = "", $GR_SUB_MENU_ID = "", $VENTANA = "", $GR_USER_ID = "") {

        $this -> GR_VIEW_ID = $GR_VIEW_ID;
        $this -> ACTIVO = $ACTIVO;
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this -> VISTA = $VISTA;
        $this -> DESCRIPCION = $DESCRIPCION;
        $this -> GR_SUB_MENU_ID = $GR_SUB_MENU_ID;
        $this -> VENTANA = $VENTANA;
        $this -> GR_USER_ID = $GR_USER_ID;        

        $this -> VistaDAO = new VistaDAO ($GR_VIEW_ID, $ACTIVO, $ACTUALIZADO_POR,$ULTIMA_ACTUALIZACION,
                                              $VISTA,$DESCRIPCION, $GR_SUB_MENU_ID, $VENTANA, $GR_USER_ID);

        $this -> conexion = new Conexion();                                              

    }      

    function setGR_USER_ID ($GR_USER_ID) {
        $this -> GR_USER_ID = $GR_USER_ID;
    }

    function getGR_USER_ID() {
        return $this -> GR_USER_ID;
    }  

    function setVENTANA ($VENTANA) {
        $this -> VENTANA = $VENTANA;
    }

    function getVENTANA() {
        return $this -> VENTANA;
    }  

    function setGR_SUB_MENU_ID ($GR_SUB_MENU_ID) {
        $this -> GR_SUB_MENU_ID = $GR_SUB_MENU_ID;
    }

    function getGR_SUB_MENU_ID() {
        return $this -> GR_SUB_MENU_ID;
    }  

    function setGR_VIEW_ID ($GR_VIEW_ID) {
        $this -> GR_VIEW_ID = $GR_VIEW_ID;
    }

    function getGR_VIEW_ID () {
        return $this -> GR_VIEW_ID;
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

    function setVISTA ($VISTA) {
        $this -> VISTA = $VISTA;
    }

    function getVISTA () {
        return $this -> VISTA;
    }     

    function insertar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function actualizar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    
    function consultar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $num_rows = $this->conexion->numFilas();
        $this -> conexion -> cerrar();

        if ($num_rows > 0) {        

        $this -> GR_VIEW_ID = $resultado[0];
        $this -> ACTIVO = $resultado[1];
        $this -> ACTUALIZADO_POR = $resultado[2];
        $this -> ULTIMA_ACTUALIZACION = $resultado[3];
        $this -> VISTA = $resultado[4];
        $this -> DESCRIPCION = $resultado[5];
    }

    return $num_rows;        
    }

    function consultarTodo () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> consultarTodo());
        $vistas = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistas, new Vista ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $vistas;
    }

    function consultarTodoMenu () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> consultarTodoMenu());
        $vistas = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistas, new Vista ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5],"", $resultado[7]));
        }

        $this -> conexion -> cerrar();
        return $vistas;
    }

    function consultarTodoOrden ($campo, $direccion) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> consultarTodoOrden($campo, $direccion));
        $vistas = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistas, new Vista ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $vistas;
    }
    
    function buscar ($filtro) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> buscar($filtro));
        $vistas = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($vistas, new Vista ($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }

        $this -> conexion -> cerrar();
        return $vistas;
    }
    
    function eliminar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> VistaDAO -> eliminar());
        $this -> conexion -> cerrar();
    }    

}
