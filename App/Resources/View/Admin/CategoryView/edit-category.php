<?php 
   use Core\View; 
   use Helper\Image; 
?>

<main class="p-10 pl-20 w-full">
   <h1 class="mb-5 text-2xl font-bold">Category</h1>

   <div class="grid grid-cols-2 gap-x-5">  
      <?= $this->component("category-table") ?>
      <?= $this->component("edit-form") ?>
   </div>
</main>
