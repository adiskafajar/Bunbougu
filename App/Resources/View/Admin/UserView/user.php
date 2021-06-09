<?php
   use Core\View;
   use Helper\Image; 
   use Models\Data\UserData as User; 

   $users = User::readAllByRole(); 
?> 

<main class="p-10 pl-20 w-full">
   <h1 class="mb-5 text-2xl font-bold">User</h1>

   <div class="grid grid-cols-2 gap-x-5">
      <?= $this->component("user-table") ?>
   </div>
</main>

<script>

</script>