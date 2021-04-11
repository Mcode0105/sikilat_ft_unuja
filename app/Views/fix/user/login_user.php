<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/asset/480px_logo_unuja.ico" type="image/x-icon">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/asset/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/asset/assets/css/quicksand.css">
    <link rel="stylesheet" href="/asset/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="/asset/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/asset/assets/css/fontawesome.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Halaman Login</title>
</head>

<body class="login-body">

    <!--Login Wrapper-->

    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <h1 class="text-center mb-2"><img class="text-center mb 2" height="100px" width="100px" src="/asset/logo.png" alt=""></h1>
            <h2 class="text-center mb-5">INVENTARIS LABORATORIUM FT</h2>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info">
                    <h3 class="mb-4">Login User</h3>

                    <p class="text-center">Seamat Data Di aplikasi inventaris laboratorium FT UNUJA</p>
                    <p><a href="/registrasi" class="btn btn-light">Daftar Sekarang</a></p>
                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <?php if (session()->getFlashdata('login')) : ?>
                        <div class="alert alert-success" role="alert">
                            <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('login'); ?></strong>
                        </div>
                    <?php endif ?>
                    <h3 class="mb-2">Login</h3>
                    <small class="text-muted bc-description"> <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><i class="fa fa-times"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                            </div>
                        <?php endif ?></small>
                    <small class="text-muted bc-description"> <?php if (session()->getFlashdata('keluar')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><i class="fa fa-times"></i> <?= session()->getFlashdata('keluar'); ?></strong>
                            </div>
                        <?php endif ?></small>
                    <form action="/home/loginproses" method="post" class="mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="Username" aria-label="Username" required name="username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" required class="form-control mt-0" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-theme btn-block p-2 mb-1">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-secondary" id="exampleModalCenterTitle"><strong>Daftar Sekarang</strong></h5>
                    <a haref="/register" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="/login/register" method="post" enctype="multipart/form-data">
                        <?php csrf_field() ?>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="username">
                            <label for="">username</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="nama">
                            <label for="">Nama</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="password">
                            <label for="">password</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="password1">
                            <label for="">konfirmasi password</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                            <label for="">Foto</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-theme btn-round"><i class="fa fa-edit"> Daftar</i></button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!--Login Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="/asset/assets/js/jquery.min.js"></script>
    <script src="/asset/assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="/asset/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="/asset/assets/js/bootstrap.min.js"></script>

    <!--Custom Js Script-->
    <script src="/asset/assets/js/custom.js"></script>
    <!--Custom Js Script-->
</body>

</html>