<?php 
   use Core\View; 
   use Helper\Image; 
   use Helper\MixFucntion as Func; 
?>

<aside class="">
   <nav class="flex flex-col items-center fixed inset-y-0  bg-black">
      <h1 class="font-bold text-2xl mt-8 mb-15 text-white">Admin System</h1>
      <a href="<?= $this->request(BasePage) ?>"              class="flex items-center justify-center h-10 w-35 mb-5 border-2 rounded-lg hover:bg-white text-lg font-semibold hover:text-black <?= in_array($this->page, ["home"]) ? "text-black bg-white" : "text-white" ?>">Dashboard</a>
      <a href="<?= $this->request("transaction|payment") ?>" class="flex items-center justify-center h-10 w-35 mb-5 border-2 rounded-lg hover:bg-white text-lg font-semibold hover:text-black <?= in_array($this->page, TransactionPage) ? "text-black bg-white" : "text-white" ?>">Transaction</a>
      <a href="<?= $this->request("user") ?>"                class="flex items-center justify-center h-10 w-35 mb-5 border-2 rounded-lg hover:bg-white text-lg font-semibold hover:text-black <?= in_array($this->page, UserPage) ? "text-black bg-white" : "text-white" ?>">User</a>
      <a href="<?= $this->request("product") ?>"             class="flex items-center justify-center h-10 w-35 mb-5 border-2 rounded-lg hover:bg-white text-lg font-semibold hover:text-black <?= in_array($this->page, ProductPage) ? "text-black bg-white" : "text-white" ?>">Product</a>
      <a href="<?= $this->request("category") ?>"            class="flex items-center justify-center h-10 w-35 mb-5 border-2 rounded-lg hover:bg-white text-lg font-semibold hover:text-black <?= in_array($this->page, CategoryPage) ? "text-black bg-white" : "text-white" ?>">Category</a>
      <a href="<?= $this->request("brand") ?>"               class="flex items-center justify-center h-10 w-35 mb-5 border-2 rounded-lg hover:bg-white text-lg font-semibold hover:text-black <?= in_array($this->page, BrandPage) ? "text-black bg-white" : "text-white" ?>">Brand</a>

      <form class="mb-10 mt-auto" action="<?= $this->request("home") ?>" method="post">
         <input type="hidden" name="action" value="logout">
         <button type="submit" class="flex items-center justify-center h-10 w-35 mb-10 mt-auto border-2 rounded-lg text-lg text-white font-semibold hover:bg-red-500 hover:border-red-500">Logout</button>
      </form>
   </nav>
</aside>

<script>
   const string = "hello wordld"

   console.log(string)

</script>

<style>
   aside{
      width: 30vh;
   }

   nav{
      width: 30vh;
   }
</style>

