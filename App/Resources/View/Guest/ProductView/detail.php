<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\ProductData as Product; 
   use Models\Data\WishlistData as Wishlist; 
   use Models\Data\CartData as Cart; 

   $product = Product::readProductByName($this->name);
?>

<main class="xl:container xl:mx-auto px-5 xl:px-40">
   <!-- main content -->
   <section class="grid xl:grid-rows-none xl:grid-cols-11 xl:gap-x-4">

      <!-- image product -->
      <div class=" xl:col-span-4 flex flex-row xl:flex-col">
         <img class="mr-1 xl:mr-0 w-full " src="<?= Image::storage($this->view, $product['image']) ?>" alt="">
         <div class="flex flex-col justify-between xl:flex-row xl:mt-1">
            <img class="h-21 xl:h-16 xl:w-16" src="<?= Image::storage($this->view, $product['image']) ?>" alt="">
            <img class="h-21 xl:h-16 xl:w-16" src="<?= Image::storage($this->view, $product['image']) ?>" alt="">
            <img class="h-21 xl:h-16 xl:w-16" src="<?= Image::storage($this->view, $product['image']) ?>" alt="">
            <img class="h-21 xl:h-16 xl:w-16" src="<?= Image::storage($this->view, $product['image']) ?>" alt="">
         </div>
      </div>

      <!-- info product -->
      <div class="xl:col-span-4 mt-3 xl:mt-0">
         <div class="text-2xl font-semibold"><?= $product['product'] ?></div>
         <div class="text-sm text-gray-400">terjual: 80</div>
         <div class="text-3xl font-semibold mt-5">Rp. <?= $product['price'] ?></div>
         <div class="border-t-2 border-b-2 mt-3 pl-4 py-1">Detail</div>
         <div class="text-sm text-gray-400">Kondisi: Baru</div>
         <div class="text-sm text-gray-400">Berat: 180gram</div>
         <div class="text-sm text-gray-400">Kategori: <?= $product['category'] ?></div>
         <div class="text-sm text-gray-400">Brand: <?= $product['brand'] ?></div>
         <div class="text-sm mt-3"><?= $product['description'] ?></div>
         <div class="text-sm mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum distinctio dignissimos explicabo similique, nesciunt porro nisi, debitis commodi vitae cumque quidem quos, nam recusandae itaque. Nulla magni iure voluptate neque, tempora repudiandae, totam cum eaque atque aliquid rem similique nam rerum sed debitis? Impedit eius error iste explicabo qui vero?</div>
      </div>

      <!-- action product -->
      <div class=" xl:col-span-3 mt-3 xl:mt-0">
      </div>
   </section>

   <!-- other category -->
   <section class="mt-20">
      <div class="h-0.5 bg-gray-300"></div>
      <h2 class="text-2xl font-semibold">Other Category</h2>
      <div class="flex mt-5">
         <div class="mr-3">
            <img class="w-35" src="../../img/product/epson-664-tinta-printer.png" alt="">
            <div>
               <div class="text-sm">product</div>
               <div class="text-sm">Rp.8000</div>
            </div>
         </div>
         <div class="mr-3">
            <img class="w-35" src="../../img/product/epson-664-tinta-printer.png" alt="">
            <div>
               <div class="text-sm">product</div>
               <div class="text-sm">Rp.8000</div>
            </div>
         </div>
      </div>
   </section>

   <!-- other brand -->
   <section class="mt-10">
      <div class="h-0.5 bg-gray-300"></div>
      <h2 class="text-2xl font-semibold">Other Brand</h2>
      <div class="flex mt-5">
         <div class="mr-3">
            <img class="w-35" src="../../img/product/epson-664-tinta-printer.png" alt="">
            <div>
               <div class="text-sm">product</div>
               <div class="text-sm">Rp.8000</div>
            </div>
         </div>
      </div>
   </section>
</main>
