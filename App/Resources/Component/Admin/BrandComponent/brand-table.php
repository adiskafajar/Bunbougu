<?php
   use Helper\Image; 
   use Models\Data\BrandData as Brand; 

   $brands = Brand::readAllBrand($this->page == "brand" ? $this->name : null); 
?>

<div>
   <!-- action bar -->
   <div class="flex justify-between items-center px-3 mb-3">

      <!-- btn craete -->
      <div>
         <a class="inline-block px-5 mr-auto border border-gray-300 rounded-lg hover:bg-blue-500 hover:shadow hover:text-white <?= $this->page == "create-brand" ? "bg-blue-500  text-white shadow" : null ?>" href="<?= $this->request("{$this->view}|create-brand") ?>">create</a>
      </div>

      <!-- search -->
      <form class="inline-block relative focus-within:text-gray-500" action="<?= $this->request("brand") ?>" method="post">
         <input type="hidden" name="action" value="search">
         <button class="absolute top-0 bottom-0 left-2" type="submit">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M21.0004 20.9999L16.6504 16.6499" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                  
         </button>
         <input id="search-input" class="py-1 pl-9 border rounded-lg bg-gray-auth focus:outline-none focus:ring focus:ring-gray-300" name="keyword" type="text" placeholder="Search" autocomplete="off">
      </form>
   </div>

   <!-- table brand -->
   <div class="table text-center shadow-lg w-full">

      <!-- table head -->
      <div class="table-header-group bg-gray-300 text-lg font-semibold">
         <div class="table-cell py-2 px-5">No</div>
         <div class="table-cell py-2 px-5">Brand</div>
         <div class="table-cell py-2 px-5">Image</div>
         <div class="table-cell py-2 px-5" colspan="2">Action</div>
      </div>

      <!-- table body -->
      <div class="table-row-group">
         <?php if ( $brands ) : ?>       
            <?php foreach ( $brands as $brand ) : ?>
               <div class="table-row">
                  <div class="table-cell py-2 px-5"><?= $this->no-=-1 ?></div>
                  <div class="table-cell py-2 px-5"><?= $brand['brand'] ?></div>
                  <div class="table-cell py-2 px-5"><img class="h-10 w-10 mx-auto" src="<?= Image::show($this->view, $brand['image']) ?>" height="40px" width="40px"></div>
                  <div class="table-cell py-2 px-5">
                     <!-- edit button -->
                     <a class="inline-block px-5 border border-gray-300 rounded-lg hover:bg-yellow-500 hover:shadow hover:text-white <?= $this->name == $brand['brand'] ? "bg-yellow-500 text-white shadow" : null ?>" href="<?= $this->request("{$this->view}|edit-brand|{$brand['brand']}") ?>">edit</a>

                     <!-- delete button -->
                     <form class="inline" action="<?= $this->request($this->view) ?>" method="post">
                        <input type="hidden" name="action" value="dropBrand">
                        <input type="hidden" name="brand_id" value="<?= $brand['brand_id'] ?>">
                        <button class="px-5 border border-gray-300 rounded-lg hover:bg-red-500 hover:shadow hover:text-white " type="submit">delete</button>
                     </form>
                  </div>
               </div>
            <?php endforeach ;?>
         <?php else : ?>
            <div class="table-cell text-lg text-red-500">Data empty</div>
         <?php endif ;?>
      </div>
   </div>
</div>
