<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\ProductData as Product;
   use Models\Data\CategoryData as Category;
   use Models\Data\BrandData as Brand; 
?>

<main>
   <!-- header content -->
   <section class="flex max-w-6xl mx-auto px-5 xl:0 h-70 xl:h-120">
      <div class="flex-1">
         <img class="w-full h-full" src="<?= Image::storage($this->page, "header.png") ?>" alt="">
      </div>
      <div class="hidden xl:flex flex-1 ">
         <span class="m-auto">temukan peralatan terbaik di toko kami</span>
      </div>
   </section>
   
   <!-- hot product -->
   <section class="max-w-6xl mx-auto px-5 xl:0 mt-12">
      <div class="flex">
         <div class="text-lg font-bold">Just Arrived<br>For You</div>
         <div class="flex-grow self-center ml-10">
            <div class="h-0.5 bg-gray-500"></div>
         </div>
      </div>

      <div class="grid grid-cols-5 xl:grid-cols-10 gap-1 mt-7 ">
         <a href="" class="col-span-2 row-span-2 order-1 xl:order-none rounded">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "book1.png") ?>" alt="">
         </a>
         <a href="" class="col-span-3 row-span-1 order-2 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "discount.png") ?>" alt="">
         </a>
         <a href="" class="col-span-2 row-span-2 order-4 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "pen.png") ?>" alt="">
         </a>
         <a href="" class="col-span-3 row-span-2 order-3 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "book4.png") ?>" alt="">
         </a>
         <a href="" class="col-span-3 row-span-1 order-5 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "new-year-collection.png") ?>" alt="">
         </a>
         <a href="" class="col-span-2 row-span-2 order-7 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "book2.png") ?>" alt="">
         </a>
         <a href="" class="col-span-3 row-span-2 order-10 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "pen2.png") ?>" alt="">
         </a>
         <a href="" class="col-span-2 row-span-2 order-9 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "book3.png") ?>" alt="">
         </a>
         <a href="" class="col-span-3 row-span-1 order-8 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "new-year-collection.png") ?>" alt="">
         </a>
         <a href="" class="col-span-3 row-span-1 order-6 xl:order-none rounded ">
            <img class="w-full h-full" src="<?= Image::storage($this->page, "discount.png") ?>" alt="">
         </a>
      </div>
   </section>
   
   <!-- category list -->
   <section class="max-w-6xl mx-auto xl:0 mt-20 text-center">
      <div class="flex">
         <div class="text-lg font-bold">Category</div>
         <div class="flex-grow self-center ml-10">
            <div class="h-0.5 bg-gray-500"></div>
         </div>
      </div>

      <div class="grid grid-cols-5 mt-7 text-center">
         <?php foreach ( Category::readForHome() as $category ) : ?>            
            <a href="<?= $this->request("product|catalog|{$category['category']}") ?>" class="rounded">
               <img class="w-full h-40" src="<?= Image::storage("category", $category['image']) ?>" alt="">
               <div class="font-semibold text-lg"><?= $category['category'] ?></div>
            </a>
         <?php endforeach ;?>
      </div>

      <a href="<?= $this->request("product|category") ?>" class="inline-block mt-7 py-1 px-7 bg-gray-700 hover:bg-black rounded-2xl text-white">See More</a>
   </section>
   
   <!-- brand list -->
   <section class="max-w-6xl mx-auto xl:0 mt-12 text-center">
      <div class="flex">
         <div class="text-lg font-bold">Brand</div>
         <div class="flex-grow self-center ml-10">
            <div class="h-0.5 bg-gray-500"></div>
         </div>
      </div>

      <div class="grid grid-cols-5 mt-7 text-center">
         <?php foreach ( Brand::readForHome() as $brand ) : ?>            
            <a href="<?= $this->request("product|catalog|{$brand['brand']}") ?>" class="rounded">
               <img class="w-full h-40" src="<?= Image::storage("brand", $brand['image']) ?>" alt="">
               <div class="font-semibold text-lg"><?= $brand['brand'] ?></div>
            </a>
         <?php endforeach ;?>
      </div>

      <a href="<?= $this->request("product|brand") ?>" class="inline-block mt-7 py-1 px-7 bg-gray-700 hover:bg-black rounded-2xl text-white">See More</a>
   </section>
   
   <!-- our store -->
   <section class="max-w-6xl mx-auto px-5 xl:0 mt-12 text-center">
      <div class="flex">
         <div class="text-lg font-bold">Our Store</div>
         <div class="flex-grow self-center ml-10">
            <div class="h-0.5 bg-gray-500"></div>
         </div>
      </div>

      <div class="grid xl:grid-cols-2 mt-7 ">
         <div class="xl:col-span-1 hidden xl:block"></div>
         <img class="xl:col-span-1 " src="<?= Image::storage($this->page, "out-store.png") ?>" alt="">
      </div>
   </section>
</main>


<style>
   /* #head-content{
      height: 70vh;
   } */
</style>

<script>

</script>