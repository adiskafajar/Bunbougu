<?php

namespace Models\Data;

use Core\Model;

class TransactionDetailData extends Model
{
   public static function readAllByTransactionId($transactionId)
   {
      return Model::fetchDataAll(
         "SELECT * FROM transaction_details 
            INNER JOIN products ON transaction_details.product_id = products.product_id
            LEFT  JOIN product_images ON products.product_id = product_images.product_id
         WHERE 
            transaction_id='$transactionId' AND 
            main = 'true'
         ", "gagal eaeaea"
      );
   }

   public static function readTotalTransactionDetail($transactionId)
   {
      return Model::fetchDataSingle("SELECT COUNT(*) as total_transaction_detail FROM transaction_details WHERE transaction_id='$transactionId'", "total_transaction_detail" );
   }

   public static function readTotalPrice($transactionId)
   {
      $products = TransactionDetailData::readAllByTransactionId($transactionId); 
      $totalPrice = 0; 

      if($products){
         foreach($products as $product){
            $totalPrice += $product['price'] * $product['quantity']; 
         }
      }

      return $totalPrice;
   }
}
