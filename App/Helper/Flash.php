<?php 

namespace Helper; 

abstract class Flash 
{
   public static function set($color, $text)
   {  
      $_SESSION['flash'] = [$color, $text]; 
   }

   public static function get($flash)
   {
      $color = array_shift($flash); 
      $text = end($flash); 

      // $_SESSION['flash'] = null; 

      return "<div style='color: $color;'>$text</div>"; 
   } 
}

// return "<div class='text-{$color}-500'>$text</div>";