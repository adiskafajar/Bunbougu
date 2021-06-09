<?php 
   require_once "App/init.php"; 
   session_start();
   
   use Core\Response; 
   use Controllers\Auth\AuthController as Auth; 

   $admin   = isset($_SESSION['admin'])   ? Response::admin(null, null) : null;
   $user    = isset($_SESSION['user'])    ? Response::user(null, null)  : null;
   $flash   = isset($_SESSION['flash'])   ? $_SESSION['flash']          : null; 
   $data    = isset($_REQUEST)            ? $_REQUEST                   : null; 
   $page    = isset($_REQUEST['page'])    ? $_REQUEST['page']           : "login";
   $request = isset($_REQUEST['request']) ? $_REQUEST['request']        : null;
   $action  = isset($_REQUEST['action'])  ? $_REQUEST['action']         : null;
   $getPage = GetFile::auth(GetFile::access(__FILE__), $page); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>auth page</title>
</head>
<body>
   <h1>auth page</h1>

   <?php
      switch($action)
      {
         case "login":
            Auth::login($data); 
            break; 
         case "register":
            Auth::register($data); 
            break;
      }

      switch($page)
      {
         case "register": 
            require $getPage; 
            break;
         default: 
            require $getPage; 
            break;
      }
   ?>
</body>
</html>