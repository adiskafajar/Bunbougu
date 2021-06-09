<?php
   use Models\Data\TransactionData as Transaction; 

   $payment   = Transaction::readUserTransactionByStatus("payment", $this->user); 
   $awaiting  = Transaction::readUserTransactionByStatus("awaiting", $this->user); 
   $processed = Transaction::readUserTransactionByStatus("processed", $this->user); 
   $shipping  = Transaction::readUserTransactionByStatus("shipping", $this->user); 
   $delivered = Transaction::readUserTransactionByStatus("delivered", $this->user); 
?>

<nav>
   <div class="text-lg font-semibold text-center xl:text-left">Transaction Process</div>
   <div class="grid grid-rows-5 xl:grid-rows-none xl:grid-cols-5 gap-y-5 xl:gap-y-0 xl:gap-x-4 px- xl:px-0 mt-4 text-gray-400 xl:h-25">
      <a href="<?= $this->request("transaction|payment") ?>" class="flex flex-col justify-center items-center py-1 border-2 hover:shadow-lg hover:bg-gray-200 text-center <?= $this->page == "payment" ? "bg-gray-200 ring ring-gray-300" : null ?>">
         <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M38.7917 28.5837V12.2503C38.7917 10.0045 36.9542 8.16699 34.7084 8.16699H6.12502C3.87919 8.16699 2.04169 10.0045 2.04169 12.2503V28.5837C2.04169 30.8295 3.87919 32.667 6.12502 32.667H34.7084C36.9542 32.667 38.7917 30.8295 38.7917 28.5837ZM20.4167 26.542C17.0275 26.542 14.2917 23.8062 14.2917 20.417C14.2917 17.0278 17.0275 14.292 20.4167 14.292C23.8059 14.292 26.5417 17.0278 26.5417 20.417C26.5417 23.8062 23.8059 26.542 20.4167 26.542ZM46.9584 14.292V36.7503C46.9584 38.9962 45.1208 40.8337 42.875 40.8337H8.16669V36.7503H42.875V14.292H46.9584Z" fill="#C4C4C4"/>
            <?php if( $payment ) : ?>
               <circle cx="30" cy="5" r="5" fill="#FF1818"/>
            <?php endif ; ?>
         </svg>                 
         <div class="mt-1 text-sm xl:text-base">Payment</div>
      </a>
      <a href="<?= $this->request("transaction|awaiting") ?>" class="flex flex-col justify-center items-center py-1 border-2 hover:shadow-lg hover:bg-gray-200 text-center <?= $this->page == "awaiting" ? "bg-gray-200 ring ring-gray-300" : null ?>">
         <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M37 18.5C37 23.4065 35.0509 28.1121 31.5815 31.5815C28.1121 35.0509 23.4065 37 18.5 37C13.5935 37 8.88795 35.0509 5.41852 31.5815C1.9491 28.1121 0 23.4065 0 18.5C0 13.5935 1.9491 8.88795 5.41852 5.41852C8.88795 1.9491 13.5935 0 18.5 0C23.4065 0 28.1121 1.9491 31.5815 5.41852C35.0509 8.88795 37 13.5935 37 18.5ZM18.5 8.09375C18.5 7.78709 18.3782 7.493 18.1613 7.27616C17.9445 7.05932 17.6504 6.9375 17.3438 6.9375C17.0371 6.9375 16.743 7.05932 16.5262 7.27616C16.3093 7.493 16.1875 7.78709 16.1875 8.09375V20.8125C16.1876 21.0163 16.2415 21.2165 16.3438 21.3927C16.4462 21.569 16.5933 21.715 16.7703 21.8161L24.864 26.4411C25.1296 26.5847 25.4408 26.6186 25.7312 26.5358C26.0215 26.4529 26.2679 26.2597 26.4176 25.9976C26.5674 25.7354 26.6088 25.4251 26.5328 25.1329C26.4568 24.8407 26.2695 24.5898 26.011 24.4339L18.5 20.1419V8.09375Z" fill="#C4C4C4"/>
            <?php if( $awaiting ) : ?>
               <circle cx="30" cy="5" r="5" fill="#FF1818"/>
            <?php endif ; ?>
         </svg>              
         <div class="mt-1 text-sm xl:text-base">Awaiting</div>
      </a>
      <a href="<?= $this->request("transaction|processed") ?>" class="flex flex-col justify-center items-center py-1 border-2 hover:shadow-xl hover:bg-gray-200 text-center <?= $this->page == "processed" ? "bg-gray-200 ring ring-gray-300" : null ?>">
         <svg width="45" height="33" viewBox="0 0 45 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.9331 16.5C28.7448 16.5 27.6268 15.8496 27.0221 14.809L22.501 7.10545L17.987 14.809C17.3752 15.8568 16.2573 16.5072 15.069 16.5072C14.7526 16.5072 14.4362 16.4639 14.1338 16.3699L4.50102 13.5371V26.4004C4.50102 27.4627 5.20415 28.3877 6.20259 28.6406L21.4041 32.5502C22.1213 32.7308 22.8737 32.7308 23.5838 32.5502L38.7995 28.6406C39.7979 28.3805 40.501 27.4555 40.501 26.4004V13.5371L30.8682 16.3627C30.5659 16.4566 30.2495 16.5 29.9331 16.5ZM44.8815 8.39178L41.2604 0.962876C41.0424 0.514829 40.5713 0.254673 40.0862 0.319712L22.501 2.62499L28.9487 13.6166C29.2159 14.0719 29.7502 14.2887 30.2495 14.1441L44.1643 10.0611C44.8604 9.85155 45.1979 9.05663 44.8815 8.39178ZM3.74165 0.962876L0.120554 8.39178C-0.202883 9.05663 0.141648 9.85155 0.83071 10.0539L14.7456 14.1369C15.2448 14.2814 15.7791 14.0646 16.0463 13.6094L22.501 2.62499L4.90884 0.319712C4.42368 0.2619 3.95962 0.514829 3.74165 0.962876Z" fill="#C4C4C4"/>
            <?php if( $processed ) : ?>
               <circle cx="30" cy="5" r="5" fill="#FF1818"/>
            <?php endif ; ?>
         </svg>                  
         <div class="text-sm xl:text-base">Processed</div>
      </a>
      <a href="<?= $this->request("transaction|shipping") ?>" class="flex flex-col justify-center items-center py-1 border-2 hover:shadow-xl hover:bg-gray-200 text-center <?= $this->page == "shipping" ? "bg-gray-200 ring ring-gray-300" : null ?>">
         <svg width="43" height="31" viewBox="0 0 43 31" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M36.5 8H30.875V0.5H4.625C2.5625 0.5 0.875 2.1875 0.875 4.25V24.875H4.625C4.625 27.9875 7.1375 30.5 10.25 30.5C13.3625 30.5 15.875 27.9875 15.875 24.875H27.125C27.125 27.9875 29.6375 30.5 32.75 30.5C35.8625 30.5 38.375 27.9875 38.375 24.875H42.125V15.5L36.5 8ZM10.25 27.6875C8.69375 27.6875 7.4375 26.4312 7.4375 24.875C7.4375 23.3188 8.69375 22.0625 10.25 22.0625C11.8062 22.0625 13.0625 23.3188 13.0625 24.875C13.0625 26.4312 11.8062 27.6875 10.25 27.6875ZM35.5625 10.8125L39.2375 15.5H30.875V10.8125H35.5625ZM32.75 27.6875C31.1938 27.6875 29.9375 26.4312 29.9375 24.875C29.9375 23.3188 31.1938 22.0625 32.75 22.0625C34.3063 22.0625 35.5625 23.3188 35.5625 24.875C35.5625 26.4312 34.3063 27.6875 32.75 27.6875Z" fill="#C4C4C4"/>
            <?php if( $shipping ) : ?>
               <circle cx="30" cy="5" r="5" fill="#FF1818"/>
            <?php endif ; ?>
         </svg>         
         <div class="text-sm xl:text-base">Shipping</div>
      </a>
      <a href="<?= $this->request("transaction|delivered") ?>" class="flex flex-col justify-center items-center py-1 border-2 hover:shadow-xl hover:bg-gray-200 text-center <?= $this->page == "delivered" ? "bg-gray-200 ring ring-gray-300" : null ?>">
         <svg width="35" height="45" viewBox="0 0 35 45" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5016 0.0871582C9.86 0.0871582 3.66406 6.04684 3.66406 13.3987C3.66406 15.2972 4.08594 17.1028 4.82844 18.7368L17.7378 39.3272L30.1747 18.7368C30.9395 17.0612 31.3347 15.2406 31.3334 13.3987C31.3334 6.04684 25.1431 0.0871582 17.5016 0.0871582ZM17.5016 22.8403C16.3596 22.8384 15.2292 22.6115 14.1749 22.1726C13.1207 21.7336 12.1633 21.0911 11.3575 20.2819C10.5517 19.4727 9.91327 18.5127 9.47872 17.4566C9.04418 16.4005 8.82204 15.2691 8.825 14.1272C8.82278 12.9855 9.04545 11.8546 9.48029 10.799C9.91513 9.74345 10.5536 8.78385 11.3593 7.97502C12.165 7.16619 13.1221 6.52398 14.176 6.08505C15.2299 5.64611 16.3599 5.41906 17.5016 5.41685C19.8072 5.42206 22.0165 6.34241 23.644 7.97567C25.2714 9.60893 26.1839 11.8215 26.1809 14.1272C26.1847 16.4333 25.2725 18.6466 23.645 20.2805C22.0174 21.9143 19.8077 22.8351 17.5016 22.8403ZM23.0619 14.0147C23.0634 14.7466 22.9206 15.4716 22.6418 16.1483C22.363 16.825 21.9536 17.4402 21.437 17.9586C20.9203 18.4771 20.3066 18.8887 19.6309 19.1699C18.9552 19.4511 18.2307 19.5964 17.4988 19.5975C16.0213 19.5937 14.6058 19.0036 13.5632 17.9568C12.5206 16.91 11.9362 15.4921 11.9384 14.0147C11.9373 13.2834 12.0803 12.559 12.3591 11.8829C12.6379 11.2069 13.0472 10.5924 13.5635 10.0745C14.0798 9.55659 14.6931 9.14547 15.3683 8.86459C16.0435 8.58371 16.7675 8.43858 17.4988 8.43747C20.57 8.43747 23.0619 10.9378 23.0619 14.0147Z" fill="#C4C4C4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.90336 33.2522C5.0743 34.2759 3.06898 35.6203 3.06898 37.1306C3.06898 39.2934 8.21867 42.2747 17.4577 42.2747C26.6968 42.2747 31.8465 39.2934 31.8465 37.1306C31.8465 35.6259 29.8552 34.3209 25.0937 33.2522V30.9459C30.339 31.9753 34.2455 34.0425 34.2455 37.1306C34.2455 41.5856 25.5943 44.9212 17.4577 44.9212C9.32117 44.9212 0.669922 41.5856 0.669922 37.1306C0.669922 34.0369 4.6018 31.9303 9.87523 30.9375L9.90336 33.2522Z" fill="#C4C4C4"/>
            <?php if( $delivered ) : ?>
               <circle cx="30" cy="5" r="5" fill="#FF1818"/>
            <?php endif ; ?>
         </svg>                  
         <div class="text-sm xl:text-base">Delivered</div>
      </a>
   </div>
</nav>