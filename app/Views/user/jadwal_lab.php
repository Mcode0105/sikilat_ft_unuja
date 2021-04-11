<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/asset/480px_logo_k/unuja.ico" type="image/x-icon">
    <title><?= $title ?></title>
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
                <h6>SIKILAT</h6>
                <h6> SISTEM INFORMASI KOMPLAIN LABORATORIUM FAKULTAS TEKNIK</h6>

            </div>
            <div class="col-md-9 register-right">
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
                <div class="flash-dataok" data-flashdata="<?= session()->getFlashdata('ok') ?>"></div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                <?php endif ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <marquee class="register-heading" behavior="scroll" scrolldelay="200" direction="down">
                            <strong style=" color: blue; font-size: 50px;"> JADWAL LAB KOSONG</strong>
                        </marquee>
                        <marquee class="register-heading" behavior="scroll" scrolldelay="200" direction="up">
                            <strong style=" color: blue; font-size: 30px;"> <?php echo date_indo(date('Y-m-d')); ?></strong>
                        </marquee>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h6 class="register-heading mt-5" id="tampildate" style=" color: red; font-size: 30px;"></h6>

                        <div class="row register-form">
                            <?php foreach ($lab as $lb) : ?>
                                <div class="col-md-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <img src="/asset/file/<?= $lb['foto'] ?>" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><span class="badge badge-primary"><?= $lb['nama_lab'] ?></span></h5>
                                                    <p class="card-text"><span class="badge badge-primary"></span> </p>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $lb['id_lab'] ?>">Get</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($lab as $lb) : ?>
        <div class="modal fade" id="exampleModal<?= $lb['id_lab'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Peminjaman Lab <?= $lb['nama_lab'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form action="/User/getlab" method="POST">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Laboratorium</label>
                                        <input name="lab" type="text" class="form-control" id="exampleFormControlInput1" value="<?= $lb['nama_lab'] ?>" readonly>
                                        <input type="hidden" name="id_lab" value="<?= $lb['id_lab'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kebutuhan</label>
                                        <select name="kebutuhan" class="form-control" id="exampleFormControlSelect1">
                                            <option value="TUGAS AKHIR">TUGAS AKHIR</option>
                                            <option value="PRAKTIKUM / PKL ">PRAKTIKUM</option>
                                            <option value="TPELATIHAN">PELATIHAN</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kelas</label>
                                        <select name="kelas" class="form-control" id="exampleFormControlSelect1">
                                            <option value="PUTRA">PUTRA</option>
                                            <option value="PUTRI">PUTRI</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Waktu</label>
                                        <select name="waktu" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Pagi (08:00 - 12:00)">Pagi (08:00 - 12:00)</option>
                                            <option value="Siang (13:00 - 16:00)">Siang (13:00 - 16:00)</option>
                                            <option value="Full (08:00 - 16:00)">Full (08:00 - 16:00)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Catatan</label>
                                        <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/assetcomplain/js/myscript.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script>
        window.setInterval("waktu()", 1000);

        function waktu() {
            let waktu = new Date();
            setTimeout("waktu", 1000);
            document.getElementById('tampildate').innerHTML = waktu.getHours() + ':' + waktu.getMinutes() + ':' + waktu.getSeconds();

        }
    </script>
</body>

</html>