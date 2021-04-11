<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>
    <br>

    <div class="row mt-3">
        <div class="col-sm-12">
            <a href="/home/laporanpengeluaran" target="_blank" class="btn btn-outline-success btn-round"><i class="fa fa-download"> Download laporan excel</i></a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                </div>
            <?php endif ?>
            <!--Blank Page-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2"><?= $title ?></h6>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Waktu Pengeluaran</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengeluaran as $pl) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $pl['nama_barang'] ?></td>
                                    <td><?= $pl['jumlah_pengeluaran'] ?></td>
                                    <td><?= $pl['waktu_pengeluaran'] ?></td>
                                    <td><?= $pl['keterangan_pengeluaran'] ?></td>
                                    <td>
                                        <a class="btn btn-outline-danger btn-round" href="/home/delkeluar/<?= $pl['id_pengeluaran']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/Datatable-->
        </div>
    </div>
    <!-- modal -->

    <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-secondary"><strong> Tambah Data Barang Pengeluaran</strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify">
                    <!--Floating label-->
                    <form action="/home/tambahpengeluaran/php">
                        <div class="form-group floating-label">
                            <select name="country" id="" class="custom-select" required name="kategori">
                                <?php foreach ($kategori as $br) : ?>
                                    <option value="<?= $br['id_kategori'] ?>"><?= $br['kategori'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="" class="mt-1">Nama Barang</label>
                        </div>
                        <div class="form-group floating-label">
                            <select name="country" id="" class="custom-select" required name="barang">
                                <?php foreach ($barang as $br) : ?>
                                    <option value="<?= $br['id_barang'] ?>"><?= $br['nama_barang'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="" class="mt-1">Kategori</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="jumlah">
                            <label for="">jumlah</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="waktu_pengeluaran">
                            <label for="">Waktu Pengeluaran</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="keterangan">
                            <label for="">Keterangan</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-theme btn-round">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <?= $this->endSection(); ?>