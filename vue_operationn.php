<!DOCTYPE html>
<html lang="fr">

<?php
@$caisse=$_COOKIE["caisse"];
$caisse=unserialize($caisse);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB to cash management</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <a class="nav-link">
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
                    <span>Catégorie</span>
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                        <h4 style="color: #149ddd;"><strong>SUBMIT TO CASH MANAGEMENT</strong></h4>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                     

                        <div class="topbar-divider d-none d-sm-block"></div>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #149ddd;font-size:18px;"><span class="fas fa-list-ul"></span> Liste d'operation effectue <span><a class="btn btn-outline-danger" href="form_operationn.php"><span><i class="fas fa-folder-plus"></i></span> Ajoutez un operation</a></span></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="color: #149ddd;">N° </th>
                                            <th style="color: #149ddd;">Catecorie operation</th>
                                            <th style="color: #149ddd;">Compte client</th>
                                            <th style="color: #149ddd;">Montant</th>
                                            <th style="color: #149ddd;">Date</th>
                                            <th style="color: #149ddd;">Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                            include("connexion.php");
                                                $recup=$con->query("SELECT * FROM `operation` INNER JOIN categorieoperation ON categorieoperation.id_categorieoperation = operation.id_categorieoperation INNER JOIN compte ON compte.id_compte = operation.id_compte JOIN client ON compte.idclient = client.idclient");
                                                while($resultat=$recup->fetch()){
                                        ?>
                                        <tr>
                                        <td><?php echo $resultat["id_operation"];?></td>
                                            <td><?php echo $resultat["nom_categorieoperation"];?></td>
                                            <td><?php echo $resultat["nom"]." ".$resultat["postnom"];?></td>
                                            <td><?php echo $resultat["montant"];?></td>
                                            <td><?php echo $resultat["date_operation"];?></td>
                                            <td>
                                                <a class="btn" href="modifie_operation"><i class="fas fa-edit " style="color: #149ddd;"></i></a>
                                                <a class="btn" href="delete_operation.php?id_operation=<?php echo $resultat["id_operation"]; ?>"><i class="fas fa-trash text-danger"></i></a>
                                                <a class="btn" href="rapportfacture.php?operation=<?php echo $resultat["id_operation"];?>"><i class="fas fa-print text-success"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                     }
                                     ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> &copy; submit to cash management 2024</span>
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
                    <a class="btn text-white" style="background: #149ddd;" href="deconnexion.php">Oui</a>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

<?php }
   else{
    header("location: login.php");
   }
    ?>
</html>