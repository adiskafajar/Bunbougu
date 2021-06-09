<?php

namespace Resources\Logic\User; 

use Core\Logic; 

use Helper\Image; 
use Helper\Upload; 

use Models\Action\CartAction; 
use Models\Action\TransactionAction; 
use Models\Action\TransactionDetailAction; 

use Models\Data\CartData; 
use Models\Data\TransactionData; 
use Models\data\UserData; 


class TransactionLogic extends Logic 
{
   public static function addTransaction($data)
   {  
      $user = UserData::readUserById($data['user_id']); 
      $totalPrice = cartData::readTotalPrice($data['user_id']); 

      $dataTransaction = [
         "user_id"     => htmlspecialchars($data['user_id']), 
         "payment_id"  => htmlspecialchars($data['payment_id']), 
         "courier_id"  => htmlspecialchars($data['courier_id']), 
         "address"     => $user['address'], 
         "status"      => "payment", 
         "total_price" => $totalPrice,
         "proof_payment" => null
      ];

      TransactionAction::create($dataTransaction); 

      $transactionId = TransactionData::readNewId();
      $carts = CartData::readAllCartByUser($data['user_id']);

      if($carts){      
         foreach($carts as $cart) {
            $dataDetailTransaction = [
               "transaction_id" => $transactionId,
               "product_id"     => $cart['product_id'], 
               "quantity"       => $cart['quantity']
            ];
   
            TransactionDetailAction::create($dataDetailTransaction); 
         }
      }

      CartAction::deleteCartByUser($data['user_id']); 

      Logic::response("transaction|payment"); 
   }

   public static function changeStatus($data)
   {
      $data = [
         "transaction_id" => htmlspecialchars($data['transaction_id']), 
         "status" => htmlspecialchars($data['status'])
      ];

      TransactionAction::updateStatus($data);

      Logic::response("transaction|transaction-detail|{$data['transaction_id']}");
   }

   public static function addProofPayment($data, $file)
   {
      $data = [ 
         "transaction_id" => htmlspecialchars($data['transaction_id']), 
         "proof_payment" => Upload::image($file, "transaction")
      ];

      TransactionAction::updateProofPayment($data); 
      
      Logic::response("transaction|transaction-detail|{$data['transaction_id']}"); 
   }

   public static function dropProofPayment($data)
   {
      $data = [
         "transaction_id" => htmlspecialchars($data['transaction_id']), 
         "proof_payment" => null 
      ]; 

      Image::drop("transaction", $data['proof_payment_old']);

      TransactionAction::updateProofPayment($data); 

      // var_dump($data['transaction_id']); 

      // die;

      Logic::response("transaction|transaction-detail|{$data['transaction_id']}");
   }
}