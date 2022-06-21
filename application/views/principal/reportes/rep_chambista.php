
                        <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">

                        <div class="row">

                     
                            <div class="col-3">
                            <label  class="form-label">Estado</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" 
                                        
                                        data-parsley-error-message="Este campo es requerido"
                                        id="cod_estado" name="cod_estado" required>
                                        <option value="">Seleccione una opción</option>
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

                            <div class="col-md-3">
                                <label  class="form-label">Municipio</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select
                                        data-parsley-error-message="Este campo es requerido" required
                                        class="form-control show-tick" id="cod_municipio" name="cod_municipio"    required                                     data-parsley-error-message="Este campo es requerido">
                                        <option value="">Seleccione un Municipio</option>
                                    
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($datos->codigomunicipio)){
                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                        }
                                    ?>                                               
                                </div>
                                
                            </div>

                            <div class="col-md-3">
                                <label  class="form-label">Parroquia</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick"
                                        data-parsley-error-message="Este campo es requerido"
                                        id="cod_parroquia" name="cod_parroquia" required>
                                        <option value="">Seleccione una Parroquia</option>
                                        <?php
                                            if(isset($datos->codigoparroquia)){
                                                echo "<option selected value='".$datos->codigoparroquia."' data-latitud=".$datos->latitud."  data-longitud=".$datos->longitud."  >".$datos->nombre_parroquia."</option>";     
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if(isset($datos->codigoparroquia)){
                                        echo '<small>Seleccione un estado para cambiar</small>'; 
                                        }
                                    ?>
                                </div>
                                
                            </div>

                        </div>
                        <div class="col-md-3">
                            <label  class="form-label">Empresa</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select
                                    data-parsley-error-message="Este campo es requerido" required
                                    class="form-control show-tick" id="cod_municipio" name="cod_municipio"    required                                     data-parsley-error-message="Este campo es requerido">
                                    <option value="">Seleccione un empresa</option>
                                
                                    </select>
                                </div>
                                                                     
                            </div>
                            
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>