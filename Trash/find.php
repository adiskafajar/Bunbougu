<?php 
   use Core\Request; 
   use Core\View; 
   use Helper\Image; 
   use Models\ProductModel as Product; 

   $products = Product::readAllProduct($this->name); 
?>

<main class="flex flex-col container mx-auto px-40">
   <?= View::component("navbar-product") ?>

   <div class="grid gap-6 grid-cols-5 mt-13">
      <!-- product -->
      <?php if ( !is_null($products) ) : ?>         
         <?php foreach ( $products as $product ) : ?>         
            <div class="overflow-hidden">
               <a href="" class="inline-block ">
                  <img class="w-full h-full" src="<?= Image::storage($this->page, $product['image']) ?>" alt="<?= $product['product'] ?>">
               </a>
      
               <div class="flex items-center mt-1">
                  <div class="mr-auto ">
                     <a href="" class=""><?= $product['product'] ?></a>
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