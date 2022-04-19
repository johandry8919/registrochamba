<section class="container-fluid">
     <div class="overlay"></div>
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
                <div class="card-title">Experiencia Laboral</div>
            </div>
            <div class="container-fluid">
                <form id="experiencialaboral" method="POST" action="<?php echo base_url();?>Cchambistas/registroexperiencialaboral">
                    <div class="row mt-2  ">

                        <!-- Empresa -->

                        <div class=" col-12 col-md-6 ">
                            <div class="form-group">
                                <label class="form-label">Empresa</label>

                                <input type="text" placeholder="Empresa" class=" form-control" id="empresa" name="empresa" maxlength="100"  autofocus value="<?php if (isset($expusuario->empresa)) echo ucwords($expusuario->empresa); ?>">
                            </div>




                        </div>
                        <!-- Cargo -->
                        <div class=" col-12 col-md-6 ">
                            <div class="form-group">
                                <label class="form-label">Cargo</label>

                                <input type="text" placeholder="Cargo" class=" form-control" id="cargo" name="cargo" maxlength="50"  autofocus value="<?php if(isset($expusuario->cargo)) echo ucwords($expusuario->cargo);?>">
                            </div>




                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Sector de la empresa</label>

                                <select class="form-control"id="area" name="area" >
                                    <option value="">Seleccione una opción</option>


                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '1') {
                                                echo 'selected';
                                            } ?> value="1">Agricultura / Pesca / Ganadería</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '2') {
                                                echo 'selected';
                                            } ?> value="2">Construcción / obras</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '3') {
                                                echo 'selected';
                                            } ?> value="3">Educación</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '4') {
                                                echo 'selected';
                                            } ?> value="4">Energía</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '5') {
                                                echo 'selected';
                                            } ?> value="5">Entretenimiento / Deportes</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '6') {
                                                echo 'selected';
                                            } ?> value="6">Fabricación</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '7') {
                                                echo 'selected';
                                            } ?> value="7">Finanzas / Banca</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '8') {
                                                echo 'selected';
                                            } ?> value="8">Gobierno / Público</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '9') {
                                                echo 'selected';
                                            } ?> value="9">Hostelería / Turismo</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '10') {
                                                echo 'selected';
                                            } ?> value="10">Informática / Hardware</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '11') {
                                                echo 'selected';
                                            } ?> value="11">Informática / Software</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '12') {
                                                echo 'selected';
                                            } ?> value="12">Internet</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '13') {
                                                echo 'selected';
                                            } ?> value="13">Legal / Asesoría</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '14') {
                                                echo 'selected';
                                            } ?> value="14">Materias Primas</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '15') {
                                                echo 'selected';
                                            } ?> value="15">Medios de Comunicación</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '16') {
                                                echo 'selected';
                                            } ?> value="16">Publicidad / RRPP</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '17') {
                                                echo 'selected';
                                            } ?> value="17">RRHH / Personal</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '18') {
                                                echo 'selected';
                                            } ?> value="18">Salud / Medicina</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '19') {
                                                echo 'selected';
                                            } ?> value="19">Servicios Profesionales</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '20') {
                                                echo 'selected';
                                            } ?> value="20">Telecomunicaciones</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '21') {
                                                echo 'selected';
                                            } ?> value="21">Transporte</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '22') {
                                                echo 'selected';
                                            } ?> value="22">Venta al consumidor</option>
                                    <option <?php if (isset($expusuario->area) and $expusuario->area == '23') {
                                                echo 'selected';
                                            } ?> value="23">Venta al por mayor</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="form-group">
                                <label>Rango Fecha</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation" name="rango_fecha" value="<?php if (isset($expusuario->rango_fecha)) echo $expusuario->rango_fecha; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>

                        <div class="col-12 col-md-6 align-items-start align-self-start text-start ">
                        <label class="">Funciones y logros del cargo:</label>
                           
                            <div class="input-group">
                                
                                    <textarea  rows="5" class="form-control no-resize zindex" name="funciones" id="funciones" cols="" maxlength="250" placeholder="Funciones y logros del cargo"  aria-required="true" aria-invalid="false"><?php if (isset($expusuario->funciones)) echo trim(ucwords($expusuario->funciones)); ?></textarea>
                               
                            </div>

                        </div>

                        <div class="col-md-12 ">


                        </div>
                        <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                    <input required type="checkbox" id="exp_lab" name="exp_lab" value="1">
                                                    <label for="exp_lab">Marca esta opción sino tienes ninguna Experiencia Laboral</label>
                                                </div>
                                            </div>

                        <div class=" col-12 col-lg-6 ">
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-checkbox-lg">
                                    <input type="checkbox" class="custom-control-input" id="exp_lab" name="exp_lab" value="1" >
                                    <span class="custom-control-label">Marca esta opción sino tienes ninguna Experiencia Laboral</span>
                                </label>


                            </div>

                        </div>
                        <div class="col-xs-6 col-md-offset-3 mb-2">
                                                <input  type="hidden" id="id__exp_lab" name="id__exp_lab" value="<?php if(isset($expusuario->id__exp_lab)) echo trim(ucwords($expusuario->id__exp_lab));?>">
                                                <button class="login100-form-btn btn-primary" id="boton" type="botton">Guardar</button>
                                            </div>



                    



                        <!-- row -->
                    </div>
                </form>
            </div>


            <!-- body -->
        </div>
    </div>
</section>

<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
<!-- Custom Js -->
<script src="<?php echo base_url(); ?>plugins/momentjs/moment.js"></script>
<script src="<?php echo base_url(); ?>plugins/autosize/autosize.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/calendario.js"></script>