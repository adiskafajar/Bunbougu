<?php

namespace Models\Action; 

use Core\Model; 

class AddressAction extends Model
{
   private static 
      $table = "address", 
      $tableId = "address_id"; 

   public static function create($data)
   {
      return Model::action(
         "INSERT INTO addresses VALUES(
            '',
            '{$data['user_id']}',
            '{$data['province_id']}',
            '{$data['city_id']}',
            '{$data['address']}',
            '{$data['receiver']}',
            '{$data['main']}'
         )", "llkj"
      );
   }

   public static function update($data)
   {
      return Model::action(
         "UPDATE addresses SET
            user_id     ='{$data['user_id']}',
            province_id ='{$data['province_id']}',
            city_id     ='{$data['city_id']}',
            address     ='{$data['address']}',
            receiver    ='{$data['receiver']}'
         WHERE address_id={$data['address_id']}"
      );
   }

   public static function updateMainAddressToTrue($addressId)
   {
      return Model::action(
         "UPDATE addresses SET 
            main='true'
         WHERE address_id='$addressId'"
      ); 
   }

   public static function updateMainAddressToFalse($userId)
   {
      return Model::action(
         "UPDATE addresses SET 
            main='false'
         WHERE user_id='$userId' AND main='true'"
      ); 
   }

   public static function delete($addressId)
   {
      return Model::action("DELETE FROM addresses WHERE address_id='$addressId'");
   }
}
