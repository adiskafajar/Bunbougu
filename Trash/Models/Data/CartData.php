<?php 

// non efctive query

$query = mysqli_query(self::connect(), 
"SELECT * FROM carts 
   INNER JOIN products   ON products.product_id    = carts.product_id      
   INNER JOIN categories ON products.category_id   = categories.category_id 
   INNER JOIN brands     ON products.brand_id      = brands.brand_id
   LEFT  JOIN galleries  ON products.product_id    = galleries.product_id
WHERE user_id='$user'"
) or die ("failed read All data cart");

$carts = []; 

while($data = mysqli_fetch_assoc($query)) 
{
$carts[] = $data;  
}

$query = Model::query(
"SELECT * FROM carts 
   INNER JOIN products   ON products.product_id    = carts.product_id      
   INNER JOIN categories ON products.category_id   = categories.category_id 
   INNER JOIN brands     ON products.brand_id      = brands.brand_id
   LEFT  JOIN galleries  ON products.product_id    = galleries.product_id
WHERE user_id='$user'"
); 

$carts = Model::fetchAll($query); 

return Model::fetchAll(Model::query(
"SELECT * FROM carts 
   INNER JOIN products   ON products.product_id    = carts.product_id      
   INNER JOIN categories ON products.category_id   = categories.category_id 
   INNER JOIN brands     ON products.brand_id      = brands.brand_id
   LEFT  JOIN galleries  ON products.product_id    = galleries.product_id
WHERE user_id='$user'"
)); 
