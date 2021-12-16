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

if($_SESSION['level'] == "developer"){
    header('location:admin.php');
} elseif ($_SESSION['level'] == "customer") {
    header('location:progres.php');
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
        <title>Dashboard - Data Barang</title>
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
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Progres Pembangunan
                            </a>
                            <a class="nav-link" href="keluar.php">
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
                        <h1 class="mt-4">Data Pembangunan</h1>
                        
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
                                            <th>Id Pemesanan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Deskripsi Rumah</th>
                                            <th>Deskripsi Material</th>
                                            <th>Deskripsi PDAM</th>
                                            <th>Deskripsi PLN</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $namapelanggan = $data['namapelanggan'];
                                            $deskripsirumah = $data['deskripsirumah'];
                                            $deskripsimaterial = $data['deskripsimaterial'];
                                            $deskripsipdam = $data['deskripsipdam'];
                                            $deskripsipln = $data['deskripsipln'];
                                            $image = $data['image'];
                                            $idb = $data['idbarang'];

                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namapelanggan;?></td>
                                            <td><?=nl2br($deskripsirumah);?></td>
                                            <td><?=nl2br($deskripsimaterial);?></td>
                                            <td><?=nl2br($deskripsipdam);?></td>
                                            <td><?=nl2br($deskripsipln);?></td>
                                            <td><img width="100" src="<?=$image;?>" alt=""></td>
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

                                            <!--Edit Modal -->
                                            <div class="modal fade" id="edit<?=$idb;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Form</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="text" name="namapelanggan" value="<?=$namapelanggan;?>" class="form-control" required>
                                                            <br>
                                                            <textarea name="deskripsirumah" class="form-control" id="comment" rows="5" placeholder="Deskripsi Rumah"><?php echo $data['deskripsirumah'];?></textarea>
                                                            <br>
                                                            <textarea name="deskripsimaterial" class="form-control" id="comment" rows="5" placeholder="Deskripsi Material"><?php echo $data['deskripsimaterial'];?></textarea>
                                                            <br>
                                                            <textarea name="deskripsipdam" class="form-control" id="comment" rows="5" placeholder="Deskripsi PDAM"><?php echo $data['deskripsipdam'];?></textarea>
                                                            <br>
                                                            <textarea name="deskripsipln" class="form-control" id="comment" rows="5" placeholder="Deskripsi PLN"><?php echo $data['deskripsipln'];?></textarea>
                                                            <br>
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>

                                            <!--Delete Modal -->
                                            <div class="modal fade" id="delete<?=$idb;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Form</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Akan Menghapus Form <?=$namapelanggan;?>?
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapusbarang">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>

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
            <h4 class="modal-title">Form Pembangunan</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
        <input type="text" name="namapelanggan" placeholder="Nama Pelanggan" class="form-control" required>
        <br>
        <!-- <input type="text" name="deskripsi" placeholder="Deskripsi Rumah" class="form-control" required>
        <br> -->
        <textarea class="form-control"name="deskripsirumah" placeholder="Deskripsi Rumah"></textarea>
        <br>
        <textarea class="form-control"name="deskripsimaterial" placeholder="Deskripsi Material"></textarea>
        <br>
        <textarea class="form-control"name="deskripsipdam" placeholder="Deskripsi PDAM"></textarea>
        <br>
        <textarea class="form-control"name="deskripsipln" placeholder="Deskripsi PLN"></textarea>
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary" name="addnewform">Submit</button>
        </div>
        </form>

        </div>
    </div>
    </div>
</html>
