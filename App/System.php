<?php 

// const Config 
require_once "Config/Database.php"; 
require_once "Config/App.php"; 
require_once("Config/Page.php");

// class Core
require_once "Core/App.php";
require_once "Core/Model.php";
require_once "Core/View.php";
require_once "Core/Logic.php";

// class Helper
require_once "Helper/Upload.php";
require_once "Helper/Image.php";
require_once "Helper/Flash.php";
require_once "Helper/Session.php";
require_once "Helper/MixFunction.php";

// class plugin
require_once "Plugin/RajaOngkir.php";

// class Models Action
require_once "Models/Action/BrandAction.php"; 
require_once "Models/Action/CartAction.php"; 
require_once "Models/Action/CategoryAction.php"; 
require_once "Models/Action/ProductAction.php"; 
require_once "Models/Action/ProductImageAction.php"; 
require_once "Models/Action/UserAction.php"; 
require_once "Models/Action/WishlistAction.php";
require_once "Models/Action/PaymentAction.php"; 
require_once "Models/Action/CourierAction.php"; 
require_once "Models/Action/TransactionAction.php"; 
require_once "Models/Action/TransactionDetailAction.php"; 
require_once "Models/Action/AddressAction.php"; 
require_once "Models/Action/ContactAction.php"; 

// class Models Data
require_once "Models/Data/BrandData.php"; 
require_once "Models/Data/CartData.php"; 
require_once "Models/Data/CategoryData.php"; 
require_once "Models/Data/ProductData.php"; 
require_once "Models/Data/ProductImageData.php"; 
require_once "Models/Data/UserData.php"; 
require_once "Models/Data/WishlistData.php"; 
require_once "Models/Data/PaymentData.php"; 
require_once "Models/Data/CourierData.php"; 
require_once "Models/Data/AddressData.php"; 
require_once "Models/Data/TransactionData.php"; 
require_once "Models/Data/TransactionDetailData.php"; 

// class admin Logic
require_once "Resources/Logic/Admin/HomeLogic.php";
require_once "Resources/Logic/Admin/UserLogic.php";
require_once "Resources/Logic/Admin/ProductLogic.php";
require_once "Resources/Logic/Admin/ProductImageLogic.php";
require_once "Resources/Logic/Admin/CategoryLogic.php";
require_once "Resources/Logic/Admin/BrandLogic.php";
require_once "Resources/Logic/Admin/TransactionLogic.php";

// class guest Logic
require_once "Resources/Logic/Guest/AuthLogic.php";
require_once "Resources/Logic/Guest/AboutLogic.php";
require_once "Resources/Logic/Guest/ProductLogic.php";

// class user Logic
require_once "Resources/Logic/User/HomeLogic.php";
require_once "Resources/Logic/User/ProfileLogic.php";
require_once "Resources/Logic/User/ProductLogic.php";
require_once "Resources/Logic/User/CartLogic.php";
require_once "Resources/Logic/User/WishlistLogic.php";
require_once "Resources/Logic/User/CheckoutLogic.php"; 
require_once "Resources/Logic/User/TransactionLogic.php"; 
require_once "Resources/Logic/User/AddressLogic.php"; 
require_once "Resources/Logic/User/ContactLogic.php"; 



// instance class App
new Core\App();


// function classExplode($class){
//    $class = explode("\\", $class); 
//    $class = end($class); 

//    return $class; 
// }

// // class Core 
// spl_autoload_register(function($class){
//    require_once __DIR__. "/Core/". classExplode($class) .".php";
// });

// // class Models 
// spl_autoload_register(function($class){   
//    require_once __DIR__ ."/Models/". classExplode($class) .".php";
// });

// // class Controllers Guest
// spl_autoload_register(function($class){
//    require_once __DIR__. "/Controllers/Guest/". classExplode($class) .".php";
// });

// // class Controllers User
// spl_autoload_register(function($class){
//    require_once __DIR__. "/Controllers/User/". classExplode($class) .".php";
// });

// // class Controllers Admin 
// spl_autoload_register(function($class){
//    require_once __DIR__. "/Controllers/Admin/". classExplode($class) ."lass.php";
// });

// class Controllers Auth

