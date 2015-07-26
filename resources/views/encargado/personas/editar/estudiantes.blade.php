<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UTEM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('fragmentos.css')
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/admin/index') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>U</b>TM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>UTEM</b>Encargado</span>
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
                            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Felipe Sebastian Canales Saavedra</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                                <p>
                                    Encargado
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
                    <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Felipe Canales</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                {{--<li class="header">MENÚ DE NAVEGACIÓN</li>--}}

                {{--<li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Contacto</span></a></li>--}}

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
                <small>Encargado</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="edit">Editar estudiante: Nombre del estudiante</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! Form::model($est, ['route' => ['encargado.estudiante.update', $est->id], 'method' => 'PUT', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Rut</label>
                                        {!! Form::text('rut', null,['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        {!! Form::text('nombres', null,['class' => 'form-control', '']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        {!! Form::text('apellidos', null,['class' => 'form-control', '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                {!! Form::text('email', null,['class' => 'form-control', '']) !!}
                            </div>
                            <div class="form-group">
                                <label>Carrera</label>
                                {!! Form::select('carrera_id', (['0' => ''] + $carreras ), null, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('estudiante_update'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_update') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    {!! Form::hidden('id', $id) !!}
                    <button type="submit" class="btn btn-success ">Actualizar</button> <a href="{{ route('encargado.personas.index') }}" type="button" class="btn bg-aqua">Volver</a>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="asig-cursadas">Asignaturas cursadas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="a_c" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Asignatura</th>
                            <th>Docente</th>
                            <th>Seccion</th>
                            <th>Semestre</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($a_c as $ac)
                            <tr>
                                <td>{{ $ac->cod }}</td>
                                <td>{{ $ac->asig }}</td>
                                <td>{{ $ac->nombres }} {{ $ac->apellidos }}</td>
                                <td>{{ $ac->seccion }}</td>
                                <td>{{ $ac->semestre }}</td>
                                <td>{{ $ac->anio }}</td>
                                <td><a href="" class="btn btn-xs btn-danger" type="button">Eliminar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div><!-- /.box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title text-center" id="agregar-asig-cur">Listado de cursos disponibles</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => ['encargado.estudiante.ac'], 'method' => 'POST', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <table id="cur" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Docentes</th>
                                        <th>Código</th>
                                        <th>Asignatura</th>
                                        <th>Semestre</th>
                                        <th>Año</th>
                                        <th>Sección</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cursos as $c)
                                        <tr>
                                            <td>{{ $c->nombres }} {{ $c->apellidos }}</td>
                                            <td>{{ $c->cod }}</td>
                                            <td>{{ $c->asig }}</td>
                                            <td>{{ $c->semestre }}</td>
                                            <td>{{ $c->anio }}</td>
                                            <td>{{ $c->seccion }}</td>
                                            <td>{!! Form::radio('curso_id', $c->id) !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('error'))
                                <br><br><br>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Alerta!</h4>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if(Session::has('ok'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('ok') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    {!! Form::hidden('id', $id) !!} {!! Form::hidden('estudiante_id', $est->id) !!}
                    <button type="submit" class="btn btn-success ">Agregar asignatura</button> <a href="{{ route('encargado.personas.index') }}" type="button" class="btn bg-aqua">Volver</a>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div><!-- /.box -->

        </section>


    </div>
    @include('fragmentos.footer')
    <!-- =============================================== -->
    <!-- =============================================== -->
    <!-- =============================================== -->
    <!-- =============================================== -->
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('/plugins/jQueryUI/jquery-ui-1.10.3.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- FastClick -->
<script src='{{ asset('/plugins/fastclick/fastclick.min.js') }}'></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/app.min.js') }}" type="text/javascript"></script>
<!-- Data Table scripts -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $("#a_c").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#cur").dataTable({
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