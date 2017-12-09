<?php

function addUser($pseudo, $email, $password, $acces, $description){

  $db = dbConnect();

  $addUsers = $db->prepare('INSERT INTO users(pseudo, email, password, acces, description) VALUES(:pseudo, :email, :password, :acces, :description)');
  $addUsers->execute(array(
    'pseudo'       =>     $pseudo,
    'email'        =>     $email,
    'password'     =>     $password,
    'acces'        =>     $acces,
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

$donnee = $db->prepare("SELECT id, pseudo, description, password FROM users WHERE pseudo = :pseudo");
$donnee->execute(array(
  'pseudo' => $pseudo
));

$donnee = $donnee->fetch();
if(!password_verify($password, $donnee['password'])){

$error_pwd = 'Vous avez rentrer un mauvais mot de passe';

return $error_pwd;
}
elseif ($donnee['pseudo'] !== $pseudo) {

  $error_ps = 'Le pseudo utilisé n\'existe pas';

  return $error_ps;
}
else {
  extract($donnee);
  session_start();

  $_SESSION['id']       =  $id;
  $_SESSION['pseudo']   =  $pseudo;

  header('Location:../user/profile');
}
}
