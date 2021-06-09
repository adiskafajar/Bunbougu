<?php
   use Core\View; 
   use Models\Data\ProductData as Product; 

   $products = Product::readAllProductTest($this->page == $this->view ? $this->name : null); 
?>

<div>
   <!-- action bar -->

   
   <div class="flex items-center mb-3">
      <a class="inline-block mr-3 px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white <?= $this->page=="create-product" ? "bg-blue-500 text-white" : null ?>" href="<?= $this->request("{$this->view}|create-product") ?>">create</a>
      <a class="inline-block mr-3 px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white" href="<?= $this->request("{$this->view}|create-product") ?>">create</a>
      <a class="inline-block mr-3 px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white" href="<?= $this->request("{$this->view}|create-product") ?>">create</a>
      <a class="inline-block mr-auto px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white" href="<?= $this->request("{$this->view}|create-product") ?>">create</a>

      <form class="inline-block relative focus-within:text-gray-500" action="<?= $this->request($this->view) ?>" method="post">
         <input type="hidden" name="action" value="searchProduct">
         <button class="absolute top-0 bottom-0 left-2" type="submit">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M21.0004 20.9999L16.6504 16.6499" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                  
         </button>
         <input id="search-input" class="py-1 pl-9 border rounded-lg bg-gray-auth focus:outline-none focus:ring focus:ring-gray-300" name="keyword" type="text" placeholder="Search" autocomplete="off">
      </form>
   </div>

   <!-- product table -->
   <div class="table text-center shadow-lg w-full">
      <div class="table-header-group bg-gray-300 text-lg font-semibold">
         <div class="table-row">
            <div class="table-cell py-2 ">No</div>
            <div class="table-cell py-2 ">Product</div>
            <div class="table-cell py-2 ">Category</div>
            <div class="table-cell py-2 ">Brand</div>
            <div class="table-cell py-2 ">Stock</div>
            <div class="table-cell py-2 " colspan="3">Action</div>
         </div>
      </div>

      <div class="table-row-group">   
         <?php if ( $products ) : ?>            
            <?php foreach( $products as $product ) : ?>
               <div class="table-row">
                  <div class="table-cell py-2 "><?= $this->no-=-1 ?></div>
                  <div class="table-cell py-2 "><?= ($product['product']) ?></div>
                  <div class="table-cell py-2 "><?= !is_null($product['category']) ? $product['category'] : "data kosong" ?></div>
                  <div class="table-cell py-2 "><?= !is_null($product['brand']) ? $product['brand'] : "data kosong" ?></div>
                  <div class="table-cell py-2 "><?= $product['stock'] ?> </div> 
                  <div class="table-cell py-2">
                     <div id="a" class="grid grid-cols-2 gap-1 px-2">
                        <a class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-green-500 hover:text-white <?= $this->page=="detail-product" && $this->name==$product['product_id'] ? "bg-green-500 text-white" : null ?>" href="<?= $this->request("{$this->view}|detail-product|{$product['product_id']}") ?>">detail</a>
                        
                        <a class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-purple-500 hover:text-white <?= $this->page=="gallery-product" && $this->name==$product['product_id'] ? "bg-purple-500 text-white" : null ?>" href="<?= $this->request("{$this->view}|gallery-product|{$product['product_id']}") ?>">gallery</a> 
                        
                        <a class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white <?= $this->page=="edit-product" && $this->name == $product['product_id'] ? "bg-yellow-500 text-white" : null ?>" href="<?= $this->request("{$this->view}|edit-product|{$product['product_id']}") ?>">edit</a>

                        <form class="" action="<?= $this->request($this->view) ?>" method="post">
                           <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                           <input type="hidden" name="action" value="dropProduct">
                           <button class="w-full border border-gray-300 shadow rounded-lg hover:bg-red-500 hover:text-white" type="submit">delete</button>
                        </form>
                     </div>
                  </div>
               </div>
            <?php endforeach ; ?>
         <?php else : ?>
         <div class="table-row"></div>
            <div class="table-cell py-2  text-red-500 font-semibold">Data empty</div>
         <?php endif ; ?>
      </div>
   </div>
</div>   

<script>
   const a = document.getElementById("a"); 
   console.log(a); 
</script>