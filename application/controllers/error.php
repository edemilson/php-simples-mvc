<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /controllers/error.php
 * Propósito: Controller de erro do aplicativo
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

use Root\BaseController;

class ErrorController extends BaseController
{   
    
    public function index()
    {
        $this->view->output('template/header');
        $this->view->output('template/404');
        $this->view->output('template/footer');
    }
}

?>
