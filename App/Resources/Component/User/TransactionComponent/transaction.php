<?php 
   use Helper\Image; 
   use Models\Data\TransactionData as Transaction; 
   use Models\Data\TransactionDetailData as TransactionDetail; 

   $transactions = Transaction::readUserTransactionByStatus($this->page, $this->user);

   function totalPrice($transactionId){
      return TransactionDetail::readTotalPrice($transactionId); 
   }

   function totalTransaction($transactionId){
      return TransactionDetail::readTotalTransactionDetail($transactionId); 
   }

   function transactionDetail($transactionId){
      return TransactionDetail::readAllByTransactionId($transactionId); 
   }
?>

<section id="container" class="col-span-2 xl:col-span-1 order-1 xl:order-2">
   <div class="text-lg font-semibold mt-10">My Transaction</div>

   <?php if( $transactions ) : ?>
      <?php foreach( $transactions as $transaction ) : ?>      
         <div class="flex items-center h-25 mt-3 px-5 border-2 overflow-hidden">
            <div class="mr-auto">

               <!-- total price -->
               <span class="inline-block ">Total: Rp. <?= totalPrice($transaction['transaction_id']) ?></span>

               <!-- transaction product box -->
               <div class=" w-50 ">
                  <div class="flex relative justify-between px-2 border-2 cursor-pointer hover:shadow">
                     <span class=""><?= totalTransaction($transaction['transaction_id']) ?> items</span>
                     <svg class="" width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="#D1D5DB" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path>
                     </svg>
                     <div class="toggler absolute inset-0"></div>
                  </div>

                  <!-- transaction product list -->
                  <div class="hidden absolute z-10 bg-white border shadow ">
                     <?php foreach( transactionDetail($transaction['transaction_id']) as $transactionDetail ) : ?>
                        <a class="flex justify-between items-center h-20 mb-1 px-4 hover:bg-gray-300 " href="<?= $this->request("product|product-detail|{$transactionDetail['product']}") ?>" >
                           <img class="h-full w-20 mr-5" src="<?= Image::show("product", "{$transactionDetail['image']}") ?>" alt="">
                           <span><?= $transactionDetail['product'] ?>(<?= $transactionDetail['quantity'] ?>)</span>
                        </a>  
                     <?php endforeach ; ?>
                  </div>   
               </div>
            </div>

            <!-- link detail transaction -->
            <a href="<?= $this->request("transaction|transaction-detail|{$transaction['transaction_id']}") ?>" class="hover:underline">Detail Transaction</a>
         </div>   
      <?php endforeach ; ?>
   <?php else : ?>
      <span class="text-red-600">data empty</span>
   <?php endif ; ?>
</section>

<script>
   const togglers = document.querySelectorAll(".toggler")

   togglers.forEach((toggler)=>{
      toggler.addEventListener('mouseover', (element)=>{
         element.target.parentElement.nextElementSibling.classList.toggle("hidden")
         element.stopPropagation
      })
   })
</script> 