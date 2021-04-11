<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong><?= $title ?></strong></h5>
    <span class="text-secondary">Pages <i class="fa fa-angle-right"></i><?= $title ?></span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <?php if (\Config\Services::validation()->hasError('gambar')) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong><i class="fa fa-times"></i> <?= \Config\Services::validation()->getError('gambar'); ?></strong>
                </div>
            <?php endif ?>
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
                                    <th>Nama Lab</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>kondisi</th>
                                    <th>keterangan</th>
                                    <th>gambar</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($baranglab as $br) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $br['nama_lab'] ?></td>
                                        <td><?= $br['kategori'] ?></td>
                                        <td><?= $br['jumlah'] ?></td>
                                        <td><?= $br['status'] ?></td>
                                        <td><?= $br['keterangan'] ?></td>
                                        <td>
                                            <img height="50px" width="50px" src="/asset/file/<?= $br['gambar'] ?>" alt="">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger icon-round shadow" href="/home/delbaranglab/<?= $br['id_baranglab'] ?>"><i class="fa fa-trash"></i></a>
                                            <button class="btn btn-success icon-round shadow" data-toggle="modal" data-target=".bd-example-modal<?= $br['id_baranglab'] ?>"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-warning icon-round shadow" data-toggle="modal" data-target=".bd-example-modalkeluar<?= $br['id_baranglab'] ?>"><i class="fa fa-sign-out"></i></button>
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

    <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-secondary"><strong> Tambah Data Barang</strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify">
                    <!--Floating label-->
                    <form action="/home/tambahbaranglab" method="post" enctype="multipart/form-data">
                        <?php csrf_field() ?>
                        <div class="form-group floating-label">
                            <select id="" class="custom-select" name="lab">
                                <?php foreach ($lab as $kn) : ?>
                                    <option value="<?= $kn['id_lab'] ?>"><?= $kn['nama_lab']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="" class="mt-1">Nama Lab</label>
                        </div>
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
                            <label for="">Merek Barang</label>
                        </div>
                        <div class="form-group floating-label">
                            <select id="" class="custom-select" name="kondisi">
                                <option value="baik">baik</option>
                                <option value="rusak">rusak</option>
                            </select>
                            <label for="" class="mt-1">Kondisi</label>
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

    <?php foreach ($baranglab as $br) : ?>
        <!-- edit -->
        <div class="modal fade bd-example-modal<?= $br['id_baranglab'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Edit Data Barang <?= $br['nama_barang'] ?> </strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/editbaranglab/<?= $br['id_baranglab'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $br['gambar']; ?>" name="gambarlama">
                            <input type="hidden" name="id_baranglab" value="<?= $br['id_baranglab'] ?>">
                            <?php csrf_field() ?>
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="lab">
                                    <option value="<?= $br['id_lab'] ?>"><?= $br['nama_lab']; ?></option>
                                    <?php foreach ($lab as $kn) : ?>
                                        <option value="<?= $kn['id_lab'] ?>"><?= $kn['nama_lab']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="" class="mt-1">Nama Lab</label>
                            </div>
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="kategori">
                                    <option selected value="<?= $br['id_kategori'] ?>"><?= $br['kategori']; ?></option>
                                    <?php foreach ($kategori as $kn) : ?>
                                        <option value="<?= $kn['id_kategori'] ?>"><?= $kn['kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="" class="mt-1">Kategori</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="nama_barang" value="<?= $br['nama_barang'] ?>">
                                <?php date_default_timezone_set('asia/jakarta') ?>
                                <input type="hidden" name="tgl" value="<?= date('d-m-Y'); ?>">
                                <label for="">Nama Barang</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="merek_barang" value="<?= $br['merek_barang'] ?>">
                                <label for="">Merek Barang</label>
                            </div>
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="kondisi">
                                    <option value="baik">baik</option>
                                    <option value="rusak">rusak</option>
                                </select>
                                <label for="" class="mt-1">Kategori</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                                <label for="">Foto</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="jumlah" value="<?= $br['jumlah'] ?>">
                                <label for="">jumlah</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" name="keterangan" value="<?= $br['keterangan'] ?>">
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
        <!-- edit -->
    <?php endforeach ?>

    <!-- keluar -->
    <?php foreach ($baranglab as $br) : ?>
        <!-- edit -->
        <div class="modal fade bd-example-modalkeluar<?= $br['id_baranglab'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong> Keluarkan Data Barang <?= $br['nama_barang'] ?> </strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <!--Floating label-->
                        <form action="/home/baranglabkeluar/<?= $br['id_baranglab'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_baranglab" value="<?= $br['id_baranglab'] ?>">
                            <input type="hidden" name="kategori" value="<?= $br['id_kategori'] ?>">
                            <input type="hidden" name="nama_barang" value="<?= $br['nama_barang'] ?>">
                            <?php date_default_timezone_set('asia/jakarta') ?>
                            <input type="hidden" name="tgl" value="<?= date('d-m-Y'); ?>">
                            <?php csrf_field() ?>
                            <div class="form-group floating-label">
                                <select id="" class="custom-select" name="kondisi">
                                    <option value="baik">baik</option>
                                    <option value="rusak">rusak</option>
                                </select>
                                <label for="" class="mt-1">Kondisi</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="jumlah">
                                <label for="">jumlah</label>
                                <p style="color: red;font-size: 10px;">*Jumlah barang yg di ganti</p>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="merek_barang">
                                <label for="">Merek Barang</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="posisi">
                                <label for="">Posisi</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="file" class="form-control" id="exampleFormControlFile1" name="gambar">
                                <label for="">Foto</label>
                            </div>

                            <div class="form-group floating-label">
                                <input class="form-control" type="text" name="keterangan">
                                <label for="">Keterangan</label>
                                <p style="color: red;font-size: 10px;">*keterangan pengeluaran / penggantian barang sesua kerusakan yg di maintenance</p>
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
        <!-- edit -->
    <?php endforeach ?>
    <!-- keluar -->
    <?= $this->endSection(); ?>