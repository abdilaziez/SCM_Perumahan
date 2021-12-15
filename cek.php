<?php

// if(isset($_SESSION['log'])){

// } else {
//     header ('location: Login.php');
// }

require 'function.php';

$email = mysqli_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string($conn, $_POST['password']);
$level = mysqli_escape_string($conn, $_POST['level']);

//cek email, terdaftar atau tidak
$cek_email = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email' and level='$level'");
$email_valid = mysqli_fetch_array($cek_email);
//uji jika email terdaftar
if($email_valid){
    //jika email terdaftar
    //cek password sesuai atau tidak
    if($password == $email_valid['password']){
        //jika password sesuai
        //buat session
        $_SESSION['email'] = $email_valid['email'];
        $_SESSION['level'] = $email_valid['level'];
        $_SESSION['login'] = true;


        //uji level email
        if($level == "developer"){
            header('location:admin.php');
        } elseif ($level == "customer") {
            header('location:progres.php');
        } elseif ($level == "material") {
            header('location:admin_material.php');
        } elseif ($level == "pln") {
            header('location:admin_pln.php');
        } elseif ($level == "pdam") {
            header('location:admin_pdam.php');
        }
    } else{
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!! ');document.location='login.php'</script>";} 
    } else{
    echo "<script>alert('Maaf, Login Gagal, Email anda tidak terdaftar!! ');
    document.location='login.php'</script>";
}

?>