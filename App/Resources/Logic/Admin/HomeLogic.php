<?php 

namespace Resources\Logic\Admin; 

use Core\Logic; 

abstract class HomeLogic extends Logic
{
   public function readData()
   {

   } 

   public static function logout()
   {
      $_SESSION = []; 
      session_unset(); 
      session_destroy(); 

      Logic::response("auth|sign-in");
   }
}