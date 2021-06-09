<?php 
   use Helper\Image; 
   use Models\Data\TransactionData as Transaction; 

   $transaction = Transaction::readTransactionById($this->name); 
?>

<div class="">
   <h2 class="text-lg font-semibold">Transaction Status</h2>

   <div class="p-3 h-36 text-center border-2 border-gray-300">
      <div class="mb-5">User sedang melalkukan pembayaran</div>
      <img class="mb-5 mx-auto" src="<?= Image::show("payment", $transaction['payment_image']) ?>">
   </div>
</div>