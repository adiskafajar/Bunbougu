<?php 

namespace Models; 

use Core\Model; 

abstract class WishlistModel extends Model
{
   private static 
      $table   = "wishlists",
      $tableId = "wishlist_id";

   public static function readWishlist($user)
   {
      $table = self::$table; 
      $readWishlist = null;
      $sql = "SELECT * FROM $table 
         INNER JOIN products   ON products.product_id    = wishlist.product_id      
         INNER JOIN categories ON categories.category_id = products.category_id 
         INNER JOIN brands     ON brands.brand_id        = products.brand_id     
         WHERE user_id='$user'"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed read all data wishlist") : null;

      while($data = mysqli_fetch_array($query))
      {
         $readWishlist[] = $data; 
      }

      return $readWishlist; 
   }

   public static function create($user, $product)
   {
      $table = self::$table; 
      $sql   = "INSERT INTO $table VALUES('', '$user', '$product')"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed craete data wishlist") : null; 
   }

   public static function delete($user, $product)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "DELETE FROM $table WHERE user_id='$user' AND product_id='$product'";
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed delete data wishlist") : null; 
   }

   public static function readProductByUser($user)
   {
      $table = self::$table; 
      $sql = "SELECT product_id FROM $table WHERE user_id='$user'"; 
      $query = mysqli_query(self::connect(), $sql); 
      $products = []; 

      !$query ? die("failed read data love product") : null; 

      while($data = mysqli_fetch_array($query))
      {
         $products[] = $data; 
      }



      return $loveProduct; 
   }

   public static function readLoveProduct($user)
   {
      $sql = "SELECT product_id FROM wishlists WHERE user_id='$user'"; 
      $query = mysqli_query(self::connect(), $sql); 
      $loveProduct = []; 

      !$query ? die("failed read love product") : null;
      
      while($data = mysqli_fetch_assoc($query)){
         $loveProduct[] = $data['product_id']; 
      }

      return $loveProduct; 
   }
}