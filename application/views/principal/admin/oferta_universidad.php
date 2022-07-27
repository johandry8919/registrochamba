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
                        <!-- <div class="card-title">Oferta de empleo - <?php echo $oferta?></div> -->



                    </div>
                </div>


                <div class="card-body">

                    <div class=" text-center card-title">PERFIL ACADEMICO</div>


                    <form id="formulario-registro">


                        <div class="row">


                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label class="form-label">Área de Formación</label>

                                    <select class="form-control select2-selection__rendered" id="id_area_form"
                                        name="id_area_form">
                                        <option value="">Seleccione una opción</option>
                                        <?php
                                    foreach ($areaform as $key => $value) {
                                        if (isset($acausuario) && $value->id_area_form == $acausuario->id_area_form) {
                                            echo "<option selected value='" . $value->id_area_form . "'>$value->nombre</option>";
                                        } else {
                                            echo "<option value='" . $value->id_area_form . "'>$value->nombre</option>";
                                        }
                                    }
                                    ?>
                                    </select>

                                </div>

                            </div>


                            <div class="col-md-4">
                                <label class="form-label">Titularidad</label>
                                <div class="form-group">


                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="icon icon-graduation" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text"
                                            id="titularidad" maxlength="250" name="titularidad" value=""
                                            placeholder="Titularidad" required autofocus>

                                    </div>

                                </div>

                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Mencion</label>

                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="icon icon-graduation" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text"
                                            id="mencion" maxlength="250" name="mencion" value="" placeholder="Mencion"
                                            required autofocus>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class=" row mt-5 ">
                            <div class="text-center card-title">OFERTA ACADEMICA</div>
                            <div class=" col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Duracion</label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="fe fe-watch" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text"
                                            id="duracion" maxlength="30" name="duracion" value="" placeholder="Duracion"
                                            required autofocus>

                                    </div>

                                </div>



                            </div>
                            <!--col-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Cupos disponibles</label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="lnr lnr-pie-chart" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text"
                                            id="cupos_disponibles" name="cupos_disponibles" value="" placeholder="Cupos"
                                            required autofocus>

                                    </div>

                                </div>



                            </div>

                            <!--col-->





                            <div class="col-md-4">

                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descripcion De solicitud</label>
                                        <textarea class="form-control" id="id_descripcion" name="id_descripcion"
                                            rows="2"></textarea>
                                    </div>


                                </div>




                            </div>

                            <!--col-->

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="form-label">Edad </label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="fa fa-address-card" data-bs-toggle="tooltip" title=""
                                                data-bs-original-title="fa fa-address-card"
                                                aria-label="fa fa-address-card"></i>
                                        </a>
                                        <select class=" form-control show-tick" id="edad" name="edad"
                                            data-parsley-error-message="Este campo es requerido" required autofocus>
                                            <option value="">Selecciones una opción</option>

                                            <?php
                                            
                                            if(isset($rangoedad)): ?>
                                            <?php foreach ($rangoedad as $key => $rango):?>

                                            <?php  if($oferta && $rango->id_edad == $oferta->edad):?>



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
                            <div class="col-md-4">
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

                            <!--col-->



                        </div>
                        <!--row-->


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








    <input type="hidden" name="" id="id_empresa" value="<?php echo $id_empresa?>">
    <input type="hidden" name="id_rol" id="id_rol" value="<?php if(isset($id_rol)){
        echo $id_rol;
    }?>">



</section>