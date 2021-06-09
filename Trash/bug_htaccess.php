<?php 

// new App(); 

// $page    = isset($_GET["page"]) ? $_GET["page"] : BasePage ;
// $subPage = isset($_GET["subPage"]) ? $_GET["subPage"] : $page ;
// $name    = isset($_GET["name"]) ? $_GET["name"] : null ;

// $no      = null;
// $access  = isset($_SESSION['access']) ? $_SESSION['access'] : BaseAccess; 
// $user    = isset($_SESSION['user'])   ? $_SESSION['user']   : null; 
// $flash   = isset($_SESSION['flash'])  ? $_SESSION['flash']  : null; 
// $file    = isset($_FILES)             ? $_FILES             : null;
// $data    = isset($_POST)              ? $_POST              : null;
// $action  = isset($_POST['action'])    ? $_POST['action']    : null;

// var_dump($page); 
// echo "<br>"; 
// var_dump($subPage); 
// echo "<br>"; 
// var_dump($name); 
// echo "<br>"; 
// var_dump($access); 



// require_once View::template($page, $subPage, "head");  
// require_once View::component($access, $page, $subPage, "navbar"); 
// require_once View::component($access, $page, $subPage, "aside"); 
// require_once View::page($access, $page, $subPage); 
// require_once View::component($access, $page, $subPage, "footer"); 
// require_once View::template($page, $subPage, "foot"); 
// echo "<br>". View::page($access, $page, $subPage); 


// parse url from request get url

// public function parseURL($url)
// {
//    $url = rtrim($url, '/'); 
//    $url = filter_var($url, FILTER_SANITIZE_URL); 
//    $url = explode("/", $url); 

//    if(isset($url[0])){
//       $this->page = $url[0]; 
//    }  

//    if(isset($url[1])){
//       $this->subPage = ($url[1]); 
//    } else {
//       $this->subPage = ($url[0]);
//    }

//    if(isset($url[2])){
//       $this->name = $url[2]; 
//    } else {
//       $this->name = null; 
//    }
// }
