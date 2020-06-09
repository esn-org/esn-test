<?php

namespace EsnTest\Routing;

use ReflectionClass;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class RouterFetcher extends Router {

  public function fetch($namespace) {

    $classes = $this->findRecursive($namespace);

    foreach ($classes as $class) {
      $r = new ReflectionClass($class);
      if (!$r->isFinal()) {
        foreach ($r->getMethods() as $key => $method) {
          if ($method->isPublic() && !$method->isConstructor() && !$method->isFinal()) {
            $route = $this->getDocComment($method->getDocComment(), '@route');
            if ($route !== FALSE) {
              $this->add($route, $r->name . "::" . $method->name); 
            }
            $alias = $this->getDocComment($method->getDocComment(), '@alias');
            if ($alias !== FALSE) {
              $this->add($alias, $r->name . "::" . $method->name); 
            }            
          }
        }
      }    
    }
  }

  private function getDocComment($str, $tag = '@route') {

    $matches = array();
    preg_match('#' . $tag . '\(\"(.*?)\"\)\n#s', $str, $matches);

    if (isset($matches[1])) {
      return trim($matches[1]);
    }
    return FALSE;
  } 

  private function findRecursive(string $namespace) {
    $namespacePath = self::translateNamespacePath($namespace);

    if ($namespacePath === '') {
      return [];
    }

    return self::searchClasses($namespace, $namespacePath);
  }

  protected static function translateNamespacePath(string $namespace) {
    $rootPath = explode(DIRECTORY_SEPARATOR, __DIR__);
    array_pop($rootPath);
    
    $nsParts = explode('\\', $namespace);
    array_shift($nsParts);

    if (empty($nsParts)) {
      return '';
    }

    return realpath(implode(DIRECTORY_SEPARATOR, $rootPath) . DIRECTORY_SEPARATOR . $nsParts[1]) ?: '';
  }

  private static function searchClasses(string $namespace, string $namespacePath) {
    $classes = [];

    /**
    * @var \RecursiveDirectoryIterator $iterator
    * @var \SplFileInfo $item
    */
    foreach ($iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($namespacePath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
      ) as $item) {
      
      if ($item->isDir()) {
        $nextPath = $iterator->current()->getPathname();
        $nextNamespace = $namespace . '\\' . $item->getFilename();
        $classes = array_merge($classes, self::searchClasses($nextNamespace, $nextPath));
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