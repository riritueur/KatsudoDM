<!DOCTYPE html>
<html lang="fr">

<head>

  <?php include("../include/meta.php"); ?>

  <title>Kastudo DM - Taxes</title>

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
            <h1 class="page-header">Taxes</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Liste des taxes
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Montant</th>
                      <th>Date d'émission</th>
                      <th>Date de recouvrement</th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <?php
                        $result = $bdd->query("SELECT * FROM Taxe");
                        while($data = $result->fetch()){
                            echo '<tr>
                                        <td>'.$data['type_t'].'</td>'.'
                                        <td>'.$data['montant_t'].' €</td>'.'
                                        <td>'.$data['date_emi_t'].'</td>'.'
                                        <td>'.$data['date_recouv_t'].'</td>'.'
                                        <td>
                                          <button type="button" class="btn btn-default btn-circle"><i class="fa fa-pencil"></i>
                                          </button>
                                          <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalDel" data-id="'. $data['id_t'] .'"  data-nomid="id_t" data-table="Taxe" data-red="taxe.php">
                                            <i class="fa fa-times"></i>
                                          </button>
                                        </td>'.'
                                        </tr>';
                        }
                    ?>
                  </tbody>
                </table>
                <!-- /.table-responsive -->
                <?php include('../include/modal.php');?>
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-info" id="myModalLabel">Ajouter une taxe</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" class="AVAST_PAM_nonloginform" method="post">
                          <label>Type</label>
                          <input class="form-control" name="type" id="type" required/>
                          <label>Montant</label>
                          <input class="form-control" name="montant" id="montant" required/>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                        </form>
                        <?php
                          if(isset($_POST['submit'])){
                               if(is_string($_POST['type']) && strlen($_POST['type'])<21 && preg_match('#^[0-9]+$#',$_POST['montant'])) {
                                   $dateemi = date("Y-m-d H:i:s");
                                   $daterecouv = date("Y-m-d H:i:s", mktime(23, 59, 59, date("m")+1 , date("d"), date("Y")));
                                   echo '
                                   <form id="formT" role="form" method="post" action="ajout.php">
                                      <input type="hidden" name="values" value="(type_t, montant_t, date_emi_t, date_recouv_t)"/>
                                      <input type="hidden" name="table" value="Taxe"/>
                                      <input type="hidden" name="red" value="taxe.php"/>
                                      <input type="hidden" name="a" value="'.$_POST['type'].'"/>
                                      <input type="hidden" name="b" value="'.$_POST['montant'].'"/>
                                      <input type="hidden" name="c" value="'.$dateemi.'"/>
                                      <input type="hidden" name="d" value="'.$daterecouv.'"/>
                                  </form>
                                   <script>document.getElementById("formT").submit();</script>';
                               } else {
                                   echo 'erreur';
                                   $_POST = array();
                               }
                          }
                      ?>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <?php include('../include/btn_add.php');?>
                <br/>
                <h4>
                 Taux de TVA:
                  <?php
                      $result = $bdd->query("SELECT montant_tva FROM TVA where id_tva=1");
                      $data = $result->fetch();
                      echo '<strong>' . $data['montant_tva'].' %<strong/>';
                  ?>
                </h4>
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /#page-wrapper -->

  </div>
  <?php include('../include/scripts.php'); ?>

</body>

</html>
