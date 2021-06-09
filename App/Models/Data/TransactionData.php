<?php 

namespace Models\Data; 

use Core\Model; 
use Helper\MixFunction as Func; 

class TransactionData extends Model
{
   private static
      $table = "transactions", 
      $tableId = "transaction_id"; 

   public static function readAllByStatus($status)
   {
      return Model::fetchDataAll(
         "SELECT * FROM transactions 
            INNER JOIN users ON transactions.user_id = users.user_id 
            INNER JOIN payments ON transactions.payment_id = payments.payment_id
            INNER JOIN couriers ON transactions.courier_id = couriers.courier_id
         WHERE 
            status='$status'
         "
      );
   }
   
   public static function readUserTransactionByStatus($status, $userId)
   {
      return Model::fetchDataAll("SELECT * FROM transactions WHERE status='$status' AND user_id='$userId'"); 
   }

   public static function readTotalTransactionByStatusPayment()
   {
      return Model::fetchDataSingle("SELECT COUNT(status) as status FROM transactions WHERE status='payment'"); 
   }

   public static function readTransactionById($transactionId)
   {
      return Model::fetchDataRow(
         "SELECT * FROM transactions 
            INNER JOIN users ON transactions.user_id = users.user_id 
            INNER JOIN payments ON transactions.payment_id = payments.payment_id
            INNER JOIN couriers ON transactions.courier_id = couriers.courier_id
         WHERE transaction_id='$transactionId'"
      ); 
   }

   public static function readStatusById($transactionId)
   {
      return Model::fetchDataSingle(
         "SELECT status FROM transactions WHERE transaction_id='$transactionId'"
      );
   }

   public static function readNewId()
   {
      return Model::fetchDataSingle("SELECT MAX(transaction_id) as transaction_id FROM transactions");
   }

   public static function checkUserInTransaction($userId, $transactionId)
   {
      return Func::inArrayToBool($transactionId,
         Model::fetchDataArray(
            "SELECT transaction_id FROM transactions WHERE user_id='$userId'"
         )
      );
   }

   public static function readTotalTransactionByUserId($userId)
   {
      return Model::fetchDataSingle("SELECT COUNT(*) FROM transactions WHERE user_id='$userId'");
   }
}