

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
                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Inicio</a></li>
                <li class="active"><i class="material-icons">library_books</i> Inserción</li>
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
                                    <h2>Inserción</h2>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!-- <div class="alert alert-success" style="color: #000!important; background-color: #b5bbc8 !important;">  </div> -->
                                    </div>
                                </div>   

<!--                             <form id="formacionacademica" method="POST" action="<?php echo base_url();?>Cchambistas/registroformacionacademica">

                                        <div class="row clearfix zindex">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <b>Situación actual empleo</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <select class="form-control select2" id="empleo" name="empleo">
                                                                <option value="">Seleccione una opción</option>
                                                                <option value="no-tengo-empleo">No tengo empleo</option>
                                                                <option value="buscando-empleo">Estoy buscando trabajo</option>
                                                                <option value="estoy-trabajando">Estoy Trabajando actualmente</option>
                                                            </select>                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                     
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-md-offset-3">
                                                <b>Puesto de trabajo deseado</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="nombres" name="nombres" maxlength="30" required autofocus value="<?php if(isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres);?>">
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

                                            <div class="col-xs-6 col-md-offset-3">
                                                <input type="hidden" id="id_usu_aca" name="id_usu_aca" value="<?php if(isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca));?>">
                                                <button class="btn btn-block bg-green waves-effect" id="boton" type="botton">Guardar</button>
                                            </div>
                                        </div>                                        
                            </form> -->
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