

<body class="theme-cyan">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>

    <?php include('nav.php');?>

    <?php include('sidebar.php');?>

    <style>
        .dtp-picker-calendar, .dtp-actual-num {
        display: none;}
        .select2-container--default .select2-selection--single {
            border: 0 !important;
            border-bottom: 2px solid #1f91f3 !important;
        }
    </style>

    <section class="content">
        <div class="container-fluid">

        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="<?php echo base_url();?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                <li class="active"><a href="<?php echo base_url();?>formacionacademica"><i class="material-icons">library_books</i> Formación Académica</a></li> 
            </ol>
        </div>

        <?php if($this->session->flashdata('mensajeexito')){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">  <?php echo $this->session->flashdata('mensajeexito'); ?></div>
        </div>
        </div>
        <?php }?>
        <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                </div>
                </div>
                <br>
        <?php }?> 
        <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                </div>
                </div>
                <br>
        <?php }?> 
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Formación Académica</h2>
                                </div>
                            </div>
                            <form id="formacionacademica" method="POST" action="<?php echo base_url();?>Cchambistas/registroformacionacademica">
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Centro educativo:</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="centro_educ" name="centro_educ" maxlength="255" required autofocus value="<?php if(isset($acausuario->centro_educ)) echo ucwords($acausuario->centro_educ);?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Título / Carrera:</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="titulo_carrera" name="titulo_carrera" maxlength="255" required autofocus value="<?php if(isset($acausuario->titulo_carrera)) echo ucwords($acausuario->titulo_carrera);?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Nivel de Estudios:</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="id_instruccion" name="id_instruccion">
                                                            <option value="">Seleccione una opción</option>
                                                            <!-- <option selected value='1'>Educación Básica Primaria</option>  -->
                                                            <option <?php if(isset($acausuario->id_instruccion) and $acausuario->id_instruccion=='1'){ echo 'selected';}?> value='1'>Educación Básica Primaria</option>
                                                            <option <?php if(isset($acausuario->id_instruccion) and $acausuario->id_instruccion=='2'){ echo 'selected';}?> value='2'>Educación Básica Secundaria</option>
                                                            <option <?php if(isset($acausuario->id_instruccion) and $acausuario->id_instruccion=='3'){ echo 'selected';}?> value='3'>Bachillerato / Educación Media</option>
                                                            <option <?php if(isset($acausuario->id_instruccion) and $acausuario->id_instruccion=='4'){ echo 'selected';}?> value='4'>Educación Técnico/Profesional</option>
                                                            <option <?php if(isset($acausuario->id_instruccion) and $acausuario->id_instruccion=='5'){ echo 'selected';}?> value='5'>Universidad</option>
                                                            <option <?php if(isset($acausuario->id_instruccion) and $acausuario->id_instruccion=='1'){ echo 'selected';}?> value='6'>Postgrado</option>
                                                        </select>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix zindex">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <b>Área de Formación:</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <select class="form-control select2" id="id_area_form" name="id_area_form">
                                                                <option value="">Seleccione una opción</option>
                                                                <?php
                                                                        foreach ($areaform as $key => $value) {
                                                                            if($value->id_area_form == $acausuario->id_area_form){
                                                                                echo "<option selected value='".$value->id_area_form."'>$value->nombre</option>";
                                                                            }else{
                                                                                echo "<option value='".$value->id_area_form."'>$value->nombre</option>";
                                                                            }
                                                                            
                                                                        }
                                                                ?>
                                                            </select>                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row clearfix zindex">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <b>Estado:</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="id_estado_inst" type="radio" id="estudio" value="1" <?php if(isset($acausuario->id_estado_inst)){ if(trim($acausuario->id_estado_inst)=='1'){echo 'checked';}}?> />
                                                            <label for="estudio">Culminado</label>
                                                            <input name="id_estado_inst" type="radio" id="estudio2" value="2" <?php if(isset($acausuario->id_estado_inst)){ if(trim($acausuario->id_estado_inst)=='2'){echo 'checked';}}?> />
                                                            <label for="estudio2">Cursando</label>
                                                            <input name="id_estado_inst" type="radio" id="estudio3" value="3" <?php if(isset($acausuario->id_estado_inst)){ if(trim($acausuario->id_estado_inst)=='3'){echo 'checked';}}?> />
                                                            <label for="estudio3">Abandonado / Aplazado</label><br>
                                                                                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row clearfix zindex">
                                            <div class="col-md-6 col-md-offset-3">
                                                    <div class="form-group">
                                                        <label>Rango Fecha:</label>

                                                        <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="reservation" name="rango_fecha" value="<?php if(isset($acausuario->rango_fecha)) echo $acausuario->rango_fecha;?>">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                            </div>
                                        </div>
<!--
                                        <div class="row clearfix zindex">
                                            <div class="col-md-6 col-md-offset-3">
                                                <h2 class="card-inside-title">Periodo:</h2>
                                                <div class="input-daterange input-group" id="bs_datepicker_range_container" style="z-index: 1 !important;">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Inicio" id="start" name="start" value="<?php if(isset($acausuario->start)) echo trim(ucwords($acausuario->start));?>">
                                                    </div>
                                                    <span class="input-group-addon">-</span>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Fin" id="end" name="end" value="<?php if(isset($acausuario->end)) echo trim(ucwords($acausuario->end));?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
-->
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

                                            <div class="col-xs-6 col-md-offset-3">
                                                <input type="hidden" id="id_usu_aca" name="id_usu_aca" value="<?php if(isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca));?>">
                                                <button class="btn btn-block bg-green waves-effect" id="boton" type="botton">Guardar</button>
                                            </div>
                                        </div>                                        
                            </form>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="">
                                
                     
                            </div>

                        
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </section>
    <script type="text/javascript"> var base_url = "<?php echo base_url();?>";</script>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
        <script src="<?php echo base_url();?>plugins/momentjs/moment.js"></script>
        <script src="<?php echo base_url();?>plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url();?>plugins/bootstrap-select/js/bootstrap-select.js"></script>     
    <script src="<?php echo base_url();?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
    <script src="<?php echo base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>       

    <script src="<?php echo base_url();?>js/admin.js"></script> 
    <script src="<?php echo base_url();?>js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
<!--     <script src="<?php echo base_url();?>js/demo.js"></script> -->

    <script src="<?php echo base_url();?>plugins/jquery-validation/jquery.validate.js"></script>
    
    <script src="<?php echo base_url();?>plugins/jquery-validation/localization/messages_es.js"></script>

    <script src="<?php echo base_url();?>js/pages/examples/formacionacademica.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url();?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>

    //Initialize Select2 Elements
    $('.select2').select2()
    $('#reservation').daterangepicker()


    $('#reservation').daterangepicker(
      {
        ranges   : {
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment(),
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
      }
    )

$('.datepicker').bootstrapMaterialDatePicker({
    format: 'YYYY-MM-DD',
    time: false,
    maxDate: moment(),
    language: 'es',
    defaultDate:'2000-06-01'
});

$('#start').bootstrapMaterialDatePicker({
    changeYear: true,    
    changeMonth: true,
    changeDays: false,
    format: 'MM-YY',
    showButtonPanel: false,
    time: false,
    maxDate: moment(),
    onClose: function( selectedDate ) {
        $( "#end" ).bootstrapMaterialDatePicker( "option", "maxDate", selectedDate );
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
    onClose: function( selectedDate ) {
    $( "#start" ).bootstrapMaterialDatePicker( "option", "minDate", selectedDate );
    }    
}); 

    </script>

</body>

</html>