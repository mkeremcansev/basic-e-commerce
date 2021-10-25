<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($general->favicon) }}">
    <title>{{ $general->title }}</title>
    <link href="{{ asset('Back') }}/dist/css/style.css" rel="stylesheet">
    <link href="{{ asset('Back') }}/dist/css/pages/authentication.css" rel="stylesheet">
    @toastr_css
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">kerem</p>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('Back') }}/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo"><br>
                        <h5 class="font-medium m-b-20">@lang('keywords.login')</h5>
                    </div>
                    <div class="row">
                        <form class="col s12" action="{{ route('Back.login.save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate" name="email" required>
                                    <label for="email">@lang('keywords.email')</label>
                                    <span class="errorMessage">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate" name="password" required>
                                    <label for="password">@lang('keywords.password')</label>
                                    <span class="errorMessage">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="row m-t-5">
                                <div class="col s7">
                                    <label>
                                        <input type="checkbox" />
                                        <span>@lang('keywords.remember-me')</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row m-t-40">
                                <div class="col s12">
                                    <button class="btn-large w100 blue accent-4" type="submit">@lang('keywords.login')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('Back') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('Back') }}/dist/js/materialize.min.js"></script>
    @toastr_js
    @toastr_render
    <script>
    $('.tooltipped').tooltip();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $(function() {
        $(".preloader").fadeOut();
    });
    </script>
</body>

</html>