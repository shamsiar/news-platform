@extends('auth.layout.template')


@section('page-title')
    <title>Confirm Password | The Editorial Post</title>
@endsection


@section('body-content')
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="index.html" class="d-block">
                                                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" class="auth-logo">
                                            </a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <i class="ri-double-quotes-l display-4 text-success"></i>
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner text-center text-white-50 pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" The theme is really great with an amazing customer support."</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">Lock Screen</h5>
                                        <p class="text-muted">This is a secure area of the application. Please confirm your password before continuing.</p>
                                    </div>
                                    <div class="user-thumb text-center">
                                        <img src="{{ asset('admin/images/users/avatar-1.jpg') }}" class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                        <h5 class="mt-3">Anna Adame</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('password.confirm') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required autocomplete="current-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="mb-2 mt-4">
                                                <button type="submit" class="btn btn-success w-100">{{ __('Confirm Password') }}</button>
                                            </div>
                                        </form><!-- end form -->
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Not you ? return <a href="{{ route('admin.login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection


@section('js-content')

@endsection