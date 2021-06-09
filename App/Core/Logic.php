<?php 

namespace Core; 

use Core\App; 

class Logic extends App
{
   private 
      $vendor = "resources\Logic",
      $access = BaseAccess, 
      $logic  = BaseLogic, 
      $user   = BaseUser, 
      $class  = null,
      $method = null, 
      $data   = null,
      $file   = null;

   public function response($route)
   {
      header("location:".BaseApp.App::route($route));
   }

   public function __construct()
   {
      $this->access = isset($_SESSION['access']) ? $_SESSION['access'] : $this->access; 
      $this->user   = isset($_SESSION['user'])   ? $_SESSION['user']   : $this->user;
      $this->logic  = isset($_GET['main'])       ? $_GET['main']       : $this->logic; 
      $this->method = isset($_POST['action'])    ? $_POST['action']    : $this->method; 
      $this->data   = isset($_POST)              ? $_POST              : $this->data; 
      $this->file   = isset($_FILES)             ? $_FILES             : $this->file; 
      
      $this->run(); 
   }

   private function run()
   {
      $vendor       = ucfirst($this->vendor); 
      $access       = ucfirst($this->access); 
      $logic        = ucfirst($this->logic); 
      $this->class  = "{$vendor}\\{$access}\\{$logic}Logic"; 

      return $this->class::{$this->method}($this->data, $this->file); 
   }
}