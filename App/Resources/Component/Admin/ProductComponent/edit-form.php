<?php
   use Models\Data\ProductData as Product;    
   use Models\Data\CategoryData as Category; 
   use Models\Data\BrandData as Brand; 

   $product = Product::readProductById($this->name);
   $categories = Category::readAllCategory(null); 
   $brands = Brand::readAllBrand(null); 
?>

<div class="w-full p-5 shadow-lg">
   <h2 class="mb-1 text-lg font-semibold">Edit Product</h2>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <form action="<?= $this->request($this->view) ?>" method="post">
      <input type="hidden" name="action" value="changeProduct">
      <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

      <div class="table mb-3">
         <div class="table-row">
            <label class="table-cell" for="name">name</label>
            <input class="table-cell border" type="text"  name="product" placeholder="Name Product" value="<?= $product['product'] ?>">
         </div>

         <div class="table-row">
            <label class="table-cell" for="category">category</label>
            <select class="table-cell border" name="category_id" id="">
               <option value="">Category</option>
               <?php foreach ( $categories as $category ) : ?>
                  <option 
                     value="<?= $category['category_id'] ?>"  
                     <?= $product['category_id'] == $category['category_id'] ? "selected" : null ?> 
                  >
                     <?= $category['category'] ?>
                  </option>
               <?php endforeach ;?>
            </select>
         </div>

         <div class="table-row">
            <label class="table-cell" for="brand">brand</label>      
            <select class="table-cell border" name="brand_id" id="">
               <option value="">Brand</option>
               <?php foreach ( $brands as $brand ) : ?>
                  <option value="<?= $brand['brand_id']; ?>" <?= $product['brand_id'] == $brand['brand_id'] ? "selected" : null ?>><?= $brand['brand'] ?></option>
               <?php endforeach ;?>
            </select>
         </div>

         <div class="table-row">
            <label class="table-cell" for="price">price</label>
            <input class="table-cell border" type="number" name="price" placeholder="Price" value="<?= $product['price'] ?>" required>
         </div>

         <div class="table-row">
            <label class="table-cell" for="description">description</label>
            <input class="table-cell border" type="text" name="description" placeholder="Description" value="<?= $product['description'] ?>" required>
         </div>

         <div class="table-row">
            <label class="table-cell" for="stock">stock</label>      
            <input class="table-cell border" type="number" name="stock" placeholder="Stock" value="<?= $product['stock'] ?>">
         </div>
      </div>

      <button class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white" type="submit">Edit</button>
   </form>
</div>