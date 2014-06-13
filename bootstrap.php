<?php

/* 
 * Projeto: PHPEtec
 * Arquivo: bootstrap.php
 * Propósito: Iniciando nossas classes pelo autoload
 * Author: Edemilson Goncalves
 * Email: ede.goncalves88@gmail.com
 */

define('LIBRARY_PATH', 'application'. DIRECTORY_SEPARATOR .'libraries');
define('SYSTEM_PATH', 'system');

set_include_path(implode(PATH_SEPARATOR, array(
    LIBRARY_PATH,
    SYSTEM_PATH,
    get_include_path(),
)));

spl_autoload_register(
	function($className) {
	    $filename = strtr($className, '\\', DIRECTORY_SEPARATOR) . '.php';
	    foreach (explode(PATH_SEPARATOR, get_include_path()) as $path) {
	        $path .= DIRECTORY_SEPARATOR . $filename;
	        if (is_file($path)) {
	            require_once $path;
	            return true;
	        }
	    }
	    return false;
	}
);

?>