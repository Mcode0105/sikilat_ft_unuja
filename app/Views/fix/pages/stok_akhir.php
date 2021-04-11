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
                                    <th>Kategori</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($stokakhir as $br) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $br['nama_barang'] ?></td>
                                        <td><?= $br['kategori'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target="#detail<?= $br['id_stok_akhir'] ?>""><i class=" fa fa-eye"> </i></button>
                                            <a href="/home/on/<?= $br['id_stok_akhir']; ?>" class="btn btn-outline-theme btn-round"><i class="fas fa-power-off"></i></a>
                                            <a href="/home/off/<?= $br['id_stok_akhir']; ?>" class="btn btn-outline-danger btn-round"><i class="fas fa-power-off"></i></a>
                                            <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modal<?= $br['id_stok_akhir'] ?>"><i class="fa fa-edit"> Pinjam</i></button>
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
    <?php foreach ($stokakhir as $br) : ?>
        <div class="modal fade" id="detail<?= $br['id_stok_akhir'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-secondary" id="exampleModalCenterTitle"><strong>Detail <?= $br['nama_barang'] ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 col-sm-3 mb-12">
                            <div class="card">
                                <img class="card-img-top" src="/asset/file/<?= $br['foto']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action"> Merek <span class="badge badge-primary"><?= $br['merek_barang']; ?></span></a>
                                        <a href="#" class="list-group-item list-group-item-action"> JUmlah Stok <span class="badge badge-primary"><?= $br['jumlah']; ?></span></a>
                                        <a href="#" class="list-group-item list-group-item-action"> Kondisi <span class="badge badge-primary"><?= $br['kondisi']; ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- detail modal -->

    <?php foreach ($stokakhir as $br) : ?>
        <!-- modal -->
        <div class="modal fade bd-example-modal<?= $br['id_stok_akhir'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Tambah Data Peminjaman</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/tambahpeminjaman/<?= $br['id_stok_akhir']; ?> ?>" method="post" enctype="multipart/form-data">
                            <?php csrf_field() ?>
                            <div class="form-group floating-label">
                                <input type="hidden" name="id" value="<?= $br['id_stok_akhir'] ?>">
                                <input class="form-control" type="text" required name="nama_barang" value="<?= $br['nama_barang'] ?>">
                                <label for="">Nama Barang</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="nama_peminjam">
                                <label for="">Nama Peminjam</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="no_hp">
                                <label for="">No Hp</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="konidsi" value="<?= $br['kondisi'] ?>">
                                <label for="">Kondisi</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="waktu_janji_kembali">
                                <label for="">Waktu Janji Pengembalian</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="jumlah">
                                <input type="hidden" name=waktu_janji_pinjam value="<?= date('d-m-Y') ?>">
                                <label for="">jumlah</label>
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
    <!-- Modal -->
    <?= $this->endSection(); ?>