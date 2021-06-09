<?php 

namespace Resources\Logic\Admin; 

use Core\Logic; 
use Helper\Upload; 
use Helper\Image;
use Models\Data\BrandData; 
use Models\Action\BrandAction; 

abstract class BrandLogic extends Logic
{
   private static
      $page     = "brand",
      $location = "location:admin.php?page=brand";

   public static function addBrand($data, $file)
   {
      $data = [
         "brand" => htmlspecialchars($data['brand']),
         "image" => Upload::image($file, self::$page)  
      ];

      BrandAction::create($data); 

      Logic::response("brand");
   }

   public static function changeBrand($data, $file)
   {
      $data = [
         "brand_id" => htmlspecialchars($data['brand_id']),
         "brand"    => htmlspecialchars($data['brand']),
         "imageOld" => htmlspecialchars($data['imageOld']), 
         "image"    => Upload::image($file, self::$page)
      ];

      // $image = !$image ? $data['imageOld'] : $image; 

      !$data["image"] ? $data['image'] = $data['imageOld'] : Image::drop(self::$page, $data['imageOld']);

      BrandAction::update($data);

      Logic::response("brand");
   }

   public static function dropBrand($data, $file)
   {
      $data = BrandData::readBrandById($data['brand_id']);

      Image::drop(self::$page, $data['image']);
      
      BrandAction::delete($data['brand_id']); 

      Logic::response("brand");
   }

   public static function search($data)
   {
      $keyword = htmlspecialchars($data['keyword']); 

      Logic::response("brand|brand|{$keyword}");
   }
}