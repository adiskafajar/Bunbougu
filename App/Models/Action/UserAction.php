<?php 

namespace Models\Action; 

use Core\Model; 

class UserAction extends Model 
{
   private static 
      $table   = "users", 
      $tableId = "user_id"; 

   public static function create($data)
   {
      return Model::action(
         "INSERT INTO users VALUES(
            '',
            '{$data['name']}',
            '{$data['email']}', 
            '{$data['username']}', 
            '{$data['password']}', 
            '{$data['address']}', 
            '{$data['gender']}', 
            '{$data['contanct']}', 
            '{$data['image']}', 
            'user'
         )"
      );
   }

   public static function update($data)
   {
      return Model::action(
         "UPDATE users SET
            name     ='{$data['name']}', 
            email    ='{$data['email']}', 
            username ='{$data['username']}', 
            password ='{$data['password']}', 
            address  ='{$data['address']}', 
            gender   ='{$data['gender']}',
            contact  ='{$data['contact']}',
            image    ='{$data['image']}'
         WHERE user_id={$data['user_id']}"
      );
   }

   public static function delete($userId)
   {
      return Model::action("DELETE FROM users WHERE user_id='$userId'");
   }

   public static function register($data)
   {
      return Model::action(
         "INSERT INTO $table VALUES(
            '', 
            '{$data['name']}', 
            '{$data['email']}', 
            '{$data['username']}', 
            '{$data['password']}', 
            '', 
            '{$data['gender']}', 
            '', 
            '', 
            'user'
         )"
      );
   }

   // public static function search($keyword)
   // {
   //    $table  = self::$table; 
   //    $search = null; 
   //    $sql    = "SELECT * FROM $table WHERE 
   //       name    LIKE '%$keyword%' OR 
   //       address LIKE '%$keyword%' OR
   //       email   LIKE '%$keyword%' OR
   //       contact LIKE '%$keyword%' OR
   //       gender  LIKE '%$keyword%' 
   //    ";
   //    $query = mysqli_query(self::connect(), $sql);  

   //    !$query ? die("failed search data user") : null; 

   //    while($data = mysqli_fetch_array($query))
   //    {
   //       $search[] = $data;
   //    }

   //    return $search; 
   // }
   public static function editProfile()
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
   }
}