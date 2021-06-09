<?php
   use Helper\Image; 
   use Models\Data\productData as Product; 
   use Models\Data\ProductImageData as ProductImage; 

   $product = Product::readProductById($this->id); 
   $gallery = ProductImage::readAllProductImageByProductId($this->id); 
   $mainImage = ProductImage::readMainProductImageByProductId($this->id); 
?>

<div class="w-full p-5 shadow-lg">
   <h2 class="mb-2 text-lg font-semibold">Edit Product</h2>
   <div class="h-0.5 mb-5 bg-gray-500"></div>

   <div class="flex items-center px-10 mb-6">
      <div class="mr-auto">
         <form action="<?= $this->request("productImage") ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addProductImage">
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

            <input class="block mb-1" type="file" name="image" required">
            <button class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white">add</button>
         </form>
      </div>

      <div class="w-30 h-30 shadow-lg border rounded-full overflow-hidden">
         <img class="h-full w-full" src="<?= Image::show("product", $mainImage) ?>" alt="">
      </div>
   </div>

   <div class="grid grid-cols-4 gap-5">
      <?php if ( $gallery ) : ?>
         <?php foreach ( $gallery as $image ) : ?>
            <div>
               <img src="<?= Image::show($this->view, $image['image']) ?>">
               
               <div class="flex justify-between">               
                  <form class="flex-grow w-full" action="<?= $this->request("productImage") ?>" method="post">
                     <input type="hidden" name="action" value="changeMainProductImage">
                     <input type="hidden" name="product_image_id" value="<?= $image['product_image_id'] ?>">
                     <input type="hidden" name="product_id" value="<?= $image['product_id'] ?>">
                     <input type="hidden" name="product" value="<?= $product['product'] ?>">

                     <button class="inline-block w-full mr-3 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white" type="submit">change</button>
                  </form>

                  <form class="flex-grow w-full" action="<?= $this->request("productImage") ?>" method="post">
                     <input type="hidden" name="action" value="dropProductImage">     
                     <input type="hidden" name="product_image_id" value="<?= $image['product_image_id'] ?>">
                     <input type="hidden" name="image" value="<?= $image['image'] ?>">
                     <input type="hidden" name="product_id" value="<?= $image['product_id'] ?>">

                     <button class="inline-block w-full mr-3 border border-gray-300 shadow rounded-lg hover:bg-red-500 hover:text-white" type="submit">drop</button>
                  </form>
               </div>
            </div>
         <?php endforeach ?>
      <?php else: ?>
         <div class="text-lg font-semibold text-red-500">empty gallery</div>
      <?php endif ;?>
   </div>
</div>