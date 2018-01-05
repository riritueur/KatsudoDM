<?php
	try{
		$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u178917848_katsu;charset=utf8', 'u178917848_kuser', 'password');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	if(is_string($_POST['nom']) && strlen($_POST['nom'])<51 && is_string($_POST['prenom']) && strlen($_POST['prenom'])<51 && is_string($_POST['adresse']) && strlen($_POST['nom'])<201 && is_string($_POST['tel']) && strlen($_POST['tel']) == 10 && preg_match("#[0-9]{10}#", $_POST['tel']) && is_string($_POST['mail']) && strlen($_POST['mail']) < 51 && preg_match('#^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$#',trim($_POST['mail'])) && is_string($_POST['fonction']) && strlen($_POST['fonction']) < 51){
		$result = $bdd->query("INSERT INTO Salarie (nom_s, prenom_s, adresse_s, tel_s, email_s, fonction_s, salaire_net_s) VALUES ('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['adresse']."', '".$_POST['tel']."', '".$_POST['mail']."', '".$_POST['fonction']."', '".$_POST['salaire']."');");
		$data = $result->fetch();
		echo '<h1>Succès</h1>';
		header('Location: employe.php');
		exit;
	}
	else{
		echo '<h1>Erreur</h1>';
		header('Location: employe.php');
		exit;
	}
		
?>