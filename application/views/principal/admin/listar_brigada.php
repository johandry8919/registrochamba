        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista estructura brigada</h3>

                    </div>
                    <div class="card-body">
                    <div class="row">


                    <div class="col-2">
                                <div class="form-group">
                                <label class="form-label">Rol</label>
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="id_estructura" name="id_estructura"
                                            data-parsley-error-message="Este campo es requerido" required autofocus>
                                            <option value="">Seleccione una opción</option>
                                            <option value="00">Todos</option>
                                            <?php foreach($roles as $rol): ?>

                                            <option value="<?php  echo $rol->id_rol ?>"><?php  echo $rol->nombre ?>
                                            </option>

                                             

                                                    






                                            <?php endforeach; ?>
                                        </select>
                                    </div>
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

<div class="col-md-2">
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
<div class="col-md-2 pt-6">


    <div class="btn-group">
        <button class="btn btn-primary" type="submit" name="1" id="consultarmap">Consultar</button>

    </div>
</div >
</div>
                        <br>
                        <div class="row">
                        <div class="col-4">
                            
                        <div class="form-group">
                            <div class="form-line">
                            
                          
                            </div>
                        </div>
                        </div>

                        </div>



                        <div class="table-responsive">
                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th name="bstable-actions">Acciones</th>
                                        <th class="wd-15p border-bottom-0">Rol</th>
                                        <th class="wd-15p border-bottom-0">Estructura brigada</th>
                                        <th class="wd-15p border-bottom-0"> Nombre sector</th>
                                      
                                        <th class="wd-20p border-bottom-0">Estado</th>
                                        <th class="wd-15p border-bottom-0">Municipio</th>
                                        <th class="wd-10p border-bottom-0">parroquia</th>

                                    </tr>
                                </thead>
                   
                                <tbody>
                                    
                                    
                                </tbody>
                      
                            </table>
                        </div>
                    </div>
         
                </div>
            </div>

            
        </div>




        <!-- End Row -->