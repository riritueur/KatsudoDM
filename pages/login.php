<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
  <title>Katsudo DM - Login</title>

  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Connexion au système</h3>
          </div>
          <div class="panel-body">
            <form role="form">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="admin" name="id" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="password" name="password" type="password" value="">
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button href="index.php" class="btn btn-lg btn-success btn-block" type="submit">Se connecter</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('../include/scripts.php'); ?>

</body>

</html>
