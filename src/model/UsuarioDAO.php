<?php
class UsuarioDAO {

    private $GR_USER_ID;
    private $ACTIVO;
    private $ACTUALIZADO_POR;
    private $ULTIMA_ACTUALIZACION;
    private $USUARIO;
    private $DESCRIPCION;
    private $GR_ROLE_ID;
    private $USER;
    private $PASSWORD;
    private $ROL;

    function __construct($GR_USER_ID = "", $ACTIVO  = "", $ACTUALIZADO_POR = "",$ULTIMA_ACTUALIZACION = "",
                            $USUARIO = "",$DESCRIPCION = "",$GR_ROLE_ID = "",$USER = "",$PASSWORD = "",$ROL = "") {

        $this -> GR_USER_ID = $GR_USER_ID;
        $this -> ACTIVO = $ACTIVO;
        $this -> ACTUALIZADO_POR = $ACTUALIZADO_POR;
        $this -> ULTIMA_ACTUALIZACION = $ULTIMA_ACTUALIZACION;
        $this -> USUARIO = $USUARIO;
        $this -> DESCRIPCION = $DESCRIPCION;
        $this -> GR_ROLE_ID = $GR_ROLE_ID;
        $this -> USER = $USER;
        $this -> PASSWORD = $PASSWORD;
        $this -> ROL = $ROL;

    }

    function insertar () {
            return "INSERT INTO gr_user (ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, USUARIO, DESCRIPCION, GR_ROLE_ID, USER, PASSWORD) 
            VALUES ('".$this -> ACTIVO."',".$this -> ACTUALIZADO_POR.",'".$this -> ULTIMA_ACTUALIZACION."','".$this -> USUARIO."',
                    '".$this -> DESCRIPCION."',".$this -> GR_ROLE_ID.",'".$this -> USER."','".$this -> PASSWORD."')";
    }

    function actualizar () {
        if ($this -> PASSWORD == "*") {        
            return "UPDATE gr_user SET ACTIVO='".$this -> ACTIVO."',ACTUALIZADO_POR=".$this -> ACTUALIZADO_POR.",ULTIMA_ACTUALIZACION='".$this -> ULTIMA_ACTUALIZACION."',
            USUARIO='".$this -> USUARIO."',DESCRIPCION='".$this -> DESCRIPCION."',GR_ROLE_ID=".$this -> GR_ROLE_ID.",USER='".$this -> USER."' 
            WHERE GR_USER_ID = ".$this -> GR_USER_ID;
        } else {
            return "UPDATE gr_user SET ACTIVO='".$this -> ACTIVO."',ACTUALIZADO_POR=".$this -> ACTUALIZADO_POR.",ULTIMA_ACTUALIZACION='".$this -> ULTIMA_ACTUALIZACION."',
            USUARIO='".$this -> USUARIO."',DESCRIPCION='".$this -> DESCRIPCION."',GR_ROLE_ID=".$this -> GR_ROLE_ID.",USER='".$this -> USER."',
            PASSWORD='".$this -> PASSWORD."' WHERE GR_USER_ID = ".$this -> GR_USER_ID;                        
        }
    }

    function consultar () {
        return "SELECT GR_USER_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, USUARIO, DESCRIPCION, GR_ROLE_ID, USER, PASSWORD, 
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_user.gr_role_id) ROL FROM gr_user WHERE GR_USER_ID = ".$this -> GR_USER_ID;        
    }

    function consultarTodo () {
        return "SELECT GR_USER_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, USUARIO, DESCRIPCION, GR_ROLE_ID, USER, PASSWORD,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_user.gr_role_id) ROL FROM gr_user";            
    }  

    function consultarTodoOrden ($campo, $direccion) {
        return "SELECT GR_USER_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, USUARIO, DESCRIPCION, GR_ROLE_ID, USER, PASSWORD,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_user.gr_role_id) ROL FROM gr_user WHERE GR_USER_ID = ".$this -> GR_USER_ID." ORDER BY ".$campo." ".$direccion."";            
    }    

    function buscar ($filtro) {
        return "SELECT GR_USER_ID, (CASE WHEN ACTIVO = 'S' THEN 'Activo' ELSE 'Inactivo' END) ACTIVO, ACTUALIZADO_POR, ULTIMA_ACTUALIZACION, USUARIO, DESCRIPCION, GR_ROLE_ID, USER, PASSWORD,
        (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_user.gr_role_id) ROL FROM gr_user WHERE USUARIO LIKE '%".$filtro."%' OR USER LIKE '%".$filtro."%'";      
    }    

    function eliminar () {
        return "DELETE FROM gr_user WHERE GR_USER_ID = ".$this -> GR_USER_ID;  
    }    

}

?>