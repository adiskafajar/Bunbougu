<?php
   use Models\Data\TransactionData as Transaction; 
   use Models\Data\TransactionDetailData as TransactionDetail; 

   $transactions = Transaction::readAllByStatus($this->page); 
?>

<div class="table col-span-8 text-center shadow-lg">
   <!-- table head -->
   <div class="table-header-group bg-gray-300 text-lg font-semibold">
      <div class="table-cell py-2 ">No</div>
      <div class="table-cell py-2 ">Nama</div>
      <div class="table-cell py-2 ">Payment</div>
      <div class="table-cell py-2 ">Courier</div>
      <div class="table-cell py-2 ">Items</div>
      <div class="table-cell py-2 ">Total price</div>
      <div class="table-cell py-2 ">Action</div>
   </div>

   <!-- table body -->
   <div class="table-row-group">   
      <?php if( $transactions ) : ?>
         <?php foreach( $transactions as $transaction ) :
            $totalProduct = TransactionDetail::readTotalTransactionDetail($transaction['transaction_id']); 
            $totalPrice = TransactionDetail::readTotalPrice($transaction['transaction_id']); 
         ?>   
            <div class="table-row">
               <div class="table-cell shadow py-2"><?= $this->no-=-1 ?></div>
               <div class="table-cell shadow py-2"><?= $transaction['name'] ?></div>
               <div class="table-cell shadow py-2"><?= $transaction['payment'] ?></div>
               <div class="table-cell shadow py-2"><?= $transaction['courier'] ?></div>
               <div class="table-cell shadow py-2"><?= $totalProduct ?></div>
               <div class="table-cell shadow py-2">Rp. <?= $totalPrice ?></div>
               <div class="table-cell shadow py-2">
                  <a class="inline-block px-5 border border-gray-300 rounded-lg hover:bg-gray-300 hover:shadow hover:text-white" href="<?= $this->request("{$this->view}|transaction-detail|{$transaction['transaction_id']}") ?>">detail</a>
               </div>
            </div>
         <?php endforeach ; ?>
      <?php else : ?>
         <div class="table-row">
            <div class="table-cell text-center text-red-500 text-xl font-semibold">Data Empty</div>
            <div class="table-cell"></div>
            <div class="table-cell"></div>
            <div class="table-cell"></div>
            <div class="table-cell"></div>
            <div class="table-cell"></div>
            <div class="table-cell"></div>
         </div>
      <?php endif ; ?>
   </div>
</div>