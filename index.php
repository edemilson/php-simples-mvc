<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: index.php
 * Propósito: Página de destino que lida com todas as solicitações
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

//Leitura das classes do sistema
require("system/basecontroller.php");  
require("system/basemodel.php");
require("system/baseview.php");
require("system/database.php");
require("system/loader.php");

$loader = new Loader(); //Cria nosso loader que irá ler nossos controllers
$controller = $loader->createController(); //Cria o controller que foi solicitado
$controller->executeAction(); //executa o método solicitado e exibe a view formatada

?>