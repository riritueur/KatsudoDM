<!DOCTYPE html>
<html lang="fr">

<head>

  <?php include("../include/meta.php"); ?>

  <title>Katsudo DM - Factures clients</title>

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
            <h1 class="page-header">Factures des clients</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Liste des factures des clients
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Référence</th>
                      <th>Client</th>
                      <th>Produits</th>
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
                      $result = $bdd->query("SELECT * FROM Facture_Client");
                      while($data = $result->fetch()){
                          $resultclient = $bdd->query('SELECT Nom_c, Prenom_c, Email_c FROM Client Where Id_c='.$data['id_c']);
                          $dataclient = $resultclient->fetch();
                          $produits = $data['ref_p_1'].' x'.$data['qte_p_1'];
                          for($i=2;$i<=10;$i++){
                              if($data['ref_p_'.$i]){
                                  $produits = $produits.' <br/>'.$data['ref_p_'.$i].' x'.$data['qte_p_'.$i];
                              }
                          }
                          $etat = 'error';
                          if($data['paiement'] == 0){
                              $etat = 'Non-payée';
                          }
                          if($data['paiement'] == 1){
                              $etat = 'Payée';
                          }
                              echo '<tr>
                                  <td>'.$data['ref_fac_c'].'</td>'.'
                                  <td>'.$dataclient['Nom_c'].' '.$dataclient['Prenom_c'].'</td>'.'
                                  <td>'.$produits.'</td>'.'
                                  <td>'.$data['prix_ht'].'</td>'.'
                                  <td>'.$data['prix_tva'].'</td>'.'
                                  <td>'.$data['prix_ttc'].'</td>'.'
                                  <td>'.$data['date_emi_fac_c'].'</td>'.'
                                  <td>'.$data['date_rec_fac_c'].'</td>'.'
                                  <td> <p ';
                                          if($etat == 'Payée')
                                            echo 'class="label label-success"';
                                          else echo 'class="label label-danger"';

                                        echo '> <strong>'.$etat.' </strong> </p></td>'.'
                                  <td>
                                  
                                  
                                    <button type="button" class="btn btn-default btn-circle" data-toggle="modal" data-target="#modalModify" 
                                    data-id="'. $data['id_fac_c'] .'"
                                    data-fourn="'. $data['id_c'] .'"
                                    data-etat="'. $data['paiement_fac_c'] .'">
                                            <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalDel" data-id="'. $data['id_fac_c'] .'"  data-nomid="id_fac_c" data-table="Facture_Client" data-red="facture-client.php">
                                    <i class="fa fa-times"></i>
                                    </button>
                                    
                                    <button type="button" class=" editFac btn btn-default btn-circle"
                                    data-idfac="'. $data['id_fac_c'] .'" >
                                                    <i class="fa fa-download"></i>
                                    </button>';
                                    if($etat == 'Non-payée'){
                                        echo '<button type="button" class=" btn btn-default btn-circle" data-toggle="modal" data-target="#modalMail"
                                        data-nom="'.$dataclient['Nom_c'].'"
                                        data-prenom="'.$dataclient['Prenom_c'].'"
                                        data-mail="'.$dataclient['Email_c'].'"
                                        data-obj="Relance Facture impayée KatsudoDM"
                                        data-message="Madame, Monsieur '.$dataclient['Nom_c'].',<br/><br/>Merci de bien vouloir régulariser votre facture n° '. $data['ref_fac_c'] . ' d\'un montant TTC de ' .$data['prix_ttc']. '€ pour le(s) produit(s) suivant(s) :<br/> '. $produits . '.<br/>La facture doit être payé avant le : '. $data['date_rec_fac_c'] . '. Au-delà de cette date, une pénalité vous sera facturée pour retard de paiement.<br/><br/>Merci de votre compréhension.<br/>Cordialement,<br/>L\'équipe KatsudoDM.<br/>katsudo@dm.com<br/><br/><br/><br/>" >
                                                                        <i class="fa fa-envelope-o"></i>
                                        </button>';
                                    }
                                  echo '</td>
                                  </tr>';
                      }
                    ?>
                      <?php include('../include/modal.php');?>
                  </tbody>
                </table>
                <?php include('../include/btn_add.php');?>
                <?php
									$resultclilist = $bdd->query('SELECT Id_c, Nom_c, Prenom_c FROM Client');
									$resultprodlist = $bdd->query('SELECT ref_p FROM Produit');
									$selectprod = '';
									while($dataprodlist = $resultprodlist->fetch()){
										$selectprod = $selectprod.'<option value="'.$dataprodlist['ref_p'].'">'.$dataprodlist['ref_p'].'</option>';
									}
								?>
                  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title text-info" id="myModalLabel">Ajouter une facture de client</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" class="AVAST_PAM_nonloginform" method="post">
                            <label>Client</label>
                            <select class="form-control" name="cli" id="cli" required>
														<?php
															while($dataclilist = $resultclilist->fetch()){
																echo '<option value="'.$dataclilist['Id_c'].'">'.$dataclilist['Nom_c'].' '.$dataclilist['Prenom_c'].'</option>';
															}
														?>
													</select>
                            </br>
                            <?php
														for($i=1;$i<11;$i++){
															echo '
																<div class="form-row">
																	<div class="form-group col-md-6">
																		<label>Produit '.$i.'</label>
																		<select class="form-control" name="prod'.$i.'" id="prod'.$i.'" required>
																				'.$selectprod.'
																		</select>
																	</div>
																	<div class="form-group col-md-6">
																		<label>Quantité produit '.$i.'</label>
																		<input class="form-control" name="qte'.$i.'" id="qte'.$i.'" value="0" required/>
																	</div>
																</div>
															';
														}
													?>
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
                               if(($_POST['etat'] == "1" || $_POST['etat'] == "0") && intval($_POST['qte1']) > 0 && is_string($_POST['qte1'])){
                          $result_nb_fact = $bdd->query("SELECT valeur FROM Numero_Facture_Client WHERE id_num=1;");
                          $data_nb_fact = $result_nb_fact->fetch();
                          $ref = 'F-2018-'.strval(intval($data_nb_fact['valeur'])-1);

                          $dateemi = date("Y-m-d H:i:s");
                          $daterecouv = date("Y-m-d H:i:s", mktime(23, 59, 59, date("m")+1 , date("d"), date("Y")));

                          $prixht = 0;
                          for($k=1;$k<11;$k++){
                              $result_prix_produit = $bdd->query("SELECT prix_ht FROM Produit WHERE ref_p = '".$_POST['prod'.$k]."';");
                              $data_prix_produit = $result_prix_produit->fetch();
                              $prixht = $prixht + intval($data_prix_produit['prix_ht']) * intval($_POST['qte'.$k]);
                              $result_prix_produit->closeCursor();
                          }

                          $resulttva = $bdd->query("SELECT montant_tva FROM TVA WHERE id_tva=1;");
                          $valeurtva = $resulttva->fetch();
                          $montanttva = round($prixht * intval($valeurtva['montant_tva'])/100);
                          $prixttc = $prixht + $montanttva;

                          for($j=2;$j<11;$j++){
                              if(intval($_POST['qte'.$j]) == 0){
                                  $_POST['qte'.$j] = '';
                                  $_POST['prod'.$j] = '';
                              }
                          }

                       $chg_nb_fact = $bdd->query("UPDATE Numero_Facture_Client SET valeur = ".strval(intval($data_nb_fact['valeur'])+1)." WHERE id_num = 1;");
                          $eeee = $chg_nb_fact->fetch();

                          echo '
                          <form id="formT" role="form" method="post" action="ajout.php">
                              <input type="hidden" name="values" value="(id_c, ref_fac_c, date_emi_fac_c, date_rec_fac_c, tva, ref_p_1, qte_p_1, ref_p_2, qte_p_2, ref_p_3, qte_p_3, ref_p_4, qte_p_4, ref_p_5, qte_p_5, ref_p_6, qte_p_6, ref_p_7, qte_p_7, ref_p_8, qte_p_8, ref_p_9, qte_p_9, ref_p_10, qte_p_10, prix_ht, prix_tva, prix_ttc, paiement)"/>
                              <input type="hidden" name="table" value="Facture_Client"/>
                              <input type="hidden" name="red" value="facture-client.php"/>
                              <input type="hidden" name="a" value="'.$_POST['cli'].'"/>
                              <input type="hidden" name="b" value="'.$ref.'"/>
                              <input type="hidden" name="c" value="'.$dateemi.'"/>
                              <input type="hidden" name="d" value="'.$daterecouv.'"/>
                              <input type="hidden" name="e" value="'.$valeurtva['montant_tva'].'"/>
                              <input type="hidden" name="f" value="'.$_POST['prod1'].'"/>
                              <input type="hidden" name="g" value="'.$_POST['qte1'].'"/>
                              <input type="hidden" name="h" value="'.$_POST['prod2'].'"/>
                              <input type="hidden" name="i" value="'.$_POST['qte2'].'"/>
                              <input type="hidden" name="j" value="'.$_POST['prod3'].'"/>
                              <input type="hidden" name="k" value="'.$_POST['qte3'].'"/>
                              <input type="hidden" name="l" value="'.$_POST['prod4'].'"/>
                              <input type="hidden" name="m" value="'.$_POST['qte4'].'"/>
                              <input type="hidden" name="n" value="'.$_POST['prod5'].'"/>
                              <input type="hidden" name="o" value="'.$_POST['qte5'].'"/>
                              <input type="hidden" name="p" value="'.$_POST['prod6'].'"/>
                              <input type="hidden" name="q" value="'.$_POST['qte6'].'"/>
                              <input type="hidden" name="r" value="'.$_POST['prod7'].'"/>
                              <input type="hidden" name="s" value="'.$_POST['qte7'].'"/>
                              <input type="hidden" name="t" value="'.$_POST['prod8'].'"/>
                              <input type="hidden" name="u" value="'.$_POST['qte8'].'"/>
                              <input type="hidden" name="v" value="'.$_POST['prod9'].'"/>
                              <input type="hidden" name="w" value="'.$_POST['qte9'].'"/>
                              <input type="hidden" name="x" value="'.$_POST['prod10'].'"/>
                              <input type="hidden" name="y" value="'.$_POST['qte10'].'"/>
                              <input type="hidden" name="z" value="'.$prixht.'"/>
                              <input type="hidden" name=":" value="'.$montanttva.'"/>
                              <input type="hidden" name="-" value="'.$prixttc.'"/>
                              <input type="hidden" name="," value="'.$_POST['etat'].'"/>
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
                          <h4 class="text-info modal-title" id="myModalLabel">Modifier une facture client</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" class="AVAST_PAM_nonloginform" method="post">
                            <input type="hidden" name="id" id="id" class="idf" />
                            <label>Client</label>
                            <select class="form-control" name="cli" id="cli" required>
                                <?php
                                    $resultclilist = $bdd->query('SELECT Id_c, Nom_c, Prenom_c FROM Client');
                                    while($dataclilist = $resultclilist->fetch()){
                                        echo '<option value="'.$dataclilist['Id_c'].'">'.$dataclilist['Nom_c'].' '.$dataclilist['Prenom_c'].'</option>';
                                    }
                                ?>
                            </select>
                            </br>
                            <?php
                                  for($i=1;$i<11;$i++){
                                      echo '
                                          <div class="form-row">
                                              <div class="form-group col-md-6">
                                                  <label>Produit '.$i.'</label>
                                                  <select class="form-control" name="prod'.$i.'" id="prod'.$i.'" required>
                                                          '.$selectprod.'
                                                  </select>
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label>Quantité produit '.$i.'</label>
                                                  <input class="form-control" name="qte'.$i.'" id="qte'.$i.'" value="0" required/>
                                              </div>
                                          </div>
                                      ';
                                  }
                              ?>
                              <label>État</label>
                              <div class="radio">
                                <label>
                                    <input type="radio" name="etat" id="nopaye" value="0"/>Non-payée
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                    <input type="radio" name="etat" id="paye" value="1"/>Payée
                                </label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <button type="submit" name="submitModify" class="btn btn-primary">Modifier</button>
                              </div>
                          </form>
                          <?php
                          if(isset($_POST['submitModify'])){
                               if(($_POST['etat'] == "1" || $_POST['etat'] == "0") && intval($_POST['qte1']) > 0 && is_string($_POST['qte1'])){
                                $result_nb_fact = $bdd->query("SELECT valeur FROM Numero_Facture_Client WHERE id_num=1;");
                                $data_nb_fact = $result_nb_fact->fetch();
                                $ref = 'F-2018-'.strval(intval($data_nb_fact['valeur'])-1);

                                $prixht = 0;
                                for($k=1;$k<11;$k++){
                                    $result_prix_produit = $bdd->query("SELECT prix_ht FROM Produit WHERE ref_p = '".$_POST['prod'.$k]."';");
                                    $data_prix_produit = $result_prix_produit->fetch();
                                    $prixht = $prixht + intval($data_prix_produit['prix_ht']) * intval($_POST['qte'.$k]);
                                    $result_prix_produit->closeCursor();
                                }

                                $resulttva = $bdd->query("SELECT montant_tva FROM TVA WHERE id_tva=1;");
                                $valeurtva = $resulttva->fetch();
                                $montanttva = round($prixht * intval($valeurtva['montant_tva'])/100);
                                $prixttc = $prixht + $montanttva;

                                for($j=2;$j<11;$j++){
                                    if(intval($_POST['qte'.$j]) == 0){
                                        $_POST['qte'.$j] = '';
                                        $_POST['prod'.$j] = '';
                                    }
                                }

                             $chg_nb_fact = $bdd->query("UPDATE Numero_Facture_Client SET valeur = ".strval(intval($data_nb_fact['valeur'])+1)." WHERE id_num = 1;");
                                $eeee = $chg_nb_fact->fetch();
                                   echo '
                                       <form id="formModify" role="form" method="post" action="modification.php"><input type="hidden" name="values"
                                            value="
                                            id_c = \''.$_POST['cli'].'\',
                                            ref_p_1 = \''.$_POST['prod1'].'\',
                                            qte_p_1 = \''.$_POST['qte1'].'\',
                                            ref_p_2 = \''.$_POST['prod2'].'\',
                                            qte_p_2 = \''.$_POST['qte2'].'\',
                                            ref_p_3 = \''.$_POST['prod3'].'\',
                                            qte_p_3 = \''.$_POST['qte3'].'\',
                                            ref_p_4 = \''.$_POST['prod4'].'\',
                                            qte_p_4 = \''.$_POST['qte4'].'\',
                                            ref_p_5 = \''.$_POST['prod5'].'\',
                                            qte_p_5 = \''.$_POST['qte5'].'\',
                                            ref_p_6 = \''.$_POST['prod6'].'\',
                                            qte_p_6 = \''.$_POST['qte6'].'\',
                                            ref_p_7 = \''.$_POST['prod7'].'\',
                                            qte_p_7 = \''.$_POST['qte7'].'\',
                                            ref_p_8 = \''.$_POST['prod8'].'\',
                                            qte_p_8 = \''.$_POST['qte8'].'\',
                                            ref_p_9 = \''.$_POST['prod9'].'\',
                                            qte_p_9 = \''.$_POST['qte9'].'\',
                                            ref_p_10 = \''.$_POST['prod10'].'\',
                                            qte_p_10 = \''.$_POST['qte10'].'\',
                                            prix_tva = '. $montanttva.',
                                            prix_ht = '. $prixht.',
                                            paiement = '. $_POST['etat'].',
                                            prix_ttc= '.$prixttc.'  "
                                          />
                                          
                                          <input type="hidden" name="table" value="Facture_Client"/>
                                          <input type="hidden" name="id" value="'.$_POST['id'].'"/>
                                          <input type="hidden" name="red" value="facture-client.php"/>
                                          <input type="hidden" name="nomid" value="id_fac_c"/>
                                          
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


                  <div class="modal fade" id="modalMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="text-info modal-title" id="myModalLabel">Confirmer l'envoi</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" class="AVAST_PAM_nonloginform" method="post">
                            <div class="form-group">
                              <label>Nom Client</label>
                              <input type="text" name="nom" id="nom" class="nomf form-control" disabled/>
                            </div>
                            <div class="form-group">
                              <label>Prénom Client</label>
                              <input type="text" name="prenom" id="prenom" class="prenomf form-control" disabled/>
                            </div>
                            <div class="form-group">
                              <label>Email Client</label>
                              <input type="text" class="mailf form-control" disabled/>
                              <input type="hidden" name="email" id="email" class="mailff form-control" />
                            </div>
                            <div class="form-group">
                              <label>Objet du mail</label>
                              <input type="text" name="obj" id="obj" class="objf form-control" />
                              <label>Corps du mail</label>
                              <p class="help-block">(Les '<code>&lt;br/&gt;</code>' seront remplacés par des sauts de lignes dans le mail final)</p>
                              <textarea class="form-control messagef" name="message" id="message" required minlength="10" maxlength="1000" rows="6"></textarea>
                            </div>
                            <br/>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                              <button type="submit" name="submitMail" class="btn btn-primary">Envoyer</button>
                            </div>
                          </form>
                          <?php
                          if(isset($_POST['submitMail'])){
                               if(!empty($_POST['email']) && !empty($_POST['obj']) &&
                                  !empty($_POST['message']) )
                                   echo '
                                   <form id="formMailing" role="form" method="post" action="mailing.php">
                                          <input type="hidden" name="mail" value="'.$_POST['email'].'"/>
                                          <input type="hidden" name="obj" value="'.$_POST['obj'].'"/>
                                          <input type="hidden" name="message" value="'.$_POST['message'].'"/>
                                      </form>
                                   <script>document.getElementById("formMailing").submit();</script>';
                               else {
                                  print_r($_POST);
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
            </div></br>

              </div>
            </div>
          </div>
        </div>
        <a href="http://katsudodm.richard-peres.xyz/ressource/projet_php_PERES_RIGAUT.zip" download="projet_php_PERES_RIGAUT.zip"> Télécharger le projet
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>
        <a href="http://katsudodm.richard-peres.xyz/pages/facture-client.php" download="facture-client.php"> Télécharger la page
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-download"></i>
  </button>
  </a>


  <?php include('../include/scripts.php'); ?>
  <?php 
      echo '<form id="fac" role="form" method="post" action="facture.php">
      <input type="hidden" name="id_fac" id="id_fac"/>
            </form>';

			echo '<form id="mail_form" role="form" method="post" action="mailing.php">
							<input type="hidden" name="ref_fac" id="ref_fac"/>
							<input type="hidden" name="mail_rel" id="mail_rel"/>
							<input type="hidden" name="date_rel" id="date_rel"/>
							<input type="hidden" name="produits_rel" id="produits_rel"/>
							<input type="hidden" name="montant_rel" id="montant_rel"/>
            </form>';
      ?>
  <script>
    $('.editFac').click(function(event) {
      var data = $.parseJSON($(this).attr('data-idfac'));
      document.getElementById("id_fac").setAttribute("value", data);
      document.getElementById("fac").submit();
    })

    $('#modalModify').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)

      var id = button.data('id')

      var modal = $(this)
      modal.find('.idf').val(id)
    })

    $('#modalMail').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var nom = button.data('nom')
      var prenom = button.data('prenom')
      var mail = button.data('mail')
      var obj = button.data('obj')
      var message = button.data('message')

      var modal = $(this)
      modal.find('.nomf').val(nom)
      modal.find('.prenomf').val(prenom)
      modal.find('.mailf').val(mail)
      modal.find('.mailff').val(mail)
      modal.find('.objf').val(obj)
      modal.find('.messagef').val(message)

    })

  </script>


</body>

</html>