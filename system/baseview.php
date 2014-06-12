<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/baseview.php
 * Propósito: Classe do nosso objeto view
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

class BaseView {    
    
    public $viewFile;
    
    public function __construct() {

    }
               
    //Mostramos nossa view
    public function output($view, $data) {
       
        $this->dataView = $data;
        
        foreach($data as $key => $value){
            $$key = $value;
        }

        $this->viewFile = "application/views/" . $view. ".php";

        if (file_exists($this->viewFile)) {
            //Exibimos nossa view
            require($this->viewFile);
        } else {
            require("application/views/error/badview.php");
        }
        
    }

}

?>