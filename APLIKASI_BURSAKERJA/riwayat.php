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
        <title>Riwayat Pelamar | <?= $_SESSION['nama_lengkap']?></title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            .zoomable{
                width: 200px;
            }
        </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <h1><a class="navbar-brand" href="index.php">Bursa Kerja Khusus <br>SMK Telkom Jakarta</a></h1>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Daftar Pelamar
                            </a>
                            <a class="nav-link collapsed" href="perusahaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Daftar Perusahaan
                            </a>
                            <a class="nav-link collapsed" href="riwayat.php">
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
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Riwayat Pelamar</h1>
                       
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Pelamar</th>
                                                <th>Perusahaan Dilamar</th>
                                                <th>Posisi Dilamar</th>
                                                <th>No Telepon Pelamar</th>
                                                <th>Status</th>
                                                <th>Curiculum Vitae</th>
                                                <th>Waktu Melamar</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $ambilsemuadatariwayat = mysqli_query($conn, "select * from riwayat");

                                            $nomor = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatariwayat)){
                                                $riwayat_nispelamar = $data["riwayat_nispelamar"];
                                                $riwayat_namapelamar = $data["riwayat_namapelamar"];
                                                $perusahaanpelamar = $data["perusahaanpelamar"];
                                                $posisipelamar = $data["posisipelamar"];
                                                $no_teleponriwayat = $data["no_teleponriwayat"];
                                                $status = $data["status"];
                                                $tanggal = $data["tanggal"];
                                                $idriwayat = $data["idriwayat"];

                                                $dokumen = $data["dokumen"];
                                                if($dokumen==null){
                                                    $dok = 'Tidak Ada CV';
                                                } else{
                                                    $dok = '<embed type="application/pdf" src="dokumen/'.$dokumen.'" class="zoomable">';
                                                }

                                            ?>
                                            <tr>
                                                <td><?=$nomor++;?></td>
                                                <td><?=$riwayat_nispelamar;?></td>
                                                <td><?=$riwayat_namapelamar;?></td>
                                                <td><?=$perusahaanpelamar;?></td>
                                                <td><?=$posisipelamar;?></td>
                                                <td><?=$no_teleponriwayat;?></td>
                                                <td><?=$status;?></td>
                                                <td><b><?=$dok;?></b></td>
                                                <td><?=$tanggal;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idriwayat;?>">
                                                    <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$idriwayat;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h2 class="modal-title">Delete Data Riwayat?</h2>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    Apakah Anda Yakin Ingin Menghapus Data Riwayat <br><?=$riwayat_namapelamar;?>?
                                                    <input type="hidden" name="idriwayat" value="<?=$idriwayat;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="deleteriwayat">Delete</button>
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



</html>
