<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('pesan'); ?></strong>
        </div>
    <?php endif ?>
    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2"><?= $title ?></h6>
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($proses as $br) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $br['nama_barang'] ?></td>
                                        <td>
                                            <a href="/home/proseson/<?= $br['id_stok_akhir']; ?>" class="btn btn-primary icon-round shadow"><i class="fas fa-power-off"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--/Datatable-->
        </div>
    </div>
    <!-- Modal -->
    <?= $this->endSection(); ?>