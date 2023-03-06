<?php
class VistaDAO {

    private $GR_VIEW_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $VISTA;
    private $DESCRIPCION;
    private $GR_SUB_MENU_ID;  
    private $VENTANA;    
    private $GR_USER_ID;  

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

    }

    function insertar () {
        return "INSERT INTO gr_view (ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, VISTA, DESCRIPCION) 
                VALUES ('".$this -> ACTIVO."',".$this -> ACTUALIZADO_POR.",'".$this -> ULTIMA_ACTUALIZACION."','".$this -> VISTA."',
                        '".$this -> DESCRIPCION."')";
    }

    function actualizar () {
        return "UPDATE gr_view SET ACTIVO='".$this -> ACTIVO."',ACTUALIZADO_POR=".$this -> ACTUALIZADO_POR.",ULTIMA_ACTUALIZACION='".$this -> ULTIMA_ACTUALIZACION."',
                       VISTA='".$this -> VISTA."',DESCRIPCION='".$this -> DESCRIPCION."' WHERE GR_VIEW_ID = ".$this -> GR_VIEW_ID;
    }

    function consultar () {
        return "SELECT GR_VIEW_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, VISTA, DESCRIPCION 
        FROM gr_view WHERE GR_VIEW_ID = ".$this -> GR_VIEW_ID;        
    }

    function consultarTodo () {
        return "SELECT GR_VIEW_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, VISTA, DESCRIPCION
        FROM gr_view";            
    }  

    function consultarTodoMenu () {    
        return "SELECT GR_VIEW_ID, ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, VISTA, DESCRIPCION, GR_SUB_MENU_ID, VENTANA
        FROM permisosMenus WHERE gr_user_id = ".$this -> GR_USER_ID." AND GR_SUB_MENU_ID = ".$this -> GR_SUB_MENU_ID." GROUP BY GR_VIEW_ID, gr_sub_menu_id, submenu, gr_menu_id, menu ORDER BY 1";       
    }      

    function consultarTodoOrden ($campo, $direccion) {
        return "SELECT GR_VIEW_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, VISTA, DESCRIPCION
        FROM gr_view WHERE GR_VIEW_ID = ".$this -> GR_VIEW_ID." ORDER BY ".$campo." ".$direccion."";            
    }    

    function buscar ($filtro) {
        return "SELECT GR_VIEW_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, VISTA, DESCRIPCION
        FROM gr_view WHERE VISTA LIKE '%".$filtro."%'";      
    }    

    function eliminar () {
        return "DELETE FROM gr_view WHERE GR_VIEW_ID = ".$this -> GR_VIEW_ID;  
    }    

}

?>