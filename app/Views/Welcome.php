<?php

/**
 * Welcome Class.
 *
 * Simple view to create the first header with the TODO tasks
 *
 * @file /app/Views/Welcome.php 
 * @author Gorka Guerrero Ruiz <web-developer@esn.org>
 * @version 1.0
 */

namespace app\Views;


class Welcome {

  /**
   * Show some html formatted text with some info.
   *
   * @param $data
   *   The data we got from the model(s) and we will show in the html snippet.
   *
   * @return 
   *   The html with the data to be displayed.
   */  
  public function output($data = null) {
    $html = '
    <h1 class="mt-3">Welcome to this simple PHP skill test</h1>
    <div class="lead">Let\'s code a little bit</div>
    <div class="lead">There are a couple of tasks in this small test. We want to display here the following information:</div>
    <div class="tasks_group">
      <div class="task_header">Task 1</div>
      <div class="task">Fork (<span class="fa fa-code-fork" aria-hidden="true"></span>) the repository where all the code is stored into your GitHub account, and then clone that fork into your developement environment so you can continue with the following tasks.</div>
      <div class="hints alert alert-secondary" role="alert"><span class="fa fa-github fa-1x5" aria-hidden="true"></span>Github Repository: <a href="https://github.com/esn-org/esn-test" title="Github repository" target="_blank">https://github.com/esn-org/esn-test</a></div>
    </div>
    <div class="tasks_group">
      <div class="task_header">Task 2</div>
      <div class="task">Create a new class that extends <code>controllerApi</code> inside the folder <code>Controllers</code></div>
      <div class="task">Inside that class, create the necessary functions that:
        <ul>
          <li>Returns an <code>Array</code> with all the countries where ESN is using the proper API call.</li>
          <li>Returns an <code>Array</code> with all the sections of a certain country.</li>
        </ul>
      </div>
      <div class="hints alert alert-primary">When is finished declare a new object of that class in the file <code>index.php</code></div>
      <div class="task">The API documentation <a href="https://api.esn.org/explorer/" title="API Documentation" target="_blank">can be found here</a>. There, you will find all the available GET requests, and you can try the API as well.</div>
      <div class="hints alert alert-secondary" role="alert">One example of the filter you can use in the API documentation is <code>{"where":{"code":"BE"}}</code>. This is the notation for the filters.</div>
    </div>
    <div class="tasks_group">
      <div class="task_header">Task 3</div>
      <div class="task">Create a new view inside the folder <code>Views</code></div>
      <div class="task">Inside that class, create a function that:
        <ul>
          <li>Return the basic structure of an accordion, using <code>collapse</code> and <code>card</code> components of Bootstrap. 3 or 4 group items are fine, and a couple of "Lorem Ipsum" lines inside each tab is enough.</li>
        </ul>
      </div>
      <div class="hints alert alert-primary" role="alert">Edit the file <code>index.php</code> to declare there an object of your new View class and include the output in the designated area.</div>
      <div class="hints alert alert-secondary" role="alert">The version installed is Bootstrap 4.0.0-beta.2. Check its documentation for the behaviour of both components and examples.</div>
    </div>
    <div class="tasks_group">
      <div class="task_header">Task 4</div>
      <div class="task">Create a second function in the view created. This will improve the accordion created in the previous task.</div>
      <div class="task">You can use the function availables in all the classes, but the view may not use any (except PHP native functions), just the <code>$data</code> array with the values previously calculated and needed for the view.</div>
      <div class="task">The accordion may have:
        <ul>
          <li>The flag and the name of each country, plus the number of ESN sections, in each header (group item) of the accordion.</li>
          <li>The list of ESN sections that belongs to that country, inside the pane.</li>
          <li>All the panes may be closed at the beginning.</li>
        </ul>
      </div>
      <div class="hints alert alert-primary" role="alert">Edit the file <code>index.php</code> to put the output of the view in the designated area.</div>
      <div class="task">The output may be similar to the next image</div>
      <div class="task" id="exampleAccordion" data-children=".item">
        <div class="item">
          <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion1" aria-expanded="true" aria-controls="exampleAccordion1">
            Show Image
          </a>
          <div id="exampleAccordion1" class="collapse" role="tabpanel">
            <img src="./img/task_1.png" alt="task1 example" class="img-fluid"/>
          </div>
        </div>
      </div>
      <div class="hints alert alert-secondary" role="alert">For using the flags inline with text add the classes <code>.flag-icon</code> and <code>.flag-icon-xx</code> (where xx is the ISO 3166-1-alpha-2 code of a country) to an empty <code>&lt;span&gt;</code></div>
    </div>
    <div class="tasks_group">
      <div class="task_header">Task 5</div>
      <div class="task">Push your code and do a <code>pull request</code> to the main repository.</div>
    </div>
    ';

    return $html;   
  }

  /**
   * Function for a temporal output that will be replaced by the final one the user creates
   *
   * You can replace this function with your own view's function
   */
  public function tmp($data){
    $html  = '<div>Here goes the output for the '.$data['task'].' (use your own instead)</div>';
    $html .= '<div class="hints alert '.$data['class'].'" role="alert">Random fact: '.$data['fact'].'</div>';
    return $html;
  }
  
}