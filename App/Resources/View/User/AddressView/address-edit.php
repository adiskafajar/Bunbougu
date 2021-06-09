<main class="max-w-6xl mx-auto">
   <h1 class="mb-5 text-xl font-bold">My <?= ucfirst($this->view) ?></h1>

   <div class="grid grid-cols-10 gap-x-5">
      <?= $this->component("address-table") ?>
      <?= $this->component("address-form-edit") ?>
   </div>
</main>