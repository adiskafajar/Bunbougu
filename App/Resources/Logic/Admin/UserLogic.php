<?php 

namespace Resources\Logic\Admin; 

use Core\Logic; 
use Helper\Upload;
use Helper\Image; 
use Models\Action\UserAction; 
use Models\Data\UserData;

abstract class UserLogic extends Logic
{
   private static
      $page = "user";

   public static function addUser($data, $file)
   {
      $data = [
         "name"     => htmlspecialchars($data['name']),
         "email"    => htmlspecialchars($data['email']), 
         "username" => htmlspecialchars($data['username']), 
         "password" => htmlspecialchars($data['password']), 
         "address"  => htmlspecialchars($data['address']),
         "gender"   => htmlspecialchars($data['gender']),
         "contact"  => htmlspecialchars($data['contact']),
         "image"    => Upload::image($file, self::$page)
      ];

      UserAction::create($data);

      Logic::response(self::$page);
   }

   public static function changeUser($data, $file)
   {
      $data = [
         "user_id"  => htmlspecialchars($data['user_id']), 
         "name"     => htmlspecialchars($data['name']),
         "email"    => htmlspecialchars($data['email']), 
         "username" => htmlspecialchars($data['username']), 
         "password" => htmlspecialchars($data['password']), 
         "address"  => htmlspecialchars($data['address']),
         "gender"   => htmlspecialchars($data['gender']), 
         "contact"  => htmlspecialchars($data['contact']), 
         "imageOld" => htmlspecialchars($data['imageOld']), 
         "image"    => Upload::image($file, self::$page)
      ];

      !$data["image"] ? $data['image'] = $data['imageOld'] : Image::drop(self::$page, $data['imageOld']);

      UserAction::update($data);

      Logic::response(self::$page);
   }

   public static function dropUser($data)
   {
      $data = UserData::readUserById($data['user_id']);

      UserAction::delete($data['user_id']);

      Image::drop(self::$page, $data['image']); 

      Logic::response(self::$page);
   } 

   public static function search($data)
   {
      $keyword = htmlspecialchars($data['keyword']);
      
      Logic::response("user|user|{$keyword}");      
   }
}