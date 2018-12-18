<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Profile Matching - Kenaikan Pangkat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">SPK - Profile Matching untuk Kenaikan Jabatan</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <span class="nav-link-text">Home</span>
          </a>
        </li>
          <?php if(isset($_SESSION["username"])) {
          ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
             data-parent="#exampleAccordion">
            <span class="nav-link-text">Manage Kandidat</span>
          </a>
                      <ul class="sidenav-second-level collapse" id="collapseComponents">
                          <li>
                              <a href="kandidat_manage.php">Manage</a>
                          </li>
                          <li>
                              <a href="kandidat_form_insert.php">Tambah</a>
                          </li>
                      </ul>
        </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                  <a class="nav-link" href="do_pm.php">
                      <span class="nav-link-text">Lakukan Perhitungan</span>
                  </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                  <a class="nav-link" href="kriteria_manage.php">
                      <span class="nav-link-text">Ganti Ketentuan Bobot dan Nilai Acuan Kriteria dan Sub Kriteria</span>
                  </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                  <a class="nav-link" href="bobot_selisih.php">
                      <span class="nav-link-text">Lihat Bobot Selisih</span>
                  </a>
              </li>
              <?php
          }?>
      </ul>

      <ul class="navbar-nav ml-auto">

       
        <?php if(isset($_SESSION["nama"])) { ?>
          <li class="nav-item">
          <a class="nav-link"><?php echo "Welcome: ". $_SESSION["nama"]; ?></a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="proseslogout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-sign-out"></i>Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">