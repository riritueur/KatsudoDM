<?php 

  session_start();
  
  if(empty($_COOKIE['login'])) {
    header('Location: ../index.php');
    exit;
  }
?>