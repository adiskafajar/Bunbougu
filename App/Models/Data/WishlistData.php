<?php 

namespace Models\Data; 

use Core\Model; 
use Helper\MixFunction as Func; 

class WishlistData extends Model
{
   private static 
      $table   = "wishlists",
      $tableId = "wishlist_id";

   public static function readWishlistByUser($userId)
   {
      return Model::fetchDataAll(
         "SELECT * FROM wishlists 
            INNER JOIN products   ON wishlists.product_id = products.product_id          
            INNER JOIN categories ON products.category_id = categories.category_id
            INNER JOIN brands     ON products.brand_id    = brands.brand_id   
            LEFT  JOIN product_images  ON products.product_id  = product_images.product_id 
            WHERE 
               user_id='$userId' AND 
               product_images.main = 'true'
         "
      );
   }

   public static function readProductByUser($userId)
   {
      return Model::fetchDataAll("SELECT product_id FROM wishlists WHERE user_id='$userId'");
   }   

   public static function checkProductInWishlist($userId, $productId)
   {
      return Func::inArrayToBool($productId, 
         Model::fetchDataArray(
            "SELECT product_id FROM wishlists WHERE user_id='$userId'"
         )
      );
   }
}