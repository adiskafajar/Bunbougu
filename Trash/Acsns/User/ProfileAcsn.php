<?php 

namespace Acsns\User; 

use Core\Acsn; 
use Helper\Upload; 
use Models\Action\UserAction as User; 
use Models\Action\TransactionAction as Transaction; 

abstract class ProfileAcsn extends Acsn
{
   public static function changeProfile($data, $file)
   {
      $data = [
         "id"       => htmlspecialchars($data['id']), 
         "view"     => $data['view'], 
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

      !$data['image'] ? $data['image'] = $data['imageOld'] : Upload::dropImage("user", $data['imageOld']); 

      User::update($data);

      Acsn::response($data['view']);
   }
}