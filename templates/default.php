<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $_GET['controller']; ?></title>
</head>
<body>
  <h1>Hello World</h1>
  <a href="<?php echo url("blog/index.php?controller=index&action=index");?>">accueil</a>
<?php echo $content; ?>
</body>
</html>