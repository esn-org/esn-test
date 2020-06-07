<?php

namespace EsnTest;

use EsnTest\Controller\EsnFetcher;

/**
 * Class for the exercise.
 */
class TestController extends EsnFetcher {

  /**
   * Fetchs the data from an API endpoint to get the sections.
   *
   * @return array
   *   The array with all the sections.
   */
  private function getSections() {
    $sections = $this->getRequest('sections');
    return json_decode($sections, TRUE);
  }

  /**
   * Fetchs the data from an API endpoint to get the countries.
   *
   * @return array
   *   The array with all the countries.
   */
  private function getCountries() {
    $countries = $this->getRequest('countries');
    return json_decode($countries, TRUE);
  }

  /**
   * Fetchs and manipulate the data from all the API endpoints.
   *
   * @return array
   *   The array with the data for the render.
   */
  private function fetchData() {

    // Get data from the API.
    $countries = $this->getCountries();
    $sections = $this->getSections();

    $data = [];
    foreach ($countries as $country) {
      $data[$country['cc']] = [
        'label' => $country['label'],
        'cc' => $country['cc'],
        'sections' => [],
      ];
    }
    // This sort by label the array with the countries.
    $labels = array_column($data, 'label');
    array_multisort($labels, SORT_ASC, $data);

    // Now we loop the sections and add to the main data array.
    foreach ($sections as $section) {
      $data[$section['cc']]['sections'][] = [
        'label' => $section['label'],
        'web' => $section['website'],
        'code' => $section['code'],
      ];
    }

    return $data;
  }

  /**
   * Returns the needed data for solving task 4.
   *
   * @return 
   *   The data you decide to return.
   */
  public function getData() {
    
    return ;
  }

  // public function getData() {
  //   return $this->fetchData();
  // }

  // public function getData() {
  //   $data = $this->fetchData();

  //   // And now we will loop the data and create the accordion.
  //   $html = '<div id="accordion" role="tablist">';
  //   foreach ($data as $key => $item) {
  //     $list = '';
  //     // Our array has a list of sections.
  //     foreach ($item['sections'] as $section) {
  //       $web = ($section['web'] ? '&nbsp;&nbsp;<a href="' . $section['web'] . '" target="_blank"><i class="fas fa-external-link-alt"></i></a>' : '');
  //       $list .= '<li>' . $section['label'] . ' (' . $section['code'] . ')' . $web . '</li>';
  //     }
  //     // That goes in a card inside the accordion, with some nice header
  //     // with the data of the country.
  //     $html .= '
  //       <div class="card">
  //         <div class="card-header" role="tab" id="heading_' . $key . '">
  //           <h5 class="mb-0">
  //             <a data-toggle="collapse" href="#' . $key . '" aria-expanded="true" aria-controls="' . $key . '"><span class="flag-icon flag-icon-' . strtolower($key) . '"></span>' . $item['label'] . ' (' . count($item['sections']) . ' sections)</a>
  //           </h5>
  //         </div>
  //         <div id="' . $key . '" class="collapse" role="tabpanel" aria-labelledby="heading_' . $key . '" data-parent="#accordion">
  //           <div class="card-body container">
  //             <ul class="list-unstyled">
  //     ';
  //     $html .= $list;
  //     $html .= '
  //             </ul>
  //           </div>
  //         </div>
  //       </div>
  //     ';
  //   }
  //   $html .= '</div>';

  //   return $html;
  // }
}
