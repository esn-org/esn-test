<?php

namespace EsnTest\Controller;

/**
 * Class EsnApi.
 */
class EsnApi implements EsnApiInterface {

  /**
   * API url.
   *
   * @var string
   */
  protected $apiUrl = 'https://accounts.esn.org/api/v1/';

  /**
   * Private self method.
   */
  private static $instance;

  /**
   * {@inheritdoc}
   */
  private function __construct() {}

  /**
   * Static method to return the class initialisated. Avoids the use of new().
   */
  public static function getInstance() {
    if (empty(self::$instance)) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  /**
   * {@inheritdoc}
   */
  public function apiGetRequest(string $endpoint): string {

    $curl = curl_init($this->apiUrl . $endpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/x-www-form-urlencoded']);
    // Execute and get also the response code.
    $resp = curl_exec($curl);

    curl_close($curl);
    // We return the JSON directly, not an Array as may be needed.
    return $resp;
  }

  /**
   * {@inheritdoc}
   */
  public function apiGetNews(): string {

    $curl = curl_init('https://story.esn.org/api_news.json');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/x-www-form-urlencoded']);
    // Execute and get also the response code.
    $resp = curl_exec($curl);
    // Can be the url returns a 404.
    $code = curl_getinfo($curl)['http_code'];
    curl_close($curl);

    if ($code === 404){
      return json_encode([]);
    }
    // We return the JSON directly, not an Array as may be needed.
    return $resp;
  }

  /**
   * {@inheritdoc}
   */
  public function apiGetCard(string $card_number): string {
    $curl = curl_init('https://esncard.org/services/1.0/card.json?code=' . $card_number);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/x-www-form-urlencoded']);
    // Execute and get also the response code.
    $resp = curl_exec($curl);
    curl_close($curl);

    return $resp;
  }

}
