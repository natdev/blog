<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,900" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/normalize.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title><?php echo $title; ?></title>
</head>
<body>
  <header class="header">
    <div class="menuTop">
      <nav class="navbarTop container">
          <ul class="menuTopIN">
            <li><a href="<?php echo url("blog/index.php?controller=user&action=subscribe");?>">Inscription</a></li>
            <li><a href="<?php echo url("blog/index.php?controller=user&action=connexion");?>">Connexion</a></li>
          </ul>
      </nav>
    </div>
    <div class="menu">
      <nav class="navbar container">
          <ul class="menuIN">
            <li><a href="<?php echo url("blog/index.php?controller=index&action=index");?>">Accueil</a></li>
              <li><a href="#">Web Dev</a></li>
              <li><a href="#">Robotique</a></li>
              <li><a href="#">Jeux Video</a></li>
              <li><a href="#">Contact</a></li>
            <li><form id="rechercher"><input type="text" placeholder="Chercher un article"><input type="image" src="../public/img/loupe.png"></form></li>
          </ul>
      </nav>
    </div>
    <?php
    if((isset($tab[1]) && $tab[1] == 'index') || $tab[0] == "" ): ?>
    <div class="slider">

    </div>
  <?php endif;?>
  </header>
  <div class="content">
    <?php echo $content; ?>
  </div>
</body>
</html>
