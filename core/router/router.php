<?php
session_start();
$template = 'default';
$url = $_SERVER['REQUEST_URI'];


$tab = explode('/',$url);
$sup = array_shift($tab);
print_r($tab);

if(!empty($tab[0]) && !empty($tab[1]))
{

  $controller = $tab[0];
  $action = $tab[1];
  $title = $tab[1];

$controller= '../controller/'.$controller.'Controller.php';

if (file_exists($controller)) {

    require $controller;
    $action = $action.'Action';
      if(function_exists($action)){
        ob_start();
        $action();

        $content = ob_get_clean();




        if($controller == '../controller/adminController.php'){
              require '../templates/admin.php';
        }
        else{
            require '../templates/'.$template.'.php';
        }
    

      }
      else {
          require '../error.php';
      }

  }
}
else{

$controller = $tab[0];

if($controller  == 'index' || $controller ==''){
  $title = 'index';
  require '../controller/indexController.php';
  ob_start();
    indexAction();
  $content = ob_get_clean();
  require '../templates/'.$template.'.php';
}
elseif($controller  == 'contact'){
  $title = $controller;
  require '../controller/'.$controller.'Controller.php';
  ob_start();
    contactAction();
  $content = ob_get_clean();
  require '../templates/'.$template.'.php';
}
elseif($controller  == 'admin'){
  $title = $controller;
  $template = $controller;
  require '../controller/'.$controller.'Controller.php';
  ob_start();
    adminAction();
  $content = ob_get_clean();
  require '../templates/'.$template.'.php';
}
else{
  require '../error.php';
}
}
