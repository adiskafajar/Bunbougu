<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\CategoryData as Category;
   
   $categories = Category::readAllCategory($this->page == "category" ? $this->name : null); 
?>

<main class="p-10 pl-20 w-full">
   <h1 class="mb-5 text-2xl font-bold">Category</h1>

   <div class="grid grid-cols-2 gap-x-5">  
      <?= $this->component("category-table") ?>
   </div>
</main>       

<script>

</script>