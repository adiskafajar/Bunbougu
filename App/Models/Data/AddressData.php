<?php 

namespace Models\Data; 

use Core\Model; 

class AddressData extends Model
{
   public static function readAllByUserId($userId)
   {
      return Model::fetchDataAll("SELECT * FROM addresses WHERE user_id='$userId'"); 
   }

   public static function readByAddressId($addressId)
   {
      return Model::fetchDataRow("SELECT * FROM addresses WHERE address_id='$addressId'"); 
   }

   public static function readMianAddress($userId)
   {
      return Model::fetchDataSingle("SELECT * FROM addresses WHERE user_id='$userId' AND main='true'"); 
   }

   public static function readMainAddressByUserId($userId)
   {
      return Model::fetchDataRow("SELECT * FROM addresses WHERE user_id='$userId' AND main='true'");
   }

   public static function readMainAddressByAddressId($addressId)
   {
      return Model::fetchDataRow("SELECT * FROM addresses WHERE address_id='$addressId' AND main='true'");
   }
}