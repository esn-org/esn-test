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
   * @return JSON
   *   The response of the API call, in a JSON format.
   */
  public function apiGetRequest($endpoint);

  /**
   * Does a GET request to the API to fetch some news.
   *
   * @return JSON
   *   The response of the API call, in a JSON format.
   */
  public function apiGetNews();

}
