<?php

require  'function.php';

if ( !isset($_SESSION["login"]) ) {
    if($_SESSION['level'] == "developer"){
        header('location:admin.php');
    } elseif ($_SESSION['level'] == "customer") {
        header('location:progres.php');
    } elseif ($_SESSION['level'] == "material") {
        header('location:admin_material.php');
    } elseif ($_SESSION['level'] == "pln") {
        header('location:admin_pln.php');
    } elseif ($_SESSION['level'] == "pdam") {
        header('location:admin_pdam.php');
    }
    exit;
}

if ($_SESSION['level'] == "developer") {
    header('location:admin.php');
} elseif ($_SESSION['level'] == "material") {
    header('location:admin_material.php');
} elseif ($_SESSION['level'] == "pln") {
    header('location:admin_pln.php');
} elseif ($_SESSION['level'] == "pdam") {
    header('location:admin_pdam.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php">Garden Village</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="langkah.php">Langkah</a></li>
                            <li class="nav-item"><a class="nav-link" href="progres.php">Progres</a></li>
                            <?php 
                            
                            if(!$_SESSION['login']){
                                echo '<li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="Logout.php">Logout</a></li>';
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">Progres Pembangunan</h1>
                                <p class="lead fw-normal text-muted mb-0">Disini anda dapat melihat progres pembangunan dari setiap bulan sudah sampai apa pengerjaannya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <?php
                            $iduser = $_SESSION['iduser'];
                            $ambilsemuadatanya = mysqli_query($conn,"SELECT * FROM masuk WHERE iduser = '$iduser'");
                            $fetcharray1 = mysqli_fetch_array($ambilsemuadatanya);
                            if($fetcharray1){
                                $i=0;
                                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                                    $i++;
                                    $estimasi = $fetcharray['estimasi'];
                                    $status = $fetcharray['status'];
                                    $dokumentasi = $fetcharray['dokumentasi'];
                                
                        ?>

                        <div class="col-md-4"><?=$fetcharray[0];?><img class="img-fluid rounded-3 mb-5" src="<?=$dokumentasi;?>" alt="..." /></div>

                        <?php
                                };
                            }else {
                        ?>
                        <label for="">HALLO BELUM ADA DATA</label>
                        <?php
                        
                            };
                        ?>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <p class="lead fw-normal text-muted">Semoga pelayanan kami dapat memberikan kenyamanan untuk anda memantau progres pembangunan rumah yang anda inginkan.</p>
                                <!-- <a class="text-decoration-none" href="#!">
                                    View project
                                    <i class="bi-arrow-right"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
