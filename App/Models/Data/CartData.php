<?php 

namespace Models\Data; 

use Core\Model; 
use Helper\MixFunction as Func; 

class CartData extends Model 
{
   public static 
      $table   = "carts",
      $tableId = "cart_id";

   public static function readAllCartByUser($userId)
   {
      return Model::fetchDataAll(
         "SELECT * FROM carts 
            INNER JOIN products   ON products.product_id    = carts.product_id      
            INNER JOIN categories ON products.category_id   = categories.category_id 
            INNER JOIN brands     ON products.brand_id      = brands.brand_id
            LEFT JOIN product_images  ON products.product_id    = product_images.product_id
            WHERE 
               user_id='$userId' AND 
               product_images.main = 'true'
         "
      ); 
   }  

   public static function readCartById($cartId)
   {
      return Model::fetchDataRow("SELECT * FROM carts WHERE cart_id='{$cartId}'");
   }

   public static function checkProductInCart($userId, $productId)
   {
      return Func::inArrayToBool($productId, 
         Model::fetchDataArray(
            "SELECT product_id FROM carts WHERE user_id='$userId'"
         )
      );
   }

   public static function readTotalCart($userId)
   {
      return Model::fetchDataSIngle("SELECT COUNT(*) as total_cart FROM carts WHERE user_id=$userId");
   }

   public static function readTotalPrice($userId)
   { 
      $carts = CartData::readAllCartByUser($userId); 
      $totalPrice = 0; 
      
      if ( $carts ){         
         foreach ($carts as $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
         }
      }

      return $totalPrice;
   } 
}