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

<body>

    <div class="card-body">

        <div class="container">
            <div class="wrap-login100 p-6">
                <form id="sign_up" action="<?php echo base_url(); ?>Cusuarios/registro" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">Persona</label>
                            <div class="form-group">
                                <select class="form-control" id="nac" name="nac" required>
                                    <option value="" selected="">Seleccione</option>
                                    <option value="V">Venezolano(a)</option>
                                    <option value="E">Extranjero(a)</option>
                                </select>
                                <?php echo form_error('nac'); ?>
                            </div>

                            <label class="form-label">Correo</label>
                            <div class="form-group">
                                <div class=" validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="email" maxlength="100" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Correo" required>
                                    <?php echo form_error('email'); ?>
                                </div>


                            </div>


                            <label class="form-label">Contraseña</label>
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
                                <label class="form-label">Cedula</label>
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="cedula" maxlength="8" name="cedula" value="<?php echo set_value('cedula'); ?>" placeholder="Cédula" required autofocus>
                                    <?php echo form_error('cedula'); ?>
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="form-label">Repetir Correo</label>
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="email" id="passwordr" maxlength="100" id="emailr" name="emailr" value="<?php echo set_value('emailr'); ?>" placeholder="Repetir Correo" required>
                                    <?php echo form_error('emailr'); ?>
                                </div>


                                <label class="form-label">Repetir Contraseña</label>
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


                        <div id="boton" class="container-login100-form-btn">
                            <a href="index.html" class="login100-form-btn btn-primary">
                                REGISTRAR
                            </a>
                        </div>
                </form>
            </div>
        </div>


    </div>


    </div>
    <!-- End PAGE -->




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