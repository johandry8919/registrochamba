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
                            <div class="card-title">REGISTRO DE EMPRESAS U ORGANISMO PÚBLICOS</div>


                        </div>
                    </div>


                    <div class="card-body">


                        <form>
                            <div class="row">
                                <div class=" text-center card-title">DATOS DE LA EMPRESA U ORGANISMO</div>

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
                                    <label class="form-label">sector economico o servicios</label>
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
                                    <label class="form-label">Activida Economica</label>
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
                                <div class="text-center card-title">DATOS DEL REPRESENTANTE DE LA EMPRESA</div>
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

                       
                                <!--col-->

                           
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


                    </div>




                    <div class="row ">

                        <div class="row justify-content-center mt-5 ">
                            <div class="col-lg-10 ">
                                <div class="small">Seleccione en el mapa su ubicación exacta</div>
                                <div class="" id="map"></div>

                                <pre id="coordinates" class="coordinates"></pre>
                            </div>

                            <div class="col-md-8">
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