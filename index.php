<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: index.php
 * Propósito: Página de destino que lida com todas as solicitações
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('bootstrap.php');

$loader = new \Root\Loader(); //Cria nosso loader que irá ler nossos controllers
$controller = $loader->createController(); //Cria o controller que foi solicitado
$controller->executeAction(); //executa o método solicitado e exibe a view formatada

?>