<?php 
   use Core\View; 
   use Helper\Image;
   use Models\Data\BrandData as Brand; 

   $brands = Brand::readAllBrand(); 
?>

<main class="flex flex-col xl:container xl:mx-auto px-5 xl:px-40">
   <?= View::component("navbar-product") ?>

   <!-- brand -->
   <div class="grid gap-3 xl:gap-6 grid-cols-2 xl:grid-cols-4 mt-6 xl:mt-13">
      <?php foreach ( $brands as $brand ) : ?>         
         <a href="<?= View::request("product|catalog|{$brand['brand']}") ?>" class="flex h-35 overflow-hidden border-4 hover:bg-gray-200 hover:border-transparent hover:shadow-lg ">
            <div class="h-25 w-25 m-auto">
               <img class="w-full h-full" src="<?= Image::storage($this->page, $brand['image']) ?>" alt="">
            </div>
         </a>      
      <?php endforeach ;?>
   </div>
</main>

<script>

</script>
