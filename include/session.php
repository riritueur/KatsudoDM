<?php 

  session_start();
  
  if(empty($_COOKIE['login'])) {
    header('Location: http://katsudodm.richard-peres.xyz/');
    exit;
  }
?>