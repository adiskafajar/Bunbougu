<?php 

namespace Models\Data; 

use Core\Model;
use Models\Data\ProductData;

class ProductImageData extends Model
{
   private static
      $table = "product_images",
      $tableId = "product_image_id";

   public static function readAllProductImageByProductId($productId)
   {
      return Model::fetchDataAll("SELECT * FROM product_images WHERE product_id='$productId' AND main='false'");
   }

   public static function readMainProductImageByProductId($productId)
   {
      $mainImage = Model::fetchDataSingle(
         "SELECT image FROM product_images WHERE product_id='$productId' AND main='true'"
      );

      return $mainImage ? $mainImage : "default-product.png";
   }

   public static function readProductImageById($productImageId)
   {
      return Model::fetchDataRow("SELECT * FROM product_images WHERE product_image_id='$productImageId'"); 
   }












   public static function readAllGalleryByProduct($data)
   {
      return Model::fetchDataAll("SELECT image FROM galleries WHERE product_id='{$data['product_id']}'");
   }

   public static function readMainGalleryByProduct($data)
   {
      return Model::fetchDataAll("SELECT image FROM galleries WHERE product_id='{$data['product_id']}' AND main='true'");
   }

   public static function readId($data)
   {
      return Model::fetchDataRow("SELECT * FROM galleries WHERE gallery_id='{$data['gallery_id']}'");
   }

   // public static function readByProduct($data)
   // {
   //    return Model::fetchDataAll("SELECT * FROM galleries WHERE product_id='$id' AND main='false'");
   // }

   public static function readMain($data)
   {
      return Model::fetchDataRow("SELECT * FROM galleries WHERE product_id='{$data['product_id']}'");
   }

}