

<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<section class="">
    <div class="container">

        <?php if ($this->session->flashdata('mensajeexito')) { ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('mensajeerror')) { ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <?php if ($this->session->flashdata('mensaje')) { ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <div class="row clearfix">
            <div class="col-xs-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row clearfix">
                            <div class="card-title">DATOS  DE LA EMPRESAS U ORGANISMO PÚBLICOS</div>


                        </div>
                    </div>


                    <div class="card-body mt-0">
                       


                        <form method="POST" id="formulario">
                            <div class="row">
                                <div class=" text-center card-title">DATOS DE LA INSTITUCION</div>

                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">NOMBRE O RAZÓN SOCIAL</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="razon_social" maxlength="30" name="razon_social" value="<?php if(isset($datos->nombre_razon_social)) echo ucwords($datos->nombre_razon_social);?>" placeholder="NOMBRE O RAZÓN SOCIAL" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="rif" maxlength="30" name="rif" value="<?php if(isset($datos->rif)) echo ucwords($datos->rif);?>" placeholder="NOMBRE O RAZÓN SOCIAL" required autofocus data-parsley-error-message="Este campo es requerido" data-parsley-error-message="Este campo es requerido">

                                        </div>

                                    </div>



                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Telf Móvil Empresa</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fe fe-phone" aria-hidden="true"></i>
                                            </a> 
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="tlf_celular" maxlength="11" name="tlf_celular" value="<?php if(isset($datos->tlf_celular_empresa)) echo ucwords($datos->tlf_celular_empresa);?>" placeholder="Ingrese su telefono" required autofocus data-parsley-error-message="Este campo es requerido">

                                        </div>

                                    </div>


                                </div>


                                <!-- Correo -->
                                <div class="col-md-4">
                                    <label class="form-label">Correo</label>
                                    <div class="form-group">
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email" name="email" id="email"
                                            value="<?php if(isset($datos->email)) echo ucwords($datos->email);?>"data-parsley-error-message="Este campo es requerido">
                                        </div>
                                    </div>


                                </div>
                               


                                <div class="col-md-4 ">
                                    <label class="form-label">Sector economico</label>
                                    <div class="form-group">
                                        <select
                                       

                                        required class="form-control show-tick " id="sector_economico" name="sector_economico" required>
                                            <option value="0">Seleccione una opcion</option>

                                           
                                     
                                            <?php if(isset($sectorProductivo)): ?>
                                                            <?php foreach ($sectorProductivo as $key => $profesion):?>
                                                               
                                                                <?php  if($profesion->id == $datos->id_sector_economico):?>
                                                                
                                                                 
                                                                 
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
                                    <label class="form-label">Tipo de propiedad</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select
                                            required
                                            

                                            class="form-control show-tick" id="actividad_economica" name="actividad_economica">
                                                <option value="">Seleccione una opción</option>
                                                <option <?php if (isset($datos->actividad_economica) and $datos->actividad_economica == 'PUBLICA') {
                                                echo 'selected';
                                            } ?> value="PUBLICA">PUBLICA</option>
                                    <option <?php if (isset($datos->actividad_economica) and $datos->actividad_economica == 'PRIVADA') {
                                                echo 'selected';
                                            } ?> value="PRIVADA">PRIVADA</option>
                                    <option <?php if (isset($datos->actividad_economica) and $datos->actividad_economica == 'MIXTA') {
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
                                            <input id="instagram" name="instagram" maxlength="100" autofocus value="<?php if (isset($datos->instagram)) echo ucwords($datos->instagram); ?>" type="text" class="form-control" placeholder="instagram" aria-label="instagram" aria-describedby="basic-addon1" data-parsley-error-message="Este campo es requerido">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-twitter" data-bs-toggle="tooltip" data-bs-original-title="fe fe-twitter" aria-label="fe fe-twitter"></i></span>
                                            <input id="twitter" name="twitter" maxlength="100" autofocus value="<?php if (isset($datos->twitter)) echo ucwords($datos->twitter); ?>" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter" aria-describedby="basic-addon1" data-parsley-error-message="Este campo es requerido">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-facebook" data-bs-toggle="tooltip" data-bs-original-title="fe fe-facebook" aria-label="fe fe-facebook"></i></span>
                                            <input id="facebook" name="facebook" maxlength="200" autofocus value="<?php if (isset($datos->facebook)) echo ucwords($datos->facebook); ?>" type="text" class="form-control" placeholder="facebook" aria-label="facebook" aria-describedby="basic-addon1" data-parsley-error-message="Este campo es requerido">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--row -->


                            <div class=" row mt-5 ">
                                <div class="text-center card-title"> REPRESENTANTE DE LA INSTITUCION</div>
                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Nombre</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombre_representante" maxlength="30" name="nombre_representante" value="<?php if(isset($datos->noombre_representante)) echo ucwords($datos->noombre_representante);?>" placeholder="Ingrese su Nombre" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos_representante" maxlength="30" name="apellidos_representante" value="<?php if(isset($datos->apellido_representante)) echo ucwords($datos->apellido_representante);?>" placeholder="Ingreses sus Apellidos" required autofocus >

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="cedula_representante" maxlength="30" name="cedula_representante" value="<?php if(isset($datos->celular_representante)) echo ucwords($datos->celular_representante);?>" placeholder="Cédula de Identidad" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                            <input class="input100 border-start-0 ms-0 form-control"
                                             type="text" id="telf_movil_representante" 
                                             maxlength="11" name="telf_movil_representante" 
                                             value="<?php if(isset($datos->celular_representante)) echo ucwords($datos->celular_representante);?>
                                             
                                             " 
                                             
                                             placeholder="Ingrese su telefono" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local_representante" maxlength="30" name="telf_local_representante" value="<?php if(isset($datos->tlf_local_representante)) echo ucwords($datos->tlf_local_representante);?>" placeholder="Telefono Local" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email" name="email_representante" id="email_representante"
                                            value="<?php if(isset($datos->email_representante)) echo ucwords($datos->email_representante);?>">
                                        </div data-parsley-error-message="Este campo es requerido">
                                    </div>


                                </div>



                                <!--col-->
                                <div class="col-md-6 col-12 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Cargo</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="cargo" maxlength="30" name="cargo" value="<?php if(isset($datos->cargo)) echo ucwords($datos->cargo);?>" placeholder="Cargo" required autofocus>

                                        </div>

                                    </div>



                                </div>
                           




                            </div>

                            <!--col-->


                    </div>
                    <!--row-->

                    <div class="row m-2">
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
                                                if(isset($estado->codigoestado) and $estado->codigoestado == $datos->codigoestado){
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
                                            if(isset($datos->codigomunicipio)){
                                                echo "<option selected value='".$datos->codigomunicipio."'>".$datos->municipio."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($datos->codigomunicipio)){
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
                                            if(isset($datos->codigoparroquia)){
                                                echo "<option selected value='".$datos->codigoparroquia."' data-latitud=".$datos->latitud."  data-longitud=".$datos->longitud."  >".$datos->parroquia."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($datos->codigoparroquia)){
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
                                                <textarea maxlength="255" rows="2" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="100" placeholder="Por favor indica donde resides..." data-parsley-error-message="Este campo es requerido" required autofocus><?php if (isset($datos->direccion_representante)) echo $datos->direccion_representante; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Latitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input readonly class="input100 border-start-0 ms-0 form-control" type="text" id="latitud" name="latitud" value="<?php if (isset($datos->latitud))
                                                                                                                                                                        echo $datos->latitud ?>" placeholder="latitud" required autofocus>

                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label">Longitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud" name="longitud" value="<?php if (isset($datos->longitud))
                                                                                                                                                                        echo $datos->longitud ?>" placeholder="longitud" required autofocus data-parsley-error-message="Este campo es requerido" required autofocus>

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
                    







                                                
                <div class="row  justify-content-center  mt-2 mb-2">
                    <div class="col-md-8 ">
                        <button class="btn btn-primary btn-block" id="button" type="button">Guardar</button>
                    </div>

                </div>

                
                <!-- <input type="hidden" name="id_empresas_entes" id="id_empresas_entes" value="<?php echo $datos->id_empresas_entes; ?>">
                <input type="hidden" name="id_representante" id="id_representante" value="<?php echo $datos->id_representantes; ?>"> -->




                </div> <!-- /CARF BODY -->










        </form>
        </div>


        </div>
    </div>
    </div>









</section>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>