
<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="<?php echo base_url();?>/img/logo-nuevo-chamba-250-79.png" class="img-fluid" alt="Responsive image"></a>
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card-header bg-cyan padding">
          <h5 class="text-center">Recuperar contraseña</h5>
        </div>         
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="<?php echo base_url();?>Cusuarios/recuperarClave" method="POST">
                    <div class="msg">
                        Ingresa la dirección de correo que usastes para registrarte. Nosotros te enviaremos un enlace para que puedas reinicar la contraseña.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
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
                    <button class="btn btn-block btn-lg bg-green waves-effect" id="boton" type="botton">Reiniciar Contraseña</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?php echo base_url();?>iniciosesion">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="<?php echo base_url();?>js/pages/examples/forgot-password.js"></script>
</body>

</html>