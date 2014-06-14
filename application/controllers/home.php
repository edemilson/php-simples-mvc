<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /controllers/home.php
 * Propósito: Controller home do aplicativo
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

use Root\BaseController;

class HomeController extends BaseController
{
 
    public function index()
    {

        $result = $this->model->load('home')->getData();

        if($result){
            foreach ($result as $value) {
                echo $value['nome'];
            }
        }

        $this->view->output('template/header');
        $this->view->output('home');
        $this->view->output('template/footer');
    }
}

?>
