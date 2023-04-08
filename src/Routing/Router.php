<?php

namespace EsnTest\Routing;

use Twig\Environment;

/**
 * Class Router.
 */
class Router {

  /**
   * Routes array.
   *
   * @var array
   */
  private $routes = [];

  /**
   * Twig loader.
   *
   * @var \Twig\Environment
   */
  private $twig;

  /**
   * Constructor.
   */
  public function __construct(Environment $_twig){

    $this->twig = $_twig;
  }

  /**
   * Return all the routes we have fetched from the namespace specified.
   *
   * @return array
   *   An array of routes with the action (class and method) each route
   *   has to call.
   */
  public function getRoutes() {

    return $this->routes;
  }

  /**
   * Add a route to the array.
   *
   * @param string $url
   *   The route that will be added to be loaded.
   * @param string $action
   *   The method within the class that will be executed.
   */
  public function add($url, $action){

    $this->routes[$url] = $action;
  }

  /**
   * Executes the method of a url if uri matches with one in the array.
   *
   * If the uri does not match, executes the not found url instead.
   */
  public function dispatch(){

    $request_uri = str_replace(dirname($_SERVER["PHP_SELF"]), '', $_SERVER['REQUEST_URI']);
    $request_uri = substr($request_uri, 1);

    foreach ($this->routes as $url => $action) {

      $new_url = preg_replace('/\/{(.*?)}/', '/(.*?)', $url);

      if (preg_match_all('#^' . $new_url . '$#', $request_uri, $matches, PREG_PATTERN_ORDER)) {
        $matches = array_slice($matches, 1);
        $params = (!empty($matches) ? reset($matches) : []);

        $callable = explode('::', $action);
        $arguments = (!empty($params) ? explode('/', $params[0]) : []);

        call_user_func_array([new $callable[0], $callable[1]], $arguments);
        return;
      }
    }
    call_user_func_array([$this, 'notFound'], [$request_uri]);
  }

  /**
   * Loads the not found page.
   *
   * @param string $request_uri
   *   The requested uri that does not exist.
   */
  private function notFound($request_uri){

    echo $this->twig->render('404.twig', [
      'request_uri' => $request_uri,
    ]);
  }
}
