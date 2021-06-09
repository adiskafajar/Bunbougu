<?php 

namespace Models\Action; 

use Core\Model; 

class WishlistAction extends Model 
{
   private static 
      $table   = "wishlists",
      $tableId = "wishlist_id";

   public static function create($data)
   {
      return Model::action("INSERT INTO wishlists VALUES('', '{$data['user_id']}', '{$data['product_id']}')");
   }                                                                              

   public static function delete($data)
   {
      return Model::action("DELETE FROM wishlists WHERE user_id={$data['user_id']} AND product_id={$data['product_id']}");
   }
}
