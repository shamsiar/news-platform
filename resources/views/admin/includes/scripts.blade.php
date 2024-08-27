    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/plugins.js') }}"></script> --}}

    {{-- Summernote --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
      integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-en-US.min.js"
      integrity="sha512-BSHjWY0wea6YsWMI87Fz/prOGRN7Ow+h0NrG25HT/UjjmpTgrcfNGXUHr4VfYiOcm1x92kYhf9yXaZyKkZ2kTw=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- apexcharts -->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Dashboard init -->
    {{-- <script src="{{ asset('admin/js/pages/dashboard-projects.init.js') }}"></script> --}}

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
      @if (Session::has('message'))

        var type = "{{ Session::get('alert-type', 'info') }}";

        switch (type) {
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
