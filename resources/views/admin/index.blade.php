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
                                        <a href="#" class="btn btn-default btn-flat">Cerrar sesión</a>
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
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>


                    <li>
                        <a href="">
                            <i class="fa fa-th"></i> <span>Link a algún lado</span> <small class="label pull-right bg-green">Hot</small>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i>
                            <span>Opciones de campus</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-book"></i> <span>Crear</span></a></li>
                            <li><a href=""><i class="fa fa-book"></i> <span>Modificar</span></a></li>
                            <li><a href=""><i class="fa fa-book"></i> <span>Archivar</span></a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i>
                            <span>Opciones de usuarios</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-book"></i> <span>Modificar usuario</span></a></li>
                        </ul>
                    </li>

                    <li class="header"></li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Refrescar base de datos</span></a></li>
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
                        <h3 class="box-title">Caja grande de usuarios</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda eos esse fugit
                            libero pariatur quibusdam quos voluptatem? Accusamus delectus dolor eaque incidunt minus
                            molestiae nulla. Deleniti ipsa voluptate voluptatibus?
                        </div>
                        <div>Accusamus commodi eveniet expedita incidunt ipsum iusto libero maxime nesciunt nobis omnis,
                            praesentium quis, recusandae, reiciendis sit suscipit totam ullam veniam voluptas! A dolor
                            dolores ipsum quam repellat sed veniam!
                        </div>
                        <div>Aut culpa cumque delectus deleniti ex illo, impedit inventore laboriosam laborum odit,
                            officiis sequi sint tempora tempore temporibus! Ea, reprehenderit voluptatem. Dignissimos
                            eligendi natus nemo nihil, ratione recusandae repudiandae tempora.
                        </div>
                        <div>Ipsa, nulla, ratione? Aperiam commodi consequuntur cupiditate eligendi exercitationem
                            facilis fuga impedit iure iusto magnam nemo pariatur quaerat quam quod, reiciendis
                            repudiandae rerum saepe similique temporibus ut! Ab, aliquam earum.
                        </div>
                        <div>A blanditiis cumque distinctio dolore, eveniet quia quis saepe voluptatem. Consequatur
                            debitis dolore, eum inventore maiores mollitia nam necessitatibus officiis similique
                            voluptatibus! Aliquid aut dolorem, eaque eum labore odio quasi!
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        Footer
                    </div><!-- /.box-footer-->
                </div><!-- /.box -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Listado de Periodos</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut impedit, modi
                                    molestiae nemo nesciunt officia provident quos tempora veniam. Debitis harum ipsum
                                    nemo nulla odio optio provident quasi quis sequi?
                                </div>
                                <div>Animi aperiam asperiores beatae commodi consectetur distinctio dolor eveniet fuga
                                    illo libero molestiae, nobis nulla perferendis porro quis quod recusandae saepe,
                                    ullam. Deserunt, ducimus hic laudantium nemo quis quod unde?
                                </div>
                                <div>Aliquid animi culpa delectus enim exercitationem facilis fugiat id iste obcaecati
                                    optio reiciendis sequi similique, temporibus? Adipisci assumenda consequatur dicta
                                    ea libero magnam, maiores, quis reprehenderit soluta veniam vitae, voluptas.
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                Footer
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Caja grande de usuarios</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda eos esse fugit
                                    libero pariatur quibusdam quos voluptatem? Accusamus delectus dolor eaque incidunt minus
                                    molestiae nulla. Deleniti ipsa voluptate voluptatibus?
                                </div>
                                <div>Accusamus commodi eveniet expedita incidunt ipsum iusto libero maxime nesciunt nobis omnis,
                                    praesentium quis, recusandae, reiciendis sit suscipit totam ullam veniam voluptas! A dolor
                                    dolores ipsum quam repellat sed veniam!
                                </div>
                                <div>Aut culpa cumque delectus deleniti ex illo, impedit inventore laboriosam laborum odit,
                                    officiis sequi sint tempora tempore temporibus! Ea, reprehenderit voluptatem. Dignissimos
                                    eligendi natus nemo nihil, ratione recusandae repudiandae tempora.
                                </div>
                                <div>Ipsa, nulla, ratione? Aperiam commodi consequuntur cupiditate eligendi exercitationem
                                    facilis fuga impedit iure iusto magnam nemo pariatur quaerat quam quod, reiciendis
                                    repudiandae rerum saepe similique temporibus ut! Ab, aliquam earum.
                                </div>
                                <div>A blanditiis cumque distinctio dolore, eveniet quia quis saepe voluptatem. Consequatur
                                    debitis dolore, eum inventore maiores mollitia nam necessitatibus officiis similique
                                    voluptatibus! Aliquid aut dolorem, eaque eum labore odio quasi!
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                Footer
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Caja grande de usuarios</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda eos esse fugit
                                    libero pariatur quibusdam quos voluptatem? Accusamus delectus dolor eaque incidunt minus
                                    molestiae nulla. Deleniti ipsa voluptate voluptatibus?
                                </div>
                                <div>Accusamus commodi eveniet expedita incidunt ipsum iusto libero maxime nesciunt nobis omnis,
                                    praesentium quis, recusandae, reiciendis sit suscipit totam ullam veniam voluptas! A dolor
                                    dolores ipsum quam repellat sed veniam!
                                </div>
                                <div>Aut culpa cumque delectus deleniti ex illo, impedit inventore laboriosam laborum odit,
                                    officiis sequi sint tempora tempore temporibus! Ea, reprehenderit voluptatem. Dignissimos
                                    eligendi natus nemo nihil, ratione recusandae repudiandae tempora.
                                </div>
                                <div>Ipsa, nulla, ratione? Aperiam commodi consequuntur cupiditate eligendi exercitationem
                                    facilis fuga impedit iure iusto magnam nemo pariatur quaerat quam quod, reiciendis
                                    repudiandae rerum saepe similique temporibus ut! Ab, aliquam earum.
                                </div>
                                <div>A blanditiis cumque distinctio dolore, eveniet quia quis saepe voluptatem. Consequatur
                                    debitis dolore, eum inventore maiores mollitia nam necessitatibus officiis similique
                                    voluptatibus! Aliquid aut dolorem, eaque eum labore odio quasi!
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                Footer
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->

                    </section>

                    <!-- Right Col -->
                    <section class="col-lg-5 connectedSortable">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Caja chica de usuarios</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                Lorem ipsum dolor sit amet.
                                {{ $inputs }}
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                Footer
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->
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


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class='control-sidebar-menu'>
                        <li>
                            <a href='javascript::;'>
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='javascript::;'>
                                <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='javascript::;'>
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='javascript::;'>
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul><!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class='control-sidebar-menu'>
                        <li>
                            <a href='javascript::;'>
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='javascript::;'>
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='javascript::;'>
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-waring pull-right">50%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href='javascript::;'>
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul><!-- /.control-sidebar-menu -->

                </div><!-- /.tab-pane -->

                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->

                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                            <p>
                                Some information about this general settings option
                            </p>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                            <p>
                                Other sets of options are available
                            </p>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked />
                            </label>
                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div><!-- /.form-group -->


                    </form>
                </div><!-- /.tab-pane -->
            </div>

        </aside><!-- /.control-sidebar -->
        <!-- End Control SideBar -->

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class='control-sidebar-bg'></div>
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

    <!-- Demo -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
    </body>
</html>