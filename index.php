<?php
<<<<<<< HEAD
require 'database/bdd.php';
require 'rewrite/rewrite.php';
$template = 'default';
$url = $_SERVER['REQUEST_URI'];


$tab = explode('/',$url);
$sup = array_shift($tab);
$controller = $tab[0];
$action = $tab[1];



$controller= 'controller/'.$controller.'Controller.php';

  if (file_exists($controller)) {

    require $controller;
    $action = $action.'Action';

    if(function_exists($action)){
      $title = $tab[0];
      ob_start();
        $action();
      $content = ob_get_clean();
      require 'templates/'.$template.'.php';
    }
    else {
      echo 'la page n\'existe pas';
=======
  require 'database/bdd.php';
  require 'rewrite/rewrite.php';
  $template = 'default';
  $url = $_SERVER['REQUEST_URI'];
  $tab = explode('/',$url);
  $sup = array_shift($tab);

  if(!empty($tab[0]) && !empty($tab[1]))
  {

    $controller = $tab[0];
    $action = $tab[1];
    $title = $tab[0];

  $controller= 'controller/'.$controller.'Controller.php';

    if (file_exists($controller)) {
   echo $controller;
      require $controller;
      $action = $action.'Action';
        if(function_exists($action)){
          ob_start();
            $action();
          $content = ob_get_clean();
          require 'templates/'.$template.'.php';
        }
        else {
          require "error.php";
        }
>>>>>>> handle 404 error
    }

  }
  else{
    $title = "index";
    require 'controller/indexController.php';
    ob_start();
      indexAction();
    $content = ob_get_clean();
    require 'templates/'.$template.'.php';
  }

  header("HTTP/1.0 404 Not Found");
  require("error.php");
