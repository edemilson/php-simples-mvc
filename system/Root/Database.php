<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/database.php
 * Propósito: Responsavel pela conexão com o banco de dados
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

namespace Root;

class Database {

    protected $connectObject;
    protected $queryString;

    public function __construct()
    { 
	   $this->connect();
    }

    //faz a conexão com o banco de dados
    protected function connect()
    {
        require('application/config/database.php');
        if($database['connect'] == "true"){
            $this->connectObject = new \PDO('mysql:host='.$database['host'].';dbname='.$database['database'], $database['user'], $database['password']);
        }else{
            $this->connectObject == false;
        }
    }

    public function query($query)
    {
        if($this->connectObject != false){
            return $this->connectObject->query($query);
        }else{
            return false;
        }
    }

    public function insert($table=false, $dataArray=false)
    {
        if($table && $dataArray){
            $this->queryString = "INSERT INTO ". $table;
            $this->queryString .= " (".implode(",", array_keys($dataArray)).") ";
            $this->queryString .= " VALUES ";
            $this->queryString .= " ('".implode("','", $dataArray)."') ";
            $this->query($this->queryString);
        }else{
            return false;
        }
    }

}

?>
