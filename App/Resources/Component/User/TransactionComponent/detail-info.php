<?php
   use Models\Data\TransactionData as Transaction; 
   use Models\Data\TransactionDetailData as TransactionDetail; 

   $transaction = Transaction::readTransactionById($this->name);
   $totalProduct = TransactionDetail::readTotalTransactionDetail($this->name); 
   $totalPrice = TransactionDetail::readTotalPrice($this->name); 

?>

<div class="col-span-2 ">
   <h2 class="text-lg font-semibold">Transaction Info</h2>

   <div class="flex border-2 border-gray-300 p-3">
      <div class="mr-4 d">
         <div>Status</div>
         <div>Payment</div>
         <div>Courier</div>
         <div>Address</div>
         <div>Total product</div>
         <div>Total price</div>
      </div>
      <div>
         <div>: <?= $transaction['status'] ?></div>
         <div>: <?= $transaction['payment'] ?></div>
         <div>: <?= $transaction['courier'] ?></div>
         <div>: <?= $transaction['address'] ?></div>
         <div>: <?= $totalProduct ?></div>
         <div>: <?= $totalPrice ?></div>
      </div>
   </div>
</div>