<?php 

namespace Core; 

session_start();

use Core\Acsn; 
use Core\Logic; 
use Core\View; 

class App 
{         
   public function __construct()
   {
      App::run() ? #conditional
      new Logic() : #true
      new View() ; #false
   }

   private function run()
   {
      return isset($_POST['action']) ? true : false; 
   }

   protected function route($route)
   {
      $route = explode("|", $route); 

      isset($route[0]) ? $view = $route[0] : null; 
      isset($route[1]) ? $page = $route[1] : null; 
      isset($route[2]) ? $name = $route[2] : null; 


      if(empty($page) && empty($name)) {         
         return "~~[$view]"; 
         
      } elseif(empty($name)) {
         return "~~[$view]~~[$page]"; 

      } else {
         return "~~[$view]~~[$page]~~[$name]"; 
      }
   }


   protected function routeTest($route)
   {
      $route = explode("|", $route); 

      isset($route[0]) ? $view = $route[0] : null; 
      isset($route[1]) ? $page = $route[1] : null; 
      isset($route[2]) ? $name = $route[2] : null; 


      if(empty($page) && empty($name)) {         
         return "index.php?main=$view"; 
         
      } elseif(empty($name)) {
         return "index.php?main=$view&page=$page"; 

      } else {
         return "index.php?main=$view&page=$page&name=$name"; 
      }
   }
}
