<?php 
   use Core\View; 
   use Helper\Flash; 
   use Helper\Image; 
   use Models\Data\CartData as Cart; 

   $carts = Cart::readAllCartByUser($this->user); 
   $totalCart = Cart::readTotalCart($this->user); 
   $totalPrice = Cart::readTotalPrice($this->user); 

?>

<main class="grid xl:grid-cols-5 gap-x-5 xl:container mx-auto px-5 xl:px-40">
   <?php if ( $carts ) : ?>
      <!-- cart -->
      <div class="col-span-3">
         <div class="text-lg font-semibold">My Cart</div>
         <?php foreach ( $carts as $cart ) : ?>      
            <div class="flex items-center h-18 mb-3 mt-2 border-2 border-gray-300 rounded-lg overflow-hidden">
               <!-- product image -->
               <img class="h-full w-20 mr-3" src="<?= Image::storage("product", $cart['image']) ?>" alt="<?= $cart['product'] ?>">
      
               <!-- info product -->
               <div class="mr-auto ">
                  <span class="text-lg font-semibold "><?= $cart['product'] ?></span>
                  <br>
                  <span class="text-sm leading-tight">Rp. <?= $cart['price'] ?></span>
               </div>
      
               <!-- button action -->
               <div class="flex mr-5">
                  <!-- minus quantity -->
                  <form action="<?= View::request($this->page) ?>" method="post">
                     <input type="hidden" name="action" value="minusQuantityCart">
                     <input type="hidden" name="cart_id" value="<?= $cart['cart_id'] ?>">
                     <button class="focus:outline-none" type="submit">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle cx="12" cy="12" r="12" fill="#E4E4E4"/>
                           <path d="M14.964 11.62V13.348H7.566V11.62H14.964Z" fill="#FEFEFE" fill-opacity="0.94"/>
                        </svg>
                     </button>
                  </form>
      
                  <!-- quantity -->
                  <div class="w-10 border-b-2 text-center mx-1"><?= $cart['quantity'] ?></div>
      
                  <!-- plus quantity -->
                  <form action="<?= View::request($this->page) ?>" method="post">
                     <input type="hidden" name="action" value="plusQuantityCart">
                     <input type="hidden" name="cart_id" value="<?= $cart['cart_id'] ?>">
                     <button class="focus:outline-none" type="submit">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle cx="12" cy="12" r="12" fill="#E4E4E4"/>
                           <path d="M16.016 13.366H12.38V17.092H10.472V13.366H6.836V11.638H10.472V7.912H12.38V11.638H16.016V13.366Z" fill="#FEFEFE" fill-opacity="0.94"/>
                        </svg>                     
                     </button>
                  </form>
               </div>
      
               <!-- drop cart -->
               <form class="mr-5" action="<?= View::request($this->page) ?>" method="post">
                  <input type="hidden" name="action" value="dropCart">
                  <input type="hidden" name="cart_id" value="<?= $cart['cart_id'] ?>">
                  <button class="focus:outline-none">
                     <svg width="20" height="20" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5013 14.6159L17.2983 21.4771C17.9801 22.1707 18.4238 22.1779 19.1181 21.4771L20.4818 20.1002C21.1499 19.426 21.1952 18.9834 20.4818 18.2633L13.2859 11.0003L20.4825 3.73728C21.1565 3.05466 21.1696 2.59397 20.4825 1.89969L19.1188 0.523446C18.4113 -0.190884 17.9742 -0.157885 17.2989 0.523446L10.5013 7.38463L3.70439 0.524093C3.02909 -0.157238 2.59202 -0.190237 1.88456 0.524093L0.520845 1.90034C-0.166922 2.59461 -0.154453 3.0553 0.520845 3.73793L7.7168 11.0003L0.520845 18.2633C-0.192516 18.9834 -0.154453 19.426 0.520845 20.1002L1.88391 21.4771C2.57233 22.1779 3.01597 22.1707 3.70373 21.4771L10.5013 14.6159Z" fill="#C4C4C4"/>
                     </svg>                  
                  </button>
               </form>
            </div>
         <?php endforeach ;?>
      </div>

      <!-- quantity, total price and button checkout -->
      <div class="col-span-2 fixed xl:static inset-x-0 bottom-16 items-center xl:mt-9 bg-white ">
         <div class="flex border-2 h-12 items-center">                 <!-- icon checkout -->
            <svg class="ml-3 mr-3" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M18.3203 5.93748H9.84375L5.89844 0.612883C5.74219 0.357507 5.52083 0.21705 5.23438 0.191512C4.94792 0.165974 4.67448 0.255356 4.41406 0.459657C4.02344 0.868259 3.9974 1.27686 4.33594 1.68546L7.42188 5.93748H1.67969C1.21094 5.93748 0.813802 6.09709 0.488281 6.41631C0.16276 6.73553 0 7.11221 0 7.54635V8.38909C0 9.10415 0.338542 9.58936 1.01562 9.84474L3.32031 16.7782C3.42448 17.1357 3.63281 17.4613 3.94531 17.755C4.25781 18.0487 4.60938 18.1955 5 18.1955H15C15.3906 18.1955 15.7422 18.0487 16.0547 17.755C16.3672 17.4613 16.5755 17.1357 16.6797 16.7782L18.9844 9.92135C19.6615 9.66597 20 9.18076 20 8.46571V7.62296C20 7.13775 19.8372 6.73553 19.5117 6.41631C19.1862 6.09709 18.7891 5.93748 18.3203 5.93748ZM1.67969 7.54635H8.67188L9.25781 8.31248C9.3099 8.31248 9.33594 8.33802 9.33594 8.38909H1.67969V7.54635ZM15.0781 16.3185V16.3951C15.0781 16.4207 15.0651 16.4462 15.0391 16.4718C15.013 16.4973 15 16.5228 15 16.5484H5.07812C5.02604 16.5484 5 16.4973 5 16.3951L2.85156 9.99796H17.1484L15.0781 16.3185ZM10.7422 8.38909C10.9245 8.08264 11.0156 7.80173 11.0156 7.54635H18.3203V8.38909H10.7422ZM5.82031 15.0927C5.84635 15.2715 5.95052 15.4247 6.13281 15.5524C6.3151 15.6801 6.4974 15.7439 6.67969 15.7439H6.83594C7.04427 15.6929 7.21354 15.5652 7.34375 15.3609C7.47396 15.1566 7.5 14.9523 7.42188 14.748L6.60156 11.4919C6.54948 11.2876 6.41927 11.1216 6.21094 10.9939C6.0026 10.8662 5.79427 10.8407 5.58594 10.9173C5.3776 10.9684 5.20833 11.0961 5.07812 11.3004C4.94792 11.5047 4.92188 11.6962 5 11.875L5.82031 15.0927ZM13.1641 15.7439H13.3203C13.5026 15.7439 13.6849 15.6801 13.8672 15.5524C14.0495 15.4247 14.1536 15.2715 14.1797 15.0927L15 11.7984C15.0521 11.5941 15.0195 11.3898 14.9023 11.1855C14.7852 10.9812 14.6224 10.8662 14.4141 10.8407C13.8672 10.7386 13.5286 10.9301 13.3984 11.4153L12.5781 14.6714C12.4219 15.1821 12.6172 15.5396 13.1641 15.7439ZM10 15.7439C10.5469 15.7439 10.8203 15.463 10.8203 14.9012V11.6451C10.8203 11.1089 10.5469 10.8407 10 10.8407C9.45312 10.8407 9.17969 11.1089 9.17969 11.6451V14.9012C9.17969 15.463 9.45312 15.7439 10 15.7439Z" fill="black"/>
            </svg>
               
            <!-- quantity -->
            <div class="mr-auto"><?= $totalCart ?> items</div>

            <!-- total price -->
            <div class="mr-3">Rp. <?= $totalPrice ?></div>

            <!-- button checkout -->
            <a href="" class="flex xl:hidden items-center bg-black h-full px-5 text-white" >
               Checkout
            </a>
         </div>
         <a href="<?= View::request("checkout") ?>" class="hidden xl:flex h-12 bg-black text-white">
            <span class="m-auto">Checkout</span>
         </a>
      </div>
   <?php else : ?>
      <span class="text-red-600 text-lg font-semibold">your cart is empty</span>
   <?php endif ; ?>

</main>

<script>

</script>

<style>

</style>
