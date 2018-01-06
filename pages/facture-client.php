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
                          $resultclient = $bdd->query('SELECT Nom_c, Prenom_c FROM Client Where Id_c='.$data['id_c']);
                          $dataclient = $resultclient->fetch();
                          $produits = $data['ref_p_1'].' x'.$data['qte_p_1'];
                          for($i=2;$i<=10;$i++){
                              if($data['ref_p_'.$i]){
                                  $produits = $produits.'<br/>'.$data['ref_p_'.$i].' x'.$data['qte_p_'.$i];
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
                                  <td>'.$etat.'</td>'.'
                                  <td>
                                          <button type="button" class="btn btn-default btn-circle">
                                                  <i class="fa fa-pencil"></i>
                                          </button>
                                          <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalDel" data-id="'. $data['id_fac_c'] .'"  data-nomid="id_fac_c" data-table="Facture_Client" data-red="employe.php">
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
                <?php include('../include/btn_add.php');?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <?php include('../include/scripts.php'); ?>

</body>

</html>
