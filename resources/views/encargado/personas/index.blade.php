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
        <a href="" class="logo">
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
                    <a href="{{ route('encargado.index') }}">
                        <i class="fa fa-th"></i> <span>Inicio</span> <small class="label pull-right bg-red">!</small>
                    </a>
                </li>
                <li class="header">Opciones</li>
                <li><a href="#est"><i class="fa fa-user"></i><span>Agregar/Editar estudiantes</span></a></li>
                <li><a href="#doc"><i class="fa fa-user"></i><span>Agregar/Editar docentes</span></a></li>
                <li><a href="#fun"><i class="fa fa-user"></i><span>Agregar/Editar funcionarios</span></a></li>

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
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="est">Listado de estudiantes <a href="#p" class="fa fa-arrow-up" for="" ></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="estu" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>E-mail</th>
                            <th>Carrera</th>
                            <th>Escuela</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estudiantes as $e)
                        <tr>
                            <td>{{ $e->rut }}</td>
                            <td>{{ $e->nombres }}</td>
                            <td>{{ $e->apellidos }}</td>
                            <td>{{ $e->email }}</td>
                            <td>{{ $e->codigo }} - {{ $e->carrera }}</td>
                            <td>{{ $e->escuela }}</td>
                            <td>{{ $e->depto }}</td>
                            <td>
                                <a href="{{ route('encargado.estudiante.editar', [$e->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::open(['route' => 'encargado.add.estudiante', 'method' => 'POST', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <label for="">Rut</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::number('rut_num', null,['class' => 'form-control', 'required', 'id' => 'rut_num']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="dig_veri" id="" class="form-control">
                                            @for($i = 0; $i <= 9; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                                <option value="K">K</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">E-mail</label>
                                        {!! Form::email('email', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Primer nombre</label>
                                        {!! Form::text('first_name', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo nombre</label>
                                        {!! Form::text('second_name', null,['class' => 'form-control', '', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Apellido Paterno</label>
                                        {!! Form::text('apellido_p', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Apellido Materno</label>
                                        {!! Form::text('apellido_m', null,['class' => 'form-control', '', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Seleccione una carrera</label>
                                <select name="carrera_id" id="" class="form-control" required>
                                    @foreach($carreras as $c)
                                        <option value="{{ $c->id }}">{{ $c->carrera }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('estudiante_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_add') }}
                                </div>
                                <hr>
                            @endif
                            @if(Session::has('estudiante_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_error') }}
                                </div>
                                <hr>
                            @endif
                            @if(Session::has('estudiante_file_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_file_error') }}
                                </div>
                                <hr>
                            @endif
                            @if(Session::has('estudiante_file'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_file') }}
                                </div>
                                <hr>
                            @endif
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Agregar archivo con estudiantes</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    {!! Form::open(['route' => 'encargado.archivo.estudiante', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                                    <div class="form-group">
                                        <label for="fileInput">Seleccione el archivo</label>
                                        {!! Form::file('file') !!}
                                        <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                                    </div>
                                    <button type="submit" class="btn btn-success ">Subir archivo</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="doc">Listado de docentes <a href="#p" class="fa fa-arrow-up" for="" ></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="docen" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($docentes as $d)
                            <tr>
                                <td>{{ $d->rut }}</td>
                                <td>{{ $d->nombres }}</td>
                                <td>{{ $d->apellidos }}</td>
                                <td>{{ $d->depto }}</td>
                                <td>
                                    <a href="{{ route('encargado.docente.editar', [$d->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::open(['route' => 'encargado.add.docente', 'method' => 'POST', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <label for="">Rut</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::number('rut_num', null,['class' => 'form-control', 'required', 'id' => 'rut_num']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="dig_veri" id="" class="form-control">
                                            @for($i = 0; $i <= 9; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            <option value="K">K</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Primer nombre</label>
                                        {!! Form::text('first_name', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo nombre</label>
                                        {!! Form::text('second_name', null,['class' => 'form-control', '', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Apellido Paterno</label>
                                        {!! Form::text('apellido_p', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Apellido Materno</label>
                                        {!! Form::text('apellido_m', null,['class' => 'form-control', '', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Seleccione un departamento</label>
                                <select name="departamento_id" id="" class="form-control">
                                    @foreach($deptos as $d)
                                        <option value="{{ $d->id }}">{{ $d->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('docente_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('docente_add') }}
                                </div>
                            @endif
                            @if(Session::has('docente_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('docente_error') }}
                                </div>
                            @endif
                            @if(Session::has('docente_file'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('docente_file') }}
                                </div>
                            @endif
                            @if(Session::has('docente_file_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('docente_file_error') }}
                                </div>
                            @endif
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Agregar archivo con docentes</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    {!! Form::open(['route' => 'encargado.archivo.docente', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                                    <div class="form-group">
                                        <label for="fileInput">Seleccione el archivo</label>
                                        {!! Form::file('file') !!}
                                        <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                                    </div>
                                    <button type="submit" class="btn btn-success ">Subir archivo</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="fun">Listado de funcionarios <a href="#p" class="fa fa-arrow-up"></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="func" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($funcionarios as $f)
                            <tr>
                                <td>{{ $f->rut }}</td>
                                <td>{{ $f->nombres }}</td>
                                <td>{{ $f->apellidos }}</td>
                                <td>{{ $f->depto }}</td>
                                <td>
                                    <a href="{{ route('encargado.funcionario.editar', [$f->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::open(['route' => 'encargado.add.funcionario', 'method' => 'POST', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-md-7">
                            <label for="">Rut</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::number('rut_num', null,['class' => 'form-control', 'required', 'id' => 'rut_num']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="dig_veri" id="" class="form-control">
                                            @for($i = 0; $i <= 9; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            <option value="K">K</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Primer nombre</label>
                                        {!! Form::text('first_name', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo nombre</label>
                                        {!! Form::text('second_name', null,['class' => 'form-control', '', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Apellido Paterno</label>
                                        {!! Form::text('apellido_p', null,['class' => 'form-control', 'required', ' ']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Apellido Materno</label>
                                        {!! Form::text('apellido_m', null,['class' => 'form-control', '', ' ']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Seleccione un departamento</label>
                                <select name="departamento_id" id="" class="form-control">
                                    @foreach($deptos as $d)
                                        <option value="{{ $d->id }}">{{ $d->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('funcionario_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('funcionario_add') }}
                                </div>
                            @endif
                            @if(Session::has('funcionario_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('funcionario_error') }}
                                </div>
                            @endif
                            @if(Session::has('funcionario_file'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('funcionario_file') }}
                                </div>
                            @endif
                            @if(Session::has('funcionario_file_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('funcionario_file_error') }}
                                </div>
                            @endif
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Agregar archivo con funcionarios</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    {!! Form::open(['route' => 'encargado.archivo.funcionario', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                                    <div class="form-group">
                                        <label for="fileInput">Seleccione el archivo</label>
                                        {!! Form::file('file') !!}
                                        <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                                    </div>
                                    <button type="submit" class="btn btn-success ">Subir archivo</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
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

<!-- Demo -->
<script src="{{ asset('/dist/js/demo.js') }}" type="text/javascript"></script>
<!-- Table Options -->
<script type="text/javascript">
    $(function() {
        $("#func").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#docen").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#estu").dataTable({
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