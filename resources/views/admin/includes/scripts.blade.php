    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('admin/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>


    <!-- Dashboard init -->
    <script src="{{ asset('admin/js/pages/dashboard-projects.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/js/app.js') }}"></script>

    @yield('js-content')

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <script type="text/javascript">
        @if ( Session::has( 'message' ) )

            var type = "{{ Session::get('alert-type', 'info') }}";

            switch( type )
            {
                case 'info': 
                    toastr.info("{{ Session::get('message') }}");
                break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                break;

                case 'error': 
                    toastr.error("{{ Session::get('message') }}");
                break;  
            }

        @endif
    </script>

    