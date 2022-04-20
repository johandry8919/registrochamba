<section class="container-fluid">
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
    <div class="card">
        <div class="body">
            <div class="card-header">
                <div class="card-title">Formación Académica</div>
            </div>
            <div class="container-fluid">
                <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registroformacionacademica">
                    <div class="row mt-2  ">
                        <div class=" col-12 col-lg-6 ">
                            <div class="form-group">
                                <label class="form-label">Centro educativo</label>

                                <input type="text" placeholder="Centro educativo" class=" form-control" id="centro_educ" name="centro_educ" maxlength="255" required autofocus value="<?php if (isset($acausuario->centro_educ)) echo ucwords($acausuario->centro_educ); ?>">
                            </div>

                        </div>
                        <!-- Título / Carrera -->

                        <div class=" col-12 col-md-6 ">
                            <div class="form-group">
                                <label class="form-label">Título / Carrera</label>

                                <input type="text" placeholder="Título / Carrera" class=" form-control" id="titulo_carrera" name="titulo_carrera" maxlength="255" required autofocus value="<?php if (isset($acausuario->titulo_carrera)) echo ucwords($acausuario->titulo_carrera); ?>">
                            </div>




                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Nivel de Estudios</label>

                                <select class="form-control" id="id_instruccion" name="id_instruccion">
                                    <option value="">Seleccione una opción</option>
                                    <!-- <option selected value='1'>Educación Básica Primaria</option>  -->
                                    <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '1') {
                                                echo 'selected';
                                            } ?> value='1'>Educación Básica Primaria</option>
                                    <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '2') {
                                                echo 'selected';
                                            } ?> value='2'>Educación Básica Secundaria</option>
                                    <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '3') {
                                                echo 'selected';
                                            } ?> value='3'>Bachillerato / Educación Media</option>
                                    <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '4') {
                                                echo 'selected';
                                            } ?> value='4'>Educación Técnico/Profesional</option>
                                    <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '5') {
                                                echo 'selected';
                                            } ?> value='5'>Universidad</option>
                                    <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '1') {
                                                echo 'selected';
                                            } ?> value='6'>Postgrado</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Área de Formación</label>

                                <select class="form-control" id="id_area_form" name="id_area_form">
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                    foreach ($areaform as $key => $value) {
                                        if ($value->id_area_form == $acausuario->id_area_form) {
                                            echo "<option selected value='" . $value->id_area_form . "'>$value->nombre</option>";
                                        } else {
                                            echo "<option value='" . $value->id_area_form . "'>$value->nombre</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-12 ">

                            <div class="form-group">
                                <label class="form-label">Estado</label>

                                <input name="id_estado_inst" type="radio" id="estudio" value="1" <?php if (isset($acausuario->id_estado_inst)) {
                                                                                                        if (trim($acausuario->id_estado_inst) == '1') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?> />
                                <label for="estudio">Culminado</label>
                                <input name="id_estado_inst" type="radio" id="estudio2" value="2" <?php if (isset($acausuario->id_estado_inst)) {
                                                                                                        if (trim($acausuario->id_estado_inst) == '2') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?> />
                                <label for="estudio2">Cursando</label>
                                <input name="id_estado_inst" type="radio" id="estudio3" value="3" <?php if (isset($acausuario->id_estado_inst)) {
                                                                                                        if (trim($acausuario->id_estado_inst) == '3') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?> />
                                <label for="estudio3">Abandonado / Aplazado</label><br>


                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Rango Fecha:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-buttom" id="reservation" name="rango_fecha" value="<?php if (isset($acausuario->rango_fecha)) echo $acausuario->rango_fecha; ?>">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <?php if (isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca)); ?>
                            <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                Guardar
                            </button>
                        </div>



                        <!-- row -->
                    </div>
                </form>
            </div>


            <!-- body -->
        </div>
    </div>
</section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>plugins/node-waves/waves.js"></script>
    <!-- Custom Js -->
        <script src="<?php echo base_url();?>plugins/momentjs/moment.js"></script>
        <script src="<?php echo base_url();?>plugins/autosize/autosize.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url();?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/calendario.js"></script>

