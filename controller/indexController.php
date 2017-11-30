<?php
require 'models/indexModel.php';


function indexAction(){
  $posts = getLastPost();

  require 'view/index/index.php';
}
