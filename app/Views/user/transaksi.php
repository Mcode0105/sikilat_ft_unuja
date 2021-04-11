<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="page-header-title">
                        <h4> History Peminjaman </h4>

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
                                    <h6> History Peminjaman </h6>
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
                                                    <th>Nama Barang</th>
                                                    <th>jumlah minjam</th>
                                                    <th>waktu pengembalian</th>
                                                    <th>waktu peminjaman</th>
                                                    <th>status pengembalian</th>
                                                    <th>konfirmasi peminjaman</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($peminjaman as $br) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $br['nama_barang'] ?></td>
                                                        <td><?= $br['jumlah_minjam'] ?></td>
                                                        <td><?= $br['waktu_janji_pinjam'] ?></td>
                                                        <td><?= $br['waktu_janji_kembali'] ?></td>
                                                        <td>
                                                            <?php if ($br['status'] == 1) : ?>
                                                                <span class="badge badge-danger">Belum Di kembalikan</span>
                                                            <?php elseif ($br['status'] == 2) : ?>
                                                                <span class="badge badge-primary">Di kembalikan pada <?= $br['updated_at'] ?> </span>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($br['konfir'] == 1) : ?>
                                                                <span class="badge badge-warning">Belum Di konfirmasi</span>
                                                            <?php elseif ($br['konfir'] == 2) : ?>
                                                                <span class="badge badge-info">Di konfirmasi</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>