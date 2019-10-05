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
  public function render() {
    $html  = '<div>You need to overwrite this function in your controller with the proper reply</div>';
    $html .= '<div class="hints alert alert-success" role="alert">Random fact: Manneken Pis is a famous statue and one of the most famous landmarks in Brussels which is only 61 cm tall.</div>';

    return $html;
  }

}
