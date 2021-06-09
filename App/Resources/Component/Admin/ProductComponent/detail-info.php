<?php
   use Helper\Image; 
   use Models\Data\ProductData as Product; 
   use Models\Data\ProductImageData as ProductImage;

   $product = Product::readProductById($this->name); 
   $mainImage = productImage::readMainProductImageByProductId($this->name); 
?>

<div class="w-full p-5 shadow-lg"> 
   <h1 class="mb-1 text-lg font-semibold">Detail Product</h1>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <div class="flex">
      <div class="table mr-auto">
         <div class="table-row">
            <div class="table-cell px-3">product</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $product['product'] ?></div>
         </div>
         
         <div class="table-row">
            <div class="table-cell px-3">category</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $product['category'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">brand</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $product['brand'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">price</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $product['price'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">description</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $product['description'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">stock</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $product['stock'] ?></div>
         </div>

      </div>

      <div class="h-30 w-30 shadow-lg border mr-10 rounded-full overflow-hidden">
         <img class="w-full h-full" src="<?= Image::show($this->view, $mainImage) ?>" alt="">
      </div>
   </div>
</div>