<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\TransactionData as Transaction; 
   use Models\Data\UserData as User; 
   use Models\Data\ProductData as Product; 
   use Models\Data\CategoryData as Category; 
   use Models\Data\BrandData as Brand; 

   $totalUser           = User::readTotalUser(); 
   $totalNewTransaction = Transaction::readTotalTransactionByStatusPayment(); 
   $totalCategory       = Category::readTotalCategory(); 
   $totalBrand          = Brand::readTotalBrand();
   $totalEmptyStock     = Product::readTotalEmptyStock(); 
?>

<main class="p-10 pl-20 w-full">
   <div class="mb-5 text-2xl font-bold">Dashboard</div>

   <div class="grid grid-cols-4 gap-5">   
      <a href="<?= $this->request("") ?>" class="flex items-center justify-center h-30 border border-gray-300 hover:bg-gray-300 hover:text-white hover:shadow">Total user: <?= $totalUser ?></a>
      <a href="<?= $this->request("") ?>" class="flex items-center justify-center h-30 border border-gray-300 hover:bg-gray-300 hover:text-white hover:shadow">New transaction: <?= $totalNewTransaction ?></a>
      <a href="<?= $this->request("") ?>" class="flex items-center justify-center h-30 border border-gray-300 hover:bg-gray-300 hover:text-white hover:shadow">Total category: <?= $totalCategory ?></a>
      <a href="<?= $this->request("") ?>" class="flex items-center justify-center h-30 border border-gray-300 hover:bg-gray-300 hover:text-white hover:shadow">Total brand: <?= $totalBrand ?></a>
      <a href="<?= $this->request("") ?>" class="flex items-center justify-center h-30 border border-gray-300 hover:bg-gray-300 hover:text-white hover:shadow">Empty product: <?= $totalEmptyStock ?></a>
   </div>
</main>

<style>

</style>
