<?php 

namespace Models\Action; 

use Core\Model; 

class CategoryAction extends Model 
{
   private static
      $table = "categories",
      $tableId = "category_id";  

   public static function create($data)
   {
      return Model::action(
         "INSERT INTO categories VALUES(
            '', 
            '{$data['category']}', 
            '{$data['image']}' 
         )"
      );
   } 

   public function update($data)
   {
      return Model::action(
         "UPDATE categories SET 
            category = '{$data['category']}', 
            image    = '{$data['image']}' 
         WHERE category_id={$data['category_id']}"
      );
   }

   public static function delete($categoryId)
   {
      return Model::action("DELETE FROM categories WHERE category_id='$categoryId'");
   }

   // public static function search($keyword)
   // {
   //    $table = self::$table; 
   //    $sql = "SELECT * FROM $table WHERE category LIKE '%$keyword%'"; 
   //    $query = mysqli_query(self::connect(), $sql); 
   //    $search = null; 

   //    !$query ? die("failed find keyword") : null; 

   //    while($data = mysqli_fetch_array($query))
   //    {
   //       $search[] = $data; 
   //    }

   //    return $search; 
   // }
}