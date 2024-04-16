<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" href="{!! asset('assets/admin/app-assets/images/ico/apple-icon-120.png') !!}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/admin/app-assets/images/ico/favicon.ico') !!}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/vendors.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/charts/apexcharts.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/extensions/tether-theme-arrows.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/extensions/tether.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/extensions/shepherd-theme-default.css') !!}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/bootstrap-extended.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/colors.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/components.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/themes/dark-layout.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/themes/semi-dark-layout.css') !!}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/core/menu/menu-types/vertical-menu.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/core/colors/palette-gradient.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/pages/dashboard-analytics.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/pages/card-analytics.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/plugins/tour/tour.css') !!}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/assets/css/style.css') !!}">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Toastr CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/extensions/toastr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/css/plugins/extensions/toastr.css') !!}">
    <!-- END: Toastr CSS-->

    <!-- BEGIN: DataTables CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/tables/datatable/datatables.min.css') !!}">
    <!-- END: Toastr CSS-->

    <!-- BEGIN: SweetAlert CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/app-assets/vendors/css/extensions/sweetalert2.min.css') !!}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- END: Toastr CSS-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Using Google Fonts (Syne)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .tippy-popper {
            display: none;
        }
        .feather {
            font-size: 14px;
        }
        @font-face{
            font-family:CircularStd;
            src:url('{{ asset("fonts/CircularStd-Book.woff2") }}');
            font-weight:300 !important;
        }
        .p-6 {
            padding:6.5px !important;
        }
    </style>
    @yield('css')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @include('admin.layouts.partials.header')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- BEGIN: Footer-->
    {{--<footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ date("Y") }}<a class="text-bold-800 grey darken-2" href="javascript:void();">{{ config('app.name', 'Laravel') }},</a>{!! $siteSettings->footer_sentence !!}</span></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>--}}
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <script src="{!! asset('assets/admin/app-assets/vendors/js/vendors.min.js') !!}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('assets/admin/app-assets/vendors/js/charts/apexcharts.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/extensions/tether.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/extensions/shepherd.min.js') !!}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{!! asset('assets/admin/app-assets/js/core/app-menu.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/js/core/app.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/js/scripts/components.js') !!}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{!! asset('assets/admin/app-assets/js/scripts/pages/dashboard-analytics.js') !!}"></script>
    <!-- Toastr -->
    <script src="{!! asset('assets/admin/app-assets/vendors/js/extensions/toastr.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/js/scripts/extensions/toastr.js') !!}"></script>
    <!-- DataTables -->
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/datatables.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/js/scripts/datatables/datatable.js') !!}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
     <!-- SweetAlert -->
    <script src="{!! asset('assets/admin/app-assets/js/scripts/extensions/sweet-alerts.js') !!}"></script>
    <script src="{!! asset('assets/admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>

        // for multiselect dropdwon
        new MultiSelectTag('working-process')
        new MultiSelectTag('industry')
        new MultiSelectTag('technology')
        new MultiSelectTag('testimonials')

        function logout() {
            document.getElementById("logout-form").submit();
        }

        function deleteConfirmation(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    document.getElementById("deleteForm" + id + "").submit();
                } else {
                    Swal.fire({
                        type: "success",
                        title: 'Cancelled!',
                        text: 'Your data is safe :)',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            });
        }
    </script>
    <!-- ck editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        // ClassicEditor
        //     .create( document.querySelector( '#editor' ) )
        //     .then( editor => {
        //         console.log( editor );
        //         $(document).on('mousedown', function(event) {
        //             if ($(event.target).closest('.ck-editor').length > 0) {
        //                 editor.editing.view.focus();
        //             }
        //         });
        //     })
        //     .catch( error => {
        //         console.error( error );
        //     });
        // Target all elements with the class 'editor'
        var editors = document.querySelectorAll('.editor');
            // Loop through each editor element
            editors.forEach(function(editorEl) {
                // Create ClassicEditor instance for each editor element
                ClassicEditor
                    .create(editorEl)
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
        });
    </script>

    <!-- ck editor end -->
    @include('admin.partials.errors')
    @yield('footer-js')
</body>
</html>
