<?php

namespace EsnTest\Test;

use EsnTest\Views\AbstractView;

/**
 * Class to render any route defined by the annotation of each function.
 *
 * - The route defined in the annotation does not need to start with '/'.
 * - Use $this->render() method to render a given template and its variables,
 *   as per defined in the definition of the function or in the example.
 *
 * @category("views")
 */
final class TestView extends AbstractView {

  /**
   * Frontpage view.
   *
   * Renders the frontpage template used for the explanation and part of the
   * test to perform.
   *
   * @route("")
   * @alias("front")
   */
  public function front() {
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
