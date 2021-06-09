<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\ProductData as Product; 
   use Models\Data\WishlistData as Wishlist; 

   $products = Product::readAllProduct($this->name);
?>

<main class="container mx-auto px-5 xl:px-40">
   <?= View::component("navbar-product") ?>

   <div class="grid gap-4 xl:gap-6 grid-cols-2 xl:grid-cols-5 mt-6 xl:mt-13">
      <!-- product -->
      <?php if ($products) : ?>         
         <?php foreach ( $products as $product ) : ?>
            <div class="overflow-hidden">
               <a href="<?= View::request("product|detail|{$product['product']}") ?>" class="block ">
                  <img class="w-full h-full" src="<?= Image::storage("product", $product['image']) ?>" alt="<?= $product['product'] ?>">
               </a>

               <div class="flex items-center mt-1">   
                  <!-- info product -->
                  <div class="mr-auto ">
                     <a href="<?= View::request("product|detail|{$product['product']}") ?>" class=""><?= $product['product'] ?></a>
                     <div class="">Rp.<?= $product['price'] ?></div>
                  </div>
               </div>
            </div>      
         <?php endforeach ;?>
      <?php else : ?>
         <div class="text-red-600">data empty</div>
      <?php endif ; ?>
   </div>
</main>

<script>

</script>