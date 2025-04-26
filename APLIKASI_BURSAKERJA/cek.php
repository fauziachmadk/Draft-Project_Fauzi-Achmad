<?php
//Panggil Koneksi Database
include 'function.php';

$email = mysqli_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string($conn, $_POST['password']);
$level = mysqli_escape_string($conn, $_POST['level']);

//Cek Email, ada atau tidak
$cek_user = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email' and level = '$level'");
$user_valid = mysqli_fetch_array($cek_user);

//Uji jika email terdaftar
if($user_valid){
    //cek password
    if($password == $user_valid['password']){
        //jika password sesuai
        session_start();
        $_SESSION['email'] = $user_valid['email'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //Uji level user
        if($level == "admin"){
            header('location:index.php');
        } elseif($level == "perusahaan"){
            header('location:index_perusahaan.php');

        } elseif($level == "siswa"){
            header('location:index_siswa.php');

        }
    }else{
        echo "<script>alert('Maaf Login Gagal, Password Anda Tidak Sesuai!');
        document.location='login.php'</script>";
    }
}else{
    echo "<script>alert('Maaf Login Gagal, Email atau Kategori Anda Tidak Sesuai!');
    document.location='login.php'</script>";
}





?>