<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>UTEM | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <img src="{{ asset('dist/img/utem.png') }}" alt="" class="img img-responsive">
        </div>
    </div>
    <div class="login-logo">
        <a href="/"><b>UTEM</b>Login</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>
        {!! Form::open(['route' => 'login.post', 'method' => 'POST', 'role' => 'form']) !!}
            <div class="form-group has-feedback">
                <input name="rut" type="text" class="form-control rut" placeholder="Rut" required rut/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password" required/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        <div class="form-group ">
            {!! app('captcha')->display() !!}
        </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        {!! Form::close() !!}
        <br>
        @if(Session::has('login_error'))
            <div class="alert alert-danger">
                <p class="text-center">{{ Session::get('login_error') }}</p>
            </div>
        @endif
        @if(Session::has('logout'))
            <div class="alert alert-success bg-green-gradient">
                <p class="text-center">{{ Session::get('logout') }}</p>
            </div>
        @endif
        @if(Session::has('no'))
            <div class="alert alert-success bg-maroon-gradient">
                <p class="text-center">{{ Session::get('no') }}</p>
            </div>
        @endif

       {{-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->--}}

        {{--<a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>--}}

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{ asset('/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>