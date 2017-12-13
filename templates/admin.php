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
            <li><a href="../../admin/categories">Gestion des catégories</a></li>
            <li><a href="../../admin/users">Gestion des utilisateurs</a></li>
            <li><a href="../../admin/posts">Gestion des articles</a></li>
          </ul>
      </nav>
    </div>
  </header>
  <div class="content">
    <?php echo $content; ?>
  </div>
</body>
</html>
