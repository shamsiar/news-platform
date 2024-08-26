<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    <head>
        @include('admin.includes.header')
        @include('admin.includes.css')
    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('admin.includes.topbar')

            @include('admin.includes.leftMenuBar')

            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- Main Body Content -->
            <div class="main-content">
                @yield('body-content')
                @include('admin.includes.footer')
            </div>
        </div>
        <!-- END layout-wrapper -->

        @include('admin.includes.scripts')
    </body>
</html>