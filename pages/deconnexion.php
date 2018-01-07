<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
  
  <?php
    session_start();
    unset($_COOKIE['login']);
    setcookie('login', null, -1, '/');
    //$_SESSION = array();
  
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
