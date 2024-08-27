{{-- @extends('layout') --}}
@extends('admin.layout.template')

{{-- @section('page-title')
<title>Super Way - Admin Profile</title>
@endsection --}}

@section('css-content')
@endsection

@section('body-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">APP Settings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboards</a>
                            </li>
                            <li class="breadcrumb-item active">APP Settings</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row project-wrapper">
            <div class="col-xl-12">
                <div class="card card-height-100">
                    {{-- <div class="card-header d-flex align-items-center justify-content-center">
                        <h2 class="card-title fw-bold"></h2>
                    </div> --}}
                    <!-- end cardheader -->

                    <div class="card-body">
                        @include ('admin.includes.flush-message')

                        @include('app_settings::_settings')


                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>

    </div>
    <!-- container-fluid -->
</div>
@endsection

@section('js-content')
$(document).ready(function() {
    $('.summernote').summernote();
});
@endsection
