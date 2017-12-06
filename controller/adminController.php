<?php
require '../models/adminModel.php';

echo "j'existe";

function subscribeAction(){

if($_POST){

    explode($_POST);


    if(isset($pseudo) && isset($email) && isset($password)){
      $pseudo           =   htmlspecialchars($pseudo);
      $email            =   htmlspecialchars($email);
      $password         =   htmlspecialchars($passwrord);
      $conf_password    =   htmlspecialchars($conf_password);
      $acces            =   htmlspecialchars($acces);
      $description      =   htmlspecialchars($description);
      $img              =   htmlspecialchars($img);

      if(empty($pseudo)){
        $error_pseudo = "Veuillez ajouter un mot de passe";
        return $error_pseudo;
      }

      if(empty($email)){
        $error_email = "Veuillez ajouter une adresse email";
        return $error_email;
      }

      if(!preg_match('#^[a-z0-9-_.]+@[a-z]{2,}\.[a-z]{2,5}$#',$email)){
      $error_email_format = "Veuillez ajouter un email valide";
      return $error_email_format;
      }

      if(empty($password)){
        $error_password ="Veuillez ajouter un mot de passe";
        return $error_password;
      }

      if(empty($password !== $conf_password)){
        $error_conf_password ="Le mot de passe de confirmation ne correspond pas";
        return $error_conf_password;
      }


    }
    else{
        addUser($pseudo, $email, $passwrord, $acces, $description, $img);
    }
  }

  require '../view/admin/subscribe.php';
}
