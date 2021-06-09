<?php
   use Core\View; 
   use Models\Data\AddressData as Address; 

   $addresses = Address::readAllByUserId($this->user); 

   function mainAddress($addressId){
      return Address::readMainAddressByAddressId($addressId); 
   }
?>

<div class="col-span-7">
   <!-- action bar -->
   <div class="flex items-center mb-3">
      <a class="inline-block px-5 border border-gray-300 rounded-lg hover:shadow hover:bg-blue-500 hover:text-white <?= $this->page == "address-create" ? "bg-blue-500 shadow text-white" : null ?>" href="<?= $this->request("address|address-create") ?>">create</a>
   </div>

   <!-- address table -->
   <div class="table text-center shadow-lg w-full">
      <!-- table head -->
      <div class="table-header-group bg-gray-300 text-lg font-semibold">
         <div class="table-row">
            <div class="table-cell py-2">No</div>
            <div class="table-cell py-2">Province</div>
            <div class="table-cell py-2">City</div>
            <div class="table-cell py-2">Address</div>
            <div class="table-cell py-2">Receiver</div>
            <div class="table-cell py-2">Action</div>
         </div>
      </div>

      <!-- table body -->
      <div class="table-row-group">
         <?php if( $addresses ) : ?>
            <?php foreach( $addresses as $address ) : ?>
               <div class="table-row">
                  <div class="table-cell py-2"><?= $this->no-=-1 ?></div>
                  <div class="table-cell py-2"><?= $address['province_id'] ?></div>
                  <div class="table-cell py-2"><?= $address['city_id'] ?></div>
                  <div class="table-cell py-2"><?= $address['address'] ?></div>
                  <div class="table-cell py-2"><?= $address['receiver'] ?></div>
                  <div class="table-cell py-2">
                     <!-- change button / main status -->
                     <form class="inline-block" action="<?= $this->request($this->view) ?>" method="post">
                        <input type="hidden" name="action" value="changeMainAddress">
                        <input type="hidden" name="address_id" value="<?= $address['address_id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $this->user ?>">
                        <button class="w-full px-5 border border-gray-300 shadow rounded-lg hover:bg-green-500 hover:text-white <?= mainAddress($address['address_id']) ? "bg-green-500 text-white" : null ?>" >main</button>
                     </form>

                     <!-- edit-button -->
                     <a class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white <?= $this->page=="address-edit" && $this->name==$address['address_id'] ? "bg-yellow-500 text-white" : null ?>" href="<?= $this->request("{$this->view}|address-edit|{$address['address_id']}") ?>">edit</a>

                     <!-- deleteb button -->
                     <form class="inline-block" action="<?= $this->request($this->view) ?>" method="post">
                        <input type="hidden" name="address_id" value="<?= $address['address_id'] ?>">
                        <input type="hidden" name="action" value="dropAddress">
                        <button class="w-full px-5 border border-gray-300 shadow rounded-lg hover:bg-red-500 hover:text-white" type="submit">delete</button>
                     </form>
                  </div>
               </div>
            <?php endforeach ; ?> 
         <?php else :  ?>
            <div class="text-lg sm:text-red-500 font-semibold"></div>
         <?php endif ; ?>
      </div>
   </div>
</div>