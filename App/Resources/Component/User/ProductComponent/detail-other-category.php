<?php
   use Helper\Image; 
   use Models\Data\CategoryData as Category;
   use Models\Data\ProductData as Product;  

   $categoryId = Product::readCategoryIdByproduct($this->name);

   $products = Product::readProductByCategoryId($categoryId); 
?>

<?php if( $products ) : ?>
   <section class="mt-20">
      <div class="h-0.5 bg-gray-300"></div>
      <h2 class="text-2xl font-semibold">Other Category</h2>
      <div class="flex mt-5">
         <?php foreach( $products as $product ) : ?>         
            <div class="mr-3">
               <a href="<?= $this->request("product|product-detail|{$product['product']}") ?>">
                  <img class="w-35" src="<?= Image::show($this->view, $product['image']) ?>" alt="">
               </a>
               <div class="flex flex-col">
                  <a href="<?= $this->request("product|product-detail|{$product['product']}") ?>" class="text-sm"><?= $product['product'] ?></a>
                  <div class="text-sm">Rp. <?= $product['price'] ?></div>
               </div>
            </div>
         <?php endforeach ; ?>
      </div>
   </section>
<?php endif ; ?>
