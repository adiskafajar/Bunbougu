<?php 

namespace Resources\Logic\Admin; 

use Core\Logic; 
use Models\Action\TransactionAction as Transaction; 
use Models\Action\UserAction as User; 
use Models\Action\ProductAction as Product;

class TransactionLogic extends Logic
{
   public static function changeTransaction($data)
   {
      $data = [
         "transaction_id" => $data['transaction_id'],
         "user_id"        => $data['user_id'], 
         "payment_id"     => $data['payment_id'],
         "courier_id"     => $data['courier_id'], 
         "address"        => $data['address'], 
         "status"         => $data['status'], 
         "total_price"    => $data['total_price']
      ];

      return Transaction::update($data);
   }

   public static function deleteTransaction($data)
   {
      $data = [
         "transaction_id" => htmlspecialchars($data['transaction_id'])
      ];

      return Transaction::delete($data); 
   }

   public static function changeStatus($data)
   {
      $data = [
         "transaction_id" => htmlspecialchars($data['transaction_id']), 
         "status" => htmlspecialchars($data['status'])
      ];

      Transaction::updateStatus($data);

      Logic::response("transaction|transaction-detail|{$data['transaction_id']}");
   }
}