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

            <div class="container  mx-auto  ">
                <div class="col col-login">
                    <div class="text-center">
                        <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>img/logo-nuevo-chamba-250-79.png" class="header-brand-img" alt="" width="80" style="
  height:100px; "></a>
                    </div>
                </div>
               
                <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        <img src="../assets/images/brand/logo-white.png" class="header-brand-img m-0" alt="">
                    </div>
                </div>

                <!-- CONTAINER OPEN -->
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form   class="login100-form validate-form" id="forgot_password" method="POST" action="<?php echo base_url();?>Cusuarios/recuperarClave" method="POST">

                            <span class="login100-form-title pb-5">
                                Recuperar contraseña
                            </span>
                            <p class="text-muted">Ingrese la dirección de correo electrónico registrada en su cuenta</p>
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="email" name="email" placeholder="Email" required autofocus>
                            </div>
                            <div class="submit">
                            <button class="btn btn-primary d-grid col" id="boton" type="botton">Reiniciar Contraseña</button>
                              
                            </div>
                           
                      
                            <?php if(isset($mensaje)){ ?>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-danger"> <?php echo $mensaje; ?></div>
                              </div>
                            </div>
                      <?php }?>
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
                        <?php if($this->session->flashdata('mensajeexito')){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-success">  <?php echo $this->session->flashdata('mensajeexito'); ?></div>
                          </div>
                        </div>
                  <?php }?>
                  <?php if($this->session->flashdata('mensajeerror')){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                          </div>
                        </div>
                        <br>
                  <?php }?> 
                            <div class="text-center mt-4">
                                <p class="text-dark mb-0"><a class="text-primary ms-1" href="<?php echo base_url();?>iniciosesion">Iniciar Sesión</a></p>
                            </div>
                            <label class="login-social-icon"><span>OR</span></label>
                          
                        </form>
                    </div>
                </div>
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