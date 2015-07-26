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
                            <img src="../../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Felipe Sebastian Canales Saavedra</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
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
                    <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
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
                <li><a href="#c"><i class="fa fa-user"></i><span>Editar/Agregar campus</span></a></li>
                <li><a href="#f"><i class="fa fa-user"></i><span>Editar/Agregar facultades</span></a></li>
                <li><a href="#d"><i class="fa fa-user"></i><span>Editar/Agregar departamentos</span></a></li>
                <li><a href="#e"><i class="fa fa-user"></i><span>Editar/Agregar escuelas</span></a></li>

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
            <div class="box"> <!-- CAMPUS -->
                <div class="box-header with-border">
                    <h3 class="box-title" id="c">Listado de Campus <a href="#p" class="fa fa-arrow-up" for=""></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="cam" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Descripcion</th>
                            <th>Rut Encargado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($campus as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->nombre }}</td>
                                    <td>{{ $c->direccion }}</td>
                                    <td>{{ $c->descripcion }}</td>
                                    <td>{{ $c->rut_encargado }}</td>
                                    <td>
                                        <a href="{{ route('admin.campus.edit_campus', [$c->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                        <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'admin.campus.store']) !!}
                            <div class="form-group">
                                <label for="">Campus</label>
                                {!! Form::text('nombre', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                {!! Form::text('direccion', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Rut Encargado</label>
                                {!! Form::text('rut_encargado', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required']) !!}
                            </div>

                            <button type="submit" class="btn btn-success ">Agregar campus</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('campus_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('campus_add') }}
                                </div>
                            @endif
                            @if(Session::has('error_direccion'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Alerta!</h4>
                                    {{ Session::get('error_direccion') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="box"> <!-- Facultades -->
                <div class="box-header with-border">
                    <h3 class="box-title" id="f">Listado de Facultades <a href="#p" class="fa fa-arrow-up" for=""></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="fac" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Facultad</th>
                            <th>Descripcion</th>
                            <th>Campus</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($facultades as $f)
                            <tr>
                                <td>{{ $f->id }}</td>
                                <td>{{ $f->nombre }}</td>
                                <td>{{ $f->descripcion }}</td>
                                <td>{{ $f->campus->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.campus.edit_f', [$f->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'admin.campus.store_f']) !!}
                            <div class="form-group">
                                <label for="">Facultad</label>
                                {!! Form::text('nombre', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Seleccione un campus</label>
                                {!! Form::select('campus_id', (['0' => 'Seleccione un Campus'] + $c_lists ), null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar facultad</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('facultad_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('facultad_add') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="box"> <!-- Departamentos -->
                <div class="box-header with-border">
                    <h3 class="box-title" id="d">Listado de Departamentos <a href="#p" class="fa fa-arrow-up" for=""></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dep" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Departamento</th>
                            <th>Descripcion</th>
                            <th>Facultad</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deptos as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->nombre }}</td>
                                <td>{{ $d->descripcion }}</td>
                                <td>{{ $d->dep_facultades->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.campus.edit_d', [$d->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'admin.campus.store_d', 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="form-group">
                                <label for="">Departamento</label>
                                {!! Form::text('nombre', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Seleccione una facultad</label>
                                {!! Form::select('facultad_id', (['0' => 'Seleccione un Campus'] + $f_lists ), null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar departamento</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('depto_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('depto_add') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="box"> <!-- Escuelas -->
                <div class="box-header with-border">
                    <h3 class="box-title" id="e">Listado de Escuelas <a href="#p" class="fa fa-arrow-up" for=""></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="esc" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Escuela</th>
                            <th>Descripcion</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($escuelas as $e)
                            <tr>
                                <td>{{ $e->id }}</td>
                                <td>{{ $e->nombre }}</td>
                                <td>{{ $e->descripcion }}</td>
                                <td>{{ $e->escuela_departamento->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.campus.edit_e', [$e->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'admin.campus.store_e']) !!}
                            <div class="form-group">
                                <label for="">Escuela</label>
                                {!! Form::text('nombre', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Seleccione una departamento</label>
                                {!! Form::select('departamento_id', (['0' => 'Seleccione un Campus'] + $d_lists ), null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <button type="submit" class="btn btn-success ">Agregar escuela</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::open(['route' => 'admin.campus.file_e', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                            <div class="form-group">
                                <label for="">Seleccione el archivo</label>
                                {!! Form::file('office') !!}
                            </div>

                            <button type="submit" class="btn btn-success ">Subir archivo</button>
                            {!! Form::close() !!}
                            @if(Session::has('escuela_add'))
                                <hr>
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('escuela_add') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.4
        </div>
        <strong>Copyright &copy; 2015 <a href="https://github.com/fcanalesS/ProyectoWeb">Felipe Canales</a>.</strong>
    </footer>
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
        $("#cam").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#fac").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#dep").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#esc").dataTable({
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