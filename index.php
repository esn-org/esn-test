<?php

/**
 * @file
 * Autoload files using bootstap autoloader.
 */
require_once 'bootstrap.php';

use EsnTest\Routing\RouterFetcher;

$router = new RouterFetcher();
$router->fetch("\EsnTest\Views");
$router->dispatch();
