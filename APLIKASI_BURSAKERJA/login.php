<?php
require 'function.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Bursa Kerja Khusus | SMK Telkom Jakarta</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img { 
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="POST" action="cek.php">
  <div class="text-center mb-4">
    <img class="img-logo" src="smktelkomjkt.png." alt="" width="230" height="140">
    <h1 class="h3 mb-3 font-weight-normal"><b>Login Untuk Masuk!</b></h1>
    <p>Silahkan Login Dengan Email, Password, dan Kategori Anda Yang Sudah Terdaftar!</p>
  </div>

  <div class="form-label-group">
    <input name="email" id="inputEmailAddress" type="email" class="form-control" placeholder="Masukan Email Anda!" required autofocus>
    <label for="inputEmail">Masukan Email Anda!</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Masukan Password Anda" required>
    <label for="inputPassword">Masukan Password Anda!</label>
  </div>

  <div class="form-label-group">
    <select class="form-control" name="level">
      <option>Pilih Kategori Anda</option>
      <option value="admin">Administrator</option>
      <option value="perusahaan">Perusahaan</option>
      <option value="siswa">Siswa</option>
    </select>
  </div>
  
  <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; <?=date('M, Y')?></p>
</form>
</body>
</html>
