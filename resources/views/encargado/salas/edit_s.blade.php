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
        <a href="{{ route('encargado.index', [$rut]) }}" class="logo">
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
                            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Felipe Sebastian Canales Saavedra</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                                <p>
                                    Encargado Campus
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
                    <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
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
                    <a href="{{ route('admin.index') }}">
                        <i class="fa fa-th"></i> <span>Inicio</span> <small class="label pull-right bg-red">!</small>
                    </a>
                </li>
                <li class="header">Opciones</li>
                <li><a href="#editar-sala"><i class="fa fa-user"></i><span>Editar sala</span></a></li>
                <li><a href="#agendar-sala"><i class="fa fa-user"></i><span>Agendar sala</span></a></li>

                <li class="header"></li>
                <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Contacto</span></a></li>
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
            <h1 id="p">
                Dashboard
                <small>Opciones de usuarios</small>
                <small><strong>Agregar opcion de agregar y agregar por lote</strong></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="editar-sala">Editar Sala</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! Form::model($sala, ['route' => ['encargado.update.sala'], 'method' => 'PUT', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Campus</label>
                                        {!! Form::select('campus_id', (['0' => ''] + $campus ), null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Sala</label>
                                {!! Form::text('nombre', null,['class' => 'form-control', 'required', ' ']) !!}
                            </div>
                            <div class="form-group">
                                <label>Tipo de sala</label>
                                {!! Form::select('tipo_sala_id', (['0' => ''] + $tiposala), null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required', ' ']) !!}
                            </div>
                            {!! Form::hidden('id', $id) !!} {!! Form::hidden('rut', $rut) !!}
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                            <a href="/encargado/salas/index/{{$rut}}" type="button" class="btn bg-aqua">Volver</a>
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('sala_update'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('sala_update') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="agendar-sala">Agendar sala</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! Form::model($sala, ['route' => ['encargado.add.sala_curso'], 'method' => 'POST', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Sala</label>
                                        {!! Form::text('nombre', null,['class' => 'form-control', 'disabled', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tipo de sala</label>
                                        {!! Form::select('tipo_sala_id', (['0' => ''] + $tiposala), null, ['class' => 'form-control', 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Seleccione un bloque</label>
                                        <select multiple name="periodo_id" id="" class="form-control">
                                            @foreach($periodos as $p)
                                                <option value="{{ $p->id }}">{{ $p->bloque }} - {{ $p->inicio }} -- {{ $p->fin }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fecha</label>
                                        {!! Form::text('fecha', null,['class' => 'form-control','id' => 'datemask', 'data-inputmask' => '"alias": "yyyy-mm-dd"', 'data-mask', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <table id="cursos" class="table table-bordered">
                                        <h3 class="box-title">Cursos disponibles</h3>
                                        <thead>
                                        <tr>
                                            <th>Asignatura</th>
                                            <th>Docente</th>
                                            <th>Semestre</th>
                                            <th>Año</th>
                                            <th>Sección</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cursos as $c)
                                            <tr>
                                                <td>{{ $c->asig }}</td>
                                                <td>{{ $c->nombres }} {{ $c->apellidos }}</td>
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
                            {!! Form::hidden('id', $id) !!} {!! Form::hidden('sala_id', $sala->id) !!}
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                            <a href="/encargado/salas/index/{{$rut}}" type="button" class="btn bg-aqua">Volver</a>
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('horario_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('horario_add') }}
                                </div>
                            @endif
                        </div>
                    </div>
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
<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>

<!-- Demo -->
<script src="{{ asset('/dist/js/demo.js') }}" type="text/javascript"></script>
<!-- Table Options -->
<script type="text/javascript">
    $(function() {
        $("#cursos").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    });
</script>


</body>
</html>