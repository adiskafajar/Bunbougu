<?php
   use Helper\Image; 
   use Models\Data\BrandData as Brand; 
   use Models\Data\ProductData as Product; 

   $brandId = Product::readBrandIdByProduct($this->name); 

   $products = Product::readProductByBrandId($brandId); 

?>

<?php if( $products ) : ?>   
   <section class="mt-10">
      <div class="h-0.5 bg-gray-300"></div>
      <h2 class="text-2xl font-semibold">Other Brand</h2>
      <div class="flex justify-between mt-5">
         <?php foreach( $products as $product ) : ?>      
            <div class="mr-3">
               <a href="<?= $this->request("product|product-detail|{$product['product']}") ?>">
                  <img class="w-35" src="<?= Image::show($this->view, $product['image']) ?>" alt="">
               </a>

               <div class="flex flex-col">
                  <a href="<?= $this->request("product|product-detail|{$product['product']}") ?>" class="text-sm"><?= $product['product'] ?></a>
                  <span class="text-sm">Rp. <?= $product['price'] ?></span>
               </div>
            </div>
         <?php endforeach ; ?>
      </div>
   </section>
<?php else :  ?>
   <div>asdasd</div>
<?php endif ; ?>
