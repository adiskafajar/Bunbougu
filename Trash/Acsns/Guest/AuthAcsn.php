<?php 

namespace Acsns\Guest;

use Core\Acsn; 
use Helper\Session; 
use Helper\Flash; 
use Models\Data\UserData; 
use Models\Action\UserAction; 

class AuthAcsn extends Acsn 
{
   public static function login($data)
   {
      $username = htmlspecialchars($data['username']);
      $inputPassword = htmlspecialchars($data['password']);

      $user = UserData::readUserByUsername($username); 

      $role          = $user['role']; 
      $userId        = $user['user_id']; 
      $validPassword = $user['password']; 

      // check username
      if(is_null($user)) {
         Flash::set('red', 'username not found'); 

         Acsn::response("auth|sign-in"); 

      // check password
      } elseif($inputPassword !== $validPassword) {
         Flash::set('red', 'password failed');

         Acsn::response("auth|sign-in");

      // set access by role user
      } else {
         Session::user($userId);

         Session::access($role);

         Acsn::response("home");
      }
   }

   public static function register($data)
   {
      $data = [
         "name"     => htmlspecialchars($data['name']),
         "email"    => htmlspecialchars($data['email']), 
         "username" => htmlspecialchars($data['username']),
         "password" => htmlspecialchars($data['password'])
      ];

      $alreadyUsernames = User::readAllUsername(); 

      foreach ($alreadyUsernames as $alreadyUsername) 
      {
         if ($username === $alreadyUsername['username']) 
         {
            Flash::set('red', 'username sudah ada'); 

            Acsn::response('auth|sign-up'); 

            exit(); 
         }
      }

      UserAction::register($data); 

      Flash::set('green', 'akun telah dibuat'); 

      Acsn::response("auth|sign-in"); 
   }

   public static function changePassword($data)
   {

   }

   public static  function logout()
   {
      $_SESSION = [];
      session_unset();
      session_destroy();

      Acsn::response("auth|sign-in"); 
   } 
}