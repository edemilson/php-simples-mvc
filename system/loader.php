<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: /classes/loader.php
 * Propósito: Classe responsável em mapear a URL para criação do controller
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

class Loader {
    
    private $controllerName;
    private $controllerClass;
    private $action;
    private $urlValues;
    
    //Pagaremos os parametros da URL para criarmos nosso controller
    public function __construct() {

        //Pega os dados da URL
        $this->urlValues = $_GET;
        
        //Vamos verificar se o controller existe, caso não iremos utilizar o controller home como default
        if ($this->urlValues['controller'] == "") {
            $this->controllerName = "home";
            $this->controllerClass = "HomeController";
        } else {
            //Se existir vamos gravar seu nome nas variáveis
            //strtolower deixo todo o conteúdo da string minusculo.
            $this->controllerName = strtolower($this->urlValues['controller']);
            //ucfirst deixo o primeiro caracter da string maiusculo.
            $this->controllerClass = ucfirst(strtolower($this->urlValues['controller'])) . "Controller";
        }
        //Vamos verificar qual método estamos chamando, se não existir por default chamaremos o index
        if ($this->urlValues['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = $this->urlValues['action'];
        }
    }
                  
    //Esse é nosso método responsavel pela criação do controller
    public function createController() {
        //Vamos checar se o arquivo existe, se não vamos redirecionar o usuário para uma página de erro
        if (file_exists("application/controllers/" . $this->controllerName . ".php")) {
            require("application/controllers/" . $this->controllerName . ".php");
        } else {
            require("application/controllers/error.php");
            return new ErrorController("badurl",$this->urlValues);
        }
                
        //É preciso também verificar se a classe existe no arquivo
        if (class_exists($this->controllerClass)) {
            $parents = class_parents($this->controllerClass);
            
            //É preciso saber também se ela herdou a classe BaseController
            if (in_array("BaseController",$parents)) {   
                //E se a classe contém o método que estamos procurando.
                if (method_exists($this->controllerClass,$this->action))
                {
                    //return new $this->controllerClass($this->action,$this->urlValues);
                    $controllerActive = new $this->controllerClass();
                    $controllerActive->action = $this->action;
                    $controllerActive->urlValues = $this->urlValues;
                    return $controllerActive;
                } else {
                    //Se o método não existe, redirecionamos para o nossa página de erro
                    require("application/controllers/error.php");
                    return new ErrorController("badurl",$this->urlValues);
                }
            } else {
                //Se não herdou do BaseController, redirecionamos para o nossa página de erro 
                require("application/controllers/error.php");
                return new ErrorController("badurl",$this->urlValues);
            }
        } else {
            //Se a classe não existe no arquivo, redirecionamos para o nossa página de erro 
            require("application/controllers/error.php");
            return new ErrorController("badurl",$this->urlValues);
        }
    }
}

?>