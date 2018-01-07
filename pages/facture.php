<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../include/meta.php'); ?>

  <title>Katsudo DM - Edition de factures</title>

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

  <style>
    body {
      background-color: white;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
      color: black;
    }

    .centre {
      text-align: center;
    }
    
    .invoice-title h2,
    .invoice-title h3 {
      display: inline-block;
    }

    .table>tbody>tr>.no-line {
      border-top: none;
    }

    .table>thead>tr>.no-line {
      border-bottom: none;
    }

    .table>tbody>tr>.thick-line {
      border-top: 2px solid;
    }

  </style>


</head>

<body>
	<?php
		try{
			$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u178917848_katsu;charset=utf8', 'u178917848_kuser', 'password');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	
		$result_facture = $bdd->query("SELECT * FROM Facture_Client WHERE id_fac_c = ".$_POST['id_fac'].";");
		$data_facture = $result_facture->fetch();
		$result_facture->closeCursor();

		$result_client = $bdd->query("SELECT * FROM Client WHERE Id_c = ".$data_facture['id_c']);
		$data_client = $result_client->fetch();
		$result_client->closeCursor();
	
		$result_produit1 = $bdd->query("SELECT prix_ht, desc_p FROM Produit WHERE ref_p = '".$data_facture['ref_p_1']."'");
		$data_produit1 = $result_produit1->fetch();
		$result_produit1->closeCursor();
	
		$result_tva = $bdd->query("SELECT montant_tva FROM TVA WHERE id_tva = 1");
		$data_tva = $result_tva->fetch();
		$result_tva->closeCursor();
	
		$tva = intval($data_tva['montant_tva']);
	
		$produits = '<tr>
									<td>'.$data_facture['ref_p_1'].'</td>
									<td>'.$data_produit1['desc_p'].'</td>
									<td class="text-center">'.$data_facture['qte_p_1'].'</td>
									<td class="text-center">'.strval( intval($data_facture['qte_p_1']) * intval($data_produit1['prix_ht']) ).'</td>
								</tr>';
		
		$total_ht = intval($data_facture['qte_p_1']) * intval($data_produit1['prix_ht']);
	
		for($i=2;$i<=10;$i++){
				if($data_facture['ref_p_'.$i]){
						$result_produit_i = $bdd->query("SELECT prix_ht, desc_p FROM Produit WHERE ref_p = '".$data_facture['ref_p_'.$i]."'");
						$data_produit_i = $result_produit_i->fetch();
						$result_produit_i->closeCursor();
					
						$produits = $produits.'
							<tr>
								<td>'.$data_facture['ref_p_'.$i].'</td>
								<td>'.$data_produit_i['desc_p'].'</td>
								<td class="text-center">'.$data_facture['qte_p_'.$i].'</td>
								<td class="text-center">'.strval( intval($data_facture['qte_p_'.$i]) * intval($data_produit_i['prix_ht']) ).'</td>
							</tr>';
					
					$total_ht = $total_ht + intval($data_facture['qte_p_'.$i]) * intval($data_produit_i['prix_ht']);
				}
		}		
	
	?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="invoice-title">
          <img src="../ressource/image/DM_logo.svg" alt="logo" width="60" height="60" />
          <h2>Facture</h2>
          <h3 class="pull-right">
            <?php echo $data_facture['ref_fac_c'];?>
          </h3>
        </div>
        <hr>

        <div class="row">
          <div class="col-xs-6">
            <address>
    				<strong>
    				Katsudo DM</strong><br>
    					Téléphone<br>
    					Mail<br>
    					Adresse 1<br>
    					Adresse 2<br>
    				</address>
          </div>

          <div class="col-xs-6 text-right">
            <address>
        			<strong>Client :</strong><br>
    					<?php
								echo 	$data_client['Nom_c'].' '.$data_client['Prenom_c'].'</br>'.
											$data_client['Tel_c'].'</br>'.
											$data_client['Email_c'].'</br>'.
											$data_client['Adresse_c'].'</br>';
							?>
    				</address>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
        </div>

        <div class="col-xs-6 text-right">
          <address>
    					<strong>Date Facture:</strong><br>
    					<?php echo $data_facture['date_emi_fac_c'];?>
    					<br><br>
    				</address>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><strong>Récapitulatif</strong></h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-condensed">
              <thead>
                <tr>
                  <td><strong>Référence</strong></td>
                  <td><strong>Description</strong></td>
                  <td class="text-center"><strong>Quantité</strong></td>
                  <td class="text-right"><strong>Total HT</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php 
                  echo $produits;
                 ?>
                  
                <tr>
                  <td class="thick-line"></td>
                  <td class="thick-line"></td>
                  <td class="thick-line text-center"><strong>Prix HT</strong></td>
                  <td class="thick-line text-right">
                    <?php echo $total_ht;?>
                  </td>
                </tr>
                <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>TVA</strong></td>
                  <td class="no-line text-right">
                    <?php echo round($total_ht * ($tva/100));?>
                  </td>
                </tr>
                <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>Prix TTC</strong></td>
                  <td class="no-line text-right">
                    <?php echo $total_ht + round($total_ht * ($tva/100));?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <hr>
  <div class="invoice-title">
    <p class="centre">Coordonnées légales</p>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

  <script class="pdfMute">
    var specialElementHandlers = {
      '.pdfMute': function(element, renderer) {
        return true;
      }
    };


    let doc = new jsPDF('p', 'pt', 'a4');
    
    
    doc.addHTML(document.body, function() {
      // Décommente pour DL la facture
      doc.save('Facture <?php echo $data_facture['ref_fac_c'] ?>');
    });
    window.close();
    //document.location.href = red

  </script>
</body>

</html>
