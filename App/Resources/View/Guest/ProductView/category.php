<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\CategoryData as Category; 

   $categories = Category::readAllCategory();  
?>

<main class="flex flex-col xl:container mx-auto px-5 xl:px-40">
   <?= View::component("navbar-product") ?>

   <!-- category -->
   <div class="grid gap-3 xl:gap-6 grid-cols-2 xl:grid-cols-5 mt-6 xl:mt-13">
      <?php foreach ( $categories as $category ) : ?>         
         <div class="pb-5 overflow-hidden ">
            <a href="<?= View::request("product|catalog|{$category['category']}") ?>" class="inline-block h-40 hover:shadow-xl">
               <img class="w-full h-full" src="<?= Image::storage($this->page, $category['image']) ?>" alt="<?= $category['category'] ?>">
            </a>
            <a href="<?= View::request("product|catalog|{$category['category']}") ?>" class="block text-center text-lg font-semibold hover:underline"><?= $category['category'] ?></a>
         </div>   
      <?php endforeach ;?>
   </div>   
</main>


<script>

</script>