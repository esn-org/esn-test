<?php

/**
 * Autoload.
 *
 * Loads all the classes we may use in the code automatically
 * We have to declare each class with the proper namespace and also especify that when using the class
 *
 * @file /autoload.php  
 * @author Gorka Guerrero Ruiz <web-developer@esn.org>
 * @version 1.0
 */

define('BASE_PATH', realpath(dirname(__FILE__)));

spl_autoload_register( function ($class){
  $filename = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
  if (file_exists($filename)){
    include($filename);  
  }
});