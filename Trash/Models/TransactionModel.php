<?php 

namespace Models; 

use Core\Model; 

abstract class TransactionModel extends Model
{
   private static
      $table = "transactions", 
      $tableId = "transaction_id"; 

   public static function read()
   {
      $table = self::$table; 
      $sql = "SELECT * FROM $table INNER JOIN users ON transactions.user_id=users.user_id INNER JOIN products ON transactions.product_id=products.product_id"; 
      $query = mysqli_query(self::connect(), $sql); 

      !$query ? die("falied create transaction") : null;

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
      $sql = "SELECT * FROM $table INNER JOIN users ON transactions.user_id=users.user_id INNER JOIN products ON transactions.product_id=products.product_id WHERE $tableId=$id"; 
      $query = mysqli_query(self::connect(), $sql); 
      $readId = mysqli_fetch_assoc($query); 

      !$query ? die("failed read id transaction") : null;

      return $readId; 
   }

   public static function create($user, $product, $status)
   {
      $table = self::$table; 
      $sql = "INSERT INTO $table VALUES('', '$user', '$product', '$status')"; 
      $query = mysqli_query(self::connect(), $sql);

      !$query ? die("failed create data transaction") : null; 
   }

   public static function update($id, $user, $product, $status)
   {
      $table = self::$table; 
      $tableId = self::tableId; 
      $sql = "UPDATE $table SET
         user_id='$user', 
         product_id='$product', 
         status='$status'
      WHERE $tableId=$id";

   }

   public static function delete($id)
   {
      $table = self::$table; 
      $tableId = self::tableId; 
      $sql = "DELETE FROM $table WHERE $tableId=$id"; 
      $query = mysqli_query($sql); 

      !$query ? die("failed delete data transaction") : null; 
   }
}