<link id="style" href="<?php echo base_url(); ?>assets/css/ocultarmotrar.css" rel="stylesheet" />
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>








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
            

    <div class="card">
        
        <div class="col-12 body ">
        <div class="card-title">Productivo</div>
        <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registroproductivo">
        <div class="card-header">¿En cuál Chamba deseas incorporarte?</div>
       <div class="form-group">
            <select class="form-control select2 form-select" data-placeholder="Choose one" id="tipo_chamba" name="tipo_chamba" required>
                <option value="">Seleccione una opción</option>
                <option value="0">-Ninguno-</option>
                <option value="1">Chamba Vuelta al Campo</option>
                <option value="2">Chamba Pesquera y Acuícola</option>
                <option value="3">Chamba Emprender e Innovar</option>
                <option value="4">Chamba Minera</option>
                <option value="5">Chamba Digital</option>
                <option value="6">Chamba Agrourbana</option>
                <option value="7">Chamba Técnica y Oficios</option>
                <option value="8">Chamba Delivery</option>
            </select>
 
    <!-- Chamba Vuelta al Campo -->
    <div id="chamba1" class="ocultarmotrar">

        <div class="form-label">¿Dispone de terreno para la siembra?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="terreno_siembra" name="terreno_siembra" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" id="terreno_siembra" name="terreno_siembra" class="custom-switch-input" checked="" value="no">

                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>




        <div class="form-label">¿Actualmente estas sembrando?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input value="si" type="radio" id="sembrando" name="sembrando" class="custom-switch-input">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input value="no" type="radio" id="sembrando" name="sembrando" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>



        <div class="form-group">
            <b>Indica que rubros produces</b>
            <div class="input-group">
                <div class="form-line">
                    <input type="text" class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
                </div>
            </div>
        </div>


        <div class="form-label">¿Requiere Financiamiento?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="financiamiento" name="financiamiento" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input value="no" type="radio" id="financiamiento" name="financiamiento" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>



    </div>
    <!-- Chamba Pesquera y Acuícola -->
    <div id="chamba2" class="ocultarmotrar">
        <div class="form-label">¿Eres inspector?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="pesquera_inspector_pescador" name="pesquera_inspector_pescador" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" id="pesquera_inspector_pescador" name="pesquera_inspector_pescador" class="custom-switch-input" checked="" value="no">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>


        <div class="form-label">¿Requieres refrigeración?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="pesquera_refrigeracion" name="pesquera_refrigeracion" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" value="no" id="pesquera_refrigeracion" name="pesquera_refrigeracion" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>
        <div class="form-label">¿Requiere Financiamiento?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="pesquera_financiamiento" name="pesquera_financiamiento" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" value="no" id="pesquera_financiamiento" name="pesquera_financiamiento" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>

    </div>


    <!-- Chamba Emprender e Innovar -->

    <div id="chamba3" class="ocultarmotrar">
        <div class="form-label">¿Tienes un emprendimiento?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="emprendimiento" name="emprendimiento" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" value="no" id="emprendimiento" name="emprendimiento" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>
        <div class="form-label">¿Deseas iniciar un emprendimiento??</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="iniciar_emprendimiento" name="iniciar_emprendimiento" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" value="no" id="iniciar_emprendimiento" name="iniciar_emprendimiento" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>
        <div class="form-label">¿Estas registrado como empresa?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="emprendimiento_empresa" name="emprendimiento_empresa" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" value="no" id="emprendimiento_empresa" name="emprendimiento_empresa" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>
        <div class="form-label">¿Requiere Financiamiento?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="financiamiento-emprendimiento" name="financiamiento-emprendimiento" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" value="no" id="financiamiento-emprendimiento" name="financiamiento-emprendimiento" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>

    </div>




    <div id="chamba4" class="ocultarmotrar">

        <div class="form-label">¿Dispones de Espacios o Terrenos?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="agrourbana-terrenos" name="agrourbana-terrenos" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input type="radio" id="agrourbana-terrenos" name="agrourbana-terrenos" class="custom-switch-input" checked="" value="no">

                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>




        <div class="form-label">¿Deseas activar patio productivo?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input value="si" type="radio" id="agrourbana-patio" name="agrourbana-patio" class="custom-switch-input">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input value="no" type="radio" id="agrourbana-patio" name="agrourbana-patio" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>



        <div class="form-group">
            <b>Indica tu produccion de ciclos cortos</b>
            <div class="input-group">
                <div class="form-line">
                    <input type="text" class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
                </div>
            </div>
        </div>


        <div class="form-label">¿Requiere Financiamiento?</div>
        <div class="form-group">
            <label class="custom-switch form-switch me-5">
                <input type="radio" id="financiamiento-agrourbana" name="financiamiento-agrourbana" class="custom-switch-input" value="si">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">Si</span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-switch form-switch">
                <input value="no" type="radio" id="financiamiento-agrourbana" name="financiamiento-agrourbana" class="custom-switch-input" checked="">
                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                <span class="custom-switch-description">No</span>
            </label>
        </div>



    </div>

<div class="col-12 mt-3 mb-3">
    <?php if (isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca)); ?>
    <button id="boton" type="botton" class="login100-form-btn btn-primary">
        Guardar
    </button>
</div>
       </div>

</form>

    

    

    </div>
    </div>


   


        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>



</section>