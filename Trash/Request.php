<?php 

namespace Core; 

use Core\App; 

abstract class Request extends App
{
   public static 
      $index = BaseApp;
      // $index = "index.php"; 

   public static function page($url)
   {
      $url = App::parseURL($url); 
      
      $page = isset($url[0]) ? $url[0] : null; 
      $subPage = isset($url[1]) ? $url[1] : null; 
      $name = isset($url[2]) ? $url[2] : null; 
      
      // return "/" . BaseApp . $url; 

      if(is_null($page) && is_null($subPage) && is_null($name)){
         return BaseApp; 
      
      } elseif(is_null($subPage) && is_null($name)) {
         return BaseApp."~~[$page]";
         
      } elseif(is_null($name)) {
         return BaseApp."~~[$page]~~[$subPage]"; 

      } else {
         return BaseApp."~~[$page]~~[$subPage]~~[$name]"; 
      }
   }

}






