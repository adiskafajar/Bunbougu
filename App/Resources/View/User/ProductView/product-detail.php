<?php 
   use Helper\Image; 
   use Models\Data\ProductData as Product; 
   use Models\Data\WishlistData as Wishlist; 
   use Models\Data\CartData as Cart; 
   use Models\Data\ProductImageData as ProductImage; 

   $product       = Product::readProductByName($this->name); 
   $allGallery    = ProductImage::readAllProductImageByProductId($product['product_id']); 
   $mainGallery   = ProductImage::readMainProductImageByProductId($product['product_id']); 

   $inWishlist    = Wishlist::checkProductInWishlist($this->user, $product['product_id']); 
   $inCart        = Cart::checkProductInCart($this->user, $product['product_id']);

   $otherCategory = Product::readProductByCategoryId($product['category_id']);
   $otherBrand    = Product::readProductByBrandId($product['brand_id']); 
?>

<main class="xl:container xl:mx-auto px-5 xl:px-30">
   <!-- main content -->
   <section class="grid xl:grid-rows-none xl:grid-cols-11 xl:gap-x-4">

      <!-- image product -->
      <div class=" xl:col-span-4 flex flex-row xl:flex-col">
         <img class="mr-1 xl:mr-0 w-full " src="<?= Image::storage($this->view, $mainGallery) ?>" alt="">
         <div class="flex flex-col justify-start xl:flex-row xl:mt-1">
            <?php foreach ( $allGallery as $image ) : ?>
               <img class="h-21 xl:h-16 xl:w-16 mr-2" src="<?= Image::storage($this->view, $product['image']) ?>" alt="">
            <?php endforeach ;?>
         </div>
      </div> 

      <!-- info product -->
      <div class="xl:col-span-4 mt-3 xl:mt-0">
         <div class="text-2xl font-semibold"><?= $product['product'] ?></div>
         <div class="text-sm text-gray-400">terjual: 80</div>
         <div class="text-3xl font-semibold mt-5">Rp. <?= $product['price'] ?></div>
         <div class="border-t-2 border-b-2 mt-3 pl-4 py-1">Detail</div>
         <div class="text-sm text-gray-400">Kondisi: Baru</div>
         <div class="text-sm text-gray-400">Berat: 180gram</div>
         <div class="text-sm text-gray-400">Kategori: <?= $product['category'] ?></div>
         <div class="text-sm text-gray-400">Brand: <?= $product['brand'] ?></div>
         <div class="text-sm mt-3"><?= $product['description'] ?></div>
         <div class="text-sm mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum distinctio dignissimos explicabo similique, nesciunt porro nisi, debitis commodi vitae cumque quidem quos, nam recusandae itaque. Nulla magni iure voluptate neque, tempora repudiandae, totam cum eaque atque aliquid rem similique nam rerum sed debitis? Impedit eius error iste explicabo qui vero?</div>
      </div>

      <!-- action product -->
      <div class=" xl:col-span-3 mt-3 xl:mt-0">
         <div class="p-4 border-2 rounded-lg">
            <div class="mt-1">Atur jumlah dalam Catatan</div>
            <div class="flex mt-2">
               <!-- - button -->
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="12" fill="#E4E4E4"/>
                  <path d="M14.964 11.62V13.348H7.566V11.62H14.964Z" fill="#FEFEFE" fill-opacity="0.94"/>
               </svg>
               <div class="w-10 border-b-2 text-center mx-1">2</div>
               <!-- + button -->
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="12" fill="#E4E4E4"/>
                  <path d="M16.016 13.366H12.38V17.092H10.472V13.366H6.836V11.638H10.472V7.912H12.38V11.638H16.016V13.366Z" fill="#FEFEFE" fill-opacity="0.94"/>
               </svg>                     
            </div>
            <textarea class="border-2 rounded-lg mt-5 p-2 w-full" name="note" id="" rows="5" placeholder="Tuliskan sesuatu untuk penjual"></textarea>
            <div class=" mt-4 text-gray-400 text-sm">Subtotal</div>
            <div class="text-2xl">RP. 80.000</div>
            <div class="flex content-center mt-4 items-center">
               <!-- wishlist button -->
               <form class="inline-block" action="<?= $this->request("wishlist") ?>" method="post">
                  <input type="hidden" name="action" value="<?= $inWishlist ? "dropWishlist" : "addWishlist" ?>">
                  <input type="hidden" name="user_id" value="<?= $this->user ?>">
                  <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                  <input type="hidden" name="view" value="<?= $this->view ?>">
                  <input type="hidden" name="page" value="<?= $this->page ?>">
                  <input type="hidden" name="name" value="<?= $this->name ?>">
                  <button class="mr-3 focus:outline-none">
                     <svg width="20" height="25" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.3498 3.53697L22.3502 3.53772C23.5474 6.02888 23.1365 8.93451 20.7055 12.3318L20.7037 12.3343C18.7963 15.0173 16.0449 17.7263 12.0036 20.9287C7.95843 17.7209 5.21073 14.9881 3.30048 12.3302C0.862957 8.93347 0.452519 6.02841 1.6495 3.53772L1.64986 3.53697C2.44177 1.88564 4.82748 0.405234 7.73609 1.25195C9.12468 1.65973 10.3395 2.53484 11.18 3.73816L11.9998 4.91191L12.8197 3.73816C13.6603 2.53456 14.8756 1.65933 16.2645 1.25167L16.2671 1.2509C19.162 0.392714 21.556 1.88178 22.3498 3.53697Z"  stroke-width="2" 
                           <?= $inWishlist ? "fill='red' stroke='crimson'" : "fill='white' stroke='#C4C4C4'" ?> 
                        />
                     </svg>
                  </button>
               </form>

               <!-- cart button -->
               <form class="block " action="<?= $this->request("cart") ?>" method="post">
                  <?php if ( !$inCart ) : ?>
                     <input type="hidden" name="action" value="addCart">
                  <?php endif ;?>
                  <input type="hidden" name="user_id" value="<?= $this->user ?>">
                  <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                  <button class="flex items-center justify-center h-10 px-2 border-2 hover:border-transparent rounded-lg hover:shadow-lg  focus:outline-none <?= $inCart ? "text-white bg-green-300 border-green-400" : "text-gray-400 border-gray-200" ?>">
                     <svg class="mr-2" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <path d="M7.875 19.2501C8.35825 19.2501 8.75 18.8583 8.75 18.3751C8.75 17.8918 8.35825 17.5001 7.875 17.5001C7.39175 17.5001 7 17.8918 7 18.3751C7 18.8583 7.39175 19.2501 7.875 19.2501Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.5 19.2501C17.9833 19.2501 18.375 18.8583 18.375 18.3751C18.375 17.8918 17.9833 17.5001 17.5 17.5001C17.0168 17.5001 16.625 17.8918 16.625 18.3751C16.625 18.8583 17.0168 19.2501 17.5 19.2501Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M0.875 0.874939H4.375L6.72 12.5912C6.80001 12.994 7.01917 13.3559 7.3391 13.6135C7.65903 13.871 8.05936 14.0078 8.47 13.9999H16.975C17.3856 14.0078 17.786 13.871 18.1059 13.6135C18.4258 13.3559 18.645 12.994 18.725 12.5912L20.125 5.24994H5.25" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0">
                        <rect width="21" height="21" fill="white"/>
                        </clipPath>
                        </defs>
                     </svg>
                     <span>Tambah ke Keranjang</span>
                  </button>
               </form>
            </div>
         </div>
      </div>
   </section>

   <!-- other category -->
   <?= $this->component("detail-other-category") ?>
   
   <!-- other brand -->
   <?= $this->component("detail-other-brand") ?>
</main>
