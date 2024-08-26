@extends('auth.layout.template')


@section('page-title')
    <title>Create New Password | The Editorial Post</title>
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
                                            <a href="{{ route('home.page') }}" class="d-block">
                                                <img src="{{ asset('admin/images/logo.png') }}" alt="" class="auth-logo">
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
                                    <h5 class="text-primary">Create new password</h5>
                                    <p class="text-muted">Your new password must be different from previous used password.</p>

                                    <div class="p-2">
                                        <form method="POST" action="{{ route('password.store') }}">
                                            @csrf

                                            <!-- Password Reset Token -->
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email Address</label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="email" name="email" id="email" value="{{ ( $request->email) }}" class="form-control pe-5 password-input" placeholder="Email Address"  required autofocus autocomplete="username">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" name="password" id="password-input" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autocomplete="new-password">
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                                                </div>
                                                <div id="passwordInput" class="form-text">Must be at least 8 characters.</div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" name="password_confirmation" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password_confirmation" required>
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                <h5 class="fs-13">Password must contain:</h5>
                                                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">{{ __('Reset Password') }}</button>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Wait, I remember my password... <a href="{{ route('admin.login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
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
    <!-- validation init -->
    <script src="{{ asset('admin/js/pages/form-validation.init.js') }}"></script>
    <!-- password create init -->
    <script src="{{ asset('admin/js/pages/passowrd-create.init.js') }}"></script>
@endsection