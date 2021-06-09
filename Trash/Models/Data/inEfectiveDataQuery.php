<?php 

$sql = "SELECT * FROM couriers"; 
$query = mysqli_query(self::connect(), $sql); 
$couriers = null; 

!$query ? die("failed read all data courier") : null; 

while($data = mysqli_fetch_assoc($query))
{
   $couriers[] = $data; 
}

return $couriers; 


$sql = "SELECT * FROM products
LEFT JOIN categories ON products.category_id = categories.category_id 
LEFT JOIN brands     ON products.brand_id    = brands.brand_id
LEFT JOIN galleries  ON products.product_id  = galleries.product_id
WHERE 
   products.product    LIKE '%$keyword%' OR
   categories.category LIKE '%$keyword%' OR
   brands.brand        LIKE '%$keyword%' 
";

$query = mysqli_query(self::connect(), $sql);

$products = null; 

!$query ? die("failed find kyeword") : null; 

while($data = mysqli_fetch_assoc($query))
{
$products[] = $data; 
}

return $products;

// old method delete
public static function oldMethodDelete($id)
{
   $table = self::$table; 
   $tableId = self::tableId; 
   $sql = "DELETE FROM $table WHERE $tableId=$id"; 
   $query = mysqli_query(self::connect(), 
      "DELETE FROM transactions WHERE transaction_id=$id"
   ) or die ("failed delete data transaction"); 

   !$query ? die("failed delete data transaction") : null; 
}


      // $table = self::$table;
      // $wishlists = null;
      // $sql = "SELECT * FROM $table 
      //    INNER JOIN products   ON wishlists.product_id = products.product_id          
      //    INNER JOIN categories ON products.category_id = categories.category_id
      //    INNER JOIN brands     ON products.brand_id    = brands.brand_id   
      //    LEFT  JOIN galleries  ON products.product_id  = galleries.product_id 
      //    WHERE user_id='$user'
      // "; 
      // $query = mysqli_query(self::connect(), $sql); 

      // !$query ? die("failed read all data wishlist") : null;

      // while($data = mysqli_fetch_assoc($query))
      // {
      //    $wishlists[] = $data; 
      // }

      // return $wishlists; 
