<?php

/**
 * @file
 * Autoload files using bootstap autoloader.
 */

use EsnTest\Routing\Router;

require_once 'bootstrap.php';

// use EsnTest\TestController;

// global $_twig;

// $testController = new TestController();

// /* End of area code can be replaced. */
// // Render our view.
// echo $_twig->render('blocks_solution.twig', [
//   'data_t2' => $testController->getNews(),
//   'data_t4' => $testController->getData(),
//   'num_articles' => $testController->countNews(),
// ]);
$router = new Router();

$router->add('', 'EsnTest\Views\Front::index');
$router->add('foo', 'EsnTest\Views\Foo::index');
$router->add('foo/{slug}', 'EsnTest\Views\Foo::index');

$router->dispatch();