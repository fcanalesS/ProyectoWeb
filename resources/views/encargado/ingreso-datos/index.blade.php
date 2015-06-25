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

                <li><a href="{{ url('encargado/salas') }}"><i class="fa fa-circle-o"></i><span>Modificar salas</span></a></li>
                <li><a href="{{ url('encargado/asignar') }}"><i class="fa fa-circle-o"></i><span>Asignar sala a curso/evento</span></a></li>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>Ingreso de datos académicos</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#asi"><i class="fa fa-circle-o"></i> Agregar Asignatura</a></li>
                        <li><a href="#cur"><i class="fa fa-circle-o"></i> Agregar Curso</a></li>
                        <li><a href="#car"><i class="fa fa-circle-o"></i> Agregar Carrera</a></li>
                        <li class="header"></li>
                        <li><a href="#est"><i class="fa fa-circle-o"></i> Agregar Estudiante</a></li>
                        <li><a href="#doc"><i class="fa fa-circle-o"></i> Agregar Docente</a></li>
                    </ul>
                </li>

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
                <small>Encargado de Campus: 'fulano'</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Está aquí</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Listado de Asignaturas -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Asignaturas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="asignaturas">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($asignaturas as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->nombre }}</td>
                                <td>{{ $a->codigo }}</td>
                                <td>{{ $a->descripcion }}</td>
                                <td>{{ $a->asignaturas_departamentos->nombre }}</td>
                                <td><a href="{{ route('encargado.ingreso-datos.edit_asig', [$a->id]) }}" class="btn btn-xs bg-olive">Editar</a> <a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <h3 class="box-title" id="asi">Agregra Asignatura</h3>
                            {!! Form::open(['route' => 'encargado.ingreso-datos.store_asig', 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="form-group">
                                <label for="">Nombre de asignatura</label>
                                {!! Form::text('nombre', '',['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Código de asignatura</label>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        {!! Form::text('alpha', '', ['class' => 'form-control', 'maxlength' => '3', 'placeholder' => 'AAA']) !!}
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        {!! Form::text('num', '', ['class' => 'form-control', 'maxlength' => '5', 'placeholder' => '00000']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::select('departamento_id', (['0' => 'Departamento'] + $departamentos ), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('descripcion', '', ['class' => 'form-control']) !!}
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <hr/>
                    @if(Session::has('add_asig'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('add_asig') }}</p>
                        </div>
                    @endif
                    @if(Session::has('update_asig'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('update_asig') }}</p>
                        </div>
                    @endif
                </div>
            </div><!-- /.box -->

            <!-- Listado de Cursos -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Cursos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="cursos">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asignatura</th>
                            <th>Sección</th>
                            <th>Semestre</th>
                            <th>Año</th>
                            <th>Docente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->curso_asignatura->nombre }}</td>
                                    <td>{{ $c->seccion }}</td>
                                    <td>{{ $c->semestre }}</td>
                                    <td>{{ $c->anio }}</td>
                                    <td>{{ $c->curso_docente->nombres }} {{ $c->curso_docente->apellidos }}</td>
                                    <td><a href="{{ route('encargado.ingreso-datos.edit_curso', [$c->id]) }}" class="btn btn-xs bg-olive">Editar</a> <a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(Session::has('update_curso'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('update_curso') }}</p>
                        </div>
                    @endif
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <h3 class="box-title" id="cur">Agregar Curso</h3><br/>
                    {!! Form::open(['route' => 'encargado.ingreso-datos.store_curso', 'method' => 'POST', 'role' => 'form']) !!}
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="form-group">
                                    <label for="">Asignatura</label>
                                    {!! Form::select('asignatura_id', (['0' => 'Asignatura'] + $asig_lists ), null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Sección</label>
                                                {!! Form::text('seccion', '', ['class' => 'form-control', 'max-length' => '6']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Semestre</label>
                                                {!! Form::text('semestre', '', ['class' => 'form-control', 'max-length' => '2']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Año</label>
                                                {!! Form::text('anio', '', ['class' => 'form-control', 'max-length' => '4']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::select('docente_id', (['0' => 'Docente'] + $docente_lists ), null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    <br/>
                        <button type="submit" class="btn btn-success ">Agregar</button>
                    {!! Form::close() !!}
                    <hr/>
                    @if(Session::has('add_curso'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('add_curso') }}</p>
                        </div>
                    @endif
                </div>
            </div><!-- /.box -->

            <!-- Listado de Carreras -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Carreras</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="carrera">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Escuela</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carreras as $carrera)
                            <tr>
                                <td>{{ $carrera->id }}</td>
                                <td>{{ $carrera->codigo }}</td>
                                <td>{{ $carrera->nombre }}</td>
                                <td>{{ $carrera->carrera_escuela->nombre }}</td>
                                <td><a href="{{ route('encargado.ingreso-datos.edit_carrera', [$carrera->id]) }}" class="btn btn-xs bg-olive">Editar</a> <a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <h3 class="box-title" id="car">Agregar Carrera</h3>
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            {!! Form::open(['route' => ['encargado.ingreso-datos.store_carrera'], 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="form-group">
                                <label for="">Escuelas:</label>
                                {!! Form::select('escuela_id', (['0' => 'Escuelas'] + $escuela_lists ), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                        <label for="">Codigo de carrera</label>
                                        {!! Form::text('codigo', '',['class' => 'form-control', 'maxlength' => '8']) !!}
                                    </div>
                                    <div class="col-md-9 col-lg-9">
                                        <label for="">Nombre de carrera</label>
                                        {!! Form::text('nombre', '',['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción:</label>
                                {!! Form::textarea('descripcion', '',['class' => 'form-control']) !!}
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <hr/>
                    @if(Session::has('add_carrera'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('add_carrera') }}</p>
                        </div>
                    @endif
                    @if(Session::has('update_carrera'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('update_carrera') }}</p>
                        </div>
                    @endif
                </div>
            </div><!-- /.box -->
            <!-- Listado de Estudiantes -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Estudiantes</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="estudiantes">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>E-mail</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estudiantes as $e)
                            <tr>
                                <td>{{ $e->id }}</td>
                                <td>{{ $e->nombres }}</td>
                                <td>{{ $e->apellidos }}</td>
                                <td>{{ $e->email }}</td>
                                <td>{{ $e->estudiante_carrera->nombre }}</td>
                                <td><a href="" class="btn btn-xs bg-olive">Editar</a> <a href="" class="btn btn-xs btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <h3 class="box-title" id="est">Agregar Estudiante</h3>
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <label for="">Nombres</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('nombre1', '',['class' => 'form-control', 'placeholder' => 'Primer Nombre']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('nombre2', '',['class' => 'form-control', 'placeholder' => 'Segundo Nombre']) !!}
                                    </div>
                                </div>
                            </div>
                            <label for="">Apellidos</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('apellido1', '',['class' => 'form-control', 'placeholder' => 'Primer Apellido']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('apellido2', '',['class' => 'form-control', 'placeholder' => 'Segundo Apellido']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Ingrese E-mail</label>
                                {!! Form::text('email', '',['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::select('tipo_sala_id', (['0' => 'Seleccione una carrera'] + $carrera_lists ), null, ['class' => 'form-control']) !!}
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                        </div>
                    </div>
                    <hr/>
                    @if(Session::has('re_sala'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('re_sala') }}</p>
                        </div>
                    @endif
                </div>
            </div><!-- /.box -->
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
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
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
    $(function() {
        $("#codigo").inputmask("AAA00000", {"placeholder": "AAA00000"})
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#estudiantes").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#asignaturas").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#cursos").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#carrera").dataTable({
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