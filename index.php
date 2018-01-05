<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('include/meta.php'); ?>
  <title>Katsudo DM - Login</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  
  <?php
  
  session_start();
  
  if(!empty($_COOKIE['login'])) {
    header('Location: http://katsudodm.richard-peres.xyz/pages/');
    exit;
  }
    
  if(!empty($_POST['id']) && !empty($_POST['id'])) {
      $signin = false;
      
      try{
          $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u178917848_katsu;charset=utf8', 'u178917848_kuser', 'password');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }
      $result = $bdd->query("SELECT * FROM Utilisateur");
      while($data = $result->fetch()){
        if($data['id_user'] == $_POST['id'] 
           && $data['pass_user'] == $_POST['pass']) {
          $signin = true;
        }
  
      }
      
      if($signin) {
  
        setcookie('login',$_POST['id'],time()+1800); 
        
        header('Location: http://katsudodm.richard-peres.xyz/pages/index.php');
        exit;
      }
      else {
        echo '
            <div class="container">
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title text-center"><strong>Connexion au système</strong></h3>
                    </div>
                    <div class="panel-body">
                      <form role="form" method="post">
                      <br/>
                        <fieldset>
                          <div class="form-group input-group has-error">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input class="form-control" placeholder="admin" name="id" type="text" autofocus>
                          </div>
                          
                          <br/>

                          <div class="form-group input-group has-error">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" placeholder="password" name="pass" type="password" value="">
                          </div>
                          
                          <div class="text-danger text-center">
                          <br/>
                          <i class="fa fa-times"></i><strong>
                            Identifiant ou mot de passe incorrect. Veuillez réessayer.<br/><br/>
                            </strong>
                          </div>

                          <!-- Change this to a button or input when using this as a form -->
                          <button href="index.php" class="btn btn-lg btn-success btn-block" type="submit">Se connecter</button>
                        </fieldset>
                      </form>
                    </div>
                  </div>
                </div>';
      }
    } else {
    
    echo '
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title text-center"><strong>Connexion au système</strong></h3>
                </div>
                <div class="panel-body">
                  <form role="form" method="post">
                  <br/>
                    <fieldset>
                      <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" placeholder="admin" name="id" type="text" autofocus>
                      </div>
                      
                      <br/>
                      
                      <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" placeholder="password" name="pass" type="password" value="">
                      </div>
                      <br/>
                      <!-- Change this to a button or input when using this as a form -->
                      <button href="index.php" class="btn btn-lg btn-success btn-block" type="submit">Se connecter</button>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>';
  
  }
  
  
      
          
        
    echo '
    </div>
    
  </div>';
  ?>
  <?php include('include/scripts.php'); ?>
</body>

</html>
