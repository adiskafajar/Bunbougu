<?php 

namespace Models\Action; 

use Core\Model; 

class ProductImageAction extends Model 
{
   private static 
      $table = "product_images", 
      $tableId = "product_image_id";
      
   public static function create($data)
   {
      return Model::action(
         "INSERT INTO product_images VALUES(
            '',
            '{$data['product_id']}', 
            '{$data['image']}', 
            '{$data['main']}'
         )"
      );
   }

   public static function delete($productImageId)
   {
      return Model::action("DELETE FROM product_images WHERE product_image_id='$productImageId'", "lkj");
   }

   public static function updateMainImagetoTrue($productImageId)
   {
      return Model::action("UPDATE product_images SET main='true' WHERE product_image_id='$productImageId'");
   }

   public static function updateMainImageToFalse($productId)
   {
      return Model::action(
         "UPDATE product_images 
            SET main='false' 
         WHERE 
            product_id='$productId' AND 
            main='true'"
      );
   }
}