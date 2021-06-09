<?php 

namespace Models\Data; 

use Core\Model; 

class PaymentData extends Model
{
   private static 
      $table = "payments", 
      $tableId = "payment_id"; 
      
   public static function readAllPayment()
   {
      return Model::fetchDataAll("SELECT * FROM payments");
   }
}