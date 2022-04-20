
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
        display: none;
    }
    </style>

    <section class="content">
        <div class="container-fluid">

        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="<?php echo base_url();?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                <li class="active"><a href="<?php echo base_url();?>experiencialaboral"><i class="material-icons">library_books</i> Experencia Laboral</a></li>                
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
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                </div>
                </div>
                <br>
        <?php }?> 
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h2>Experiencia Laboral</h2>
                                </div>
                            </div>
                        </div>    
                        <div class="body">                              
                            <form id="experiencialaboral" method="POST" action="<?php echo base_url();?>Cchambistas/registroexperiencialaboral">
                                        <div class="row clearfix">            
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                    <input type="checkbox" id="exp_lab" name="exp_lab" value="1">
                                                    <label for="exp_lab">Marca esta opción sino tienes ninguna Experiencia Laboral</label>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Empresa:</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="empresa" name="empresa" maxlength="100" required autofocus value="<?php if(isset($expusuario->empresa)) echo ucwords($expusuario->empresa);?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Cargo:</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="cargo" name="cargo" maxlength="50" required autofocus value="<?php if(isset($expusuario->cargo)) echo ucwords($expusuario->cargo);?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix zindex">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Sector de la empresa:</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="area" name="area">
                                                            <option value="">Seleccione una opción</option>
                
                                                            
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='1'){ echo 'selected';}?> value="1">Agricultura / Pesca / Ganadería</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='2'){ echo 'selected';}?> value="2">Construcción / obras</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='3'){ echo 'selected';}?> value="3">Educación</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='4'){ echo 'selected';}?> value="4">Energía</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='5'){ echo 'selected';}?> value="5">Entretenimiento / Deportes</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='6'){ echo 'selected';}?> value="6">Fabricación</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='7'){ echo 'selected';}?> value="7">Finanzas / Banca</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='8'){ echo 'selected';}?> value="8">Gobierno / Público</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='9'){ echo 'selected';}?> value="9">Hostelería / Turismo</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='10'){ echo 'selected';}?> value="10">Informática / Hardware</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='11'){ echo 'selected';}?> value="11">Informática / Software</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='12'){ echo 'selected';}?> value="12">Internet</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='13'){ echo 'selected';}?> value="13">Legal / Asesoría</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='14'){ echo 'selected';}?> value="14">Materias Primas</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='15'){ echo 'selected';}?> value="15">Medios de Comunicación</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='16'){ echo 'selected';}?> value="16">Publicidad / RRPP</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='17'){ echo 'selected';}?> value="17">RRHH / Personal</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='18'){ echo 'selected';}?> value="18">Salud / Medicina</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='19'){ echo 'selected';}?> value="19">Servicios Profesionales</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='20'){ echo 'selected';}?> value="20">Telecomunicaciones</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='21'){ echo 'selected';}?> value="21">Transporte</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='22'){ echo 'selected';}?> value="22">Venta al consumidor</option>
                                                            <option <?php if(isset($expusuario->area) and $expusuario->area=='23'){ echo 'selected';}?> value="23">Venta al por mayor</option>
                                                        </select>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>     

                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Funciones y logros del cargo</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize zindex" name="funciones" id="funciones" maxlength="255" placeholder="" aria-required="true" aria-invalid="false"><?php if(isset($expusuario->funciones)) echo trim(ucwords($expusuario->funciones));?></textarea>
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
                                                        <input type="text" class="form-control pull-right" id="reservation" name="rango_fecha" value="<?php if(isset($expusuario->rango_fecha)) echo $expusuario->rango_fecha;?>">
                                                        </div>
                                                        <!-- /.input group -->
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

                                            <div class="col-xs-6 col-md-offset-3">
                                                <input type="hidden" id="id__exp_lab" name="id__exp_lab" value="<?php if(isset($expusuario->id__exp_lab)) echo trim(ucwords($expusuario->id__exp_lab));?>">
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

    <script src="<?php echo base_url();?>js/pages/examples/experiencialaboral.js"></script>
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