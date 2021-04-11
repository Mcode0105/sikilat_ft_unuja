<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                </div>
            <?php endif ?>
            <!--Blank Page-->
            <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-edit"> Tambah Data</i></button>
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2"><?= $title ?></h6>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Instansi</th>
                                <th>opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($instansi as $kt) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $kt['instansi']; ?> </td>
                                    <td>
                                        <a href="/home/delinstansi/<?= $kt['id_instansi']; ?>" class="btn btn-outline-danger btn-round"> <i class="fa fa-trash"></i></a>
                                        <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modal<?= $kt['id_instansi']; ?>"><i class="fa fa-edit"></i></button>
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
                    <h5 class="modal-title text-secondary"><strong> Tambah Data Instansi</strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify">
                    <!--Floating label-->
                    <form action="/home/tambahinstansi" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="instansi">
                            <label for="">Nama Instansi</label>
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
    <?php foreach ($instansi as $kn) : ?>
        <!-- modal edit -->
        <div class="modal fade bd-example-modal<?= $kn['id_instansi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Edit Data instansi</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/editinstansi/<?= $kn['id_instansi'] ?>" method="post">
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="instansi" value="<?= $kn['instansi']; ?>">
                                <input type="hidden" name="id" value="<?= $kn['id_instansi']; ?>">
                                <label for="">instansi</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-theme btn-round">Edit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php endforeach ?>
    <?= $this->endSection(); ?>