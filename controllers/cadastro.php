<?php

class CadastroController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        //require("models/home.php");
        //$this->model = new HomeModel();
    }
    
    protected function index()
    {
        echo "teste";
        //$this->view->output($this->model->index());
    }

    protected function sucesso()
    {
        echo "sucesso";
        //$this->view->output($this->model->index());
    }
}

?>
