<?php

namespace EsnTest\Views;

use EsnTest\TestController;

/**
 * Class EsnApi.
 */
class Front extends AbstractView {

  /**
   * Returns the needed data for solving task 4.
   *
   * @route("")
   *
   * @alias("front")
   */
  public function index() {

    $testController = new TestController();
    $this->render('blocks_front.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getData(),
      'num_articles' => $testController->countNews(),
    ]);    
  }
}