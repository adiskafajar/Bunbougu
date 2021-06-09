<?php
   use Core\View; 
   use Plugin\RajaOngkir; 

   $provinces = []; 
   $citys = [];  
?>   

<div class="col-span-3 p-5 shadow-lg">
   <h2 class="mb-1 text-lg font-semibold">Create Product</h2>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <form action="<?= $this->request($this->view) ?>" method="post">
      <input type="hidden" name="action" value="addAddress">
      <input type="hidden" name="user_id" value="<?= $this->user ?>">

      <div class="table mb-3">
         <div class="table-row">
            <label class="table-cell " for="category">province</label>      
            <select class="table-cell border" name="province_id" id="">
               <option value="1">Province</option>
               <?php foreach ( $provinces as $province ) : ?>
                  <option value="<?= $province['province_id'] ?>"><?= $province['category'] ?></option>
               <?php endforeach ;?>
            </select>
         </div>

         <div class="table-row">
            <label class="table-cell " for="brand">city</label>      
            <select class="table-cell border" name="city_id" id="">
               <option value="1">City</option>
               <?php foreach ( $citys as $city ) : ?>
                  <option value="<?= $city['city_id'] ?>"><?= $city['city'] ?></option>
               <?php endforeach ;?>
            </select>
         </div>

         <div class="table-row">
            <label class="table-cell " for="address">address</label>
            <input class="table-cell border" type="text" name="address" placeholder="" required>
         </div>

         <div class="table-row">
            <label class="table-cell " for="receiver">receiver</label>
            <input class="table-cell border" type="text" name="receiver" placeholder="" required>
         </div>
      </div>

      <button class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white" type="submit">Create</button>
   </form>
</div>