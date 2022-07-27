<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<section class="content">






    <div class="row clearfix">
        <div class="col-xs-4">
            <div class="card">
                <div class="card-header">
                    <div class="row clearfix">
                        <div class="card-title">Crear Estructura Brigada</div>



                    </div>
                </div>


                <div class="card-body">




                    <form id="formulario-registro">

                        <div class="row">

                            <div class="col-md-4 ">

                                <div class="form-group">
                                    <label class="form-label">¿A que estructura Pertenece?</label>
                                    <div class="form-line">
                                       

                                        <select class=" form-control show-tick border-start-0 ms-0" id="id_estructura" name="id_estructura" data-parsley-error-message="Este campo es requerido" required autofocus>
                                            <option value="">Selecciones una opción</option>
                                            <?php if (isset($roles)) : ?>
                                                <?php foreach ($roles as $key => $rol) : ?>

                                                    <?php if ($rol->id_rol == $brigada->id_rol_estructura) : ?>



                                            <?php echo "<option selected value='" . $rol->id_rol . "'>" . $rol->nombre . "</option>";
                                                    else :
                                                        echo "<option value='" . $rol->id_rol . "'>" . $rol->nombre . "</option>";
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>


                                        </select>
                                    </div>
                                </div>

                            </div>



                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Nombre Estrutura / Brigada</label>
                                    <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombre_brigada" maxlength="250" name="nombre_brigada" value="<?php if (isset($brigada->nombre_brigada)) echo ucwords($brigada->nombre_brigada); ?>" placeholder="Nombre  Estrutura" required autofocus>

                                </div>

                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">sector/ comunidad</label>
                                    <input type="text" placeholder="sector/ comunidad" class="form-control" id="nombre_comunidad" value="<?php if (isset($brigada->nombre_sector)) echo ucwords($brigada->nombre_sector); ?>">


                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-label"> Dirección Especifica</label>
                                    <div class="form-line">
                                        <textarea maxlength="255" rows="4" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="250" placeholder="Por favor indica donde resides..." data-parsley-error-message="Este campo es requerido" required autofocus><?php if (isset($brigada->direccion)) echo $brigada->direccion; ?></textarea>
                                    </div>
                                </div>




                            </div>



                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Estado</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" data-parsley-error-message="Este campo es requerido" id="cod_estado" name="cod_estado" required>
                                                <option value="Estado">Seleccione una opción</option>
                                                <?php
                                                if (isset($estados)) {
                                                    foreach ($estados as $key => $estado) {
                                                        if (isset($estado->codigoestado) and $estado->codigoestado == $brigada->codigoestado) {
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
                                                if (isset($brigada->municipio)) {
                                                    echo "<option selected value='" . $brigada->codigomunicipio . "'>" . $brigada->municipio . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <?php

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
                                                if (isset($brigada->parroquia)) {
                                                    echo "<option selected value='" . $brigada->codigoparroquia . "' data-latitud=" . $brigada->latitud . "  data-longitud=" . $brigada->longitud . "  >" . $brigada->parroquia . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <?php
                                        if (isset($brigada->estado)) {
                                            echo '<small>Seleccione un estado para cambiar</small>';
                                        }
                                        ?>

                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="row justify-content-center ">
                            <div class="col-md-8 justify-content-center">
                                <div class="small">Seleccione en el mapa su ubicación exacta</div>
                                <div class="border border-3" id="map"></div>

                                <pre id="coordinates" class="coordinates"></pre>
                                <button type="button" id="seleccion-ubicacion" class="btn btn-icon ubicacion-c btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Tu ubicación"><i class="fe fe-map-pin"></i></button>

                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Latitud</label>
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-map" aria-hidden="true"></i>
                                        </a>
                                        <input readonly class="input100 border-start-0 ms-0 form-control" type="text" id="latitud" name="latitud" value="<?php if (isset($brigada->latitud)) echo ucwords($brigada->latitud); ?>" placeholder="latitud" required autofocus>

                                    </div>

                                </div>



                                <div class="form-group">
                                    <label class="form-label">Longitud</label>
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-map" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud" name="longitud" value="<?php if (isset($brigada->longitud)) echo ucwords($brigada->longitud); ?>" placeholder="longitud" required autofocus>

                                    </div>

                                </div>

                            </div>






                        </div>


                </div>






                <div class="row  justify-content-center  mt-2 mb-2">
                    <div class="col-md-8 ">
                        <button class="btn btn-primary btn-block" id="boton" type="botton">Guardar</button>
                    </div>

                </div>


                </form>

                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php if (isset($id_usuario)) {
                                                                                    echo $id_usuario;
                                                                                } ?>">
                <input type="hidden" name="id_brigada" id="id_brigada" value="<?php if (isset($brigada)) {
                                                                                    echo $brigada->id_brigada;
                                                                                } ?>">



            </div>


        </div>
    </div>

    </div>
    </div>





</section>