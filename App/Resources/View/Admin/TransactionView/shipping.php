<main class="p-10 pl-20 w-full">
   <h2 class="text-2xl font-semibold mb-5">Transaction Shipping</h2>

   <div class="grid grid-cols-10 gap-x-7">   
      <?= $this->component("transaction-table") ?>
      <?= $this->component("transaction-link") ?>
   </div>
</main>