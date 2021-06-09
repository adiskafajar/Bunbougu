<div class="">
   <h2 class="text-lg font-semibold">Transaction Status</h2>

   <div class="p-3 h-36 text-center border-2 border-gray-300">
      <div class="mb-5">cek pembayaran user</div>
      <svg class="mb-5 mx-auto" width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M37 18.5C37 23.4065 35.0509 28.1121 31.5815 31.5815C28.1121 35.0509 23.4065 37 18.5 37C13.5935 37 8.88795 35.0509 5.41852 31.5815C1.9491 28.1121 0 23.4065 0 18.5C0 13.5935 1.9491 8.88795 5.41852 5.41852C8.88795 1.9491 13.5935 0 18.5 0C23.4065 0 28.1121 1.9491 31.5815 5.41852C35.0509 8.88795 37 13.5935 37 18.5ZM18.5 8.09375C18.5 7.78709 18.3782 7.493 18.1613 7.27616C17.9445 7.05932 17.6504 6.9375 17.3438 6.9375C17.0371 6.9375 16.743 7.05932 16.5262 7.27616C16.3093 7.493 16.1875 7.78709 16.1875 8.09375V20.8125C16.1876 21.0163 16.2415 21.2165 16.3438 21.3927C16.4462 21.569 16.5933 21.715 16.7703 21.8161L24.864 26.4411C25.1296 26.5847 25.4408 26.6186 25.7312 26.5358C26.0215 26.4529 26.2679 26.2597 26.4176 25.9976C26.5674 25.7354 26.6088 25.4251 26.5328 25.1329C26.4568 24.8407 26.2695 24.5898 26.011 24.4339L18.5 20.1419V8.09375Z" fill="#C4C4C4"/>
      </svg>                 
      <form action="<?= $this->request("transaction") ?>" method="post">
         <input type="hidden" name="action" value="changeStatus">
         <input type="hidden" name="status" value="processed">
         <input type="hidden" name="transaction_id" value="<?= $this->name ?>">
         <button class="px-5 py-1 border-2 border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-white"type="submit">konfirmasi</button>
      </form>
   </div>
</div>