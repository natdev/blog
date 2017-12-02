<?php
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
    }
  }
