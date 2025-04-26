<?php
require 'function.php';
session_start();
if(empty($_SESSION['email']) or empty($_SESSION['level'])){
  echo "<script>alert('Anda Harus Login Terlebih Dahulu!');
  document.location='login.php'</script>";
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
        <title>Daftar Pelamar | <?= $_SESSION['nama_lengkap']?></title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <h1><a class="navbar-brand" href="index_siswa.php">Bursa Kerja Khusus <br>SMK Telkom Jakarta</a></h1>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index_siswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Daftar Pelamar
                            </a>
                            <a class="nav-link collapsed" href="perusahaan_siswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Daftar Perusahaan
                            </a>
                            <a class="nav-link collapsed" href="riwayat_siswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Riwayat Pelamar
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
                <div class="container">
                <div class="jumbotron bg-primary text-white">
                    <h1 class="display-4">Hello, <b><?= $_SESSION['nama_lengkap']?></b></h1>
                    <p class="lead"> Selamat Datang, anda berhasil login sebagai, <b><?= $_SESSION['level']?></b></p>
                    <p class="lead"> Mohon untuk ananda <b>JIKA BELUM</b> mendaftar data pelamar segera untuk mendaftarkan diri! </p>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-danger" href="logout.php" role="button">Logout</a>
                </div>
                </div>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Pelamar</h1>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Daftarkan Diri Pelamar
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS Pelamar</th>
                                                <th>Nama Pelamar</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $ambilsemuadatapelamar = mysqli_query($conn, "select * from pelamar");

                                            $no = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatapelamar)){
                                                $nispelamar = $data["nispelamar"];
                                                $namapelamar = $data["namapelamar"];
                                                $jenkel = $data["jenkel"];
                                                $tanggallahir = $data["tanggallahir"];
                                                $alamat = $data["alamat"];
                                                $notelepon = $data["notelepon"];
                                                $email = $data["email"];
                                                $idpelamar = $data["idpelamar"];


                                            ?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?=$nispelamar;?></td>
                                                <td><?=$namapelamar;?></td>
                                                <td><?=$jenkel;?></td>
                                                <td><?=$tanggallahir;?></td>
                                                <td><?=$alamat;?></td>
                                                <td><?=$notelepon;?></td>
                                                <td><?=$email;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idpelamar;?>">
                                                    <b>More</b>
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$idpelamar;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h2 class="modal-title">Edit Data Pelamar</h2>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    <h6>NIS</h6>
                                                    <input type="text" name="nispelamar" value="<?=$nispelamar;?>" class="form-control" required>
                                                    <br>
                                                    <h6>Nama</h6>
                                                    <input type="text" name="namapelamar" value="<?=$namapelamar;?>" class="form-control" required>
                                                    <br>
                                                    <h6>Jenis Kelamin</h6>
                                                    <select name="jenkel" value="<?=$jenkel;?>" class="form-control" required>
                                                        <option><?=$jenkel;?></option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    <br>
                                                    <h6>Tanggal Lahir</h6>
                                                    <input type="date" name="tanggallahir" value="<?=$tanggallahir;?>" class="form-control" required>
                                                    <br>
                                                    <h6>Alamat  Pelamar</h6>
                                                    <input type="text" name="alamat" value="<?=$alamat;?>" class="form-control" required>
                                                    <br>
                                                    <h6>No Telepon</h6>
                                                    <input type="text" name="notelepon" value="<?=$notelepon;?>" class="form-control" required>
                                                    <br>
                                                    <h6>Email</h6>
                                                    <input type="email" name="email" value="<?=$email;?>" class="form-control" required>
                                                    <br>
                                                    <input type="hidden" name="idpelamar" value="<?=$idpelamar?>">
                                                    <button type="submit" class="btn btn-warning" name="updatepelamar"><b>Update</b></button>
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
                    </div>
                </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

        <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h2 class="modal-title">Tambah Data Pelamar</h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            <h6>NIS</h6>
            <input type="text" name="nispelamar" placeholder="NIS Pelamar" class="form-control" required>
            <br>
            <h6>Nama</h6>
            <input type="text" name="namapelamar" placeholder="Nama Pelamar" class="form-control" required>
            <br>
            <h6>Jenis Kelamin</h6>
            <select name="jenkel" class="form-control" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <br>
            <h6>Tanggal Lahir</h6>
            <input type="date" name="tanggallahir" placeholder="Tanggal Lahir" class="form-control" required>
            <br>
            <h6>Alamat  Pelamar</h6>
            <input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control" required>
            <br>
            <h6>No Telepon</h6>
            <input type="text" name="notelepon" placeholder="Nomor Telepon Pelamar" class="form-control" required>
            <br>
            <h6>Email</h6>
            <input type="email" name="email" placeholder="Email Pelamar" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary" name="tambahpelamar">Submit</button>
            </div>
            </form>

            
        </div>
        </div>
    </div>

</html>