<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/basecontroller.php
 * Propósito: Classe abstrata que os controllers extendem
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

class BaseController {
    
    public $urlValues;
    public $action;
    public $model;
    public $view;    
    
    public function __construct($action) {
        if($action){
            $this->action = $action;
        }
    }
        
    //Executa o método requisitado
    public function executeAction() {
        //Criando nosso objeto view
        $this->view = new BaseView();
        $this->model = new BaseModel();
        return $this->{$this->action}($this->urlValues['param1'], $this->urlValues['param2'], $this->urlValues['param3']);
    }
}

?>
