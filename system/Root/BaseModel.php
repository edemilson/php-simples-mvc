<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/basemodel.php
 * Propósito: Classe base que os models extenderão
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

namespace Root;
use Root\Database;

class BaseModel {

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($model){
        //Vamos checar se o arquivo existe, se não vamos redirecionar o usuário para uma página de erro
        if (file_exists("application/models/" . $model . ".php")) {
            require_once("application/models/" . $model . ".php");
            $modelClass = ucfirst(strtolower($model)) . "Model";
            $modelActive = new $modelClass();
            return $modelActive;
        } else {
            echo 'erro load model';
            return;
        }

    }

}

?>
