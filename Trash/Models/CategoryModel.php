<?php 

namespace Models; 

use Core\Model;                                                   

abstract class CategoryModel extends Model 
{
   private static
      $table = "categories",
      $tableId = "category_id";  

   public static function readAllCategory()
   {
      $table = self::$table;
      $sql = "SELECT * FROM $table";
      $query = mysqli_query(self::connect(), $sql);

      !$query ? die("failed read data category") : null;

      while($data = mysqli_fetch_array($query))
      {
         $read[] = $data; 
      }

      return $read; 
   }

   public static function readId($id)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "SELECT * FROM $table WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql); 
      $readId = mysqli_fetch_assoc($query);  

      !$query ? die("failed read id data category") : null;

      return $readId; 
   } 

   public function readForHome()
   {
      // $sql =  "SELECT * FROM {self::$table} LIMIT 5";
      $sql =  "SELECT * FROM ".self::$table." LIMIT 5";
      $query = mysqli_query(self::connect(), $sql); 
      $readCategory = null; 

      while($data = mysqli_fetch_assoc($query)){
         $readCategory[] = $data; 
      }

      !$query ? die("failde read data category for home") : null; 
      
      return $readCategory; 
   }

   public static function create($category, $image)
   {
      $table = self::$table; 
      $sql = "INSERT INTO $table VALUES('', '$category', '$image')"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed craete data category") : null; 
   } 

   public function update($id, $category, $image)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "UPDATE $table SET
         category='$category',
         image='$image' 
      WHERE $tableId=$id"; 

      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed update data category") : null;
   }

   public static function delete($id)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "DELETE FROM $table WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed delete data category") : null; 
   }

   public static function search($keyword)
   {
      $table = self::$table; 
      $sql = "SELECT * FROM $table WHERE category LIKE '%$keyword%'"; 
      $query = mysqli_query(self::connect(), $sql); 
      $search = null; 

      !$query ? die("failed find keyword") : null; 

      while($data = mysqli_fetch_array($query))
      {
         $search[] = $data; 
      }

      return $search; 
   }
} 