<?php 

namespace Core;

abstract class Model
{
   private static
      $host = DB_HOST, 
      $user = DB_USER, 
      $pass = DB_PASS,
      $name = DB_NAME;

   private static function connect()
   {
      $connect = mysqli_connect(self::$host, self::$user, self::$pass, self::$name) or die ("failed connect database");
      return $connect; 
   }

   private static function query($query, $error)
   {
      $result = mysqli_query(Model::connect(), $query) or die ($error); 

      return $result; 
   }

   protected static function action($query, $error="failed run action")
   {
      return Model::query($query, $error);
   }

   protected static function fetchDataAll($query, $error="failed get all data")
   {
      $result = Model::query($query, $error); 

      $fetchData = [];

      while($data = mysqli_fetch_assoc($result))
      {
         $fetchData[] = $data; 
      }

      return $fetchData;
   }

   protected static function fetchDataRow($query, $error="faled get row data")
   {
      $result = Model::query($query, $error);

      $fetchData = mysqli_fetch_assoc($result); 

      return $fetchData;
   }

   protected static function fetchDataSingle($query, $error="failed get data single")
   {
      $result = Model::query($query, $error); 

      $fetchData = mysqli_fetch_row($result);

      return $fetchData[0];
   }

   protected static function fetchDataArray($query, $error="test failed")
   {
      $result = Model::query($query, $error); 

      $fetchData = []; 

      while($data = mysqli_fetch_row($result))
      {
         $fetchData[] = $data[0]; 
      }

      return $fetchData;
   }
}     