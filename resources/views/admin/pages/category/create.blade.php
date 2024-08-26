@extends('admin.layout.template')

@section('page-title')
	<title>Admin | Add New Category</title>
@endsection


@section('css-content')

@endsection


@section('body-content')
		

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage All Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboards</a>
                                </li>
                                <li class="breadcrumb-item active">Add New Category</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row project-wrapper">
                <div class="col-xl-12">
                    <div class="card card-height-100">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title flex-grow-1 mb-0">Add New Category</h4>
                            <div class="flex-shrink-0">
                                
                            </div>
                        </div>
                        <!-- end cardheader -->

                        <div class="card-body">
                            @include ('admin.includes.flush-message')

                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="category-name" class="form-label">Category Name</label>
                                            <input type="text" name="name" id="category-name" value="{{ old('name') }}" class="form-control" placeholder="Name of the Category">
                                        </div>

                                        <div class="mb-3">
                                            <label for="priority-num" class="form-label">Display Priority  Number</label>
                                            <input type="number" name="priority_num" id="priority-num" value="{{ old('priority_num') }}" class="form-control" placeholder="1">
                                        </div>        
                                    </div>

                                    <div class="col-xl-4"> 
                                        <div class="mb-3">
                                            <label for="category-status" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="category-status" required>
                                                <option selected="">Choose...</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div> 

                                        <div class="mb-3">
                                            <label class="form-label">Upload Icon</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>

                                    <div class="col-xl-4">  
                                        <div class="mb-3">
                                            <label for="short_desc" class="form-label">Short Description</label>
                                            <textarea class="form-control ckeditor-classic" rows="5" name="short_desc" id="short_desc" placeholder="Write short description...">{{ old('short_desc') }}</textarea> 
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-animation waves-effect waves-light" data-text="Add New Category"><span>Add New Category</span></button>
                                        </div>
                                    </div>

                                </div>
                                
                            </form>

                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
        
@endsection


@section('js-content')
    <!-- init js -->
    <script src="assets/js/pages/form-editor.init.js"></script>
    <!-- ckeditor -->
    <script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
@endsection