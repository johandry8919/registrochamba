<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Chamba Juvenil</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

    <link href="<?php echo base_url();?>css/estilos.css" rel="stylesheet">
</head>

<body class="signup-page completar">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="<?php echo base_url();?>/img/Logo-chamba.png" class="img-fluid" alt="Responsive image"></a>
            <!--<a href="javascript:void(0);">Chamba<b>Juvenil</b></a>-->
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card">
          <div class="card-header bg-purple padding">
             <h5 class="text-center">Validar</h5>
          </div>
          <div class="body">
            <h5 class="text-center">Verifica tu cuenta!</h5>
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float">
                         <i class="material-icons">email</i>
                     </button>                    
                </div>
                <div class="col-md-11">
                    <h5 class="card-title">
                        <p class="text-justify">Se envio un email para que confirmes tu registro.Inicia Sesión copia y pega el codigo para activar tu cuenta.<br> Si no recibes un email en 5 minutos, revisa tu bandeja de Spam.</p>
                    </h5> 
                </div>
            </div>            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                <form id="verificacion" method="POST" action="<?php echo base_url();?>Cusuarios/validarCuenta">
                    <!--<div class="msg">Inicio de Sesión</div>-->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div>
                              <input type="email" class="form-control" value="<?php echo $this->session->userdata('email');?>" readonly>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">verified_user</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="codigo" name="codigo" maxlength="50" placeholder="codigo verificación" required autofocus>
                            <?php echo form_error('password');?>
                        </div>
                    </div>
                    <div class="row">
                        
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

                        <div class="col-xs-4 col-xs-offset-4">
                            <button class="btn btn-block bg-pink waves-effect" id="boton" type="submit">Verificar</button>
                        </div>
                    </div>

                  <?php if(isset($mensaje)){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-danger"> <?php echo $mensaje; ?></div>
                          </div>
                        </div>
                  <?php }?>
                  <?php if($this->session->flashdata('mensaje')){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                          </div>
                        </div>
                        <br>
                  <?php }?> 
                  <?php if(isset($mensaje2)){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-success"> <?php echo $mensaje2; ?></div>
                          </div>
                        </div>
                  <?php }?>
                  
                </form>                    
                </div>
            </div>
          </div>
        </div><!--card-->
    </div>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url();?>plugins/jquery-validation/jquery.validate.js"></script>

    <script src="<?php echo base_url();?>plugins/jquery-validation/localization/messages_es.js"></script>
    
    <!-- Custom Js -->
    <script src="<?php echo base_url();?>js/admin.js"></script>
    <script src="<?php echo base_url();?>js/pages/examples/verificacion.js"></script>
</body>

</html>