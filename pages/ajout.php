

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
 
  <?php
    
    //echo "INSERT INTO ".$_POST["table"]." ".$_POST["values"]." VALUES (".$values.");";

    if(empty($_POST))
       $vide = true;
    else 
      foreach($_POST as $cle => $value)
          if(empty($value))
              $vide = true;
            
    if(!$vide){
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

        $result = $bdd->query("INSERT INTO ".$_POST["table"]." ".$_POST["values"]." VALUES (".$values.");");

        echo '<h1>Succès</h1>';
    }
    header('Location: '.$_POST["red"]);
    exit;

  ?>

  
  <title>Katsudo DM - Ajout</title>
</head>

<body>
  Supression en cours, si vous êtes sur cette page 
  depuis plus de 5 secondes veuillez cliquer
  <a href="index.php">ici</a>
</body>

</html>
