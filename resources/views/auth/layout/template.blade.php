<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    <head>

        @include('auth.includes.header')

        @yield('page-title')

        @include('auth.includes.css')

    </head>

    <body>

        <!-- auth-page wrapper -->
        <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
            <div class="bg-overlay"></div>
            <!-- auth-page content -->

            @yield('body-content')

            <!-- end auth page content -->

            @include('auth.includes.footer')
        </div>
        <!-- end auth-page-wrapper -->

        @include('auth.includes.scripts')
    </body>
</html>