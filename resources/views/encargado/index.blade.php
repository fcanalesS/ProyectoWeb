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
                            <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Felipe Sebastian Canales Saavedra</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
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
                                    <a href="{{ route('login.logout') }}" class="btn btn-default btn-flat">Cerrar sesión</a>
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

                <li><a href="{{ route('encargado.personas.index', [$rut]) }}"><i class="fa fa-user"></i><span>Opciones de usuarios</span></a></li>
                <li><a href="{{ route('encargado.academicas.index', [$rut]) }}"><i class="fa fa-building"></i><span>Opciones académicas</span></a></li>


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
                <small>Encargado: {{ $rut }}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>Usuarios</h3>
                            <p>agregar, editar, eliminar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="{{ route('encargado.personas.index', [$rut]) }}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Academicos</h3>
                            <p>Carreras, asignaturas, ramos, etc...</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-book"></i>
                        </div>
                        <a href="{{ route('encargado.academicas.index', [$rut]) }}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos del encargado de campus</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            Aquí van todos los datos de encargado de campus
                        </div><!-- /.box-body -->
                        <div class="box-footer">

                        </div>
                    </div><!-- /.box -->
                </section>

                <!-- Right Col -->
                <section class="col-lg-6 connectedSortable">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nombre del campus del que es responsable</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            Aquí va el mapa del campus al que es responsable
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->


                </section>
            </div>

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title text-center">Esta sección está en construcción . . .</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <img src="{{ asset('/dist/img/under-construction.png') }}" class="img-responsive" alt="User Image" />
                            </div>
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
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../../plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js" type="text/javascript"></script>
<!-- Data Table scripts -->
<script src="../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Demo -->
<script src="../../dist/js/demo.js" type="text/javascript"></script>
</body>
</html>