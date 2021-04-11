<?= $this->extend('layout/template'); ?>


<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <?php if (\Config\Services::validation()->hasError('nama_barang')) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong><i class="fa fa-times"></i> <?= \Config\Services::validation()->getError('nama_barang'); ?></strong>
                </div>
            <?php elseif (\Config\Services::validation()->hasError('gambar')) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong><i class="fa fa-times"></i> <?= \Config\Services::validation()->getError('gambar'); ?></strong>
                </div>
            <?php endif  ?>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                </div>
            <?php endif ?>
            <!--Blank Page-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2"><?= $title ?></h6>
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>merek</th>
                                    <th>posisi</th>
                                    <th>kondisi</th>
                                    <th>tanngal input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($barang as $br) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $br['nama_barang'] ?></td>
                                        <td><?= $br['kategori'] ?></td>
                                        <td><?= $br['merek_barang'] ?></td>
                                        <td><?= $br['posisi'] ?></td>
                                        <td><?= $br['kondisi'] ?></td>
                                        <td><?= $br['date'] ?></td>
                                    </tr> <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Datatable-->
        </div>
    </div>

    <?= $this->endSection(); ?>