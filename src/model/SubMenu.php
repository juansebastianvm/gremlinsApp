<?php
require_once ("Conexion.php");
require_once ("SubMenuDAO.php");
class SubMenu {

    private $GR_SUB_MENU_ID;
    private $SUBMENU; 
    private $GR_MENU_ID;
    private $ICONO;     
    private $GR_USER_ID;   

    private $SubMenuDAO;
    private $conexion;  

    function __construct($GR_SUB_MENU_ID = "", $SUBMENU = "", $GR_MENU_ID = "", $ICONO = "", $GR_USER_ID = "") {

        $this -> GR_SUB_MENU_ID = $GR_SUB_MENU_ID;
        $this -> SUBMENU = $SUBMENU;
        $this -> GR_MENU_ID = $GR_MENU_ID;
        $this -> ICONO = $ICONO;                
        $this -> GR_USER_ID = $GR_USER_ID;        

        $this -> SubMenuDAO = new SubMenuDAO ($GR_SUB_MENU_ID, $SUBMENU, $GR_MENU_ID, $ICONO, $GR_USER_ID);

        $this -> conexion = new Conexion();                                              

    }      

    function setICONO ($ICONO) {
        $this -> ICONO = $ICONO;
    }

    function getICONO () {
        return $this -> ICONO;
    }

    function setGR_MENU_ID ($GR_MENU_ID) {
        $this -> GR_MENU_ID = $GR_MENU_ID;
    }

    function getGR_MENU_ID () {
        return $this -> GR_MENU_ID;
    }

    function setGR_USER_ID ($GR_USER_ID) {
        $this -> GR_USER_ID = $GR_USER_ID;
    }

    function getGR_USER_ID () {
        return $this -> GR_USER_ID;
    }

    function setGR_SUB_MENU_ID ($GR_SUB_MENU_ID) {
        $this -> GR_SUB_MENU_ID = $GR_SUB_MENU_ID;
    }

    function getGR_SUB_MENU_ID () {
        return $this -> GR_SUB_MENU_ID;
    }

    function setSUBMENU ($SUBMENU) {
        $this -> SUBMENU = $SUBMENU;
    }

    function getSUBMENU () {
        return $this -> SUBMENU;
    }     

    function insertar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function actualizar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    
    function consultar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $num_rows = $this->conexion->numFilas();
        $this -> conexion -> cerrar();

        if ($num_rows > 0) {        

        $this -> GR_SUB_MENU_ID = $resultado[0];
        $this -> SUBMENU = $resultado[1];
    }

    return $num_rows;        
    }

    function consultarTodo () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> consultarTodo());
        $submenus = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($submenus, new SubMenu ($resultado[0], $resultado[1], $resultado[2], $resultado[3]));
        }

        $this -> conexion -> cerrar();
        return $submenus;
    }
    
    function consultarTodoOrden ($campo, $direccion) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> consultarTodoOrden($campo, $direccion));
        $submenus = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($submenus, new SubMenu ($resultado[0], $resultado[1]));
        }

        $this -> conexion -> cerrar();
        return $submenus;
    }
    
    function buscar ($filtro) {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> buscar($filtro));
        $submenus = array ();
        while ($resultado = $this -> conexion -> extraer()) {
            array_push($submenus, new SubMenu ($resultado[0], $resultado[1]));
        }

        $this -> conexion -> cerrar();
        return $submenus;
    }
    
    function eliminar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SubMenuDAO -> eliminar());
        $this -> conexion -> cerrar();
    }    

}

?>