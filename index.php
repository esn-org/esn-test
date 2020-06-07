<?php

/**
 * @file
 * Autoload files using bootstap autoloader.
 */
use EsnTest\TestController;

require_once 'bootstrap.php';

global $_twig;

$testController = new TestController();

/* End of area code can be replaced. */
// Render our view.
echo $_twig->render('blocks_solution.twig', [
  'data_t2' => $testController->getNews(),
  'data_t4' => $testController->getData(),
  'num_articles' => $testController->countNews(),
]);
