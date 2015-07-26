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
                            <img src="../../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Felipe Sebastian Canales Saavedra</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
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
                    <a href="{{ route('encargado.index') }}">
                        <i class="fa fa-th"></i> <span>Inicio</span> <small class="label pull-right bg-red">!</small>
                    </a>
                </li>
                <li class="header">Opciones</li>
                <li><a href="#agregar-salas"><i class="fa fa-user"></i><span>Agregar salas</span></a></li>
                <li><a href="#salas-ocupadas"><i class="fa fa-user"></i><span>Listado de salas ocupadas</span></a></li>

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
                    <h3 class="box-title" id="#agregar-salas">Listado de Salas <a href="#p" class="fa fa-arrow-up" for="" ></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="salas" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sala</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Campus</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salas as $s)
                            <tr data-id="{{ $s->id }}">
                                <td>{{ $s->nombre }}</td>
                                <td>{{ $s->descripcion }}</td>
                                <td>{{ $s->sala_tipoS->nombre }}</td>
                                <td>{{ $s->sala_campus->nombre }}</td>
                                <td>
                                    <a href=
                                       "{{ route('encargado.edit.sala', [$s->id, $rut])  }}"
                                       type="button" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" type="button" class="btn btn-xs btn-danger btn-salas">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::open(['route' => 'encargado.add.sala', 'method' => 'POST', 'role' => 'form']) !!}
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
                            <button type="submit" class="btn btn-success ">Agregar</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('sala_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('sala_add') }}
                                </div>
                            @endif
                            @if(Session::has('sala_file'))
                                <div class="alert alert-infor alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('sala_file') }}
                                </div>
                            @endif
                            @if(Session::has('sala_file_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('sala_file_error') }}
                                </div>
                            @endif
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Agregar archivo con salas</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    {!! Form::open(['route' => 'encargado.archivo.salas', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
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
                    <h3 class="box-title" id="#salas-ocupadas">Listado de salas ocupadas <a href="#p" class="fa fa-arrow-up" for="" ></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="salas-ocupadas" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Sala</th>
                            <th>Docente</th>
                            <th>Asignatura</th>
                            <th>Sección</th>
                            <th>Semestre</th>
                            <th>Año</th>
                            <th>Campus</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($h_salas as $h)
                                <tr data-id="{{ $h->id }}">
                                    <td>{{ $h->fecha }}</td>
                                    <td>{{ $h->sala }}</td>
                                    <td>{{ $h->nombres }} {{ $h->apellidos }}</td>
                                    <td>{{ $h->asig }}</td>
                                    <td>{{ $h->seccion }}</td>
                                    <td>{{ $h->semestre }}</td>
                                    <td>{{ $h->anio }}</td>
                                    <td>{{ $h->campus }}</td>
                                    <td><a href="" type="button" class="btn btn-horario btn-xs btn-danger">Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

{!! Form::open(['route' => ['encargado.salas.delete', ':SALA_ID'], 'method' => 'DELETE', 'id' => 'form-delete-sala']) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['encargado.hsalas.delete', ':HSALA_ID'], 'method' => 'DELETE', 'id' => 'form-delete-hsala']) !!}
{!! Form::close() !!}

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
        $("#salas").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        $("#salas-ocupadas").dataTable({
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

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-salas').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-sala');
            var url = form.attr('action').replace(':SALA_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El usuario no fue eliminado');
                row.show();
            });
        });
    });
    $(document).ready(function () {
        $('.btn-horario').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-hsala');
            var url = form.attr('action').replace(':HSALA_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El usuario no fue eliminado');
                row.show();
            });
        });
    });
</script>

</body>
</html>