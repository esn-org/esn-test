<?php

namespace EsnTest\Views;

use Twig\Environment;

/**
 * Class AbstractView.
 */
class AbstractView {

  /**
   * Constructor.
   */
  public function __construct(
    private Environment $twig,
  ) {}

  /**
   * Renders the twig template with certain variables.
   *
   * @param string $template
   *   The route that will be added to be loaded.
   * @param array $action
   *   The method within the class that will be executed.
   */
  final public function render(string $template, array $variables = []) {

    echo $this->twig->render($template, $variables);
  }

}
