<?php 

namespace Models\Data; 

use Core\Model; 

class ProductData extends Model 
{
   private static 
      $table   = "products",
      $tableId = "product_id";

   public static function readAllProduct($keyword)
   {
      return Model::fetchDataAll(
         "SELECT * FROM products
            LEFT JOIN categories      ON products.category_id = categories.category_id 
            LEFT JOIN brands          ON products.brand_id    = brands.brand_id
            LEFT JOIN product_images  ON products.product_id  = product_images.product_id
         WHERE
            products.product    LIKE '%$keyword%' OR
            categories.category LIKE '%$keyword%' OR
            brands.brand        LIKE '%$keyword%'
         ", 
      );
   }
   
   public static function readAllProductTest($keyword)
   {
      return Model::fetchDataAll(
         "SELECT * FROM products
            LEFT JOIN categories      ON products.category_id = categories.category_id 
            LEFT JOIN brands          ON products.brand_id    = brands.brand_id
         HAVING
            products.product    LIKE '%$keyword%' OR
            categories.category LIKE '%$keyword%' OR
            brands.brand        LIKE '%$keyword%'
         ", 
      );
   }

   public static function readProductById($productId)
   {
      return Model::fetchDataRow(
         "SELECT * FROM products 
            LEFT JOIN categories ON products.category_id = categories.category_id 
            LEFT JOIN brands     ON products.brand_id    = brands.brand_id
         WHERE 
            product_id='$productId'"
      );
   }

   public static function readProductByName($product) 
   {
      return Model::fetchDataRow(
         "SELECT * FROM products
            INNER JOIN categories      ON products.category_id = categories.category_id 
            INNER JOIN brands          ON products.brand_id    = brands.brand_id            
            LEFT JOIN product_images  ON products.product_id  = product_images.product_id
         WHERE 
            product='$product' AND product_images.main = 'true'"
      );
   }

   public static function readProductByCategoryId($categoryId)
   {
      return Model::fetchDataAll(
         "SELECT * FROM products 
            LEFT JOIN product_images  ON products.product_id = product_images.product_id
         WHERE 
            product_images.main = 'true' AND products.category_id='$categoryId'
         LIMIT 5"
         
      );
   }

   public static function readProductByBrandId($brandId)
   {
      return Model::fetchDataAll(
         "SELECT * FROM products 
            LEFT JOIN product_images ON products.product_id = product_images.product_id
         WHERE 
            product_images.main='true' AND products.brand_id='$brandId'
         LIMIT 
            5"
         
      );
   }

   public static function readcategoryIdByProduct($product)
   {
      return Model::fetchDataSingle("SELECT category_id FROM products WHERE product='$product'"); 
   }

   public static function readBrandIdByProduct($product)
   {
      return Model::fetchDataSingle("SELECT brand_id FROM products WHERE product='$product'");
   }

   public static function readAllImageInGalleryByUser($productId)
   {
      $sql = "SELECT * FROM products LEFT JOIN galleries on $table.product_id=galleries.'product_id' WHERE product_id";  
   }

   public static function readNewProductId()
   {
      return Model::fetchDataSingle("SELECT MAX(product_id) as product_id FROM products", "product_id"); 
   }

   public static function readTotalEmptyStock()
   {
      return Model::fetchDataSingle("SELECT COUNT(*) as empty_stock FROM products WHERE stock<='0'", "empty_stock"); 
   }
}