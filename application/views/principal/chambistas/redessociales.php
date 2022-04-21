<section class="container-fluid">
    <div class="card">
        <div class="card-header">

            <div class="card-title">Redes Sociales</div>
        </div>
        <div class="card-body">

            <form id="redessociales" method="POST" action="<?php echo base_url(); ?>Cchambistas/redessociales">
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fe fe-instagram" data-bs-toggle="tooltip" title="" data-bs-original-title="fe fe-instagram" aria-label="fe fe-instagram"></i></span>
                                <input id="instagram" name="instagram" maxlength="100" autofocus value="<?php if (isset($redesusuario->instagram)) echo ucwords($redesusuario->instagram); ?>" type="text" class="form-control" placeholder="instagram" aria-label="instagram" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fe fe-twitter" data-bs-toggle="tooltip" data-bs-original-title="fe fe-twitter" aria-label="fe fe-twitter"></i></span>
                                <input id="twitter" name="twitter" maxlength="100" autofocus value="<?php if (isset($redesusuario->twitter)) echo ucwords($redesusuario->twitter); ?>" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fe fe-facebook" data-bs-toggle="tooltip" data-bs-original-title="fe fe-facebook" aria-label="fe fe-facebook"></i></span>
                                <input id="facebook" name="facebook" maxlength="200" autofocus value="<?php if (isset($redesusuario->facebook)) echo ucwords($redesusuario->facebook); ?>" type="text" class="form-control" placeholder="facebook" aria-label="facebook" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 mb-3">

                        <button id="boton" type="botton" class="login100-form-btn btn-primary">
                            Guardar
                        </button>
                    </div>

                </div>
            </form>


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
    <?php if ($this->session->flashdata('mensaje')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning"> <?php echo $this->session->flashdata('mensaje'); ?></div>
            </div>
        </div>
        <br>
    <?php } ?>

</section>