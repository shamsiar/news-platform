@extends('admin.layout.template')

@section('page-title')
	<title>Admin Dashboard | The Editorial Post</title>
@endsection


@section('css-content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection


@section('body-content')
		

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Super Admin Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboards</a></li> -->
                                <!-- <li class="breadcrumb-item active">Projects</li> -->
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Data of The Platform -->
            <div class="row project-wrapper">
                <div class="col-xxl-12">
                    <div class="row">

                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                                <i data-feather="briefcase" class="text-primary"></i>
                                            </span>
                                        </div>
                                        
                                        <div class="flex-grow-1 overflow-hidden ms-3">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Category</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ $categories->count() }}">0</span></h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i class="bx bx-user-circle text-warning"></i>
                                                
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Active News</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ $posts->count() }}">0</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                <i class="bx bx-wallet text-primary"></i>
                                            </span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden ms-3">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Editor</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ $editors->count() }}">0</span></h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-3">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Visitor</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ $visitors->count() }}">0</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->


            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title flex-grow-1 mb-0">Latest News</h4>
                            <div class="flex-shrink-0">
                                <a href="{{ route('post.manage') }}" class="btn btn-soft-info btn-sm">View All News</a>
                            </div>
                        </div><!-- end cardheader -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-nowrap table-centered align-middle" id="example">
                                    <thead class="bg-light text-muted">
                                        <tr>
                                            <th scope="col">#Sl.</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">News Title</th>                
                                            <th scope="col">Status</th>
                                        </tr><!-- end tr -->
                                    </thead><!-- thead -->

                                    <tbody>
                                        @php $sl=1; @endphp
                                        @foreach( $posts as $post )
                                            <tr>
                                                <td class="fw-medium">{{ $sl }}</td>

                                                <td>
                                                    @if ( !empty( $post->image ) )
                                                        <img src="{{ asset('uploads/news/' . $post->image ) }}" class="avatar-xs me-1" alt="">
                                                    @else
                                                        Not Uploaded
                                                    @endif
                                                </td>

                                                <td class="fw-medium">{{ $post->title }}</td>
                                                                                            
                                                <td>
                                                    @if ( $post->status == 1 )
                                                        <span class="badge text-bg-success">Active</span>
                                                    @elseif ( $post->status == 2 )
                                                        <span class="badge text-bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $sl++; @endphp
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
            
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
        
@endsection


@section('js-content')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            new DataTable('#example');       
        });
    </script>
@endsection