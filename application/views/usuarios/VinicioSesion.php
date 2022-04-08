

<body class="login-page">
    <div class="container login-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="<?php echo base_url();?>/img/logo-nuevo-chamba-250-79.png" class="img-fluid" alt="Responsive image"></a>
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card-header bg-cyan padding">
          <h5 class="text-center">Inicio de Sesión</h5>
        </div>        
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?php echo base_url();?>Cusuarios/ingresarUsuario">
                    <!--<div class="msg">Inicio de Sesión</div>-->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>" maxlength="60" placeholder="Correo" required autofocus>
                            <?php echo form_error('email');?>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password');?>" maxlength="16" placeholder="Clave" required autofocus>
                            <?php echo form_error('password');?>
                        </div>
                    </div>
                    <div class="row">
                    
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recordar</label>
                        </div>

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

                        <div class="col-xs-4">
                            <button class="btn btn-block bg-green waves-effect" id="boton" type="botton">Ingresar</button>
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
                  <?php if(isset($mensaje2)){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-success"> <?php echo $mensaje2; ?></div>
                          </div>
                        </div>
                  <?php }?>
                  
                </form>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url();?>registro">Registrate</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?php echo base_url();?>recuperarclave">Olvido su contraseña?</a>
                        </div>
                    </div>                
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
    <script src="<?php echo base_url();?>js/pages/examples/sign-in.js"></script>
</body>

</html>