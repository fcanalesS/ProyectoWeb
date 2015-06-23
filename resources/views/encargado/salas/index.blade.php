<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UTEM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>U</b>TM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>UTEM</b>Administrador</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Felipe Sebastian Canales Saavedra</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                <p>
                                    Administrador
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Felipe Canales</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MENÚ DE NAVEGACIÓN</li>

                <li>
                    <a href="">
                        <i class="fa fa-th"></i> <span>Link a algún lado</span> <small class="label pull-right bg-red">!</small>
                    </a>
                </li>
                <li class="header">Menu de Administración</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>Modificar Salas</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#add_sala"><i class="fa fa-circle-o"></i> Agregar sala</a></li>
                        <li><a href="#add_tipo"><i class="fa fa-circle-o"></i> Agregar tipo de sala</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('encargado/asignar') }}"><i class="fa fa-circle-o"></i><span>Asignar sala a curso/evento</span></a></li>
                <li><a href=""><i class="fa fa-circle-o"></i><span>Ingreso de datos academicos</span></a></li>

                <li class="header"></li>
                <li><a href="#!"><i class="fa fa-circle-o text-green"></i> <span>Contacto</span></a></li>
                <li class="header"></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->
    <!-- =============================================== -->
    <!-- =============================================== -->
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Administrador</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Está aquí</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de salas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="salas">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sala</th>
                            <th>Descripcion</th>
                            <th>Tipo</th>
                            <th>Campus</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datos_salas as $sala)
                            <tr>
                                <td>{{ $sala->id }}</td>
                                <td>{{ $sala->nombre }}</td>
                                <td>{{ $sala->descripcion }}</td>
                                <td>{{ $sala->sala_tipoS->nombre }}</td>
                                <td>{{ $sala->sala_campus->nombre }}</td>
                                <td><a href="{{ route('encargado.salas.edit', [$sala->id]) }}" class="btn btn-xs bg-olive">Editar</a> <a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title" id="add_sala">Agregar sala</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['route' => 'encargado.salas.store', 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="form-group">
                                {!! Form::select('campus_id', (['0' => 'Ingrese el campus al que pertenece la sala'] + $campus_sala ), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::select('tipo_sala_id', (['0' => 'Tipos de sala disponibles'] + $tipo_sala ), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('nombre', '',['class' => 'form-control', 'placeholder' => 'Nombre de sala']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('descripcion', '',['class' => 'form-control', 'placeholder' => 'Descripcion de la sala']) !!}
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar sala</button>
                            {!! Form::close() !!}
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <div class="box-footer">
                        @if(Session::has('add_sala'))
                            <div class="callout callout-success">
                                <p>{{ Session::get('add_sala') }}</p>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Right Col -->
                <section class="col-lg-6 connectedSortable">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar nuevo tipo</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover" id="salas">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Descripcion</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ts as $tipo)
                                    <tr>
                                        <td>{{ $tipo->id }}</td>
                                        <td>{{ $tipo->nombre }}</td>
                                        <td>{{ $tipo->descripcion }}</td>
                                        <td><a href="{{ route('encargado.tiposala.edit', [$tipo->id]) }}" class="btn btn-xs bg-olive">Editar</a> <a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr/>
                            <h3 class="box-title" id="add_tipo">Agregar tipo de sala</h3>
                            {!! Form::open(['route' => 'encargado.tiposala.store', 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="form-group">
                                {!! Form::text('nombre', '',['class' => 'form-control', 'placeholder' => 'Tipo de sala']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('descripcion', '',['class' => 'form-control', 'placeholder' => 'Ingrese una descripcion']) !!}
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            @if(Session::has('tipo_add'))
                                <div class="callout callout-success">
                                    <p>{{ Session::get('tipo_add') }}</p>
                                </div>
                            @endif
                            @if(Session::has('tipo_update'))
                                <div class="callout callout-success">
                                    <p>{{ Session::get('tipo_update') }}</p>
                                </div>
                            @endif
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Docentes</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">

                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Estudiantes</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">

                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.0.0.1
        </div>
        <strong>Copyright &copy; 2015 <a href="#">Felipe Canales</a>.</strong>
    </footer>
    <!-- =============================================== -->
    <!-- =============================================== -->
    <!-- =============================================== -->
    <!-- =============================================== -->
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../../../plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/app.min.js" type="text/javascript"></script>
<!-- Data Table scripts -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Demo -->
<script src="../../../dist/js/demo.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#salas").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#horario").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#doc").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#est").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
    });
</script>
</body>
</html>