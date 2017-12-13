<?php
require '../models/adminModel.php';


function adminAction(){
  require '../view/admin/admin.php';
}

function categoriesAction(){
  require '../view/admin/categories.php';
}

function addcategorieAction(){
  require '../view/admin/addcategorie.php';
}

function editcategorieAction(){
  require '../view/admin/editcategorie.php';
}


function usersAction(){
  require '../view/admin/users.php';
}

function adduserAction(){
  require '../view/admin/adduser.php';
}

function edituserAction(){
  require '../view/admin/edituser.php';
}

function postsAction(){
  require '../view/admin/posts.php';
}

function addpostAction(){
  require '../view/admin/addpost.php';
}

function editpostAction(){
  require '../view/admin/editpost.php';
}
