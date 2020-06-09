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
   */
  public function index($arguments) {

    $testController = new TestController();
    $this->render('foo.twig', [
      'articles' => $testController->getNews(),
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
