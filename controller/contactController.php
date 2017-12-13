<?php


function contactAction(){
  if($_POST){
    $gresp = $_POST['g-recaptcha-response'];
    extract($_POST);
    if(isset($full_name) && isset($email) && isset($message) && isset($subject) && isset($gresp)){
      if(empty($full_name)){
        $error_name = "Veuillez ajouter votre nom";
        return $error_name;
      }
      elseif(!preg_match('#^[a-z0-9-_.]+@[a-z]{2,}\.[a-z]{2,5}$#',$email)){
      $error_email_format = "Veuillez ajouter un email valide";
      return $error_email_format;
      }
      elseif(empty($email)){
        $error_email = "Veuillez ajouter votre email";
        return $error_email;
      }
      elseif(empty($message)){
        $error_message ="Veuillez ajouter un message";
        return $error_message;
      }
      elseif(empty($subject)){
        $error_objet ="Veuillez ajouter un objet";
        return $error_objet;
      }
      else{
        $secretKey = "6LdGvDwUAAAAAMAnf1OWNsLeq9xXtlnGa90UffJW";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$gresp."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
          if(intval($responseKeys["success"]) !== 1) {
              echo '<h2>Nous n\' acceptons les robots</h2>';
          }
          else{
          $to ='dordonne.nathanael@gmail.com';
          $subject = $subject;
          $message = $message;
          echo $message;
          $headers = 'From:'.$email.'Reply-To:'.$email;

          mail($to, $subject, $message, $headers);

          echo'mail ok';
        }
      }
    }
  }
  require('../view/contact/contact.php');
}
