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
    
    private $accName;
    private $id=0;
    
    function __construct($accName) {
        $this->accName = $accName;
    }

    
    
    
    /**
     * Automatically fill the passe by reference html
     * with a new tab to form an accordion
     * 
     * @param $title  name of the tab
     * @param $text   content of the tab
     * @param $html html to append code
     */

    public function add_tab($title, $text, &$html){
        $this->id++; 
        $tabId= $this->accName.$this->id;
        $html .='  
        <div class="card">
         <div class="card-header" role="tab" id="heading'.$tabId.'">
           <h5 class="mb-0">
             <a class="collapsed" data-toggle="collapse" data-parent="#accordion'.$this->accName.'" href="#collapse'.$tabId.'" aria-expanded="false" aria-controls="collapse'.$tabId.'">
                '.$title.'
             </a>
           </h5>
         </div>
         <div id="collapse'.$tabId.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$tabId.'" aria-expanded="false" style="">
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
      $html = '';
      $loremIpsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur';
      for ($i = 1 ; $i<=$nTabs; $i++){
          $this->add_tab('Tab #'.$i, $loremIpsum, $html);
      }
      return $html;
    }
    
    
    
    
    /**
     * Generates the accordion tabs for task 4
     * 
     * @param $data 
     *     associative array in form 
     *      [0][title, content]
     *      [1][title, content]
     *      .  
     *      .
     *      .
     *      [39][title, content]
     * @return 
     * 
     *      corresponding tabs html code
     */
    public function generate_accordion_countries($data){
        $html = '';
        foreach ($data as $entry){
           $this->add_tab($entry['title'], $entry['text'], $html); 
        }
        return $html;
    }
    
    /**
     * Generates the accordion header and final </div>
     * 
     * @param $content 
     *      tabs html code
     * 
     * @return string
     *      full accordion html code
     */     
    
    
    public function output($content){
        $html='<div id="accordion'.$this->accName.'" role="tablist" aria-multiselectable'
                . '="true">'.$content.'</div>';
        
        return $html;
    }       
}