<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /application/model/home.php
 * Propósito: model teste
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

use Root\BaseModel;

class HomeModel extends BaseModel{

    public function getData(){
        return $this->db->query("SELECT * FROM usuarios");
    }

}

?>
