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
                            <span class="hidden-xs">{{ $datos[0]->nombres }} {{ $datos[0]->apellidos }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
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
                    <p>{{ \App\Helpers\PersonasUtils::separaNombres($datos[0]->nombres)[0] }}
                        {{ \App\Helpers\PersonasUtils::separaApellidos($datos[0]->apellidos)[0] }}</p>

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
                <li><a href="#fun"><i class="fa fa-user"></i><span>Editar funcionario</span></a></li>
                <li><a href="#doc"><i class="fa fa-user"></i><span>Editar docente</span></a></li>
                <li><a href="#est"><i class="fa fa-user"></i><span>Editar estudiante</span></a></li>

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
            <h1 id="inicio">
                Dashboard
                <small>Opciones de usuarios</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="fun">Listado de funcionarios <a href="#inicio" class="fa fa-arrow-up"></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="func" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($funcionarios as $f)
                            <tr data-id="{{ $f->id }}">
                                <td>{{ $f->id }}</td>
                                <td>{{ $f->rut }}</td>
                                <td>{{ $f->nombres }}</td>
                                <td>{{ $f->apellidos }}</td>
                                <td>{{ $f->funcionario_departamento->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.usuarios.edit_func', [$f->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-delete">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::open(['route' => 'rol.archivo.funcionario', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                            <div class="form-group">
                                <label for="fileInput">Seleccione el archivo</label>
                                {!! Form::file('file') !!}
                                <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                            </div>
                            <button type="submit" class="btn btn-success ">Subir archivo</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            @if(Session::has('funcionario_file'))
                                <div class="alert alert-info alert-dismissable">
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
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="doc">Listado de docentes <a href="#inicio" class="fa fa-arrow-up"></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="docen" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($docentes as $d)
                            <tr data-id="{{ $d->id }}">
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->rut }}</td>
                                <td>{{ $d->nombres }}</td>
                                <td>{{ $d->apellidos }}</td>
                                <td>{{ $d->docente_departamento->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.usuarios.edit_doc', [$d->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-doc">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'rol.archivo.docente', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                            <div class="form-group">
                                <label for="fileInput">Seleccione el archivo</label>
                                {!! Form::file('file') !!}
                                <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                            </div>
                            <button type="submit" class="btn btn-success ">Subir archivo</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            @if(Session::has('docente_file'))
                                <div class="alert alert-info alert-dismissable">
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
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="est">Listado de estudiantes <a href="#inicio" class="fa fa-arrow-up"></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="estu" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Carrera - Código</th>
                            <th>Escuela</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estudiantes as $e)
                            <tr data-id="{{ $e->id }}">
                                <td>{{ $e->id }}</td>
                                <td>{{ $e->rut }}</td>
                                <td>{{ $e->nombres }}</td>
                                <td>{{ $e->apellidos }}</td>
                                <td>{{ $e->email }}</td>
                                <td>{{ $e->carrera }} - {{ $e->codigo }}</td>
                                <td>{{ $e->escuela }}</td>
                                <td>{{ $e->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.usuarios.edit_est', [$e->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-est">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'rol.archivo.estudiante', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                            <div class="form-group">
                                <label for="fileInput">Seleccione el archivo</label>
                                {!! Form::file('file') !!}
                                <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                            </div>
                            <button type="submit" class="btn btn-success ">Subir archivo</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            @if(Session::has('estudiante_file'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_file') }}
                                </div>
                            @endif
                            @if(Session::has('estudiante_file_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('estudiante_file_error') }}
                                </div>
                            @endif
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

{!! Form::open(['route' => ['admin.funcionario.delete', ':FUNC_ID'], 'method' => 'DELETE', 'id' => 'form-delete-func']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['admin.docente.delete', ':DOC_ID'], 'method' => 'DELETE', 'id' => 'form-delete-doc']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['admin.estudiante.delete', ':EST_id'], 'method' => 'DELETE', 'id' => 'form-delete-est']) !!}
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
    $(document).ready(function () {
        $('.btn-delete').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-func');
            var url = form.attr('action').replace(':FUNC_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El funcionario no fue eliminado');
                row.show();
            });
        });
        $('.btn-doc').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-doc');
            var url = form.attr('action').replace(':DOC_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El docente no fue eliminado');
                row.show();
            });
        });
        $('.btn-est').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-est');
            var url = form.attr('action').replace(':EST_id', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El estudiante no fue eliminado');
                row.show();
            });
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $("#func").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "language" : {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        $("#docen").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "language" : {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        $("#estu").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "language" : {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>

</body>
</html>