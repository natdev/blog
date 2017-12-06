<section>
  <div class="container">
    <?php
    while($post = $posts->fetch()){

     ?>
     <div class="">
       <h3> <?php  echo $post['title']; ?></h3>
       <p><?php  echo $post['content']; ?></p>
       <span><a href="#">En savoir plus</a></span>
     </div>


    <?php }?>
  </div>
</section>
