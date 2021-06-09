<?php 

namespace Helper; 

abstract class Image 
{
   public static function storage($folder, $file)
   {
      return "Public/img/$folder/$file";
   }

   public static function show($folder, $file)
   {
      return Image::storage($folder, $file);
   }

   public static function add($tmpName, $location)
   {
      move_uploaded_file($tmpName, $location);
   }

   public static function drop($folder, $file)
   {
      unlink(Image::storage($folder, $file)); 
   }

}