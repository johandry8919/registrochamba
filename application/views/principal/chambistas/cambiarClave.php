<section class="container">

    <div class="card ">
        <div class=" mb-4">
            <?php if ($this->session->flashdata('mensajeexito')) { ?>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?></div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('mensajeerror')) { ?>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                    </div>
                </div>
                <br>
            <?php } ?>



        </div>
        <div class="card-body">
            <div class="card-header  text-center">
                <div class="card-title">Cambio de Contraseña</div>
            </div>
            <div class="container">
                <div class="row justify-content-center mt-2">
                    <div class="col-12 col-md-8">
                        <form class="login100-form validate-form" id="cambioClave" method="POST" action="<?php if(!isset($id_admin)){
                            echo base_url('Cchambistas/cambiarClave');
                           
                        }?>">


                            <div class="form-group">
                                <div class=" validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="password" id="clave_actual" name="clave_actual" placeholder="Contraseña actual" maxlength="16" data-parsley-error-message="Este campo es requerido" required autofocus>
                                    <?php echo form_error('clave_actual'); ?>
                                </div>


                            </div>



                            <div class="form-group">
                                <div class=" validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" data-parsley-error-message="Este campo es requerido" placeholder="Contraseña Nueva" maxlength="16" required autofocus>
                                    <?php echo form_error('password'); ?>

                                </div>

                                <div class="form-group mt-2">
                                    <div class=" validate-input input-group" id="Password-toggle">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="password" id="new_password" name="new_password" maxlength="16" placeholder="Repetir Contraseña Nueva" data-parsley-error-message="Este campo es requerido" required autofocus>
                                        <?php echo form_error('new_password'); ?>
                                    </div>


                                </div>

                                <div class="col-12 mt-3 mb-6">

                                    <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                        Guardar
                                    </button>
                                </div>


                                <input type="hidden" name="id_admin" id="id_admin" value="<?php if(isset($id_admin)){echo $id_admin;}
                                ?>">  




                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<script type="text/javascript"> var base_url = "<?php echo base_url();?>";</script>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- SHOW PASSWORD JS -->
<script src="<?php echo base_url(); ?>assets/js/show-password.min.js"></script>

<!-- Validation Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>