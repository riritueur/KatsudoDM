<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
  
  <?php
    
    if(!empty($_POST['id']) && !empty($_POST['nomid']) 
       && !empty($_POST['table']) && !empty($_POST['red'])) {
      
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
