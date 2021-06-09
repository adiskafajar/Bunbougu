<?php 

namespace Models; 

use Core\Model; 

abstract class BrandModel extends Model 
{
   private static 
      $table = "brands", 
      $tableId = "brand_id"; 

   public static function readAllBrand() 
   {
      $table = self::$table; 
      $sql = "SELECT * FROM $table"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed read data brand") : null ;

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

      !$query ? die("failed read id data brand") : null; 

      return $readId;
   }

   public static function readForHome()
   {
      $sql =  "SELECT * FROM ".self::$table." LIMIT 5"; 
      $query = mysqli_query(self::connect(), $sql); 
      $readBrand = null; 

      while($data = mysqli_fetch_assoc($query))
      {
         $readBrand[] = $data; 
      }

      return $readBrand; 
   }

   public static function create($brand, $image)
   {
      $table = self::$table; 
      $sql = "INSERT INTO $table VALUES('', '$brand', '$image')"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed create data brand") : null; 
   }

   public static function update($id, $brand, $image){
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "UPDATE $table SET 
         brand='$brand',
         image='$image'
      WHERE $tableId=$id";
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed update data brand") : null; 
   }
   
   public static function delete($id)
   {
      $table = self::$table; 
      $tableId = self::$tableId; 
      $sql = "DELETE FROM $table WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("failed delete data brang") : null; 
   }

   public static function search($keyword)
   {
      $table = self::$table; 
      $sql = "SELECT * FROM $table WHERE brand LIKE '%$keyword%'";
      $query = mysqli_query(self::connect(), $sql); 
      $search = null; 

      !$query ? die("failed find query data brand") : null;

      while($data = mysqli_fetch_array($query))
      {
         $search[] = $data;  
      }

      return $search; 
   }
}