<?php      ?>



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
                            <div class="card-title">Oferta de empleo - <?php if(isset($empresa->nombre_razon_social)){
                                echo $empresa->nombre_razon_social;
                            }?></div>


                        </div>
                    </div>


                    <div class="card-body">

                        <div class=" text-center card-title">PERFIL ACADEMICO</div>


                        <form id="formulario-registro">


                            <div class="row">


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
                                    <label class="form-label"> Profesión Oficio</label>
                                    <div class="form-group">



                                        <select required class="form-control show-tick" id="id_profesion"
                                            name="id_profesion">
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




                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Área de Formación</label>

                                        <select class="form-control" id="id_area_form" name="id_area_form">
                                            <option value="">Seleccione una opción</option>
                                            <?php
                                    foreach ($areaform as $key => $value) {
                                        if ($value->id_area_form == $acausuario->id_area_form) {
                                            echo "<option selected value='" . $value->id_area_form . "'>$value->nombre</option>";
                                        } else {
                                            echo "<option value='" . $value->id_area_form . "'>$value->nombre</option>";
                                        }
                                    }
                                    ?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class=" row mt-5 ">
                                <div class="text-center card-title">DATOS DEL EMPLEO</div>
                                <div class=" col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Tiempo de experiencias</label>
                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="fe fe-watch" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text"
                                                id="experiencia_laboral" maxlength="250" name="nombres" value=""
                                                placeholder="Experiencia laboral" required autofocus>

                                        </div>

                                    </div>



                                </div>
                                <!--col-->
                                <div class="col-md-4">
                                        <div class="form-group ">
                                        <label class="form-label">Edad </label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                                <select class=" form-control show-tick border-start-0 ms-0" id="edad" name="edad" data-parsley-error-message="Este campo es requerido" required autofocus >
                                                    <option value="">Selecciones una opción</option>
                                                    <?php if(isset($rangoedad)): ?>
                                                            <?php foreach ($rangoedad as $key => $rango):?>
                                                               
                                                                <?php  if($rango->id_edad == $datos->edad):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$rango->id_edad."'>".$rango->edad."</option>";     
                                                               else:
                                                                    echo "<option value='".$rango->id_edad."'>".$rango->edad."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>


                                                </select>
                                               

                                            </div>
                                         
                                        
                                        </div>
                                        
                                          
                                    </div>


                                <!--col-->


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="form-label">Sexo</label>

                                        <select class="form-control" id="sexo" name="sexo">
                                            <option value="">Seleccione una opción</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>

                                    </div>
                                </div>





                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Descripcion de la oferta</label>

                                        <textarea class="form-control" id="descripcion_oferta"> </textarea>

                                    </div>



                                </div>

                                <!--col-->
                                
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Cargo</label>
                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text"
                                                id="cargo" maxlength="30" name="apellidos" value="" placeholder=""
                                                required autofocus>

                                        </div>

                                    </div>



                                </div>

                                
                                <!--col-->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="form-label">Cantidad de oferta</label>
                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="mdi mdi-account" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text"
                                                id="cantidad_oferta" maxlength="30" name="nombres" value=""
                                                placeholder="Cantidad" required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <!--col-->


                            </div>
                            <!--row-->


                    </div>






                    <div class="row  justify-content-center  mt-2 mb-2">
                        <div class="col-md-8 ">
                            <button class="btn btn-primary btn-block" id="boton" type="botton">Guardar</button>
                        </div>

                    </div>

                    <input type="hidden" name="id_rol" id="id_rol" value="<?php if(isset($id_rol)){
        echo $id_rol;
    }?>">

                    </form>
                </div>


            </div>
        </div>
    
    </div>
    </div>





    <input type="hidden" name="" id="id_empresa" value="<?php echo $id_empresa?>">


</section>