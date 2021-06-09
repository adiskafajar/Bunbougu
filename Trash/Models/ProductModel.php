<?php 

namespace Models; 

use Core\Model; 

abstract class ProductModel extends Model
{
   private static 
      $table   = "products",
      $tableId = "product_id";
      
   public static function readAllProduct($keyword)
   {
      $sql = "SELECT * FROM products
         LEFT JOIN categories ON products.category_id = categories.category_id 
         LEFT JOIN brands     ON products.brand_id    = brands.brand_id
         LEFT JOIN galleries  ON products.product_id  = galleries.product_id
         WHERE 
            products.product    LIKE '%$keyword%' OR
            categories.category LIKE '%$keyword%' OR
            brands.brand        LIKE '%$keyword%' 
      ";

      $query = mysqli_query(self::connect(), $sql);
      $products = null; 

      !$query ? die("failed find kyeword") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $products[] = $data; 
      }

      return $products;
   }

   public static function readId($id)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "SELECT * FROM $table WHERE $tableId=$id"; 
      $query   = mysqli_query(self::connect(), $sql); 
      $readId  = mysqli_fetch_assoc($query); 

      !$query ? die("failed read id data product") : null; 

      return $readId; 
   }

   public static function readProductCategory($categoryId)
   {
      $table = self::$table; 
      $readProduct = null; 
      $sql = "SELECT * FROM $table WHERE category_id='$categoryId'"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed read data product by category") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readProduct[] = $data; 
      }

      return $readProduct;
   }

   public static function readProductBrand($brandId)
   {
      $table = self::$table; 
      $readProduct = null; 
      $sql = "SELECT * FROM $table WHERE brand_id='$brandId'"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed read data product by brand") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readProduct[] = $data; 
      }

      return $readProduct;
   }

   public static function create($product, $category, $brand, $price, $description, $stock)
   {
      $table = self::$table; 
      $sql   = "INSERT INTO $table VALUES('', '$product', '$category', '$brand', '$price', '$description', '$stock')"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed create data product") : null;  
   }

   public static function update($id, $product, $category, $brand, $price, $description, $stock)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "UPDATE $table SET
         product     = '$product', 
         category_id = '$category', 
         brand_id    = '$brand', 
         price       = '$price', 
         description = '$description', 
         stock       = '$stock' 
      WHERE $tableId=$id";
      
      $query = mysqli_query(self::connect(), $sql);

      !$query ? die("failed update data product") : null;
   }

   public static function delete($id)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "DELETE FROM $table WHERE $tableId=$id"; 
      $query   = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed delete data product") : null ; 
   }

}