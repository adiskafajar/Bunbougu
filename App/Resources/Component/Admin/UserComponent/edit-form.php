<?php
   use Helper\Image; 
   use Models\Data\UserData as User; 

   $user = User::readUserById($this->name); 
?>

<div class="w-full p-5 shadow-lg">
   <h1 class="mb-1 text-lg font-semibold">Edit <?= $user['name'] ?></h1>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <form action="<?= $this->request($this->view) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="changeUser">
      <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
      <input type="hidden" name="imageOld" value="<?= $user['image'] ?>">

      <div class="table">
         <div class="table-row">
            <label class="table-cell" for="name">name</label>
            <input class="table-cell border" type="text" name="name" value="<?= $user['name'] ?>">
         </div>

         <div class="table-row">   
            <label class="table-cell" for="username">username</label>
            <input class="table-cell border" type="text" name="username" value="<?= $user['username'] ?>">
         </div>

         <div class="table-row">   
            <label class="table-cell" for="password">password</label>
            <input class="table-cell border" type="password" name="password" value="<?= $user['password'] ?>">
         </div>

         <div class="table-row">
            <label class="table-cell" for="email">email</label>
            <textarea class="table-cell border" name="email" cols="30" rows="5"><?= $user['email'] ?></textarea>
         </div>

         <div class="table-row">   
            <label class="table-cell" for="address">address</label>
            <textarea class="table-cell border" name="address" cols="30" rows="5"><?= $user['address'] ?></textarea>
         </div>

         <div class="table-row">   
            <label class="table-cell" for="gender">gender</label>
            <div class="table-cell">
               <input type="radio" id="pria" name="gender" value="pria" <?= $user['gender'] == 'pria' ? 'checked' : null ?>>
               <label for="pria">pria</label>
               <input type="radio" id="wanita" name="gender" value="wanita" <?= $user['gender'] == 'wanita' ? 'checked' : null ?>>
               <label for="wanita">wanita</label>
            </div>
         </div>

         <div class="table-row">
            <label class="table-cell" for="contact">contact</label>
            <input class="table-cell border" type="number" name="contact" >
         </div>

         <div class="table-row"> 
            <label class="table-cell" for="image">Image</label> 
            <div class="table-cell">
               <input class="" type="file" name="image">
               <img class="h-20 w-20" src="<?= Image::show($this->view, $user['image']) ?>" >   
            </div> 
         </div>
      </div>

      <button class="inline-block px-5 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white" type="submit" >edit</button>
   </form>

</div>