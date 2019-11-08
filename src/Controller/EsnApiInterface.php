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
   *   Available $endpoint values: 'countries', 'sections', 'cities'.
   *
   * @return JSON
   *   The response of the API call, in a JSON format.
   */
  public function apiGetRequest($endpoint);

}
