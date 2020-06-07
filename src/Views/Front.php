<?php

namespace EsnTest\Views;

use EsnTest\Controller\AbstractController;
use EsnTest\TestController;

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

/**
 * Class EsnApi.
 */
class Front extends AbstractController {

  public function index() {

    $testController = new TestController();
    $this->render('blocks_solution.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getData(),
      'num_articles' => $testController->countNews(),
    ]);    
  }
}