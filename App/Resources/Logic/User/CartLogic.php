<?php 

namespace Resources\Logic\User; 

use Core\Logic; 
use Helper\Flash; 
use Models\Data\CartData; 
use Models\Action\CartAction; 

abstract class CartLogic extends Logic
{
   private static 
      $page = "cart"; 

   public static function addCart($data)
   {
      $data = [
         "user_id"    => htmlspecialchars($data['user_id']), 
         "product_id" => htmlspecialchars($data['product_id'])
      ];

      Flash::set('green', 'anda menambahkan barang baru'); 
      CartAction::create($data); 
      Logic::response("cart"); 
   }

   public static function dropCart($data)
   {
      $cartId = $data['cart_id']; 
      
      Flash::set('red', 'anda mengehapus barang'); 

      CartAction::delete($cartId); 

      Logic::response("cart"); 
   }
   
   public static function plusQuantityCart($data)
   {
      $quantity = CartData::readCartById($data['cart_id'])['quantity'] + 1;

      $data = [
         "cart_id" => htmlspecialchars($data['cart_id']),
         "quantity" => $quantity
      ];

      CartAction::updateQuantity($data); 

      Logic::response("cart"); 
   }

   public static function minusQuantityCart($data) 
   {
      $quantity = CartData::readCartById($data['cart_id'])['quantity'] - 1;

      $data = [
         "cart_id" => htmlspecialchars($data['cart_id']),
         "quantity" => $quantity
      ];

      CartAction::updateQuantity($data); 

      Logic::response("cart"); 
   }

   public static function finisCart($data)
   {

   }
}

// check cart user
// if(!is_null($alreadyProducts)){
//    foreach ($alreadyProducts as $alreadyProduct) {
//       if ($product === $alreadyProduct['product_id']){
//          Flash::set('red', 'proudct sudah ada di keranjang'); 
//          Logic::response("cart"); 
//          exit(); 
//       }
//    }
// }
