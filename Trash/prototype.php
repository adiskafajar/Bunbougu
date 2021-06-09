<!-- conditional page -->
<?php
      switch($page)
      {
         case "user":
            switch ($action) 
            {
               case "create_user":
                  User::createUser($data, $file);
                  break;
               case "update_user":
                  User::updateUser($data, $file);
                  break;
               case "delete_user": 
                  User::deleteUser($id);
                  break;
               case "logout": 
                  Auth::logout();
                  break;
            }
         
            switch ($subPage)
            {
               case "create_user":
                  require $getPage;
                  break;
               case "edit_user":
                  $user = User::readUserId($id);
                  require $getPage; 
                  break;
               default:
                  $users = is_null($search) ? User::readUser() : User::searchUser($data);
                  require $getPage;
                  break;
            }
            break;

         case "product":
            switch($action)
            {
               case "create_product": 
                  Product::createProduct($data); 
                  break; 
               case "update_product": 
                  Product::updateProduct($data);
                  break;
               case "delete_product":
                  Product::deleteProduct($id);
                  break;
               case "create_gallery": 
                  Product::createGallery($data, $file); 
                  break;
               case "change_main_gallery": 
                  Product::changeMainGallery($id); 
                  break;
               case "delete_gallery": 
                  Product::deleteGallery($id); 
                  break;
            }

            switch($subPage)
            {
               case "create_product": 
                  $categories = Product::readCategory();
                  $brands = Product::readBrand();
                  require $getPage;
                  break;
               case "edit_product": 
                  $product = Product::readProductId($id);
                  $categories = Product::readCategory(); 
                  $brands = Product::readBrand(); 
                  require $getPage;
                  break;
               case "gallery_product":
                  $mainGallery = Product::readMainGallery($id); 
                  $allGallery = Product::readProductGallery($id);
                  require $getPage; 
                  break;
               default:
                  $products = is_null($search) ? Product::readProduct() : Product::searchProduct($data);
                  require $getPage;
                  break;
            }
            break;

         case "category":
            switch($action)
            {
               case "create_category": 
                  Category::createCategory($data, $file);
                  break;
               case "update_category": 
                  Category::updateCategory($data, $file);
                  break; 
               case "delete_category": 
                  Category::deleteCategory($id);
                  break;
            }
            
            switch($subPage)
            {
               case "create_category":
                  require $getPage;
                  break;
               case "edit_category":
                  $category = Category::readCategoryId($id);
                  require $getPage;
                  break;
               default:
                  $categories = is_null($search) ? Category::readCategory() : Category::searchCategory($data);
                  require $getPage;
                  break;
            }
            break;
            
         case "brand":
            switch($action){
               case "create_brand": 
                  Brand::createBrand($data, $file);
                  break;
               case "update_brand":
                  Brand::updateBrand($data, $file); 
                  break;
               case "delete_brand":
                  Brand::deleteBrand($id);
                  break;
            }

            switch($subPage){
               case "create_brand":
                  require_once $getPage;
                  break;
               case "edit_brand":
                  $brand = Brand::readBrandId($id);
                  require_once $getPage;
                  break;
               default:
                  $brands = is_null($search) ? Brand::readBrand() : Brand::searchBrand($data);
                  require_once $getPage;
                  break;
            }
            break;

         case "transaction":
            switch($action)
            {  
               case "create_transaction": 
                  Transaction::createTransaction($data); 
                  break;
               case "update_transaction"; 
                  Transaction::updateTransaction($data);
                  break;
               case "delete_Transaction"; 
                  Transaction::deleteTransaction($data); 
                  break;
            }

            switch($subPage)
            {
               case "detail_transaction":
                  $transaction = Transaction::readTransactionId($id); 
                  require_once $getPage;
                  break;
               default: 
                  $transactions = Transaction::readTransaction();
                  require_once $getPage;
                  break;
            }
            break; 
         default:
            require $getPage; 
            break;
      }

// conditional access
switch($access)
{
   case "admin": 
      require_once GetFile::{$access}("components", "aside"); 
      require_once GetFile::{$access}("components", "navbar"); 
      require_once GetFile::{$access}($page, $subPage); 
      require_once GetFile::{$access}("components", "footer"); 
      break; 
   case "user": 
      require_once GetFile::{$access}("components", "navbar");
      require_once GetFile::{$access}($page, $subPage);
      require_once GetFile::{$access}("components", "footer");
      break; 
   default: 
      require_once GetFile::{$access}("components", "navbar");
      require_once GetFile::{$access}($page, $subPage);
      require_once GetFile::{$access}("components", "footer");
      break; 
} 

// conditional class Request

public static function user($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      return self::$user;

   } elseif(is_null($subPage)) {
      return self::$user."?page=$page";

   } else {
      return self::$user."?page=$page&subPage=$subPage"; 
   }
}

public static function admin($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      return self::$admin;

   } elseif(is_null($subPage)) {
      return self::$admin."?page=$page";

   } else {
      return self::$admin."?page=$page&subPage=$subPage"; 
   }

}

public static function auth($page)
{
   return "auth.php?page=$page";
}

// conditional class response

public static function user($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      header(self::$user);

   } elseif(is_null($subPage)) {
      header(self::$user."?page=$page");

   } else {
      header(self::$user."?page=$page&subPage=$subPage"); 
   }
}

public static function admin($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      header(self::$admin);

   } elseif(is_null($subPage)) {
      header(self::$admin."?page=$page");

   } else {
      header(self::$admin."?page=$page&subPage=$subPage");  
   }
}

public static function auth($page)
{
   $page ? header(self::$auth."?page=$page") : header(self::$auth);
}

// conditional class getFile

public static function admin($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      return self::$admin."dashboard/dashboard.php";

   } elseif(is_null($subPage)) {
      return self::$admin."$page/$page.php";

   } else {
      return self::$admin."$page/$subPage.php";
   }
}

public static function user($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      return self::$user."home/home.php";

   } elseif(is_null($subPage)) {
      return self::$user."$page/$page.php";

   } else {
      return self::$user."$page/$subPage.php";
   }
}

public static function guest($page, $subPage)
{
   if(is_null($page) && is_null($subPage)){
      return self::$guest."home/home.php"; 

   } elseif(is_null($subPage)) {
      return self::$guest."$page/$page.php";

   } else {
      return self::$guest."$page/$subPage";
   }
}

public static function auth($access, $file)
{
   return self::$auth."$access/$file.php";
}

public static function component($page, $folder, $file)
{
   return self::$components."$page/$folder/$file.php";
}

// run class app

public function run_change()
{
   $no      = null;

   $page    = isset($_GET["page"]) ? $_GET["page"] : BasePage ;
   $subPage = isset($_GET["subPage"]) ? $_GET["subPage"] : $page ;
   $name    = isset($_GET["name"]) ? $_GET["name"] : null ;

   $access  = isset($_SESSION['access']) ? $_SESSION['access'] : BaseAccess; 
   $user    = isset($_SESSION['user'])   ? $_SESSION['user']   : null; 
   $flash   = isset($_SESSION['flash'])  ? $_SESSION['flash']  : null; 
   $file    = isset($_FILES)             ? $_FILES             : null;
   $data    = isset($_POST)              ? $_POST              : null;
   $action  = isset($_POST['action'])    ? $_POST['action']    : null;
   $id      = isset($_POST['id'])        ? $_POST['id']        : null;
   

   new Controller($access, $page, $action, $data, $file, $id); 

   new View($access, $user, $flash, $page, $subPage, $name, $no);
}


