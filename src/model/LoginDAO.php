<?php
class LoginDAO {

    private $USER;

    function __construct($USER = "") {
        $this -> USER = $USER;
    }

    function verificar () {
        return "SELECT GR_USER_ID, USUARIO, GR_ROLE_ID, USER, PASSWORD, (SELECT ROL FROM gr_role WHERE gr_role.gr_role_id = gr_user.gr_role_id) ROL 
        FROM gr_user WHERE USER = '".$this -> USER."' AND ACTIVO = 'S'";        
    }  

}

?>
