<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Favicon Icon-->
    <link rel="icon" href="/asset/480px_logo_unuja.ico" type="image/x-icon">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/asset/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/asset/assets/css/quicksand.css">
    <link rel="stylesheet" href="/asset/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="/asset/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/asset/assets/css/fontawesome.css">
    <!--Animate CSS-->
    <link rel="stylesheet" href="/asset/assets/css/animate.min.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="/asset/assets/css/chartist.min.css">
    <!--Map-->
    <link rel="stylesheet" href="/asset/assets/css/jquery-jvectormap-2.0.2.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/asset/assets/js/calendar/bootstrap_calendar.css">
    <!--Nice select -->
    <link rel="stylesheet" href="/asset/assets/css/nice-select.css">
    <!--Datatable-->
    <link rel="stylesheet" href="/asset/assets/css/dataTables.bootstrap4.min.css">
    <link href="/asset/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link rel=" stylesheet " href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css " integrity=" sha384-ggOyR0iXCbMQv3Xipma34MD + dH / 1fQ784 / j6cY / iJTQUOhcWr7x9JvoRxT2MZw1T " crossorigin="anonim">
    <link rel=" stylesheet " href=" https://cdn.jsdelivr.net/npm/multiple-select-js/dist/css/multiple-select.css">
    <script src=" https://cdn.jsdelivr.net/npm/multiple-select-js/dist/js/multiple-select.js"> </script>





    <title><?= $title; ?></title>
</head>

<body>

    <!--Page loader-->

    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
        <div class="row header shadow-sm">

            <!--Logo-->
            <div class="col-sm-3 pl-0 text-center header-logo">
                <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
                    <h3 class="logo"><a href="/home" class="text-secondary logo"><i class="fa fa-desktop"></i> INV LAB FT UNUJA<span class="small"></span></a></h3>
                </div>
            </div>
            <!--Logo-->

            <!--Header Menu-->
            <div class="col-sm-9 header-menu pt-2 pb-0">
                <div class="row">

                    <!--Menu Icons-->
                    <div class="col-sm-4 col-8 pl-0">
                        <!--Toggle sidebar-->
                        <span class="menu-icon" onclick="toggle_sidebar()">
                            <span id="sidebar-toggle-btn"></span>
                        </span>
                        <!--Toggle sidebar-->
                        <div class="menu-icon">
                            <a class="" href="#" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                                <i class="fa fa-bell"></i>
                                <?php if ($notivvew > 0) : ?>
                                    <span class="badge badge-danger"><?= $notivvew  ?>
                                    </span>
                                <?php else : ?>
                                <?php endif ?>
                            </a>
                            <!-- notif -->
                            <div class="dropdown dropdown-left bg-white shadow border">
                                <a class="dropdown-item" href="#"><strong>Notifikasi peminjaman barang </strong></a>
                                <div class="dropdown-divider"></div>
                                <?php foreach ($notifproses as $pr) : ?>
                                    <a href="#" class="dropdown-item">
                                        <div class="media">
                                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                                                <i class="fa fa-bookmark"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0"><strong><?= $pr['nama_barang'] ?></strong></h6>
                                                <small class="text-success"><?= $pr['created_at'] ?></small>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach ?>
                                <a class="dropdown-item text-center link-all" href="/prosespeminjaman">lihat semua notifikasi></a>
                            </div>
                        </div>
                        <!--Notication icon-->
                        <!-- notif all -->
                        <div class="menu-icon">
                            <a class="" href="#" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                                <i class="fa fa-bell"></i>
                                <?php if ($notiflab > 0) : ?>
                                    <span class="badge badge-danger"><?= $notiflab    ?>
                                    </span>
                                <?php else : ?>
                                <?php endif ?>
                            </a>
                            <!-- notif -->
                            <div class="dropdown dropdown-left bg-white shadow border">
                                <a class="dropdown-item" href="#"><strong>Notifikasi </strong></a>
                                <div class="dropdown-divider"></div>
                                <?php foreach ($labnotif as $pr) : ?>
                                    <a href="" class="dropdown-item">
                                        <div class="media">
                                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                                                <i class="fa fa-bookmark"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0"><strong><?= $pr['nama_lab'] ?></strong></h6>
                                                <small class="text-success"><?= $pr['created_at'] ?></small>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach ?>
                                <a class="dropdown-item text-center link-all" href="/peminjamanlab">lihat semua notifikasi></a>
                            </div>
                        </div>
                        <!--Notication icon-->
                    </div>
                    <!--Menu Icons-->

                    <!--Search box and avatar-->
                    <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">

                        <div class="mr-4">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/asset/file/<?= session()->get('foto') ?>" alt="Adam" class="rounded-circle" width="40px" height="40px">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="/profil"><i class="fa fa-user pr-2"></i> Profile</a>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modalpsw">
                                    <i class="fa fa-gear"></i> Pengaturan
                                </button>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/home/logout"><i class="fa fa-power-off pr-2"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!--Search box and avatar-->
                </div>
            </div>
            <!--Header Menu-->
        </div>
        <!--Header-->
        <!-- modal ganti pasword -->
        <div class="modal fade bd-example-modalpsw" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong>Form ganti pasword</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <form action="/home/gantipassword" method="post" enctype="multipart/form-data">
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="paswordlama" autofocus>
                                <label for="">Pasword lama </label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="password" required name="paswordbaru">
                                <label for="">Pasword Baru </label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" type="text" required name="konfirmasi">
                                <label for="">konfirmasi password </label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"> simpan</i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal ganti pasword -->
        <!--Main Content-->

        <div class="row main-content">
            <!--Sidebar left-->
            <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div class="inner-sidebar mr-3">
                    <!--Image Avatar-->
                    <div class="avatar text-center">
                        <img src="/asset/file/<?= session()->get('foto') ?>" alt="" class="rounded-circle" />
                        <p><strong><?= session()->get('username'); ?></strong></p>
                        <span class="text-primary small"><strong>Administrator</strong></span>
                    </div>
                    <!--Image Avatar-->
                    <!--Sidebar Navigation Menu-->
                    <div class="sidebar-menu-container">
                        <ul class="sidebar-menu mt-4 mb-4">
                            </li>
                            <li class="parent">
                                <a href="/home" class=""><i class="fa fa-dashboard mr-3"></i>
                                    <span class="none">Dhasboard </span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('barang'); return true" class=""><i class="fa fa-database mr-3"></i>
                                    <span class="none">Data master <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="barang">
                                    <li class="child"><a href="/kategori" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Kategori</a></li>
                                    <li class="child"><a href="/instansi" class="ml-4"><i class="fa fa-angle-right mr-2"></i> instansi</a></li>
                                    <li class="child"><a href="/dosen" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Data Dosen</a></li>
                                    <li class="child"><a href="/aslab" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Asisten Lab</a></li>
                                    <li class="child"><a href="/barang" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Data barang</a></li>
                                    <li class="child"><a href="/laboratorium" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Data Laboratorium</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('stok'); return false" class=""><i class="fa fa-briefcase mr-3"></i>
                                    <span class="none">Data Stok <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="stok">
                                    <li class="child"><a href="/stok_akhir" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Stok Akhir</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('peminjaman'); return false" class=""><i class="fa fa-shopping-cart mr-3"></i>
                                    <span class="none"> History Transaksi <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="peminjaman">
                                    <li class="child"><a href="/peminjaman" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Peminjaman</a></li>
                                    <li class="child"><a href="/pengeluaran" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Pengeluaran</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('laporan'); return false" class=""><i class="fa fa-file mr-3"></i>
                                    <span class="none"> laporan <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="laporan">
                                    <li class="child"><a href="/laporan_barang" class="ml-4"><i class="fa fa-angle-right mr-2"></i> barang</a></li>
                                    <li class="child"><a href="/laporan_peminjaman" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Peminjaman</a></li>
                                    <li class="child"><a href="/laporan_pengeluaran" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Pengeluaran</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="/prosespeminjaman" class=""><i class="fa fa-history mr-3"></i>
                                    <span class="none">Proses Peminjaman</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="/peminjamanlab" class=""><i class="fa fa-desktop mr-3"></i>
                                    <span class="none">Peminjaman LAB</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="/ecomplain" class=""><i class="fa fa-comments mr-3"></i>
                                    <span class="none">Data E-complain</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="/profil" class=""><i class="fa fa-user mr-3"></i>
                                    <span class="none">User Profil </span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="/home/logout" class=""><i class="fa fa-sign-out mr-3"></i>
                                    <span class="none">Logout </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--Sidebar Naigation Menu-->
                </div>
            </div>
            <!--Sidebar left-->
            <!--Content right-->
            <?= $this->renderSection('konten'); ?>

        </div>
        <!--Footer-->
    </div>
    </div>

    <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="/asset/assets/js/jquery.min.js"></script>
    <script src="/asset/assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="/asset/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="/asset/assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="/asset/assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="/asset/assets/js/progressbar.min.js"></script>
    <!--Flot.JS-->
    <script src="/asset/assets/js/charts/jquery.flot.min.js"></script>
    <script src="/asset/assets/js/charts/jquery.flot.pie.min.js"></script>
    <script src="/asset/assets/js/charts/jquery.flot.categories.min.js"></script>
    <script src="/asset/assets/js/charts/jquery.flot.stack.min.js"></script>
    <!--Chart JS-->
    <script src="/asset/assets/js/charts/chart.min.js"></script>
    <!--Chartist JS-->
    <script src="/asset/assets/js/charts/chartist.min.js"></script>
    <script src="/asset/assets/js/charts/chartist-data.js"></script>
    <script src="/asset/assets/js/charts/demo.js"></script>
    <!--Maps-->
    <script src="/asset/assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/asset/assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/asset/assets/js/maps/jvector-maps.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/asset/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/asset/assets/js/calendar/demo.js"></script>
    <!--Nice select-->
    <script src="/asset/assets/js/jquery.nice-select.min.js"></script>

    <!--Custom Js Script-->
    <script src="/asset/assets/js/custom.js"></script>
    <!--Custom Js Script-->
    <script>
        //Nice select
        $('.bulk-actions').niceSelect();
    </script>
    <!--Datatable-->
    <script src="/asset/assets/js/jquery.dataTables.min.js"></script>
    <script src="/asset/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['print', 'excel', 'pdf']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        new MultipleSelect('#select-multiple-language', {
            placeholder: 'Select Language'
        })
    </script>
    <!--Custom Js Script-->
    <script src="/asset/assets/js/custom.js"></script>
    <script src="/asset/assets/js/ddtf.js"></script>
    <!--Custom Js Script-->
    <!--Alertify JS-->
    <script src="assets/js/alertify.min.js"></script>
    <!--/Alertify JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Sweet alert JS-->
    <script src="assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <!-- <script>
        //$('#example').ddTableFilter();
    </script> -->


</body>

</html>