
<?php //phpinfo(); exit?>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader pl-size-xl">
                <div class="spinner-layer pl-purple">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere por favor...</p>
        </div>
    </div>
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


    <section class="content">
        <div class="container-fluid">

        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li><a href="<?php echo base_url();?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                <li class="active"><a href="<?php echo base_url();?>datospersonales"><i class="material-icons">library_books</i> Datos Personales</a></li>                
            </ol>
        </div>

        <?php if($this->session->flashdata('mensajeexito')){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">  <?php echo $this->session->flashdata('mensajeexito'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
        </div>
        </div>
        <?php }?>
        <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
                </div>
                <br>
        <?php }?> 
        <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
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
                                    <h2>Datos Personales</h2>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="">
                                
                                    <form id="datospersonales" method="POST" action="<?php echo base_url();?>Cchambistas/datospersonales">
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <b>Nombres</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="nombres" name="nombres" maxlength="30" required autofocus value="<?php if(isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres);?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Apellidos</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="30" required autofocus value="<?php if(isset($registroviejo->apellidos)) echo ucwords($registroviejo->apellidos);?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--row-->

                                        <div class="row clearfix">
                                    <!--   <div class="col-md-6">
                                            <b>Nacionalidad</b>
                                                <div class="input-group">
                                                    <div class="form-line">                                            
                                                        <select class="form-control show-tick" id="nac" name="nac">
                                                        <option value="">Nacionalidad</option>
                                                        <option <?php if(isset($registroviejo->cedula)){ if($registroviejo->cedula[0]=='V'){echo 'selected';}}?> value="V">Venezolano(a)</option>
                                                        <option <?php if(isset($registroviejo->cedula)){ if($registroviejo->cedula[0]=='E'){echo 'selected';}}?> value="E">Extranjero(a)</option>
                                                        
                                                        
                                                        </select>
                                                    </div>
                                                    
                                                </div>                                                
                                            </div>
                                            <div class="col-md-6">
                                                <b>Cédula</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="8" required autofocus value="<?php if(isset($registroviejo->cedula)) echo substr($registroviejo->cedula,1);?>">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div><!--row-->

                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <b>F. Nacimiento</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="date" class="datepicker form-control" id="datepicker" name="datepicker" required autofocus value="<?php if(isset($registroviejo->fecha_nac)) echo $registroviejo->fecha_nac;?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <b>Estado Civil</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="estcivil" name="estcivil">
                                                            <option value="">Seleccione una opción</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='casado'){echo 'selected';}}?> value="casado">Casado(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='soltero'){echo 'selected';}}?> value="soltero">Soltero(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='concubino'){echo 'selected';}}?> value="concubino">Concubino(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='viudo'){echo 'selected';}}?> value="viudo">Viudo(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='divorciado'){echo 'selected';}}?> value="divorciado">Divorciado(A)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                             
                                            </div>                                            
                                            <!--<div class="col-md-6">
                                                <b>Correo</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="correo" name="correo" maxlength="50" required autofocus value="<?php if(isset($registroviejo->correo)) echo $registroviejo->correo;?>">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div><!--row-->

                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <b>Telf Móvil</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="telf_movil" name="telf_movil" maxlength="11" required autofocus value="<?php if(isset($registroviejo->telf_cel)) echo $registroviejo->telf_cel;?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <b>Telf Local</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="telf_local" name="telf_local" maxlength="11" required autofocus value="<?php if(isset($registroviejo->telf_local)) echo $registroviejo->telf_local;?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!--row-->

                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <b>Estado</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="cod_estado" name="cod_estado">
                                                        <option value="">Seleccione una opción</option>
                                                    <?php
                                                        if(isset($estados)){
                                                            foreach ($estados as $key => $estado) {
                                                                if(isset($registroviejo->codigoestado) and $registroviejo->codigoestado == $estado->codigoestado){
                                                                    echo "<option selected value='".$estado->codigoestado."'>".$estado->nombre."</option>";     
                                                                }else{
                                                                    echo "<option value='".$estado->codigoestado."'>".$estado->nombre."</option>";
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                        </select>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <b>Municipio</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="cod_municipio" name="cod_municipio">
                                                        <option value="">Seleccione un Municipio</option>
                                                        <?php
                                                            if(isset($registroviejo->municipio)){
                                                                echo "<option selected value='".$registroviejo->codigomunicipio."'>".$registroviejo->municipio."</option>";     
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <?php
                                                        if(isset($registroviejo->estado)){
                                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                                        }
                                                    ?>                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <b>Parroquia</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="cod_parroquia" name="cod_parroquia">
                                                        <option value="">Seleccione una Parroquia</option>
                                                        <?php
                                                            if(isset($registroviejo->parroquia)){
                                                                echo "<option selected value='".$registroviejo->codigoparroquia."'>".$registroviejo->parroquia."</option>";     
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <?php
                                                        if(isset($registroviejo->estado)){
                                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                                        }
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div><!--row-->
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <b>Dirección Especifica</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                    <textarea maxlength="255" rows="4" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="250" placeholder="Por favor indica donde resides..."><?php if(isset($registroviejo->direccion)) echo $registroviejo->direccion;?></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row clearfix">   
                                            <div class="col-md-4">
                                                <b>Comunidad Aborigen</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="aborigen" name="aborigen">
                                                        <option value="">Seleccione una opción</option>
                                                    <?php
                                                        if(isset($aborigenes)){
                                                            foreach ($aborigenes as $key => $aborigen) {
                                                                if($aborigen->id_aborigen==$registroviejo->aborigen){
                                                                    echo "<option selected value='".$aborigen->id_aborigen."'>".$aborigen->nombre."</option>";
                                                                }else{
                                                                    echo "<option value='".$aborigen->id_aborigen."'>".$aborigen->nombre."</option>";                                                                    
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                            <b>Cantidad de hijos</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="hijo" name="hijo">
                                                    <?php
                                                        for ($i=0; $i < 16; $i++) { 
                                                            if($i==$registroviejo->hijo){
                                                                if($i==0){
                                                                    echo "<option selected value='".$i."'>--Ninguno--</option>";
                                                                }else{
                                                                    echo "<option selected value='".$i."'>".$i."</option>"; 
                                                                }
                                                            }else{
                                                                echo "<option value='".$i."'>".$i."</option>";                                                                    
                                                            }
                                                        }
                                                        
                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                            <b>Situación actual empleo</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="empleo" name="empleo">
                                                                <option value="">Seleccione una opción</option>
                                                                <option <?php if(isset($registroviejo->empleo) and $registroviejo->empleo=='no-tengo-empleo') echo "selected";?> value="no-tengo-empleo">No tengo empleo</option>
                                                                <option <?php if(isset($registroviejo->empleo) and $registroviejo->empleo=='buscando-empleo') echo "selected";?> value="buscando-empleo">Estoy buscando trabajo</option>
                                                                <option <?php if(isset($registroviejo->empleo) and $registroviejo->empleo=='estoy-trabajando') echo "selected";?> value="estoy-trabajando">Estoy Trabajando actualmente</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row clearfix zindex">
                                                <div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4">
                                                    <b>¿Se encuentra Estudiando?</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="estudio" type="radio" id="estudio" value="si" <?php if(isset($registroviejo->estudio)){ if(trim($registroviejo->estudio)=='si'){echo 'checked';}}?> />
                                                            <label for="estudio">Si</label>
                                                            <input name="estudio" type="radio" id="estudio2" value="no" <?php if(isset($registroviejo->estudio)){ if(trim($registroviejo->estudio)=='no'){echo 'checked';}}?> />
                                                            <label for="estudio2">No</label><br>
                                                        </div>
                                                    </div>

                                                    <!--<b>¿Se encuentra Desempleado?</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="desempleado" type="radio" id="desempleado" value="si" <?php if(isset($registroviejo->desempleado)){ if(trim($registroviejo->desempleado)=='si'){echo 'checked';}}?> />
                                                            <label for="desempleado">Si</label>
                                                            <input name="desempleado" type="radio" id="desempleado2" value="no" <?php if(isset($registroviejo->desempleado)){ if(trim($registroviejo->desempleado)=='no'){echo 'checked';}}?> />
                                                            <label for="desempleado2">No</label><br>
                                                        </div>
                                                    </div> -->

                                                    <b>¿Se encuentra inscrito en el CNE?</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="cne" type="radio" id="cne" value="si" <?php if(isset($registroviejo->cne)){ if(trim($registroviejo->cne)=='si'){echo 'checked';}}?> />
                                                            <label for="cne">Si</label>
                                                            <input name="cne" type="radio" id="cne2" value="no" <?php if(isset($registroviejo->cne)){ if(trim($registroviejo->cne)=='no'){echo 'checked';}}?>/>
                                                            <label for="cne2">No</label><br>
                                                        </div>
                                                    </div>

                                                    <b>Género</b><br>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="genero" type="radio" id="genero" value="F" <?php if(isset($registroviejo->genero)){ if(trim($registroviejo->genero)=='F'){echo 'checked';}}?>/>
                                                            <label for="genero">Femenino</label>
                                                            <input name="genero" type="radio" id="genero2" value="M" <?php if(isset($registroviejo->genero)){ if(trim($registroviejo->genero)=='M'){echo 'checked';}}?>/>
                                                            <label for="genero2">Masculino</label><br>
                                                        </div>
                                                    </div>
                                               
                                                </div>
                                            </div>
                                        </div><!--row-->
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

                                            <div class="col-xs-6 col-xs-offset-3 col-md-offset-3">
                                                <button class="btn btn-block bg-green waves-effect" id="boton" type="botton">Guardar</button>
                                            </div>
                                        </div>

                                    </form>                       
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

    <script src="<?php echo base_url();?>js/pages/examples/datospersonales.js"></script>


    <script>
        $('#estcivil').change(function(){
           /*  $('#guevo').html('<option value="1">1</option><option value="2">2</option>'); */
           //console.log($("#guevo").selectpicker('val','<option value="1">1</option><option value="2">2</option>'));
           
           $("#guevo").html('<option value="1">1</option><option value="2">2</option>');
           $("#guevo").selectpicker('refresh');
        });

        $("#cod_estado").change(function(){
            buscarMunicipios();
        });
        $("#cod_municipio").change(function(){
            buscarParroquia();
        });

    function buscarMunicipios() {
    var estado = $("#cod_estado").val();
    
    if (estado == "") {
        $("#cod_municipio").html('<option value="">Debe seleccionar un Estado por favor</option>');
    }
    else {
        $.ajax({
            dataType: "json",
            data: {"codigoestado": estado},
            url: base_url+"Cchambistas/getMunicipios",
            type: "post",
            beforeSend: function () {
                $("#cod_municipio").html('<option>cargando municipios...</option>');
                $("#cod_municipio").selectpicker('refresh');
            },
            success: function (respuesta1) {

                $("#cod_municipio").html(respuesta1.htmloption1);
                $("#cod_municipio").selectpicker('refresh');
            },
            error: function (xhr, err) {
                alert("readyState =" + xhr.readyState + " estado =" + xhr.status + "respuesta =" + xhr.responseText);
            	//alert("ocurrio un error intente de nuevo");
            }
        });
    }

}

function buscarParroquia() {
    var municipio = $("#cod_municipio").val();
    var estado = $("#cod_estado").val();

    if (municipio == "") {
        $("#cod_parroquia").html('<option value="">Debe seleccionar un Municipio por favor</option>');
    }
    else {
        $.ajax({
            dataType: "json",
            data: {"codigomunicipio": municipio,"codigoestado": estado},
            url: base_url+"Cchambistas/getParroquias",
            type: "post",
            beforeSend: function () {
                $("#cod_parroquia").html('<option>cargando parroquias...</option>');
                $("#cod_parroquia").selectpicker('refresh');
            },
            success: function (respuesta2) {
                $("#cod_parroquia").html(respuesta2.htmloption2);
                $("#cod_parroquia").selectpicker('refresh');
            },
            error: function (xhr, err) {
                alert("readyState =" + xhr.readyState + " estado =" + xhr.status + "respuesta =" + xhr.responseText);
            	//alert("ocurrio un error intente de nuevo");
            }
        });
    }
}

$('.datepicker').bootstrapMaterialDatePicker({
    format: 'YYYY-MM-DD',
    locale: 'es',
    time: false,
    maxDate: moment(),
    language: 'es',
    defaultDate:'2000-06-01'
});


    </script>

</body>

</html>
