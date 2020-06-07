<?php

namespace EsnTest\Routing;

class Router {

  private $routes = [];
  private $notFound;

  public function __construct(){
    $this->notFound = function($url){
      echo "404 - $url was not found!";
    };
  }

  public function add($url, $action){

    $this->routes[$url] = $action;
  }

  public function setNotFound($action){
    $this->notFound = $action;
  }

  public function dispatch(){

    $request_uri = str_replace(dirname($_SERVER["PHP_SELF"]), '', $_SERVER['REQUEST_URI']);
    $request_uri = substr($request_uri, 1);
    
    foreach ($this->routes as $url => $action) {

      $new_url = preg_replace('/\/{(.*?)}/', '/(.*?)', $url);

      if (preg_match_all('#^' . $new_url . '$#', $request_uri, $matches, PREG_PATTERN_ORDER)) {
        $matches = array_slice($matches, 1);
        $params = reset($matches);
        
        $callable = explode('::', $action);
        $arguments = explode('/', $params[0]);
        call_user_func_array([new $callable[0], $callable[1]], $arguments);
      }
    }
    call_user_func_array($this->notFound, [$request_uri]);
  }

  private function startsWith($haystack, $needle){
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
  }

}