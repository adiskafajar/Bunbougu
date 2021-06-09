<?php 

namespace Acsns\Guest; 

use Core\Acsn; 

class ProductAcsn extends Acsn
{
   public static function search($data)
   {
      $keyword = htmlspecialchars($data['keyword']); 

      Acsn::response("product|catalog|{$keyword}"); 
   }

   public static function asd($by)
   {

   }
}