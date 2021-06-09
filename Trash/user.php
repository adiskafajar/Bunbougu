<?php 
   require_once "App/init.php"; 
   session_start();

   use Core\Response;
   use Controllers\Auth\AuthController     as Auth; 
   use Controllers\User\ProfileController  as Profile; 
   use Controllers\User\CatalogController  as Catalog; 
   use Controllers\User\CartController     as Cart;
   use Controllers\User\WishlistController as Wishlist;

   $user    = isset($_SESSION['user'])    ? $_SESSION['user']           : null; 
   $admin   = isset($_SESSION['admin'])   ? Response::admin(null, null) : null;
   $flash   = isset($_SESSION['flash'])   ? $_SESSION['flash']          : null; 
   $file    = isset($_FILES)              ? $_FILES                     : null; 
   $data    = isset($_POST)               ? $_POST                      : null; 
   $action  = isset($_POST['action'])     ? $_POST['action']            : null; 
   $page    = isset($_GET['page'])        ? $_GET['page']               : "home";  
   $request = isset($_GET['request'])     ? $_GET['request']            : $page; 
   $id      = isset($_REQUEST['id'])      ? $_REQUEST['id']             : null; 
   $search  = isset($_REQUEST['search'])  ? $_REQUEST['search']         : null; 
   $access  = isset($_REQUEST['access'])  ? $_REQUEST['access']         : "user"; 
   $getPage = GetFile::user($access, $page, $request); 
   $no      = null; 
   var_dump($access); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   <title>user page</title>
</head>
<body>
   <nav class="text-center">
      <a class="inline-block px-5 py-3 bg-blue-300"href="<?= Request::$user ?>">home</a>
      <a class="inline-block px-5 py-3 bg-blue-300"href="<?= Request::user("catalog", false) ?>">catalog</a>
      <?php if ( $user ) : ?>
         <a class="inline-block px-5 py-3 bg-blue-300"href="<?= Request::user("profile", false) ?>">profile</a>
         <a class="inline-block px-5 py-3 bg-blue-300"href="<?= Request::user("cart", false) ?>">cart</a>
         <a class="inline-block px-5 py-3 bg-blue-300"href="<?= Request::user("wishlist", false) ?>">wishlist</a>
         <a class="inline-block px-5 py-3 bg-blue-300"href="<?= Request::user("checkout", false) ?>">checkout</a>
      <?php endif ;?>
      <?php if ( $user ) : ?>      
         <form action="<?= Request::user('profile', false) ?>" method="post" class="inline-block">
            <input type="hidden" name="action" value="logout">
            <button class="inline-block px-5 py-3 bg-blue-300" type="submit">Logout</button>
         </form>
      <?php else : ?>
         <a class="inline-block px-5 py-3 bg-blue-300" href="<?= Request::$auth ?>">Login</a>
      <?php endif ;?>
   </nav>

   <?php 
      switch($page)
      {
         case "profile": 
            switch($action)
            {
               case "update_profile": 
                  Profile::updateProfile($data, $file); 
                  break; 
               case "logout":
                  Auth::logout();
                  break; 
            }
            
            switch($request) 
            {
               case "edit_profile": 
                  $user = Profile::readUserId($user);
                  require $getPage; 
                  break;
               default: 
                  $user = Profile::readUserId($user); 
                  require $getPage; 
                  break; 
            }
            break;

         case "catalog": 
            switch($action)
            {
            }

            switch($request)
            {
               case "category": 
                  $categories = Catalog::readCategory(); 
                  require $getPage; 
                  break; 
               case "brand": 
                  $brands = Catalog::readBrand(); 
                  require $getPage; 
                  break;  
               default:  
                  switch($action)
                  {
                     case "readProductByCategory": 
                        $products = Catalog::readProductByCategory($id);
                        break; 
                     case "readProductByBrand": 
                        $products = Catalog::readProductByBrand($id);
                        break; 
                     default: 
                        $products = Catalog::readProduct();
                        break; 
                  }
                  $loveProduct = Catalog::readLoveProduct($user); 
                  require $getPage; 
                  break;
            }
            break;

         case "cart": 
            switch($action)
            {
               case "addCart": 
                  Cart::addCart($data); 
                  break;
               case "dropCart": 
                  Cart::dropCart($id); 
                  break;
            }

            switch($request)
            {
               default:
                  $carts = Cart::showCart($user);
                  require $getPage;
                  break;
            }
            break;

         case "wishlist": 
            switch($action)
            {
               case "addWishlist":
                  Wishlist::addWishlist($data, $page); 
                  break; 
               case "dropWishlist":
                  Wishlist::dropWishlist($data, $page); 
                  break;  
            }

            switch($request)
            {
               default: 
                  $wishlists = Wishlist::showWishlist($user);
                  require $getPage; 
                  break; 
            }
            break;

         case "checkout": 
            switch($action)
            {

            }

            switch($request)
            {
               default: 
                  require $getPage; 
                  break; 
            }
            break;
         default: 
            require GetFile::user("user", "home", "home"); 
      }
   ?>
</body>
</html>