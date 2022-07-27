

<body class="theme-cyan">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>


    <section class="container-fluid">
    <?php if(!isset($id_usuario)):?>
        <?php if($this->session->flashdata('mensajeexito')){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">  <?php echo $this->session->flashdata('mensajeexito'); ?></div>
        </div>
        </div>
        <?php }?>
     <?php  ?>
     <?php endif;?>


        
        <?php if(!isset($id_usuario)):?>
            <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                </div>
                </div>
                <br>
        <?php }?> 
     <?php  ?>
     <?php endif;?>
        
        <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                </div>
                </div>
                <br>
        <?php }?> 
           
               
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title">Formacion academica</div>
                            </div>


                            <form id="formacionacademica" method="POST" action="<?php if(!isset($id_usuario)){
                                         echo base_url()."Cchambistas/registroformacionacademica";
                                       
                                    }?>">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <b>Centro educativo:</b>
                                            

                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text"id="centro_educ" name="centro_educ" maxlength="255" required autofocus value="<?php if(isset($acausuario->centro_educ)) echo ucwords($acausuario->centro_educ);?>" placeholder="Centro educativo">
                            </div>
                                            </div>

                                            <div class="col-md-6 ">
                                                <b>Nivel de Estudios:</b>
                                                <div class="input-group">
                                                    <div class="wrap-input100 validate-input input-group">
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
                                        <div class="row clearfix">
                                            <div class="col-md-6 ">
                                                <b>Título / Carrera:</b>
                                              
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="titulo_carrera" name="titulo_carrera" maxlength="255" required autofocus value="<?php if(isset($acausuario->titulo_carrera)) echo ucwords($acausuario->titulo_carrera);?>" placeholder="Carrera">
                            </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                    <b>Área de Formación:</b><br>
                                                    <div class="input-group">
                                                        <div class="wrap-input100 validate-input input-group">
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
                                                <div class="col-md-6 ">
                                                   
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <b>Estado:</b><br>
                                                          <div class="row">
                                                               <div class="col-md-1">
                                                            
                                                               <input name="id_estado_inst" type="radio" id="estudio" value="1" <?php if(isset($acausuario->id_estado_inst)){ if(trim($acausuario->id_estado_inst)=='1'){echo 'checked';}}?> />
                                                             
                                                               </div>
                                                               <div class="col-1">
                                                               <label for="estudio">Culminado</label>
                                                               </div>
                                                                
                                                          </div>
                                                           
                                                          <div class="row">
                                                              <div class="col-md-1">
                                                              <input name="id_estado_inst" type="radio" id="estudio2" value="2" <?php if(isset($acausuario->id_estado_inst)){ if(trim($acausuario->id_estado_inst)=='2'){echo 'checked';}}?> />
                                                           
                                                              </div>
                                                              <div class="col-md-1">
                                                              <label for="estudio2">Cursando</label>
                                                              </div>
                                                          </div>
                                                            <input name="id_estado_inst" type="radio" id="estudio3" value="3" <?php if(isset($acausuario->id_estado_inst)){ if(trim($acausuario->id_estado_inst)=='3'){echo 'checked';}}?> />
                                                            <label for="estudio3">Abandonado / Aplazado</label><br>
                                                                                                                        
                                                        </div>
                                                    </div>
                                                </div>
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

                                            <div class="col-xs-6 ">
                                                <input type="hidden" id="id_usu_aca" name="id_usu_aca" value="<?php if(isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca));?>">
                                                <button class="btn btn-primary btn-block waves-effect" id="boton" type="botton">Guardar</button>
                                            </div>
                                        </div>                                        
                            </form>



                             <input type="hidden" name="id_usu_aca" id="id_usu_aca" value="<?php if(isset($id_usu_aca)){echo $id_usuario;}
                                ?>">         
                             <input type="hidden" name="id_usuario" id="id_usuario" value="<?php if(isset($id_usuario)){echo $id_usuario;}
                                ?>">         
               
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

