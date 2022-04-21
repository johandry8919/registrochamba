
<?php      ?>


  
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<section class="content">
    <div class="container-fluid">

  

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
                    <div class="card-header">
                        <div class="row clearfix">
                            <div class="card-title">ESTRUCTURA</div>

                              
                            </div>
                        </div>

             
                    <div class="card-body">
                        <div id="real_time_chart" class="">
                            
                                <form ">
                                    <div class="row ">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label">Nombre</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30"  name="nombres" value="" placeholder="Ingrese su Nombre" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

                                        </div><!--col-->

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label">Apellidos</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos" maxlength="30"  name="apellidos" value="" placeholder="Ingreses sus Apellidos" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

                                        </div><!--col-->

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label">Cédula de Identidad</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos" maxlength="30"  name="apellidos" value="" placeholder="Cédula de Identidad" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

    </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label">Nivel Académico</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-mortar-board" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-mortar-board" aria-label="fa fa-mortar-board"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="" maxlength="30"  name="" value="" placeholder="Nivel Académico" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

    </div>
                                    
                                    </div><!--row-->

                            
                                    </div><!--row-->

                                  
                                    <div class="row ">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label class="form-label">Telf Móvil</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="fe fe-phone" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11"  name="telf_movil" value="" placeholder="Ingrese su telefono" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

                                        </div><!--col-->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label class="form-label">Teléfono Coorporativo (Si Posee)</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="fe fe-phone-call" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local" maxlength="30"  name="telf_local" value="<?php if(isset($registroviejo->telf_local)) echo ucwords($registroviejo->telf_local);?>" placeholder="Telefono Local" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

                                        </div><!--col-->
                                        <div class="col-md-4">
                                            <label  class="form-label">Correo</label>
                                            <div class="form-group">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email">
                            </div>
    </div>
                                                
                                             
                                        </div>
                                        
                                    

                                    
                                    </div><!--row-->
                                    <div class="row ">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label class="form-label">Fecha de Nacimiento</label> 
                                                <div class="wrap-input100 validate-input input-group" >
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="fe fe-calendar" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="date" id="datepicker"   name="datepicker" value="" placeholder="F. Nacimiento" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                                  
                                            

                                        </div><!--col-->

                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Edad</label> 
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-calendar" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="edad" maxlength="2"  name="edad" value="" placeholder="edad" required autofocus>
                                               
                                            </div>
    
                                        </div>
                                    </div><!--col-->
                                    <div class="col-md-4">
                                    <div class="form-group">
                                                <label class="form-label">Profesión u Oficio *</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-ship" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-ship" aria-label="fa fa-ship"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="" maxlength="30"  name="" value="" placeholder="Nivel Académico" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                    </div><!--col-->


                                  

                           
                                 
                                    <div class="row ">   
                                    <div class="col-md-4">
                                    <div class="form-group">
                                                <label class="form-label">Talla de Pantalón *</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="" maxlength="30"  name="" value="" placeholder="Talla de Pantalón" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                    </div><!--col-->
                                   
                                       
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <label class="form-label">Talla de Camisa*</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" 
                                                    type="text" id="" maxlength="5"  
                                                    name="" 
                                                    value="" 
                                                    placeholder="Talla de Camisa" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                          
                                            
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <label class="form-label">Nº de Calzado</label> 
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" 
                                                    type="number" id="" maxlength="5"  
                                                    name="" 
                                                    value="" 
                                                    placeholder="Nº de Calzado" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                          
                                            
                                        </div>
                                    
                                  
                                  

                                       
                                    </div><!--row-->
                                                          
                                    <div class="row ">
                                    <div class="col-md-4">
                                            <label  class="form-label">Estado</label>
                                            <div class="form-group">
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

                                    <div class="col-md-12">
                                                <label  class="form-label">Si pertenece a la Estructura Municipal, Indicar ¿A que Municipio Pertenece?</label>
                                                <div class="form-group">
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

                                            <div class="col-md-12">
                                                <label  class="form-label">Si pertenece a la Estructura Parroquial, Indicar ¿A que Parroquia Pertenece?</label>
                                                <div class="form-group">
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
                                    <div class="col-md-12">
                                        <label  class="form-label">¿responsabilidad que desempeña dentro de su estructura ?</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="movimiento_sociales" name="movimiento_sociales">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="0">Responsable Estadal de la Gran Misión Chamba Juvenil Saber y Trabajo</option>
                                                        <option value="0">Responsable de Sala de la Gran Misión Chamba Juvenil Saber y Trabajo</option>
                                                        <option value="0">Responsable Municipal de la GMCJSYT</option>
                                                        <option value="0">Responsable Parroquial de la GMCJSYT</option>
                                                        <option value="0">Responsable Vertice 1 ( Registro y Actualizacion de Datos)</option>
                                                        <option value="0">Responsable Vértice 2 (Organizativo - Brigadas)</option>
                                                        <option value="0">Responsable Vértice 3 (Formación)</option>
                                                        <option value="0">Responsable Vértice 4 (Inserción Laboral)</option>
                                                        <option value="0">Responsable Vértice 5 (Productivo - Emprendimiento)</option>
                                                        <option value="0">Estructura Parroquial (Brigadista)</option>
                                                        <option value="0">Responsable Vértice 6 (En lo Social -Vivienda)</option>
                                                        <option value="0">Responsable Vértice 7 (Debate Nacional de Ley)</option>
                                                        <option value="0">Responsable Vértice 8 (Comunicacional).</option>
                                                     

                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6 align-items-end">
                                            <label  class="form-label">¿A que estructura Pertenece?</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="id_movimiento_religioso" name="id_movimiento_religioso">
                                                    <option value="">Seleccione una opción</option>
                                                    <option value="1">Estructura Estadal</option>
                                                    <option value="2">Estructura Municipal</option>
                                                    <option value="3">Estructura Parroquial</option>
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                     
                                  

                                       
                                    </div><!--row-->
                        

                                 
                            
                        <div class="row justify-content-center "> 
                        <div class="col-md-8 justify-content-center">
                                    <div class="small">Seleccione en el mapa su ubicación exacta</div>
                                    <div id="map"></div>
                             
                                    <pre id="coordinates" class="coordinates"></pre>
                                </div>
                                
                        <div class="col-md-8">
                        <div class="form-group">
                                        <label class="form-label">Latitud</label> 
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-map" aria-hidden="true"></i>
                                            </a>
                                            <input readonly  class="input100 border-start-0 ms-0 form-control" type="text" id="latitud"   name="latitud" value="<?php if(isset($registroviejo->latitud)) echo ucwords($registroviejo->latitud);?>" placeholder="latitud" required autofocus>
                                           
                                        </div>

                                    </div>
                                          
                                    

                                    <div class="form-group">
                                        <label class="form-label">Longitud</label> 
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-map" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud"   name="longitud" value="<?php if(isset($registroviejo->longitud)) echo ucwords($registroviejo->longitud);?>" placeholder="longitud" required autofocus>
                                           
                                        </div>

                                    </div>
                            
                        </div>
                      

                        

                              
                                
                            </div>
                          
  
                        </div>
                                             
                                    <div class="row  justify-content-center  mt-2">
                                        <div class="col-md-12 ">
                                            <button class="btn btn-primary btn-block" id="boton" type="botton">Guardar</button>
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