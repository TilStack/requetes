<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        include_once './database.php';
        $_SESSION["active"] = false;
        $database = new Database();
        $db = $database->getConnection();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="./plugins/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="./homeAdmin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Accueil</p>
            </a>
          </li>          
          <li class="nav-header">PRODUITS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Ventes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="homeAdmin.php?page=produit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>produit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homeAdmin.php?page=listproduitvendu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produit Vendus</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">CLIENTS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Clients
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="homeAdmin.php?page=ajoutclient" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Clients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homeAdmin.php?page=listclient" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Clients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homeAdmin.php?page=listclientacheter" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client ayant acheté un produit</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Vendeurs</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                vendeurs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="homeAdmin.php?page=ajoutvendeur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter vendeur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homeAdmin.php?page=listvendeur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List vendeur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homeAdmin.php?page=listvendeurvendu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client ayant vendu un produit</p>
                </a>
              </li>
            </ul>
          </li>          
          <li class="nav-header">Other</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="homeAdmin.php?page=editprofile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homeAdmin.php?page=profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./login.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Déconnexion</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php
      @$page="./".$_GET["page"];
      if($page!="./")
      $page =$page.".php";
      else
      $page="./dashboard.php";
      include_once($page);
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script src="./assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
</body>
</html>
