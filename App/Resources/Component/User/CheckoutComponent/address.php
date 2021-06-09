<?php 
   use Core\View; 
   use Helepr\Image; 
   use Models\Data\UserData as User;
   
   $user = User::readUserById($this->user); 
?>

<div class="row-span-1">
   <span class="text-lg font-semibold">Ship To</span>

   <div class="border-2 border-gray-300 p-2 pb-10 mt-2 rounded-lg">
      <div class="font-semibold mb-3">Home Address</div>
      <div><?= $user['name'] ?></div>
      <div><?= $user['address'] ?></div>
      <div><?= $user['contact'] ?></div>
   </div>
</div>

<script>
   const index = "hello wordld"

   console.log(index)

</script>