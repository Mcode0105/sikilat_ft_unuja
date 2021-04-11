<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-3"><strong>Dashboard</strong></h5>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <strong><i class="far fa-grimace"></i> <?= session()->getFlashdata('pesan'); ?></strong>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('berhasil'); ?></strong>
        </div>
    <?php endif ?>
    <?php if (\Config\Services::validation()->hasError('paswordbaru')) : ?>
        <div class="alert alert-danger" role="alert">
            <strong><i class="fa fa-times"></i> <?= \Config\Services::validation()->getError('paswordbaru'); ?></strong>
        </div>
    <?php elseif (\Config\Services::validation()->hasError('paswordlama')) : ?>
        <div class="alert alert-danger" role="alert">
            <strong><i class="fa fa-times"></i> <?= \Config\Services::validation()->getError('paswordlama'); ?></strong>
        </div>
    <?php endif  ?>
    <!--Dashboard widget-->
    <div class="mt-1 mb-3 button-container">
        <div class="row pl-0">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $jumlahbarang['jumlahbarang']; ?></strong></h3>
                            <p><small class="text-muted bc-description">Data Barang</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $barangbaik['jumlahbarangbaik']; ?></strong></h3>
                            <p><small class="text-muted bc-description"> Barang Baik</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $barangrusak['jumlahbarangrusak']; ?></strong></h3>
                            <p><small class="text-muted bc-description"> Barang Rusak</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $complainon; ?></strong></h3>
                            <p><small class="text-muted bc-description"> Complain Selesai</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $complainoff; ?></strong></h3>
                            <p><small class="text-muted bc-description"> Complain belum selesai</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $complainall; ?></strong></h3>
                            <p><small class="text-muted bc-description"><a href="/ecomplain"> Data Complain</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $barangpinjam; ?></strong></h3>
                            <p><small class="text-muted bc-description"><a href="/peminjaman">Barang Yg di pinjam</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $barangbelum; ?></strong></h3>
                            <p><small class="text-muted bc-description"> <a href="/peminjaman">Barang Belum di Kembalikan</a> </small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                <div class="bg-<?= ($proses > 0) ? ('red') : 'white' ?> border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0"><strong><?= $proses; ?></strong></h3>
                            <p><small class="text-muted bc-description"> <a href="/prosespeminjaman">Proses Peminjaman</a> </small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
    <!--/Dashboard widget-->

    <?= $this->endSection(); ?>