<?php
require_once ("Conexion.php");
require_once ("MenuDAO.php");
class Menu {

    private $GR_MENU_ID;
    private $MENU;
    private $GR_USER_ID;

    private $MenuDAO;
    private $conexion; 
    
    private $EstadoTXSQL;

    function __construct($GR_MENU_ID = "", $MENU = "", $GR_USER_ID = "") {

        $this -> GR_MENU_ID = $GR_MENU_ID;
        $this -> MENU = $MENU;
        $this -> GR_USER_ID = $GR_USER_ID;        

        $this -> MenuDAO = new MenuDAO ($GR_MENU_ID, $MENU, $GR_USER_ID);

        $this -> conexion = new Conexion();                                              

    }      

    function setEstadoTXSQL ($EstadoTXSQL) {
        $this -> EstadoTXSQL = $EstadoTXSQL;
    }

    function getEstadoTXSQL () {
        return $this -> EstadoTXSQL;
    }

    function setGR_USER_ID ($GR_USER_ID) {
        $this -> GR_USER_ID = $GR_USER_ID;
    }

    function getGR_USER_ID () {
        return $this -> GR_USER_ID;
    }

    function setGR_MENU_ID ($GR_MENU_ID) {
        $this -> GR_MENU_ID = $GR_MENU_ID;
    }

    function getGR_MENU_ID () {
        return $this -> GR_MENU_ID;
    }

    function setMENU ($MENU) {
        $this -> MENU = $MENU;
    }

    function getMENU () {
        return $this -> MENU;
    }     

    function insertar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function actualizar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    
    function consultar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $num_rows = $this->conexion->numFilas();
        $this -> conexion -> cerrar();

        if ($num_rows > 0) {        

        $this -> GR_MENU_ID = $resultado[0];
        $this -> MENU = $resultado[1];
    }

    return $num_rows;        
    }

    function consultarTodo () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> consultarTodo());
        $this -> EstadoTXSQL = $this -> conexion -> getEstado();
        $roles = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($roles, new Menu ($resultado[0], $resultado[1]));
        }

        $this -> conexion -> cerrar();
        return $roles;
    }
    
    function consultarTodoOrden ($campo, $direccion) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> consultarTodoOrden($campo, $direccion));
        $roles = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($roles, new Menu ($resultado[0], $resultado[1]));
        }

        $this -> conexion -> cerrar();
        return $roles;
    }
    
    function buscar ($filtro) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> buscar($filtro));
        $roles = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($roles, new Menu ($resultado[0], $resultado[1]));
        }

        $this -> conexion -> cerrar();
        return $roles;
    }
    
    function eliminar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> MenuDAO -> eliminar());
        $this -> conexion -> cerrar();
    }    

}

?>