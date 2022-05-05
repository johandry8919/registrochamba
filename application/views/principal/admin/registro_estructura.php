
<?php      ?>



<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<section class="content">
   
   




    <?php if ($this->session->flashdata('mensajeexito')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('mensajeerror')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            </div>
        </div>
        <br>
    <?php } ?>
    <?php if ($this->session->flashdata('mensaje')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            </div>
        </div>
        <br>
    <?php } ?>
    <form method="post" id="form-estructuras">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            Registro de estructuras
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="wizard2">
                            <h3>Datos personales</h3>
                            <section>
                                <div class=" row ">
                                    <div class=" col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">Nombre</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" data-parsley-error-message="Este campo es requerido" type="text" id="nombres" maxlength="30" name="nombres" value="" placeholder="Ingrese su Nombre" required autofocus>

                                            </div>

                                        </div>



                                    </div>
                                    <!--col-->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">Apellidos</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" data-parsley-error-message="Este campo es requerido" type="text" id="apellidos" maxlength="30" name="apellidos" value="" placeholder="Ingreses sus Apellidos" required autofocus>

                                            </div>

                                        </div>



                                    </div>
                                    <!--col-->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">Cédula de Identidad</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <input  class="input100 border-start-0 ms-0 form-control" type="text" id="cedula" maxlength="30" name="cedula" value="" placeholder="Cédula de Identidad" required autofocus data-parsley-error-message="Este campo es requerido"
                                                >

                                            </div>

                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="form-label">Nivel academico</label>
                                        
                                        </div>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <select class=" form-control show-tick" id="id_nivel_academico" name="id_nivel_academico" data-parsley-error-message="Este campo es requerido" required autofocus >
                                                    <option value="">Seleccione una opción</option>
                                                    <?php if(isset($academica)): ?>
                                                            <?php foreach ($academica as $key => $academicas):?>
                                                               
                                                                <?php  if($registroviejo->id_instruccion == $academicas->id_nivel_academico):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$academicas->id_instruccion."'>".$academicas->nivel."</option>";     
                                                               else:
                                                                    echo "<option value='".$academicas->id_instruccion."'>".$academicas->descricionnnivel."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>


                                                </select>
                                               

                                            </div>
                                    </div>

                                </div>
                                <!--row-->
                                <div class="row ">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label class="form-label">Telf Móvil</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-phone" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11" name="telf_movil" value="" placeholder="Ingrese su telefono" required autofocus data-parsley-error-message="Este campo es requerido">

                                            </div>

                                        </div>



                                    </div>
                                    <!--col-->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label class="form-label">Teléfono Coorporativo (Si Posee)</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-phone-call" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local" maxlength="30" name="telf_local" value="<?php if (isset($registroviejo->telf_local)) echo ucwords($registroviejo->telf_local); ?>" placeholder="Telefono Local" required autofocus data-parsley-error-message="Este campo es requerido">


                                            </div>

                                        </div>



                                    </div>
                                    <!--col-->
                                    <div class="col-md-4">
                                        <label class="form-label">Correo</label>
                                        <div class="form-group">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" id="correo1" type="email" name="email1" placeholder="Email" data-parsley-error-message="Este campo es requerido" required autofocus>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label class="form-label">Fecha de Nacimiento</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-calendar" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="date" id="datepicker" name="fecha_nac" value="<?php if(isset($registroviejo->Fecha_nac)) echo ucwords($registroviejo->Fecha_nac);?>" placeholder="F. Nacimiento" required autofocus data-parsley-error-message="Este campo es requerido">

                                            </div>

                                        </div>



                                    </div>
                                    <!--col-->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Edad</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-calendar" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="edad" maxlength="2" name="edad" value="" placeholder="edad" required autofocus data-parsley-error-message="Este campo es requerido">

                                            </div>

                                        </div>
                                    </div>
                                    <!--col-->
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Profesión u Oficio </label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-ship" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-ship" aria-label="fa fa-ship"></i>
                                                </a>
                                            
                                                    <select class="form-control show-tick" id="id_profesion_oficio" name="id_profesion_oficio" data-parsley-error-message="Este campo es requerido" required autofocus>
                                                    <option value="">Seleccione una opción</option>
                                                    <?php if(isset($responsabilidad_estructuras)): ?>
                                                            <?php foreach ($profesion_oficio as $key => $profesion):?>
                                                               
                                                                <?php  if($profesion_oficio == $id_profesion_oficio):?>
                                                                
                                                                 
                                                                 
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
                                    </div>
                                    <!--col-->

                                </div>

                            </section>
                            <h3>Direccion - Geolocalización</h3>
                            <section>
                                <div class="row ">



                                    <div class="col-12 col-md-6">
                                        <label class="form-label">¿responsabilidad que desempeña dentro de su estructura ?</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="cod_responsabilidad" name="cod_responsabilidad" data-parsley-error-message="Este campo es requerido" required autofocus>
                                                    <option value="">Seleccione una opción</option>
                                                    <?php if(isset($responsabilidad_estructuras)): ?>
                                                            <?php foreach ($responsabilidad_estructuras as $key => $movimiento):?>
                                                               
                                                                <?php  if($registroviejo->id_tipos == $movimiento->id_responsabilidad_estructura):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$movimiento->id_tipos."'>".$movimiento->descricion."</option>";     
                                                               else:
                                                                    echo "<option value='".$movimiento->id_tipos."'>".$movimiento->descricion."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>


                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 align-items-end">
                                        <label class="form-label">¿A que estructura Pertenece?</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="id_estructura" name="id_estructura" data-parsley-error-message="Este campo es requerido" required autofocus>
                                                    <option value="">Seleccione una opción</option>
                                                    <option value="Estadal">Estructura Estadal</option>
                                                    <option value="Municipal">Estructura Municipal</option>
                                                    <option value="Parroquial">Estructura Parroquial</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Talla de pantalon</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="talla_pantalon" maxlength="30" name="talla_pantalon" value="" placeholder="Talla de pantalon" required autofocus data-parsley-error-message="Este campo es requerido">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Talla de Camisa</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="talla_camisa" maxlength="30" name="talla_camisa" value="" placeholder="talla_camisa" required autofocus data-parsley-error-message="Este campo es requerido">

                                            </div>

                                        </div>
                                    </div>







                                </div>
                                <!--row-->

                                <div class="row">
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
                                                if(isset($datos_empresa->codigoestado) and $datos_empresa->codigoestado == $estado->codigoestado){
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
                                            if(isset($datos_empresa->municipio)){
                                                echo "<option selected value='".$datos_empresa->codigomunicipio."'>".$datos_empresa->municipio."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($datos_empresa->estado)){
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
                                            if(isset($datos_empresa->parroquia)){
                                                echo "<option selected value='".$datos_empresa->codigoparroquia."' data-latitud=".$datos_empresa->latitud."  data-longitud=".$datos_empresa->longitud."  >".$datos_empresa->parroquia."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($datos_empresa->estado)){
                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                        }
                                    ?>
                                </div>
                                
                            </div>


                                </div>
                                <!--row-->




                                <div class="row ">
                                    <div class="col-md-4">
                                        <label class="form-label"> Dirección Especifica</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea maxlength="255" rows="4" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="250" placeholder="Por favor indica donde resides..." data-parsley-error-message="Este campo es requerido" required autofocus><?php if (isset($registroviejo->direccion)) echo $registroviejo->direccion; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Latitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input readonly class="input100 border-start-0 ms-0 form-control" type="text" id="latitud" name="latitud" value="<?php if (isset($registroviejo->latitud))
                                                                                                                                                                        echo $registroviejo->latitud ?>" placeholder="latitud" required autofocus>

                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label">Longitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud" name="longitud" value="<?php if (isset($registroviejo->longitud))
                                                                                                                                                                        echo $registroviejo->longitud ?>" placeholder="longitud" required autofocus data-parsley-error-message="Este campo es requerido" required autofocus>

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
                            <h3>Asignación de contraseña</h3>
                            <section>

                                
                                <div class="form-group">
                                    <input type="email" id="correo2" name="email2" class="form-control" placeholder="Email" data-parsley-error-message="Este campo es requerido" required autofocus />
                                </div>
                                <div class="form-group">
                                    <input id="pass" type="password" name="Password" class="form-control" placeholder="Password" data-parsley-error-message="Este campo es requerido" required autofocus>
                                </div>

                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>









</section>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
