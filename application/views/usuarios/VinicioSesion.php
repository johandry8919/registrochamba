<!doctype html>
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

    <!--- FONT-ICONS CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/assets/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
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
                        <form class="login100-form validate-form" id="sign_in" method="POST" action="<?php echo base_url(); ?>Cusuarios/ingresarUsuario">
                            <span class="login100-form-title pb-5">
                                Inicio de Sesión
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Persona</a></li>
                                            <li class="mx-0"><a href="#tab6" data-bs-toggle="tab">Estructura</a></li>
                                            <li class="mx-0"><a href="#tab6" data-bs-toggle="tab">Institución/Empersa</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
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
                                                <input class="input100 border-start-0 form-control ms-0" name="password" value="<?php echo set_value('password'); ?>" maxlength="16" placeholder="Contraseña" required autofocus id="password" n type="password" placeholder="Password">
                                            </div>
                                            <div class="text-end pt-4">
                                                <p class="mb-0"><a href="<?php echo base_url(); ?>recuperarclave" class="text-primary ms-1">Olvido su contraseña?</a></p>
                                            </div>
                                            <div class="container-login100-form-btn">


                                                <button type="submit" href="index.html" class="login100-form-btn btn-primary">
                                                    Ingresar
                                                </button>
                                            </div>
                                            <div class="text-center pt-3">
                                                <p class="text-dark mb-0">No estas registrado?<a href="<?php echo base_url(); ?>" class="text-primary ms-1">Registrar</a></p>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+91</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP.</span>
                                            <div class="container-login100-form-btn ">
                                                <a href="javascript:void(0)" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->session->flashdata('mensajeexito')) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('mensajeerror')) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                                    </div>
                                </div>
                                <br>
                            <?php } ?>
                            <?php if (isset($mensaje2)) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success"> <?php echo $mensaje2; ?></div>
                                    </div>
                                </div>
                            <?php } ?>

                        </form>
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

    <!-- CUSTOM JS -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>

</html>