<?php 
   use Core\View; 
?>

<nav class="flex flex-col xl:flex-row justify-between container">
   <div class="text-2xl font-bold mx-auto xl:mx-0">
      <?php
         if($this->page == "catalog"){
            echo !is_null($this->name) ? "Find->{ $this->name }" : "This's For You"; 
         } else {
            echo ucfirst($this->page); 
         }
      ?>
   </div>   
   <div class="flex fixed justify-center xl:static py-2 xl:py-0 bottom-16 inset-x-0 bg-white xl:bg-transparent shadow-lg xl:shadow-none">
      <a class="inline-block px-6 py-1 mr-6  hover:bg-black focus:bg-black focus:ring-offset-black  border-2 rounded-lg hover:text-white <?= $this->page == "catalog" ? "ring-gray-900 bg-black text-white" : null ?>" href="<?= View::request("product|catalog") ?>">Catalog</a>
      <a class="inline-block px-6 py-1 mr-6  hover:bg-black focus:bg-black focus:ring-offset-black  border-2 rounded-lg hover:text-white <?= $this->page == "category" ? "ring-gray-900 bg-black text-white" : null ?>" href="<?= View::request("product|category") ?>">Category</a>
      <a class="inline-block px-6 py-1  hover:bg-black focus:bg-black focus:ring-offset-black  border-2 rounded-lg hover:text-white <?= $this->page == "brand" ? "ring-gray-900 bg-black text-white" : null ?>" href="<?= View::request("product|brand") ?>">Brand</a>
   </div>
</nav>

<script>

</script>