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

    <title>Halaman | Login</title>
</head>

<body class="login-body">
    <!--Login Wrapper-->
    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info">
                    <h4 class="text-center "><img class="text-center " height="60px" width="60px" src="/asset/logo.png" alt=""></h4>

                    <h2 class="text-center">SIKILAT</h2>
                    <p class="text-center">SISTEM INFORMASI KOMPLAIN DAN LAYANAN TERPADU LABORATORIUM FAKULTAS TEKNIK UNIVERSITAS NURUL JADID</p>
                    <p><a href="/jadwal_lab" target="_blank" class="btn btn-light"><i class="fa fa-computer"></i> Cek Jadwal Laboratorium</a></p>
                    <p><a href="/e_complain" class="btn btn-light"><i class="fa fa-paper-plane"></i> E-Complain Dosen</a></p>
                    <p style="font-size: 15px;"><a href="/e_complain_mahasiswa" class="btn btn-light"><i class="fa fa-paper-plane"></i> E-Complain Mahasiswa</a></p>
                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <?php if (session()->getFlashdata('login')) : ?>
                        <div class="alert alert-success" role="alert">
                            <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('login'); ?></strong>
                        </div>
                    <?php endif ?>
                    <h3 class="mb-2">Login User</h3>
                    <small class="text-muted bc-description"> <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><i class="fa fa-times"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                            </div>
                        <?php endif ?>
                    </small>
                    <small class="text-muted bc-description"> <?php if (session()->getFlashdata('com')) : ?>
                            <div class="alert alert-success" role="alert">
                                <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('com'); ?></strong>
                            </div>
                        <?php endif ?>
                    </small>
                    <small class="text-muted bc-description"> <?php if (session()->getFlashdata('keluar')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><i class="fa fa-times"></i> <?= session()->getFlashdata('keluar'); ?></strong>
                            </div>
                        <?php endif ?>
                    </small>
                    <form action="/user/loginprosesuser" method="post" class="mt-2">
                        <?= csrf_field() ?>
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
                        <div class="form-group text-center">
                            <button class="btn btn-theme p-2 mb-1">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="/registrasi" class="btn btn-theme  p-2 mb-1"><i class="fa fa-pencil"> Buat akun</i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalcek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Jadwal laboratorium</h5>
                    </div>
                    <div class="row">
                        <?php foreach ($lab as $lb) : ?>
                            <div class="col-md-6">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <img src="/asset/file/<?= $lb['foto'] ?>" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <div class="card-body">
                                                <h5 class="card-title text-center"><span class="badge badge-primary"><?= $lb['nama_lab'] ?></span></h5>
                                                <p class="card-text"><span class="badge badge-primary"></span> </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
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