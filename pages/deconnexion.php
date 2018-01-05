<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
  
  <?php
    session_start();
    setcookie('login', '', -1);
    $_COOKIE = array();
  
    session_destroy();

    header('Location: ../index.php');
    exit;
  ?>
  
  <title>Katsudo DM - Deconnexion</title>
</head>

<body>
  Redirection en cours, si vous êtes sur cette page 
  depuis plus de 5 secondes veuillez cliquer
  <a href="../index.php">ici</a>
</body>

</html>
