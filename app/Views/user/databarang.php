<?= $this->extend('layout/templateuser') ?>
<?= $this->section('conten'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="page-header-title">
                        <h4>Data Barang</h4>
                    </div>
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index-2.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Pages</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!"><?= $title ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success background-primary">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong> <?= (session()->getFlashdata('pesan')) ?></strong>
                            </div>
                        <?php endif ?>
                        <form action="/user/databarang" method="post">
                            <div class="input-group input-group-button">
                                <span class="input-group-addon" id="basic-addon9">
                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search"></i></button>
                                </span>
                                <input name="keyword" type="text" class="form-control" placeholder="Masukan Keyworad Pencarian..!" autofocus>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <?php foreach ($barang as $br) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="card prod-view">
                                    <div class="prod-item text-center">
                                        <div class="prod-img">
                                            <div class="option-hover">
                                                <?php if ($br['aktif'] == 1) : ?>
                                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon" data-toggle="modal" data-target="#small-Modal<?= $br['id_stok_akhir'] ?>">
                                                        <i class="icofont icofont-brand-aliexpress"></i>
                                                    </button>
                                                <?php elseif ($br['aktif'] == 2) : ?>
                                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon" data-toggle="modal" data-target="#default-Modal<?= $br['id_stok_akhir'] ?>">
                                                        <i class="icofont icofont-brand-aliexpress"></i>
                                                    </button>
                                                <?php endif ?>
                                                <button type="button" class="btn btn-warning btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon" data-toggle="modal" data-target="#default-Modaldetail<?= $br['id_stok_akhir'] ?>">
                                                    <i class="icofont icofont-eye-alt f-20"></i>
                                                </button>
                                            </div>
                                            <a href="#!" class="hvr-shrink">
                                                <img src="/asset/file/<?= $br['foto'] ?>" class="img-fluid img-thumbnail o-hidden" alt="<?= $br['foto'] ?>">
                                            </a>
                                            <div class="p-new"><a href="#"> New </a></div>
                                        </div>
                                        <div class="prod-info">
                                            <h5><a href="#" class="txt-muted"><?= $br['nama_barang'] ?> </a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="text-center">
                    <?= $pager->links('tb_barang', 'barang_page'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($barang as $br) : ?>
    <div class="modal fade" id="default-Modal<?= $br['id_stok_akhir'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Transaksi peminjaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/tambahpeminjam/<?= $br['id_stok_akhir'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $br['id_stok_akhir']; ?>">
                        <input type="hidden" name="id_kategori" value="<?= $br['id_kategori']; ?>">
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                        <input type="hidden" name="id_instansi" value="<?= session()->get('id_instansi'); ?>">
                        <?php date_default_timezone_set('asia/jakarta'); ?>
                        <input type="hidden" name="tgl" value="<?= date('d-m-Y'); ?>">
                        <input type="hidden" name="waktupinjam" value="<?= date('d-m-Y'); ?>">
                        <input type="hidden" class="form-control" name="kondisi" placeholder="Kondisi Barang" required value="<?= $br['kondisi'] ?>">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-round" placeholder="Jumlah Peminjaman" name="jumlah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Hp</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-round" placeholder="* Usahakan No Hp Yg Aktif" name="no_hp" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pengembalian</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control form-control-round" name="waktukembali">

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($barang as $br) : ?>
    <div class="modal fade" id="default-Modaldetail<?= $br['id_stok_akhir'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deatil <?= $br['nama_barang']; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-lg-12">
                        <div class="card card-block user-card">
                            <ul class="scroll-list flip">
                                <li>
                                    <h6>Merek Barang : <label class="badge badge-primary"><?= $br['merek_barang'] ?></label></h6>
                                </li>

                                <li>
                                    <h6>JUmlah : <label class="badge badge-primary"><?= $br['jumlah'] ?></label></h6>
                                </li>
                                <li>
                                    <h6>Kondisi : <label class="badge badge-primary"><?= $br['kondisi'] ?></label></h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($barang as $br) : ?>
    <div class="modal fade" id="small-Modal<?= $br['id_stok_akhir'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mohon Maaf
                        <p>Hubungi Kepala laboratorium Untuk Melakukan Penijaman.</p>
                    </h4>
                </div>
                <div class="modal-body">
                    <div style="position:fixed;left:50px; top:130px; ">
                        <form action="/user/proses">
                            <input type="hidden" name="barang" value="<?= $br['id_stok_akhir'] ?>">
                            <button type="submit" style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">Call Me</button>
                        </form>
                    </div>
                    <div style="position:fixed;left:150px; top:130px;">
                        <a target="_blank" href="https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=munifabdul603@gmail.com&passkey=Hm123123&no_tujuan=082330245697&pesan=assalamualaikum saya ingin melakukan peminjaman barang laboratorium dengan jenis <?= $br['nama_barang'] ?>">
                            <button style="background:#FFFFFF;vertical-align:center;height:36px;border-radius:5px">
                                <img width="30px" height="30px" src="/asset/telp.png"> SMS</button></a>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>