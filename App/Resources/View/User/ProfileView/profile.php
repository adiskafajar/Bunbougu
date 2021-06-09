<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\UserData as User;

   $user = User::readUserById($this->user); 
?>

<main class="flex flex-col xl:container mx-auto px-5 xl:px-40">
   <div class="text-lg font-semibold">My Porfile</div>

   <!-- profile data -->
   <div class="flex mt-7 items-center">
      <div class="flex-none h-30 w-30 rounded-full shadow-xl overflow-hidden">
         <img class="h-full w-full" src="<?= Image::storage("user", $user['image']) ?>" alt="">
      </div>
      <div class="flex-none xl:flex-grow p-5  ">
         <div class="font-semibold text-xl"><?= $user['name'] ?></div>
         <div class=""><?= $user['gender'] ?></div>
         <div class="underline"><?= $user['email'] ?></div>
         <div class=""><?= $user['address'] ?></div>
         <div class=""><?= $user['contact'] ?></div>
      </div>
      <a href="<?= View::request("profile|edit-profile") ?>" class="flex-none flex hover:underline">Edit Account</a>
   </div>

   <!-- profile link { wishlisst, cart, transaction } -->
   <div class="hidden xl:block mt-9 border-b-4"></div>

   <div class="grid grid-rows-3 xl:grid-rows-none xl:grid-cols-3 gap-3 xl:gap-x-10 xl:h-40 mt-9 px-5 xl:px-20 text-gray-400">
      <a href="<?= View::request("wishlist") ?>" class="flex xl:flex-col xl:justify-center text-center items-center py-2 pl-4 bg-white hover:bg-gray-100  border-2 border-gray-300  hover:shadow-lg ring-gray-300 focus:ring-2">
         <div class="mr-3">
            <svg width="43" height="39" viewBox="0 0 43 39" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M28.9863 3.07861L28.9915 3.07711C33.9301 1.6362 37.9671 4.14764 39.2842 6.85073L41.0821 5.97466L39.285 6.85224C41.3005 10.9798 40.6433 15.8319 36.4487 21.601L36.4451 21.606C33.1706 26.1389 28.4486 30.7276 21.5055 36.1553C14.557 30.719 9.84041 26.0902 6.56035 21.5988C2.35396 15.8304 1.69748 10.9791 3.71265 6.85224L3.71339 6.85073C5.0269 4.15509 9.0491 1.65705 14.0133 3.07917C16.3788 3.76294 18.4427 5.22852 19.8678 7.23662L21.4988 9.53477L23.1298 7.23662C24.5553 5.22796 26.62 3.76213 28.9863 3.07861Z" stroke="#C4C4C4" stroke-width="4"/>
            </svg>
         </div>
         <div class="">Wishlist</div>
      </a>

      <a href="<?= View::request("cart") ?>" class="flex xl:flex-col xl:justify-center text-center items-center py-2 pl-4 bg-white border-2 border-gray-300  hover:bg-gray-100 hover:shadow-lg ring-gray-300 focus:ring-2">
         <div class="mr-3">
            <svg width="47" height="46" viewBox="0 0 47 46" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M17.6243 43.0832C18.7059 43.0832 19.5827 42.2064 19.5827 41.1248C19.5827 40.0433 18.7059 39.1665 17.6243 39.1665C16.5428 39.1665 15.666 40.0433 15.666 41.1248C15.666 42.2064 16.5428 43.0832 17.6243 43.0832Z" stroke="#C4C4C4" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M39.1673 43.0832C40.2489 43.0832 41.1257 42.2064 41.1257 41.1248C41.1257 40.0433 40.2489 39.1665 39.1673 39.1665C38.0858 39.1665 37.209 40.0433 37.209 41.1248C37.209 42.2064 38.0858 43.0832 39.1673 43.0832Z" stroke="#C4C4C4" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M1.95898 1.9585H9.79232L15.0406 28.1806C15.2197 29.0822 15.7102 29.8921 16.4263 30.4685C17.1423 31.0449 18.0383 31.3511 18.9573 31.3335H37.9923C38.9114 31.3511 39.8073 31.0449 40.5234 30.4685C41.2394 29.8921 41.7299 29.0822 41.909 28.1806L45.0423 11.7502H11.7506" stroke="#C4C4C4" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>               
         </div>
         <div class="">Cart</div>
      </a>
   
      <a href="<?= View::request("transaction|payment") ?>" class="flex xl:flex-col xl:justify-center text-center items-center py-2 pl-4 bg-white border-2 border-gray-300  hover:bg-gray-100 hover:shadow-lg ring-gray-300 focus:ring-2">
         <div class="mr-1">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M25.9993 8.66675V2.16675L17.3327 10.8334L25.9993 19.5001V13.0001C33.171 13.0001 38.9993 18.8284 38.9993 26.0001C38.9993 28.1884 38.4577 30.2684 37.4827 32.0667L40.646 35.2301C42.4016 32.4717 43.3336 29.2697 43.3327 26.0001C43.3327 16.4234 35.576 8.66675 25.9993 8.66675ZM25.9993 39.0001C18.8277 39.0001 12.9993 33.1717 12.9993 26.0001C12.9993 23.8117 13.541 21.7317 14.516 19.9334L11.3527 16.7701C9.59715 19.5284 8.66511 22.7305 8.66602 26.0001C8.66602 35.5767 16.4227 43.3334 25.9993 43.3334V49.8334L34.666 41.1667L25.9993 32.5001V39.0001Z" fill="#C4C4C4"/>
            </svg>                  
         </div>
         <div class="">Transaction</div>
      </a>
   </div>
</main>

<script>
   
</script>