<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="page-header-title">
                        <h4> Peminjaman laboratorium </h4>

                    </div>
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Pages</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!"><?= $title; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Peminjman Laboratorium </h6>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#default-Modal">Peminjaman</button>
                                    </div>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Lab</th>
                                                    <th>Tgl pengembalian</th>
                                                    <th>waktu </th>
                                                    <th>catatan </th>
                                                    <th>status Validasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($peminjaman as $br) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $br['nama_lab'] ?></td>
                                                        <td><?= $br['tgl_minjam'] ?></td>
                                                        <td><?= $br['waktu'] ?></td>
                                                        <td><?= $br['catatan'] ?></td>
                                                        <td>
                                                            <?php if ($br['status'] == 1) : ?>
                                                                <span class="badge badge-danger">Belum Di Validasi</span>
                                                            <?php elseif ($br['status'] == 2) : ?>
                                                                <span class="badge badge-primary">Sudah Di validasi Pada <?= $br['updated_at'] ?> </span>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Peminjaman Lab</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/User/pinjamlab" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">LAB</label>
                        <div class="col-sm-8">
                            <select name="lab" class="form-control">
                                <option value="opt1" disabled>LAB</option>
                                <?php foreach ($lab as $lb) : ?>
                                    <option <?= $lb['st'] == 1 ? 'disabled' : '' ?> value="<?= $lb['id_lab'] ?>"><?= $lb['nama_lab'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <label class="col-sm-4 col-form-label">Kebutuhan</label>
                        <div class="col-sm-8">
                            <select name="kebutuhan" class="form-control form-control-default">
                                <option disabled>Pilih kebutuhan</option>
                                <option value="PRAKTIKUM">TUGAS AKHIR</option>
                                <option value="PRAKTIKUM">PRAKTIKUM</option>
                                <option value="PELATIHAN">PELATIHAN</option>
                            </select>
                        </div>
                        <label class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <select name="kelas" class="form-control form-control-default">
                                <option disabled>Pilih Kelas</option>
                                <option value="PUTRA">PUTRA</option>
                                <option value="PUTRI">PUTRI</option>
                            </select>
                        </div>
                        <label class="col-sm-4 col-form-label">Waktu</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="time" name="waktu" />
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="time" name="waktu" />
                        </div>
                        <label class="col-sm-4 col-form-label">Kebutuhan</label>
                        <div class="col-sm-8">
                            <textarea name="catatan" rows="5" cols="5" class="form-control" placeholder="Catatan"></textarea>
                        </div>
                    </div>
                    <?php date_default_timezone_set('asia/jakarta'); ?>
                    <input type="hidden" name="tgl_minjam" value="<?= date('d-m-Y') ?>">
                    <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                    <input type="hidden" name="id_instansi" value="<?= session()->get('id_instansi'); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>