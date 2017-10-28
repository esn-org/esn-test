<?php

/**
 * Accordion class
 *
 * @file /app/Views/Accordion.php 
 * @author Candido Otero <omcandido@gmail.com>
 * @version 1.0
 */

namespace app\Views;


class Accordion {

    private $html;
    private $id=0;
    
    /**
     * Automatically fill the class member $html
     * with a new tab to form an accordion
     * 
     * @param $title  name of the tab
     * @param $text   content of the tab
     */

    public function add_tab($title, $text){
        $this->id++; 
        $this->html .='  
            <div class="card">
              <div class="card-header" role="tab" id="heading'.$this->id.'">
                <h5 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" href="#collapse'.$this->id.'" aria-expanded="false" aria-controls="collapse'.$this->id.'">
                    '.$title.'
                  </a>
                </h5>
              </div>
              <div id="collapse'.$this->id.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$this->id.'">
                <div class="card-block">
                  '.$text.'
                </div>
              </div>
            </div>
          ';        
    }
    
    
     /**
     * View for Task 3
     * 
     * @param $nTabs number of tabs of the accordion 
     * 
     * 
     * @return 
     *    Return the basic structure of an accordion, using collapse and card 
     *    components of Bootstrap. 3 or 4 group items are fine, 
     *    and a couple of "Lorem Ipsum" lines inside each tab is enough
    */

  public function generate_accordion_n_tabs($nTabs){
    $this->html = '';
    $loremIpsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur';
    for ($i = 1 ; $i<=$nTabs; $i++){
        $this->add_tab('Tab #'.$i, $loremIpsum);
    }
    return $this->html;
  }
}