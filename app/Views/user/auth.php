<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/asset/480px_logo_k/unuja.ico" type="image/x-icon">
    <title>E-Complain</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/assetcomplain/mycsscomplain.css">
    <link rel="icon" href="/asset/480px_logo_unuja.ico" type="image/x-icon">
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="/asset/logo.png" alt="" />
                <h3>Welcome</h3>
                <p> E-Complain Laboratorium Fakultas Teknik</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
                <div class="flash-dataok" data-flashdata="<?= session()->getFlashdata('ok') ?>"></div>
                <?php if (session()->getFlashdata('pesan')) : ?>

                <?php endif ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Authentikasi</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <form method="post" action="/user/autentikasi">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Masukan Kode OTP</label>
                                        <input type="text" class="form-control" name="kode" placeholder="OTP *" />
                                        <p style="color: red;font-style: italic; font-size: 12px;">NB:cek email anda untuk melihat Kode OTP </p>
                                        <p style="color: red;font-style: italic; font-size: 12px;">NB:pastikan yang melakukan complain merupakan dosen bukan mahasiswa </p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btnRegister">Next</button>
                                    </div>
                            </div>
                            </from>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="/assetcomplain/js/myscript.js"></script>
</body>

</html>