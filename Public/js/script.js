const transactionProduct = document.getElementById("transaction-product")
const transactionProduct = document.getE

   
transactionProduct.addEventListener('click', (element)=> {
   if(element.target.className == 'toggler'){
      element.target.nextElementSibling.classList.remove("hidden"); 
   }
})

