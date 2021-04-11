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
                                <th>Nama </th>
                                <th>Instansi</th>
                                <th>Lab</th>
                                <th>tgl Peminjaman</th>
                                <th>validasi</th>
                                <th>opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pinjamlab as $pm) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $pm['nama']; ?></td>
                                    <td><?= $pm['instansi']; ?></td>
                                    <td><?= $pm['nama_lab']; ?></td>
                                    <td><?= $pm['tgl_minjam']; ?></td>
                                    <td>
                                        <?php if ($pm['status'] == '1') : ?>
                                            <span class="badge badge-danger">belum<span>
                                                <?php else : ?>
                                                    <span class="badge badge-primary">Sudah<span>
                                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <form action="/Home/validasilab/<?= $pm['id_peminjaman_lab']; ?>" method="post">
                                            <input type="hidden" value="<?= $pm['id_peminjaman_lab']; ?>" name="id_peminjaman">
                                            <button class="btn btn-outline-theme btn-round" type="submit">Validasi</button>
                                        </form>
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
    <?= $this->endSection(); ?>