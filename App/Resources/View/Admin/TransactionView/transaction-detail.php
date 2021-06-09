<?php 
   use Core\View; 
   use Models\Data\TransactionData as Transaction; 
   
   $status = Transaction::readStatusByid($this->name);

?>

<main class="p-10 w-full">
   <h2 class="text-2xl font-semibold mb-5">Transaction Detail</h2>

   <div class="grid grid-cols-10 gap-x-7 w-full">   
      <div class="col-span-8 grid grid-cols-2 gap-5">
         <?= $this->component("detail-info") ?>
         <?= $this->component("detail-status-$status") ?>
         <?= $this->component("detail-product") ?>
      </div>
      <?= $this->component("transaction-link") ?>
   </div>
</main>
