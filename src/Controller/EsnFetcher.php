<?php

namespace EsnTest\Controller;

/**
 * Class EsnFetcher.
 */
class EsnFetcher implements EsnFetcherInterface {

  /**
   * EsnApi object.
   *
   * @var \EsnTest\Controller\EsnApiInterface
   */
  public $esnApi = NULL;

  /**
   * Contructor.
   */
  public function __construct() {
    // We load here the models that are needed.
    $this->esnApi = new EsnApi();
  }

  /**
   * {@inheritdoc}
   */
  public function getRequest($endpoint) {
    $resp = $this->esnApi->apiGetRequest($endpoint);
    return $resp;
  }

  /**
   * {@inheritdoc}
   */
  public function getNews() {
    $resp = $this->esnApi->apiGetNews();
    return json_decode($resp, TRUE);
  }

  /**
   * {@inheritdoc}
   */
  public function countNews() {
    $resp = $this->esnApi->apiGetNews();
    return count(json_decode($resp, TRUE));
  }
}
