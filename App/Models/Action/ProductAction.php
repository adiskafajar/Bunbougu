<?php 

namespace Models\Action; 

use Core\Model; 

class ProductAction extends Model 
{
   private static 
      $table   = "products",
      $tableId = "product_id";

   public static function create($data)
   {
      return Model::action(
         "INSERT INTO products VALUES(
            '',
            '{$data['product']}',
            '{$data['category_id']}',
            '{$data['brand_id']}',
            '{$data['price']}',
            '{$data['description']}',
            '{$data['stock']}'
         )"
      );
   }

   public static function update($data)
   {
      return Model::action(
         "UPDATE products SET
            product     = '{$data['product']}', 
            category_id = '{$data['category_id']}', 
            brand_id    = '{$data['brand_id']}', 
            price       = '{$data['price']}', 
            description = '{$data['description']}', 
            stock       = '{$data['stock']}' 
         WHERE product_id='{$data['product_id']}'"
      );
   }

   public static function delete($productId)
   {
      return Model::action("DELETE FROM products WHERE product_id='$productId'");
   }
}