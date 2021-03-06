<?php


function addPost($title, $img = NULL, $video = NULL, $content, $id_user){

  $db = dbConnect();

  $addPost = $db->prepare('INSERT INTO posts(title, content, id_user) VALUES(:title, :content, :id_user)');
  $addPost->execute(array(
    'title'    =>     $title,
    'content'  =>     $content,
    'id_user'  =>     $id_user

  ));

  if(isset($img) && $img !== NULL){
    $addImg = $db->prepare('INSERT INTO media(img, id_user) VALUES(:img, :id_user)');
    $addPost->execute(array(
      'img'      =>     $img,
      'id_user'  =>     $id_user

    ));
  }

    if(isset($video) && $video !== NULL){
      $addImg = $db->prepare('INSERT INTO media(video, id_user) VALUES(:video, :id_user)');
      $addPost->execute(array(
        'video'      =>     $video,
        'id_user'    =>     $id_user

      ));

  }

}
