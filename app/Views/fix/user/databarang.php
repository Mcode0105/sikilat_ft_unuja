<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<!-- Basic Examples -->
<div class="block-header">

</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Barang
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Barang</th>
                                <th>Nama Barang</th>
                                <th>Opsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($barang as $br) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $br['kategori'] ?></td>
                                    <td><?= $br['nama_barang'] ?></td>
                                    <td>
                                        <?php if ($br['aktif'] == 1) : ?>
                                            <button disabled="disabled" type=" button" class="btn btn-danger btn-block waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hubungi Admin Untuk peminjaman barang"> <i class="material-icons">create</i>Pinjam</button>
                                        <?php elseif ($br['aktif'] == 2) : ?>
                                            <button type=" button" class="btn btn-primary btn-block waves-effect" data-toggle="modal" data-target="#smallModal<?= $br['id_stok_akhir']; ?>"> <i class="material-icons">create</i>Pinjam</button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Small Size -->
<?php foreach ($barang as $br) : ?>
    <div class="modal fade" id="smallModal<?= $br['id_stok_akhir']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Masukan jumlah Pinjaman</h4>
                </div>
                <div class="modal-body">
                    <div class="body">
                        <form action="/user/tambahpeminjam/<?= $br['id_stok_akhir'] ?>" method="post">
                            <?php csrf_field() ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="jumlah" placeholder="masukan jumlah pinjman">
                                            <input type="hidden" name="nama" value="<?= session()->get('nama'); ?>">
                                            <input type="hidden" name="id" value="<?= $br['id_stok_akhir']; ?>">
                                            <input type="hidden" name="waktupinjam" value="<?= date('d-m-Y'); ?>">
                                        </div>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="no_hp" placeholder="masukan No HP" required>
                                        </div>
                                        <div class="form-line">

                                            <input type="date" name="waktukembali" class="form-control" placeholder="Waktu Pengembalian" required>
                                            <label style="color: red;" for="">waktu pengembalian </label>
                                        </div>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="kondisi" placeholder="Kondisi Barang" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">Simpan</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>