<?php 

namespace Models\Action; 

use Core\Model; 

class TransactionDetailAction extends Model
{
   public static function create($data)
   {
      return Model::action(
         "INSERT INTO transaction_details VALUES(
            '',
            '{$data['transaction_id']}',
            '{$data['product_id']}',
            '{$data['quantity']}'
         )"
      );
   }
}

