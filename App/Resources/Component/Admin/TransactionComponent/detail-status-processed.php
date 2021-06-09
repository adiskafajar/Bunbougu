<div class="">
   <h2 class="text-lg font-semibold">Transaction Status</h2>

   <div class="p-3 h-36 text-center border-2 border-gray-300">
      <div class="mb-5">proses barang untuk dikirim ke user</div>
      <svg class="mx-auto mb-5" width="45" height="33" viewBox="0 0 45 33" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M29.9331 16.5C28.7448 16.5 27.6268 15.8496 27.0221 14.809L22.501 7.10545L17.987 14.809C17.3752 15.8568 16.2573 16.5072 15.069 16.5072C14.7526 16.5072 14.4362 16.4639 14.1338 16.3699L4.50102 13.5371V26.4004C4.50102 27.4627 5.20415 28.3877 6.20259 28.6406L21.4041 32.5502C22.1213 32.7308 22.8737 32.7308 23.5838 32.5502L38.7995 28.6406C39.7979 28.3805 40.501 27.4555 40.501 26.4004V13.5371L30.8682 16.3627C30.5659 16.4566 30.2495 16.5 29.9331 16.5ZM44.8815 8.39178L41.2604 0.962876C41.0424 0.514829 40.5713 0.254673 40.0862 0.319712L22.501 2.62499L28.9487 13.6166C29.2159 14.0719 29.7502 14.2887 30.2495 14.1441L44.1643 10.0611C44.8604 9.85155 45.1979 9.05663 44.8815 8.39178ZM3.74165 0.962876L0.120554 8.39178C-0.202883 9.05663 0.141648 9.85155 0.83071 10.0539L14.7456 14.1369C15.2448 14.2814 15.7791 14.0646 16.0463 13.6094L22.501 2.62499L4.90884 0.319712C4.42368 0.2619 3.95962 0.514829 3.74165 0.962876Z" fill="#C4C4C4"/>
      </svg>   
      <form action="<?= $this->request("transaction") ?>" method="post">
         <input type="hidden" name="action" value="changeStatus">
         <input type="hidden" name="status" value="shipping">
         <input type="hidden" name="transaction_id" value="<?= $this->name ?>">
         <button class="px-5 py-1 border-2 border-gray-300 text-gray-300 hover:bg-gray-300 hover:text-white"type="submit">konfirmasi</button>
      </form>
   </div>
</div>