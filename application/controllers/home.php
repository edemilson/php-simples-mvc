<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /controllers/home.php
 * Propósito: Controller home do aplicativo
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

class HomeController extends BaseController
{
 
    public function __construct() {
        parent::__construct();
        
    }
    
    
    public function index()
    {

        $result = $this->model->load('home')->getData();

        foreach ($result as $value) {
            echo $value['nome'];
        }

        $this->view->output('template/header');
        $this->view->output('home');
        $this->view->output('template/footer');
    }
}

?>
