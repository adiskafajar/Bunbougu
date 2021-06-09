<?php 

namespace Acsns\Admin; 

use Core\Acsn; 
use Helper\Upload; 

use Models\Data\ProductData;
use Models\Data\ProductImageData;

use Models\Action\ProductAction;
use Models\Action\ProductImageAction; 

abstract class ProductAcsn extends Acsn
{
   public static function addBrand($data)
   {
      ProductAction::create([
         "product"     => htmlspecialchars($data['product']),
         "category_id" => htmlspecialchars($data['category_id']),
         "brand_id"    => htmlspecialchars($data['brand_id']),
         "price"       => htmlspecialchars($data['price']),
         "description" => htmlspecialchars($data["description"]),
         "stock"       => htmlspecialchars($data['stock'])
      ]);

      ProductImageAction::create([
         "product_id" => ProductData::readNewProductId(), 
         "image" => "default.png",
         "main" => "true"
      ]);

      Acsn::response("product");
   }

   public static function changeProduct($data)
   {
      ProductAction::update([
         "product_id"  => htmlspecialchars($data['product_id']),
         "product"     => htmlspecialchars($data['product']),
         "category_id" => htmlspecialchars($data['category_id']),
         "brand_id"    => htmlspecialchars($data['brand_id']),
         "price"       => htmlspecialchars($data['price']),
         "description" => htmlspecialchars($data['description']),
         "stock"       => htmlspecialchars($data['stock'])
      ]);
      
      Acsn::response("product"); 
   }

   public static function dropProduct($data)
   {
      ProductAction::delete($data['product_id']); 
      
      Acsn::response("product"); 
   }

   public static function searchProduct($data, $file)
   {
      $keyword = htmlspecialchars($data['keyword']); 

      Acsn::response("product|product|{$keyword}");
   }
}