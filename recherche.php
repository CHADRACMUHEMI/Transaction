<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>http:Sabmit to cach</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome-free-6.1.1-web - Copie/css/all.min.css">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h6 class="text-light">Admin</h6>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.html" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="form_categorie.php" class="nav-link scrollto active"><i class="fas fa-plus-circle"></i> <span>Catégorie operation</span></a></li>
          <li><a href="vue_categoriecompte.php" class="nav-link scrollto"><i class="fas fa-plus-circle"></i> <span>Catégorie compte</span></a></li>
          <li><a href="form_d_epargne.php" class="nav-link scrollto"><i class="fas fa-file-invoice-dollar"></i> <span>EPARGNE</span></a></li>

        </ul>
      </nav>
    </div>
  </header>

  <main id="main">
    <div class="container text-secondary">
    <div class="col col-md-11 mx-11 shadow-lg">
                <h2 class="text-center py-3" style="color: #149ddd;">Opération</h2>
                <form method="post" action="">
         
            <div class="row mx-2">
                <div class="container text-secondary">
                  <h3 class="text-secondary">Rechercher un client</h3>
                    <p>rechercher un client pour effectuer des opérations!</p>
                </div>

                
                <div class="col-md-12">
                    <label class="form-label" for="">Nom</label>
                    <input name="nom" class="form-control" type="text">
                </div>

                <div class="col-md-6 py-3">
                    <button name="enregistrer" type="submit" class="btn text-white" style="background: #149ddd;">Enregistrer</button>
                </div>
                
            </div>
            <?php

                if(isset($_POST['nom'])){
                    $nom=$_POST['nom'];
                    include("connexion.php");
                     $req=$con->query("SELECT * FROM client WHERE nom LIKE '%".$nom."%'");
                    while($rep=$req->fetch()){
                        ?>
                            <a href="form_operation.php?id=<?php echo $rep['idclient']; ?>" style="width:90%;margin-bottom: 15px;" class="btn btn-success"><?php echo $rep['nom']." ".$rep['postnom']; ?></a>
                        <?php
                    }
                }
               
            ?>
          </form>

            </div>
    </div>
  </main>


  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script> 


</body>

</html>