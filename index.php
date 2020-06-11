<?php

/**
 * @file
 * Index of our web. No need to have other indexes for other routes.
 */
require_once 'bootstrap.php';

use EsnTest\Routing\RouterFetcher;

// We just declare our router.
$router = new RouterFetcher($_twig);
// Set in which namespace are all the views, that will load automatically
// each of the routes in each methods.
$router->fetch("\EsnTest\Views");
// And dispatch it, the router will do the rest.
$router->dispatch();
