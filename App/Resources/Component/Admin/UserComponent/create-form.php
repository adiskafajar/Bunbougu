<?php

use Core\View;
?>

<div class="w-full p-5  shadow-lg">
   <h2 class="mb-1 text-lg font-semibold">Create User</h2>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <form action="<?= $this->request($this->view) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="addUser">

      <div class="table mb-3">
         <div class="table-row ">
            <label class="table-cell px-5" for="name">name</label>
            <input class="table-cell border" type="text" name="name" required>
         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="username">username</label>

            <input class="table-cell border" type="text" name="username" required>
         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="password">password</label>
            <input class="table-cell border" type="text" name="username" required>
         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="email">email</label>
            <textarea class="table-cell border" name="email" id="" cols="30" rows="5" required></textarea>
         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="address">address</label>
            <textarea class="table-cell border" name="address" id="" cols="30" rows="5" required></textarea>

         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="gender">gender</label>
            <div class="table-cell">
               <input class="border" type="radio" id="pria" name="gender" value="pria" required>
               <llalbel for="pria">pria</llalbel>
               <input class="border" type="radio" id="wanita" name="gender" value="wanita" required>
               <llalbell for="wanita">wanita</llalbell>
            </div>
         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="contact">contact</label>

            <input class="table-cell border" type="number" name="contact" required>
         </div>

         <div class="table-row ">
            <label class="table-cell px-5" for="address">image</label>

            <input class="table-cell" type="file" name="image" placeholder="Image" required>
         </div>
      </div>

      <button class="inline-block px-5 border shadow rounded-lg hover:bg-blue-500 hover:text-white" type="submit">Create</button>
   </form>
</div>