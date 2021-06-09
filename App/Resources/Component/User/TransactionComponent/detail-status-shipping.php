<div class="col-span-2">
   <h2 class="text-lg font-semibold mt-3">Transaction Status</h2>

   <div class="p-5 text-center border-2 border-gray-300">
      <div class="mb-5">Pesanan dalam proses pengiriman,<br>mohon lakukan konfirmasi bila barang telah tiba</div>
      <svg class="mx-auto mb-5" width="43" height="31" viewBox="0 0 43 31" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M36.5 8H30.875V0.5H4.625C2.5625 0.5 0.875 2.1875 0.875 4.25V24.875H4.625C4.625 27.9875 7.1375 30.5 10.25 30.5C13.3625 30.5 15.875 27.9875 15.875 24.875H27.125C27.125 27.9875 29.6375 30.5 32.75 30.5C35.8625 30.5 38.375 27.9875 38.375 24.875H42.125V15.5L36.5 8ZM10.25 27.6875C8.69375 27.6875 7.4375 26.4312 7.4375 24.875C7.4375 23.3188 8.69375 22.0625 10.25 22.0625C11.8062 22.0625 13.0625 23.3188 13.0625 24.875C13.0625 26.4312 11.8062 27.6875 10.25 27.6875ZM35.5625 10.8125L39.2375 15.5H30.875V10.8125H35.5625ZM32.75 27.6875C31.1938 27.6875 29.9375 26.4312 29.9375 24.875C29.9375 23.3188 31.1938 22.0625 32.75 22.0625C34.3063 22.0625 35.5625 23.3188 35.5625 24.875C35.5625 26.4312 34.3063 27.6875 32.75 27.6875Z" fill="#C4C4C4"/>
      </svg>   
      <form action="<?= $this->request("transaction") ?>" method="post">
         <input type="hidden" name="action" value="changeStatus">
         <input type="hidden" name="status" value="delivered">
         <input type="hidden" name="transaction_id" value="<?= $this->name ?>">
         <button class="px-5 py-1 border-2 border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-white"type="submit">konfirmasi</button>
      </form>
   </div>
</div>