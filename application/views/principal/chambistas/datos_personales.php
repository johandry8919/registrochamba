
<?php      ?>


  
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->


    
<!--script src="https://unpkg.com/maplibre-gl@2.1.9/dist/maplibre-gl.js"></script>
<link href="https://unpkg.com/maplibre-gl@2.1.9/dist/maplibre-gl.css" rel="stylesheet" /-->
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
                        		<div class="card-title">Datos Personales</div>

                                  
                                </div>
                            </div>

                 
                        <div class="card-body">
                            <div id="real_time_chart" class="">
                                
                                    <form id="datospersonales" method="POST" action="<?php echo base_url();?>Cchambistas/datospersonales">
                                        <div class="row ">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="form-label">Nombre</label> 
                                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                            <i class="mdi mdi-account" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30"  name="nombres" value="<?php if(isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres);?>" placeholder="Ingrese su Nombre" required autofocus>
                                                       
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
                                                        <input class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos" maxlength="30"  name="apellidos" value="<?php if(isset($registroviejo->apellidos)) echo ucwords($registroviejo->apellidos);?>" placeholder="Ingreses sus Apellidos" required autofocus>
                                                       
                                                    </div>
            
                                                </div>
                                                      
                                                

                                            </div><!--col-->
                                        
                                        </div><!--row-->

                                        <div class="row ">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label class="form-label">Fecha de Nacimiento</label> 
                                                    <div class="wrap-input100 validate-input input-group" >
                                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                            <i class="fe fe-calendar" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="input100 border-start-0 ms-0 form-control" type="date" id="datepicker"   name="datepicker" value="<?php if(isset($registroviejo->fecha_nac)) echo ucwords($registroviejo->fecha_nac);?>" placeholder="F. Nacimiento" required autofocus>
                                                       
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
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="edad" maxlength="2"  name="edad" value="<?php if(isset($registroviejo->edad)) echo ucwords($registroviejo->edad);?>" placeholder="edad" required autofocus>
                                                   
                                                </div>
        
                                            </div>
                                        </div><!--col-->
                                            <div class="col-md-4">

                                                         <div class="form-group">
                                                    <label class="form-label">Estado civil</label>
                                                        <select class="form-control form-select"  id="estcivil" name="estcivil">
                                                            <option value="">Seleccione una opción</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='casado'){echo 'selected';}}?> value="casado">Casado(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='soltero'){echo 'selected';}}?> value="soltero">Soltero(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='concubino'){echo 'selected';}}?> value="concubino">Concubino(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='viudo'){echo 'selected';}}?> value="viudo">Viudo(A)</option>
                                                            <option <?php if(isset($registroviejo->estcivil)){ if(trim($registroviejo->estcivil)=='divorciado'){echo 'selected';}}?> value="divorciado">Divorciado(A)</option>
                                                        </select>
                                               
                                                

                                            </div><!--col-->
                                        
                                        </div><!--row-->

                                      
                                        <div class="row ">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label class="form-label">Telf Móvil</label> 
                                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                            <i class="fe fe-phone" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11"  name="telf_movil" value="<?php if(isset($registroviejo->telf_cel)) echo ucwords($registroviejo->telf_cel);?>" placeholder="Ingrese su telefono" required autofocus>
                                                       
                                                    </div>
            
                                                </div>
                                                      
                                                

                                            </div><!--col-->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label class="form-label">Telf Local</label> 
                                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                            <i class="fe fe-phone-call" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local" maxlength="30"  name="telf_local" value="<?php if(isset($registroviejo->telf_local)) echo ucwords($registroviejo->telf_local);?>" placeholder="Telefono Local" required autofocus>
                                                       
                                                    </div>
            
                                                </div>
                                                      
                                                

                                            </div><!--col-->
                                            <div class="col-md-4">
                                                <label class="form-label"> Profesión Oficio</label>
                                                <div class="form-group">
                                           

                                                
                                                        <select required class="form-control show-tick" id="id_profesion" name="id_profesion">
                                                            <option value="">Seleccione una Profesión u Oficio</option>

                                                           
                                                     
                                                         <?php if(isset($profesion_oficio)): ?>
                                                            <?php foreach ($profesion_oficio as $key => $profesion):?>
                                                               
                                                                <?php  if($registroviejo->id_profesion_oficio == $profesion->id_profesion):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$profesion->id_profesion."'>".$profesion->desc_profesion."</option>";     
                                                               else:
                                                                    echo "<option value='".$profesion->id_profesion."'>".$profesion->desc_profesion."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>
                                                        </select>   
                                             
                                                </div>
                                                
                                            </div>

                                        
                                        </div><!--row-->
                                        

                                      

                               
                                     
                                        <div class="row ">   
                                            <div class="col-md-4">
                                                <label  class="form-label"> Comunidad Aborigen</label>
                                                <div class="form-group">
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
                                            <label  class="form-label">Cantidad de hijos</label>
                                                <div class="form-group">
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
                                            <label  class="form-label">Situación actual empleo</label>
                                                <div class="form-group">
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
                                      

                                           
                                        </div><!--row-->
                                       
                                                              
                                        <div class="row ">   
                                            <div class="col-md-4">
                                                <label  class="form-label">Movimiento Religioso</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="id_movimiento_religioso" name="id_movimiento_religioso" require>
                                                        <option value="" >Seleccione una opción</option>
                                                    
                                                     
                                                        <?php if(isset($movimientogeligioso)): ?>
                                                            <?php foreach ($movimientogeligioso as $key => $geligioso):?>
                                                               
                                                                <?php  if($registroviejo->id_movimiento_religioso == $geligioso->id_religion):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$geligioso->id_religion."'>".$geligioso->religion."</option>";     
                                                               else:
                                                                    echo "<option value='".$geligioso->id_religion."'>".$geligioso->religion."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                            <label  class="form-label">Movimiento Sociales</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" id="id_movimiento_sociales" name="id_movimiento_sociales">
                                                            <option value="">Seleccione una opción</option>
                                                            <?php if(isset($movimientos)): ?>
                                                            <?php foreach ($movimientos as $key => $movimiento):?>
                                                               
                                                                <?php  if($registroviejo->id_movimiento_sociales == $movimiento->id_movimiento):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$movimiento->id_movimiento."'>".$movimiento->sociales."</option>";     
                                                               else:
                                                                    echo "<option value='".$movimiento->id_movimiento."'>".$movimiento->sociales."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                         
                                      

                                           
                                        </div><!--row-->
                                        <div class="row ">
                                            <div class="col-md-4 ">
                                                <label  class="form-label">¿Se encuentra Estudiando?</label><br>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="estudio" type="radio" id="estudio" value="si" <?php if(isset($registroviejo->estudio)){ if(trim($registroviejo->estudio)=='si'){echo 'checked';}}?> />
                                                        <label for="estudio">Si</label>
                                                        <input name="estudio" type="radio" id="estudio2" value="no" <?php if(isset($registroviejo->estudio)){ if(trim($registroviejo->estudio)=='no'){echo 'checked';}}?> />
                                                        <label for="estudio2">No</label><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">

                                                <label  class="form-label">¿Se encuentra inscrito en el CNE?</label><br>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="cne" type="radio" id="cne" value="si" <?php if(isset($registroviejo->cne)){ if(trim($registroviejo->cne)=='si'){echo 'checked';}}?> />
                                                        <label for="cne">Si</label>
                                                        <input name="cne" type="radio" id="cne2" value="no" <?php if(isset($registroviejo->cne)){ if(trim($registroviejo->cne)=='no'){echo 'checked';}}?>/>
                                                        <label for="cne2">No</label><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <label  class="form-label">Género</label><br>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="genero" type="radio" id="genero" value="F" <?php if(isset($registroviejo->genero)){ if(trim($registroviejo->genero)=='F'){echo 'checked';}}?>/>
                                                        <label for="genero">Femenino</label>
                                                        <input name="genero" type="radio" id="genero2" value="M" <?php if(isset($registroviejo->genero)){ if(trim($registroviejo->genero)=='M'){echo 'checked';}}?>/>
                                                        <label for="genero2">Masculino</label><br>
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
                                            <div class="col-md-4">
                                                <label  class="form-label">Municipio</label>
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
                                            <div class="col-md-4">
                                                <label  class="form-label">Parroquia</label>
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
                                        </div><!--row-->
                                   
                                
                            <div class="row "> 
                                <div class="col-md-4">
                                    <label class="form-label"> Dirección Especifica</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <textarea maxlength="255" rows="4" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="250" placeholder="Por favor indica donde resides..."><?php if(isset($registroviejo->direccion)) echo $registroviejo->direccion;?></textarea>
                                        </div>
                                    </div>

                                               
                                        <div class="form-group">
                                            <label class="form-label">Latitud</label> 
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input readonly  class="input100 border-start-0 ms-0 form-control" type="text" id="latitud"   name="latitud" value="<?php if(isset($registroviejo->latitud))
                                                echo$registroviejo->latitud?>" placeholder="latitud" required autofocus>
                                               
                                            </div>
    
                                        </div>
                                              
                                        

                                        <div class="form-group">
                                            <label class="form-label">Longitud</label> 
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud"   name="longitud" value="<?php if(isset($registroviejo->longitud))
                                                echo$registroviejo->longitud?>" placeholder="longitud" required autofocus>
                                               
                                            </div>
    
                                        </div>
                                
                                    
                                </div>
                                <div class="col-md-8 justify-content-center">
                                    <div class="small">Seleccione en el mapa su ubicación exacta</div>
                                    <div id="map"></div>
                             
                                    <pre id="coordinates" class="coordinates"></pre>
                                </div>
      
                            </div>
                                                 
                                        <div class="row  justify-content-center  mt-2">
                                            <div class="col-12 col-lg-12 ">
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