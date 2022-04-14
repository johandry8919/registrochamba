<div class="card">
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
    <div class="card-header"></div>
    <div class="card-body">
    <?php
                            if (!isset($brigadas)) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning"> <strong>Importante:</strong> Por favor selecciona una opción para pertenecer a una brigada.</div>
                                </div>
                            </div>
                            <?php }?>
                            <?php
                            if (isset($brigadas)) {
                            ?>
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr class="success">
                                                    <!-- <th>#</th> -->
                                                    <th>Seleccionaste </th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if (isset($brigadas) and $brigadas != "") {
                                                    echo '<tr>';
                                                    /* echo '<th scope="row">1</th>'; */
                                                    echo '<td>' . $brigadas->nombre_brigadas . '</td>';
                                                    echo '<td>';

                                                    echo '<a href="' . base_url() . 'eliminarbrigada/' . $brigadas->id_brigada . '"><i class="material-icons">close</i></a>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>
        <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registrobrigadas">
            <div class="conatiner-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-ms-8 col-lg-6">
                        <div class="form-group">
                            <label  class="custom-switch form-switch me-5">
                                <input  type="radio" id="id_brigada" name="id_brigada" value="1" class="custom-switch-input">
                                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                <span class="custom-switch-description">Ninguno</span>
                            </label>
                        </div>



                        <div class="form-group">
                            <label  class="custom-switch form-switch me-5">
                                <input  type="radio" id="id_brigada" name="id_brigada" value="2" class="custom-switch-input">
                                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                <span class="custom-switch-description">Organización</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label  class="custom-switch form-switch me-5">
                                <input type="radio" id="id_brigada" name="id_brigada" value="3" class="custom-switch-input">
                                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                <span class="custom-switch-description">Formación Integral</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label  class="custom-switch form-switch me-5">
                                <input type="radio" id="id_brigada" name="id_brigada" value="4" class="custom-switch-input">
                                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                <span class="custom-switch-description">Recreación</span>
                            </label>
                        </div>
                      

                    </div>
                </div>
            </div>

    </div>
    <button id="boton" type="botton" class="login100-form-btn btn-primary">
                            Guardar
                        </button>


    </form>

    <!-- <select class="form-control form-select show-tick" id="id_brigada" name="id_brigada" data-bs-placeholder="Select Country" tabindex="-1" aria-hidden="true">
                                <option value="">Seleccione una opción</option>
                                <option value="1">-Ninguno-</option>
                                <option value="2">Organización</option>
                                <option value="3">Formación Integral</option>
                                <option value="4">Deporte</option>
                                <option value="5">Recreación</option>
                                <option value="6">Cultura</option>
                                <option value="7">Economia Comunal</option>
                                <option value="8">Salud Joven</option>
                                <option value="9">Educación</option>
                                <option value="10">Ciencia y Tecnología</option>
                                <option value="11">Protección Social</option>
                                <option value="12">Movilización</option>
                                <option value="13">Comunicación</option>
                                <option value="14">Defensa Integral, Seguridad o Milicia</option>
                                <option value="15">Mujer</option>
                                <option value="16">Afrodescendinete</option>
                                <option value="17">Otro</option>
                            </select> -->
</div>
</div>
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

    <!-- <div class="col-xs-6 col-md-offset-3">


                    <button id="boton" type="botton" class="login100-form-btn btn-primary">
                        Guardar
                    </button>
                </div> -->
</div>
</form>
</div>
</div>


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>


<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>