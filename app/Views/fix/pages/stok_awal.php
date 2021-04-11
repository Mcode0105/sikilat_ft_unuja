<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <!--Blank Page-->
            <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-edit"> Tambah Data</i></button>
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2"><?= $title ?></h6>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>opsi</td>
                            </tr>
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
                    <h5 class="modal-title text-secondary"><strong> Tambah Data Stok</strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify">
                    <!--Floating label-->
                    <form action="/home/tambah_barang" method="post">
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="nama_barang">
                            <label for="">Nama Barang</label>
                        </div>
                        <div class="form-group floating-label">
                            <select name="country" id="" class="custom-select" required>
                                <option value=""></option>
                                <option value="jaringan">jaringan</option>
                            </select>
                            <label for="" class="mt-1">Kategori</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="jumlah">
                            <label for="">Jumlah</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="kondisi">
                            <label for="">Kondisi</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="keterangan">
                            <label for="">keterangan</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-theme btn-round">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <?= $this->endSection(); ?>