<?php

  if($_POST['mail_rel'] != null &&  $_POST['ref_fac'] != null && $_POST['date_rel'] != null && $_POST['produits_rel'] != null && $_POST['montant_rel'] != null) {
    
  $to      = $_POST['mail_rel'];
  $subject = "Relance Facture impayée KatsudoDM";
  $message = "Merci de bien vouloir régulariser votre facture n° ".$_POST['ref_fac'] . " d'un montant TTC de " .$_POST['montant_rel']."€ pour le(s) produit(s) suivant(s) : ".$_POST['produits_rel'] . ".<br/>L'échéance de paiement de la facture tompe le : ".$_POST['date_rel'] . " . Au delà de cette date, une pénalité vous sera facturé pour retard de paiement.<br/><br/>Merci de votre compréhension.<br/>Cordialement,<br/>L'équipe KatsudoDM.<br/>katsudo@dm.com<br/>a<br/>a<br/>a<br/>";
  $headers = 'From: katsudo@dm.com \r\n' .
  'Reply-To: katsudo@dm.com \r\n' .
  'X-Mailer: PHP/';
  
  mail($to, $subject, $message, $headers);
  }

  header('Location: http://www.katsudodm.richard-peres.xyz/pages/facture-client.php');
  exit;

?>
