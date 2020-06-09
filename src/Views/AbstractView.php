<?php

namespace EsnTest\Views;

/**
 * Class AbstractView.
 */
class AbstractView {

  /**
   * Twig loader.
   *
   * @var \Twig\Environment
   */
  private $twig;
  
  /**
   * Constructor.
   */
  public function __construct(){
    
    global $_twig;

    $this->twig = $_twig;
  }

  /**
   * Renders the twig template with certain variables.
   *
   * @param string $template
   *   The route that will be added to be loaded.
   * @param array $action
   *   The method within the class that will be executed.
   */
  public final function render($template, $variables = []) {

    echo $this->twig->render($template, $variables);
  }
}
