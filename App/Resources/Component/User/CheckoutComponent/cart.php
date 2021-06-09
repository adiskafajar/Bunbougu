<?php 
   use Core\View; 
   use Helper\Image; 
   use Models\Data\CartData as Cart; 

   $carts = Cart::readAllCartByUser($this->user); 
?>

<div class="row-span-4">
   <span class="text-lg font-semibold">My Cart</span>
   
   <?php foreach ( $carts as $cart ) : ?>      
      <div class="flex items-center h-18 mb-3 mt-2 border-2 border-gray-300 rounded-lg overflow-hidden">
         <!-- product image -->
         <img class="h-full w-20 mr-3" src="<?= Image::storage("product", $cart['image']) ?>" alt="">
   
         <!-- info product -->
         <div class="mr-auto ">
            <span class="text-lg font-semibold "><?= $cart['product'] ?></span>
            <br>
            <span class="text-sm leading-tight">Rp. <?= $cart['price'] ?></span>
         </div>
   
         <div class="mr-5"><?= $cart['quantity'] ?> items</div>
      </div>
   <?php endforeach ;?>
</div>

<script>

// declaration variable to integer value
var angka = 1 


// declaration variable to string value
var huruf = "ini adalah tulisan"

// // ini adalah tipe data integer
// 1

// // ini adalah tipe data string
// "tulisan"

// // integer
// 1 + 1 = 2 

// // string
// "1" + "1" = "11"

// contoh deklarasi variabel 

// variabel yang diisi data integer
var angka = 1

// variabel yang diisi data string
var huruf = "tulisan"

// penulisan konstanta 
const angka = 1


var angka = 1 

var angka = 2 

// hasil : 2



const angka = 1 

const angka = 2

// hasil : erorr


var aritmatika = 3 * 5 + 9

// nilai variabel aritmatika : 24



var aritmatika = (3 + 3) * 2

// nilai variable aritmatika : 12




var relasi = 10 == 10 

// nilai variable relasi : true 

var relasi = 10 > 5 

// nilai variabel relasi : true

var relasi = 10 != 10 

// nilai variabel relasi : false 


var logika1 = true

var logika2 = false 

var hasil = logika1 && logika2 

// nilai variabel hasil : false 

var hasil = logika1 || logika2 

// nilai variabel hasil : true 



</script>
