<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<!-- Basic Examples -->
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Transaksi Anda
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                            <span class="label bg-red">Belum Di kembalikan</span>
                                        <?php elseif ($br['status'] == 2) : ?>
                                            <span class="label bg-blue">Sudah Di kembalikan</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($br['konfir'] == 1) : ?>
                                            <span class="label bg-yellow">Belum Di konfirmasi</span>
                                        <?php elseif ($br['konfir'] == 2) : ?>
                                            <span class="label bg-green">Di konfirmasi</span>
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

<?= $this->endSection() ?>