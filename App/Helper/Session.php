<?php 

namespace Helper; 

abstract class Session
{
   public static function admin($admin)
   {
      $_SESSION['admin'] = $admin; 
   }

   public static function user($user)
   {
      $_SESSION['user'] = $user; 
   }

   public static function access($access)
   {
      $_SESSION['access'] = $access; 
   }
}

