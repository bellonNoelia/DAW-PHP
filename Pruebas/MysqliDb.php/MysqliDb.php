<?php

class MySqlDB
{

    private $host = "localhost";
    private $user = "gestor";
    private $pass = "secreto";
    private $dbname = "proyecto";

    private $connection;

    function __construct()
    {
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        $this->connection->set_charset("utf8");
    }
    //executeQuery: Dado un sql, nos devuelve datos de la consulta.
    function executeQuery($sql)
    {
        $data = array();
        $result = mysqli_query($this->connection, $sql);
        $error = mysqli_error($this->connection);
        if (empty($error)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($data, $row);
                }
                return $data;
            }
        } else {
            echo "Error " . mysqli_error($this->connection);
        }
    }
    //numRows: Dado un sql, devuelve el numero de filas de la consulta.
    function numRows($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        $error = mysqli_error($this->connection);
        if (empty($error)) {
            return mysqli_num_rows($result);
        } else {
            echo "Error " . mysqli_error($this->connection);
        }
    }

    //getDataSingle: Dado un sql, nos devuelve la primera fila.
    function getDataSingle($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        $error = mysqli_error($this->connection);
        if (empty($error)) {
            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            }
            return null;
        } else {
            echo "Error " . mysqli_error($this->connection);
        }
    }


    //executeInstruction: Dado un sql, devuelve el numero de filas afectadas.
    function executeInstruction($sql)
    {
        $consulta = mysqli_query($this->connection, $sql);
        $error = mysqli_error($this->connection);
        if (empty($error)) {
            return $consulta;
        } else {
            echo "Error " . mysqli_error($this->connection);
        }
    }

    //getLastId: Devuelve el ultimo id insertado.
    function getLastId()
    {
        return mysqli_insert_id($this->connection);
    }

    //close: Cierra la conexion.
    function close()
    {
        mysqli_close($this->connection);
    }
}


$db = new MySqlDB();

$data = $db->executeQuery("SELECT * FROM products");
print_r($data);

$db->close();
