<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\UserData as User; 

   $user = User::readUserById($this->user); 
?>

<section class="max-w-6xl mx-auto mt-10 px-5 xl:px-0">
   <h1 class="text-3xl">edit profile page</h1>

   <form action="<?= $this->request($this->view) ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="changeProfile">
      <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
      <input type="hidden" name="imageOld" value="<?= $user['image'] ?>">
      <input type="hidden" name="view" value="<?= $this->view ?>">

      <div>
         <label class="" for="name">Name</label>
         <input class="border shadow" type="text" name="name" value="<?= $user['name'] ?>">
      </div>

      <div>
         <label class="" for="email">Email</label>
         <input class="border shadow" type="text" name="email" value="<?= $user['email'] ?>">
      </div>

      <div>
         <label class="" for="username">Username</label>
         <input class="border shadow" type="text" name="username" value="<?= $user['username'] ?>">
      </div>

      <div>
         <label class="" for="password">Password</label>
         <input class="border shadow" type="text" name="password" value="<?= $user['password'] ?>">
      </div>

      <div>
         <label class="" for="address">address</label>
         <textarea class="h-10 w-80 border shadow" name="address"><?= $user['address'] ?></textarea>
         <a class="px-5 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white" href="<?= $this->request("address") ?>">edit</a>
      </div>

      <div>
         <input type="radio" name="gender" value="pria" <?= $user['gender'] == 'pria' ? 'checked' : null ?>>
         <label for="gender">pria</label>

         <input type="radio" name="gender" value="wanita" <?= $user['gender'] == 'wanita' ? 'checked' : null ?>>
         <label for="gender">wanita</label>
      </div>
      
      <div>
         <label class="" for="contact">contact</label>
         <input class="border shadow" type="number" name="contact" value="<?= $user['contact'] ?>">
         <a class="px-5 border border-gray-300 shadow rounded-lg hover:bg-yellow-500 hover:text-white" href="<?= $this->request("contact") ?>">edit</a>
      </div>

      <div>
         <label for="image">Image</label>
         <input type="file" name="image">
         <img class="h-24 w-20" src="<?= Image::storage("user", $user['image']) ?>" alt="">
      </div>

      <button class="bg-blue-300" type="submit">Edit</button>
   </form>
</section>

<script>
   const data = "hello world" 

   console.log(data) 
</script>