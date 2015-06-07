<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>Laravel</title>

        <!-- Bootstrap 3.3.4 -->
        <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('/dist/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />


        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
	<body class="login-page">
		<div class="container">
            <br/><br/><br/><br/><br/>
            <div class="login-logo">
                <a href="www.utem.cl">Bienvenido <b>UTEM</b></a>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Elija el perfil que le corresponda</p>
                
                <div class="row row-centered">
                    <div class="col-xs-4 col-centered">
                        <a href="{{ url('/login/estudiantes') }}" class="btn btn-primary btn-block btn-flat">Estudiante</a>
                    </div>
                    <div class="col-xs-4 col-centered">
                        <a href="{{ url('/login/docentes') }}" class="btn btn-primary btn-block btn-flat">Docente</a>
                    </div>
                    <div class="col-xs-4 col-centered">
                        <a href="{{ url('/login/funcionarios') }}" class="btn btn-primary btn-block btn-flat">Funcionario</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>