@extends('frontend.layout.template')

@yield('page-title')

@section('body-content')
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="logo">
            <a href="index.html">
              <img src="{{ asset('frontend/images/logo-main.png') }}" alt="" class="img-fluid logo-img">
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="bg-light container mt-2">
    <div class="row">
      <!-- main content start -->
      <div class="col-lg-8">
        <!-- main blog post start -->
        <div class="main-featured-post">
          <h1>{{ $head_post->title }}</h1>
          <h4>{{ $head_post->hightlight_line }}</h4>
          <div class="post-body">
            <div class="row">
              <div class="col-md-4">
                <h6 class="author">{{ $head_post->author->name }}</h6>
                {!! $head_post->post_desc !!}
                <a href="javascript:void(0)" class="link-btn" data-bs-toggle="modal"
                  data-bs-target="#viewPost{{ $head_post->id }}">See More</a>
              </div>
              {{-- <div class="col-md-4">
                <div class="featured-img">
                  <img src="{{ url($head_post->image) }}" alt="" class="img-fluid">
                  <p class="caption text-center">Obaidul Hasan</p>
                </div>
                <p>Al Jazeera’s Tanvir Chowdhury, reporting from Dhaka, said students decided to take to the streets when
                  they heard reports that Hassan was holding.</p>
                <p>Hassan oversaw a much-criticised war crimes tribunal that ordered the execution of Hasina’s opponents.
                </p>
              </div>
              <div class="col-md-4">
                <p>Al Jazeera’s Tanvir Chowdhury, reporting from Dhaka, said students decided to take to the streets when
                  they heard reports that Hassan was holding a meeting with justices of the Appellate Division.</p>
                <p>Al Jazeera’s Tanvir Chowdhury, reporting from Dhaka, said students decided to take to the streets when
                  they heard reports that Hassan was holding a meeting with justices of the Appellate Division.</p>
                <p>Al Jazeera’s Tanvir Chowdhury, reporting from Dhaka, said students decided to take to the streets when
                  they heard reports that Hassan was holding a meeting with justices of the Appellate Division.</p>
                <a href="" class="link-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">See More</a>
              </div> --}}
            </div>
          </div>
        </div>

        <!-- Modal code goes here -->
        <div class="modal fade" id="viewPost{{ $head_post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" class="img-fluid">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="main-content">
                <h2></h2>
                <div class="row">
                  <div class="col-12">
                    <img src="{{ asset('frontend/images/author.png') }}" alt="editor" class="author">
                    <h4>Report</h4>
                    <p><small class="text-body-secondary">Sat Aug 10, 2024 07:19 PM Last update on: Sat Aug 10 07:19
                        PM</small></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="social-share">
                      <li>
                        <a href="" class="btn btn-light">
                          <h6>365</h6>
                          <p>Share</p>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="btn btn-primary">
                          <i class="fa-brands fa-facebook-f"></i>
                          <span>Facebook</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="btn btn-dark">
                          <i class="fa-brands fa-x-twitter"></i>
                          <span>Twitter</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="btn btn-success">
                          <i class="fa-brands fa-whatsapp"></i>
                          <span>Whatsapp</span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="btn btn-default">
                          <i class="fa-regular fa-envelope"></i>
                        </a>
                      </li>
                      <li>
                        <a href="" class="btn btn-info">
                          <i class="fa-solid fa-print"></i>
                        </a>
                      </li>
                      <li>
                        <a href="" class="btn btn-warning">
                          <i class="fa-solid fa-share"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{ url($head_post->image) }}" alt="" class="img-fluid">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{ asset('frontend/images/add.png') }}" alt="" class="img-fluid my-2">
                  </div>
                </div>
                <p>
                  {!! $head_post->post_desc !!}
                </p>
              </div>

            </div>
          </div>
        </div>

        <!-- View Modal -->
        {{-- <div id="viewPost{{ $post->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
          aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body text-center">
                @if (!empty($post->icon))
                  <img src="{{ asset('uploads/icon/' . $post->icon) }}" class="rounded-circle mb-10 me-1" alt="">
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
        </div> --}}

        <!-- Modal code end here -->

        <!-- main blog post end -->
        <!-- Add start -->
        <div class="row">
          <div class="col-lg-12">
            <img src="{{ asset('frontend/images/add.png') }}" alt="Add" class="img-fluid my-3">
          </div>
        </div>
        <!-- Add end -->
        <!-- blog post start -->
        <div class="blog-post">
          <div class="row">
            @foreach ($sub_posts as $sub)
              <div class="col-lg-4">
                <div class="card h-100">
                  <img src="{{ url($sub->image) }}" class="img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><a href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#viewPost{{ $sub->id }}">{{ $sub->title }}</a></h5>
                    <p>{{ $sub->highlight_line }}</p>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#viewPost{{ $sub->id }}"
                      class="link-btn">See More</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <!--  blog post start -->
      </div>
      <!-- main content end -->

      <!-- sidebar start -->
      <div class="col-lg-4">
        <div class="sidebar">
          <div class="row">
            @foreach ($posts as $post)
              <div class="col-md-12">
                <div class="sidebar-post">
                  <div class="row">
                    <div class="col-8">
                      <h6><a href="javascript:void(0)" data-bs-toggle="modal"
                          data-bs-target="#viewPost{{ $sub->id }}">{{ $post->title }}</a></h6>
                      <p><small class="text-body-secondary">5 hours ago</small></p>
                    </div>
                    <div class="col-4">
                      <img src="{{ url($post->image) }}" class="img-fluid" alt="...">
                    </div>
                  </div>
                </div>
              </div>
              <!-- siderbar add start -->
              @if ($loop->iteration == 4)
                <div class="col-md-12">
                  <img src="{{ asset('frontend/images/sadd.png') }}" alt="sidebar add" class="img-fluid sidebar-add">
                </div>
              @endif
            @endforeach

          </div>
        </div>
        <!-- sidebar end -->
      </div>
    </div>
  @endsection

  @section('js-codes')
    {{-- <script type="text/javascript">
      $(document).ready(function() {

        /* When click show user */
        $('body').on('click', '#show-user', function() {
          var url = $(this).data('url');
          console.log(url);

          $.get(url, function(data) {
            $('#exampleModal').modal('show');
            $("#main-content").html(data);
            //   $('#user-id').text(data.id);
            //   $('#user-name').text(data.name);
            //   $('#user-email').text(data.email);
          })
        });

      });
    </script> --}}
    {{-- <script>
      //   $(document).ready(function() {
      $('#exampleModal').on('shown.bs.modal', function(e) {
        var i = $(e.relatedTarget).data('id');
        console.log(i);
        //   $("#main-content").html('<h2 >' + radio[i].name + '<br>' +
        // radio[i].address + '<br>' + radio[i].phone + '</h2>');
      })

      //   });
    </script> --}}
  @endsection
