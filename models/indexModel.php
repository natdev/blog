<?php

require 'database/bdd.php';


function getLastPost(){

   $db = dbConnect();

   $posts = $db->query('SELECT * FROM posts');

   return $posts;

}
