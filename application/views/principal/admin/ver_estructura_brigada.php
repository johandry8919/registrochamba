



    <div class="row clearfix">
        <div class="col-xs-4">
            <div class="card">
                <div class="card-header">
                    <div class="row clearfix">
                        <div class="card-title"> Estructura Brigada</div>



                    </div>
                </div>


                <div class="card-body">




                    <form id="formulario-registro">

                        <div class="row">

                            <div class="col-md-4 ">
                              
                                <div class="form-group">
                                <label class="form-label">¿A que estructura Pertenece?</label>
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="id_estructura" name="id_estructura"
                                            data-parsley-error-message="Este campo es requerido" required autofocus>
                                            <option value="">Seleccione una opción</option>
                                            <?php foreach($roles as $rol): ?>

                                            <option value="<?php  echo $rol->id_rol ?>"><?php  echo $rol->nombre ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>



                            <div class="col-md-4">
                           
                                <div class="form-group">
                                <label class="form-label">Nombre Estrutura / Brigada</label>
                                    <input class="input100 border-start-0 ms-0 form-control" type="text"
                                        id="nombre_brigada" maxlength="250" name="nombre_brigada" value=""
                                        placeholder="Brigada" required autofocus>

                                </div>

                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">sector/ comunidad</label>
                                    <input type="text" class="form-control" id="nombre_comunidad">


                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-4">
                           
                                <div class="form-group">
                                <label class="form-label"> Dirección Especifica</label>
                                    <div class="form-line">
                                        <input maxlength="255" rows="4" class="form-control no-resize zindex"
                                            class="direccion" name="direccion" id="direccion" maxlength="250"
                                            placeholder="Por favor indica donde resides..."
                                            data-parsley-error-message="Este campo es requerido" required
                                            autofocus><?php if (isset($datos->direccion)) echo $datos->direccion; ?></input>
                                    </div>
                                </div>




                            </div>



                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Estado</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick"
                                                data-parsley-error-message="Este campo es requerido" id="cod_estado"
                                                name="cod_estado" required>
                                                <option value="Estado">Seleccione una opción</option>
                                                <?php
                                        if(isset($estados)){
                                            foreach ($estados as $key => $estado) {
                                                if(isset($estado->codigoestado) and $estado->codigoestado == $datos->codigoestado){
                                                    echo "<option selected value='".$estado->codigoestado."'  data-latitud=".$estado->latitud."  data-longitud=".$estado->longitud." >".$estado->nombre."</option>";     
                                                }else{
                                                    echo "<option value='".$estado->codigoestado."' data-latitud=".$estado->latitud."  data-longitud=".$estado->longitud." >".$estado->nombre."</option>";
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
                                            <select data-parsley-error-message="Este campo es requerido" required
                                                class="form-control show-tick" id="cod_municipio" name="cod_municipio"
                                                required data-parsley-error-message="Este campo es requerido">
                                                <option value="municipio">Seleccione un Municipio</option>

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
                                            <select class="form-control show-tick"
                                                data-parsley-error-message="Este campo es requerido" id="cod_parroquia"
                                                name="cod_parroquia" required>
                                                <option value="parroquia">Seleccione una Parroquia</option>

                                            </select>
                                        </div>

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





