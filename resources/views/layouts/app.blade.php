<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/backend/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>@yield('title')</title>

    <link id="style" href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/icons.css') }}" rel="stylesheet" />
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/backend/colors/color1.css') }}" />
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        if (typeof axios !== 'undefined') {
            axios.defaults.headers.common['X-CSRF-TOKEN'] =
                document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        } else {
            console.error('Axios gagal dimuat!');
        }
    </script>
    <style>
        .swal2-container {
            z-index: 20000 !important;
        }
    </style>
</head>

<body class="app sidebar-mini ltr light-mode">
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('assets/backend/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('layouts.partials.header')
            @include('layouts.partials.sidebar')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">@yield('title-content')</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title-content')</li>
                                </ol>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>


        <!-- FOOTER -->
        @include('layouts.partials.footer')
        <!-- FOOTER END -->


    </div>
    <div class="modal fade" id="dinamicModals">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabels">Modal Title</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i> loading ...
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="dinamicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i> loading ...
                </div>
            </div>
        </div>
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/backend/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/peitychart/peitychart.init.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chart/rounded-barchart.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chart/utils.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/apexchart/irregular-data-series.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/charts-c3/d3.v5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/charts-c3/c3-chart.js') }}"></script>
    <script src="{{ asset('assets/backend/js/charts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/flot/dashboard.sampledata.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('assets/backend/js/index1.js') }}"></script>
    <script src="{{ asset('assets/backend/js/themeColors.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
    <script>
        $("#dinamicModals").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            var modal = $(this);

            modal.find(".modal-title").text(link.attr("data-title"));
            modal.find(".modal-body").load(link.attr("data-href"));
        });

        $("#dinamicModal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("data-href"));
            $(this).find("#myModalLabel").text(link.attr("data-bs-title"));
        });
    </script>
</body>

</html>
