<?php
   use Helper\Image; 
?>

<div class="w-full p-5 h-45 shadow-lg">
   <h2 class="mb-1 text-lg font-semibold">Create Brand</h2>
   <div class="h-0.5 mb-5 bg-gray-300"></div>
   
   <form class="" action="<?= $this->request($this->view) ?>" method="post" enctype="multipart/form-data">
      <input class="block" type="hidden" name="action" value="addBrand">

      <div class="mb-3 ">    
         <label for="brand">Brand</label>  
         <input class="border" type="text" name="brand" placeholder="Brand">
      </div>

      <div class="mb-3 ">
         <label for="image">Image</label>
         <input type="file" name="image" placeholder="Image">
      </div>
      <button class="inline-block px-5 border rounded-lg border-gray-300 hover:bg-blue-500 hover:shadow hover:text-white" type="submit">Create</button>
   </form>
</div>