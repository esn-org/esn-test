<?php

namespace EsnTest\Routing;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;

/**
 * Class RouterFetcher.
 */
class RouterFetcher extends Router {

  /**
   * Fetches all the routes in each method in the designated namespace.
   * 
   * The route has to be added as annotation in the declaration of the
   * method of each class by using the @route. 
   * Only public methods (that are not final) with valid annotations,
   * are considered.
   * A method can use also the @alias tag.
   *
   * @param string $namespace
   *   The namespace to fetch all the classes in.
   */
  public function fetch($namespace) {
    // We get first all the classes inside the namespace.
    $classes = $this->findRecursive($namespace);

    foreach ($classes as $class) {
      $r = new ReflectionClass($class);
      if (!$r->isFinal()) {
        foreach ($r->getMethods() as $key => $method) {
          if ($method->isPublic() && !$method->isConstructor() && !$method->isFinal()) {
            $route = $this->getAnnotationFromMethod($method->getDocComment(), '@route');
            if ($route !== FALSE) {
              $this->add($route, $r->name . "::" . $method->name); 
            }
            $alias = $this->getAnnotationFromMethod($method->getDocComment(), '@alias');
            if ($alias !== FALSE) {
              $this->add($alias, $r->name . "::" . $method->name); 
            }            
          }
        }
      }    
    }
  }

  /**
   * Gets the annotation from the method.
   *
   * @param string $str
   *   The doc comment from the method.
   * @param array $tag
   *   The tag we want to get.
   *
   * @return string|bool
   *   The route if written. False if ommited.
   */
  private function getAnnotationFromMethod($str, $tag = '@route') {

    $matches = array();
    preg_match('#' . $tag . '\(\"(.*?)\"\)\n#s', $str, $matches);

    if (isset($matches[1])) {
      return trim($matches[1]);
    }
    return FALSE;
  } 

  /**
   * Find all the classes in the namespace.
   *
   * @param string $namespace
   *   The namespace to search in.
   *
   * @return array
   *   An array with all the classes found.
   */
  private function findRecursive(string $namespace) {
    // Get the path where the namespace is in the server.
    $namespacePath = $this->translateNamespacePath($namespace);

    if ($namespacePath === '') {
      return [];
    }
    return $this->searchClasses($namespace, $namespacePath);
  }

  /**
   * Gets the path in the server of the namespace.
   *
   * @param string $template
   *   The route that will be added to be loaded.
   * @param array $action
   *   The method within the class that will be executed.
   */
  protected function translateNamespacePath(string $namespace) {
    $rootPath = explode(DIRECTORY_SEPARATOR, __DIR__);
    // Take out the last element of the current path to have the base namespace.
    array_pop($rootPath);
    
    // Explode all the namespaces
    $nsParts = explode('\\', $namespace);
    array_shift($nsParts);

    if (empty($nsParts)) {
      return '';
    }
    // We are only interested in the first element of the parameter.
    return realpath(implode(DIRECTORY_SEPARATOR, $rootPath) . DIRECTORY_SEPARATOR . $nsParts[1]) ?: '';
  }

  /**
   * Search all the classes in the folders.
   *
   * @param string $namespace
   *   The namespace where to search the classes.
   * @param array $namespacePath
   *   The path in the server of the namespace.
   */
  private function searchClasses(string $namespace, string $namespacePath) {
    $classes = [];

    $iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($namespacePath, RecursiveDirectoryIterator::SKIP_DOTS),
      RecursiveIteratorIterator::SELF_FIRST
    );
    /**
    * @var \RecursiveDirectoryIterator $iterator
    * @var \SplFileInfo $item
    */
    foreach ($iterator as $item) {
      
      if ($item->isDir()) {
        $nextPath = $iterator->current()->getPathname();
        $nextNamespace = $namespace . '\\' . $item->getFilename();
        $classes = array_merge($classes, $this->searchClasses($nextNamespace, $nextPath));
        continue;
      }
      if ($item->isFile() && $item->getExtension() === 'php') {
        $class = $namespace . '\\' . $item->getBasename('.php');
        if (!class_exists($class)) {
          continue;
        }
        $classes[] = $class;
      }
    }

    return $classes;
  }
}