<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/database.php
 * Propósito: Responsavel pela conexão com o banco de dados
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

class Database {

    protected $connectObject;

    public function __construct()
    { 
	   $this->connect();
    }

    //faz a conexão com o banco de dados
    protected function connect() {
       $this->connectObject = new PDO('mysql:host=localhost;dbname=phpetec', 'root', 'kgb8y2k');
    }

    public function query($query){
        return $this->connectObject->query($query);
    }

}

?>
