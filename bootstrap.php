<?php

/**
 * @file
 * Bootstrap loader for Twig environment and composer classes.
 */
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

// Load our autoloader if the file exists.
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
  require_once __DIR__ . '/vendor/autoload.php';
}
else {
  echo 'It seems the vendor folder is missing. You need to run some command first.';
  die();
}

// Disable OPcache or other internal caches that might be enabled.
opcache_reset();

// Specify our Twig templates location.
$twigLoader = new FilesystemLoader('templates/');
// Instantiate our Twig.
$_twig = new Environment($twigLoader, ['debug' => true, 'cache' => false, 'auto_reload' => true]);
// Add extra extensions, global twig variables, etc.
$_twig->addExtension(new DebugExtension());

// Just in case the site_url finishes with '/', we dont want it.
$request_scheme = (isset($_SERVER["REQUEST_SCHEME"]) ? $_SERVER["REQUEST_SCHEME"] : 'http');
$site_url =  $request_scheme . '://' . $_SERVER['SERVER_NAME'];
// We remove the last '/' in case there is any.
$site_url = (substr($site_url, -1) === '/' ? substr($site_url, 0, -1) : $site_url);

$_twig->addGlobal('site_url', $site_url);
