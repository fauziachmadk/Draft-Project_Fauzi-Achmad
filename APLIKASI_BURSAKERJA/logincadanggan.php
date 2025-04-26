<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Welcome User!</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center font-weight-light my-4">Login</h1></div>
                                    <div class="card-body">
                                        <form class="form-signing" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><h6>Email</h6></label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Masukan Email Anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"><h6>Password</h6></label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Masukan Password Anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><h6>Kategori</h6></label>
                                                <select class="form-control" name="level">
                                                    <option value="admin">Administrator</option>
                                                    <option value="siswa">Siswa</option>
                                                </select>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
