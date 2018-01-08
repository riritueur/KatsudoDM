<?php

  if($_POST['objet'] != null &&  $_POST['email'] != null && $_POST['nom'] != null && $_POST['prenom'] != null) {
    
  $to      = "riritueur@gmail.com";
  $subject = "[Site] ".$_POST['objet'];
  $message = $_POST['message'];
  $headers = 'From: '. $_POST['email'] .'('.$_POST['nom'].' '.$_POST['prenom'].')'. "\r\n" .
  'Reply-To: '. $_POST['email'] . "\r\n" .
  'X-Mailer: PHP/';
  
  mail($to, $subject, $message, $headers);

  echo '<meta http-equiv="refresh" content="3; URL=http://www.richard-peres.xyz/index.php#contact">';
  echo '<br/><br/><br/><strong style="display: block;text-align:center; font-size: 24px;">Votre message a bien etait envoye.<br/><br/>Vous allez etre redirige vers le site.</strong>';
}
else {
  echo '<br/><br/><br/><strong style="display: block;text-align:center; font-size: 24px;">Erreur : Aucun contenu</strong>';
  echo '<meta http-equiv="refresh" content="2; URL=http://www.richard-peres.xyz/index.php#contact">';
}
?>
