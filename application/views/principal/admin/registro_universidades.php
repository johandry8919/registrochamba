<?php      ?>



<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<section class="content">
    <div class="container-fluid">



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
                            <div class="card-title">REGISTRO DE CENTRO DE ESTUDIO Y UNIVERSIDADES</div>


                        </div>
                    </div>


                    <div class="card-body">


                        <form>
                            <div class="row">
                                <div class=" text-center card-title">DATOS DE LA INSTITUCION</div>

                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">NOMBRE O RAZÓN SOCIAL</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30" name="nombres" value="" placeholder="NOMBRE O RAZÓN SOCIAL" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30" name="nombres" value="" placeholder="NOMBRE O RAZÓN SOCIAL" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11" name="telf_movil" value="" placeholder="Ingrese su telefono" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email">
                                        </div>
                                    </div>


                                </div>


                                <div class="col-md-4 ">
                                    <label class="form-label">Sector De Especializacion</label>
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
                                <div class="col-md-4 ">
                                    <label class="form-label">Tipo De institucion</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="id_movimiento_religioso" name="id_movimiento_religioso">
                                                <option value="">Seleccione una opción</option>
                                                <option value="1">PÚBICA</option>
                                                <option value="2">PRIVADA</option>
                                                <option value="3">MIXTA</option>

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
                                            <input id="instagram" name="instagram" maxlength="100" autofocus value="<?php if (isset($redesusuario->instagram)) echo ucwords($redesusuario->instagram); ?>" type="text" class="form-control" placeholder="instagram" aria-label="instagram" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-twitter" data-bs-toggle="tooltip" data-bs-original-title="fe fe-twitter" aria-label="fe fe-twitter"></i></span>
                                            <input id="twitter" name="twitter" maxlength="100" autofocus value="<?php if (isset($redesusuario->twitter)) echo ucwords($redesusuario->twitter); ?>" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fe fe-facebook" data-bs-toggle="tooltip" data-bs-original-title="fe fe-facebook" aria-label="fe fe-facebook"></i></span>
                                            <input id="facebook" name="facebook" maxlength="200" autofocus value="<?php if (isset($redesusuario->facebook)) echo ucwords($redesusuario->facebook); ?>" type="text" class="form-control" placeholder="facebook" aria-label="facebook" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--row -->


                            <div class=" row mt-5 ">
                                <div class="text-center card-title">DATOS DEL REPRESENTANTE DE LA INSTITUCION</div>
                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Nombre</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30" name="nombres" value="" placeholder="Ingrese su Nombre" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos" maxlength="30" name="apellidos" value="" placeholder="Ingreses sus Apellidos" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="apellidos" maxlength="30" name="apellidos" value="" placeholder="Cédula de Identidad" required autofocus>

                                        </div>

                                    </div>





                                </div>
                                <!--col-->


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="form-label">Nivel de Estudios</label>

                                        <select class="form-control" id="id_instruccion" name="id_instruccion">
                                            <option value="">Seleccione una opción</option>
                                            <!-- <option selected value='1'>Educación Básica Primaria</option>  -->
                                            <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '1') {
                                                        echo 'selected';
                                                    } ?> value='1'>Educación Básica Primaria</option>
                                            <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '2') {
                                                        echo 'selected';
                                                    } ?> value='2'>Educación Básica Secundaria</option>
                                            <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '3') {
                                                        echo 'selected';
                                                    } ?> value='3'>Bachillerato / Educación Media</option>
                                            <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '4') {
                                                        echo 'selected';
                                                    } ?> value='4'>Educación Técnico/Profesional</option>
                                            <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '5') {
                                                        echo 'selected';
                                                    } ?> value='5'>Universidad</option>
                                            <option <?php if (isset($acausuario->id_instruccion) and $acausuario->id_instruccion == '1') {
                                                        echo 'selected';
                                                    } ?> value='6'>Postgrado</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Carrera Profesional</label>
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Profesión u Oficio </label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fa fa-ship" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-ship" aria-label="fa fa-ship"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="" maxlength="30" name="" value="" placeholder="Profesión u Oficio" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_movil" maxlength="11" name="telf_movil" value="" placeholder="Ingrese su telefono" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="telf_local" maxlength="30" name="telf_local" value="<?php if (isset($registroviejo->telf_local)) echo ucwords($registroviejo->telf_local); ?>" placeholder="Telefono Local" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Característica del empleo</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30" name="nombres" value="" placeholder="Característica del empleo" required autofocus>

                                        </div>

                                    </div>



                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Fecha de Nacimiento</label>
                                        <div class="wrap-input100 validate-input input-group">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fe fe-calendar" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="date" id="datepicker" name="datepicker" value="" placeholder="F. Nacimiento" required autofocus>

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
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="edad" maxlength="2" name="edad" value="" placeholder="edad" required autofocus>

                                        </div>

                                    </div>
                                </div>
                                <!--col-->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Cargo</label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombres" maxlength="30" name="nombres" value="" placeholder="Cargo" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <!--col-->


                            </div>
                            <!--row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Estado</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="cod_estado" name="cod_estado">
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                if (isset($estados)) {
                                                    foreach ($estados as $key => $estado) {
                                                        if (isset($registroviejo->codigoestado) and $registroviejo->codigoestado == $estado->codigoestado) {
                                                            echo "<option selected value='" . $estado->codigoestado . "'>" . $estado->nombre . "</option>";
                                                        } else {
                                                            echo "<option value='" . $estado->codigoestado . "'>" . $estado->nombre . "</option>";
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
                                            <select class="form-control show-tick" id="cod_municipio" name="cod_municipio">
                                                <option value="">Seleccione un Municipio</option>
                                                <?php
                                                if (isset($registroviejo->municipio)) {
                                                    echo "<option selected value='" . $registroviejo->codigomunicipio . "'>" . $registroviejo->municipio . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                        if (isset($registroviejo->estado)) {
                                            echo '<small>Seleccione un estado para cambiar</small>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Parroquia</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="cod_parroquia" name="cod_parroquia">
                                                <option value="">Seleccione una Parroquia</option>
                                                <?php
                                                if (isset($registroviejo->parroquia)) {
                                                    echo "<option selected value='" . $registroviejo->codigoparroquia . "'>" . $registroviejo->parroquia . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                        if (isset($registroviejo->estado)) {
                                            echo '<small>Seleccione un estado para cambiar</small>';
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>


                    </div>







                    <div class="row  mt-5 ">
                        <div class="col-md-5">

                            <label class="form-label"> Dirección Especifica</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea maxlength="255" rows="1" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="250" placeholder="Por favor indica donde resides..."><?php if (isset($registroviejo->direccion)) echo $registroviejo->direccion; ?></textarea>
                                </div>
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <label class="form-label">Latitud</label>
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-map" aria-hidden="true"></i>
                                        </a>
                                        <input readonly class="input100 border-start-0 ms-0 form-control" type="text" id="latitud" name="latitud" value="<?php if (isset($registroviejo->latitud)) echo ucwords($registroviejo->latitud); ?>" placeholder="latitud" required autofocus>

                                    </div>

                                </div>



                                <div class="form-group">
                                    <label class="form-label">Longitud</label>
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-map" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" readonly type="text" id="longitud" name="longitud" value="<?php if (isset($registroviejo->longitud)) echo ucwords($registroviejo->longitud); ?>" placeholder="longitud" required autofocus>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6  ">
                            <div class="card-text">Seleccione en el mapa su ubicación exacta</div>
                            <div class="" id="map"></div>

                            <pre id="coordinates" class="coordinates"></pre>
                        </div>








                    </div>



                    <div class="row  justify-content-center  mt-2 mb-2">
                        <div class="col-md-8 ">
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
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>