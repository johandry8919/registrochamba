<section>
     <?php if ($this->session->flashdata('mensajeexito')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?></div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('mensajeerror')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                    </div>
                </div>
                <br>
            <?php } ?>
            <?php if ($this->session->flashdata('mensaje')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                    </div>
                </div>
                <br>
            <?php } ?>
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h2>Productivo</h2>
                                </div>
                                
                            </div>
                        </div>    
                        <div class="body">    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning"> <strong>Importante:</strong> Solo puedes seleccionar una opción </div>
                                </div>
                            </div>
                            <?php 
                            if(isset($usuarioproductivo)){
                            ?>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr class="success">
                                                <!-- <th>#</th> -->
                                                <th>Seleccionaste </th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            /* var_dump($usuarioacademico); */
                                            if(isset($usuarioproductivo) and $usuarioproductivo!=""){
                                                    echo '<tr>';
                                                        /* echo '<th scope="row">1</th>'; */
                                                        echo '<td>'.$usuarioproductivo->nombre_chamba.'</td>';
                                                        echo '<td>';

                                                            echo '<a href="'.base_url().'eliminarchamba/'.$usuarioproductivo->id_chamba.'"><i class="material-icons">close</i></a>';
                                                        echo '</td>';
                                                    echo '</tr>'; 
                                    
                                            }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>   
                            <?php } ?>   
    <div class="card">
        <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registroproductivo">

         <div class="container">
         <div class="row ">
                <div class="col-12">
                    <div class="card-header">¿En cuál Chamba deseas incorporarte?</div>
                        <div class="form-group ">
                            <select class="form-control select2 form-select" data-placeholder="Choose one" id="tipo_chamba" name="tipo_chamba" required>
                                <option value="">Seleccione una opción</option>
                                <option value="0">-Ninguno-</option>
                                <option value="1">Chamba Vuelta al Campo</option>
                                <option value="2">Chamba Pesquera y Acuícola</option>
                                <option value="3">Chamba Emprender e Innovar</option>
                                <option value="4">Chamba Minera</option>
                                <option value="5">Chamba Digital</option>
                                <option value="6">Chamba Agrourbana</option>
                                <option value="7">Chamba Técnica y Oficios</option>
                                <option value="8">Chamba Delivery</option>
                            </select>
                        </div>
                </div>
                <!-- Chamba Vuelta al Campo -->
                <div id="vuelta-al-campo" class="ocultarMostrar" style="display: none;">
               
                    <div class="form-label">¿Dispone de terreno para la siembra?</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input type="radio" id="terreno_siembra" name="terreno_siembra" class="custom-switch-input" value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input type="radio" 
                            id="terreno_siembra"
                            name="terreno_siembra" 
                            class="custom-switch-input" 
                            checked=""
                            value="no">
                            
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>

            


                        <div class="form-label">¿Actualmente estas sembrando?</div>
                        <div class="form-group">
                            <label class="custom-switch form-switch me-5">
                                <input value="si" type="radio" id="sembrando" name="sembrando" class="custom-switch-input">
                                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                <span class="custom-switch-description">Si</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="custom-switch form-switch">
                                <input 
                                value="no" 
                                type="radio" 
                                id="sembrando" 
                                name="sembrando" 
                                class="custom-switch-input" 
                                checked="">
                                <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                <span class="custom-switch-description">No</span>
                            </label>
                        </div>

                
              
                    <div class="form-group">
                        <b>Indica que rubrio produces</b>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
                            </div>
                        </div>
                    </div>
               
               
                    <div class="form-label">¿Requiere Financiamiento?</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input type="radio" id="financiamiento" name="financiamiento" class="custom-switch-input" value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input 
                            value="no"
                            type="radio" 
                            id="financiamiento" 
                            name="financiamiento" class="custom-switch-input" checked="">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>

              

            </div>
             <!-- Chamba Pesquera y Acuícola -->
             <div id="pesquera-y-acuicola" class="ocultarMostrar" style="display: none;">
                    <div class="form-label">¿Eres inspector?</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input 
                            type="radio" 
                            id="pesquera_inspector_pescador" name="pesquera_inspector_pescador" class="custom-switch-input" 
                            value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input 
                            type="radio" 
                            id="pesquera_inspector_pescador" name="pesquera_inspector_pescador" class="custom-switch-input" 
                            checked=""
                            value="no"
                            >
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>

               
                <div class="form-label">¿Requieres refrigeración?</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input 
                            type="radio" id="pesquera_refrigeracion" name="pesquera_refrigeracion" class="custom-switch-input" 
                            value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input type="radio" 
                            value="no"
                            id="pesquera_refrigeracion" name="pesquera_refrigeracion"
                            class="custom-switch-input" 
                            checked="">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>
                    <div class="form-label">¿Requiere Financiamiento?</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input 
                            type="radio" 
                            id="pesquera_financiamiento" name="pesquera_financiamiento" class="custom-switch-input" 
                            value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input 
                            type="radio"
                            value="no"
                            id="pesquera_financiamiento" name="pesquera_financiamiento" class="custom-switch-input" 
                            checked="">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>

             </div>


                <div id="emprender-innovar" class="ocultarMostrar">
                    <div class="form-label">¿Tienes un emprendimiento?</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input 
                            type="radio" 
                            id="emprendimiento" name="emprendimiento" class="custom-switch-input" 
                            value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input 
                            type="radio" 
                            value="no"
                            id="emprendimiento" 
                            name="emprendimiento" class="custom-switch-input" 
                            checked="">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>

                </div>
                <div class="">
                    <div class="form-label">¿Deseas iniciar un emprendimiento??</div>
                    <div class="form-group">
                        <label class="custom-switch form-switch me-5">
                            <input 
                            type="radio" 
                            id="iniciar_emprendimiento" name="iniciar_emprendimiento"
                            class="custom-switch-input" 
                            value="si">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">Si</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch form-switch">
                            <input 
                            type="radio" 
                            value="no"
                            id="iniciar_emprendimiento" name="iniciar_emprendimiento"
                            class="custom-switch-input" 
                            checked="">
                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                            <span class="custom-switch-description">No</span>
                        </label>
                    </div>

                </div>

             </div>


            </div>
         </div>
           
          
          

            <div class="row">

                <div class="row" id="loader_romel" style="display: none;">
                    <div class="col-md-4 col-md-offset-5">
                        <div class="preloader pl-size-xl">
                            <div class="spinner-layer">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-md-offset-3">
                    <!--<input type="hidden" id="id_usu_aca" name="id_usu_aca" value="<?php if (isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca)); ?>">-->
                    <button class="btn btn-block bg-green waves-effect" id="boton" type="botton">Guardar</button>
                </div>
            </div>
        </form>

    </div>
</section>