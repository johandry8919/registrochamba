<section class="container">


    <div class="">

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
                    <div class="btn btn-info"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                </div>
            </div>
            <br>
        <?php } ?>
        <?php if ($this->session->flashdata('mensaje')) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>

        <div class="card">
            <div class="card-body">
                <div class="header">
                    <div class="card-title">
                        
                            Vivienda Joven
                        
                    </div>
                </div>

                <div class="text-center mt-5">

                    <h3 class="text-center card-text mb-3">Elije una opción del Plan Vivienda Joven:</h3>
                </div>
                
                <?php
                $vivienda1 = "";
                $vivienda2 = "";
                $vivienda3 = "";
                $vivienda4 = "";
                ?>
                <?php if (isset($viviendajoven)) {
                    

                    /* var_dump($usuarioacademico); */
                    if (isset($viviendajoven) and $viviendajoven != "") {

                       

                        switch ($viviendajoven->vivienda) {
                            case 1:
                                $vivienda1 = "checked";
                                break;
                            case 2:
                                $vivienda2 = "checked";
                                break;
                            case 3:
                                $vivienda3 = "checked";
                                break;
                            case 4:
                                $vivienda4 = "checked";
                                break;
                        }
                    }
                } ?>

                <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registrovivienda" class=" " style="">

                    <div class="conatiner-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-ms-8 col-lg-6">
                            <div class="form-group">
                                    <label for="vivienda1" class="custom-switch form-switch me-5">
                                        <input <?php echo $vivienda1 ?> type="radio" name="vivienda" id="vivienda1" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                        <span class="custom-switch-description">Mi terreno propio Autoconstrucción</span>
                                    </label>
                                </div>



                                <div class="form-group">
                                    <label for="vivienda2" class="custom-switch form-switch me-5">
                                        <input <?php echo $vivienda2 ?> type="radio" name="vivienda" id="vivienda2" value="2" class="custom-switch-input">
                                        <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                        <span class="custom-switch-description">Ampliación o remodelación de su vivienda</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="vivienda3" class="custom-switch form-switch me-5">
                                        <input <?php echo $vivienda3 ?> type="radio" name="vivienda" id="vivienda3" value="3" class="custom-switch-input">
                                        <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                        <span class="custom-switch-description">Adjudicación GMVV</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="vivienda4" class="custom-switch form-switch me-5">
                                        <input <?php echo $vivienda4 ?> type="radio" name="vivienda" id="vivienda4" value="4" class="custom-switch-input">
                                        <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                        <span class="custom-switch-description">Ninguno</span>
                                    </label>
                                </div>

                               
                            </div>
                        </div>
                        <div class="container-login100-form-btn pt-3 pb-3 m-2">
                                    <?php if (isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca)); ?>
                                    <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                        Guardar
                                    </button>
                                </div>

                    </div>


                </form>
            </div>

        </div>
        <div class="body">
            <div id="real_time_chart" class="">


            </div>


        </div>

    </div>


    </div>

</section>