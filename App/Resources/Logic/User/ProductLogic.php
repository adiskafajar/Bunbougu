<?php 

namespace Resources\Logic\User; 

use Core\Logic; 

abstract class ProductLogic extends Logic
{
   public static function search($data)
   {
      $keyword = $data['keyword']; 

      Logic::response("product|catalog|{$keyword}"); 
   }
}