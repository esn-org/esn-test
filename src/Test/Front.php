<?php

namespace EsnTest\Test;

use EsnTest\Test\TestController;
use EsnTest\Views\AbstractView;

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
   * @alias("front")
   */
  public function index() {
    // We call our test controller for the data we need later in twig.
    $testController = new TestController();

    // And we render the data.
    $this->render('test/blocks_test.twig', [
      'data_t2' => $testController->getNews(),
      'data_t4' => $testController->getDataT4(),
      'data_t5' => $testController->getDataT5(),
      'num_articles' => $testController->countNews(),
    ]);
  }

}
