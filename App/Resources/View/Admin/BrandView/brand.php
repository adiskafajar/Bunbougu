<?php
   use Core\View; 
?>

<main class="p-10 pl-20 w-full">
   <h1 class="mb-5 text-2xl font-bold"><?= ucfirst($this->view) ?></h1>

   <div class="grid grid-cols-2 gap-x-5">  
      <?= $this->component("brand-table") ?>
   </div>
</main> 