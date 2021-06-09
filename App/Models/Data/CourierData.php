<?php 

namespace Models\Data; 

use Core\Model; 

class CourierData extends Model
{
   private static 
      $table = "couriers", 
      $tableId = "courier_id"; 

   public static function readAllCourier()
   {
      return Model::fetchDataAll("SELECT * FROM couriers");
   }
}