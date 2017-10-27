<?php

/**
 * modelApi Class.
 *
 * Simple class to connect to the ESN API using CURL
 *
 * @file /app/Models/modelApi.php  
 * @author Gorka Guerrero Ruiz <web-developer@esn.org>
 * @version 1.0
 */

namespace app\Models;


class modelApi {
    
  //Vars
  public $api_url  = 'https://api.esn.org/api/v1/';
  public $response = null;

  function __construct() {
    //...
  }

  /**
   * Stores the response code with the result of executing the API request.
   *
   * @param $response
   *   The response code of the API request.
   *
   */
  private function api_set_response_code($response){
    $this->response = $response;
  }


  /**
   * Returns the response code with the result of executing the API request.
   *
   * @return 
   *   The response code of the API request.
   */
  public function api_get_response_code(){
    return $this->response;
  }


  /**
   * Does a GET request to the API to get some results.
   *
   * @param $url
   *   The url of the API we will perform the request to.
   *   Example: 'countries', 'cities',...
   *
   * @param $data
   *   Optional. An array with some of the filters we may use (fields, where, sort, order...). Each filter has to be an array .
   *
   * @return 
   *   The response of the API call, in a JSON format.
   */
  public function api_get_request($url, $filters = null){

    $query = '';
    if (isset($filters)){
      $query = "?filter=".json_encode($filters); 
    }

    $curl = curl_init($this->api_url.$url.$query);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/x-www-form-urlencoded'));
    //Execute and get also the response code
    $resp = curl_exec($curl);
    //Store the response code
    $this->api_set_response_code(curl_getinfo($curl, CURLINFO_HTTP_CODE));

    curl_close($curl);
    //We return the JSON directly, not an Array as may be needed
    return $resp;
  }
  
}