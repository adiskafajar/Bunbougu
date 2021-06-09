<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\TransactionDetailData as TransactionDetail; 

   // $transactionDetails = TransactionDetail::readAllByTransactionId($this->name); 
   $transactionDetails = TransactionDetail::readAllByTransactionId($this->name);
?>

<div class="col-span-2 ">
   <h2 class="text-lg font-semibold">Transaction Product</h2>
   
   <?php foreach ( $transactionDetails as $transactionDetail ) : ?>      
      <div class="flex items-center h-18 mb-3 mt-2 border-2 border-gray-300 rounded-lg overflow-hidden">
         <!-- product image -->
         <img class="h-full w-20 mr-3" src="<?= Image::storage("product", $transactionDetail['image']) ?>" alt="">
   
         <!-- info product -->
         <div class="mr-auto ">
            <span class="text-lg font-semibold "><?= $transactionDetail['product'] ?></span>
            <br>
            <span class="text-sm leading-tight">Rp. <?= $transactionDetail['price'] ?></span>
         </div>
   
         <div class="mr-5"><?= $transactionDetail['quantity'] ?> items</div>
      </div>
   <?php endforeach ; ?>
</div>