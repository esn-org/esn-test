<?php

namespace EsnTest\Test;

use EsnTest\Views\AbstractView;
use Twig\Environment;

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
   * TestController object.
   */
  protected TestController $testController;

  /**
   * Contructor.
   */
  public function __construct(
    protected Environment $twig,
  ) {

    parent::__construct($twig);
    // We load here the controllers that are needed.
    $this->testController = new TestController();
  }

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

    // And we render the data.
    $this->render('test/blocks_test.twig', [
      'articles' => $this->testController->getArticles(),
      'data_t4' => $this->testController->getDataT4(),
      'data_t5' => $this->testController->getDataT5(),
      'num_articles' => $this->testController->countArticles(),
    ]);
  }

}
