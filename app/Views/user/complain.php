<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/asset/480px_logo_k/unuja.ico" type="image/x-icon">
    <title>E-Complain</title>
    <script src="/assetcomplain/js/jquery-3.5.1.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assetcomplain/mycsscomplain.css">
    <link rel="icon" href="/asset/480px_logo_unuja.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="/assetcomplain/js/parsley.js"></script>
    <style>
        .parsley-required {
            color: red;
            font-family: 'Arial Narrow Bold';
        }

        .parsley-type {
            color: red;
            font-family: 'Arial Narrow Bold';
        }

        .parsley-length {
            color: red;
            font-family: 'Arial Narrow Bold';
        }
    </style>
</head>

<body>

    <!------ Include the above in your HEAD tag ---------->

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="/asset/logo.png" alt="" />
                <h3>Welcome</h3>
                <p> E-Complain Laboratorium Fakultas Teknik</p>
                <div class="text-center mt-40">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Cepat Tanggap
                    </button>
                </div>

            </div>
            <div class="col-md-9 register-right">
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
                <div class="flash-dataok" data-flashdata="<?= session()->getFlashdata('ok') ?>"></div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                <?php endif ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">E-Complain Dosen</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <form method="post" action="/user/complainproses" id="complaindos" data-parsley-validate>
                                    <input type="hidden" name="date" value="<?= date("Y-m-d") ?>">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nidn" placeholder="Nidn / Email" required="" data-parsley-type="number" data-parsley-length="[1,10]" autocomplete="off" />
                                        <p style="color: red; font-size: 10px;font-style: italic;">*Masukan NIDN/Email</p>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control theSelect" name="nama">
                                            <option class="hidden" selected disabled>Nama Dosen</option>
                                            <?php foreach ($dosen as  $do) : ?>
                                                <option value="<?= $do['nama']  ?>"><?= $do['nama']  ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="namalab">
                                            <option class="hidden" selected disabled>LAB</option>
                                            <?php foreach ($lab as $lb) : ?>
                                                <option value="<?= $lb['nama_lab'] ?>"><?= $lb['nama_lab'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <select class="form-control theSelect" name="kodelab">
                                                <option class="hidden" selected disabled>KODE</option>
                                                <?php foreach ($kode as $kd) : ?>
                                                    <option value="<?= $kd['kode_lab'] ?>"><?= $kd['kode_lab'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <select class="form-control theSelect" name="catatan">
                                            <option class="hidden" selected disabled>Jenis kerusakan</option>
                                            <option value="Komputer tidak mau hidup">Komputer tidak mau hidup</option>
                                            <option value="Keyboard & mouse tidak dikenali oleh komputer">Keyboard & mouse tidak dikenali oleh komputer</option>
                                            <option value="Tampilan tiba-tiba rusak dan komputer manjadi hang">Tampilan tiba-tiba rusak dan komputer manjadi hang</option>
                                            <option value="Komputer yang lambat">Komputer yang lambat</option>
                                            <option value="Timbulnya suara beep pada komputer">Timbulnya suara beep pada komputer</option>
                                            <option value="Bunyi keras pada cpu">Bunyi keras pada cpu</option>
                                            <option value="Penambahan aplikasi baru">Penambahan aplikasi baru</option>
                                            <option value="Aplikasi error">Aplikasi error</option>
                                            <option value="Lcd proyektor tidak mau menyala.">Lcd proyektor tidak mau menyala.</option>
                                            <option value="Lainya.">Lainya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" readonly id="qrcode" type="text" name="qr code">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btnRegister">Send</button>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <p style="color: red; font-style: italic;">scan qr code disini</p>
                                <div class="card mb-6 ml-2" style="width: 18rem; height: 14rem;">
                                    <div class="ml-3">
                                        <video id="preview" style="height: 250px; width: 250px;"></video>
                                    </div>
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        </div>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Daftar Asisten Lab</h5>
                    </div>
                    <div class="row">
                        <?php foreach ($aslab as $lb) : ?>
                            <div class="col-md-6">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <img src="/asset/fotoaslab/<?= $lb['foto'] ?>" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <div class="card-body">
                                                <h5 class="card-title"><span class="badge badge-primary"><?= $lb['nama'] ?></span></h5>
                                                <p class="card-text"><span class="badge badge-primary"><?= $lb['jurusan'] ?></span> </p>
                                                <p class="card-text text-center"><a href=" https://api.whatsapp.com/send?phone=+62<?= $lb['nohp'] ?>&text=Silahkan%20masukan%20Complain%20anda" target="_blank"><img src="/asset/file/wa.png" width="35px" height="35px" alt=""></a></p>
                                                <p class="card-text text-center"><span class="badge badge-primary">PENJAB <?= $lb['nama_lab'] ?></span> </p>
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
    <script src="/assetcomplain/js/parsley.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/assetcomplain/js/myscript.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
        $(".theSelect").select2();
    </script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            // menampilkan hasil dari scan qr code
            $('#qrcode').val(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('camera tidak di temukan');
            }
        }).catch(function(e) {
            console.error(e);
        });
    </script>
</body>

</html>