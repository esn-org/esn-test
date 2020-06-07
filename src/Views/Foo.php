<?php

namespace EsnTest\Views;

use EsnTest\Controller\AbstractController;
use EsnTest\TestController;

/**
 * Class EsnApi.
 */
class Foo extends AbstractController {

  public function index($arguments) {

    $testController = new TestController();
    $this->render('blocks_solution.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getData(),
      'num_articles' => $testController->countNews(),
    ]);    
  }
}
