<?php 
class Conexion {

    private $mysqli;
    private $resultado;

    function abrir () {
        $host="localhost";
        $user="gremlinsUserDB";
        $pass="Y)ig(hyo5IXe4PV3";
        $db="gremlinsdb";
        $this -> mysqli = new mysqli ($host,$user,$pass,$db);
        $this -> mysqli -> set_charset("utf8");
    }

    function ejecutar($sql) {
        $this -> resultado = $this -> mysqli -> query($sql);        
    }

    function cerrar() {
        $this -> mysqli -> close();
    }

    function numFilas() {
        return ($this -> resultado != null) ?
                $this -> resultado -> num_rows : 0;
    }

    function extraer() {
        return $this -> resultado -> fetch_row();
    }
 
    function ultimoId() {
        return $this -> mysqli -> insert_id;
    }

}

?>