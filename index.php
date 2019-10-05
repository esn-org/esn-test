<?php

/**
 * @file
 * Autoload files using bootstap autoloader.
 */

require_once 'bootstrap.php';

use EsnTest\TestController;

global $_twig;

$testController = new TestController();
/* Replace code here (if needed). */

$output_test = $testController->render();

/* End of area code can be replaced. */
// Render our view.
echo $_twig->render('block.twig', ['output_t4' => $output_test]);
