<?php 

namespace Models\Data; 

use Core\Model; 

class CategoryData extends Model 
{
   private static
      $table = "categories",
      $tableId = "category_id";  
      
   public static function readAllCategory($keyword="")
   {
      return Model::fetchDataAll(
         "SELECT * FROM categories WHERE category LIKE '%$keyword%'"
      );
   }

   public static function readCategoryById($categoryId)
   {
      return Model::fetchDataRow("SELECT * FROM categories WHERE category_id='$categoryId'");
   }

   public static function readCategoryByName($category)
   {
      return Model::fetchDataRow("SELECT * FROM categories WHERE category='$category'");
   }

   public static function readForHome()
   {
      return Model::fetchDataAll("SELECT * FROM categories LIMIT 5");
   }

   public static function readTotalCategory()
   {
      return Model::fetchDataSingle("SELECT COUNT(*) as total_category FROM categories", "total_category"); 
   }
}