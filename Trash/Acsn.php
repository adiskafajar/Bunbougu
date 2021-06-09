<?php 

namespace Core; 

use Core\App; 

class Acsn extends App
{
   private 
      $vendor = "acsns",
      $access = BaseAccess, 
      $acsn   = BaseAcsn, 
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
      $this->acsn   = isset($_GET['main'])       ? $_GET['main']       : $this->acsn; 
      $this->method = isset($_POST['action'])    ? $_POST['action']    : $this->method; 
      $this->data   = isset($_POST)              ? $_POST              : $this->data; 
      $this->file   = isset($_FILES)             ? $_FILES             : $this->file; 
      
      $this->run(); 
   }

   private  function run()
   {
      $this->class()::{$this->method}($this->data, $this->file); 
   }

   private function class()
   {
      $vendor = ucfirst($this->vendor); 
      $access = ucfirst($this->access); 
      $acsn   = ucfirst($this->acsn); 
      $class  = "{$vendor}\\{$access}\\{$acsn}Acsn"; 

      return $class; 
   }
}