<?php
	try{
		$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u178917848_katsu;charset=utf8', 'u178917848_kuser', 'password');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	$values = "'".$_POST["a"]."'";
	foreach($_POST as $cle => $value){
		if(strlen($cle) == 1){
			if($cle != "a"){
				$values = $values.", '".$value."'";
			}
		}
	}
	echo "INSERT INTO ".$_POST["table"]." ".$_POST["values"]." VALUES (".$values.");";
	$result = $bdd->query("INSERT INTO ".$_POST["table"]." ".$_POST["values"]." VALUES (".$values.");");
	$data = $result->fetch();
		echo '<h1>Succès</h1>';
		header('Location: '.$_POST["red"]);
		exit;
	
?>