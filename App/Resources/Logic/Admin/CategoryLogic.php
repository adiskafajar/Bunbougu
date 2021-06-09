<?php 

namespace Resources\Logic\Admin; 

use Core\Logic; 
use Helper\Upload; 
use Helper\Image; 
use Models\Data\CategoryData; 
use Models\Action\CategoryAction; 

abstract class CategoryLogic extends Logic
{
   private static 
      $page = "category";

   public static function addCategory($data, $file)
   {
      $data = [
         "category" => $data['category'],
         "image"    => Upload::image($file, self::$page)    
      ];

      CategoryAction::create($data); 

      Logic::response("category");
   }

   public static function changeCategory($data, $file)
   {
      $data = [
         "category_id" => htmlspecialchars($data['category_id']), 
         "category"    => htmlspecialchars($data['category']), 
         "imageOld"    => htmlspecialchars($data['imageOld']), 
         "image"       => Upload::image($file, self::$page),
      ];

      !$data["image"] ? $data['image'] = $data['imageOld'] : Image::drop(self::$page, $data['imageOld']);

      CategoryAction::update($data);

      Logic::response("category"); 
   }

   public static function dropCategory($data)
   {
      $data = CategoryData::readCategoryById($data["category_id"]);
      
      Image::drop(self::$page, $data['image']);
      
      CategoryAction::delete($data['category_id']);

      Logic::response("category"); 
   }

   public static function search($data)
   {
      $keyword = htmlspecialchars($data['keyword']); 

      Logic::response("category|category|{$keyword}"); 
   }
}