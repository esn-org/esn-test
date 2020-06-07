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
   *   The response of the API call, in a JSON format.
   */
  public function getRequest($endpoint);

  /**
   * Performs a request to fetch news.
   *
   * @return string
   *   The response of the API call, in a JSON format.
   */
  public function getNews();

  /**
   * Counts the number of articles fetched.
   *
   * @return int
   *   The number of articles fetched.
   */
  public function countNews();
}
