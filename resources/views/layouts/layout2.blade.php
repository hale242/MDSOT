<!DOCTYPE html>
<html lang="en">

<head>

    <link href="{{asset('dist/css/style.min.css')}}" rel='stylesheet' media='screen'>
    <title>{{$MainMenus->menu_system_name}}</title>
    <link href='https://intervision.co/mock-up/assets/extra-libs/prism/prism.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/sweetalert2/dist/sweetalert2.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/select2/dist/css/select2.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/css/bootstrap2-toggle.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/jquery-steps/jquery.steps.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/jquery-steps/steps.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/fullcalendar/dist/fullcalendar.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/extra-libs/calendar/calendar.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/dist/admin/bootstrap-select.min.css' rel='stylesheet' media='screen'>
    <link href='https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css' rel='stylesheet' media='screen'>
    <link href='https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/dist/admin/style_print.css' rel='stylesheet' media='print'>
    <script src='https://intervision.co/mock-up/assets/js/jquery-1.12.4.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/jquery/ui/jquery-ui.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/sweetalert.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/jquery/dist/jquery.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>

    <style media="screen">
        .select2-container {
            width: 100% !important;
        }

        .modal {
            overflow: auto !important;
        }

        .navbar-collapse {
            background: #2f323e !important;
        }
    </style>
</head>

<body class="">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">{{$MainMenus->menu_system_name}}</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0 bg-white">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$MainMenus->menu_system_name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
                @yield('content')

                @yield('modal')


            </div>
            <footer class="footer text-center">
                All Rights Reserved by Ample admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    <script src='https://intervision.co/mock-up/assets/libs/popper.js/dist/umd/popper.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/bootstrap/dist/js/bootstrap.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/app.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/app.init.minimal.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/app-style-switcher.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/sparkline/sparkline.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/waves.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/sidebarmenu.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/custom.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/prism/prism.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/pages/datatable/datatable-basic.init.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/sweetalert2/dist/sweetalert2.all.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/sweetalert2/sweet-alert.init.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/select2/dist/js/select2.full.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/select2/dist/js/select2.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/pages/forms/select2/select2.init.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src="{{asset('assets/libs/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/libs/ckeditor/samples/js/sample.js')}}"></script>
    <script src='https://intervision.co/mock-up/assets/js/bootstrap2-toggle.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/pages/datatable/datatable-advanced.init.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/jqbootstrapvalidation/validation.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/all_foot.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/bootstrap-select.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/dataTables.buttons.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.flash.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/jszip.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/pdfmake.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/vfs_fonts.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.html5.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.print.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.colVis.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/custom.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/jquery-steps/build/jquery.steps.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/jquery-validation/dist/jquery.validate.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/moment/min/moment.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/fullcalendar/dist/fullcalendar.min.js' type="99d683863bdfcc587822f1f8-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="99d683863bdfcc587822f1f8-|49" defer=""></script>
    <script>
        var url_gb = "{{url('/')}}";
        var asset_gb = "{{asset('/')}}";

        $('.select2').select2();
    </script>
    <script>
        //default
        initSample();

        //inline editor
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.inline('editor2', {
            extraPlugins: 'sourcedialog',
            removePlugins: 'sourcearea'
        });

        var editor1 = CKEDITOR.replace('editor1', {
            extraAllowedContent: 'div',
            height: 460
        });
        editor1.on('instanceReady', function() {
            // Output self-closing tags the HTML4 way, like <br>.
            this.dataProcessor.writer.selfClosingEnd = '>';

            // Use line breaks for block elements, tables, and lists.
            var dtd = CKEDITOR.dtd;
            for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
                this.dataProcessor.writer.setRules(e, {
                    indent: true,
                    breakBeforeOpen: true,
                    breakAfterOpen: true,
                    breakBeforeClose: true,
                    breakAfterClose: true
                });
            }
            // Start in source mode.
            this.setMode('source');
        });
    </script>
    <script data-sample="1">
        CKEDITOR.replace('testedit', {
            height: 150
        });
    </script>
    <script data-sample="2">
        CKEDITOR.replace('testedit1', {
            height: 150
        });
    </script>
    <script data-sample="3">
        CKEDITOR.replace('testedit2', {
            height: 400
        });
    </script>
    <script data-sample="4">
        CKEDITOR.replace('tool-location', {
            toolbarLocation: 'bottom',
            // Remove some plugins that would conflict with the bottom
            // toolbar position.
            removePlugins: 'elementspath,resize'
        });
    </script>
    @yield('scripts')
</body>
<style media="screen">
    .gray {
        background-color: #ccc;
    }
</style>

</html>