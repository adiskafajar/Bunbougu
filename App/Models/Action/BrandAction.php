<?php 

namespace Models\Action; 

use Core\Model; 

class BrandAction extends Model 
{
   private static 
      $table = "brands", 
      $tableId = "brand_id"; 
   
   public static function create($data)
   {
      return Model::action(
         "INSERT INTO brands VALUES(
            '',
            '{$data['brand']}', 
            '{$data['image']}'
         )"
      ); 
   }

   public static function update($data)
   {
      return Model::action(
         "UPDATE brands SET 
            brand='{$data['brand']}', 
            image='{$data['image']}'
         WHERE brand_id={$data['brand_id']}"
      );
   }
   
   public static function delete($brandId)
   {
      return Model::action("DELETE FROM brands WHERE brand_id='$brandId'");
   }
}