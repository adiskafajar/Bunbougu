<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\PaymentData as Payment; 

   $payments = Payment::readAllPayment(); 
?>


<div class="row-span-1 mt-3">
   <span class="text-lg font-semibold">Payment</span>

   <div class="grid grid-cols-2 gap-5 p-3 border-2 rounded-lg text-lg font-semibold">
      <?php foreach ( $payments as $payment ) : ?>      
         <label id="payment-radio">   
            <input class="hidden" type="radio" name="payment_id" value="<?= $payment['payment_id'] ?>" required>
            <div id="radio-btn" class=" flex shadow h-full p-5 rounded-lg hover:bg-gray-200 cursor-pointer">
               <div class="m-auto">
                  <img class="self-center" src="<?= Image::storage("payment", $payment['payment_image']) ?>" alt="">
               </div>
            </div>
         </label>   
      <?php endforeach ;?>
   </div>
</div>

<style>
   #payment-radio input:checked + #radio-btn{
      background-color: #E5E7EB;
   }
</style>

<script>

</script>
