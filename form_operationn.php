<!DOCTYPE html>
<?php
@$caisse=$_COOKIE["caisse"];
$caisse=unserialize($caisse);
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB to casch magement</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
    if(isset($_COOKIE["caisse"])){
        ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-usps"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB 2 C M</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-bars"></i>
                    <span><strong>Menu</strong></span></a>
            </li>

            <hr class="sidebar-divider my-0">

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-home"></i>
                    <span><strong>Accueil</strong></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Categorie</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tout le categorie sont:</h6>
                        <a class="collapse-item" href=""><span class="text-danger">Pas d'accès</span> Cat compte</a>
                        <a class="collapse-item" href=""><span class="text-danger">Pas d'accès</span> Cat operation</a>
                        <a class="collapse-item" href="vue_operationn.php">Operation</a>
                        <a class="collapse-item" href=""> <span class="text-danger">Pas d'accès</span> application</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user"></i>
                    <span><strong>User</strong></span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Creation de compte:</h6>
                        <a class="collapse-item" href=""><span class="text-danger">Pas d'accès</span> Client</a>
                        <a class="collapse-item" href=""><span class="text-danger">Pas d'accès</span> Crée Compte</a>
                        <a class="collapse-item" href=""><span class="text-danger">Pas d'accès</span> Ajouter User</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                        <h4 style="color: #149ddd;"><strong>SUBMIT TO CASH MANAGEMENT</strong></h4>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $caisse["fonction"] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="form_connexion.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Deconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <main id="main">
    <div class="container text-secondary">
    <div class="col col-md-11 mx-11 shadow-lg">
                <form method="post" action="">
            <?php
            include("save_operation2.php");
            ?>
            <div class="row mx-2">
                <div class="container text-secondary">
                  <h3 style="color: #149ddd;">Operation des clients</h3>
                    <p>vous povouver effectuer une ou plusiere operation merci!</p>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="">Categorie operation</label>
                    <select class="form-control" name="id_categorieoperation" id="compteclient" onchange="MontreSelect()">
                    <?php
                            include("connexion.php");
                            $req=$con->query(" SELECT * FROM `categorieoperation`");
                            while($resultat=$req->fetch()){
                    ?>
                            <option value="<?php echo $resultat['id_categorieoperation']; ?>">
                            <?php echo $resultat['nom_categorieoperation'];  ?>
                            </option>
                        <?php
                            }
                            ?>
                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="">User</label>
                    <select  class="form-control" name="id_compteuser" id="">
                    <?php
                            include("connexion.php");
                            $req=$con->query(" SELECT * FROM `compteutilisateur`");
                            while($resultat=$req->fetch()){
                    ?>
                            <option value="<?php echo $resultat['id_compteuser']; ?>">
                            <?php echo $resultat['pseudo'];  ?>
                            </option>
                        <?php
                            }
                            ?>

                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="">Compte client</label>
                    <select class="form-control " name="id_compte" id="">
                      
                    <?php
                            include("connexion.php");
                            $req=$con->query("SELECT DISTINCT compte.id_compte,client.nom,client.postnom FROM compte,client WHERE compte.idclient=client.idclient ");
                            while($resultat=$req->fetch()){
                    ?>
                            <option value="<?php echo $resultat['id_compte']; ?>">
                            <?php echo $resultat['id_compte'].": ".$resultat['nom']." ". $resultat['postnom'];  ?>
                            </option>
                        <?php
                            }
                            
                           
                            ?>

                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label d-none" for="" id="client">Compte client receveur</label>
                    <select class="form-control d-none" name="id_comptereceveur" id="comptereceveur">
                      
                    <?php
                            include("connexion.php");
                            $req=$con->query("SELECT DISTINCT compte.id_compte,client.nom,client.postnom FROM compte,client WHERE compte.idclient=client.idclient");
                            while($resultat=$req->fetch()){
                    ?>
                            <option value="<?php echo $resultat['id_compte']; ?>">
                            <?php echo $resultat['id_compte'].": ".$resultat['nom']." ". $resultat['postnom'];  ?>
                            </option>
                        <?php
                            }
                            
                           
                            ?>

                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="">Montant</label>
                    <input name="montant" class="form-control" type="number">
                </div>

                <div class="col-md-6 py-3">
                    <button name="enregistrer" class="btn text-white" style="background: #149ddd;"><span><i class="fas fa-save"></i></span> Save</button>
                    <a class="btn btn-danger" href="form_operation.php"><span><i class="fas fa-times"></i></span> Annuler</a>
                </div>
                
            </div>
          </form>
          <script>
    // Récupération des éléments HTML
    var compteclient = document.getElementById("compteclient");
    var comptereceveur = document.getElementById("comptereceveur");
    var client = document.getElementById("client");

    // Fonction qui s'exécute lorsque l'utilisateur change la sélection
    compteclient.addEventListener("change", function () {
        var selectedValue = compteclient.value;

        // Si l'utilisateur sélectionne "virement", on affiche le select "comptereceveur"
        if (selectedValue === "3") {
            comptereceveur.classList.remove("d-none");
            client.classList.remove("d-none");
        } else {
            // Sinon, on le cache
            comptereceveur.classList.add("d-none");
            client.classList.add("d-none");
        }
    });
</script>


            </div>
    </div>
  </main>
                <!-- Begin Page Content -->
                <div class="container-fluid">


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> &copy; submit to casch management 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Message <span><i class="fas fa-exclamation text-danger"></i></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Voulez vous vraiment vous deconnecter sur cette page ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                    <a class="btn text-white" style="background: #149ddd;" href="login.php">Oui</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
   

</body>
<?php }
   else{
    header("location: login.php");
   }
    ?>
</html>