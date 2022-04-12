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
<div class="login-img">
       <div id="global-loader">
            <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>

    <div class="body">
        <div class="page">

            <div class="container  mx-auto justify-content-center ">
                <div class="col col-login">
                    <div class="text-center">
                        <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>img/logo-nuevo-chamba-250-79.png" class="header-brand-img" alt="" width="50" style="
  height:100px; "></a>
                    </div>
                </div>
                <div class="wrap-login100 p-6">
                    <span class="login100-form-title">
                        Registro de usuario
                    </span>

                    <div>
                        <!--- Nacionalida -->
                        <div class="input-group-addon">
                            <ul class="">
                                <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Nacionalidad</a></li>

                            </ul>
                        </div>
                    </div>

                    <form id="sign_up" action="<?php echo base_url(); ?>Cusuarios/registro" method="POST" class="login100-form">
                        <div class="row ">

                            <div class="col-lg-6 ">

                                <div class="form-group">

                                    <select class="form-control" id="nac" name="nac" required>
                                        <option value="" selected="">Seleccione</option>
                                        <option value="V">Venezolano(a)</option>
                                        <option value="E">Extranjero(a)</option>
                                    </select>
                                    <?php echo form_error('nac'); ?>
                                </div>

                                <!-- <label class="form-label">Correo</label> -->
                                <div class="form-group">
                                    <div class=" validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="email" maxlength="100" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Correo" required>
                                        <?php echo form_error('email'); ?>
                                    </div>


                                </div>


                                <!-- <label class="form-label">Contraseña</label> -->
                                <div class="form-group">
                                    <div class=" validate-input input-group" id="Password-toggle">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="password" id="password" maxlength="16" name="password" value="<?php echo set_value('password'); ?>" placeholder="Contraseña" required>
                                    </div>


                                </div>




                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <!-- <label class="form-label">Cedula</label> -->
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-account" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text" id="cedula" maxlength="8" name="cedula" value="<?php echo set_value('cedula'); ?>" placeholder="Cédula" required autofocus>
                                        <?php echo form_error('cedula'); ?>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <!-- <label class="form-label">Repetir Correo</label> -->
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="email" id="passwordr" maxlength="100" id="emailr" name="emailr" value="<?php echo set_value('emailr'); ?>" placeholder="Repetir Correo" required>
                                        <?php echo form_error('emailr'); ?>
                                    </div>


                                    <!-- <label class="form-label">Repetir Contraseña</label> -->
                                    <div class="form-group">
                                        <div class=" validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="password" id="passwordr" maxlength="16" name="passwordr" value="<?php echo set_value('passwordr'); ?>" placeholder="Repetir Contraseña" required>
                                            <?php echo form_error('passwordr'); ?>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <?php if ($this->session->flashdata('mensajeerror')) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->flashdata('mensajeexito')) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row" id="loader_romel" style="display: none;">
                                <div class="col-md-4 col-md-offset-5">
                                    <div class="preloader pl-size-xl">
                                        <div class="spinner-layer">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- <button class="container-login100- form-btn"  >REGISTRAR</button>
                             -->
                            <div class="container-login100-form-btn">
                                <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                    Register
                                </button>
                            </div>
                            <div class="m-t-25 m-b--5 p-2 align-center text-center">
                                <a class="text-center" href="<?php echo base_url(); ?>iniciosesion">Ya estoy registrado</a>


                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


    <!-- PAGE -->
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