<?php

/**
 * @file
 * Bootstrap loader for Twig environment and composer classes.
 */

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Load our autoloader if the file exists.
if (file_exists(__DIR__ . '/vendor/autoload.php')) {

  @require_once __DIR__ . '/vendor/autoload.php';
}
else {
  echo 'It seems the vendor folder is missing. You need to run some command first.';
  die();
}

// Specify our Twig templates location.
$loader = new FilesystemLoader('templates/');
// Instantiate our Twig.
$_twig = new Environment($loader);
