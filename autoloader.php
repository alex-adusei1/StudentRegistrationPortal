<?php

// call the spl_autoload_register function with a callback function
spl_autoload_register(function($classname){
    // include all the paths that you know you will be going to 
    // thus controller, view and models
   $paths = [
       'controller' => 'app/Controllers/', 
       'view' => 'app/Views/', 
       'models'=> 'app/Models/', 
       'system'=> 'app/System/'
   ]; 

    // loop through the return path. 
    // check if it exits
    // then require it.. thus auto_loading it.. 
   foreach ($paths as $key => $path){
       
       $file_path = $path. $classname .'.php';
//       echo $file_path . "<br><br>";
       if(file_exists($file_path)){
           require_once $file_path;
       }
   }
});