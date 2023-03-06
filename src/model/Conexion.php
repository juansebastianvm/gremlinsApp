<?php 
class Conexion {

    private $mysqli;
    private $resultado;
    private $estado;

    function getEstado() {
        return $this -> estado;
    }

    function abrir () {
        $host="localhost";
        $user="gremlinsUserDB";
        $pass="Y)ig(hyo5IXe4PV3";
        $db="gremlinsdb";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this -> mysqli = new mysqli ($host,$user,$pass,$db);
        $this -> mysqli -> set_charset("utf8");
    }

    function ejecutar($sql) {
        $this -> resultado = $this -> mysqli -> query($sql);   
        $this -> estado =  mysqli_connect_errno() . " " . mysqli_connect_error();
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
        $this -> estado =  mysqli_connect_errno() . " " . mysqli_connect_error();
    }
 
    function ultimoId() {
        return $this -> mysqli -> insert_id;
    }

}

?>