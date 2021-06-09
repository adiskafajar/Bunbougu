<?php

namespace Resources\Logic\User; 

use Core\Logic; 
use Helper\Upload; 
use Helper\Image; 
use Models\Action\AddressAction;
use Models\Data\AddressData;  

abstract class AddressLogic extends Logic
{
   public static function addAddress($data)
   {
      $mainAddress = AddressData::readMainAddressByUserId($data['user_id']); 

      $data = [
         "user_id" => htmlspecialchars($data['user_id']),
         "province_id" => htmlspecialchars($data['province_id']),
         "city_id" => htmlspecialchars($data['city_id']),
         "address" => htmlspecialchars($data['address']),
         "receiver" => htmlspecialchars($data['receiver']),
         "main" => !$mainAddress ? "true" : "false"
      ];

      AddressAction::create($data);

      Logic::response("address|address-create"); 
   }

   public static function changeAddress($data)
   {
      $data = [
         "address_id" => htmlspecialchars($data['address_id']), 
         "user_id" => htmlspecialchars($data['user_id']),
         "province_id" => htmlspecialchars($data['province_id']),
         "city_id" => htmlspecialchars($data['city_id']),
         "address" => htmlspecialchars($data['address']),
         "receiver" => htmlspecialchars($data['receiver'])
      ];

      AddressAction::update($data); 

      Logic::response("address|address|edit"); 
   }

   public static function changeMainAddress($data) 
   {
      $addressId = htmlspecialchars($data['address_id']); 
      $userId = htmlspecialchars($data['user_id']); 

      AddressAction::updateMainAddressToFalse($userId);

      AddressAction::updateMainAddressToTrue($addressId); 

      Logic::response("address"); 
   }

   public static function dropAddress($data)
   {
      $addressId = htmlspecialchars($data['address_id']); 

      AddressAction::delete($addressId); 

      Logic::response("address"); 
   }
}