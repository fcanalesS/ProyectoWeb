<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UTEM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
                    <li><a href="{{ url($rut.'/admin/campus') }}"><i class="fa fa-circle-o"></i><span>Perfiles de Campus</span></a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i><span>Perfiles de Usuarios</span></a></li>

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
                <h1>
                    Dashboard
                    <small>Administrador</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Está aquí</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mision y Vision</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <h2 class="text-center">Misión</h2>

                        <p class="text-center">La Universidad Tecnológica Metropolitana,
                            es una Institución de Educación superior estatal y
                            autónoma socialmente responsable, ubicada en la Región Metropolitana, y tiene como Misión:
                            Formar personas con altas capacidades académicas y profesionales,
                            en el ámbito preferentemente tecnológico,
                            apoyada en la generación, transferencia, aplicación y difusión del conocimiento en las áreas
                            del saber que le son propias, para contribuir al desarrollo sustentable del país y de la sociedad
                            de la que forma parte.</p>

                        <h2 class="text-center">Visión</h2>

                        <p class="text-center">La Universidad Tecnológica Metropolitana, será reconocida por
                            la formación de sus egresados, la calidad de su educación continua,
                            por la construcción de capacidades de investigación y creación,
                            innovación y transferencia en algunas áreas del saber, por
                            la equidad social en su acceso, su tolerancia y pluralismo, por su
                            cuerpo académico de excelencia y por una gestión institucional
                            que asegura su sustentabilidad y la práctica de mecanismos de
                            aseguramiento de la calidad en todo su quehacer.</p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-6 connectedSortable">
                        <!-- Custom tabs -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Campus</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="campus">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Rut Encargado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($campus as $c)
                                        <tr>
                                            <td><a href="">{{ $c->id }}</a></td>
                                            <td>{{ $c->nombre }}</td>
                                            <td>{{ $c->direccion }}</td>
                                            <td>{{ $c->rut_encargado }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Funcionarios</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="func">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Departamento</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($func as $f)
                                        <tr>
                                            <td><a href="">{{ $f->id }}</a></td>
                                            <td>{{ $f->rut }}</td>
                                            <td>{{ $f->nombres }}</td>
                                            <td>{{ $f->apellidos }}</td>
                                            <td>{{ $f->funcionario_departamento->nombre}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Usuario</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rut</th>
                                        <th>Rol</th>
                                        <th>Descripcion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($type_user as $typo)
                                        <tr>
                                            <td><a href="">{{ $typo->rol_id }}</a></td>
                                            <td>{{ $typo->rut }}</td>
                                            <td>{{ $typo->rol->nombre }}</td>
                                            <td>{{ $typo->rol->descripcion }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </section>

                    <!-- Right Col -->
                    <section class="col-lg-6 connectedSortable">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Campus</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <h1>AQUI VAN LOS ENCARGADOS DE LOS CAMPUS</h1>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                ENCARGADOS DE CAMPUS
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->

                        <div class="box">
                            <div class="box-header with-border">
                                <h3>Docentes</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="doc">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Departamento</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($docentes as $doc)
                                        <tr>
                                            <td><a href="">{{$doc->id}}</a></td>
                                            <td>{{$doc->rut}}</td>
                                            <td>{{$doc->nombres}}</td>
                                            <td>{{$doc->apellidos}}</td>
                                            <td>{{$doc->docente_departamento->nombre}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header with-border">
                                <h3>Estudiantes</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="est">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Codigo carrera</th>
                                        <th>Carrera</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($estudiantes as $est)
                                        <tr>
                                            <td><a href="">{{ $est->id }}</a></td>
                                            <td>{{ $est->rut }}</td>
                                            <td>{{ $est->nombres }}</td>
                                            <td>{{ $est->apellidos }}</td>
                                            <td>{{ $est->estudiante_carrera->codigo }}</td>
                                            <td>{{ $est->estudiante_carrera->nombre }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
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
    <script type="text/javascript">
        $(function () {
            $("#campus").dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $("#func").dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $("#doc").dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $("#est").dataTable({
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