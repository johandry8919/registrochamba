<link id="style" href="<?php echo base_url(); ?>assets/css/ocultarmotrar.css" rel="stylesheet" />
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>



<section class="container">
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
    <div class="row">
        <div class="col-md-6 col-12 mb-2 ">
            <div class="alert alert-info "> <strong>Importante:</strong> Solo puedes seleccionar una opción </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xs-12">
            <div class="card">
                <div class="body">

                    <?php
                    if (isset($usuarioproductivo)) {
                    ?>
                        <div class="container-fluid">
                            <div class="row  mt-2 mb-2  ">
                                <div class="col-12 border alert alert-success  col-md-6 col-lg-6 ">Seleccionaste: <?php
                                                                                                                    if (isset($usuarioproductivo) and $usuarioproductivo != "") {
                                                                                                                        echo "$usuarioproductivo->nombre_chamba";
                                                                                                                    }
                                                                                                                    ?>
                                    <?php
                                    if (isset($usuarioproductivo) and $usuarioproductivo != "") {

                                        echo '<a href="' . base_url() . 'eliminarchamba/' . $usuarioproductivo->id_chamba . '"><i class=" btn-close fs-6" aria-label="Close"></i></a>';
                                    }
                                    ?>
                                </div>

                                <div class="col-1 col-lg-1 ">


                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="card">

                        <div class="body ">
                            <div class="card-header">
                                <div class="card-title">Productivo</div>
                            </div>
                            <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registroproductivo">
                                <div class="card-title text-center">¿En cuál Chamba deseas incorporarte?</div>
                                <div class="form-group">
                                    <select class="form-select" aria-label="Default select example" data-placeholder="Choose one" id="tipo_chamba" name="tipo_chamba" required>
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

                                    <div class="container">
                                        <div class="row justify-content-center ">

                                            <!-- Chamba Vuelta al Campo -->
                                            <div class="col-md-12">
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
                                                                <input type="text"
                                                                placeholder=" que rubros produces"
                                                                class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
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

                                            </div>
                                            <!-- Chamba Pesquera y Acuícola -->
                                            <div class="col-md-12">
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

                                            </div>

                                            <!-- Chamba Emprender e Innovar -->

                                            <div class="col-md-12">
                                                <div id="chamba3" class="row ocultarmotrar">
                                                   <div class="col-md-4">
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
                                                   </div>

                                                   <div class="col-md-4">
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
                                                   </div>

                                                   <div class="col-md-4">
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
                                                   </div>

                                                 
                                                  
                                                  <div class="col-md-4">
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
                                                  <!-- Estás Desarrollando un Proyecto Innovador o Tecnológico  -->
                                                  <div class="col-md-6">
                                                  <div class="form-label list-inline">¿Estás Desarrollando un Proyecto Innovador o Tecnológico?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="Tecnológico" name="Tecnológico" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="Tecnológico" name="Tecnológico" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>

                                                  </div>
                                                  <!-- ¿En cuál área te desarrollas como Emprendedor? -->

                                                  <div class="col-md-6 mt-3">
                                               
                                                <div class="form-label">¿En cuál área te desarrollas como Emprendedor?</div>
                                                <select class="form-select" aria-label="Default select example" data-placeholder="Choose one" id="Emprendedor" name="Emprendedor" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Deporte, Cultura y Recreación</option>
                                        <option value="2">Albañilería</option>
                                        <option value="3">Carpintería</option>
                                        <option value="4">Comercio</option>
                                        <option value="5">Comida Rápida</option>
                                        <option value="6">Construcción</option>
                                        <option value="7">Corte y costura</option>
                                        <option value="8">Decoración, Arreglos y Manualidades</option>
                                        <option value="9">Dj</option>
                                        <option value="10">Elaboración de productos de limpieza</option>
                                        <option value="11">Educación</option>
                                        <option value="12">Electricista</option>
                                        <option value="13">Electrónica</option>
                                        <option value="14">Estética y Belleza</option>
                                        <option value="15">Herrería</option>
                                        <option value="16">Informática</option>
                                        <option value="17">Marquetería, cristalería</option>
                                        <option value="18">Mecánica</option>
                                        <option value="19">Panadería</option>
                                        <option value="20">Peluquería y Barbería</option>
                                        <option value="21">Piñatería</option>
                                        <option value="22">Plomería</option>
                                        <option value="23">Profesional Independiente</option>
                                        <option value="24">Publicidad</option>
                                        <option value="25">Repostería</option>
                                        <option value="26">Salud</option>
                                        <option value="27">Telecomunicaciones</option>
                                        
                                        <option value="28">Otros</option>
                                       
                                    </select>
                                                </div>


                                                  <!-- Qué estás Desarrollando o Fabricando? -->


                                                  <div class="row">
                                                <div class="col-12 col-lg-7">
                                               
                                                <div class="form-label">Qué estás Desarrollando o Fabricando?</div>
                                                
                                                <input class="input200 border-start-0 form-control ms-0" type="text" placeholder="Qué estás Desarrollando o Fabricando?">
                                             

                                                
                                          
                                                
                                                </div>

                                                <!-- A qué Sector Productivo Pertenece? -->
                                                <div class="col-md-6 mt-3">
                                                
                                              
                                                <div class="form-label">A qué Sector Productivo Pertenece?</div>
                                                <select class="form-select" aria-label="Default select example" data-placeholder="Choose one" id="" name="" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Agrícola</option>
                                        <option value="2">Industrial</option>
                                        <option value="3">Servicio</option>
                                        <option value="4">Pesquera</option>
                                        <option value="5">Comercial</option>
                                       
                                    </select>
                                                </div>

                                             
                                                <!-- ¿En Cuál de los Servicios Profesionales desea Incorporarse a Través de la Gran Misión Chamba Juvenil? -->

                                                <div class="col-md-8 mt-3">
                                               
                                                <div class="form-label">¿En Cuál de los Servicios Profesionales desea Incorporarse a Través de la Gran Misión Chamba Juvenil?</div>
                                                <select class="form-select" aria-label="Default select example" data-placeholder="Choose one" id="" name="" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Educación</option>
                                        <option value="2">Salud</option>
                                        <option value="3">Ingeniero</option>
                                        <option value="4">Arquitecto</option>
                                        <option value="5">Agrónomo</option>
                                        <option value="6">Veterinario</option>
                                        <option value="7">Construcción</option>
                                        <option value="8">Farmacéutico</option>
                                        <option value="9">Administrador</option>
                                        <option value="10">Economista</option>
                                        <option value="11">Contador Público</option>
                                        <option value="12">Estadístico</option>
                                        <option value="13">Sociólogo</option>
                                        <option value="14">Abogado</option>
                                        <option value="15">Informática y Tecnología</option>
                                        <option value="16">Comunicación y Medios</option>
                                        <option value="17">Arte y Diseño</option>
                                        <option value="18">Hotelería, Turismo y Gastronomía</option>
                                        <option value="19">Trabajador Social</option>
                                        <option value="20">Seguridad</option>
                                        <option value="21">Sector Petrolero</option>
                                        <option value="22">Energía Eléctrica</option>
                                        <option value="23">Carpinterí</option>
                                        <option value="24">Albañilería</option>
                                        <option value="25">Mecánica</option>
                                        <option value="26">Plomería</option>
                                        <option value="27">Electricista</option>
                                        <option value="28">Electrónica</option>
                                        <option value="29">Herrería</option>
                                        <option value="30">Comercio</option>
                                        <option value="31">Bancaria</option>
                                        <option value="32">Deporte, Cultura y Recreación</option>
                                        <option value="33">Otros</option>
                                       
                                    </select>
                                                </div>
                                            </div>
                                                </div>

                                          

                                            </div>



                                            <div class="col-md-12">
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
                                            </div>
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