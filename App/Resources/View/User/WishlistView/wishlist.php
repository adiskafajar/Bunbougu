<?php 
   use Core\View; 
   use Helper\Flash; 
   use Helper\Image; 
   use Models\Data\WishlistData as Wishlist; 
   use Models\Data\CartData as Cart; 

   $products = Wishlist::readWishlistByUser($this->user);    
?>

<main class="xl:container mx-auto px-5 xl:px-40">
   <div class="text-2xl font-bold ">Wishlist</div>

   <div class="grid gap-3 xl:gap-6 grid-cols-2 xl:grid-cols-5 mt-13">
      <!-- product -->
      <?php if ($products) : ?>    
         <?php foreach ( $products as $product ) : ?>
            <?php 
               $inWishlist = Wishlist::checkProductInWishlist($this->user, $product['product_id']); 
               $inCart = Cart::checkProductInCart($this->user, $product['product_id'])
            ?>

            <div class="overflow-hidden">
               <a href="" class="block ">
                  <img class="w-full h-full" src="<?= Image::storage("product", $product['image']) ?>" alt="<?= $product['product'] ?>">
               </a>

               <div class="flex items-center mt-1">   
                  <div class="mr-auto ">
                     <a href="" class=""><?= $product['product'] ?></a>
                     <div class="">Rp.<?= $product['price'] ?></div>
                  </div>

                  <!-- add & drop wishlist -->
                  <form class="inline mr-2" action="<?= $this->request("wishlist") ?>" method="post">
                     <input type="hidden" name="action" value='<?= $inWishlist ? "dropWishlist" : "addWishlist" ?>'>
                     <input type="hidden" name="view" value="<?= $this->view ?>">
                     <input type="hidden" name="page" value="<?= $this->page ?>">
                     <input type="hidden" name="name" value="<?= $this->name ?>">
                     <input type="hidden" name="user_id" value="<?= $this->user ?>">
                     <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                     <button type="submit" class="focus:outline-none">   
                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M13.8906 1.20561L13.8932 1.20486C16.3001 0.502602 18.265 1.72707 18.905 3.04042L19.8039 2.60238L18.9053 3.04118C19.887 5.05147 19.5692 7.41737 17.5193 10.2368L17.5175 10.2393C15.9188 12.4524 13.6136 14.6936 10.2238 17.3446C6.83154 14.6894 4.52894 12.4286 2.92746 10.2357C0.871765 7.41663 0.554358 5.05111 1.53583 3.04118L1.5362 3.04042C2.17434 1.7308 4.13197 0.512748 6.55156 1.20589C7.70453 1.53917 8.71046 2.2535 9.40508 3.23225L10.2206 4.38133L11.0361 3.23225C11.7309 2.25322 12.7372 1.53876 13.8906 1.20561Z" stroke-width="2" stroke="<?= $inWishlist ? "red" : "black" ?>"/>
                        </svg>
                     </button>
                  </form>

                  <!-- add cart -->
                  <form action="<?= $this->request('cart') ?>" method="post">
                     <input type="hidden" name="action" value="addCart">
                     <input type="hidden" name="user_id" value="<?= $this->user ?>">
                     <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                     <button type="submit" class="focus:outline-none">               
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <g clip-path="url(#clip0)">                              
                           <path d="M8.62533 21.0834C9.1546 21.0834 9.58366 20.6544 9.58366 20.1251C9.58366 19.5958 9.1546 19.1667 8.62533 19.1667C8.09605 19.1667 7.66699 19.5958 7.66699 20.1251C7.66699 20.6544 8.09605 21.0834 8.62533 21.0834Z" stroke="<?= $inCart ? "#40F813" : "black" ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M19.1663 21.0834C19.6956 21.0834 20.1247 20.6544 20.1247 20.1251C20.1247 19.5958 19.6956 19.1667 19.1663 19.1667C18.6371 19.1667 18.208 19.5958 18.208 20.1251C18.208 20.6544 18.6371 21.0834 19.1663 21.0834Z" stroke="<?= $inCart ? "#40F813" : "black" ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M0.958008 0.958252H4.79134L7.35967 13.7903C7.44731 14.2315 7.68734 14.6279 8.03774 14.91C8.38814 15.192 8.82659 15.3419 9.27634 15.3333H18.5913C19.0411 15.3419 19.4795 15.192 19.8299 14.91C20.1803 14.6279 20.4204 14.2315 20.508 13.7903L22.0413 5.74992H5.74967" stroke="<?= $inCart ? "#40F813" : "black" ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                           </g> 
                           <defs>
                           <clipPath id="clip0">
                           <rect width="23" height="23" fill="white"/>
                           </clipPath>
                           </defs>
                        </svg>
                     </button>
                  </form>
               </div>
            </div>      
         <?php endforeach ;?>
      <?php else : ?>
         <div class="text-red-600">data empty</div>
      <?php endif ; ?>
   </div>
</main>
<script>
</script>