<?php
class RolDAO {

    private $GR_ROLE_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $ROL;
    private $DESCRIPCION;

    function __construct($GR_ROLE_ID = "", $ACTIVO  = "", $ACTUALIZADO_POR = "",$ULTIMA_ACTUALIZACION = "",
                            $ROL = "",$DESCRIPCION = "") {

        $this -> GR_ROLE_ID = $GR_ROLE_ID;
        $this -> ACTIVO = $ACTIVO;
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this -> ROL = $ROL;
        $this -> DESCRIPCION = $DESCRIPCION;

    }

    function insertar () {
        return "INSERT INTO gr_role (ACTIVO, ACTUALIZADO_POR, ROL, DESCRIPCION) 
                VALUES ('".$this -> ACTIVO."',".$this -> ACTUALIZADO_POR.",'".$this -> ROL."',
                        '".$this -> DESCRIPCION."')";
    }

    function actualizar () {
        return "UPDATE gr_role SET ACTIVO='".$this -> ACTIVO."',ACTUALIZADO_POR=".$this -> ACTUALIZADO_POR.",
                       ROL='".$this -> ROL."',DESCRIPCION='".$this -> DESCRIPCION."' WHERE GR_ROLE_ID = ".$this -> GR_ROLE_ID;
    }

    function consultar () {
        return "SELECT GR_ROLE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, ROL, DESCRIPCION 
        FROM gr_role WHERE GR_ROLE_ID = ".$this -> GR_ROLE_ID;        
    }

    function consultarTodo () {
        return "SELECT GR_ROLE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, ROL, DESCRIPCION
        FROM gr_role";            
    }  

    function consultarTodoOrden ($campo, $direccion) {
        return "SELECT GR_ROLE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, ROL, DESCRIPCION
        FROM gr_role WHERE GR_ROLE_ID = ".$this -> GR_ROLE_ID." ORDER BY ".$campo." ".$direccion."";            
    }    

    function buscar ($filtro) {
        return "SELECT GR_ROLE_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, ROL, DESCRIPCION
        FROM gr_role WHERE ROL LIKE '%".$filtro."%'";      
    }    

    function eliminar () {
        return "DELETE FROM gr_role WHERE GR_ROLE_ID = ".$this -> GR_ROLE_ID;  
    }    

}

?>