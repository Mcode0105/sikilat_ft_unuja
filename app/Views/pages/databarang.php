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
            <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-edit"> Tambah Data</i></button>

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
                                <?php foreach ($barang as $br) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $br['nama_barang'] ?></td>
                                        <td><?= $br['kategori'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-theme btn-round" data-toggle="modal" data-target="#detail<?= $br['id_barang'] ?>""><i class=" fa fa-eye"> </i></button>
                                            <button type="button" class="btn btn-outline-success btn-round" data-toggle="modal" data-target=".bd-example-modaledit<?= $br['id_barang']; ?>"><i class=" fa fa-edit"> </i></button>
                                            <a href="/home/delbarang/<?= $br['id_barang']; ?>" class="btn btn-outline-danger btn-round"><i class=" fa fa-trash"> </i></button>
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
    <!-- modal -->
    <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-secondary"><strong> Tambah Data Barang</strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify">
                    <!--Floating label-->
                    <form action="/home/tambahbarang" method="post" enctype="multipart/form-data">
                        <?php csrf_field() ?>
                        <div class="form-group floating-label">
                            <select id="" class="custom-select" name="kategori">
                                <?php foreach ($kategori as $kn) : ?>
                                    <option value="<?= $kn['id_kategori'] ?>"><?= $kn['kategori']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="" class="mt-1">Kategori</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="nama_barang">
                            <?php date_default_timezone_set('asia/jakarta') ?>
                            <input type="hidden" name="tgl" value="<?= date('d-m-Y'); ?>">
                            <label for="">Nama Barang</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="merek_barang">
                            <label for="">Merk</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="posisi">
                            <label for="">posisi</label>
                        </div>
                        <div class="form-group floating-label">
                            <select id="" class="custom-select" name="kondisi">
                                <option value="baik">Baik</option>
                                <option value="baik">Rusak</option>
                                <option value="baik">Cukup</option>
                            </select>
                            <label for="" class="mt-1">KOndisi</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                            <label for="">Foto</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" required name="jumlah">
                            <label for="">jumlah</label>
                        </div>
                        <div class="form-group floating-label">
                            <input class="form-control" type="text" name="keterangan">
                            <label for="">Keterangan</label>
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
    <!-- detai modal -->
    <!-- Modal -->
    <?php foreach ($barang as $br) : ?>
        <div class="modal fade" id="detail<?= $br['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <a href="#" class="list-group-item list-group-item-action"> Posisi <span class="badge badge-primary"><?= $br['posisi']; ?></span></a>
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

    <!-- modal -->
    <?php foreach ($barang as $br) : ?>
        <div class="modal fade bd-example-modaledit<?= $br['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> edit Data Barang</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/editbarang/<?= $br['id_barang']; ?>" method="post" enctype="multipart/form-data">
                            <?php csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $br['id_barang']; ?>">
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="kategori">
                                    <?php foreach ($kategori as $kn) : ?>
                                        <option value="<?= $kn['id_kategori'] ?>"><?= $kn['kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="" class="mt-1">Kategori</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="nama_barang" value="<?= $br['nama_barang']; ?>">
                                <?php date_default_timezone_set('asia/jakarta') ?>
                                <input type="hidden" name="tgl" value="<?= date('d-m-Y'); ?>">
                                <label for="">Nama Barang</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="merek_barang" value="<?= $br['merek_barang']; ?>">
                                <label for="">Merk</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="posisi" value="<?= $br['posisi']; ?>">
                                <label for="">posisi</label>
                            </div>
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="kondisi">
                                    <option value="baik">Baik</option>
                                    <option value="baik">Rusak</option>
                                    <option value="baik">Cukup</option>
                                </select>
                                <label for="" class="mt-1">KOndisi</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="hidden" name="gambarlama" value="<?= $br['foto']; ?>">
                                <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                                <label for="">Foto</label>
                            </div>
                            <div class="form-group floating-label">

                                <input class="form-control" type="text" required name="jumlah" value="<?= $br['jumlah']; ?>">
                                <label for="">jumlah</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" name="keterangan" value="<?= $br['keterangan']; ?>">
                                <label for="">Keterangan</label>
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

    <script>
        var table = $('#example').DataTable();

        var data = table.buttons.exportData({
            modifier: {
                selected: true
            }
        });
    </script>
    <?= $this->endSection(); ?>