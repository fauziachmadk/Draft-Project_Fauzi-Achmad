<?php

//membuat koneksi database
$conn = mysqli_connect("localhost","root","","bursakerja");

//Menambah Data Baru Tabel Pelamar
if(isset($_POST["tambahpelamar"])){
    $nispelamar = $_POST["nispelamar"];
    $namapelamar = $_POST["namapelamar"];
    $jenkel = $_POST["jenkel"];
    $tanggallahir = $_POST["tanggallahir"];
    $alamat = $_POST["alamat"];
    $notelepon = $_POST["notelepon"];
    $email = $_POST["email"];

    $addtotabelpelamar2 = mysqli_query($conn,"select * from pelamar WHERE nispelamar='$nispelamar'");
    $cekpelamar = $addtotabelpelamar2->num_rows;

    if($cekpelamar>0){
        echo "<script>alert('Data Pelamar Sudah Ada!');
        document.location='index_siswa.php'</script>";
    } else{

        $addtotabelpelamar = mysqli_query($conn,"insert into pelamar
        (nispelamar, namapelamar, jenkel, tanggallahir, alamat, notelepon, email) 
        values('$nispelamar','$namapelamar','$jenkel','$tanggallahir','$alamat','$notelepon','$email')");
        if($addtotabelpelamar){
            header('location:index_siswa.php');
        } else {
            echo 'gagal';
            header('location:index_siswa.php');
        }
    }
}

//Menambah Data Baru Tabel Perusahaan
if(isset($_POST["tambahperusahaan"])){
    $namaperusahaan = $_POST["namaperusahaan"];
    $deskripsi = $_POST["deskripsi"];
    $alamatperusahaan = $_POST["alamatperusahaan"];
    $noteleponperusahaan = $_POST["noteleponperusahaan"];
    $emailperusahaan = $_POST["emailperusahaan"];
    $posisidibutuhkan = $_POST["posisidibutuhkan"];
    $gaji = $_POST["gaji"];
    $keterangan = $_POST["keterangan"];

    $addtotabelperusahaan = mysqli_query($conn,"insert into daftarperusahaan
    (namaperusahaan, deskripsi, alamatperusahaan, noteleponperusahaan, emailperusahaan, posisidibutuhkan, gaji, keterangan) 
    values('$namaperusahaan','$deskripsi','$alamatperusahaan','$noteleponperusahaan','$emailperusahaan','$posisidibutuhkan','$gaji','$keterangan')");
    if($addtotabelperusahaan){
        header('location:perusahaan_perusahaan.php');
    } else {
        header('location:index_perusahaan.php');
    }

}

//Menambah Data Baru Tabel Riwayat
if(isset($_POST["tambahriwayat"])){
    $riwayat_nispelamar = $_POST["riwayat_nispelamar"];
    $riwayat_namapelamar = $_POST["riwayat_namapelamar"];
    $perusahaanpelamar = $_POST["perusahaanpelamar"];
    $posisipelamar = $_POST["posisipelamar"];
    $no_teleponriwayat = $_POST["no_teleponriwayat"];
    $status = $_POST["status"];

    //Input File
    $allowed_extension = array('pdf');
    $nama = $_FILES['dokumen']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['dokumen']['size'];
    $file_tmp = $_FILES['dokumen']['tmp_name'];

    //Penamaan File
    $dokumen = md5(uniqid($nama,true) . time()).'.'.$ekstensi;


    $addtotabelriwayat2 = mysqli_query($conn,"select * from riwayat WHERE riwayat_nispelamar='$riwayat_nispelamar'");
    $cek = mysqli_num_rows($addtotabelriwayat2);

    if($cek<1){
        //upload file
        if(in_array($ekstensi, $allowed_extension) === true){
            //validasi ukuran
            if($ukuran < 100000000){
                move_uploaded_file($file_tmp, 'dokumen/'.$dokumen);

                $addtotabelriwayat = mysqli_query($conn,"insert into riwayat
                (riwayat_nispelamar, riwayat_namapelamar, perusahaanpelamar, posisipelamar, no_teleponriwayat, status, dokumen) 
                values('$riwayat_nispelamar','$riwayat_namapelamar','$perusahaanpelamar','$posisipelamar','$no_teleponriwayat','$status','$dokumen')");
                if($addtotabelriwayat){
                    header('location:riwayat_siswa.php');
                } else {
                    header('location:perusahaan_siswa.php');
                }
            } else{
                //jika ukuran melebihi batas
                echo "<script>
                        alert('Ukuran File Anda Terlalu Besar');
                        document.location='perusahaan_siswa.php'
                </script>";
            }
        } else{
            //jika file tidak pdf
            echo "<script>
                alert('File Harus Berupa PDF');
                document.location='perusahaan_siswa.php'
            </script>";
        }

    } else{
        //jika sudah ada
        echo "<script>
                alert('Anda Sudah Melakukan Pelamaran, Mohon Untuk Menunggu Proses Pelamaran Dengan Perusahaan Sebelumnya Hingga Selesai');
                document.location='perusahaan_siswa.php'
            </script>";
    }
};



//Update Data Pada Tabel Pelamar
if(isset($_POST["updatepelamar"])){
    $idpelamar = $_POST["idpelamar"];
    $nispelamar = $_POST["nispelamar"];
    $namapelamar = $_POST["namapelamar"];
    $jenkel = $_POST["jenkel"];
    $tanggallahir = $_POST["tanggallahir"];
    $alamat = $_POST["alamat"];
    $notelepon = $_POST["notelepon"];
    $email = $_POST["email"];

    $updatetabelpelamar = mysqli_query($conn,"update pelamar set
    nispelamar='$nispelamar', namapelamar='$namapelamar', jenkel='$jenkel', tanggallahir='$tanggallahir', alamat='$alamat', 
    notelepon='$notelepon', email='$email' where idpelamar='$idpelamar'");
    if($updatetabelpelamar){
        header('location:index_siswa.php');
    } else {
        echo 'gagal';
        header('location:index_siswa.php');
    }

}

//Delete Data Pada Tabel Pelamar
if(isset($_POST["deletepelamar"])){
    $idpelamar = $_POST["idpelamar"];


    $deletetabelpelamar = mysqli_query($conn,"delete from pelamar where idpelamar='$idpelamar'");
    if($deletetabelpelamar){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:perusahaan.php');
    }

}

//Update Data Pada Tabel Perusahaan
if(isset($_POST["updateperusahaan"])){
    $idperusahaan = $_POST["idperusahaan"];
    $namaperusahaan = $_POST["namaperusahaan"];
    $deskripsi = $_POST["deskripsi"];
    $alamatperusahaan = $_POST["alamatperusahaan"];
    $noteleponperusahaan = $_POST["noteleponperusahaan"];
    $emailperusahaan = $_POST["emailperusahaan"];
    $posisidibutuhkan = $_POST["posisidibutuhkan"];
    $gaji = $_POST["gaji"];
    $keterangan = $_POST["keterangan"];

    $updatetabelperusahaan = mysqli_query($conn,"update daftarperusahaan set
    namaperusahaan='$namaperusahaan', deskripsi='$deskripsi', alamatperusahaan='$alamatperusahaan', noteleponperusahaan='$noteleponperusahaan', 
    emailperusahaan='$emailperusahaan', posisidibutuhkan='$posisidibutuhkan', gaji='$gaji', keterangan='$keterangan' where idperusahaan='$idperusahaan'");
    if($updatetabelperusahaan){
        header('location:perusahaan_perusahaan.php');
    } else {
        echo 'gagal';
        header('location:index_perusahaan.php');
    }

}

//Delete Data Pada Tabel Perusahaan
if(isset($_POST["deleteperusahaan"])){
    $idperusahaan = $_POST["idperusahaan"];


    $deletetabelperusahaan = mysqli_query($conn,"delete from daftarperusahaan where idperusahaan='$idperusahaan'");
    if($deletetabelperusahaan){
        header('location:perusahaan.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }

}


//Update Data Pada Tabel Riwayat
if(isset($_POST["updateriwayat"])){
    $idriwayat = $_POST["idriwayat"];
    $riwayat_nispelamar = $_POST["riwayat_nispelamar"];
    $riwayat_namapelamar = $_POST["riwayat_namapelamar"];
    $perusahaanpelamar = $_POST["perusahaanpelamar"];
    $posisipelamar = $_POST["posisipelamar"];
    $no_teleponriwayat = $_POST["no_teleponriwayat"];
    $status = $_POST["status"];

    //Input File
    $allowed_extension = array('pdf');
    $nama = $_FILES['dokumen']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['dokumen']['size'];
    $file_tmp = $_FILES['dokumen']['tmp_name'];

    //Penamaan File
    $dokumen = md5(uniqid($nama,true) . time()).'.'.$ekstensi;

    if($ukuran==0){
        //Jika Tidak Ada CV
        $updatetabelriwayat = mysqli_query($conn,"update riwayat set 
        riwayat_nispelamar='$riwayat_nispelamar', riwayat_namapelamar='$riwayat_namapelamar', perusahaanpelamar='$perusahaanpelamar', 
        posisipelamar='$posisipelamar', no_teleponriwayat='$no_teleponriwayat', status='$status' where idriwayat='$idriwayat'");
        if($updatetabelriwayat){
            header('location:riwayat_siswa.php');
        } else {
            echo 'gagal';
            header('location:index_siswa.php');
        }
    } else{
        //Jika Ada CV
        move_uploaded_file($file_tmp, 'dokumen/'.$dokumen);
        $updatetabelriwayat = mysqli_query($conn,"update riwayat set 
        riwayat_nispelamar='$riwayat_nispelamar', riwayat_namapelamar='$riwayat_namapelamar', perusahaanpelamar='$perusahaanpelamar', 
        posisipelamar='$posisipelamar', no_teleponriwayat='$no_teleponriwayat', status='$status', dokumen='$dokumen' where idriwayat='$idriwayat'");
        if($updatetabelriwayat){
            header('location:riwayat_siswa.php');
        } else {
            echo 'gagal';
            header('location:index_siswa.php');
        }
    }

}

//Delete Data Pada Tabel Riwayat
if(isset($_POST["deleteriwayat"])){
    $idriwayat = $_POST["idriwayat"];

    $deletetabelriwayat = mysqli_query($conn,"delete from riwayat where idriwayat='$idriwayat'");
    if($deletetabelriwayat){
        header('location:riwayat.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }

}

?>