<?php 

namespace Acsns\User; 

use Core\Acsn; 
use Models\Action\WishlistAction as Wishlist;

abstract class WishlistAcsn extends Acsn
{
   public static function showWishlist($user)
   {
      return Wishlist::readWishlist($user); 
   }

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

      Acsn::response("{$data['view']}|{$data['page']}|{$data['name']}");
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

      Acsn::response("{$data['view']}|{$data['page']}|{$data['name']}"); 
   }
}