<?php 

namespace Models\Action; 

use Core\Model; 

class TransactionAction extends Model
{
   private static
      $table = "transactions", 
      $tableId = "transaction_id"; 

   public static function create($data)
   {
      return Model::action(
         "INSERT INTO transactions VALUES(
            '', 
            '{$data['user_id']}', 
            '{$data['payment_id']}', 
            '{$data['courier_id']}', 
            '{$data['address']}', 
            '{$data['status']}',
            '{$data['total_price']}',
            '{$data['proof_payment']}'
         )"
      );
   }

   public static function update($data)
   {
      return Model::action(
         "UPDATE transactions SET 
            user_id     ='{$data['user_id']}', 
            payment_id  ='{$data['payment_id']}', 
            courier_id  ='{$data['courier_id']}',
            address     ='{$data['address']}',
            status      ='{$data['status']}',
            total_price ='{$data['total_price']}'
         WHERE transaction_id={$data['transaction_id']}"
      );
   }

   public static function updateStatusTransaction($data)
   {
      return Model::action(
         "UPDATE transactions SET 
            status='{$data['status']}'
         WHERE transaction_id={$data['transaction_id']}"
      );
   }

   public static function delete($id)
   {
      return Model::action("DELETE FROM transactions WHERE transaction_id=$id");
   }

   public static function updateStatus($data){
      return Model::action(
         "UPDATE transactions SET 
            status='{$data['status']}' 
         WHERE transaction_id='{$data['transaction_id']}'"
      );
   }

   public static function updateProofPayment($data){
      return Model::action(
         "UPDATE transactions SET 
            proof_payment='{$data['proof_payment']}'
         WHERE transaction_id='{$data['transaction_id']}'", "asdasd"
      );
   }
}