<?php 
   use Core\View; 
   use Models\Data\CartData as Cart; 

   $carts = Cart::readAllCartByUser($this->user); 
?>

<header class="xl:block relative bg-white mb-10 h-14">
   <!-- header mobile -->
   <div class=" xl:hidden px-5 flex items-center fixed inset-x-0 my-auto shadow-lg bg-white">
      <!-- Logo -->
      <a class="flex" href="<?= $this->request(BasePage) ?>">
         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
         </svg>
      </a>

      <!-- search product -->
      <form class="flex-grow relative px-2 focus-within:text-gray-500" action="<?= $this->request("product") ?>" method="post">
         <input type="hidden" name="action" value="search">
         <button class="absolute top-0 bottom-0 left-5" type="submit">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M21.0004 20.9999L16.6504 16.6499" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                  
         </button>
         <input id="search-input" class="w-full py-3 pl-11 rounded-lg focus:outline-none focus:ring focus:ring-black" name="keyword" type="text" placeholder="Search" autocomplete="off">
      </form>

      <!-- auth button -->
      <div class="">
         <?php if ( $this->access == "user" ) : ?>    
            <form action="<?= $this->request(BaseView) ?>" method="post">
               <input type="hidden" name="action" value="logout">
               <button class="font-semibold text-lg focus:outline-none" type="submit">
                  <!-- door close -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                     <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                     <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                  </svg>
               </button>
            </form>
         <?php else : ?>
            <a href="<?= $this->request("auth|sign-in") ?>">
               <!-- door open -->
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
               </svg>
            </a>
         <?php endif ; ?>
      </div>
   </div>

   
   <!-- header dekstop -->
   <div class="hidden xl:block fixed inset-x-0 z-10 bg-white shadow-lg">
      <div class="flex items-center  container mx-auto xl:px-30 h-16 ">
         <div class="mr-6 text-2xl font-bold">
            <a href="<?= $this->request(BaseView) ?>">Bunbougu</a>
         </div>
   
         <div class="mr-6 text-base font-semibold <?= $this->page == "home" ? "underline" : null ?>">
            <a href="<?= $this->request(BaseView) ?>">Home</a>
         </div>
   
         <div class="mr-6 text-base font-semibold <?= $this->page == "about" ? "underline" : null ?>">
            <a href="<?= $this->request("about") ?>">About</a>
         </div>
   
         <?php if ( in_array($this->page, ["catalog", "category", "brand"]) ) : ?>
            <div class="mr-auto text-base font-semibold underline">
               <a href="<?= $this->request("{$this->view}|{$this->page}") ?>"><?= ucfirst($this->page) ?></a>
            </div>
         <?php else : ?>
            <div class="mr-auto text-base font-semibold <?= $this->page == "catalog" ? "underline" : null ?>">
               <a href="<?= $this->request("product|catalog") ?>">Catalog</a>
            </div>
         <?php endif ; ?>

         <!-- search -->
         <div class="mr-6">
            <form class="relative focus-within:text-gray-500" action="<?= $this->request("product") ?>" method="post">
               <input type="hidden" name="action" value="search">
               <button class="absolute top-0 bottom-0 left-2" type="submit">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M21.0004 20.9999L16.6504 16.6499" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>                  
               </button>
               <input id="search-input" class="py-1 pl-9 border rounded-lg bg-gray-auth focus:outline-none focus:ring focus:ring-gray-300" name="keyword" type="text" placeholder="Search" autocomplete="off">
            </form>
         </div>
         <?php if ( $this->access == "user" ) : ?>            
            <!-- cart link -->
            <div class="mr-6 <?= $this->page == "cart" ? "border-b-2 border-black" : null ?>">
               <a href="<?= $this->request("cart") ?>">
                  <!-- cart icon -->
                  <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g clip-path="url(#clip0)">
                     <path d="M8.62435 21.0832C9.15362 21.0832 9.58268 20.6541 9.58268 20.1248C9.58268 19.5956 9.15362 19.1665 8.62435 19.1665C8.09508 19.1665 7.66602 19.5956 7.66602 20.1248C7.66602 20.6541 8.09508 21.0832 8.62435 21.0832Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M19.1673 21.0832C19.6966 21.0832 20.1257 20.6541 20.1257 20.1248C20.1257 19.5956 19.6966 19.1665 19.1673 19.1665C18.638 19.1665 18.209 19.5956 18.209 20.1248C18.209 20.6541 18.638 21.0832 19.1673 21.0832Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M0.958984 0.958496H4.79232L7.36065 13.7906C7.44828 14.2318 7.68831 14.6281 8.03871 14.9102C8.38912 15.1923 8.82757 15.3421 9.27732 15.3335H18.5923C19.0421 15.3421 19.4805 15.1923 19.8309 14.9102C20.1813 14.6281 20.4213 14.2318 20.509 13.7906L22.0423 5.75016H5.75065" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
                     <defs>
                     <clipPath id="clip0">
                     <rect width="23" height="23" fill="white"/>
                     </clipPath>
                     </defs>
                     <?php if( $carts ) : ?>
                        <circle cx="19.3" cy="4" r="4" fill="#FF1818"/>
                     <?php endif ; ?>
                        
                  </svg>
               </a>
            </div>

            <!-- profile link -->
            <div class="mr-6 <?= $this->page == "profile" ? "border-b-2 border-black" : null ?>">
               <a class="" href="<?= $this->request("profile") ?>">
                  <!-- profile icon -->
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M18.3327 19.25V17.4167C18.3327 16.4442 17.9464 15.5116 17.2587 14.8239C16.5711 14.1363 15.6385 13.75 14.666 13.75H7.33268C6.36022 13.75 5.42759 14.1363 4.73996 14.8239C4.05232 15.5116 3.66602 16.4442 3.66602 17.4167V19.25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M11.0007 10.0833C13.0257 10.0833 14.6673 8.44171 14.6673 6.41667C14.6673 4.39162 13.0257 2.75 11.0007 2.75C8.97561 2.75 7.33398 4.39162 7.33398 6.41667C7.33398 8.44171 8.97561 10.0833 11.0007 10.0833Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>           
               </a>
            </div>

            <!-- logout link -->
            <div>
               <form action="<?= $this->request(BaseView) ?>" method="post">
                  <input type="hidden" name="action" value="logout">
                  <button class="font-semibold text-lg focus:outline-none" type="submit">Logout</button>
               </form>
            </div>
         <?php else : ?>
            <!-- login link -->
            <div>
               <a class="font-semibold text-lg <?= $this->page == "sign-in" ? "underline" : null ?>" href="<?= $this->request("auth|sign-in") ?>">Login</a>
            </div>
         <?php endif ;?>
      </div>
   </div>
</header>

<!-- mobile navigation -->
<nav id="header-mobile" class=" xl:hidden ">
   <div class="flex justify-around items-center fixed inset-x-0 bottom-0 h-16 bg-white border-t-2 shadow-inner">
      <!-- home icon -->
      <a class="order-1" href="<?= $this->request("home") ?>">
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
            <?php if ( $this->page == "home" ) : ?>      
               <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
               <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            <?php else : ?>
               <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
               <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            <?php endif ; ?>
         </svg>
      </a>
      
      <!-- about icon -->
      <a class="<?= $this->access == "user" ? "order-2" : "order-3" ?>" href="<?= $this->request("about") ?>">
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
            <?php if ( $this->page == "about" ) : ?>
               <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>        
            <?php else : ?>
               <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            <?php endif ; ?>
         </svg>
      </a>
   
      <!-- catalog icon -->
      <a class="<?= $this->access == "user" ? "order-3" : "order-2" ?> " href="<?= $this->request("product|catalog") ?>">
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
            <?php if ( in_array($this->page, ["catalog", "category", "brand", "detail"])) : ?>
               <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
            <?php else : ?>         
               <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
            <?php endif ; ?>
         </svg>
      </a>
   
      <?php if ( $this->access == "user" ) : ?>         
         <!-- cart icon -->
         <a class="order-4" href="<?= $this->request("cart") ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
               <?php if ( $this->page == "cart" ) : ?>      
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
               <?php else : ?>      
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
               <?php endif ; ?>
            </svg>
         </a>
      
         <!-- profile icon -->
         <a class="order-5" href="<?= $this->request("profile") ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
               <?php if ( in_array($this->page, ["profile", "wishlist"]) ) : ?>
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
               <?php else : ?>
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
               <?php endif ; ?>
            </svg>
         </a>
      </div>
      <?php endif ;?>
</nav>

<script>

</script>

<style>
   #search-input:focus::placeholder{
      opacity: 0;
   }
</style>

