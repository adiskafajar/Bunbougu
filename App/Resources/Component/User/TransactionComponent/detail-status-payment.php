<?php 
   use Helper\Image; 
   use Models\Data\TransactionData as Transaction; 

   $transaction = Transaction::readTransactionById($this->name); 

   // var_dump($transaction['proof_payment']); 
?>

<div class="col-span-2">
   <h2 class="text-lg font-semibold mt-3">Transaction Status</h2>

   <div class="p-5 text-center border-2 border-gray-300">
      <div class="mb-5">Lakukan pengisian ovo ke <br> nomor berikut: </div>
      <img class="mb-5 mx-auto" src="<?= Image::show("payment", $transaction['payment_image']) ?>">
      <?php if( empty($transaction['proof_payment']) ) : ?>         
         <div class="mb-5"><?= $transaction['no_payment'] ?></div>
         <form action="<?= $this->request("transaction") ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addProofPayment">
            <input type="hidden" name="transaction_id" value="<?= $this->name ?>">

            <input class="ml-20 mb-5" type="file" name="image" id="" required >
            <button class="px-5 py-1 border-2 border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-white" type="submit">Upload bukti pembayaran</button>
         </form>
      <?php else : ?>
         <img class="mb-5 mx-auto" src="<?= Image::show("transaction", $transaction['proof_payment']) ?>" alt="">

         <form class="inline-block" action="<?= $this->request("transaction") ?>" method="post">
            <input type="hidden" name="action" value="dropProofPayment">
            <input type="hidden" name="transaction_id" value="<?= $transaction['transaction_id'] ?>">
            <input type="hidden" name="proof_payment_old" value="<?= $transaction['proof_payment'] ?>">

            <button class="px-5 py-1 border-2 border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-white" type="submit">Reupload</button>
         </form>

         <form class="inline-block" action="<?= $this->request("transaction") ?>" method="post">
            <input type="hidden" name="action" value="changeStatus">
            <input type="hidden" name="status" value="awaiting">
            <input type="hidden" name="transaction_id" value="<?= $this->name ?>">

            <button class="px-5 py-1 border-2 border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-white" type="submit">Konfirmasi</button>
         </form>
      <?php endif ; ?>
   </div>
</div>                                                                        