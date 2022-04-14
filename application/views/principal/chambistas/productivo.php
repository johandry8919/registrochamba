


    <section class="container">
        <div class="body">

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
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h2>Productivo</h2>
                                </div>
                                
                            </div>
                        </div>    
                        <div class="body">    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning"> <strong>Importante:</strong> Solo puedes seleccionar una opción </div>
                                </div>
                            </div>
                            <?php 
                            if(isset($usuarioproductivo)){
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
                                            /* var_dump($usuarioacademico); */
                                            if(isset($usuarioproductivo) and $usuarioproductivo!=""){
                                                    echo '<tr>';
                                                        /* echo '<th scope="row">1</th>'; */
                                                        echo '<td>'.$usuarioproductivo->nombre_chamba.'</td>';
                                                        echo '<td>';

                                                            echo '<a href="'.base_url().'eliminarchamba/'.$usuarioproductivo->id_chamba.'"><i class="material-icons">close</i></a>';
                                                        echo '</td>';
                                                    echo '</tr>'; 
                                    
                                            }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>   
                            <?php } ?>     

                            <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registroproductivo">

                                <div class="row ">
                                    <div class="col-md-6 col-md-offset-3">
                                        <b>¿En cuál Chamba deseas incorporarte?</b><br>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="tipo_chamba" name="tipo_chamba" required>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="vuelta-al-campo" class="ocultarMostrar">

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Dispone de terreno para la siembra?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="terreno_siembra" name="terreno_siembra">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Actualmente estas sembrando?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="sembrando" name="sembrando">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>Indica que rubrio produces</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--row-->

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Requiere Financiamiento?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="financiamiento" name="financiamiento">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="pesquera-y-acuicola" class="ocultarMostrar">

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Eres inspector?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="pesquera_inspector_pescador" name="pesquera_inspector_pescador">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Eres pescador?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="pesquera_pescador" name="pesquera_pescador">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Requieres refrigeración?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="pesquera_refrigeracion" name="pesquera_refrigeracion">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Requiere Financiamiento?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="pesquera_financiamiento" name="pesquera_financiamiento">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="emprender-innovar" class="ocultarMostrar">

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Tienes un emprendimiento?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="emprendimiento" name="emprendimiento">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>Deseas iniciar un emprendimiento?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="iniciar_emprendimiento" name="iniciar_emprendimiento">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Estas registrado como empresa?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="emprendimiento_empresa" name="emprendimiento_empresa">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Requiere Financiamiento?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="financiamiento-emprendimiento" name="financiamiento-emprendimiento">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="agrourbana" class="ocultarMostrar">

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Dispones de Espacios o Terrenos?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="agrourbana-terrenos" name="agrourbana-terrenos">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>Deseas activar patio productivo?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="agrourbana-patio" name="agrourbana-patio">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>Indica tu produccion de ciclos cortos</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="agrourbana-rubro" name="agrourbana-rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6 col-md-offset-3">
                                            <b>¿Requiere Financiamiento?</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="financiamiento-agrourbana" name="financiamiento-agrourbana">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
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
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>
        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>


    
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
        $('#reservation').daterangepicker()


        $('#reservation').daterangepicker({
            ranges: {},
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: "Aceptar",
                customRangeLabel: "Fecha Inicio - Final",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
            }
        })

        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            time: false,
            maxDate: moment(),
            language: 'es',
            defaultDate: '2000-06-01'
        });

        $('#start').bootstrapMaterialDatePicker({
            changeYear: true,
            changeMonth: true,
            changeDays: false,
            format: 'MM-YY',
            showButtonPanel: false,
            time: false,
            maxDate: moment(),
            onClose: function(selectedDate) {
                $("#end").bootstrapMaterialDatePicker("option", "maxDate", selectedDate);
            }
        });

        $('#end').bootstrapMaterialDatePicker({
            format: 'MM-YY',
            dayViewHeaderFormat: 'MMMM YYYY',
            viewMode: 'month',
            time: false,
            maxDate: moment(),
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 3,
            onClose: function(selectedDate) {
                $("#start").bootstrapMaterialDatePicker("option", "minDate", selectedDate);
            }
        });


        $("#tipo_chamba").on('change', function() {
            let vuelta = document.getElementById('vuelta-al-campo');
            let pesquera = document.getElementById('pesquera-y-acuicola');
            let emprender = document.getElementById('emprender-innovar');
            let agrourbana = document.getElementById('agrourbana');
            //let minera = document.getElementById('minera');
            //let digital = document.getElementById('digital');
            //let tecnica = document.getElementById('tecnica-oficios');
            //let delivery = document.getElementById('delivery');

            vuelta.classList.add("ocultarMostrar"); //remove 
            pesquera.classList.add("ocultarMostrar"); //remove
            emprender.classList.add("ocultarMostrar"); //remove
            agrourbana.classList.add("ocultarMostrar"); //remove
            //minera.classList.add("ocultarMostrar"); //remove
            //digital.classList.add("ocultarMostrar"); //remove
            //tecnica.classList.add("ocultarMostrar"); //remove
            //delivery.classList.add("ocultarMostrar"); //remove

            if (this.value == '0') {//pesquera-y-acuicola

                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);

            }else if (this.value == '1') {//vuelta-al-campo

                vuelta.classList.toggle("ocultarMostrar");
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
                $('#vuelta-al-campo :input').attr('disabled', false);

            }else if (this.value == '2') {//pesquera-y-acuicola

                pesquera.classList.toggle("ocultarMostrar");
                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', false);

            }else if (this.value == '3') {//emprender-innovar

                emprender.classList.toggle("ocultarMostrar");
                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', false);

            }else if (this.value == '4') {//minera

                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
                
            }else if (this.value == '5') {//digital

                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
            
            }else if (this.value == '6') {//agrourbana

                agrourbana.classList.toggle("ocultarMostrar");
                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', false);
            
            }else if (this.value == '7') {//tecnica-oficios

                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);

            }else if (this.value == '8') {//delivery

                $('#vuelta-al-campo :input').attr('disabled', true);
                $('#pesquera-y-acuicola :input').attr('disabled', true);
                $('#emprender-innovar :input').attr('disabled', true);
                $('#agrourbana :input').attr('disabled', true);
            }


        });
    </script>

