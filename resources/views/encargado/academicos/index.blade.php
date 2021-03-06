<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UTEM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('fragmentos.css')
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <span class="logo-mini"><b>U</b>TM</span>
            <span class="logo-lg"><b>UTEM</b>Encargado</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

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
                    <p>{{ \App\Helpers\PersonasUtils::separaNombres($datos[0]->nombres)[0] }}
                        {{ \App\Helpers\PersonasUtils::separaApellidos($datos[0]->apellidos)[0] }}</p>

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
                <li><a href="#car"><i class="fa fa-book"></i><span>Agregar/Editar carreras</span></a></li>
                <li><a href="#asig"><i class="fa fa-tasks"></i><span>Agregar/Editar asignaturas</span></a></li>
                <li><a href="#cur"><i class="fa fa-users"></i><span>Agregar/Editar cursos</span></a></li>

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
                <small>Opciones académicas</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="car">Listado de carreras <a href="#p" class="fa fa-arrow-up" for="" ></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="carreras" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Carrera</th>
                            <th>Descripción</th>
                            <th>Escuela</th>
                            <th>Facultad</th>
                            <th>Campus</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carreras as $c)
                            <tr data-id="{{ $c->id }}">
                                <td>{{ $c->cod }}</td>
                                <td>{{ $c->carrera }}</td>
                                <td>{{ $c->desc }}</td>
                                <td>{{ $c->escuela }}</td>
                                <td>{{ $c->facultad }}</td>
                                <td>{{ $c->campus }}</td>
                                <td>
                                    <a href="{{ route('encargado.academicos.edit_carrera', [$c->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-car">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'encargado.add.carrera', 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Código</label>
                                        {!! Form::text('codigo', null,['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Carrera</label>
                                        {!! Form::text('nombre', null,['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="">Seleccione una escuela</label>
                                <select name="escuela_id" id="" class="form-control">
                                    @foreach($escuelas as $e)
                                        <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button type="submit" class="btn btn-success ">Agregar carrera</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                            @if(Session::has('carrera_add'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('carrera_add') }}
                                </div>
                            @endif
                            @if(Session::has('carrera_file'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('carrera_file') }}
                                </div>
                            @endif
                            @if(Session::has('carrera_file_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Información!</h4>
                                    {{ Session::get('carrera_file_error') }}
                                </div>
                            @endif
                            {!! Form::open(['route' => 'encargado.archivo.carrera', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
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
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="asig">Listado de asignaturas <a href="#p" class="fa fa-arrow-up" for="" ></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="asignaturas" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Asignatura</th>
                            <th>Descripción</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($asignaturas as $a)
                            <tr data-id="{{ $a->id }}">
                                <td>{{ $a->codigo }}</td>
                                <td>{{ $a->nombre }}</td>
                                <td>{{ $a->descripcion }}</td>
                                <td>{{ $a->depto }}</td>
                                <td>
                                    <a href="{{ route('encargado.academicos.edit_asignatura', [$a->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-asi">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-7">
                        {!! Form::open(['route' => 'encargado.add.asignatura', 'method' => 'POST', 'role' => 'form']) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Código</label>
                                    {!! Form::text('codigo', null,['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Asignatura</label>
                                    {!! Form::text('nombre', null,['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            {!! Form::textarea('descripcion', null,['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Seleccione un departamento</label>
                            <select name="departamento_id" id="" class="form-control">
                                @foreach($depto as $d)
                                    <option value="{{ $d->id }}">{{ $d->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success ">Agregar asignatura</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-5">
                        @if(Session::has('asignatura_add'))
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Información!</h4>
                                {{ Session::get('asignatura_add') }}
                            </div>
                        @endif
                        @if(Session::has('asignatura_file'))
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Información!</h4>
                                {{ Session::get('asignatura_file') }}
                            </div>
                        @endif
                        @if(Session::has('asignatura_file_error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Información!</h4>
                                {{ Session::get('asignatura_file_error') }}
                            </div>
                        @endif
                        {!! Form::open(['route' => 'encargado.archivo.asignatura', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                        <div class="form-group">
                            <label for="fileInput">Seleccione el archivo</label>
                            {!! Form::file('file') !!}
                            <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                        </div>
                        <button type="submit" class="btn btn-success ">Subir archivo</button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="cur">Listado de cursos <a href="#p" class="fa fa-arrow-up"></a></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="cursos" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Semestre</th>
                            <th>Año</th>
                            <th>Sección</th>
                            <th>Docente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cursos as $c)
                            <tr data-id="{{ $c->id }}">
                                <td>{{ $c->cod }} // <strong>{{ $c->ramo }}</strong></td>
                                <td>{{ $c->semestre }}</td>
                                <td>{{ $c->anio }}</td>
                                <td>{{ $c->seccion }}</td>
                                <td>{{ $c->apellidos }}, {{ $c->nombres }}</td>
                                <td>
                                    <a href="{{ route('encargado.academicos.edit_curso', [$c->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-cur">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-7">
                        {!! Form::open(['route' => 'encargado.add.curso', 'method' => 'POST', 'role' => 'form']) !!}
                        <div class="form-group">
                            <label for="">Docente</label>
                            <select name="docente_id" id="" class="form-control" required>
                                @foreach($docentes as $d)
                                    <option value="{{ $d->id }}">
                                        {{ $d->apellidos }}, {{ \App\Helpers\PersonasUtils::separaNombres($d->nombres)[0] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Asginatura</label>
                            <select name="asignatura_id" id="" class="form-control" required>
                                @foreach($asignaturas as $a)
                                    <option value="{{ $a->id }}">{{ $a->codigo }} - {{ $a->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Semestre</label>
                                    {!! Form::number('semestre', null,['class' => 'form-control', 'required',
                                        'min' => '1', 'max' => '12']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label for="">Año</label>
                                    {!! Form::number('anio', null,['class' => 'form-control', 'required',
                                        'min' => '1900']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label for="">Sección</label>
                                    {!! Form::text('seccion', null,['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success ">Agregar curso</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-5">
                        @if(Session::has('curso_add'))
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Información!</h4>
                                {{ Session::get('curso_add') }}
                            </div>
                        @endif
                        @if(Session::has('curso_file'))
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Información!</h4>
                                {{ Session::get('curso_file') }}
                            </div>
                        @endif
                        @if(Session::has('curso_file_error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Información!</h4>
                                {{ Session::get('curso_file_error') }}
                            </div>
                        @endif
                        {!! Form::open(['route' => 'encargado.archivo.curso', 'method' => 'POST', 'role' => 'form', 'files' => 'true']) !!}
                        <div class="form-group">
                            <label for="fileInput">Seleccione el archivo</label>
                            {!! Form::file('file') !!}
                            <p class="help-block">Solo archivos con extension: *.xlsx; *.xls</p>
                        </div>
                        <button type="submit" class="btn btn-success ">Subir archivo</button>
                        {!! Form::close() !!}
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

{!! Form::open(['route' => ['encargado.carrera.delete', ':CAR_ID'], 'method' => 'DELETE', 'id' => 'form-delete-car']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['encargado.asignatura.delete', ':ASI_ID'], 'method' => 'DELETE', 'id' => 'form-delete-asi']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['encargado.curso.delete', ':CUR_ID'], 'method' => 'DELETE', 'id' => 'form-delete-cur']) !!}
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

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-car').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-car');
            var url = form.attr('action').replace(':CAR_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('La carrera no fue eliminada');
                row.show();
            });
        });
        $('.btn-asi').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-asi');
            var url = form.attr('action').replace(':ASI_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('La asignatura no fue eliminada');
                row.show();
            });
        });
        $('.btn-cur').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-cur');
            var url = form.attr('action').replace(':CUR_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El curso no fue eliminado');
                row.show();
            });
        });
    });
</script>

<!-- Table Options -->
<script type="text/javascript">
    $(function() {
        $("#carreras").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "language":{
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
        $("#asignaturas").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "language":{
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
        $("#cursos").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "language":{
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