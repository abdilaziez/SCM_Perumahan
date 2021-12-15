<?php

session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","data_scm");

//menambah Form Pembangunan
if(isset($_POST['addnewform'])){
    $namapelanggan = $_POST['namapelanggan'];
    $deskripsirumah = $_POST['deskripsirumah'];
    $deskripsimaterial = $_POST['deskripsimaterial'];
    $deskripsipdam = $_POST['deskripsipdam'];
    $deskripsipln = $_POST['deskripsipln'];

    // ambil data file
    $namaFile = $_FILES['fileToUpload']['name'];
    $namaSementara = $_FILES['fileToUpload']['tmp_name'];
 
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "barang/";
    $namaGabung = $dirUpload.$namaFile;
    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    } else {
        echo "Upload Gagal!";
    }

    $addtotable = mysqli_query($conn,"insert into stock (namapelanggan, deskripsirumah, deskripsimaterial, deskripsipdam, deskripsipln, image) values('$namapelanggan','$deskripsirumah','$deskripsimaterial','$deskripsipdam','$deskripsipln','$namaGabung')");

    if($addtotable){
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    }
}

//menambah progres masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $estimasi  = $_POST['estimasi'];
    $status = $_POST['status'];

    // ambil data file
    $namaFile2 = $_FILES['dokumentasi']['name'];
    $namaSementara2 = $_FILES['dokumentasi']['tmp_name'];
 
    // tentukan lokasi file akan dipindahkan
    $dirUpload2 = "barang/";
    $namaGabung2 = $dirUpload2.$namaFile2;
    // pindahkan file
    $terupload2 = move_uploaded_file($namaSementara2, $dirUpload2.$namaFile2);

    if ($terupload2) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload2.$namaFile2."'>".$namaFile2."</a>";
    } else {
        echo "Upload Gagal!";
    }

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, estimasi, status, dokumentasi) values('$barangnya','$estimasi','$status','$namaGabung2')");

    if($addtomasuk){
        header('location:form_progres.php');
    } else {
        echo'Gagal';
        header('location:form_progres.php');
    }
}

//menambah data administrasi
if(isset($_POST['adminmasuk'])){
    $barangnya = $_POST['barangnya'];
    $dataPemesan  = $_POST['dataPemesan'];

    // ambil data file
    $namaFile1 = $_FILES['buktiPerjanjian']['name'];
    $namaFile2 = $_FILES['buktiPelunasan']['name'];
    $namaSementara1 = $_FILES['buktiPerjanjian']['tmp_name'];
    $namaSementara2 = $_FILES['buktiPelunasan']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload1 = "administrasi/";
    $dirUpload2 = "administrasi/";
    $namaGabung1 = $dirUpload1.$namaFile1;
    $namaGabung2 = $dirUpload2.$namaFile2;

    // pindahkan file
    $terupload1 = move_uploaded_file($namaSementara1, $dirUpload1.$namaFile1);
    $terupload2 = move_uploaded_file($namaSementara2, $dirUpload1.$namaFile2);

    if ($terupload1&&$terupload2) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload1.$namaFile1."'>".$namaFile1."</a>";
        echo "Link: <a href='".$dirUpload2.$namaFile2."'>".$namaFile2."</a>";
   
    } else {
        echo "Upload Gagal!";
    }

    $tambahadmin = mysqli_query($conn,"INSERT INTO keluar (idbarang, dataPemesan, buktiPerjanjian, buktiPelunasan) VALUES('$barangnya','$dataPemesan','$namaGabung1', '$namaGabung2')");

    if($tambahadmin){
        header('location:administrasi.php');
    } else {
        echo'Gagal';
        header('location:administrasi.php');
    }
}

//update info barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namapelanggan = $_POST['namapelanggan'];
    $deskripsirumah = $_POST['deskripsirumah'];
    $deskripsimaterial = $_POST['deskripsimaterial'];
    $deskripsipdam = $_POST['deskripsipdam'];
    $deskripsipln = $_POST['deskripsipln'];
    // ambil data file
    $namaFile = $_FILES['fileToUpload']['name'];
    $namaSementara = $_FILES['fileToUpload']['tmp_name'];
 
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "barang/";
    $namaGabung = $dirUpload.$namaFile;

    $update = mysqli_query($conn, "update stock set namapelanggan='$namapelanggan', deskripsirumah='$deskripsirumah', deskripsimaterial='$deskripsimaterial', deskripsipdam='$deskripsipdam', deskripsipln='$deskripsipln', image='$namaFile' where idbarang = '$idb'");
    if($update){
        // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "barang/".$_FILES["fileToUpload"]["name"]);
        move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        header('location:admin.php');
    }else{
        echo 'Gagal';
        header('location:admin.php');
    }
}


//hapus barang
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];
    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:admin.php');
    }else{
        echo 'Gagal';
        header('location:admin.php');
    }
}
?>