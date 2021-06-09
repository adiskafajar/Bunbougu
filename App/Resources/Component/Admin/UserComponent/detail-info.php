<?php
   use Core\View; 
   use Helper\Image;
   use Models\Data\UserData as User; 

   $user = User::readUserById($this->name); 
?>

<div class="w-full p-5 shadow-lg">
   <h1 class="mb-1 text-lg font-semibold">Detail User</h1>
   <div class="h-0.5 mb-5 bg-gray-300"></div>

   <div class="flex">
      <div class="table mr-auto">
         <div class="table-row">
            <div class="table-cell px-3">name</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $user['name'] ?></div>
         </div>
         
         <div class="table-row">
            <div class="table-cell px-3">email</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $user['email'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">address</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $user['address'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">gender</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $user['gender'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">contact</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $user['contact'] ?></div>
         </div>

         <div class="table-row">
            <div class="table-cell px-3">name</div>
            <div class="table-cell px-3">:</div>
            <div class="table-cell px-3"><?= $user['name'] ?></div>
         </div>

      </div>
      <div class="shadow-lg border mr-10 rounded-full overflow-hidden">
         <img class="h-30 w-30 " src="<?= Image::show($this->view, $user['image']) ?>" alt="">
      </div>
   </div>
</div>