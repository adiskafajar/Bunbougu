<?php
   use Models\Data\CategoryData as Category; 
   use Models\Data\BrandData as Brand; 

   $brands = Brand::readAllBrand(null); 
   $categories = Category::readAllCategory(null); 
?>

<div class="w-full p-5 shadow-lg">
   <h2 class="mb-1 text-lg font-semibold">Create User</h2>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <form action="<?= $this->request($this->view) ?>" method="post">
      <input type="hidden" name="action" value="addBrand">

      <div class="table mb-3">
         <div class="table-row">
            <label class="table-cell " for="product">product</label>
            <input class="table-cell border" type="text"  name="product" placeholder="" required>
         </div>

         <div class="table-row">
            <label class="table-cell " for="category">category</label>      
            <select class="table-cell border" name="category_id" id="">
               <option value="">Category</option>
                  <?php foreach ( $categories as $category ) : ?>
                     <option value="<?= $category['category_id'] ?>"><?= $category['category'] ?></option>
                  <?php endforeach ;?>
            </select>
         </div>

         <div class="table-row">
            <label class="table-cell " for="brand">brand</label>      
            <select class="table-cell border" name="brand_id" id="">
               <option value="">Brand</option>
                  <?php foreach ( $brands as $brand ) : ?>
                     <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand'] ?></option>
                  <?php endforeach ;?>
            </select>
         </div>

         <div class="table-row">
            <label class="table-cell " for="price">price</label>
            <input class="table-cell border" type="number" name="price" placeholder="" required>
         </div>

         <div class="table-row">
            <label class="table-cell " for="description">description</label>
            <input class="table-cell border" type="text" name="description" placeholder="" required>
         </div>

         <div class="table-row">
            <label class="table-cell " for="stock">stock</label>
            <input class="table-cell border" type="number" name="stock" placeholder="" required>
         </div>
      </div>

      <button class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-blue-500 hover:text-white" type="submit">Create</button>
   </form>

</div>