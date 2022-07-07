
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->


<section class="content">
    <form method="post" id="form-estructuras">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            Editar usuario

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
                                                <input class="input100 border-start-0 ms-0 form-control" data-parsley-error-message="Este campo es requerido" type="text" id="nombres" maxlength="30" name="nombres" value="<?php if (isset($datos->nombre)) echo ucwords($datos->nombre); ?>" placeholder="Ingrese su Nombre" required autofocus>

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
                                                <input class="input100 border-start-0 ms-0 form-control" data-parsley-error-message="Este campo es requerido" type="text" id="apellidos" maxlength="30" name="apellidos" value="<?php if (isset($datos->apellidos)) echo ucwords($datos->apellidos); ?>" placeholder="Ingreses sus Apellidos" required autofocus>

                                            </div>

                                        </div>



                                    </div>
                                    <!--col-->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label class="form-label">Cédula de Identidad</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="cedula" maxlength="30" name="cedula" value="<?php if (isset($datos->cedula)) echo ucwords($datos->cedula); ?>" placeholder="Cédula de Identidad" required autofocus data-parsley-error-message="Este campo es requerido">

                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="form-label">Nivel academico</label>

                                        </div>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                            </a>
                                            <select class=" form-control show-tick" id="id_nivel_academico" name="id_nivel_academico" data-parsley-error-message="Este campo es requerido" required autofocus>
                                                <option value="">Selecciones una opción</option>
                                                <?php if (isset($academica)) : ?>
                                                    <?php foreach ($academica as $key => $academicas) : ?>

                                                        <?php if ($academicas->id_instruccion == $datos->id_nivel_academico) : ?>



                                                <?php echo "<option selected value='" . $academicas->id_instruccion . "'>" . $academicas->nivel . "</option>";
                                                        else :
                                                            echo "<option value='" . $academicas->id_instruccion . "'>" . $academicas->nivel . "</option>";
                                                        endif;
                                                    endforeach;
                                                endif;
                                                ?>


                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                                <label  class="form-label text_center">Género</label><br>
                                                <div class="form-group">
                                                    <div class="form">
                                                        <input name="genero" type="radio" id="genero" value="F" <?php if(isset($datos->genero)){ if(trim($datos->genero)=='F'){echo 'checked';}}?>/>
                                                        <label for="genero">Femenino</label>
                                                        <input name="genero" type="radio" id="genero" value="M" <?php if(isset($datos->genero)){ if(trim($datos->genero)=='M'){echo 'checked';}}?>/>
                                                        <label for="genero2">Masculino</label><br>
                                                    </div>
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
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11" name="telf_movil" value="<?php if (isset($datos->tlf_celular)) echo ucwords($datos->tlf_celular); ?>" placeholder="Ingrese su telefono" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local" maxlength="30" name="telf_local" value="<?php if (isset($datos->tlf_coorparativo)) echo ucwords($datos->tlf_coorparativo); ?>" placeholder="Telefono Local" required autofocus data-parsley-error-message="Este campo es requerido">


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
                                                <input class="input100 border-start-0 ms-0 form-control" value="<?php if (isset($datos->email)) echo ucwords($datos->email); ?>" id="correo1" type="email" name="email1" placeholder="Email" data-parsley-error-message="Este campo es requerido" required autofocus>

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
                                                <input class="input100 border-start-0 ms-0 form-control" type="date" id="fecha_nac" name="fecha_nac" value="<?php if (isset($datos->fecha_nac)) echo ucwords($datos->fecha_nac); ?>" placeholder="F. Nacimiento" required autofocus data-parsley-error-message="Este campo es requerido">

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
                                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="edad" maxlength="2"  name="edad" value="<?php if(isset($datos->edad)) echo ucwords($datos->edad);?>" placeholder="edad" required autofocus>
                                                   
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
                                                    <?php if (isset($responsabilidad_estructuras)) : ?>
                                                        <?php foreach ($profesion_oficio as $key => $profesion) : ?>

                                                            <?php if ($profesion->id_profesion == $datos->id_profesion_oficio) : ?>



                                                    <?php echo "<option selected value='" . $profesion->id_profesion . "'>" . $profesion->desc_profesion . "</option>";
                                                            else :
                                                                echo "<option value='" . $profesion->id_profesion . "'>" . $profesion->desc_profesion . "</option>";
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
                                        <label class="form-label">¿Responsabilidad Que Desempeña Dentro de su Estructura ?</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="cod_responsabilidad" name="cod_responsabilidad" data-parsley-error-message="Este campo es requerido" required autofocus>
                                                    <option value="">Seleccione una opción</option>
                                                    <?php if (isset($responsabilidad_estructuras)) : ?>
                                                        <?php foreach ($responsabilidad_estructuras as $key => $movimiento) : ?>

                                                            <?php if ($movimiento->id_tipos == $datos->id_responsabilidad_estructura) : ?>



                                                    <?php echo "<option selected value='" . $movimiento->id_tipos . "'>" . $movimiento->descricion . "</option>";
                                                            else :
                                                                echo "<option value='" . $movimiento->id_tipos . "'>" . $movimiento->descricion . "</option>";
                                                            endif;
                                                        endforeach;
                                                    endif;
                                                    ?>


                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!--div class="col-md-6 align-items-end">
                                        <label class="form-label">¿A que estructura Pertenece?</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="id_estructura" name="id_estructura" data-parsley-error-message="Este campo es requerido" required autofocus>
                                                    <option value="/**/">Seleccione una opción</option>
                                                    <option <?php if (isset($datos->tipo_estructura) and $datos->tipo_estructura == 'Estadal') {
                                                                echo 'selected';
                                                            } ?> value="Estadal">Estructura Estadal</option>
                                                    <option <?php if (isset($datos->tipo_estructura) and $datos->tipo_estructura == 'Municipal') {
                                                                echo 'selected';
                                                            } ?> value="Municipal">Estructura Municipal</option>
                                                    <option <?php if (isset($datos->tipo_estructura) and $datos->tipo_estructura == 'Parroquial') {
                                                                echo 'selected';
                                                            } ?> value="Parroquial">Estructura Parroquial</option>


                                                </select>
                                            </div>
                                        </div>

                                    </div -->

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Talla de pantalon</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-user-md" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-user-md" aria-label="fa fa-user-md"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="talla_pantalon" maxlength="30" name="talla_pantalon" value="<?php if (isset($datos->talla_pantalon)) echo ucwords($datos->talla_pantalon); ?>" placeholder="Talla de pantalon" required autofocus data-parsley-error-message="Este campo es requerido" />

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Talla de Camisa</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-user-md" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-user-md" aria-label="fa fa-user-md"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="talla_camisa" maxlength="30" name="talla_camisa" value="<?php if (isset($datos->talla_camisa)) echo ucwords($datos->talla_camisa); ?>" placeholder="talla_camisa" required autofocus data-parsley-error-message="Este campo es requerido">
                                            </div>
                                        </div>
                                    </div>

                                   






                                </div>
                                <!--row-->

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Estado</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" data-parsley-error-message="Este campo es requerido" id="cod_estado" name="cod_estado" required>
                                                    <option value="">Seleccione una opción</option>
                                                    <?php
                                                    if (isset($estados)) {
                                                        foreach ($estados as $key => $estado) {
                                                            if (isset($estado->codigoestado) and $estado->codigoestado == $datos->codigoestado) {
                                                                echo "<option selected value='" . $estado->codigoestado . "'  data-latitud=" . $estado->latitud . "  data-longitud=" . $estado->longitud . " >" . $estado->nombre . "</option>";
                                                            } else {
                                                                echo "<option value='" . $estado->codigoestado . "' data-latitud=" . $estado->latitud . "  data-longitud=" . $estado->longitud . " >" . $estado->nombre . "</option>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Municipio</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select data-parsley-error-message="Este campo es requerido" required class="form-control show-tick" id="cod_municipio" name="cod_municipio" required data-parsley-error-message="Este campo es requerido">
                                                    <option value="municipio">Seleccione un Municipio</option>
                                                    <?php
                                            if(isset($datos->codigomunicipio)){
                                                echo "<option selected value='".$datos->codigomunicipio."'>".$datos->nombre_municipio."</option>";     
                                            }
                                        ?>
                                                </select>
                                            </div>
                                            <?php
                                            if (isset($datos->estado)) {
                                                echo '<small>Seleccione un estado para cambiar</small>';
                                            }
                                            ?>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Parroquia</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" data-parsley-error-message="Este campo es requerido" id="cod_parroquia" name="cod_parroquia" required>
                                                    <option value="parroquia">Seleccione una Parroquia</option>
                                                    <?php
                                            if(isset($datos->codigoparroquia)){
                                                echo "<option selected value='".$datos->codigoparroquia."' data-latitud=".$datos->latitud."  data-longitud=".$datos->longitud."  >".$datos->nombre_parroquia."</option>";     
                                            }
                                        ?>
                                                </select>
                                            </div>
                                            <?php
                                            if (isset($datos_empresa->estado)) {
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
                                            <textarea maxlength="255" rows="2" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="100" placeholder="Por favor indica donde resides..." data-parsley-error-message="Este campo es requerido" required autofocus><?php if (isset($datos->direccion)) echo $datos->direccion; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Latitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input readonly class="input100 border-start-0 ms-0 form-control" type="text" id="latitud" name="latitud" value="<?php if(isset($datos->latitud)) echo ucwords($datos->latitud);?>" placeholder="latitud" required autofocus>

                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label">Longitud</label>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-map" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud" name="longitud" value="<?php if(isset($datos->longitud)) echo ucwords($datos->longitud);?>" placeholder="longitud" required autofocus  required autofocus>

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

    </form>







  <input type="hidden" id="id_usuario_estructura" name="id" value="<?php echo $id_estructura?>">

</section>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>