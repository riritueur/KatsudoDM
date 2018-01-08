<?php
  
  if($_POST['mail'] != null &&  $_POST['obj'] != null && $_POST['message']) {
    
  $to      = $_POST['mail'];
  $subject = $_POST['obj'];
  $headers = 'From: katsudo@dm.com \r\n' .
  'Reply-To: katsudo@dm.com \r\n' .
  'X-Mailer: PHP \r\n';
    

     $headers  .= 'MIME-Version: 1.0 ' . '\r\n';
     $headers .= 'Content-type: text/html; charset=iso-8859-1 ' . '\r\n';  
    
  $message = '
<html lang="fr">

  <head>
    <meta charset="utf-8">
  </head>

  <body>
    '. $_POST['message'] .'
  </body>

</html>
  
  ';  
  
  echo $message;
  mail($to, $subject, $message, $headers);
  }

  header('Location: http://katsudodm.richard-peres.xyz/pages/facture-client.php');
  exit;

?>
