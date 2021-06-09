<?php 

namespace Models\Data; 

use Core\Model; 

class UserData extends  Model 
{
   private static 
      $table   = "users", 
      $tableId = "user_id"; 

   public static function readAllByRole($name="")
   {
      return Model::fetchDataAll("SELECT * FROM users WHERE role='user' HAVING name LIKE '%{$name}%'"); 
   }

   public static function readUserById($userId)
   {
      return Model::fetchDataRow("SELECT * FROM users WHERE user_id='$userId'");
   }

   public static function readUserByName($user)
   {
      return Model::fetchDataRow("SELECT * FROM users WHERE name='$user'");
   }

   public static function readAllUsername()
   {
      return Model::fetchDataAll("SELECT username FROM users"); 
   }

   public static function readTotalUser()
   {
      return Model::fetchDataSIngle("SELECT COUNT(*) as total_user FROM users WHERE role='user'", "total_user"); 
   }

   public static function readUserByUsername($username)
   {
      // $table        = self::$table; 
      // $sql          = "SELECT * FROM $table WHERE username='$username'";
      // $query        = mysqli_query(self::connect(), $sql); 
      // $readUsername = mysqli_fetch_assoc($query); 

      // !$query ? die("failed read username data user") : null; 

      // return $readUsername;

      return Model::fetchDataRow("SELECT * FROM users WHERE username='$username'");

   }
}