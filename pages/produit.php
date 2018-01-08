<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("../include/meta.php"); ?>
  <title>Katsudo DM - Produits</title>

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
        catch (Exception $e)
        {
    die('Erreur : ' . $e->getMessage());
        }
    ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Produits</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Liste des produits
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Référence</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Prix</th>
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
                        $result = $bdd->query("SELECT * FROM Produit");
                        while($data = $result->fetch()){
                            echo '<tr>
                                  <td>'.$data['ref_p'].'</td>'.'
                                  <td>'.$data['desc_p'].'</td>'.'
                                  <td><img height=50px src="'.$data['image_p'].'" alt='.$data['ref-p'].'/></td>'.'
                                  <td>'.$data['prix_ht'].' €</td>'.'
                                  <td>
                                      <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalDel" data-id="\''. $data['ref_p'] .'\'"  data-nomid="ref_p" data-table="Produit" data-red="produit.php">
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
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-info" id="myModalLabel">Ajouter un produit</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" class="AVAST_PAM_nonloginform" method="post" enctype="multipart/form-data">
                          <label>Référence</label>
                          <input class="form-control" name="ref" id="ref" required/>
                          <label>Description</label>
                          <input class="form-control" name="desc" id="desc" required/>
                          <label>Image</label>
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                          <p class="help-block">(Fichier PNG de moins de 10mo uniquement)</p>
                          <input type="file" name="img" id="img" required/>
                          <label>Prix HT</label>
                          <input class="form-control" name="prix" id="prix" required/>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                        </form>
                        <?php
                          if(isset($_POST['submit'])){
                              $ext = array('png');
                              $ext_upload = strtolower(substr(strrchr($_FILES['img']['name'],'.'),1));
                              if(in_array($ext_upload,$ext) && $_FILES['img']['size'] < 1000000){
                               if(is_string($_POST['ref']) && strlen($_POST['ref'])<11 && is_string($_POST['desc']) && strlen($_POST['desc'])<251 && preg_match('#^[0-9]+$#',$_POST['prix'])){
                                   $resultat = move_uploaded_file($_FILES['img']['tmp_name'],"../produits/".$_POST['ref'].".png");
                                   echo '
                                       <form id="formT" role="form" method="post" action="ajout.php">
                                          <input type="hidden" name="values" value="(ref_p, desc_p, image_p, prix_ht)"/>
                                          <input type="hidden" name="table" value="Produit"/>
                                          <input type="hidden" name="red" value="produit.php"/>
                                          <input type="hidden" name="a" value="'.$_POST['ref'].'"/>
                                          <input type="hidden" name="b" value="'.$_POST['desc'].'"/>
                                          <input type="hidden" name="c" value="http://katsudodm.richard-peres.xyz//produits/'.$_POST['ref'].'.png"/>
                                          <input type="hidden" name="d" value="'.$_POST['prix'].'"/>
                                      </form>
                                   <script>document.getElementById("formT").submit();</script>';
                               }else {
                                   echo 'erreur';
                                   $_POST = array();
                               }
                              }else {
                                   echo 'erreur image';
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
              </div>
              <img class="img-thumbnail" />
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <a href="http://katsudodm.richard-peres.xyz/ressource/projet_php_PERES_RIGAUT.zip" download="projet_php_PERES_RIGAUT.zip"> Télécharger le projet
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
        <a href="http://katsudodm.richard-peres.xyz/pages/produit.php" download="produit.php"> Télécharger la page
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
      <!-- /.row -->
      <!-- /#page-wrapper -->

  </div>
  <?php include('../include/scripts.php'); ?>

</body>

</html>
