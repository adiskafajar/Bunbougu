<?php 

namespace Models; 

use Core\Model; 

abstract class CartModel extends Model 
{
   public static 
      $table   = "carts",
      $tableId = "cart_id";

   public static function readCart($user)
   {
      $table    = self::$table; 
      $readCart = null; 
      $sql      = "SELECT * FROM $table 
         INNER JOIN products   ON products.product_id    = cart.product_id      
         INNER JOIN categories ON categories.category_id = products.category_id 
         INNER JOIN brands     ON brands.brand_id        = products.brand_id     
         WHERE user_id='$user'"; 
      $query = mysqli_query(self::connect(), $sql);

      !$query ? die("failed read All data cart") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readCart[] = $data;  
      }

      return $readCart; 
   }

   public static function readProduct($user)
   {
      $table = self::$table; 
      $sql = "SELECT product_id FROM $table WHERE user_id='$user'"; 
      $query = mysqli_query(self::connect(), $sql); 
      $readProduct = null;

      !$query ? die("failed read data product") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readProduct[] = $data; 
      }

      return $readProduct; 
   }

   public static function create($user, $product)
   {
      $table = self::$table; 
      $sql = "INSERT INTO $table VALUES('', '$user', '$product')"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed create data cart") : null; 
   }

   public static function delete($id)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "DELETE FROM $table WHERE $tableId=$id"; 
      $query   = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed delete data cart") : null; 
   }
}