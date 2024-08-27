@extends('admin.layout.template')

@section('page-title')
  <title>Admin | Manage All News</title>
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
            <h4 class="mb-sm-0">Manage All News</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.dashboard') }}">Dashboards</a>
                </li>
                <li class="breadcrumb-item active">Manage All News</li>
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
              <h4 class="card-title flex-grow-1 mb-0">Manage All News</h4>
              <div class="flex-shrink-0">
                <a href="{{ route('post.create') }}" class="btn btn-soft-info btn-sm">Add New News</a>
              </div>
            </div>
            <!-- end cardheader -->

            <div class="card-body">
              <div class="table-responsive table-card">
                <table class="table-nowrap table-centered table-hover table-striped table align-middle" id="example">
                  <thead class="bg-light text-muted">
                    <tr>
                      <th scope="col">#Sl.</th>
                      <th scope="col">Thumbnail</th>
                      <th scope="col">News Title</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @if ($posts->count() == 0)
                      <div class="alert alert-secondary">
                        <strong>Sorry, </strong> No Category are found yet.
                      </div>
                    @else
                      @php $sl=1; @endphp
                      @foreach ($posts as $post)
                        <tr>
                          <td class="fw-medium">{{ $sl }}</td>

                          <td>
                            @if (!empty($post->image))
                              <img src="{{ url($post->image) }}" class="avatar-xs me-1" alt="">
                            @else
                              Not Uploaded
                            @endif
                          </td>

                          <td class="fw-medium">{{ $post->title }}</td>

                          <td class="fw-medium">{{ $post->category->name }}</td>

                          <td class="fw-medium">{{ $post->author->name }}</td>

                          <td>
                            @if ($post->status == 1)
                              <span class="badge text-bg-success">Active</span>
                            @elseif ($post->status == 2)
                              <span class="badge text-bg-danger">Inactive</span>
                            @endif
                          </td>

                          <td>
                            <ul class="action-buttons">
                              <li>
                                <button type="button" class="btn btn-success btn-sm btn-icon waves-effect waves-light"
                                  data-bs-toggle="modal" data-bs-target="#viewPost{{ $post->id }}">
                                  <i class="ri-eye-line"></i>
                                </button>
                              </li>

                              <li>
                                <a href="{{ route('post.edit', $post->id) }}"
                                  class="btn btn-primary btn-sm waves-effect waves-light">
                                  <i class="ri-pencil-line"></i>
                                </a>
                              </li>

                              <li>
                                <button type="button" class="btn btn-danger btn-sm btn-icon waves-effect waves-light"
                                  data-bs-toggle="modal" data-bs-target="#deletePost{{ $post->id }}">
                                  <i class="ri-delete-bin-5-line"></i>
                                </button>
                              </li>
                            </ul>
                          </td>
                        </tr>

                        <!-- View Modal -->
                        <div id="viewPost{{ $post->id }}" class="modal fade" tabindex="-1"
                          aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                              </div>
                              <div class="modal-body text-center">
                                @if (!empty($post->icon))
                                  <img src="{{ asset('uploads/icon/' . $post->icon) }}" class="rounded-circle mb-10 me-1"
                                    alt="">
                                @endif
                                <h5 class="modal-title mb-25">{{ $post->name }}</h5>
                                <p class="text-muted"><strong>News Details:</strong> {{ $post->post_desc }}</p>
                                <p class="text-muted">Status
                                  @if ($post->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                  @elseif ($post->status == 2)
                                    <span class="badge text-bg-danger">Inactive</span>
                                  @endif
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Delete Category Modal -->
                        <div id="deletePost{{ $post->id }}" class="modal fade" tabindex="-1"
                          aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                              </div>
                              <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop"
                                  colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>
                                <div class="mt-4">
                                  <h4 class="mb-3">Do You Confirm!</h4>
                                  <p class="text-muted mb-4"> If Yes, The decision can't be change and the News will be
                                    removed permanently.</p>

                                  <div class="hstack justify-content-center gap-2">
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                      @csrf
                                      <button type="button" class="btn btn-warning"
                                        data-bs-dismiss="modal">Cancel</button>

                                      <button type="submit" class="btn btn-danger">Confirm</button>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @php $sl++; @endphp
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>

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
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      new DataTable('#example');
    });
  </script>
@endsection
