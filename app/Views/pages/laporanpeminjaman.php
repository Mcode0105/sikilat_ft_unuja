<?= $this->extend('layout/template'); ?>


<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
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
                                    <th>tanggal peminjaman</th>
                                    <th>jumlah yg di pinjam</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>No Hp</th>
                                    <th>Waktu di kembalikan</th>
                                    <th>Kondisi barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($peminjaman as $br) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $br['nama_barang'] ?></td>
                                        <td><?= $br['kategori'] ?></td>
                                        <td><?= $br['merek_barang'] ?></td>
                                        <td><?= $br['date'] ?></td>
                                        <td><?= $br['jumlah_minjam'] ?></td>
                                        <td><?= $br['nama'] ?></td>
                                        <td><?= $br['instansi'] ?></td>
                                        <td><?= $br['no_hp'] ?></td>
                                        <td><?= $br['waktu_janji_kembali'] ?></td>
                                        <td><?= $br['keterangan'] ?></td>
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