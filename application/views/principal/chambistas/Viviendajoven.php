
    <section class="container">
    <div class="page">
             
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
                         <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         </div>
                     </div>
                 </div>
                 <br>
             <?php } ?>

             <div class="card" >
                 <div class="card-body">
                 <div class="header">
                     <div class="row clearfix">
                         <div class="col-md-12">
                             <h2 class="p-3 card-title">Vivienda Joven</h2>
                         </div>
                     </div>
                 </div>

                 <div class="text-center mt-5">

                     <h3 class="text-center card-text mb-3">Elije una opción del Plan Vivienda Joven:</h3>
                 </div>

                 <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registrovivienda" class=" " style="">

                    <div class="conatiner-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-ms-8 col-lg-6">
                            <div class="form-group">
                         <label class="custom-switch form-switch me-5">
                             <input type="radio" name="vivienda" id="vivienda1" value="1" class="custom-switch-input" checked>
                             <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                             <span class="custom-switch-description">Mi terreno propio Autoconstrucción</span>
                         </label>
                     </div>

                     <div class="form-group">
                         <label for="vivienda2" class="custom-switch form-switch me-5">
                             <input type="radio" name="vivienda" id="vivienda2" value="2" class="custom-switch-input">
                             <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                             <span class="custom-switch-description">Ampliación o remodelación de su vivienda</span>
                         </label>
                     </div>

                     <div class="form-group">
                         <label for="vivienda3" class="custom-switch form-switch me-5">
                             <input type="radio" name="vivienda" id="vivienda3" value="3" class="custom-switch-input">
                             <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                             <span class="custom-switch-description">Ampliación o remodelación de su vivienda</span>
                         </label>
                     </div>

                     <div class="form-group">
                         <label for="vivienda4" class="custom-switch form-switch me-5">
                             <input type="radio" name="vivienda" id="vivienda4" value="4" class="custom-switch-input">
                             <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                             <span class="custom-switch-description">Ninguno</span>
                         </label>
                     </div>

                     <div class="container-login100-form-btn pt-3 pb-3 m-2">
                         <?php if (isset($acausuario->id_usu_aca)) echo trim(ucwords($acausuario->id_usu_aca)); ?>
                         <button id="boton" type="botton" class="login100-form-btn btn-primary">
                             Guardar
                         </button>
                     </div>
                            </div>
                        </div>

                    </div>


                 </form>
                 </div>
                 
             </div>
             <div class="body">
                 <div id="real_time_chart" class="">


                 </div>


             </div>

         </div>


     </div>

    </section>
    