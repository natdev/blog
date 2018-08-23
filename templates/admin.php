<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo BASE_URL."/css/normalize.css"?>">
  <link rel="stylesheet" href="<?php echo BASE_URL."/css/style.css"?>">
  <title><?php echo $title; ?></title>
</head>
<body>
  <header class="header">
    <div class="menuTop">
      <nav class="navbarTop container">
          <ul class="menuTopIN">
            <?php if(!isset($_SESSION['pseudo'])){?>
              <li><a href="<?php echo url("blog/index.php?controller=user&action=connexion");?>">Connexion</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo url("blog/index.php?controller=user&action=deconnexion");?>">Deconnexion</a></li>
            <?php } ?>
            <?php if(isset($_SESSION['acces']) && $_SESSION['acces'] == "administrator" ){?>
              <li><a href="../../admin">Admin</a></li>
              <li><a href="../../">Voir le site</a></li>
            <?php } ?>
          </ul>
      </nav>
    </div>
    <div class="menu">
      <nav class="navbar container">
          <ul class="menuIN">
            <li><a href="../../admin">Tableau de bord</a></li>
            <li><a href="../../admin/categories">Gestion des catégorie</a></li>
            <li><a href="../../admin/users">Gestion des utilisateurs</a></li>
            <li><a href="../../admin/posts">Gestion des articles</a></li>
          </ul>
      </nav>
    </div>
  </header>
  <div class="content">
    <?php echo $content; ?>
  </div>
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>tinymce.init({ selector:'textarea',
  images_upload_handler: function (blobInfo, success, failure) {
   var xhr, formData;
   xhr = new XMLHttpRequest();
   xhr.withCredentials = false;
   xhr.open('POST', 'addpost.php');
   xhr.onload = function() {
     var json;

     if (xhr.status != 200) {
       failure('HTTP Error: ' + xhr.status);
       return;
     }
     json = JSON.parse(xhr.responseText);

     if (!json || typeof json.location != 'string') {
       failure('Invalid JSON: ' + xhr.responseText);
       return;
     }
     success(json.location);
   };
   formData = new FormData();
   formData.append('file', blobInfo.blob(), fileName(blobInfo));
   xhr.send(formData);
 },
  theme: 'modern',
    width: 600,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'

 });</script>
</body>
</html>
