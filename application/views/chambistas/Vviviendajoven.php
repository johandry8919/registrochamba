<body class="theme-cyan">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>

    <?php include('nav.php'); ?>

    <?php include('sidebar.php'); ?>

    <style>
        .dtp-picker-calendar,
        .dtp-actual-num {
            display: none;
        }

        .select2-container--default .select2-selection--single {
            border: 0 !important;
            border-bottom: 2px solid #1f91f3 !important;
        }
    </style>

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-pink">
                    <li><a href="<?php echo base_url(); ?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                    <li class="active"><a href="<?php echo base_url(); ?>viviendajoven"><i class="material-icons">library_books</i> Vivienda Joven</a></li>
                </ol>
            </div>

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
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h2>Vivienda Joven</h2>
                                </div>
                            </div>
                        </div>    
                        <div class="body">       
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <!--                                     <div class="alert alert-warning"> <strong>Importante:</strong> Solo puedes seleccionar una opción </div>
 -->
                                </div>
                            </div>
                            <?php
                            if (isset($viviendajoven)) {
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
                                                if (isset($viviendajoven) and $viviendajoven != "") {
                                                    echo '<tr>';
                                                    /* echo '<th scope="row">1</th>'; */
                                                    echo '<td>' . $viviendajoven->tipo_vivienda . '</td>';
                                                    echo '<td>';

                                                    echo '<a href="' . base_url() . 'eliminarvivienda/' . $viviendajoven->vivienda . '"><i class="material-icons">close</i></a>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>

                            <form id="formacionacademica" method="POST" action="<?php echo base_url(); ?>Cchambistas/registrovivienda">


                                <div class="row clearfix zindex">
                                    <div class="col-md-4 col-md-offset-3">
                                        <b>Elije una opción del Plan Vivienda Joven:</b><br>
                                        <div class="form-group">
                                            
                                            <div class="radio">
                                                <label>
                                                <input  type="radio" name="vivienda" id="vivienda1" value="1"  />
                                                    <label for="vivienda1">Mi terreno propio Autoconstrucción</label>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                <input  type="radio" name="vivienda" id="vivienda2" value="2"  />
                                                    <label for="vivienda2">Ampliación o remodelación de su vivienda</label>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                <input  type="radio" name="vivienda" id="vivienda3" value="3" />
                                                    <label for="vivienda3">Adjudicación GMVV</label>
                                                </label>
                                            </div>
                                            <!--<div class="radio">
                                                <label>
                                                    <input  type="radio" name="estudio" id="estudio4" value="3"  />
                                                    <label for="estudio4">AVV jovenes(asamblea viviendo Venezolano de Jovenes)</label>
                                                </label>
                                            </div> -->
                                            <div class="radio">
                                                <label>
                                                <input  type="radio" name="vivienda" id="vivienda4" value="4" />
                                                    <label for="vivienda4">Ninguno</label>
                                                </label>
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
                        <div class="body">
                            <div id="real_time_chart" class="">


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>plugins/momentjs/moment.js"></script>
    <script src="<?php echo base_url(); ?>plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <!--     <script src="<?php echo base_url(); ?>js/demo.js"></script> -->

    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>

    <script src="<?php echo base_url(); ?>plugins/jquery-validation/localization/messages_es.js"></script>

    <script src="<?php echo base_url(); ?>js/pages/examples/formacionacademica.js"></script>



</body>

</html>