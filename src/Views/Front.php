<?php

namespace EsnTest\Views;

use EsnTest\TestController;

/**
 * Class EsnApi.
 */
class Front extends AbstractView {

  public function index() {

    $testController = new TestController();
    $this->render('blocks_solution.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getData(),
      'num_articles' => $testController->countNews(),
    ]);    
  }
}