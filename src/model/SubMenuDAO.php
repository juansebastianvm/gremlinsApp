<?php
class SubMenuDAO {

    private $GR_SUB_MENU_ID;
    private $SUBMENU; 
    private $GR_MENU_ID;
    private $ICONO;     
    private $GR_USER_ID;       

    function __construct($GR_SUB_MENU_ID = "", $SUBMENU = "", $GR_MENU_ID = "", $ICONO = "", $GR_USER_ID = "") {

        $this -> GR_SUB_MENU_ID = $GR_SUB_MENU_ID;
        $this -> SUBMENU = $SUBMENU;
        $this -> GR_MENU_ID = $GR_MENU_ID;  
        $this -> ICONO = $ICONO;              
        $this -> GR_USER_ID = $GR_USER_ID;  

    }

    function insertar () {
        return "INSERT INTO gr_sub_menu (SUBMENU, GR_MENU_ID, ICONO) 
                VALUES ('".$this -> SUBMENU."',".$this -> GR_MENU_ID.",'".$this -> ICONO."')";
    }

    function actualizar () {
        return "UPDATE gr_sub_menu SET SUBMENU='".$this -> SUBMENU."', ICONO='".$this -> ICONO."' WHERE GR_SUB_MENU_ID = ".$this -> GR_SUB_MENU_ID;
    }

    function consultar () {
        return "SELECT GR_SUB_MENU_ID, SUBMENU, GR_MENU_ID, ICONO
        FROM gr_sub_menu WHERE GR_MENU_ID = ".$this -> GR_MENU_ID;        
    }

    function consultarTodo () {
        return "SELECT gr_sub_menu_id, submenu, gr_menu_id, icono FROM permisosmenus 
        WHERE gr_user_id = ".$this -> GR_USER_ID." AND gr_menu_id = ".$this -> GR_MENU_ID." GROUP BY gr_sub_menu_id, submenu, icono, gr_menu_id, menu ORDER BY 1";            
    }  

    function consultarTodoOrden ($campo, $direccion) {
        return "SELECT GR_SUB_MENU_ID, SUBMENU, GR_MENU_ID, ICONO
        FROM gr_sub_menu WHERE GR_SUB_MENU_ID = ".$this -> GR_SUB_MENU_ID." ORDER BY ".$campo." ".$direccion."";            
    }    

    function buscar ($filtro) {
        return "SELECT GR_SUB_MENU_ID, SUBMENU, GR_MENU_ID, ICONO
        FROM gr_sub_menu WHERE SUBMENU LIKE '%".$filtro."%'";      
    }    

    function eliminar () {
        return "DELETE FROM gr_sub_menu WHERE GR_SUB_MENU_ID = ".$this -> GR_SUB_MENU_ID;  
    }    

}

?>