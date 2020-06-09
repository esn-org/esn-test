<?php

namespace EsnTest\Views;

/**
 * Class AbstractView.
 */
class AbstractView {

  public $twig;
  

  public function __construct(){
    
    global $_twig;

    $this->twig = $_twig;
  }


  public final function render($template, $variables) {

    echo $this->twig->render($template, $variables);
  }
}
