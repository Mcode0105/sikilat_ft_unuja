<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<!--Content right-->
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong>Cards</strong></h5>
    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> <?= $title ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <!--Cards with image-->
            <div class="mt-1 mb-3 button-container">
                <h6 class="mb-2">Data User</h6>
                <div class="row">
                    <?php foreach ($prof as $us) : ?>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card">
                                <div class="text-center">
                                    <img style="height: 100px; width: 100px;" class="card-img-top rounded-circle" src="/asset/file/<?= $us['foto']; ?>" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text-center"><span class="badge badge-success"><?= $us['nama']; ?></span></h4>
                                    <h5 class="card-title text-center"><span class="badge badge-primary"><?= $us['level']; ?></span></h5>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modal<?= $us['id_user']; ?>"><i class=" fa fa-edit"></i>Edit</button>
                                        <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modaldetail<?= $us['id_user']; ?>"><i class="fa fa-eye"></i>Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <?= $pager->links() ?>
            </div>
        </div>
    </div>

    <?php foreach ($prof as $profil) : ?>
        <!-- modal user -->
        <div class="modal fade bd-example-modal<?= $profil['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Edit </strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/editprofil/<?= $profil['username'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group floating-label">
                                <input type="hidden" name="id_user" value="<?= $profil['id_user'] ?>">
                                <input type="hidden" name="gambar_lama" value="<?= $profil['foto'] ?>">
                                <input class="form-control" type="text" required name="nama" value="<?= $profil['nama'] ?>">
                                <label for="">Nama </label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="username" value="<?= $profil['username'] ?>">
                                <label for="">Username </label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="hidden" name="gambarlama" value="">
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
        <!-- modal -->
    <?php endforeach ?>
    <?php foreach ($prof as $profil) : ?>
        <!-- modal user -->
        <div class="modal fade bd-example-modaldetail<?= $profil['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Edit </strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <div class="list-group">

                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="card-title text-center">Username : <span class="badge badge-success"><?= $us['username']; ?></span></h5>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="card-title text-center">jenis kelamin : <span class="badge badge-success"><?= $us['jenis_kelamin']; ?></span></h5>
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-theme btn-round">Hapus</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- modal -->
    <?php endforeach ?>
</div>
</div>

<!--Main Content-->

</div>

<!--Page Wrapper-->
<?php $this->endSection() ?>