<?php

/**
 * controllerApiExtended Class.
 *
 * Extended class from the modelApi class
 * 
 *
 * @file /app/Controllers/controllerApiExtended.php  
 * @author Candido Otero Moreira <omcandido@gmail.com>
 * @version 1.0
 */

namespace app\Controllers;

use app\Controllers\controllerApi; //not needed because of autoload?


class controllerApiExtended extends controllerApi {

     /**
     * Returns an Array with the values of 
     * the given key inside a JSON file
     *
     * @param $JSONstring
     *  The JSON formated string from which to extract the key values
     * 
     * @param $key
     *  Key whose value we want to append
     * 
    * @return 
    *   Array with all the appended values
    */
    
    private function json_to_array_by_key($JSONstring, $key){
      //(Any optimized function or filter to obtain 
      // all elements whose key is "name"???)

      //transform JSON to associative array
      $assocArray = json_decode($JSONstring,true); 

      //append all names into an array
      $rawArray = array();
      foreach ($assocArray as $elem) {
            array_push($rawArray, $elem[$key]);
        }
      return $rawArray;   
    }
    
  
    
    
    
  /**
   * Returns an Array with all the countries where ESN is using the proper API call.
   *   *
   * @return 
   *   Array with all the countries where ESN is
   */

  public function get_all_esn_countries(){
      
      // get all countries
      $stringCountries = parent::get_request('countries'); 
      // append values where the key="name"
      $namesArray = $this->json_to_array_by_key($stringCountries, "name");
      
      return $namesArray;
  }   
  
  
  
  
  
  
    /**
   * Returns an Array with all the sections of a certain country.
   *
   * @param $country
   *   The country you want to get its sections of
   *
   * @return 
   *   Array of sections that belong to the given $country
   */
  public function get_sections_of_country($countryId){
      // get all sections whose countryId is $countryId
      $filter = ['where' =>['countryId' => $countryId]];
      $stringSections = parent::get_request('sections',$filter);
      // append values where the key="name"
      $namesArray = $this->json_to_array_by_key($stringSections, "name");
      
      return $namesArray;
    
  }  
}