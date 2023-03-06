<?php
class MenuDAO {

    private $GR_MENU_ID;
    private $MENU;
    private $GR_USER_ID;

    function __construct($GR_MENU_ID = "", $MENU = "", $GR_USER_ID = "") {

        $this -> GR_MENU_ID = $GR_MENU_ID;
        $this -> MENU = $MENU;
        $this -> GR_USER_ID = $GR_USER_ID;        

    }

    function insertar () {
        return "INSERT INTO gr_menu (MENU) 
                VALUES ('".$this -> MENU."')";
    }

    function actualizar () {
        return "UPDATE gr_menu SET MENU='".$this -> MENU."' WHERE GR_MENU_ID = ".$this -> GR_MENU_ID;
    }

    function consultar () {
        return "SELECT GR_MENU_ID, MENU
        FROM gr_menu WHERE GR_MENU_ID = ".$this -> GR_MENU_ID;        
    }

    function consultarTodo () {
        return "SELECT gr_menu_id, menu FROM permisosMenus WHERE gr_user_id = ".$this -> GR_USER_ID." GROUP BY gr_menu_id, menu ORDER BY 1";            
    }  

    function consultarTodoOrden ($campo, $direccion) {
        return "SELECT GR_MENU_ID, MENU
        FROM gr_menu WHERE GR_MENU_ID = ".$this -> GR_MENU_ID." ORDER BY ".$campo." ".$direccion."";            
    }    

    function buscar ($filtro) {
        return "SELECT GR_MENU_ID, MENU, DESCRIPCION
        FROM gr_menu WHERE MENU LIKE '%".$filtro."%'";      
    }    

    function eliminar () {
        return "DELETE FROM gr_menu WHERE GR_MENU_ID = ".$this -> GR_MENU_ID;  
    }    

}

?>