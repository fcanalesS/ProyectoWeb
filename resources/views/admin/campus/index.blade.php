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
                            <img src="../../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">{{ $datos[0]->nombres }} {{ $datos[0]->apellidos }}</span>
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
                                <tr data-id="{{ $c->id }}">
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->nombre }}</td>
                                    <td>{{ $c->direccion }}</td>
                                    <td>{{ $c->descripcion }}</td>
                                    <td>{{ $c->rut_encargado }}</td>
                                    <td>
                                        <a href="{{ route('admin.campus.edit_campus', [$c->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                        <a href="" class="btn btn-xs btn-danger btn-campus">Eliminar</a>
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
                            @if(Session::has('error_rut'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Alerta!</h4>
                                    {{ Session::get('error_rut') }}
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
                            <tr data-id="{{ $f->id }}">
                                <td>{{ $f->id }}</td>
                                <td>{{ $f->nombre }}</td>
                                <td>{{ $f->descripcion }}</td>
                                <td>{{ $f->campus->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.campus.edit_f', [$f->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-fac">Eliminar</a>
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
                                {!! Form::select('campus_id', ($c_lists ), null, ['class' => 'form-control', 'required']) !!}
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
                            <tr data-id="{{ $d->id }}">
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->nombre }}</td>
                                <td>{{ $d->descripcion }}</td>
                                <td>{{ $d->dep_facultades->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.campus.edit_d', [$d->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-dep">Eliminar</a>
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
                            <tr data-id="{{ $e->id }}">
                                <td>{{ $e->id }}</td>
                                <td>{{ $e->nombre }}</td>
                                <td>{{ $e->descripcion }}</td>
                                <td>{{ $e->escuela_departamento->nombre }}</td>
                                <td>
                                    <a href="{{ route('admin.campus.edit_e', [$e->id]) }}" class="btn btn-xs bg-olive">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger btn-esc">Eliminar</a>
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

{!! Form::open(['route' => ['admin.campus.delete', ':CAMP_ID'], 'method' => 'DELETE', 'id' => 'form-delete-campus']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['admin.facultad.delete', ':FAC_ID'], 'method' => 'DELETE', 'id' => 'form-delete-fac']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['admin.departamentos.delete', ':DEP_ID'], 'method' => 'DELETE', 'id' => 'form-delete-dep']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['admin.escuelas.delete', ':ESC_ID'], 'method' => 'DELETE', 'id' => 'form-delete-esc']) !!}
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
        $('.btn-campus').click(function (e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-campus');
            var url = form.attr('action').replace(':CAMP_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El campus no fue eliminado');
                row.show();
            });
        });
        $('.btn-fac').click(function (e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-fac');
            var url = form.attr('action').replace(':FAC_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('La facultad no fue eliminada');
                row.show();
            });
        });
        $('.btn-dep').click(function (e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-dep');
            var url = form.attr('action').replace(':DEP_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('El departamento no fue eliminada');
                row.show();
            });
        });
        $('.btn-esc').click(function (e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-esc');
            var url = form.attr('action').replace(':ESC_ID', id);
            var data = form.serialize();

            row.fadeOut();
            $.post(url, data, function (result) {
                alert(result.message);
                location.reload();
            }).fail(function () {
                alert('La escuela no fue eliminada');
                row.show();
            });
        });
    });
</script>



<!-- Table Options -->
<script type="text/javascript">
    $(function() {
        $("#cam").dataTable({
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
        $("#fac").dataTable({
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
        $("#dep").dataTable({
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
        $("#esc").dataTable({
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