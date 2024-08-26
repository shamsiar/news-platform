@extends('admin.layout.template')

@section('page-title')
	<title>Admin | Add New News</title>
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
                        <h4 class="mb-sm-0">Manage All News</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboards</a>
                                </li>
                                <li class="breadcrumb-item active">Add New News</li>
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
                            <h4 class="card-title flex-grow-1 mb-0">Add New News</h4>
                            <div class="flex-shrink-0">
                                
                            </div>
                        </div>
                        <!-- end cardheader -->

                        <div class="card-body">
                            @include ('admin.includes.flush-message')

                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="news-title" class="form-label">Main Title</label>
                                            <input type="text" name="title" id="news-title" value="{{ old('title') }}" class="form-control" placeholder="Add News Title" required="required">
                                        </div>

                                        <div class="mb-3">
                                            <label for="highlight_line" class="form-label">Hightlights Line</label>
                                            <input type="text" name="highlight_line" id="highlight_line" value="{{ old('highlight_line') }}" class="form-control" placeholder="Add The Highlight Line Under Title" required="required">
                                        </div>

                                        <div class="mb-3">
                                            <label for="category-id" class="form-label">Please Select the Category of the News</label>
                                            <select class="form-select" name="category_id" id="category-id" required>
                                                <option value="0">Choose...</option>
                                                @foreach( $categories as $category )
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>  

                                        <div class="mb-3">
                                            <label for="category-status" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="category-status" required>
                                                <option selected="">Choose...</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>   

                                        <div class="mb-3">
                                            <label for="tags" class="form-label">Tags [Use Commaa (,) for Separate Tags]</label>
                                            <input type="text" name="tags" id="tags" value="{{ old('tags') }}" class="form-control" placeholder="Add News Tag" required="required">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Upload Main Thumbnail Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>    
                                    </div>

                                    <div class="col-xl-8">  
                                        <div class="mb-3">
                                            <label for="post_desc" class="form-label">Short Description</label>
                                            <textarea class="form-control ckeditor-classic" rows="22" name="post_desc" id="post_desc" placeholder="Write short description...">{{ old('post_desc') }}</textarea> 
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-animation waves-effect waves-light" data-text="Add New News"><span>Add New News</span></button>
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