<?php

class Model {
   protected static function fetchDataSingle($query, $key, $error="failed get data single")
   {
      $result = Model::query($query, $error); 

      $fetchData = mysqli_fetch_row($result);

      return $fetchData[$key];
   }

   protected static function fetchDataArray($query, $key, $error="failed get data array")
   {
      $result = Model::query($query, $error); 

      $fetchData = [];

      while($data = mysqli_fetch_assoc($result))
      {
         $fetchData[] = $data[$key]; 
      }

      return $fetchData;
   }
}

