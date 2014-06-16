<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /controllers/home.php
 * Propósito: Controller home do aplicativo
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

use Root\BaseController;
use Shalintripathi\Rss;

class ReaderController extends BaseController
{
 
    public function index()
    {
        $feedReader = new Rss();
        $data['rssFeed'] = $feedReader->rss("http://www.engadget.com/rss.xml");
        
        $this->view->output('template/header');
        $this->view->output('reader', $data);
        $this->view->output('template/footer');
    }
}

?>
