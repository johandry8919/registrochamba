

<body class="signup-page">
    <div class="container signup-box">
    <div class="logo">
            <a href="javascript:void(0);"><img src="<?php echo base_url();?>img/logo-nuevo-chamba-250-79.png" class="img-fluid" alt="Responsive image"></a>
            <!--<a href="javascript:void(0);">Chamba<b>Juvenil</b></a>-->
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card">
          <div class="card-header bg-cyan padding">
             <h5 class="text-center">Registro de usuario</h5>
          </div>
          <div class="body">


                <form id="sign_up" action="<?php echo base_url();?>Cusuarios/registro" method="POST">
                    <!--<div class="msg">Registro de usuario</div>-->
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">persona</i>
                                </span>
                                <div class="form-line">
                                  <select class="form-control" id="nac" name="nac" required>
                                      <option value="" selected="">Seleccione</option>
                                      <option value="V">Venezolano(a)</option>
                                      <option value="E">Extranjero(a)</option>
                                  </select>
                                  <?php echo form_error('nac');?>
                                </div>
                            </div>
                        </div><!--col-md-6-->
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                <input type="text" class="form-control" id="cedula" maxlength="8" name="cedula" value="<?php echo set_value('cedula');?>" placeholder="Cédula" required autofocus >
                                <?php echo form_error('cedula');?>
                                </div>
                            </div>
                        </div><!--col-md-6-->  
                    </div><!--row clearfix-->

                    <div class="row clearfix">
                        <div class="col-md-6">                     
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-line">
                                    <input type="email" class="form-control" maxlength="100" id="email" name="email" value="<?php echo set_value('email');?>" placeholder="Correo" required>
                                    <?php echo form_error('email');?>
                                </div>
                            </div>
                        </div><!--col-md-6--> 
                        <div class="col-md-6">    
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-line">
                                    <input type="email" class="form-control" maxlength="100" id="emailr" name="emailr" value="<?php echo set_value('emailr');?>" placeholder="Repetir Correo" required>
                                    <?php echo form_error('emailr');?>
                                </div>
                            </div>
                        </div><!--col-md-6-->      
                    </div><!--row clearfix-->

                    <div class="row clearfix">
                        <div class="col-md-6"> 
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" id="password" maxlength="16" name="password" value="<?php echo set_value('password');?>" placeholder="Contraseña" required>
                                    <?php echo form_error('password');?>
                                </div>
                            </div>
                        </div><!--col-md-6--> 
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" id="passwordr" maxlength="16" name="passwordr" value="<?php echo set_value('passwordr');?>" placeholder="Repetir Contraseña" required>
                                    <?php echo form_error('passwordr');?>
                                </div>
                            </div>
                        </div><!--col-md-6-->      
                    </div><!--row clearfix-->
                    <!--
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
                    -->
                  <?php if($this->session->flashdata('mensajeerror')){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                          </div>
                        </div>
                  <?php }?>

                  <?php if($this->session->flashdata('mensajeexito')){ ?>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?></div>
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
                    
                    <button class="btn btn-block btn-lg bg-green waves-effect" id="boton" type="botton">REGISTRAR</button>


                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url();?>iniciosesion">Ya estoy registrado</a>
                    </div>
                </form>
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
    <script src="<?php echo base_url();?>js/pages/examples/sign-up.js"></script>


</body>

</html>