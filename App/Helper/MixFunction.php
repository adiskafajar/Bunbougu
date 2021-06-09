<?php 

namespace Helper; 

class MixFunction
{
   public static function inArrayToBool($id, $array)
   {
      return in_array($id, $array) ? true : false; 
   }
}