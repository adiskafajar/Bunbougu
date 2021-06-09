<?php
   use Helper\Image; 
   use Models\Data\UserData as User; 
   use Models\Data\TransactionData as Transaction; 

   $users = User::readAllByRole($this->page == "user" ? $this->name : null); 

   function userTransaction($userId){
      return Transaction::readTotalTransactionByUserId($userId);
   }
?>

<div>
   <div class="flex justify-between items-center px-3 mb-3">
      <!-- btn craete -->  
      <a class="inline-block px-5 mr-auto border border-gray-300 rounded-lg hover:bg-blue-500 hover:shadow hover:text-white <?= $this->page == "create-user" ? "bg-blue-500 text-white shadow" : null ?>" href="<?= $this->request("{$this->view}|create-user") ?>">craete</a>

      <!-- search -->
      <form class="inline-block relative focus-within:text-gray-500" action="<?= $this->request("user") ?>" method="post">
         <input type="hidden" name="action" value="search">
         <button class="absolute top-0 bottom-0 left-2" type="submit">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M21.0004 20.9999L16.6504 16.6499" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                  
         </button>
         <input id="search-input" class="py-1 pl-9 border rounded-lg bg-gray-auth focus:outline-none focus:ring focus:ring-gray-300" name="keyword" type="text" placeholder="Search" autocomplete="off">
      </form>
   </div>

   <!-- table -->
   <div class="table text-center shadow-lg w-full">
      <!-- table head -->
      <div class="table-header-group bg-gray-300 text-lg font-semibold">
         <div class="table-cell py-2 px-5">No</div> 
         <div class="table-cell py-2 px-5">Name</div>
         <div class="table-cell py-2 px-5">Gender</div>
         <div class="table-cell py-2 px-5">Transaction</div>
         <div class="table-cell py-2 px-5">Action</div>
      </div>

      <!-- table body -->
      <div class="table-row-group">
         <?php if ( !is_null($users) ) : ?>      
            <?php foreach ( $users as $user ) : ?>
               <div class="table-row">
                  <div class="table-cell py-3 px-5"><?= $this->no-=-1 ?></div>
                  <div class="table-cell py-3 px-5"><?= $user['name'] ?></div>
                  <div class="table-cell py-3 px-5"><?= $user['gender'] ?></div>
                  <div class="table-cell py-3 px-5"><?= userTransaction($user['user_id']) ?></div>
                  <div class="table-cell py-3">
                     <a class="inline-block px-5 border rounded-lg border-gray-300 shadow hover:bg-green-500 hover:shadow hover:text-white <?= $this->page == "detail-user" && $this->name == $user['user_id'] ? "bg-green-500 shadow text-white" : null ?>" href="<?= $this->request("{$this->view}|detail-user|{$user['user_id']}") ?>">detail</a>
                     <a class="inline-block px-5 border rounded-lg border-gray-300 shadow hover:bg-yellow-500 hover:shadow hover:text-white <?= $this->page == "edit-user" && $this->name == $user['user_id'] ? "bg-yellow-500 shadow text-white" : null ?>" href="<?= $this->request("{$this->view}|edit-user|{$user['user_id']}") ?>">edit</a>
                     <form class="inline" action="<?= $this->request($this->view) ?>" method="post">
                        <input type="hidden" name="action" value="dropUser">
                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                        <button class="inline-block px-5 border rounded-lg border-gray-300 shadow hover:bg-red-500 hover:shadow hover:text-white" type="submit">delete</button>
                     </form>
                  </div>
               </div>
            <?php endforeach ;?>
         <?php else : ?>
            <div class="table-cell text-lg text-red-500">Data empty</div>         
         <?php endif ?>
      </div>
   </div>
</div>