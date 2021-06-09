<?php 

namespace Acsns\Admin; 

use Core\Acsn;
use Helper\Upload; 
use Helper\Image; 
use Models\Data\ProductImageData; 
use Models\Action\ProductImageAction; 

abstract class ProductImageAcsn extends Acsn
{
   public static function addProductImage($data, $file)
   {
      ProductImageAction::create([
         "product_id" => htmlspecialchars($data['product_id']),
         "image" => Upload::image($file, "product"), 
         "main" => "false"
      ]);

      Acsn::response("product|gallery-product|{$data['product_id']}");
   }

   public static function changeMainProductImage($data)
   {
      ProductImageAction::updateMainImageToFalse($data['product_id']);

      ProductImageAction::updateMainImagetoTrue($data['product_image_id']);

      Acsn::response("product|gallery-product|{$data['product_id']}");
   }

   public static function dropProductImage($data)
   {
      Image::drop("product", $data['image']); 

      ProductImageAction::delete($data['product_image_id']);

      Acsn::response("product|gallery-product|{$data['product_id']}");
   } 
}