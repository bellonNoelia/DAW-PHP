<?php

class PDODB
{
    private $host;
    private $usuario;
    private $pass;
    private $db;

    private $connection;

    function __construct($host, $usuario, $pass, $db)
    {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->db = $db;
    }

    function connect()
    {

        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        );

        $this->connection = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->db,
            $this->usuario,
            $this->pass,
            $opciones
        );
    }

    //getData($sql): devuelve un dato concreto
    function getData($sql)
    {

        $data = array();
        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        //Si la posición 0 es igual a 5 ceros es que se ha realizado corectamente.
        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    array_push($data, $row);
                }
            }
        } else {
            //En el [2] nos da la información del error.
            throw new Exception($error[2]);
        }
        return $data;
    }
    // numRows($sql): devuelve el numero de filas
    function numRows($sql)
    {
        $result = $this->connection->query($sql);
        $error = $this->connection->errorInfo();
        //Si la posición 0 es igual a 5 ceros es que se ha realizado corectamente.
        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount();
        } else {
            //En el [2] nos da la información del error.
            throw new Exception($error[2]);
        }
    }
    //  getDataSingle($sql): devuelve un dato concreto
    function getDataSingle($sql)
    {

        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        //Si la posición 0 es igual a 5 ceros es que se ha realizado corectamente.
        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        } else {
            //En el [2] nos da la información del error.
            throw new Exception($error[2]);
        }
        return null;
    }


    function getDataSingleProp($sql, $prop)
    {

        $result = $this->connection->query($sql);
        $error = $this->connection->errorInfo();
        //Si la posición 0 es igual a 5 ceros es que se ha realizado corectamente.
        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                $data = $result->fetch(PDO::FETCH_ASSOC);
                return $data[$prop];
            }
        } else {
            //En el [2] nos da la información del error.
            throw new Exception($error[2]);
        }
        return null;
    }
    //executeInstruction($sql): inserta, actualiza o elimina registros
    function executeInstruction($sql)
    {

        $result = $this->connection->query($sql);
        $error = $this->connection->errorInfo();
        //Si la posición 0 es igual a 5 ceros es que se ha realizado corectamente.
        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount() > 0;
        } else {
            //En el [2] nos da la información del error.
            throw new Exception($error[2]);
        }
    }
    // close(): Cierra la base de datos
    function close()
    {
        $this->connection = null;
    }
    //getLastId(): Devuelve el ultimo id insertado
    function getLastId()
    {
        return $this->connection->lastInsertId();
    }
}
