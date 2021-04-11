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
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2"><?= $title ?></h6>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>No Hp</th>
                                <th>status Pengembalian</th>
                                <th>Knfirmasi pengembalian</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($peminjaman as $pj) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $pj['nama_peminjam'] ?></td>
                                    <td><?= $pj['no_hp'] ?></td>
                                    <td>
                                        <?php if ($pj['status'] == 1) : ?>
                                            <span class="badge badge-danger">Belum Di kembalikan</span>
                                            <form class="d-inline" action="/home/barangkembali/<?= $pj['id_stok_akhir'] ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $pj['id_stok_akhir']; ?>">
                                                <input type="hidden" name="jumlah" value="<?= $pj['jumlah_minjam'] ?>">
                                                <button type="submit" class="badge badge-primary"> Di kembalikan </button>
                                            </form>
                                        <?php elseif ($pj['status'] == 2) : ?>
                                            <span class="badge badge-primary">Sudah Di kembalikan</span>
                                        <?php endif ?>

                                    </td>
                                    <td>
                                        <?php if ($pj['konfir'] == 1) : ?>
                                            <span class="badge badge-warning">Belum Di konfirmasi</span>
                                        <?php elseif ($pj['konfir'] == 2) : ?>
                                            <span class="badge badge-success">Di konfirmasi</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target="#detail<?= $pj['id_peminjaman'] ?>""><i class=" fa fa-eye"> </i></button>
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
    <?php foreach ($peminjaman as $br) : ?>
        <div class="modal fade" id="detail<?= $br['id_peminjaman'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <a href="#" class="list-group-item list-group-item-action"> Waktu Peminjaman <span class="badge badge-primary"><?= $br['waktu_janji_pinjam']; ?></span></a>
                                        <a href="#" class="list-group-item list-group-item-action"> Waktu Pengembalian <span class="badge badge-primary"><?= $br['waktu_janji_kembali']; ?></span></a>
                                        <a href="#" class="list-group-item list-group-item-action"> Merek <span class="badge badge-primary"><?= $br['merek_barang']; ?></span></a>
                                        <a href="#" class="list-group-item list-group-item-action"> JUmlah yg di pinjam <span class="badge badge-primary"><?= $br['jumlah_minjam']; ?></span></a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <form class="d-inline" action="/home/konfirkembali/<?= $br['id_peminjaman'] ?>" method="post">
                                <input type="hidden" name="id" value="<?= $br['id_peminjaman']; ?>">
                                <input type="hidden" name="id_stok" value="<?= $br['id_stok_akhir'] ?>">
                                <button type="submit" class="btn btn-outline-primary btn-round "><i class=" fa fa-check"> konfirmasi pengembalian </i></button>
                            </form>
                            <form class="d-inline" action="/home/konfirminjam/<?= $br['id_peminjaman'] ?>" method="post">
                                <input type="hidden" name="id" value="<?= $br['id_peminjaman']; ?>">
                                <button type="submit" class="btn btn-outline-primary btn-round "><i class=" fa fa-check"> konfirmasi Peminjaman </i></button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php foreach ($barang as $br) : ?>
        <div class="modal fade bd-example-modal-sm<?= $br['id_stok_akhir'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong>Small modal</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet laoreet libero, et porttitor arcu. Aliquam lacus urna, mattis et lectus sit amet, tempus mollis lacus. Donec non magna lorem.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach ?>
<!-- detail modal -->
<?= $this->endSection(); ?>