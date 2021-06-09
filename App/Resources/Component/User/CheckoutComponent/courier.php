<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\CourierData as Courier; 

   $couriers = Courier::readAllCourier();
   
?>

<div class="row-span-1 mt-3">
   <span class="text-lg font-semibold">Courier</span>

   <div class="grid grid-cols-2 gap-5 border-2 p-3 mt-2 rounded-lg text-lg font-semibold">
      <?php foreach ( $couriers as $courier ) : ?>   
         <label class="" id="courier-radio">
            <input class="hidden" type="radio" name="courier_id" value="<?= $courier['courier_id'] ?>" required>
            <div id="radio-btn" class="flex h-full shadow rounded-lg overflow-hidden hover:bg-gray-200 cursor-pointer">
               <div class="m-auto">
                  <img class="h-20" src="<?= Image::storage("courier", $courier['courier_image']) ?> " alt="">
               </div>
            </div>
         </label>      
      <?php endforeach ;?>
   </div>
</div>

<style>
   #courier-radio input:checked + #radio-btn{
      background-color: #E5E7EB;
   }
</style>