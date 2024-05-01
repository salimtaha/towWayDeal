<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('default.jpg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('default.jpg') }}" type="image/x-icon">
    <title> @yield('title') </title>

    <!-- Google font-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/vendors/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/vendors/flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/vendors/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/vendors/prism.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/vendors/chartist.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/dropify.css') }}">

    {{-- datatables  --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
    {{-- select 2 tag --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/noty/noty.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('css')
</head>

{{-- class="rtl dark" --}}

<body class="rtl">

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        @include('admin.layouts.header')

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            @include('admin.layouts.sidebar')

            <div class="page-body">
                @yield('body')
            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright text-start">
                            <p class="mb-0">Copyright 2024 ©Salem Alkassas All rights reserved.</p>
                        </div>
                        <div class="col-md-6 pull-right text-end">
                            <p class=" mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
        </div>
    </div>

    <!-- latest jquery-->
    <script src="{{ asset('assets/admin') }}/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/admin') }}/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/admin') }}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/admin') }}/js/sidebar-menu.js"></script>

    <!--chartist js-->
    <script src="{{ asset('assets/admin') }}/js/chart/chartist/chartist.js"></script>

    <!--chartjs js-->
    <script src="{{ asset('assets/admin') }}/js/chart/chartjs/chart.min.js"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/admin') }}/js/lazysizes.min.js"></script>

    <!--copycode js-->
    <script src="{{ asset('assets/admin') }}/js/prism/prism.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/clipboard/clipboard.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/custom-card/custom-card.js"></script>

    <!--counter js-->
    <script src="{{ asset('assets/admin') }}/js/counter/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/counter/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/counter/counter-custom.js"></script>

    <!--peity chart js-->
    <script src="{{ asset('assets/admin') }}/js/chart/peity-chart/peity.jquery.js"></script>

    <!-- Apex Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--sparkline chart js-->
    <script src="{{ asset('assets/admin') }}/js/chart/sparkline/sparkline.js"></script>

    <!--Customizer admin-->
    <script src="{{ asset('assets/admin') }}/js/admin-customizer.js"></script>

    <!--dashboard custom js-->
    <script src="{{ asset('assets/admin') }}/js/dashboard/default.js"></script>

    <!--right sidebar js-->
    <script src="{{ asset('assets/admin') }}/js/chat-menu.js"></script>

    <!--height equal js-->
    <script src="{{ asset('assets/admin') }}/js/height-equal.js"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/admin') }}/js/lazysizes.min.js"></script>

    <!--script admin-->
    <script src="{{ asset('assets/admin') }}/js/admin-script.js"></script>
    {{-- dropify to apper image in input --}}
    <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
    {{-- datatables cdn --}}
    {{-- <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script> --}}
    <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

    {{-- select 2 tag --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- script to apper error validation to 5 second --}}
    <script>
        // Hide the error message after a specified duration
        window.onload = function() {
            setTimeout(function() {
                var errorAlert = document.getElementById('errorAlert');
                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
            }, {{ session('errorLifetime', 5) }} * 1000); // Default to 5 seconds
        };
    </script>

    {{-- flash message --}}
    <script src="{{ asset('assets/noty/noty.min.js') }}"></script>
    </script>
    @if (session('success'))
        <script>
            new Noty({
                type: 'success',
                layout: 'topCenter',
                text: "{{ session('success') }}",
                timeout: 4000,
                killer: true
            }).show();
        </script>
    @endif
    @if (session('failed'))
        <script>
            new Noty({
                type: 'error',
                layout: 'topCenter',
                text: "{{ session('failed') }}",
                timeout: 4000,
                killer: true
            }).show();
        </script>
    @endif


    {{-- error validation  time --}}
    <script>
        // Hide the error message after a specified duration
        window.onload = function() {
            setTimeout(function() {
                var errorAlert = document.getElementById('errorAlert');
                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
            }, {{ session('errorLifetime', 5) }} * 1000); // Default to 5 seconds
        };
    </script>

    {{-- Lock screen --}}
    <script>
        function lockScreen() {
            // Create overlay element
            var overlay = document.createElement('div');
            overlay.style.position = 'fixed';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // semi-transparent black
            overlay.style.zIndex = '9999'; // make sure it's above everything else
            document.body.appendChild(overlay);
        }
    </script>


    {{-- <script>
        $(document).ready(function() {

            $('.sidebar-menu').tree();

            //icheck
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

            //delete
            $('.delete').click(function(e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function() {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function() {
                            n.close();
                        })
                    ]
                });

                n.show();

            }); //end of delete




            // ckeditor to change lang
            CKEDITOR.config.language = "{{ app()->getLocale() }}";

        }); //end of ready
    </script> --}}

    <script>
        document.querySelector('div.demo-html')
            .setAttribute('dir', 'rtl'); // Demo only

        new DataTable('#example');
    </script>
    @livewireScripts
    @stack('js')
</body>

</html>
