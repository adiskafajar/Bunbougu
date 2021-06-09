<?php 

namespace Acsns\User; 

use Core\Acsn;

abstract class HomeAcsn extends Acsn
{
   public static function logout($data, $file)
   {
      $_SESSION = [];
      session_unset();
      session_destroy();

      Acsn::response("auth|sign-in"); 
   } 
}