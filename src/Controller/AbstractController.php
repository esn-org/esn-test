<?php

namespace EsnTest\Controller;

/**
 * Class EsnApi.
 */
class AbstractController {

  public $twig;
  

  public function __construct(){
    
    global $_twig;

    $this->twig = $_twig;
  }


  public function render($template, $variables) {

    echo $this->twig->render($template, $variables);
  }
}
