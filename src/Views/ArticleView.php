<?php

namespace EsnTest\Views;

use EsnTest\TestController;

/**
 * Class Front.
 *
 * By extending this class from AbstractView, we have available the
 * render() method, that will load the desired twig template with the
 * variables needed.
 */
class ArticleView extends AbstractView {

  /**
   * All Articles view.
   *
   * @route("/articles")
   *
   * @alias("articles")
   */
  public function index() {
    // We call our test controller for the data we need later in twig.
    $testController = new TestController();

    $articles = $testController->getNews();

    return $this->render('articles.twig', [
        'articles' => $articles
    ]);
       
  }

  /**
   * Individual Article view.
   *
   * @route("/article/{slug}")
   *
   */
  public function show(string $slug) {
    $testController = new TestController();
    
    $articles = $testController->getNews();
    $article = null;
    //Search In articles Array for the requested article
    if (count($articles) > 0) {
      foreach ($articles as $art){
        if ($art['slug'] === $slug) {
            $article = $art;
        }
      } 
    }
    
    if (!$article) {
      // Handle article not found
      return $this->render('404.twig', [
        'request_uri' => $slug,
      ]);
    }
    return $this->render('article.twig', [
        'article' => $article,
    ]);
  }
}