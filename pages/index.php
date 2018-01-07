<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>
  <title>Katsudo DM - Index</title>

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
            <h1 class="page-header">Tableau de bord</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
																				$result_nb_clients = $bdd->query("SELECT COUNT(*) as nb FROM Client");
																				$data_nb_clients = $result_nb_clients->fetch();
																				echo $data_nb_clients['nb'];
																			?>
                    </div>
                    <div>Clients</div>
                  </div>
                </div>
              </div>
              <a href="client.php">
                <div class="panel-footer">
                  <span class="pull-left">Voir les clients</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-building fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
																				$result_nb_emp = $bdd->query("SELECT COUNT(*) as nb FROM Salarie");
																				$data_nb_emp = $result_nb_emp->fetch();
																				echo $data_nb_emp['nb'];
																			?>
                    </div>
                    <div>Employés</div>
                  </div>
                </div>
              </div>
              <a href="employe.php">
                <div class="panel-footer">
                  <span class="pull-left">Voir les employés</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-truck fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
																				$result_nb_fourn = $bdd->query("SELECT COUNT(*) as nb FROM Fournisseur");
																				$data_nb_fourn = $result_nb_fourn->fetch();
																				echo $data_nb_fourn['nb'];
																			?>
                    </div>
                    <div>Fournisseurs</div>
                  </div>
                </div>
              </div>
              <a href="fournisseur.php">
                <div class="panel-footer">
                  <span class="pull-left">Voir les fournisseurs</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
																				$result_nb_produit = $bdd->query("SELECT COUNT(*) as nb FROM Produit");
																				$data_nb_produit = $result_nb_produit->fetch();
																				echo $data_nb_produit['nb'];
																			?>
                    </div>
                    <div>Produits</div>
                  </div>
                </div>
              </div>
              <a href="produit.php">
                <div class="panel-footer">
                  <span class="pull-left">Voir les produits</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> "Comptabilité"
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th>Mois</th>
                            <th>Dépenses</th>
                            <th>Recettes</th>
                            <th>Bénéfice</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
																									$result_salaries = $bdd->query("SELECT salaire_brut_s FROM Salarie");
																									$montant_salaries = 0;
																									while($data_salaries = $result_salaries->fetch()){
																										$montant_salaries = $montant_salaries + intval($data_salaries['salaire_brut_s']);
																									}
																									$result_salaries->closeCursor();
																							
																									$result_taxes = $bdd->query("SELECT montant_t FROM Taxe");
																									$montant_taxes = 0;
																									while($data_taxes = $result_taxes->fetch()){
																										$montant_taxes = $montant_taxes + intval($data_taxes['montant_t']);
																									}
																									$result_taxes->closeCursor();
																							
																									for($month=1;$month<=12;$month++){
																										
																										if( $month <= intval(date("m", mktime(23, 59, 59, date("m") , date("d"), date("Y")))) ){
																											
																											$result_factures_client = $bdd->query("SELECT prix_ttc FROM Facture_Client WHERE MONTH(date_emi_fac_c) = ".$month);
																											$montant_factures_client = 0;
																											while($data_factures_client = $result_factures_client->fetch()){
																												$montant_factures_client = $montant_factures_client + intval($data_factures_client['prix_ttc']);
																											}
																											$result_factures_client->closeCursor();																									

																											$result_factures_fournisseur = $bdd->query("SELECT montant_ttc_fac_f FROM Facture_Fournisseur WHERE MONTH(date_emi_fac_f) = ".$month);
																											$montant_factures_fournisseur = 0;
																											while($data_factures_fournisseur = $result_factures_fournisseur->fetch()){
																												$montant_factures_fournisseur = $montant_factures_fournisseur + intval($data_factures_fournisseur['montant_ttc_fac_f']);
																											}
																											$result_factures_fournisseur->closeCursor();

																											$dep = $montant_salaries + $montant_taxes + $montant_factures_fournisseur;
																											$benef = $montant_factures_client - $dep;
																											
																											
																											echo '<tr>
																															<td>'.$month.'</td>
																															<td class="text-danger">'.$dep.'</td>
																															<td class="text-success">'.$montant_factures_client.'</td>';
																											if($benef >=0){
																															echo '<td class="text-success">'.$benef.'</td>
																														</tr>';
																											}
																											else{
																												echo '<td class="text-danger">'.$benef.'</td>
																														</tr>';
																											}
																										}
																										else{
																											echo '<tr>
																														<td class="text-warning">'.$month.'</td>
																														<td class="text-warning">'.$dep.'</td>
																														<td class="text-warning">'.$montant_factures_client.'</td>
																														<td class="text-warning">'.$benef.'</td>';
																										}
																								}
																							
																							?>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <a href="http://katsudodm.richard-peres.xyz/ressource/projet_php_PERES_RIGAUT.zip" download="projet_php_PERES_RIGAUT.zip"> Télécharger le projet
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
        <a href="http://katsudodm.richard-peres.xyz/pages/index.php" download="index.php"> Télécharger la page
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>

      </div>
      <?php include('../include/scripts.php'); ?>

      <!-- Morris Charts JavaScript -->
      <script src="../vendor/raphael/raphael.min.js"></script>
      <script src="../vendor/morrisjs/morris.min.js"></script>
      <script src="../data/morris-data.js"></script>

</body>

</html>
