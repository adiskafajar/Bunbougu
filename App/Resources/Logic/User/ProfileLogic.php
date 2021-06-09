<?php 

namespace Resources\Logic\User; 

use Core\Logic; 
use Helper\Upload; 
use Helper\Image; 
use Models\Action\UserAction as User; 

abstract class ProfileLogic extends Logic
{
   public static function changeProfile($data, $file)
   {
      $data = [
         "id"       => htmlspecialchars($data['id']), 
         "view"     => htmlspecialchars($data['view']), 
         "name"     => htmlspecialchars($data['name']), 
         "email"    => htmlspecialchars($data['email']), 
         "username" => htmlspecialchars($data['username']), 
         "password" => htmlspecialchars($data['password']), 
         "address"  => htmlspecialchars($data['address']), 
         "gender"   => htmlspecialchars($data['gender']), 
         "contact"  => htmlspecialchars($data['contact']), 
         "imageOld" => htmlspecialchars($data['imageOld']), 
         "image"    => Upload::image($file, "user")
      ];

      !$data['image'] ? $data['image'] = $data['imageOld'] : Image::drop("user", $data['imageOld']); 

      User::update($data);

      Logic::response($data['view']);
   }

   public static function addAddress()
   {

   }

   public static function dropAddress()
   {

   }
}