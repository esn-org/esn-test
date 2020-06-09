<?php

namespace EsnTest\Views;

use EsnTest\TestController;

/**
 * Class Front.
 *
 * By extending this class from AbstractView, we have available the
 * render() method, that will load the desired twig template with the
 * variables needed.
 */
class Front extends AbstractView {

  /**
   * Frontpage view.
   *
   * @route("")
   *
   * @alias("front")
   */
  public function index() {
    // We call our test controller for the data we need later in twig.
    $testController = new TestController();
    // And we render the data.
    $this->render('blocks_front.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getData(),
      'num_articles' => $testController->countNews(),
    ]);    
  }
}