<?php 
   use Core\View; 
   use Helper\Image; 
   use Helper\Flash;
?>

<main class="flex">
   <div id="login-form" class="container flex h-79 px-5 m-auto xl:px-0 xl:shadow-xl">
      <div class="hidden xl:block flex-1">
         <img class="h-full w-full" src="<?= Image::storage("auth", "auth-background.jpg") ?>" alt="">
      </div>

      <div class="flex flex-col flex-1 justify-center relative px-5 text-center bg-gray-auth shadow-xl">
         <div class="absolute top-5 left-7 font-semibold text-xl">Sign In</div>

         <?= $this->flash ? Flash::get($this->flash) : null ?>

         <form class="mx-auto" action="<?=$this->request("auth|sign-in") ?>" method="post">
            <input type="hidden" name="action" value="login">

            <div class="">
               <label class="block mb-2" for="username">Username</label>
               <input class="block w-60 h-8 pl-3 border shadow focus:outline-none focus:ring focus:ring-gray-300" name="username" type="text" required autocomplete="off">
            </div>
            
            <div class="mt-2">
               <label class="block mb-2" for="password">password</label>
               <input class="block w-60 h-8 pl-3 border shadow focus:outline-none focus:ring focus:ring-gray-300" name="password" type="password" required autocomplete="off">
            </div>

            <button class="mt-8 px-12 py-2 bg-gray-700 hover:bg-black text-white" type="submit" >Sign In</button>
         </form>

         <div class="mt-3">
            <a class="hover:underline" href="<?=$this->request("auth|sign-up") ?>">Didn't have a account? <br> Sign Up</a>
         </div>
      </div>
   </div>
</main>

<style>
   #login-form {
      max-width: 1100px;
      height: 550px;
   }
</style>

<script>
</script>
