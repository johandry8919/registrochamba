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
                            <!-- <div class="card-title">Oferta de empleo - <?php echo $empresa->nombre_razon_social?></div> -->


                        </div>
                    </div>


                    <div class="card-body">

                        <div class=" text-center card-title">PERFIL ACADEMICO</div>


                        <form id="formulario-registro">


                            <div class="row">


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="form-label">Mencion</label>

                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="icon icon-graduation" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 ms-0 form-control" type="text"
                                                id="mencion" maxlength="250" name="mencion" value="<?php if(isset($oferta)) echo ucwords($oferta->mencion);?>"
                                                placeholder="Mencion" required autofocus>

                                        </div>

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
                                                id="titularidad" maxlength="250" name="titularidad" value="<?php if(isset($oferta)) echo ucwords($oferta->mencion);?>"
                                                placeholder="titularidad" required autofocus>

                                        </div>

                                    </div>

                                </div>




                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Área de Formación</label>

                                        <select class="form-control" id="id_area_form" name="id_area_form" >
                                        <option value="">Seleccione una opción</option>
                                        <?php
                                foreach ($areaform as $key => $value) {
                                    if ($value->id_area_form == $oferta->id_area_formacion) {
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
                                                id="duracion" maxlength="30" name="duracion" value="<?php if(isset($oferta)) echo ucwords($oferta->duracion);?>"
                                                placeholder="Duracion" required autofocus>

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
                                                id="cupos_disponibles" name="cupos_disponibles" value="<?php if(isset($oferta)) echo ucwords($oferta->cupos_disponibles);?>" placeholder="Cupos"
                                                required autofocus>

                                        </div>

                                    </div>



                                </div>

                                <!--col-->


                            





                                <div class="col-md-4">

                                <div class="form-group">
                                     <label class="form-label">Descripcion de solicitud</label>

                                        <textarea class="form-control" id="id_descripcion" name="id_descripcion"
                                        placeholder="edad" required
                                                autofocus ><?php echo $oferta->descripcion_solicitud?> </textarea>
                                </div>
                                   



                                </div>

                                <!--col-->

                                <div class="col-md-4">
                                        <div class="form-group ">
                                        <label class="form-label">Edad </label>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <select class=" form-control show-tick" id="edad" name="edad" data-parsley-error-message="Este campo es requerido" required autofocus >
                                                    <option value="">Selecciones una opción</option>
                                                    <?php if(isset($rangoedad)): ?>
                                                            <?php foreach ($rangoedad as $key => $rango):?>
                                                               
                                                                <?php  if($rango->id_edad == $oferta->edad):?>
                                                                
                                                                 
                                                                 
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

                                        <select class="form-control" id="sexo" name="sexo" >
                                        <option value="">Seleccione una opción</option>
                                        <option <?php if($oferta->sexo=="Indiferente") echo "selected" ?>
                                            value="Indiferente">Indiferente</option>
                                        <option <?php if($oferta->sexo=="Masculino") echo "selected" ?>
                                            value="Masculino">Masculino</option>
                                        <option <?php if($oferta->sexo=="Femenino") echo "selected" ?> value="Femenino">
                                            Femenino</option>
                                    </select>

                                    </div>



                                </div>

                                <!--col-->



                            </div>
                            <!--row-->

                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="form-label">Estatus oferta</label>

                                        <select class="form-control" id="estatus" name="estatus" >
                                        
                                            <?php
                                            foreach ($estatus as $key => $value) {
                                                if ($value->id_estatus_oferta == $oferta->id_estatus) {
                                                    echo "<option selected value='" . $value->id_estatus_oferta . "'>$value->descripcion</option>";
                                                } else {
                                                    echo "<option value='" . $value->id_estatus_oferta . "'>$value->descripcion</option>";
                                                }
                                            }
                                            ?>
                                    </select>

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






    <input type="hidden" name="id_area_formacion" id="id_area_formacion" value="<?php echo $oferta->id_area_formacion?>">
    <input type="hidden" name="id_rol" id="id_rol" value="<?php if(isset($id_rol)){
        echo $id_rol;
    }?>">
    <!-- <input type="hidden" name="id_solicitud" id="id_solicitud"  value="<?php echo $oferta->id_solicitud; ?>" > -->


</section>