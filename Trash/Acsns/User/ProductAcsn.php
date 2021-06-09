<?php 

namespace Acsns\User; 

use Core\Acsn; 

abstract class ProductAcsn extends Acsn
{
   public static function search($data)
   {
      $keyword = $data['keyword']; 

      Acsn::response("product|catalog|{$keyword}"); 
   }
}