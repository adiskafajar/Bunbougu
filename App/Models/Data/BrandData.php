<?php 

namespace Models\Data; 

use Core\Model; 

class BrandData extends Model 
{
   private static 
      $table = "brands", 
      $tableId = "brand_id"; 

   public static function readAllBrand($keyword="") 
   {
      return Model::fetchDataAll(
         "SELECT * FROM brands WHERE brand LIKE '%$keyword%'"
      ); 
   }

   public static function readBrandById($brandId)
   {
      return Model::fetchDataRow("SELECT * FROM brands WHERE brand_id='$brandId'"); 
   }

   public static function readBrandByName($brand)
   {
      return Model::fetchDataRow("SELECT * FROM brands WHERE brand='$brand'"); 
   }

   public static function readForHome()
   {
      return Model::fetchDataAll("SELECT * FROM brands LIMIT 5");
   }

   public static function readTotalBrand()
   {  
      return Model::fetchDataSingle("SELECT COUNT(*) as total_brand FROM brands", "total_brand"); 
   }  
}
