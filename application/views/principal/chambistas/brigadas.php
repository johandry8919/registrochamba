<section class="container">
    <div class="body">
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
                                    <h2>Brigadas</h2>
                                </div>
                            </div>
                        </div>    
                        <div class="body">   
                            <?php
                            if (!isset($brigadas)) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning"> <strong>Importante:</strong> Por favor selecciona una opción para pertenecer a una brigada.</div>
                                </div>
                            </div>
                            <?php }?>
                            <?php
                            if (isset($brigadas)) {
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
                                                if (isset($brigadas) and $brigadas != "") {
                                                    echo '<tr>';
                                                    /* echo '<th scope="row">1</th>'; */
                                                    echo '<td>' . $brigadas->nombre_brigadas . '</td>';
                                                    echo '<td>';

                                                    echo '<a href="' . base_url() . 'eliminarbrigada/' . $brigadas->id_brigada . '"><i class="material-icons">close</i></a>';
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
        <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registrobrigadas">

<div class="conatiner mt-5"  style="margin: auto;">
    <div class="row m-5 ">
        <div class="col-12 col-lg-6 ">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="2" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Organización</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="3" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Formación Integral</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6 ">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="4" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Deporte</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="6" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Recreación</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6 ">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="6" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Cultura</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="7" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Economia Comunal</span>
                </label>
            </div>
        </div>
          <div class="col-12 col-lg-6">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="8" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Salud Joven</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="9" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Educación</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="10" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Ciencia y Tecnología</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="11" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Protección Social</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="12" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Movilización</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="13" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Comunicación</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="14" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Defensa Integral, Seguridad o Milicia</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="15" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Mujer</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="16" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Afrodescendinete</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            


        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio" value="17" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">Otro</span>
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-12">
        <div class="form-group">
                <label  class="custom-switch form-switch me-5">
                    <input id="id_brigada" name="id_brigada" type="radio"  value="1" class="custom-switch-input">
                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                    <span class="custom-switch-description">ninguno</span>
                </label>
            </div>
        </div>
   
    <div class="container-login100-form-btn pt-3 pb-3 m-2">
                                 
                                    <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                        Guardar
                                    </button>
                                </div>

</div>


</form>
        </div>
    </div>

</section>