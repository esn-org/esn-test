<?php

namespace EsnTest\Controller;

/**
 * Interface EsnApiInterface.
 */
interface EsnApiInterface {

  /**
   * Does a GET request to the API to get some results.
   *
   * @param string $endpoint
   *   The endpoint of the API we will perform the request to.
   *   Available $endpoint values: 'countries', 'sections'.
   *
   * @return string
   *   The JSON response gotten from curl_exec(), to be decoded later.
   */
  public function apiGetRequest(string $endpoint): string;

  /**
   * Does a GET request to the API to fetch some news.
   *
   * @return string
   *   The JSON response gotten from curl_exec(), to be decoded later.
   */
  public function apiGetNews(): string;

  /**
   * Does a GET request to the API to fetch data from a ESNcard.
   *
   * @param string $card_number
   *   The card to check via the API.
   *
   * @return string
   *   The JSON response gotten from curl_exec(), to be decoded later.
   */
  public function apiGetCard(string $card_number): string;

}
