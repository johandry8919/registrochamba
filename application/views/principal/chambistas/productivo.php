<link id="style" href="<?php echo base_url(); ?>assets/css/ocultarmotrar.css" rel="stylesheet" />
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>



<section class="container">
    
    


    <?php if(!isset($id_usuario)):?>
        <?php if ($this->session->flashdata('mensajeerror')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
            </div>
        </div>
        <br>
    <?php } ?>
     <?php  ?>
     <?php endif;?>
    <?php if(!isset($id_usuario)):?>
        <?php if ($this->session->flashdata('mensajeerror')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
            </div>
        </div>
        <br>
    <?php } ?>
     <?php  ?>
     <?php endif;?>

     
   

    
    <?php if ($this->session->flashdata('mensaje')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning"> <?php echo $this->session->flashdata('mensaje'); ?></div>
            </div>
        </div>
        <br>
    <?php } ?>
    <div class="row">
        <div class="col-md-6 col-12 mb-2 ">
            <div class="alert alert-info "> <strong>Importante:</strong> Solo puedes seleccionar una opción </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xs-12">
            <div class="card">
                <div class="body">

                    <?php
                    if (isset($usuarioproductivo)) {

                   
                       
                    ?>
                        <div class="container-fluid " >
                            <div class="row  mt-2 mb-2  ">
                                <div class="col-12 border alert alert-success  col-md-6 col-lg-6 ">Seleccionaste: <?php
                                                                                                                    if (isset($usuarioproductivo) ) {
                                                                                                                        if($usuarioproductivo->nombre_chamba=="")
                                                                                                                         echo "Ninguno";
                                                                                                                         else
                                                                                                                        echo $usuarioproductivo->nombre_chamba;
                                                                                                                    }
                                                                                                                    ?>
                                    <?php
                                        if(!isset($id_usuario)){
                                            if (isset($usuarioproductivo)) 
                                                echo '<a href="' . base_url() . 'eliminarchamba/' . $usuarioproductivo->id_productivo . '"><i class=" btn-close fs-6" aria-label="Close"></i></a>';
                                            
                                        }else{
                                            if (isset($usuarioproductivo) ) {

                                                echo '<a href="' . base_url() . 'eliminarchambas/' . $usuarioproductivo->id_productivo . '"><i class=" btn-close fs-6" aria-label="Close"></i></a>';
                                            }
                                        }
                                    ?>
                                </div>

                                <div class="col-1 col-lg-1 ">


                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="card">

                        <div class="body ">
                            <div class="card-header">
                                <div class="card-title">Productivo</div>
                            </div>
                            <form id="formacionacademica" method="POST" action="<?php if(isset($id_usuario)){
                                echo base_url() . 'Cadmin/registroproductivo/'.$id_usuario;
                            }else{
                                echo base_url() . 'Cchambistas/registroproductivo';
                            }?>">
                                <div class="card-title text-center">¿En cuál Chamba deseas incorporarte?</div>
                                <div class="form-group">
                                    <select class="form-select" aria-label="Default select example" data-placeholder="Choose one" id="tipo_chamba" name="tipo_chamba" required>
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

                                    <div class="container">
                                        <div class="row justify-content-center ">

                                            <!-- Chamba Vuelta al Campo -->
                                            <div class="col-md-12">
                                                <div id="chamba1" class="ocultarmotrar">

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
                                                            <input type="radio" id="terreno_siembra" name="terreno_siembra" class="custom-switch-input" checked="" value="no">

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
                                                            <input value="no" type="radio" id="sembrando" name="sembrando" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>



                                                    <div class="form-group">
                                                        <b>Indica que rubros produces</b>
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text"
                                                                placeholder=" que rubros produces"
                                                                class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php  if (isset($usuarioproductivo)) echo $usuarioproductivo->rubro ?>">
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
                                                            <input value="no" type="radio" id="financiamiento" name="financiamiento" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>



                                                </div>

                                            </div>
                                            <!-- Chamba Pesquera y Acuícola -->
                                            <div class="col-md-12">
                                                <div id="chamba2" class="ocultarmotrar">
                                                    <div class="form-label">¿Eres inspector?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="pesquera_inspector_pescador" name="pesquera_inspector_pescador" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" id="pesquera_inspector_pescador" name="pesquera_inspector_pescador" class="custom-switch-input" checked="" value="no">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>


                                                    <div class="form-label">¿Requieres refrigeración?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="pesquera_refrigeracion" name="pesquera_refrigeracion" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="pesquera_refrigeracion" name="pesquera_refrigeracion" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-label">¿Requiere Financiamiento?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="pesquera_financiamiento" name="pesquera_financiamiento" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="pesquera_financiamiento" name="pesquera_financiamiento" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Chamba Emprender e Innovar -->

                                            <div class="col-md-12">
                                                <div id="chamba3" class="row ocultarmotrar">
                                                   <div class="col-md-4">
                                                   <div class="form-label">¿Tienes un emprendimiento?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="emprendimiento" name="emprendimiento" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="emprendimiento" name="emprendimiento" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>
                                                   </div>

                                                   <div class="col-md-4">
                                                   <div class="form-label">¿Deseas iniciar un emprendimiento??</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="iniciar_emprendimiento" name="iniciar_emprendimiento" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="iniciar_emprendimiento" name="iniciar_emprendimiento" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>
                                                   </div>

                                                   <div class="col-md-4">
                                                   <div class="form-label">¿Estas registrado como empresa?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="emprendimiento_empresa" name="emprendimiento_empresa" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="emprendimiento_empresa" name="emprendimiento_empresa" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>
                                                   </div>

                                                 
                                                  
                                                  <div class="col-md-4">
                                                  <div class="form-label">¿Requiere Financiamiento?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="financiamiento-emprendimiento" name="financiamiento-emprendimiento" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="financiamiento-emprendimiento" name="financiamiento-emprendimiento" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>

                                                  </div>
                                                  <!-- Estás Desarrollando un Proyecto Innovador o Tecnológico  -->
                                                  <div class="col-md-6">
                                                  <div class="form-label list-inline">¿Estás Desarrollando un Proyecto Innovador o Tecnológico?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="proyecto_tecnologico" name="proyecto_tecnologico" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" value="no" id="proyecto_tecnologico" name="proyecto_tecnologico" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>

                                                  </div>
                                                 
                                             


                                                  <!-- Qué estás Desarrollando o Fabricando? -->


                                                  <div class="row">
                                                <div class="col-12 col-lg-6">
                                               
                                                <div class="form-label">Qué estás Desarrollando o Fabricando?</div>
                                                
                                                <input
                                                class="input200 border-start-0 form-control ms-0" name="queEstaDesarroLLando"
                                                id="queEstaDesarroLLando" type="text" placeholder="Qué estás Desarrollando o Fabricando?"
                                                
                                                value="<?php
                                                        if(isset($usuarioproductivo) and $usuarioproductivo != "") {
                                                         echo "$usuarioproductivo->que_esta_desarrollando";} ?>"

                                                >
                                             

                                                
                                          
                                                
                                                </div>
                                                     <!-- ¿En cuál área te desarrollas como Emprendedor? -->


                                                     <div class=" col-12 col-md-6 ">
                                               
                                               <div class="form-label">¿En cuál área te desarrollas como Emprendedor?</div>
                                                      <select required class="form-control show-tick" id="emprendedor_nombre" name="emprendedor_nombre">
                                                           <option value="0">Seleccione una Profesión u Oficio</option>

                                                          
                                                    
                                                        <?php 
                                                      
                                                        
                                                        if(isset($emprendedor)): ?>
                                                           
                                                           <?php foreach ($emprendedor as $key => $profesion):?>
                                                              
                                                               <?php  if($registroviejo->id_profesion_oficio == $profesion->id):?>
                                                               
                                                                
                                                                
                                                                   <?php    echo "<option selected value='".$profesion->id."'>".$profesion->Area."</option>";     
                                                              else:
                                                                   echo "<option value='".$profesion->id."'>".$profesion->Area."</option>";
                                                               endif;
                                                          endforeach;
                                                       endif;
                                                   ?>
                                                       </select>   
                                            
                                             
                                              
                                               </div>

                                                <!-- A qué Sector Productivo Pertenece? -->
                                                <div class="col-md-6 mt-3">
                                                
                                              
                                                <div class="form-label">A qué Sector Productivo Pertenece?</div>
                                             
                                                <select required class="form-control show-tick " id="Sector_Productivo" name="SectorProductivo">
                                                            <option value="0">Seleccione una Profesión u Oficio</option>

                                                           
                                                     
                                                         <?php if(isset($sectorProductivo)): ?>
                                                            <?php foreach ($sectorProductivo as $key => $Sector):?>
                                                               
                                                                <?php  if($registroviejo->id_profesion_oficio == $Sector->id):?>
                                                                
                                                                 
                                                                 
                                                                    <?php    echo "<option selected value='".$Sector->id."'>".$Sector->productivo."</option>";     
                                                               else:
                                                                    echo "<option value='".$Sector->id."'>".$Sector->productivo."</option>";
                                                                endif;
                                                           endforeach;
                                                        endif;
                                                    ?>
                                                        </select>   
                                                </div>

                                             
                                                <!-- ¿En Cuál de los Servicios Profesionales desea Incorporarse a Través de la Gran Misión Chamba Juvenil? -->

                                                <div class="col-md-8 mt-3">
                                               
                                                <div class="form-label">¿En Cuál de los Servicios Profesionales desea Incorporarse a Través de la Gran Misión Chamba Juvenil?</div>
                                                <select required class="form-control show-tick" id="idservicios" name="idservicios">
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
                                                </div>

                                          

                                            </div>



                                            <div class="col-md-12">
                                                <div id="chamba4" class="ocultarmotrar">

                                                    <div class="form-label">¿Dispones de Espacios o Terrenos?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="agrourbana-terrenos" name="agrourbana-terrenos" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input type="radio" id="agrourbana-terrenos" name="agrourbana-terrenos" class="custom-switch-input" checked="" value="no">

                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>




                                                    <div class="form-label">¿Deseas activar patio productivo?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input value="si" type="radio" id="agrourbana-patio" name="agrourbana-patio" class="custom-switch-input">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input value="no" type="radio" id="agrourbana-patio" name="agrourbana-patio" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>



                                                    <div class="form-group">
                                                        <b>Indica tu produccion de ciclos cortos</b>
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="rubro" name="rubro" maxlength="100" required autofocus value="<?php if (isset($registroviejo->nombres)) echo ucwords($registroviejo->nombres); ?>">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-label">¿Requiere Financiamiento?</div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch me-5">
                                                            <input type="radio" id="financiamiento-agrourbana" name="financiamiento-agrourbana" class="custom-switch-input" value="si">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-switch form-switch">
                                                            <input value="no" type="radio" id="financiamiento-agrourbana" name="financiamiento-agrourbana" class="custom-switch-input" checked="">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                            <span class="custom-switch-description">No</span>
                                                        </label>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 mt-3 mb-3">
                                       
                                        <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="codigo" id="codigo" value="<?php if(isset($id_usuario)){
                                    if(isset($registroviejo)    ){
                                        echo $registroviejo->codigo;
                                    }
                                }?>"> 
                                       
                                   
                            

                            </form>





                        </div>
                    </div>

                   
                    




                    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
                   



</section>