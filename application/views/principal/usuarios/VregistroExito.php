

<body class="signup-page completar">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="<?php echo base_url();?>/img/logo-nuevo-chamba-250-79.png" class="img-fluid" alt="Responsive image"></a>
            <!--<a href="javascript:void(0);">Chamba<b>Juvenil</b></a>-->
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card">
          <div class="card-header bg-green padding">
             <h5 class="text-center">Usuario registrado correctamente!</h5>
          </div>
          <div class="body">
          <?php if($this->session->flashdata('mensajeexito')){ ?>
            <!-- <h5 class="text-center">Inicia Sesión</h5> -->
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float">
                         <i class="material-icons">email</i>
                     </button>                    
                </div>
                <div class="col-md-11">
                    <h5 class="card-title">
                        <p class="text-justify"><?php echo $this->session->flashdata('mensajeexito'); ?></p>
                    </h5> 
                </div>
            </div>
            <?php }?>
          </div>
            <div class="m-t-1 m-b--3 align-center">
                <a class="btn btn-success waves-effect" style="color: #fff" href="<?php echo base_url();?>inicio">Exito Continuar</a>
            </div>
            <br>
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
</body>

</html>