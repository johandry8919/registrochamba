<div class="overlay"></div>
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
                    <div class="btn btn-info"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
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


        <?php
        $brigadas1 = "";
        $brigadas2 = "";
        $brigadas3 = "";
        $brigadas4 = "";
        $brigadas5 = "";
        $brigadas6 = "";
        $brigadas7 = "";
        $brigadas8 = "";
        $brigadas9 = "";
        $brigadas10 = "";
        $brigadas11 = "";
        $brigadas12 = "";
        $brigadas13 = "";
        $brigadas14 = "";
        $brigadas15 = "";
        $brigadas16 = "";
        $brigadas17 = "";

        ?>

        <?php if (isset($brigadas)) {
            if (isset($brigadas) and $brigadas != "") {

                switch ($brigadas->id_brigada) {
                    case 1:
                        $brigadas1 = "checked";
                        break;
                    case 2:
                        $brigadas2 = "checked";
                        break;
                    case 3:
                        $brigadas3 = "checked";
                        break;
                    case 4:
                        $brigadas4 = "checked";
                        break;
                    case 5:
                        $brigadas5 = "checked";
                        break;
                    case 6:
                        $brigadas6 = "checked";
                        break;
                    case 7:
                        $brigadas7 = "checked";
                        break;
                    case 8:
                        $brigadas8 = "checked";
                        break;
                    case 9:
                        $brigadas9 = "checked";
                        break;
                    case 10:
                        $brigadas10 = "checked";
                        break;
                    case 11:
                        $brigadas11 = "checked";
                        break;
                    case 12:
                        $brigadas12 = "checked";
                        break;
                    case 13:
                        $brigadas13 = "checked";
                        break;
                    case 14:
                        $brigadas14 = "checked";
                        break;
                    case 15:
                        $brigadas15 = "checked";
                        break;
                    case 16:
                        $brigadas16 = "checked";
                        break;
                    case 17:
                        $brigadas17 = "checked";
                        break;
                }
            }
        } ?>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Brigadas</h4>
            </div>
            <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registrobrigadas">

                <div class=" container-fluid">
                    <div class="row mt-3 justify-content-center alalign-items-center">
                        <div class="col-12 col-lg-5">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas2 ?> id="id_brigada" name="id_brigada" type="radio" value="2" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Organización</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas3 ?> id="id_brigada" name="id_brigada" type="radio" value="3" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Formación Integral</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5  ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas4 ?> id="id_brigada" name="id_brigada" type="radio" value="4" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Deporte</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas5 ?> id="id_brigada" name="id_brigada" type="radio" value="6" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Recreación</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5  ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas6 ?> id="id_brigada" name="id_brigada" type="radio" value="6" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Cultura</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas7 ?> id="id_brigada" name="id_brigada" type="radio" value="7" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Economia Comunal</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas8 ?> id="id_brigada" name="id_brigada" type="radio" value="8" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Salud Joven</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas9 ?> id="id_brigada" name="id_brigada" type="radio" value="9" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Educación</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas10 ?> id="id_brigada" name="id_brigada" type="radio" value="10" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Ciencia y Tecnología</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas11 ?> id="id_brigada" name="id_brigada" type="radio" value="11" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Protección Social</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas12 ?> id="id_brigada" name="id_brigada" type="radio" value="12" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Movilización</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas13 ?> id="id_brigada" name="id_brigada" type="radio" value="13" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Comunicación</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas14 ?> id="id_brigada" name="id_brigada" type="radio" value="14" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Defensa Integral, Seguridad o Milicia</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas15 ?> id="id_brigada" name="id_brigada" type="radio" value="15" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Mujer</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas16 ?> id="id_brigada" name="id_brigada" type="radio" value="16" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Afrodescendinete</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 ">



                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas17 ?> id="id_brigada" name="id_brigada" type="radio" value="17" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">Otro</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-10">
                            <div class="form-group">
                                <label class="custom-switch form-switch me-5">
                                    <input <?php echo $brigadas1 ?> id="id_brigada" name="id_brigada" type="radio" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    <span class="custom-switch-description">ninguno</span>
                                </label>
                            </div>
                        </div>
                        <div class="container-login100-form-btn  pb-3 m-2">

                            <button id="boton" type="botton" class="login100-form-btn btn-primary">
                                Guardar
                            </button>
                        </div>




                    </div>


            </form>
        </div>

</section>