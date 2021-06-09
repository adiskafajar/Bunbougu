<?php 
   use Models\Data\TransactionData as Transaction;

   $checkTransaction = Transaction::checkUserInTransaction($this->user, $this->name);  
?>

<main class="grid xl:grid-cols-5 gap-x-4 container mx-auto px-5 xl:px-40">
   <?php if( $checkTransaction ) : ?>
      <?php $transaction = Transaction::readTransactionById($this->name) ?>
      <?= $this->component("detail-product") ?>
      <?= $this->component("detail-info") ?>
      <?= $this->component("detail-status-{$transaction['status']}") ?>
   <?php else : ?>
      <div class="text-red-500 text-xl font-semibold">Can't find transaction</div>
   <?php endif ; ?>
</main>

<script>

</script>