<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="page-header-title">
                        <h4>Dhasboard</h4>

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
                        <div class="col-md-6 col-xl-4">
                            <div class="card social-widget-card danger">
                                <div class="card-block-big bg-google-plus">
                                    <h3><?= $belumkembali ?></h3>
                                    <span class="m-t-10">belum di kembalikan</span>
                                    <i class="icofont icofont-meeting-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card social-widget-card">
                                <div class="card-block-big bg-twitter">
                                    <h3><?= $sudahkembali ?></h3>
                                    <span class="m-t-10">sudah di kembalikan</span>
                                    <i class="icofont icofont-emo-heart-eyes"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card social-widget-card">
                                <div class="card-block-big bg-linkein">
                                    <h3>
                                        <?= $jumlahpinjam ?>
                                    </h3>
                                    <span class="m-t-10">jumlah peminjaman</span>
                                    <i class="icofont icofont-cart-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>