<?php

function addUser($pseudo, $email, $password, $description){

  $db = dbConnect();

  $addUsers = $db->prepare('INSERT INTO users(pseudo, email, password, description) VALUES(:pseudo, :email, :password, :description)');
  $addUsers->execute(array(
    'pseudo'       =>     $pseudo,
    'email'        =>     $email,
    'password'     =>     $password,
    'description'  =>     $description

  ));

  /*if(isset($img) && $img !== NULL){
    $addImg = $db->prepare('INSERT INTO media(img, id_user) VALUES(:img, :id_user)');
    $addPost->execute(array(
      'img'      =>     $img,
      'id_user'  =>     $id_user

    ));
  }*/
}

function connexion($pseudo,$password){


$db = dbConnect();

$donnee = $db->prepare("SELECT id, pseudo, description, acces, password FROM users WHERE pseudo = :pseudo");
$donnee->execute(array(
  'pseudo' => $pseudo
));

$user = $donnee->fetch();
if(!password_verify($password, $user['password'])){

$error_pwd = 'Vous avez rentrer un mauvais mot de passe';

return $error_pwd;
}
elseif ($user['pseudo'] !== $pseudo) {

  $error_ps = 'Le pseudo utilisé n\'existe pas';

  return $error_ps;
}
else {

  $_SESSION['id']       =  $user['id'];
  $_SESSION['pseudo']   =  $user['pseudo'];
  $_SESSION['acces']    =  $user['acces'];
  return $_SESSION;

}
}
