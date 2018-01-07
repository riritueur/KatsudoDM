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

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="invoice-title">
          <img src="../ressource/image/DM_logo.svg" alt="logo" width="60" height="60" />
          <h2>Facture</h2>
          <h3 class="pull-right">
            <?php echo "\$_POST['numFacture']";?>
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
    					ID facture
    				</address>
          </div>

          <div class="col-xs-6 text-right">
            <address>
        			<strong>Client :</strong><br>
    					Nom Prenom<br>
    					Référence client<br>
    					Téléphone<br>
    					Mail<br>
    					Adresse 1<br>
    					Adresse 2
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
    					<?php echo "\$_POST['date_emi']";?>
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
                  <td class="text-center"><strong>Désignation</strong></td>
                  <td class="text-center"><strong>Quantité</strong></td>
                  <td class="text-right"><strong>Total HT</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php 
                  // Affichage des Produits en fonction de $_POST
                  // avec un foreach ou un for
                  echo '<tr>
                    <td>BS-1000</td>
                    <td class="text-center">$produit</td>
                    <td class="text-center">$qte</td>
                    <td class="text-right">$totalHT</td>
                  </tr>';
                  ?>
                <tr>
                    <td>BS-1000</td>
                    <td class="text-center">$produit</td>
                    <td class="text-center">$qte</td>
                    <td class="text-right">$totalHT</td>
                  </tr>
                  <tr>
                    <td>BS-1000</td>
                    <td class="text-center">$produit</td>
                    <td class="text-center">$qte</td>
                    <td class="text-right">$totalHT</td>
                  </tr>
                  
                <tr>
                  <td class="thick-line"></td>
                  <td class="thick-line"></td>
                  <td class="thick-line text-center"><strong>Prix HT</strong></td>
                  <td class="thick-line text-right">
                    <?php echo "\$_POST['totalHT']";?>
                  </td>
                </tr>
                <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>TVA</strong></td>
                  <td class="no-line text-right">
                    <?php echo "\$_POST['tva']";?>
                  </td>
                </tr>
                <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>Prix TTC</strong></td>
                  <td class="no-line text-right">
                    <?php echo "\$_POST['totalTTC']";?>
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
      doc.save('Facture ' /** + numFacture **/);
    });

    //document.location.href = red

  </script>
</body>

</html>
