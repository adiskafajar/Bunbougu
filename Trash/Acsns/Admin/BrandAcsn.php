<?php 

namespace Acsns\Admin; 

use Core\Acsn; 
use Helper\Upload; 
use Helper\Image; 
use Models\Data\BrandData; 
use Models\Action\BrandAction; 

abstract class BrandAcsn extends Acsn
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

      Acsn::response("brand");
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

      Acsn::response("brand");
   }

   public static function dropBrand($data, $file)
   {
      $data = BrandData::readBrandById($data['brand_id']);

      Image::drop(self::$page, $data['image']);
      
      BrandAction::delete($data['brand_id']); 

      Acsn::response("brand");
   }

   public static function search($data)
   {
      $keyword = htmlspecialchars($data['keyword']); 

      Acsn::response("brand|brand|{$keyword}");
   }
}