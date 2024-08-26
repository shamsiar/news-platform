@extends('admin.layout.template')

@section('page-title')
    <title>Super Way - Admin Profile</title>
@endsection


@section('css-content')

@endsection


@section('body-content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ asset('admin/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    @if( !is_null( Auth::user()->image ) )
                                        <img src="{{ asset('uploads/profile/' . Auth::user()->image) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                    @else
                                        <img src="{{ asset('admin/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                    @endif
                                </div>
                                <h5 class="fs-16 mb-1">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-0">
                                    <span class="badge text-bg-success">
                                        @if ( Auth::check() )
                                            @if( Auth::user()->role == 1 )
                                                Super Admin
                                            @elseif( Auth::user()->role == 2 )
                                                Vendor
                                            @endif
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>


                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#myProfileData" role="tab">
                                        <i class="fas fa-home"></i> My Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#myProfileUpdate" role="tab">
                                        <i class="fas fa-home"></i> Update Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="far fa-user"></i> Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="card-body p-4">
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="myProfileData" role="tabpanel">
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">Full Name</th>
                                                            <th scope="col">{{ Auth::user()->name }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Email Address</th>
                                                            <th scope="col">{{ Auth::user()->email }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Phone Number</th>
                                                            <th scope="col">{{ Auth::user()->phone }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">{{ Auth::user()->address }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">User Role</th>
                                                            <th scope="col">
                                                                <span class="badge text-bg-success">Super Admin</span>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>



                                <div class="tab-pane" id="myProfileUpdate" role="tabpanel">
                                    @include ('admin.includes.flush-message')
                                    <form action="{{ route('admin.profileUpdate', Auth::user()->id ) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Full Name</label>
                                                <input type="text" name="name" class="form-control" id="firstnameInput" placeholder="Enter the name of Company" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="emailData" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="emailData" placeholder="Enter your lastname" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="phoneno" class="form-label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control" id="phoneno" placeholder="Enter Phone Number" value="{{ Auth::user()->phone }}">
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Company Address" value="{{ Auth::user()->address }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label">Profile Picture</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                        </div>                                        
                                        
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-start">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    </form>
                                </div>



                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                    <form action="javascript:void(0);">
                                        <div class="row g-2">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                                    <input type="password" class="form-control" id="oldpasswordInput" placeholder="Enter current password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="newpasswordInput" class="form-label">New Password*</label>
                                                    <input type="password" class="form-control" id="newpasswordInput" placeholder="Enter new password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                                    <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success">Change Password</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>

@endsection


@section('js-content')

@endsection   