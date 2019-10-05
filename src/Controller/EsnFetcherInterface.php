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
   *   Valid endpoints: 'countries', 'sections'.
   *
   * @return string
   *   The response of the API call, in a JSON format.
   */
  public function getRequest($endpoint);

  /**
   * Renders the data from the API request.
   *
   * @return string
   *   The HTML for the view.
   */
  public function render();

}
