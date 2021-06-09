<?php 

namespace Helper; 

use Helper\Image; 

abstract class Upload 
{
   public static function image($data, $folder)
   {
      $fileName = $data['image']['name'];
      $fileSize = $data['image']['size']; 
      $error = $data['image']['error'];
      $tmpName = $data['image']['tmp_name'];
      
      $extentionValid = ['jpg', 'jpeg', 'png']; 
      $extention = explode('.', $fileName); 
      $extention = strtolower(end($extention)); 
      
      $fileName = uniqid() .'.'. $extention; 


      if( $error === 4 ) {
         $_SESSION['image'] = 'image_empty';
         return null;
      }
      
      if( !in_array($extention, $extentionValid )){
         $_SESSION['image'] = 'image_not_valid'; 
         return "asdasd"; 
      }
      
      if( $fileSize > 5000000) {
         $_SESSION['image'] = 'image_large'; 
         return null; 
      }

      Image::add($tmpName, Image::storage($folder, $fileName));

      return $fileName; 
   }
}