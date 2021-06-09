<?php
   use Helper\Image; 
   use Models\Data\BrandData as Brand;
   
   $brand = Brand::readBrandByName($this->name); 
?>

<div class="w-full p-5 h-45 shadow-lg">
   <h2 class="mb-1 text-lg font-semibold">Edit <?= $this->name ?></h2>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <form class="" action="<?= $this->request($this->view) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="changeBrand">
      <input type="hidden" name="brand_id" value="<?= $brand['brand_id'] ?>">
      <input type="hidden" name="imageOld" value="<?= $brand['image'] ?>">

      <div class="mb-3">
         <label for="brand">Brand</label>
         <input class="border" type="text" name="brand" value="<?= $brand['brand'] ?>">
      </div>

      <div class="mb-3">
         <label for="image">Image</label>
         <input type="file" name="image">
      </div>
      <img class="h-10 w-20" src="<?= Image::show($this->view, $brand['image']) ?>">   

      <button class="inline-block px-5 border rounded-lg border-gray-300 hover:bg-yellow-500 hover:shadow hover:text-white" type="submit">Edit</button>

   </form>
</div>