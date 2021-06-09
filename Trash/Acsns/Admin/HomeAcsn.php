<?php 

namespace Acsns\Admin; 

use Core\Acsn; 

abstract class HomeAcsn extends Acsn
{
   public function readData()
   {

   } 

   public static function logout()
   {
      $_SESSION = []; 
      session_unset(); 
      session_destroy(); 

      Acsn::response("auth|sign-in");
   }
}