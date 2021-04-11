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

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title><?= $title; ?></title>
</head>

<body>
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->

    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
        <div class="row header shadow-sm">

            <!--Logo-->
            <div class="col-sm-3 pl-0 text-center header-logo">
                <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
                    <h3 class="logo"><a href="/" class="text-secondary logo"><i class="fa fa-desktop"></i> INV LAB FT UNUJA<span class="small"></span></a></h3>
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
                                <a class="dropdown-item" href="#"><i class="fa fa-user pr-2"></i> Profile</a>
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
                                <a href="/" class=""><i class="fa fa-dashboard mr-3"></i>
                                    <span class="none">Dhasboard </span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('barang'); return true" class=""><i class="fa fa-database mr-3"></i>
                                    <span class="none">Data master <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="barang">
                                    <li class="child"><a href="/home/kategori" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Kategori</a></li>
                                    <li class="child"><a href="/home/barang" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Data barang</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('stok'); return false" class=""><i class="fa fa-briefcase mr-3"></i>
                                    <span class="none">Data Stok <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="stok">
                                    <li class="child"><a href="/home/stok_akhir" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Stok Akhir</a></li>

                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('peminjaman'); return false" class=""><i class="fa fa-shopping-cart mr-3"></i>
                                    <span class="none">Data Transaksi <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="peminjaman">
                                    <li class="child"><a href="/home/peminjaman" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Peminjaman</a></li>

                                </ul>
                            </li>
                            <li class="parent">
                                <a href="/home/user" class=""><i class="fa fa-user mr-3"></i>
                                    <span class="none">User Profil </span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="/home/history" class=""><i class="fa fa-history mr-3"></i>
                                    <span class="none">History </span>
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
            <!--Footer-->
            <div class="row mt-5 mb-4 footer">
                <div class="col-sm-8">
                    <span>&copy; All rights reserved <?= date('Y'); ?> designed by <a class="text-theme" href="#">LAB FAKULTAS TEKNIK UNUJA</a></span>
                </div>
            </div>
        </div>
        <!--Footer-->
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        })
    </script>
    <!--Custom Js Script-->
    <script src="/asset/assets/js/custom.js"></script>
    <!--Custom Js Script-->

    <!--Alertify JS-->
    <script src="assets/js/alertify.min.js"></script>
    <!--/Alertify JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Sweet alert JS-->
    <script src="assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->

</body>

</html>