<?php

 function url($url){

  if(preg_match('#^[a-z-]+/[a-z]+\.php\?controller=([a-z]+)&action=([a-z]+)#',$url))
    {

        $rewrite = preg_replace('#^[a-z-]+/[a-z]+\.php\?controller=([a-z]+)&action=([a-z]+)#','../../$1/$2',$url);

         return $rewrite;

     }

   }
