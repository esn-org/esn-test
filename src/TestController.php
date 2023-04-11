<?php

namespace EsnTest;

use EsnTest\Controller\EsnFetcher;

/**
 * Class for the exercise.
 */
class TestController extends EsnFetcher {

  /**
   * Returns the needed data for solving task 4.
   *
   * You might need extra functions for this test.
   *
   * @return 
   *   The data you decide to return.
   */
  public function getDataT4() {
    //Retreiving Data from API Endpoints
    $countries = $this->getRequest('countries');
    $sections = $this->getRequest('sections');
    $resp = [];
    //Json to Array
    $sections = json_decode($sections, TRUE);
    $countries = json_decode($countries, TRUE);
    //sorting countries array
    array_multisort(array_column($countries, 'country'), SORT_ASC, $countries);

    foreach ($countries as $country) {
      foreach ($sections as $section) {
        //Adding Setions to each country
        if ($section['country'] === $country['country']){
          $country['sections'][] = $section;
        }
      }
      //Counting Section for each country
      $country['num_of_sections'] = $country['sections'] ? count($country['sections']) : 0;
      $resp[] = $country;
    }
    
    return $resp;
  }

  /**
   * Returns the needed data for solving task 5.
   *
   * You might need extra functions for this test.
   *
   * @return 
   *   The data you decide to return.
   */
  public function getDataT5() {
      
    return ;
  }

}
