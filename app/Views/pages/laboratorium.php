<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<!--Content right-->
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title  ?></strong></h5>
    <span class="text-secondary">Home <i class="fa fa-angle-right"></i> <?= $title  ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <strong><i class="fa fa-check"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                </div>
            <?php endif ?>
            <!--Cards with image-->
            <div class="mt-1 mb-3 button-container">
                <h6 class="mb-2">Data laboratorium FT</h6>
                <button type="button" class="btn btn-outline-theme btn-round mb-3 ml-7" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-edit"> Tambah Data</i></button>
                <div class="row">
                    <?php foreach ($lab as $lb) : ?>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card">
                                <img class="card-img-top" src="/asset/file/<?= $lb['foto'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title text-center"><?= $lb['nama_lab'] ?></h2>
                                    <h5 class="text-center">
                                        <button type="button" class="btn btn-outline-primary btn-round" data-toggle="modal" data-target=".bd-example-modaledit<?= $lb['id_lab'] ?>"><i class="fa fa-edit"></i></button>
                                        <a href="#" class="btn btn-outline-danger btn-round"><i class="fa fa-trash"></i></a>
                                        <a href="/home/datalab/<?= $lb['slug_lab'] ?>" class="btn btn-outline-success btn-round"><i class="fa fa-eye"></i></a>
                                        <?php if ($lb['st'] == 1) : ?>
                                            <button type="button" class="btn btn-outline-warning btn-round" data-toggle="modal" data-target=".bd-example-modalcek<?= $lb['id_lab'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-outline-danger btn-round" data-toggle="modal" data-target=".bd-example-modalcek<?= $lb['id_lab'] ?>"><i class="fa fa-pencil"></i></button>
                                        <?php endif ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-secondary"><strong> Tambah Data Lab</strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify">
                    <!--Floating label-->
                    <form action="/home/tambahlab" method="post" enctype="multipart/form-data">
                        <?php csrf_field() ?>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="lab">
                            <label for="">Nama Lab</label>
                        </div>
                        <div class="form-group floating-label">
                            <select id="" class="custom-select" name="aslab">
                                <?php foreach ($aslab as $kn) : ?>
                                    <option value="<?= $kn['id_aslab'] ?>"><?= $kn['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="" class="mt-1">Pananggung jawab Lab</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                            <label for="">Foto</label>
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

    <?php foreach ($lab as $lb) : ?>
        <div class="modal fade bd-example-modaledit<?= $lb['id_lab']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Edit Data Lab </strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/editlab/<?= $lb['id_lab']; ?>" method="post" enctype="multipart/form-data">
                            <?php csrf_field() ?>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="lab" value="<?= $lb['nama_lab']; ?>">
                                <input type="hidden" name="gambarlama" value="<?= $lb['foto'] ?>">
                                <input type="hidden" name="id_lab" value="<?= $lb['id_lab']; ?>">
                                <label for="">Nama Lab</label>
                            </div>
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="aslab">
                                    <?php foreach ($aslab as $kn) : ?>
                                        <option value="<?= $kn['id_aslab'] ?>"><?= $kn['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="" class="mt-1">Pananggung jawab Lab</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                                <label for="">Foto</label>
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
    <?php endforeach ?>

    <?php foreach ($lab as $lb) : ?>
        <div class="modal fade bd-example-modalcek<?= $lb['id_lab']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> cek jadwal lab </strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <div class="text-center">
                            <h6>pastikan anda sudah mengecek jadwal lab</h6>
                        </div>
                        <!--Floating label-->
                        <div class="text-center">
                            <a href="/home/ceklabon/<?= $lb['id_lab'] ?>" class="btn btn-success btn-round"><i class="fa fa-pencil"></i></a>
                            <a href="/home/ceklaboff/<?= $lb['id_lab'] ?>" class="btn btn-danger btn-round"><i class="fa fa-pencil"></i></a>
                        </div>
                        <div class="text-center">
                            <?php if ($lb['st'] == 1) : ?>
                                <p style="color: green; font-size: 15px;">LAB SUDAH TERPAKAI</p>
                            <?php else : ?>
                                <p style="color: red; font-size: 12px;">LAB BELUM TERPAKAI</p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-theme btn-round">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?= $this->endSection('konten'); ?>