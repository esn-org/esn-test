<?php

namespace EsnTest\Views;

use Twig\Environment;

/**
 * Class to be use as base for the classes we define.
 */
abstract class AbstractView {

  /**
   * Constructor.
   */
  public function __construct(
    protected Environment $twig,
  ) {}

  /**
   * Renders a given twig template with certain variables.
   *
   * @param string $template
   *   The twig template used by the render when loading the route.
   * @param array $variables
   *   The variables (if any) that the twig template might need.
   */
  final public function render(string $template, array $variables = []) {

    echo $this->twig->render($template, $variables);
  }

}
