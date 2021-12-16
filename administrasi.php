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

if ($_SESSION['level'] == "customer") {
    header('location:progres.php');
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Developer - Form Administrasi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style_admin.css" rel="stylesheet" />
        <link href="css/styles_admin.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">Developer</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Form Pembangunan
                            </a>
                            <a class="nav-link" href="form_progres.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Progres Pembangunan
                            </a>
                            <a class="nav-link" href="administrasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Administrasi
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Administrasi</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah Form
                                </button>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Pemilik</th>
                                            <th>Data Pemilik</th>
                                            <th>Bukti Perjanjian</th>
                                            <th>Bukti Pelunasan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM keluar K, stock S where S.idbarang = K.idbarang");
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $tanggal = $data['tanggal'];
                                            $namapelanggan = $data['namapelanggan'];
                                            $dataPemesan = $data['dataPemesan'];
                                            $buktiPerjanjian = $data['buktiPerjanjian'];
                                            $buktiPelunasan = $data['buktiPelunasan'];
                                            $idb = $data['idbarang'];

                                        ?>
                                        <tr>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namapelanggan;?></td>
                                            <td><?=$dataPemesan;?></td>
                                            <td><img width="100" src="<?=$buktiPerjanjian;?>" alt=""></td>
                                            <td><img width="100" src="<?=$buktiPelunasan;?>" alt=""></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idb;?>">
                                                   Edit
                                                </button>
                                                <input type="hidden" name="idbarangygmaudihapus" value="<?=$idb;?>">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idb;?>">
                                                   Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts_admin.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Form Progres</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data">
        <div class="modal-body" >

        <select name="barangnya" class="form-select">
            <?php
                $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namapelanggannya = $fetcharray['namapelanggan'];
                    $idbarangnya = $fetcharray['idbarang'];
            ?>

            <option value="<?=$idbarangnya;?>"><?=$namapelanggannya;?></option>

            <?php
                }
            ?>
        </select>
        <br>
        <textarea class="form-control"name="dataPemesan" placeholder="Data Pemilik"></textarea>
        <br>
        <input type="file" name="buktiPerjanjian" id="buktiPerjanjian" class="form-control" required>
        <br>
        <input type="file" name="buktiPelunasan" id="buktiPelunasan" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary" name="adminmasuk">Submit</button>
        </div>
        </form>

        </div>
    </div>
    </div>

</html>
