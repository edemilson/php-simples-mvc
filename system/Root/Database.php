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

    public function __construct()
    { 
	   $this->connect();
    }

    //faz a conexão com o banco de dados
    protected function connect() {
        require('application/config/database.php');
        if($database['connect'] == "true"){
            $this->connectObject = new \PDO('mysql:host='.$database['host'].';dbname='.$database['database'], $database['user'], $database['password']);
        }else{
            $this->connectObject == false;
        }
    }

    public function query($query){
        if($this->connectObject != false){
            return $this->connectObject->query($query);
        }else{
            echo "Nao conectado no banco de dados";
            return;
        }
    }

}

?>
