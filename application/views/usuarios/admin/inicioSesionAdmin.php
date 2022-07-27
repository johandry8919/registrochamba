﻿<!doctype html>
<html lang="es" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Registro de la Mission Chamba Juvenil">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="Empleo Venezuela, chamba, Saber y Trabajo">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.png" />

    <!-- TITLE -->
    <title>Chamba Juvenil</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/dark-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/transparent-style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/skin-modes.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/assets/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr fondo-login">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="app-header bg-transparent ">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                  
                  

                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                        
                      
                            <div class="navbar navbar-collapse responsive-navbar p-0 ">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon"
                                                data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  
                                     
                                   
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="<?php echo base_url(); ?>/img/logo-nuevo-chamba.png" class="header-brand-img" alt="" width="50" style="
  height:200px; 



">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                            <span class="login100-form-title pb-5">
                                Inicio de Sesión
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Admin</a></li>
                                          
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab5">
                                            <form class="login100-form validate-form" id="formulario-login" method="POST" action="<?php echo base_url(); ?>Cusuarios/ingresarUsuario">

                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" name="email" type="email" placeholder="Correo electrónico" id="email" value="<?php echo set_value('email'); ?>">
                                                <?php echo form_error('email'); ?>

                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" name="password" value="<?php echo set_value('password'); ?>" maxlength="16" placeholder="Contraseña" required autofocus id="password"  type="password" placeholder="Password">
                                            </div>
                                            <div class="text-end pt-4">
                                                <p class="mb-0"><a href="<?php echo base_url(); ?>recuperarclave" class="text-primary ms-1">Olvido su contraseña?</a></p>
                                            </div>
                                            <div class="container-login100-form-btn">


                                                <button type="submit"  id="loginbtn" class="btn btn-primary login100-form-btn btn-primary btn">
                                                    Ingresar </button>
</a>
                                            </div>
                                         
                                            </form>
                                        </div>
                               
                               

                                    </div>
                                </div>
                            </div>
                          

               
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="<?php echo base_url(); ?>assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="<?php echo base_url(); ?>assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="<?php echo base_url(); ?>assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="<?php echo base_url(); ?>assets/js/themeColors.js"></script>

    <script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script type="text/javascript"> var base_url = "<?php echo base_url();?>";</script>
    <script src="<?php echo base_url(); ?>assets/js/usuarios_admin.js"></script>
</body>

</html>