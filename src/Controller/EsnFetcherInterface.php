<?php

namespace EsnTest\Controller;

/**
 * Interface EsnFetcherInterface.
 */
interface EsnFetcherInterface {

  /**
   * Performs a request to the endpoint provided to the API.
   *
   * @param string $endpoint
   *   The endpoint of the API we need the information from.
   *   Available $endpoint values: 'countries', 'sections'.
   *
   * @return string
   *   The JSON response of the API call, to be decoded into array.
   */
  public function getRequest($endpoint);

  /**
   * Performs a request to fetch news.
   *
   * @return string
   *   An array with the fetched articles.
   */
  public function getNews();

  /**
   * Counts the number of articles fetched.
   *
   * @return int
   *   The number of articles fetched.
   */
  public function countNews();

  /**
   * Get information from the card requested.
   *
   * @param string $card
   *   The card to get the info.
   *
   * @return array
   *   An indexed array with the card data if exists. Empty array otherwise.
   *   
   */
  public function getCardData($card);

}
