
<form id="form-map">

<div class="row">
<div class="col-md-12 text-center">
<div class="btn-group">
        <button class="btn btn-primary" type="submit" name="1" id="consultarmap">Consultar</button>
        <button class="btn btn-info" type="submit" name="2" id="descargar_ reporte">Descargar Excel</button>

    </div>
</div>


<div class="col-3">
    <label class="form-label">Estado</label>
    <div class="form-group">
        <div class="form-line">
            <select class="form-control show-tick" data-parsley-error-message="Este campo es requerido" id="cod_estado" name="cod_estado" required>
                <option value="">Seleccione una opción</option>
                <option value="todos">Todos</option>
                <?php
                if (isset($estados)) {
                    foreach ($estados as $key => $estado) {

                        echo "<option value='" . $estado->codigoestado . "' data-latitud=" . $estado->latitud . "  data-longitud=" . $estado->longitud . " >" . $estado->nombre . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div class="col-md-3">
    <label class="form-label">Municipio</label>
    <div class="form-group">
        <div class="form-line">
            <select data-parsley-error-message="Este campo es requerido" required class="form-control show-tick" id="cod_municipio" name="cod_municipio" required data-parsley-error-message="Este campo es requerido">
                <option value="">Seleccione un Municipio</option>

            </select>
        </div>
        <?php
        if (isset($datos->codigomunicipio)) {
            echo '<small>Seleccione un estado para cambiar</small>';
        }
        ?>
    </div>

</div>

<div class="col-md-3">
    <label class="form-label">Parroquia</label>
    <div class="form-group">
        <div class="form-line">
            <select class="form-control show-tick" data-parsley-error-message="Este campo es requerido" id="cod_parroquia" name="cod_parroquia" required>
                <option value="">Seleccione una Parroquia</option>
                <?php
                if (isset($datos->codigoparroquia)) {
                    echo "<option selected value='" . $datos->codigoparroquia . "' data-latitud=" . $datos->latitud . "  data-longitud=" . $datos->longitud . "  >" . $datos->nombre_parroquia . "</option>";
                }
                ?>
            </select>
        </div>
        <?php
        if (isset($datos->codigoparroquia)) {
            echo '<small>Seleccione un estado para cambiar</small>';
        }
        ?>
    </div>

</div>
<div class="col-md-3">
    <label class="form-label">Fecha de registro</label>
    <div class="form-group">
        <div class="">
           
            <select data-parsley-error-message="Este campo es requerido"
             required class="form-control show-tick" id="rango_fecha" name="empresa" 
             required data-parsley-error-message="Este campo es requerido">
                <option value="1">Seleccione una fecha</option>
                <option value="2">Seleccionar fecha</option>

            </select>
            <small id="f-inicio"> </small>  <small id="f-fin"> </small>
        </div>


    </div>


    
</div>



    <!-- Nivel Académico -->
   
<div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="form-label">Nivel academico</label>
                                        
                                        </div>
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fa fa-address-card" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-address-card" aria-label="fa fa-address-card"></i>
                                                </a>
                                                <select class=" form-control show-tick" id="id_nivel_academico" name="id_nivel_academico" data-parsley-error-message="Este campo es requerido" required autofocus >
                                                    <option value="02">Todos</option>
                                                    <?php if(isset($academica)): ?>
                                                            <?php foreach ($academica as $key => $academicas):?>
                                                               
                                                                                                  
                                                                 
                                                                 
                                                                    <?php   
                                                                    echo "<option value='".$academicas->id_instruccion."'>".$academicas->nivel."</option>";
                                                                
                                                           endforeach;
                                                        endif;
                                                    ?>


                                                </select>
                                               

                                            </div>
                                          
                                    </div>


                                    <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-label">Área de Formación</label>
                                </div>

                                    <select class="form-control select2-selection__rendered" id="id_area_form"
                                        name="id_area_form">
                                        <option value="02">Todos</option>
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


</form>


    <!-- MODALCHAMBISTA -->
    <div class="modal fade" id="modal-fecha-chambista">
        <div class="modal-dialog modal-dialog-centered text-center modal-lg " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Datos rango de fecha</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                 
                 

                    <div class="row">
                    

                        <div class="col-6">
                            <div class="form-group">
                                        <label>Fecha de incio</label>
                                        <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-calendar" aria-hidden="true"></i>
                                                </a>
                                    <input 
                                     class="input100 border-start-0 ms-0 form-control" type="date" id="fecha_inicio" maxlength="200" name="fecha_fin" value="" placeholder="Fecha inicio" required autofocus>
                                 </div>
                              </div>

                        </div>
                      

                        <div class="col-6">
                            <div class="form-group">
                                        <label>Fecha de fin</label>

                                        <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="fe fe-calendar" aria-hidden="true"></i>
                                                </a>
                                    <input 
                                     class="input100 border-start-0 ms-0 form-control" type="date" id="fecha_fin" maxlength="200" name="fecha_fin" value="" placeholder="Fecha fin" required autofocus>
                          
                                    </div>
                          </div>
                        </div>

                    </div>
                    

          
          
              
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn-fecha">Seleccionar</button> <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    

 
    <div class="container">
        <div class="map" id="map"></div>
    </div>
    <br>
    <hr>

    <div class="container">
        <div class="card">
            <div class="card-body">
                
            </div>
            <div class="table-responsive tabla-resultados">

</div>

        </div>

    </div>