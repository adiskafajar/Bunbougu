<?php 

namespace Models\Data; 

use Core\Model; 

class GalleryData extends Model 
{
   private static 
      $table = "galleries", 
      $tableId = "gallery_id";

   public static function readAllGalleryByProduct($productId)
   {
      $table = self::$table; 
      $sql = "SELECT image FROM $table WHERE product_id='$productId'";
      $query = mysqli_query(self::connect(), $sql); 
      $image = null;

      !$query ? die("failed read data gallery by product") : null;

      while($data = mysqli_fetch_assoc($query))
      {
         $image[] = $data['image']; 
      }

      return $image; 
   }

   public static function readMainGalleryByProduct($productId)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $image = null; 
      $sql = "SELECT image FROM $table 
         WHERE product_id='$productId' AND main='true'"; 

      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed read main gallery by product id") : null; 

      $image = mysqli_fetch_assoc($query); 

      return $image['image']; 
   }

   public static function readId($id)
   {
      $table = self::$table; 
      $tableId = self::$tableId;
      $sql = "SELECT * FROM $table WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql);
      $readId = mysqli_fetch_assoc($query);  

      !$query ? die("failed read data id gallery") : null;

      return $readId;
   }

   public static function readByProduct($id)
   {
      $table = self::$table;
      $sql = "SELECT * FROM $table WHERE product_id='$id' AND main='false'"; 
      $query = mysqli_query(self::connect(), $sql);
      $readProductId = null; 

      !$query || is_null($query) ? die("failed read data product id") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readProductId[] = $data;  
      }

      return $readProductId; 
   }

   public static function readMain($id)
   {
      $table = self::$table; 
      $productId = self::$productId; 
      $sql = "SELECT * FROM $table WHERE $productId='$id' AND main='true'"; 
      $query = mysqli_query(self::connect(), $sql); 
      $readMainGallery = mysqli_fetch_assoc($query); 

      !$query ? die("failed read data main gallery") : null;

      return $readMainGallery;
   }

}