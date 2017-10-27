<?php

/**
 * controllerApi Class.
 *
 * Simple controller class to interact with the modelApi class
 *
 * @file /app/Controllers/controllerApi.php  
 * @author Gorka Guerrero Ruiz <web-developer@esn.org>
 * @version 1.0
 */

namespace app\Controllers;

use \app\Models\modelApi;


class controllerApi {
  
  //Vars
  public $modelApi = null;

  function __construct() {
    //We load here the models that are needed
    $this->modelApi = new modelApi();
  }


  /**
   * Returns the response code with the result of executing the API request.
   *
   * @return 
   *   The response code of the API request.
   */
  public function get_response_code(){
    return $this->modelApi->get_api_response_code();
  }


  /**
   * Does a GET request to the API to get some results.
   *
   * @param $url
   *   The url of the API we will perform the request to.
   *   Example: 'countries', 'cities',...
   *
   * @param $filters
   *   Optional. An array with some of the filters we may use (fields, where, sort, order...). Each filter has to be an array .
   *
   * @return 
   *   The response of the API call, in a JSON format.
   */
  public function get_request($url, $filters = null){
    // Example of filters, we limit the query to one country using the country code as the API says:
    // For learn more about the filters, read the LoopBack API documentation
    //   $filters = [
    //     'where' =>[
    //       'code' => 'BE',
    //     ],
    //   ];
    // 
    $resp = $this->modelApi->api_get_request($url, $filters);
    return $resp;
  }
  
}