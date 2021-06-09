<?php 

namespace Models\Action; 

use Core\Model; 

class GalleryAction extends Model 
{
   private static 
      $table = "galleries", 
      $tableId = "gallery_id";

   public static function create($image, $productId)
   {
      $table = self::$table; 
      $sql = "INSERT INTO $table VALUES('', '$productId', '$image', 'false')";
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed create data gallery") : null; 
   }

   public static function changeMain($id)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "UPDATE $table SET main='true' WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("falied change main data gallery") : null; 
   }

   public static function dropMain($productId)
   {
      $table = self::$table; 
      $sql = "UPDATE $table SET main='false' WHERE product_id='$productId' AND main='true'";
      $query = mysqli_query(self::connect(), $sql);

      !$query ? die("failed drop main data gallery") : null; 
   }

   public static function delete($id)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "DELETE FROM $table WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql);

      !$query ? die("failed delete data gallery") : null;  
   }

}