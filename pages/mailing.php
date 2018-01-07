<?php

  if($_POST['mail'] != null &&  $_POST['id_fac'] != null && $_POST['date'] != null && $_POST['produits'] != null) {
    
  $to      = $_POST['mail'];
  $subject = "Relance Facture impayée KatsudoDM";
  $message = "Merci de bien vouloir régulariser votre facture n°".$_POST['id_fac'] . " d'un montant TTC de " .$_POST['montant']."€ pour le(s) produit(s) suivant(s) : ".$_POST['produits'] . ".<br/>L'échéance de paiement de la facture tompe le : ".$_POST['date'] . " . Au delas de cette date, une pénalité vous sera facturé pour retard de paiement.<br/><br/>Merci de votre compréhension.<br/>Cordialement,<br/>L'équipe KatsudoDM.<br/>katsudo@dm.com<br/>a<br/>a<br/>a<br/>";
  $headers = 'From: katsudo@dm.com \r\n' .
  'Reply-To: katsudo@dm.com \r\n' .
  'X-Mailer: PHP/';
  
  mail($to, $subject, $message, $headers);
  }

  header('Location: http://www.katsudodm.richard-peres.xyz/pages/facture-client.php');
  exit;

?>
