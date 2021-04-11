<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-3"><strong>Dashboard</strong></h5>

    <!--Dashboard widget-->
    <div class="mt-1 mb-3 button-container">
        <div class="row pl-0">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $jumlahbarang; ?></strong></h3>
                            <p><small class="text-muted bc-description">Data Barang</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $jumlahuser; ?></strong></h3>
                            <p><small class="text-muted bc-description">Data Barang</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Dashboard widget-->

    <?= $this->endSection(); ?>