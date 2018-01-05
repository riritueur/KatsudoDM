<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
  <title>Katsudo DM - Deconnexion</title>

  <meta http-equiv="refresh" content="0;url=pages/index.php">
  
  <script language="javascript">
    window.location.href = "pages/index.php"
  </script>
</head>

<body>
  
  <?php
  
  session_start();
  
  setcookie('login', NULL, -1);
  $_SESSION = array();
  session_destroy();

  
  ?>
  
  Redirection en cours, si vous êtes sur cette page 
  depuis plus de 5 secondes veuillez cliquer
  <a href="../index.php">ici</a>
</body>

</html>
