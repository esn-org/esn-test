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
  private $esnApi;

  /**
   * Contructor.
   */
  public function __construct() {
    
    // We load here the models that are needed.
    $this->esnApi = EsnApi::getInstance();
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

  /**
   * {@inheritdoc}
   */
  public function getCardData($card) {
    
    $resp = $this->esnApi->apiGetCard($card);
    $json = json_decode($resp, TRUE);
    if ($json) {
      $cardData = reset($json);

      return [
        'card_code' => $cardData['code'],
        'card_status' => $cardData['status'],
        'section_code' => $cardData['section-code'],
        'card_date' => $cardData['activation date'],
      ];
    }
    else {
      
      return [];
    }
  }
}
