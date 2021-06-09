<?php 

namespace Core; 

use Core\App; 

class Response extends App
{
   public static 
      $index  = "location:".BaseApp; 

   public static function page($url)
   {
      $url = App::parseURL($url); 

      $page = isset($url[0]) ? $url[0] : null; 
      $subPage = isset($url[1]) ? $url[1] : null; 
      $name = isset($url[2]) ? $url[2] : null;
      
      if(is_null($page) && is_null($subPage) && is_null($name)){
         header(self::$index); 
      
      } elseif(is_null($subPage) && is_null($name)) {
         header(self::$index."~~[$page]") ;
         
      } elseif(is_null($name)) {
         header(self::$index."~~[$page]~~[$subPage]") ; 

      } else {
         header(self::$index."~~[$page]~~[$subPage]~~[$name]") ; 
      }

   }
}
   // if(is_null($page) && is_null($subPage)){
   //    header(self::$index); 

   // } elseif(is_null($subPage)){
   //    header(self::$index."?page=$page"); 

   // } else {
   //    header(self::$index."?page=$page&subPage=$subPage");
   // }