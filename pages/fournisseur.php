<!DOCTYPE html>
<html lang="fr">

<head>

  <?php include('../include/meta.php'); ?>
  <title>Katsudo DM - Fournisseurs</title>

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
            <h1 class="page-header">Fournisseurs</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Liste des fournisseurs
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
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <?php
                      $result = $bdd->query("SELECT * FROM Fournisseur");
                      while($data = $result->fetch()){
                          echo '<tr>
                                      <td>'.$data['nom_f'].'</td>'.'
                                      <td>'.$data['prenom_f'].'</td>'.'
                                      <td>'.$data['adresse_f'].'</td>'.'
                                      <td>'.$data['tel_f'].'</td>'.'
                                      <td>'.$data['email_f'].'</td>'.'
                                      <td>
                                          <button type="button" class="btn btn-default btn-circle" data-toggle="modal" data-target="#modalModify" data-id="'. $data['id_f'] .'"
                                          data-nom="'. $data['nom_f'] .'"
                                          data-prenom="'. $data['prenom_f'] .'"
                                          data-adresse="'. $data['adresse_f'] .'"
                                          data-tel="'. $data['tel_f'] .'"
                                          data-mail="'. $data['email_f'] .'">
                                                  <i class="fa fa-pencil"></i>
                                          </button>
                                          <button type="button" class="btn btn-danger btn-circle"       data-toggle="modal" data-target="#modalDel" data-id="'. $data['id_f'] .'"  data-nomid="Id_f" data-table="Fournisseur" data-red="fournisseur.php">
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
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-info" id="myModalLabel">Ajouter un fournisseur</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" class="AVAST_PAM_nonloginform" method="post">
                          <label>Nom</label>
                          <input class="form-control" name="nom" id="nom" required/>
                          <label>Prénom</label>
                          <input class="form-control" name="prenom" id="prenom" required/>
                          <label>Adresse</label>
                          <input class="form-control" name="adresse" id="adresse" required/>
                          <label>Téléphone</label>
                          <input class="form-control" name="tel" id="tel" required/>
                          <label>E-mail</label>
                          <input class="form-control" name="mail" id="mail" required/>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                        </form>
                        <?php
                            if(isset($_POST['submit'])){
                                 if(is_string($_POST['nom']) && strlen($_POST['nom'])<51 && is_string($_POST['prenom']) && strlen($_POST['prenom'])<51 && is_string($_POST['adresse']) && strlen($_POST['nom'])<201 && is_string($_POST['tel']) && strlen($_POST['tel']) == 10 && preg_match("#[0-9]{10}#", $_POST['tel']) && is_string($_POST['mail']) && strlen($_POST['mail']) < 51 && preg_match('#^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$#',trim($_POST['mail']))) {
                                     //$_POST['test'] = $_POST['preg']*2;
                                     echo '
                                     <form id="formT" role="form" method="post" action="ajout.php">
                                        <input type="hidden" name="values" value="(nom_f, prenom_f, adresse_f, tel_f, email_f)"/>
                                        <input type="hidden" name="table" value="Fournisseur"/>
                                        <input type="hidden" name="red" value="fournisseur.php"/>
                                        <input type="hidden" name="a" value="'.$_POST['nom'].'"/>
                                        <input type="hidden" name="b" value="'.$_POST['prenom'].'"/>
                                        <input type="hidden" name="c" value="'.$_POST['adresse'].'"/>
                                        <input type="hidden" name="d" value="'.$_POST['tel'].'"/>
                                        <input type="hidden" name="e" value="'.$_POST['mail'].'"/>
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

                <div class="modal fade" id="modalModify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="text-info modal-title" id="myModalLabel">Modifier un Fournisseur</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" class="AVAST_PAM_nonloginform" method="post">
                          <input type="hidden" name="id" id="id" class="idf" />
                          <label>Nom</label>
                          <input class="form-control nomf" name="nom" id="nom" required/>
                          <label>Prénom</label>
                          <input class="form-control prenomf" name="prenom" id="prenom" required/>
                          <label>Adresse</label>
                          <input class="form-control adressef" name="adresse" id="adresse" required/>
                          <label>Téléphone</label>
                          <input class="form-control telf" name="tel" id="tel" required/>
                          <label>E-mail</label>
                          <input class="form-control mailf" name="mail" id="mail" required/>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="submitModify" class="btn btn-primary">Modifier</button>
                          </div>
                        </form>
                        <?php
                          if(isset($_POST['submitModify'])){
                               if(is_string($_POST['nom']) && strlen($_POST['nom'])<51 && is_string($_POST['prenom']) && strlen($_POST['prenom'])<51 && is_string($_POST['adresse']) && strlen($_POST['nom'])<201 && is_string($_POST['tel']) && strlen($_POST['tel']) == 10 && preg_match("#[0-9]{10}#", $_POST['tel']) && is_string($_POST['mail']) && strlen($_POST['mail']) < 51 && preg_match('#^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$#',trim($_POST['mail']))) {
                                   echo '
                                       <form id="formModify" role="form" method="post" action="modification.php">
                                          <input type="hidden" name="values"
                                            value=" nom_f = \''.$_POST['nom'].'\',
                                            prenom_f = \''.$_POST['prenom'].'\',
                                            adresse_f = \''.$_POST['adresse'].'\',
                                            tel_f = \''.$_POST['tel'].'\',
                                            email_f = \''.$_POST['mail'].'\'"
                                          />
                                          
                                          <input type="hidden" name="table" value="Fournisseur"/>
                                          <input type="hidden" name="id" value="'.$_POST['id'].'"/>
                                          <input type="hidden" name="red" value="fournisseur.php"/>
                                          <input type="hidden" name="nomid" value="id_f"/>
                                          
                                      </form>
                                   <script>document.getElementById("formModify").submit();</script>';
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


              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.panel -->
        <a href="http://katsudodm.richard-peres.xyz/ressource/projet_php_PERES_RIGAUT.zip" download="projet_php_PERES_RIGAUT.zip"> Télécharger le projet
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
        <a href="http://katsudodm.richard-peres.xyz/pages/fournisseur.php" download="fournisseur.php"> Télécharger la page
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
      </div>
      <!-- /.col-lg-12 -->

  </div>
  <!-- /.row -->
  <!-- /#page-wrapper -->

  <?php include('../include/scripts.php'); ?>
  
  <script>
    $('#modalModify').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var nom = button.data('nom')
      var prenom = button.data('prenom')
      var adresse = button.data('adresse')
      var tel = button.data('tel')
      var mail = button.data('mail')

      var modal = $(this)
      modal.find('.idf').val(id)
      modal.find('.nomf').val(nom)
      modal.find('.prenomf').val(prenom)
      modal.find('.adressef').val(adresse)
      modal.find('.telf').val(tel)
      modal.find('.mailf').val(mail)
      
    })
  </script>
  
</body>

</html>
