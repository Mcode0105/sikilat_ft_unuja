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
                <!-- <div class="row">
                    <div class="col-md-3 mb-3">
                        <input class="form-control" type="date" id="date">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input class="form-control" type="date" id="date">
                    </div>
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-success">ok</button>
                    </div>
                </div> -->
                <div class="row">
                    <div class="table-responsive">
                        <table id="tablecomplain" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dosen</th>
                                    <th>Nama_lab</th>
                                    <th>kode</th>
                                    <th>tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($com as $br) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $br['nama_dosen'] ?></td>
                                        <td><?= $br['nama_lab'] ?></td>
                                        <td><?= $br['kode'] ?></td>
                                        <td><?= $br['date'] ?></td>
                                        <td>
                                            <?php if ($br['status'] == 1) : ?>
                                                <span class="badge badge-danger">Belum Di perbaiki</span>
                                            <?php elseif ($br['status'] == 2) : ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modaldetail<?= $br['id_complain'] ?>"><i class=" fa fa-check"> sudah di perbaiki </i></button>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary icon-round shadow" data-toggle="modal" data-target=".bd-example-modal<?= $br['id_complain'] ?>"><i class=" fa fa-edit"> </i></button>
                                            <a class="btn btn-danger icon-round shadow" href="/home/delcomplain/<?= $br['id_complain'] ?>"> <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr> <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Datatable-->
        </div>
    </div>
    <!-- modal -->
    <?php foreach ($com as $br) : ?>
        <div class="modal fade bd-example-modal<?= $br['id_complain'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Konfirmasi Komplain</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <form action="/home/aksi/<?= $br['id_complain'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <p>nama asisten Lab</p>
                            <div class="form-check">
                                <input type="hidden" name="nama_dosen" value="<?= $br['nama_dosen'] ?>">
                                <input type="hidden" name="ruangan" value="<?= $br['nama_lab'] ?>">
                                <input class="form-check-input" type="checkbox" value="Abdul Munif" id="defaultCheck1" name="munif">
                                <label class="form-check-label" for="defaultCheck1">
                                    Abdul Munif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Avin Abdurrohim" id="avin" name="avin">
                                <label class="form-check-label" for="avin">
                                    Avin Abdurrohim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Juned Mustar Hakim" id="juned" name="juned">
                                <label class="form-check-label" for="juned">
                                    Juned Mustar Hakim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Djaya Ibnu Jabir" id="dj" name="dj">
                                <label class="form-check-label" for="dj">
                                    Djaya Ibnu Jabir
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Helman Zuhri" id="dj1" name="hl">
                                <label class="form-check-label" for="dj1">
                                    Helman Zuhri
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="lukmanul Hakim" id="dj2" name="lm">
                                <label class="form-check-label" for="dj2">
                                    Lukmanul Hakim
                                </label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                                <label for="">Foto</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"> simpan</i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php endforeach ?>


    <?php foreach ($com as $br) : ?>
        <div class="modal fade bd-example-modaldetail<?= $br['id_complain'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Konfirmasi Komplain</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <div class="row">
                            <div class="col-md-13 col-sm-12 mb-3">
                                <div class="card">
                                    <img class="card-img-top" src="/asset/fotoperbaikan/<?= $br['foto'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Asisten Lab Yg Memperbaiki</h5>
                                        <p class="card-text"><?= $br['nama_aslab'] ?>,</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php endforeach ?>

    <script>

    </script>

    <?= $this->endSection(); ?>