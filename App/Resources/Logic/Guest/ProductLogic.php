<?php 

namespace Resources\Logic\Guest; 

use Core\Logic; 

class ProductLogic extends Logic
{
   public static function search($data)
   {
      $keyword = htmlspecialchars($data['keyword']); 

      Logic::response("product|catalog|{$keyword}"); 
   }

   public static function asd($by)
   {

   }
}