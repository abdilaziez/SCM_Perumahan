<?php

// if(isset($_SESSION['log'])){

// } else {
//     header ('location: Login.php');
// }

require 'function.php';

$email = mysqli_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string($conn, $_POST['password']);

//cek email, terdaftar atau tidak
$cek_email = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'");
$email_valid = mysqli_fetch_array($cek_email);
//uji jika email terdaftar
if($email_valid){
    //jika email terdaftar
    //cek password sesuai atau tidak
    if($password == $email_valid['password']){
        //jika password sesuai
        //buat session
        $_SESSION['iduser'] = $email_valid['iduser'];
        $_SESSION['level'] = $email_valid['level'];
        $_SESSION['login'] = true;


        //uji level email
        if($email_valid['level'] == "developer"){
            header('location:admin.php');
        } elseif ($email_valid['level'] == "customer") {
            header('location:progres.php');
        } elseif ($email_valid['level'] == "material") {
            header('location:admin_material.php');
        } elseif ($email_valid['level'] == "pln") {
            header('location:admin_pln.php');
        } elseif ($email_valid['level'] == "pdam") {
            header('location:admin_pdam.php');
        }
    } else{
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!! ');document.location='login.php'</script>";} 
    } else{
    echo "<script>alert('Maaf, Login Gagal, Email anda tidak terdaftar!! ');
    document.location='login.php'</script>";
}

?>