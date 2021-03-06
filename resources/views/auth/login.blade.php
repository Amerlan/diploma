<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DocumentFlow | Log in</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('design/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('design/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-light">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="padding-top: 5%;">
        <div class="col-xl-5 col-lg-10 col-md-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-8 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b>Document</b>flow</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="@lang('messages.email')" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang('messages.password')">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('messages.remember_me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-5">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                {{ __('messages.sign_in') }}
                                            </button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <hr>
                                    <div>
                                        <div class="text-center">
                                            <h6>@lang('messages.login_openid')</h6>
                                        </div>
                                        <div class="col-xl-12">
                                            <a href="#" title="OpenID Connect" class="btn btn-secondary btn-block">
                                                <img src="https://dl.iitu.kz/theme/image.php/classic/auth_oidc/1603298378/o365" alt="" width="24" height="24"/>
                                                OpenID Connect
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div style="text-align: center">
                                    <a href="<?= route('setlocale', ['lang' => 'ru']) ?>">
                                        <small>Русский</small>
                                    </a>
                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="<?= route('setlocale', ['lang' => 'en']) ?>">
                                        <small>English</small>
                                    </a>
                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="<?= route('setlocale', ['lang' => 'kz']) ?>">
                                        <small>Қазақша</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('design/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('design/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('design/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('design/js/sb-admin-2.min.js') }}"></script>

</body>

</html>


