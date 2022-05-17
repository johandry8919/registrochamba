



<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<section class="content">
   
    <div class="">
   
        <div class="row clearfix">
            <div class="col-xs-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row clearfix">
                            <div class="card-title">REGISTRO DE EMPRESAS U ORGANISMO PÚBLICOS</div>


                        </div>
                    </div>

               
                    <div class="card-body">
                        <div id="wizard2">
                  
                    
                            <h3>datos de la empresa</h3>
                            <section>
                        
                            <div class="row">
                                <div class=" text-center card-title"></div>

                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">NOMBRE O RAZÓN SOCIAL</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input
                                            data-parsley-error-message="Este campo es requerido"

                                            class="input100 border-start-0 ms-0 form-control" type="text" id="razon_social" maxlength="30" name="razon_social" value="<?php if(isset($list_empresa->nombre_razon_social)) echo ucwords($list_empresa->nombre_razon_social);?>" placeholder="NOMBRE O RAZÓN SOCIAL" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">RIF</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input
                                            data-parsley-error-message="Este campo es requerido"

                                            class="input100 border-start-0 ms-0 form-control" type="text" id="rif" maxlength="30" name="rif" value="<?php if(isset($list_empresa->rif)) echo ucwords($list_empresa->rif);?>" placeholder="RIF" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Telf Móvil</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fe fe-phone" aria-hidden="true"></i>
                                            </a>
                                            <input 
                                            
                                            data-parsley-error-message="Este campo es requerido"

                                            class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11" name="telf_movil" value="<?php if(isset($list_empresa->tlf_celular)) echo ucwords($list_empresa->tlf_celular);?>" placeholder="Ingrese su telefono" required autofocus>

                                        </div>
                                    </div>
                               </div>

                             
                                <!-- Correo -->
                                <div class="col-md-4">
                                    <label class="form-label">Correo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                            </a>
                                            <input
                                            data-parsley-error-message="Este campo es requerido"
                                            
                                            class="input100 border-start-0 ms-0 form-control" value="<?php if(isset($list_empresa->email)) echo ucwords($list_empresa->email);?>" type="email" placeholder="Email" id="email" required>
                                        </div>
                                    </div>
                                    </div>


                                </div>


                                <div class="col-md-4 ">
                                    <label class="form-label">Sector economico</label>
                                    <div class="form-group">
                                        <select
                                        data-parsley-error-message="Este campo es requerido"

                                        required class="form-control show-tick " id="sector_economico" name="sector_economico" required>
                                            <option value="0">Seleccione una opcion</option>

                                           
                                     
                                            <?php if(isset($sectorProductivo)): ?>
                                                            <?php foreach ($sectorProductivo as $key => $profesion):?>
                                                               
                                                                <?php  if($profesion->id == $list_empresa->id_sector_economico):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$profesion->id."'>".$profesion->productivo."</option>";     
                                                               else:
                                                                    echo "<option value='".$profesion->id."'>".$profesion->productivo."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>
                                        </select>  
                                    </div>

                                </div>
                                <div class="col-md-4 ">
                                    <label class="form-label">Actividad Economica</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select
                                            required
                                            data-parsley-error-message="Este campo es requerido"

                                            class="form-control show-tick" id="actividad_economica" name="actividad_economica">
                                                <option value="">Seleccione una opción</option>
                                                <option <?php if (isset($list_empresa->actividad_economica) and $list_empresa->actividad_economica == 'PUBLICA') {
                                                echo 'selected';
                                            } ?> value="PUBLICA">PUBLICA</option>
                                    <option <?php if (isset($list_empresa->actividad_economica) and $list_empresa->actividad_economica == 'PRIVADA') {
                                                echo 'selected';
                                            } ?> value="PRIVADA">PRIVADA</option>
                                    <option <?php if (isset($list_empresa->actividad_economica) and $list_empresa->actividad_economica == 'MIXTA') {
                                                echo 'selected';
                                            } ?> value="MIXTA">MIXTA</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 text-center mb-2">
                                    <div class="card-title">REDES SOCIALES</div>

                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-instagram" data-bs-toggle="tooltip" title="" data-bs-original-title="fe fe-instagram" aria-label="fe fe-instagram"></i></span>
                                            <input id="instagram" name="instagram" maxlength="100" autofocus value="<?php if (isset($list_empresa->instagram)) echo ucwords($list_empresa->instagram); ?>" type="text" class="form-control" placeholder="instagram" aria-label="instagram" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-twitter" data-bs-toggle="tooltip" data-bs-original-title="fe fe-twitter" aria-label="fe fe-twitter"></i></span>
                                            <input id="twitter" name="twitter" maxlength="100" autofocus value="<?php if (isset($list_empresa->twitter)) echo ucwords($list_empresa->twitter); ?>" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-facebook" data-bs-toggle="tooltip" data-bs-original-title="fe fe-facebook" aria-label="fe fe-facebook"></i></span>
                                            <input id="facebook" name="facebook" maxlength="200" autofocus value="<?php if (isset($list_empresa->facebook)) echo ucwords($list_empresa->facebook); ?>" type="text" class="form-control" placeholder="facebook" aria-label="facebook" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--row -->
                           </section>

                           <h3 class="text-center">datos representante de la empresa</h3>
                           <section> <div class=" row mt-5 ">

                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Nombre</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input 
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" type="text" id="nombre_representante" maxlength="30" name="nombres" value="<?php if(isset($list_empresa->noombre_representante)) echo ucwords($list_empresa->noombre_representante);?>" placeholder="Ingrese su Nombre" required autofocus>

                                        </div>

                                    </div>



                                </div>
                                <!--col-->

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Apellidos</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos_representante" maxlength="30" name="apellidos_representante" value="<?php if(isset($list_empresa->apellido_representante)) echo ucwords($list_empresa->apellido_representante);?>" placeholder="Ingreses sus Apellidos" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Cédula de Identidad</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                            </a>
                                            <input 
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" type="text" id="cedula_representante" maxlength="30" name="cedula_representante" value="<?php if(isset($list_empresa->celular_representante)) echo ucwords($list_empresa->celular_representante);?>" placeholder="Cédula de Identidad" required autofocus>

                                        </div>

                                    </div>





                                </div>
                                <!--col-->




                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Telf Móvil</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fe fe-phone" aria-hidden="true"></i>
                                            </a>
                                            <input 
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil_representante" maxlength="11" name="telf_movil_representante" value="<?php if(isset($list_empresa->celular_representante)) echo ucwords($list_empresa->celular_representante);?>" placeholder="Ingrese su telefono" required autofocus>

                                        </div>

                                    </div>



                                </div>


                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Telf Local</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fe fe-phone-call" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local_representante" maxlength="30" name="telf_local_representante" value="<?php if(isset($list_empresa->tlf_local_representante)) echo ucwords($list_empresa->tlf_local_representante);?>" placeholder="Telefono Local" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Correo</label>
                                    <div class="form-group">
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                            </a>
                                            <input
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" value="<?php if(isset($list_empresa->email_representante)) echo ucwords($list_empresa->email_representante);?>"type="email" placeholder="Email" id="email_representante" name="email_representante" required>
                                        </div>
                                    </div>


                                </div>

                       
                                <!--col-->

                           
                                <!--col-->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Cargo</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input 
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" type="text" id="cargo" maxlength="30" name="cargo" value="<?php if(isset($list_empresa->cargo)) echo ucwords($list_empresa->cargo);?>" placeholder="Cargo" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                   <!--col-->
                                   <div class="col-md-4">
                                       
                                      
                                               <div class="form-group">
                                        <label class="form-label">Asignar Contraseña</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input 
                                            data-parsley-error-message="Este campo es requerido"
                                            class="input100 border-start-0 ms-0 form-control" type="text" id="password" maxlength="30" name="password" value="" placeholder="Ingrese una contraseña" required autofocus>

                                        </div>
                                          

                                    </div>



                                </div>

                                <!--col-->


                            </div>
                            <!--row-->
                        </section>

              
                    <h3>Dirección Geolocalización</h3>
                    <section>

                        <div class="row ">
                                <div class="col-md-4">
                                <label  class="form-label">Estado</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" 
                                        
                                        data-parsley-error-message="Este campo es requerido"
                                        id="cod_estado" name="cod_estado" required>
                                        <option value="">Seleccione una opción</option>
                                    <?php
                                        if(isset($estados)){
                                            foreach ($estados as $key => $estado) {
                                                if(isset($estado->codigoestado) and $estado->codigoestado == $list_empresa->codigoestado){
                                                    echo "<option selected value='".$estado->codigoestado."'  data-latitud=".$estado->latitud."  data-longitud=".$estado->longitud." >".$estado->nombre."</option>";     
                                                }else{
                                                    echo "<option value='".$estado->codigoestado."' data-latitud=".$estado->latitud."  data-longitud=".$estado->longitud." >".$estado->nombre."</option>";
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
                                        <select
                                        data-parsley-error-message="Este campo es requerido" required
                                        class="form-control show-tick" id="cod_municipio" name="cod_municipio"    required                                     data-parsley-error-message="Este campo es requerido">
                                        <option value="">Seleccione un Municipio</option>
                                        <?php
                                            if(isset($list_empresa->codigomunicipio)){
                                                echo "<option selected value='".$list_empresa->codigomunicipio."'>".$list_empresa->nombre_municipio."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($list_empresa->codigomunicipio)){
                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                        }
                                    ?>                                               
                                </div>
                                
                            </div>

                            <div class="col-md-4">
                                <label  class="form-label">Parroquia</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick"
                                        data-parsley-error-message="Este campo es requerido"
                                        id="cod_parroquia" name="cod_parroquia" required>
                                        <option value="">Seleccione una Parroquia</option>
                                        <?php
                                            if(isset($list_empresa->codigoparroquia)){
                                                echo "<option selected value='".$list_empresa->codigoparroquia."' data-latitud=".$list_empresa->latitud."  data-longitud=".$list_empresa->longitud."  >".$list_empresa->nombre_parroquia."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($list_empresa->codigoparroquia)){
                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                        }
                                    ?>
                                </div>
                                
                            </div>


                                </div>
                                <!--row-->




                                <div class="row m-2">
                                    <div class="col-md-4 col-12">
                                        <label class="form-label"> Dirección Especifica</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea maxlength="255" rows="2" class="form-control no-resize zindex" class="direccion" name="direccion_empresa" id="direccion_empresa" maxlength="100" placeholder="Por favor indica donde resides..." data-parsley-error-message="Este campo es requerido" required autofocus><?php if (isset($list_empresa->direccion)) echo $list_empresa->direccion; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Latitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input readonly class="input100 border-start-0 ms-0 form-control" type="text" id="latitud" name="latitud" value="<?php if (isset($list_empresa->latitud))
                                                                                                                                                                        echo $list_empresa->latitud ?>" placeholder="latitud" required autofocus>

                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label">Longitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud" name="longitud" value="<?php if (isset($list_empresa->longitud))
                                                                                                                                                                        echo $list_empresa->longitud ?>" placeholder="longitud" required autofocus data-parsley-error-message="Este campo es requerido" required autofocus>

                                            </div>

                                        </div>


                                    </div>
                                    <div class="col-md-8 justify-content-center">
                                        <div class="small">Seleccione en el mapa su ubicación exacta</div>
                                        <div id="map"></div>

                                        <pre id="coordinates" class="coordinates"></pre>
                                        <button type="button" id="seleccion-ubicacion" class="btn btn-icon ubicacion-c btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Tu ubicación"><i class="fe fe-map-pin"></i></button>

                                    </div>

                                </div>
                </section>
    
            </div>
                </div>
                    

                
                 
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>








</section>
