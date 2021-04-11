<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" href="/asset/480px_logo_unuja.ico" type="image/x-icon">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/asset/assets/css/bootstrap.min.css" />
    <!--Custom style.css-->
    <link rel="stylesheet" href="/asset/assets/css/quicksand.css" />
    <link rel="stylesheet" href="/asset/assets/css/style.css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="/asset/assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="/asset/assets/css/fontawesome.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Registrasi</title>
</head>

<body class="login-body">
    <!--Login Wrapper-->

    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <h1 class="text-center mb-20">
            </h1>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info ">
                    <a href="/login_user" class="btn btn-light">Login Sekarang</a>
                    </p>
                </div>

                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <h3 class="mb-2">Sign up</h3>
                    <small class="text-muted bc-description">Daftar Sekarang</small>
                    <form action="/home/daftar" method="post" enctype="multipart/form-data" class="mt-2">
                        <?php csrf_field() ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="Nama" aria-label="nama" aria-describedby="basic-addon1" name="nama" required />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" required>
                                <option>Jenis Kelamin</option>
                                <option value="Laki-laki">laki-laki</option>
                                <option value="Perempuan">perempuan</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-university"></i></span>
                            </div>
                            <select class="form-control" id="exampleFormControlSelect1" name="instansi" required>
                                <option>Pilih Instansi</option>
                                <?php foreach ($instansi as $is) : ?>
                                    <option value="<?= $is['id_instansi']; ?>"><?= $is['instansi'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control <?= (\Config\Services::validation()->hasError('username')) ? 'is-invalid' : ''  ?> mt-0" placeholder="Username / email" aria-label="Username" aria-describedby="basic-addon1" required name="username" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control  <?= (\Config\Services::validation()->hasError('password')) ? 'is-invalid' : ''  ?> mt-0" placeholder="Password" aria-label="phone" aria-describedby="basic-addon1" name="password" required />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control  <?= (\Config\Services::validation()->hasError('password2')) ? 'is-invalid' : ''  ?> mt-0" placeholder="Konfirmasi Password" aria-label="Password" aria-describedby="basic-addon1" name="password2" required />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password2'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-theme btn-block p-2 mb-1">
                                Registrasi
                            </button>
                        </div>
                    </form>
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