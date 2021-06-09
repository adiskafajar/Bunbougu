<?php 

namespace Resources\Logic\User; 

use Core\Logic;

abstract class HomeLogic extends Logic
{
   public static function logout($data, $file)
   {
      $_SESSION = [];
      session_unset();
      session_destroy();

      Logic::response("auth|sign-in"); 
   } 
}