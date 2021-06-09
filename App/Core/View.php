<?php 

namespace Core; 


class View extends App
{
   private 
      $vendor = "App/Resources",
      $access = BaseAccess, 
      $user   = BaseUser,
      $view   = BaseView, 
      $page   = BasePage, 
      $name   = null,
      $id     = null, 
      $flash  = null, 
      $no     = null;

   private function request($route)
   {
      return BaseApp.App::route($route); 
   }

   public function __construct()
   {
      $this->access = isset($_SESSION['access']) ? $_SESSION['access'] : $this->access;   
      $this->user   = isset($_SESSION['user'])   ? $_SESSION['user']   : $this->user; 
      $this->flash  = isset($_SESSION['flash'])  ? $_SESSION['flash']  : $this->flash; 
      $this->view   = isset($_GET['main'])       ? $_GET['main']       : $this->view; 
      $this->page   = isset($_GET['page'])       ? $_GET["page"]       : $this->view; 
      $this->name   = isset($_GET['name'])       ? $_GET['name']       : $this->name; 
      $this->id     = isset($_GET['name'])       ? $_GET['name']       : $this->id;
      
      $this->run();
   }

   private function run()
   {
      $this->template("head");  
      
      $this->{$this->access}(); 

      $this->template("foot"); 
   }

   private function guest()
   {
      $this->template("header");

      $this->page();
      
      $this->template("footer"); 
   }

   private function user()
   {
      $this->template("header");

      $this->page();
      
      $this->template("footer"); 
   }

   private function admin()
   {
      echo "<div class=\"flex\">";
      
      $this->template("aside-admin"); 

      $this->page();

      echo "</div>";
   }

   private function stocker()
   {

   }

   private function transtraktor()
   {
      
   }

   private function page()
   {
      $view = ucfirst($this->view);

      $page = "{$this->vendor}/View/{$this->access}/{$view}View/{$this->page}.php"; 
      
      require_once file_exists($page) ? $page : $this->error("file_notfound");
   }
   
   private function component($component)
   {
      $view = ucfirst($this->view);

      require_once "{$this->vendor}/Component/{$this->access}/{$view}Component/{$component}.php"; 
   }

   private function template($template)
   {
      require_once "{$this->vendor}/Template/{$template}.php"; 
   }

   private function error($page)
   {
      return "{$this->vendor}/View/Error/{$page}.php"; 
   }
}