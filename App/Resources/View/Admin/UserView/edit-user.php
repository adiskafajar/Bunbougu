<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\UserData as User; 

   $user = User::readUserByName($this->name); 
?>

<main class="p-10 pl-20 w-full">
   <h1 class="mb-5 text-2xl font-bold">User</h1>

   <div class="grid grid-cols-2 gap-x-5">
      <?= $this->component("user-table") ?>
      <?= $this->component("edit-form") ?>
   </div>
</main>

<!-- <main>
   <h1>Edit User</h1>

   <form action="<?= $this->request($this->view) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="changeUser">
      <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
      <input type="hidden" name="imageOld" value="<?= $user['image'] ?>">

      <div>
         <label for="name"></label>
         <input type="text" name="name" value="<?= $user['name'] ?>">
      </div>

      <div>   
         <label for="username"></label>
         <input type="text" name="username" value="<?= $user['username'] ?>">
      </div>

      <div>   
         <label for="password"></label>
         <input type="password" name="password" value="<?= $user['password'] ?>">
      </div>

      <div>
         <label for="email"></label>
         <textarea name="email" cols="30" rows="5"><?= $user['email'] ?></textarea>
      </div>

      <div>   
         <label for="address"></label>
         <textarea name="address" cols="30" rows="5"><?= $user['address'] ?></textarea>
      </div>

      <div>   
         <input type="radio" id="pria" name="gender" value="pria" <?= $user['gender'] == 'pria' ? 'checked' : null ?>>
         <label for="pria">pria</label>
         <input type="radio" id="wanita" name="gender" value="wanita" <?= $user['gender'] == 'wanita' ? 'checked' : null ?>>
         <label for="wanita">wanita</label>
      </div>

      <div>
         <label for="contact">contact</label>
         <input type="number" name="contact" >
      </div>

      <div>   
         <input type="file" name="image">
         <img src="<?= Image::show($this->view, $user['image']) ?>" height="40px" width="40px">   
      </div>

      <input type="submit" name="update_category" value="Update">
   </form>
</main> -->