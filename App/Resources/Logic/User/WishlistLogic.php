<?php 

namespace Resources\Logic\User; 

use Core\Logic; 
use Models\Action\WishlistAction as Wishlist;

abstract class WishlistLogic extends Logic
{
   public static function addWishlist($data) 
   {
      $data = [
         "user_id"    => htmlspecialchars($data['user_id']), 
         "product_id" => htmlspecialchars($data['product_id']), 
         "view"    => htmlspecialchars($data['view']),
         "page"    => htmlspecialchars($data['page']),
         "name"    => isset($data['name']) ? htmlspecialchars($data['name']) : "null",
      ];

      Wishlist::create($data);

      Logic::response("{$data['view']}|{$data['page']}|{$data['name']}");
   }

   public static function dropWishlist($data)
   {
      $data = [
         "user_id"    => htmlspecialchars($data['user_id']), 
         "product_id" => htmlspecialchars($data['product_id']), 
         "view"    => htmlspecialchars($data['view']),
         "page"    => htmlspecialchars($data['page']),
         "name"    => htmlspecialchars($data['name']),
      ];

      Wishlist::delete($data); 

      Logic::response("{$data['view']}|{$data['page']}|{$data['name']}"); 
   }
}