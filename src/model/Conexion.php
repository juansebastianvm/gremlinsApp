<?php
class Conexion
{

    private $mysqli;
    private $resultado;
    private $estado;
    private $controlador;

    function getEstado()
    {
        return $this->estado;
    }

    function abrir()
    {
        $host = "localhost";
        $user = "gremlinsUserDB";
        $pass = "Y)ig(hyo5IXe4PV3";
        $db = "gremlinsdb";
        /*mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/
        $this->mysqli = new mysqli($host, $user, $pass, $db);
        if (mysqli_connect_errno()) {
            $this->estado = "Falló la conexión: %s\n" . mysqli_connect_error();
        }
        $this->mysqli->set_charset("utf8");

        $this->controlador = new mysqli_driver();
        $this->controlador->report_mode = MYSQLI_REPORT_ERROR;
    }

    function ejecutar($sql)
    {
        try {
            $this->resultado = $this->mysqli->query($sql);
            $this->estado = "OK";
        } catch (mysqli_sql_exception $e) {
            $this->estado = $e->__toString() . " " . mysqli_connect_errno() . " " . mysqli_connect_error();
        }
    }

    function cerrar()
    {
        $this->mysqli->close();
    }

    function numFilas()
    {
        return ($this->resultado != null) ?
            $this->resultado->num_rows : 0;
    }

    function extraer()
    {
        try {
            $resultado = $this->resultado->fetch_row();
            $this->estado = "OK";      
            return $resultado;      
        } catch (mysqli_sql_exception $e) {
            $this->estado = $e->__toString() . " " . mysqli_connect_errno() . " " . mysqli_connect_error();
            return null;
        }

    }

    function ultimoId()
    {
        return $this->mysqli->insert_id;
    }
}
