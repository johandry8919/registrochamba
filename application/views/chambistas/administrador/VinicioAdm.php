<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Chamba Juvenil Administrador</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>fonts/material.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/styleAdm.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>css/themes/all-themesAdm.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/estilosAdm.css" rel="stylesheet">
</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <!--     <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader pl-size-xl">
                <div class="spinner-layer pl-purple">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere por favor...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>


    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= base_url() ?>inicio"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">


                <ul class="nav navbar-nav navbar-right">

                    <!-- notificaciones -->
                    <!--<li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                                                 <ul class="dropdown-menu">
                            <li class="header">Notificaciones</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje uno</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 min
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje 2</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 min
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje 3</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 horas
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje 4</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 horas
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje 5</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 horas
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje 6</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 horas
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Mensaje 7</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> ayer
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <!-- notificaciones -->

                    <!-- Alertas -->
                    <!--   
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        
                      <ul class="dropdown-menu">
                            <li class="header">Alertas</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Perfil chamba juvenil
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Perfil bancario chamba juvenil
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Mi CV digital
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul> 

                    </li>-->
                    <!-- Alertas -->

                    <!-- usuario -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">account_circle</i>
                            <!--<span class="label-count">9</span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Usuario</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="<?php echo base_url(); ?>Cadministrador/cerrar_session">
                                            <i class="material-icons">input</i> Salir
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- usuario -->

                </ul>
            </div>
        </div>
    </nav>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>img/avatar_on.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <!--<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>-->
                    <div class="email"><?php echo $this->session->userdata('emailAdm'); ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>

                    <li class="<?php if ($this->uri->segment(1) == 'inicio') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>inicio">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li class="<?php if ($this->uri->segment(1) == 'datospersonales') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>datospersonales">
                            <i class="material-icons">account_box</i>
                            <span>Datos Usuarios</span>
                        </a>
                    </li>

                    <li class="<?php if ($this->uri->segment(1) == 'datospersonales') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>datospersonales">
                            <i class="material-icons">account_box</i>
                            <span>Estadísticas</span>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> <a href="javascript:void(0);">Chamba Juvenil</a>.
                </div>
                <!--
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
                -->
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>


    <section class="content">
        <div class="container-fluid">

            <?php if ($this->session->flashdata('mensaje')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                    </div>
                </div>
                <br>
            <?php } ?>

            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-pink">
                    <li><a href="javascript:void(0);"><i class="material-icons">home</i> Inicio</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Administrador</li>
                </ol>
            </div>

            
            <!--        
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Monedero</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">folder_shared</i>
                        </div>
                        <div class="content">
                            <div class="text">Pagos</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Curriculum Vitae Digital</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Mi Perfil</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Administrador
                                <small>Inicio.</small>
                            </h2>
                        </div>
                        <div class="body">



                        </div>



                        <div class="footer">
                            <h4>
                                <!--  Nota: -->
                                <small>
                                    <!-- Al completar su perfil podra descargar su Curriculum Vitae. -->
                                </small>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <h2>Chamba Juvenil</h2>

                                    <div class="info-box">
                                          
                                        <div class="icon bg-orange">
                                            <div class="chart chart-pie">
                                            <i class="material-icons">bubble_chart</i>
                                            </div>
                                        </div>
                                      <div class="content">
                                            <div class="text">Completar perfil Chamba Juvenil para poder se tomado en cuenta y descargar Curriculum Vitae</div>

                                                <div class='number'>10%</div>

                                            ?>
                                            
                                        </div> 
                                        
                                    </div>

                                </div>
                                
                            </div>

                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
                -->

                <!--                 
                <div class="col-md-2">
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Pago</strong> Usted a recibido un pago el dia <?php echo date('Y m d') . " "; ?><a href="javascript:void(0);" class="alert-link">Leer Mas</a>.
                    </div>                
                    <div class="alert bg-orange alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Pago</strong> Debe modificar sus datos bancarios <?php echo date('Y m d') . " "; ?><a href="javascript:void(0);" class="alert-link">Leer Mas</a>.
                    </div>
                    <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Pago</strong> Su pago a sido rechazado debe modificar sus datos bancarios <?php echo date('Y m d') . " "; ?><a href="javascript:void(0);" class="alert-link">Leer Mas</a>.
                    </div>                                           
                </div>   
                -->

            </div>
        </div>
    </section>



    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>


    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/widgets/infobox/infobox-2.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>js/demo.js"></script>
</body>

</html>