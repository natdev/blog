<?php
while($post = $posts->fetch()){

 ?>

<p> <?php  echo $post['title']; ?></p>

<?php }?>
