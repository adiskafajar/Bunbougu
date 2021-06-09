<?php 
   use Core\View; 
   use Helper\Flash; 
   use Helper\Image; 
?>

<main class="flex">
   <div id="login-form" class="container flex h-79 m-auto px-5 xl:px-0 xl:shadow-xl">
      <div class="hidden xl:blockflex-1">
         <img class="h-full w-full" src="<?= Image::storage("auth", "auth-background.jpg") ?>" alt="">
      </div>

      <div class="flex flex-col flex-1 justify-center relative text-center bg-gray-auth shadow-xl">
         <div class="absolute top-5 left-7 font-semibold text-xl">Sign Up</div>

         <form class="mx-auto" action="<?= $this->request("auth|sign-up") ?>" method="post">
            <?= $this->flash ? Flash::get($this->flash) : null ?>

            <input type="hidden" name="action" value="register">

            <div class="">
               <label class="block font-semibold" for="name">name</label>
               <input class="block mt-1 w-65 h-8 pl-3 border shadow focus:outline-none focus:ring focus:ring-gray-300" type="text" name="name" autofocus>
            </div>

            <div class="mt-2">
               <label class="block font-semibold" for="email">email</label>
               <input class="block mt-1 w-65 h-8 pl-3 border shadow focus:outline-none focus:ring focus:ring-gray-300" type="text" name="email">
            </div>

            <div class="mt-2">
               <label class="block font-semibold" for="username">Username</label>
               <input class="block mt-1 w-65 h-8 pl-3 border shadow focus:outline-none focus:ring focus:ring-gray-300" type="text" name="username">
            </div>         

            <div class="mt-2">
               <label class="block font-semibold" for="password">password</label>
               <input class="block mt-1 w-65 h-8 pl-3 border shadow focus:outline-none focus:ring focus:ring-gray-300" type="password" name="password">
            </div>
            
            <button class="mt-10 px-12 py-2 bg-gray-700 hover:bg-black text-white" type="submit" >Sign Up</button>
            <div class="divide-solid mt-10"></div>
         </form>
      </div>
   </div>
</main>

<script>

</script>

<style>
   #login-form {
      max-width: 1100px;
      height: 550px;
   }
</style>
