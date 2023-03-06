<?php
class VistaDetalleDAO {

    private $GR_VIEW_LINE_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $GR_VIEW_ID;
    private $GR_ROLE_ID;

    function __construct($GR_VIEW_LINE_ID = "", $ACTIVO  = "", $ACTUALIZADO_POR = "",$ULTIMA_ACTUALIZACION = "",
                            $GR_VIEW_ID = "",$GR_ROLE_ID = "") {

        $this -> GR_VIEW_LINE_ID = $GR_VIEW_LINE_ID;
        $this -> ACTIVO = $ACTIVO;
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this -> GR_VIEW_ID = $GR_VIEW_ID;
        $this -> GR_ROLE_ID = $GR_ROLE_ID;

    }

    function insertar () {
        return "INSERT INTO gr_view_line (ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, GR_VIEW_ID, GR_ROLE_ID) 
                VALUES ('".$this -> ACTIVO."',".$this -> ACTUALIZADO_POR.",'".$this -> ULTIMA_ACTUALIZACION."','".$this -> GR_VIEW_ID."',
                        '".$this -> GR_ROLE_ID."')";
    }

    function actualizar () {
        return "UPDATE gr_view_line SET ACTIVO='".$this -> ACTIVO."',ACTUALIZADO_POR=".$this -> ACTUALIZADO_POR.",ULTIMA_ACTUALIZACION='".$this -> ULTIMA_ACTUALIZACION."',
                       GR_VIEW_ID='".$this -> GR_VIEW_ID."',GR_ROLE_ID='".$this -> GR_ROLE_ID."' WHERE GR_VIEW_LINE_ID = ".$this -> GR_VIEW_LINE_ID;
    }

    function consultar () {
        return "SELECT GR_VIEW_LINE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, GR_VIEW_ID, GR_ROLE_ID,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_view_line.gr_role_id) ROL 
        FROM gr_view_line WHERE GR_VIEW_LINE_ID = ".$this -> GR_VIEW_LINE_ID;        
    }

    function consultarTodo () {
        return "SELECT GR_VIEW_LINE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, GR_VIEW_ID, GR_ROLE_ID,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_view_line.gr_role_id) ROL 
        FROM gr_view_line WHERE GR_VIEW_ID = ".$this -> GR_VIEW_ID;              
    }  

    function consultarTodoOrden ($campo, $direccion) {
        return "SELECT GR_VIEW_LINE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, GR_VIEW_ID, GR_ROLE_ID,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_view_line.gr_role_id) ROL 
        FROM gr_view_line WHERE GR_VIEW_LINE_ID = ".$this -> GR_VIEW_LINE_ID." ORDER BY ".$campo." ".$direccion."";            
    }    

    function buscar ($filtro) {
        return "SELECT GR_VIEW_LINE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, GR_VIEW_ID, GR_ROLE_ID,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_view_line.gr_role_id) ROL 
        FROM gr_view_line WHERE GR_VIEW_ID LIKE '%".$filtro."%'";      
    }    

    function eliminar () {
        return "DELETE FROM gr_view_line WHERE GR_VIEW_LINE_ID = ".$this -> GR_VIEW_LINE_ID;  
    }    

}

?>