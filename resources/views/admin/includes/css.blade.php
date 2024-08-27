        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">

        <!-- Layout config Js -->
        <script src="{{ asset('admin/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Toastr Min CSS -->
        <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Icons Css -->
        <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('css-content')
        <!-- custom Css-->
        <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
          integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.css" integrity="sha512-Z8BUgcVqRNnweDNw75uulH4DpHkW6Kfk1e3ZkbrmcJjC+rQLn4pxea0qnbCPQYnDMyHt62hyY09ogPjlytwcqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.js" integrity="sha512-VqW3FWLsKVphZNAVsUKfA5UJ9oxVamFqNtHs46UxI7UA/gQ6GGaZ37GYdotPJ27Y/C8dvOQEKjWbfiNOkkhVAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

        <!-- include summernote css/js-->
        {{-- <link href="summernote-bs5.css" rel="stylesheet">
        <script src="summernote-bs5.js"></script> --}}
