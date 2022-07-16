        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista estructura brigada</h3>

                    </div>
                    <div class="card-body">
                    <div class="row">


                    <div class="col-2">
    <label class="form-label">Roles</label>
    <select class="form-control show-tick" data-parsley-error-message="Este campo es requerido" id="cod_estado" name="cod_estado" required>
                <option value="">Seleccione una opción</option>
                
            </select>
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
                                <?php if(isset($brigada)):?>
                                    <tbody>
                                    
                                        <?php foreach ($brigada as $brigadas):?>
                                        <tr>
                                            <td>
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-sm btn-primary ">
                                                    <span class="fs-6">
                                                        <a class="text-white"
                                                            href="<?php echo base_url()?>admin/editar/estructuras/<?php echo $brigadas->id_brigada?>">&#9998;</a>
                                                    </span>
                                                </button>

                                                <button type="button" class="btn btn-sm btn-success ">
                                                    <span class="fs-6">
                                                        <a class="text-white"
                                                            href="<?php echo base_url().ruta_actual()?>/ver/estructura-brigada/<?php echo $brigadas->id_brigada ?>">
                                                            <i class="side-menu__icon fe fe-eye"></i>
                                                            
                                                        </a>
                                                    </span>
                                                </button> 
                                            </div>
                                            
                                        </td>
                                        <td><?php  echo $brigadas->nombre_rol ?></td>
                                        <td> <?php  if(isset($brigadas->nombre_brigada)){
                                            echo $brigadas->nombre_brigada;
                                        } ?></td>
                                        <td><?php  echo $brigadas->nombre_sector ?></td>
                                        <td><?php  echo $brigadas->nombre_estado ?></td>
                                        <td><?php  echo $brigadas->municipio ?></td>    
                                        <td><?php  echo $brigadas->parroquia?> </td>                             
                                  
                                      

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <?php endif;?>
                            </table>
                        </div>
                    </div>
         
                </div>
            </div>

            
        </div>




        <!-- End Row -->