<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="page-header-title">
                        <h4>Profile</h4>

                    </div>
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Pages</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!"><?= $title; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card simple-cards">
                                <div class="card-header">

                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row users-card">
                                        <div class="col-md-12 col-md-12">
                                            <div class="card user-card">
                                                <?php if (session()->getFlashdata('pesan')) : ?>
                                                    <div class="alert alert-primary background-primary">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong> <?= session()->getFlashdata('pesan'); ?></strong>
                                                    </div>
                                                <?php endif ?>
                                                <?php if (\Config\Services::validation()->hasError('gambar')) : ?>
                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong> <?= (\Config\Services::validation()->getError('gambar')) ?></strong>
                                                    </div>
                                                <?php endif ?>
                                                <div class="card-header-img">
                                                    <img class="img-usr img-circle" src="asset/file/<?= session()->get('foto'); ?>" alt="card-img" width="120px" height="120px">
                                                    <h6><?= session()->get('nama') ?></h6>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="user-cards">
                                                    <div class="col-md-12 col-lg-12">
                                                        <ul class="basic-list list-icons">
                                                            <?php foreach ($user as $us) : ?>
                                                                <li>
                                                                    <i class="icofont icofont-user text-primary p-absolute text-center d-block f-30"></i>
                                                                    <div class="label-main">
                                                                        <label class="label label-lg label-primary">
                                                                            <?= $us['username']; ?>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont icofont-bank-alt text-primary p-absolute text-center d-block f-30"></i>
                                                                    <div class="label-main">
                                                                        <label class="label label-lg label-primary">
                                                                            <?= $us['instansi']; ?>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont icofont-ui-calendar text-primary p-absolute text-center d-block f-30"></i>
                                                                    <div class="label-main">
                                                                        <label class="label label-lg label-primary">
                                                                            <?= $us['created_at']; ?>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <?php if ($us['jenis_kelamin'] == 'Laki-laki') : ?>
                                                                        <i class="icofont icofont-business-man-alt-2 text-primary p-absolute text-center d-block f-30"></i>
                                                                    <?php elseif ($us['jenis_kelamin'] == 'Perempuan') : ?>
                                                                        <i class="icofont icofont-girl-alt text-primary p-absolute text-center d-block f-30"></i>
                                                                    <?php endif ?>
                                                                    <div class="label-main">
                                                                        <label class="label label-lg label-primary">
                                                                            <?= $us['jenis_kelamin']; ?>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont icofont-tools-alt-2 text-primary p-absolute text-center d-block f-30"></i>
                                                                    <div class="label-main">
                                                                        <label class="label label-lg label-primary">
                                                                            <?= $us['jenis_kebutuhan']; ?>
                                                                        </label>
                                                                    </div>
                                                                </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#default-Modaldetail<?= $us['id_user'] ?>"><i class="icofont icofont-edit m-r-5"></i>Profile</button>
                                                </div>
                                            <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($user as $br) : ?>
    <div class="modal fade" id="default-Modaldetail<?= $br['id_user'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User <?= $br['nama']; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-lg-12">
                        <div class="card card-block user-card">
                            <form action="/user/edituser/<?= $br['id_user'] ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" value="<?= $br['id_user']; ?>" name="id_user">
                                        <input type="text" class="form-control" placeholder="Username" autocomplete="off" name="username" value="<?= $br['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nama" autocomplete="off" name="nama" value="<?= $br['nama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="jk" class="form-control">
                                            <option>Pilih jenis kelamin</option>
                                            <option value="Laki-laki">Laki Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Instansi</label>
                                    <div class="col-sm-10">
                                        <select name="instansi" class="form-control">
                                            <option value="<?= $br['id_instansi'] ?>"><?= $br['instansi'] ?></option>
                                            <?php foreach ($instansi as $is) : ?>
                                                <option value="<?= $is['id_instansi']; ?>"><?= $is['instansi']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="custom-file">Foto</label>
                                    <div class="form-group">
                                        <img width=50px" height=50px" src="/asset/file/<?= $br['foto'] ?>" alt="" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="hidden" name="gambarlama" value="<?= $br['foto'] ?>">
                                                <input id="gambar" type="file" class="form-control" id="custom-File" name="gambar" onchange="previewimg()">
                                                <label for="gambar" class="custom-file-label"><?= $br['foto'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect ">simpan</button>
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?= $this->endSection() ?>