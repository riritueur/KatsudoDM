<?php include('../include/session.php'); ?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
     <a class="block" href="index.php"><img src="../ressource/image/DM_logo.svg" alt="logo" class="logo" width="50" /></a>
    
    <a class="navbar-brand" href="index.php">Katsudo DM</a>
  </div>
  <!-- /.navbar-header -->

  <ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Bonjour <?php echo $_COOKIE['login']; ?>
        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> 
        
                    </a>
      <ul class="dropdown-menu dropdown-user">
        <li><a href="deconnexion.php"><i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a>
        </li>
      </ul>
      <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->

  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li>
          <a href="index.php"><i class="fa fa-tasks fa-fw"></i> Tableau de bord</a>
        </li>
        <li>
          <a href="client.php"><i class="fa fa-users fa-fw"></i> Clients</a>
        </li>
        <li>
          <a href="employe.php"><i class="fa fa-building fa-fw"></i> Employés</a>
        </li>
        <li>
          <a href="fournisseur.php"><i class="fa fa-truck fa-fw"></i> Fournisseurs</a>
        </li>
        <li>
          <a href="produit.php"><i class="fa fa-shopping-cart fa-fw"></i> Produits</a>
        </li>
        <li>
          <a href="taxe.php"><i class="fa fa-usd fa-fw"></i> Taxes</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-file-text fa-fw"></i> Factures<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="facture-client.php"><i class="fa fa-users fa-fw"></i> Clients</a>
            </li>
            <li>
              <a href="facture-fournisseur.php"><i class="fa fa-truck fa-fw"></i> Fournisseurs</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>