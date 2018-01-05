<!DOCTYPE html>
<html lang="fr">

<head>

  
  <?php include("../include/meta.php"); ?>
  <title>Katsudo DM - Client</title>

  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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

  <div id="wrapper">

    <?php include("../include/nav.php"); ?>

    <?php
        try{
            $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u178917848_katsu;charset=utf8', 'u178917848_kuser', 'password');
        }
        catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }
    ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clients</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des clients
                        </div>
                      
                      
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $bdd->query("SELECT * FROM Client");
                                    while($data = $result->fetch()){
                                        echo '<tr>
																							<td>'.$data['Nom_c'].'</td>'.'
																							<td>'.$data['Prenom_c'].'</td>'.'
																							<td>'.$data['Adresse_c'].'</td>'.'
																							<td>'.$data['Tel_c'].'</td>'.'
																							<td>'.$data['Email_c'].'</td>'.'
																							<td>
																									<button type="button" class="btn btn-default btn-circle">
																											<i class="fa fa-pencil"></i>
																									</button>
																									<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalDel" data-id="'. $data['Id_c'] .'"  data-nomid="Id_c" data-table="Client" data-red="client.php">
																											<i class="fa fa-times"></i>
																									</button>
																							</td>'.'
																							</tr>';
                                    }
                                ?>
                                <?php include('../include/modal.php');?>  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                          <?php include('../include/btn_add.php');?>  
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.col-lg-12 -->
        <!-- /.row -->
      <!-- /#page-wrapper -->

  </div>
  <?php include('../include/scripts.php'); ?>

</body>
</html>
