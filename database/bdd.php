<?php

function dbConnect(){

  try {

    $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


  } catch (Exception $e) {
    die('Error:'.$e->getMessage());
  }

return $bdd;
}
