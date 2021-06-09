<?php 

namespace Models; 

use Core\Model; 

abstract class GalleryModel extends Model 
{
   private static 
      $table = "galleries", 
      $tableId = "gallery_id";

   public static function readAllByProduct()
   {
      $table = self::$table; 
      $sql = "SELECT * FROM $table right JOIN products on $table.product_id=products.product_id WHERE main='true'";
      $query = mysqli_query(self::connect(), $sql); 
      $readGallery = null;

      !$query ? die("failed read data gallery by product") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readGallery[] = $data; 
      }

      return $readGallery; 
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