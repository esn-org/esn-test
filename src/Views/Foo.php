<?php

namespace EsnTest\Views;

use EsnTest\TestController;

/**
 * Class EsnApi.
 */
class Foo extends AbstractView {

  /**
   * Returns the needed data for solving task 4.
   *
   * @route("foo")
   *
   * @alias("metoo")
   */
  public function index($arguments) {

    $testController = new TestController();
    $this->render('blocks_solution.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getData(),
      'num_articles' => $testController->countNews(),
    ]);    
  }

  /**
   * Returns the needed data for solving task 4.
   *
   * @route("foo/{slug}")
   */
  public function foo() {
  
  }
}
