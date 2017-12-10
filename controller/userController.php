<?php
require '../models/userModel.php';


function subscribeAction(){
extract($_POST);
if($_POST){

    if(isset($pseudo) && isset($email) && isset($password)){
      $pseudo           =   htmlspecialchars($pseudo);
      $email            =   htmlspecialchars($email);
      $password         =   htmlspecialchars($password);
      $conf_password    =   htmlspecialchars($conf_password);
      $acces            =   htmlspecialchars($acces);
      $description      =   htmlspecialchars($description);

      if(empty($pseudo)){
        $error_pseudo = "Veuillez ajouter un mot de passe";
        echo $error_pseudo;
      }
      elseif(empty($email)){
        $error_email = "Veuillez ajouter une adresse email";
        echo $error_email;
      }
      elseif(!preg_match('#^[a-z0-9-_.]+@[a-z]{2,}\.[a-z]{2,5}$#',$email)){
      $error_email_format = "Veuillez ajouter un email valide";
      echo $error_email_format;
      }
      elseif(empty($password)){
        $error_password ="Veuillez ajouter un mot de passe";
        echo $error_password;
      }
      elseif($password !== $conf_password){
        $error_conf_password ="Le mot de passe de confirmation ne correspond pas";
        echo $error_conf_password;
      }
      else{
          $password = password_hash($password,PASSWORD_DEFAULT);
          addUser($pseudo, $email, $password, $acces, $description);
      }
    }

  }

  require '../view/user/subscribe.php';
}


function connexionAction(){

  extract($_POST);
  if($_POST){

      if(isset($pseudo) && isset($password)){
        $pseudo           =   htmlspecialchars($pseudo);
        $password         =   htmlspecialchars($password);

        if(empty($pseudo)){
          $error_pseudo = "Veuillez ajouter un mot de passe";
          echo $error_pseudo;
        }
        elseif(empty($password)){
          $error_password ="Veuillez ajouter un mot de passe";
          echo $error_password;
        }
        else{


          $_SESSION = connexion($pseudo,$password);
          $_SESSION;
          header('Location:../user/profile/'.$_SESSION['id']);
         }
      }

    }

  require '../view/user/connexion.php';
}

function deconnexionAction(){
  if(isset($_SESSION)){
    session_destroy();
      header('Location:../index/index');
  }
}


function profileAction(){

  require '../view/user/profile.php';
}
