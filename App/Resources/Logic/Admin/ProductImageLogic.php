<?php 

namespace Resources\Logic\Admin; 

use Core\Logic;
use Helper\Upload; 
use Helper\Image; 
use Models\Data\ProductImageData; 
use Models\Action\ProductImageAction; 

abstract class ProductImageLogic extends Logic
{
   public static function addProductImage($data, $file)
   {
      ProductImageAction::create([
         "product_id" => htmlspecialchars($data['product_id']),
         "image" => Upload::image($file, "product"), 
         "main" => "false"
      ]);

      Logic::response("product|gallery-product|{$data['product_id']}");
   }

   public static function changeMainProductImage($data)
   {
      ProductImageAction::updateMainImageToFalse($data['product_id']);

      ProductImageAction::updateMainImagetoTrue($data['product_image_id']);

      Logic::response("product|gallery-product|{$data['product_id']}");
   }

   public static function dropProductImage($data)
   {
      Image::drop("product", $data['image']); 

      ProductImageAction::delete($data['product_image_id']);

      Logic::response("product|gallery-product|{$data['product_id']}");
   } 
}