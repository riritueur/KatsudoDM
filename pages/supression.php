<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
 
  <?php
  
    //echo 'DELETE FROM '. $_POST['table'] .' WHERE '. $_POST['nomid'] .' = '. $_POST['id'];
  
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
        catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }

        $result = $bdd->query('DELETE FROM '. $_POST['table'] .' WHERE '. $_POST['nomid'] .' = '. $_POST['id'].'');  
        
    }
    header('Location: '.$_POST['red']);
    exit;
  ?>
  
  <title>Katsudo DM - Supression</title>
</head>

<body>
  Supression en cours, si vous êtes sur cette page 
  depuis plus de 5 secondes veuillez cliquer
  <a href="index.php">ici</a>
</body>

</html>
