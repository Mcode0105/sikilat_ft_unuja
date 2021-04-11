<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="page-header-title">
                        <h4>ganti password</h4>

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
                        <div class="col-sm-6">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong> <?= (session()->getFlashdata('pesan')) ?></strong>
                                </div>
                            <?php endif ?>
                            <?php if (session()->getFlashdata('berhasil')) : ?>
                                <div class="alert alert-success background-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong> <?= (session()->getFlashdata('berhasil')) ?></strong>
                                </div>
                            <?php endif ?>
                            <?php if (\Config\Services::validation()->hasError('konfirmasi')) : ?>
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong> <?= (\Config\Services::validation()->getError('konfirmasi')) ?></strong>
                                </div>
                            <?php endif ?>
                            <div class="card card-block user-card">
                                <form action="/user/gantipsw" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Password Lama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-round" name="passwordlama" placeholder="Passord lama" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Password Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control form-control-round" name="passwordbaru" placeholder="Passord baru" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Konfirmasi Pasword</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control form-control-round" name="konfirmasi" placeholder="Konfirmasi Pasword" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary btn-round btn-block"><i class="icofont icofont-tick-mark"></i>Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>