<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/baseview.php
 * Propósito: Classe do nosso objeto view
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

namespace Root;

class BaseView {    
    
    public $viewFile;
    
    //Mostramos nossa view
    public function output($view="", $data="") 
    {
        $this->dataView = $data;
        
        if(is_array($data)){
            foreach($data as $key => $value){
                $$key = $value;
            }
        }

        $this->viewFile = "application/views/" . $view. ".php";

        if (file_exists($this->viewFile)) {
            //Exibimos nossa view
            require_once($this->viewFile);
        } else {
            require_once("application/views/error/badview.php");
        }
        
    }

}

?>