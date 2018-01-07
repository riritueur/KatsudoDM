<!DOCTYPE html>
<html lang="fr">

<head>

  <?php include("../include/meta.php"); ?>

  <title>Kastudo DM - Factures fournisseurs</title>

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
            <h1 class="page-header">Factures des fournisseurs</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Liste des factures des fournisseurs
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Référence</th>
                      <th>Fournisseur</th>
                      <th>Description</th>
                      <th>Prix HT</th>
                      <th>Montant TVA</th>
                      <th>Prix TTC</th>
                      <th>Date d'émission</th>
                      <th>Date de recouvrement</th>
                      <th>État</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <?php
                            $result = $bdd->query("SELECT * FROM Facture_Fournisseur");
                            while($data = $result->fetch()){
                                $resultfourn = $bdd->query('SELECT nom_f, prenom_f FROM Fournisseur Where id_f='.$data['id_f']);
                                $datafourn = $resultfourn->fetch();
                                $produits = $data['ref_p_1'].' x'.$data['qte_p_1'];
                                $etat = 'error';
                                if($data['paiement_fac_f'] == 0){
                                    $etat = 'Non-payée';
                                }
                                if($data['paiement_fac_f'] == 1){
                                    $etat = 'Payée';
                                }
                                    echo '<tr>
                                        <td>'.$data['ref_fac_f'].'</td>'.'
                                        <td>'.$datafourn['nom_f'].' '.$datafourn['prenom_f'].'</td>'.'
                                        <td>'.$data['desc_fac_f'].'</td>'.'
                                        <td>'.$data['montant_ht_fac_f'].'</td>'.'
                                        <td>'.$data['montant_tva_fac_f'].'</td>'.'
                                        <td>'.$data['montant_ttc_fac_f'].'</td>'.'
                                        <td>'.$data['date_emi_fac_f'].'</td>'.'
                                        <td>'.$data['date_rec_fac_f'].'</td>'.'
                                        <td> <p ';
                                          if($etat == 'Payée')
                                            echo 'class="label label-success"';
                                          else echo 'class="label label-danger"';

                                        echo '> <strong>'.$etat.' </strong> </p></td>'.'
                                        <td>
                                                <button type="button" class="btn btn-default btn-circle">
                                                        <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalDel" data-id="'. $data['id_fac_f'] .'"  data-nomid="id_fac_f" data-table="Facture_Fournisseur" data-red="facture-fournisseur.php">
                                                <i class="fa fa-times"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-circle">
                                                        <i class="fa fa-download"></i>
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
								<?php
									$resultfournlist = $bdd->query('SELECT id_f, nom_f, prenom_f FROM Fournisseur');
								?>
								<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-info" id="myModalLabel">Ajouter une facture de fournisseur</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" class="AVAST_PAM_nonloginform" method="post">
                          <label>Référence</label>
                          <input class="form-control" name="ref" id="ref" required/>
                          <label>Fournisseur</label>
                          <select class="form-control" name="fourn" id="fourn" required>
														<?php
															while($datafournlist = $resultfournlist->fetch()){
																echo '<option value="'.$datafournlist['id_f'].'">'.$datafournlist['nom_f'].' '.$datafournlist['prenom_f'].'</option>';
															}
														?>
													</select>
													<label>Description</label>
                          <input class="form-control" name="desc" id="desc" required/>
													<label>Prix HT</label>
                          <input class="form-control" name="prixht" id="prixht" required/>
													<label>État</label>
                          <div class="radio">
														<label>
															<input type="radio" name="etat" id="nopaye" value="0" checked/>Non-payée
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="etat" id="paye" value="1"/>Payée
														</label>
													</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                        </form>
                        <?php
                          if(isset($_POST['submit'])){
                               if(strlen($_POST['ref'])<21 && strlen($_POST['desc'])<201 && preg_match('#^[0-9]+$#',$_POST['prixht']) && ($_POST['etat'] == "1" || $_POST['etat'] == "0")) {
                              $dateemi = date("Y-m-d H:i:s");
                              $daterecouv = date("Y-m-d H:i:s", mktime(23, 59, 59, date("m")+1 , date("d"), date("Y")));
                              $resulttva = $bdd->query("SELECT montant_tva FROM TVA WHERE id_tva=1");
                              $valeurtva = $resulttva->fetch();
                              $montanttva = round((intval($_POST['prixht'])*intval($valeurtva['montant_tva']))/100);
                              $prixttc = $_POST['prixht'] + $montanttva;
                              echo '
                              <form id="formT" role="form" method="post" action="ajout.php">
                                  <input type="hidden" name="values" value="(id_f, ref_fac_f, desc_fac_f, date_emi_fac_f, date_rec_fac_f, montant_ht_fac_f, montant_tva_fac_f, montant_ttc_fac_f, paiement_fac_f)"/>
                                  <input type="hidden" name="table" value="Facture_Fournisseur"/>
                                  <input type="hidden" name="red" value="facture-fournisseur.php"/>
                                  <input type="hidden" name="a" value="'.$_POST['fourn'].'"/>
                                  <input type="hidden" name="b" value="'.$_POST['ref'].'"/>
                                  <input type="hidden" name="c" value="'.$_POST['desc'].'"/>
                                  <input type="hidden" name="d" value="'.$dateemi.'"/>
                                  <input type="hidden" name="e" value="'.$daterecouv.'"/>
                                  <input type="hidden" name="f" value="'.$_POST['prixht'].'"/>
                                  <input type="hidden" name="g" value="'.$montanttva.'"/>
                                  <input type="hidden" name="h" value="'.$prixttc.'"/>
                                  <input type="hidden" name="i" value="'.$_POST['etat'].'"/>
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
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
<a href="http://katsudodm.richard-peres.xyz/ressource/projet_php_PERES_RIGAUT.zip" download="projet_php_PERES_RIGAUT.zip"> Télécharger le projet
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
        <a href="http://katsudodm.richard-peres.xyz/pages/facture-fournisseur.php" download="facture-fournisseur.php"> Télécharger la page
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
  <?php include('../include/scripts.php'); ?>

</body>

</html>
