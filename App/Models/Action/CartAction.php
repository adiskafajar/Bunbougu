<?php 

namespace Models\Action; 

use Core\Model; 

class CartAction extends Model 
{
   public static 
      $table   = "carts",
      $tableId = "cart_id";

   public static function create($data)
   {
      return Model::action(
         "INSERT INTO carts VALUES(
            '',
            '{$data['user_id']}',
            '{$data['product_id']}', 
            '1', 
            ''
         )"
      );
   }

   public static function updateQuantity($data)
   {
      return Model::action("UPDATE carts SET quantity='{$data['quantity']}' WHERE cart_id='{$data['cart_id']}'"); 
   }

   public static function delete($cartId)
   {
      return Model::action("DELETE FROM carts WHERE cart_id='$cartId'"); 
   }

   public static function deleteCartByUser($userId)
   {
      return Model::action("DELETE FROM carts WHERE user_id='$userId'"); 
   }
}
