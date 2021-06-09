<?php 

namespace Models; 

use Core\Model;

abstract class UserModel extends Model
{
   private static 
      $table   = "users", 
      $tableId = "user_id"; 

   public static function read()
   {
      $table = self::$table; 
      $sql   = "SELECT * FROM $table WHERE role='user'"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed read data user") : null; 

      while($data = mysqli_fetch_array($query))
      {
         $read[] = $data; 
      }

      return $read; 
   }

   public static function readId($id)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "SELECT * FROM $table WHERE $tableId=$id"; 
      $query   = mysqli_query(self::connect(), $sql); 
      $readId  = mysqli_fetch_assoc($query); 

      !$query ? die("failed read id data user") : null; 

      return $readId; 
   }

   public static function readAllUsername()
   {
      $table = self::$table; 
      $sql = "SELECT username FROM $table"; 
      $query = mysqli_query(self::connect(), $sql); 
      $readAllUsername = null; 

      !$query ? die("failed read all username") : null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readAllUsername[] = $data;  
      }

      return $readAllUsername; 
   }

   public static function readUsername($username)
   {
      $table        = self::$table; 
      $sql          = "SELECT * FROM $table WHERE username='$username'";
      $query        = mysqli_query(self::connect(), $sql); 
      $readUsername = mysqli_fetch_assoc($query); 

      !$query ? die("failed read username data user") : null; 

      return $readUsername;
   }

   public static function create($name, $email, $username, $password, $address, $gender, $contact, $image)
   {
      $table = self::$table; 
      $sql   = "INSERT INTO $table VALUES('', '$name', '$username', '$email', '$password', '$address', '$gender', '$contact', '$image', 'user')";
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed create data user") : null;
   }

   public static function update($id, $name, $email, $username, $password, $address, $gender, $contact, $image)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "UPDATE $table SET
         name     ='$name', 
         email    ='$email', 
         username ='$username', 
         password ='$password', 
         address  ='$address', 
         gender   ='$gender',
         contact  ='$contact',
         image    ='$image'
      WHERE $tableId=$id";
      $query = mysqli_query(self::connect(), $sql);  

      !$query ? die("failed update data user") : null; 
   }

   public static function delete($id)
   {
      $table   = self::$table; 
      $tableId = self::$tableId; 
      $sql     = "DELETE FROM $table WHERE $tableId=$id"; 
      $query   = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed delete data user") : null; 
   }

   public static function search($keyword)
   {
      $table  = self::$table; 
      $search = null; 
      $sql    = "SELECT * FROM $table WHERE 
         name    LIKE '%$keyword%' OR 
         address LIKE '%$keyword%' OR
         email   LIKE '%$keyword%' OR
         contact LIKE '%$keyword%' OR
         gender  LIKE '%$keyword%' 
      ";
      $query = mysqli_query(self::connect(), $sql);  

      !$query ? die("failed search data user") : null; 

      while($data = mysqli_fetch_array($query))
      {
         $search[] = $data;
      }

      return $search; 
   }

   public static function register($name, $email, $username, $password, $gender)
   {
      $table = self::$table;
      $sql = "INSERT INTO $table VALUES('', '$name', '$email', '$username', '$password', '', '$gender', '', '', 'user')";  
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed register data user") : null; 
   }

   public static function editProfile()
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
   }
}
