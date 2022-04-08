

<body class="theme-cyan">
    <!-- Page Loader -->
    <!--     <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader pl-size-xl">
                <div class="spinner-layer pl-purple">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere por favor...</p>
        </div>
    </div> -->
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


    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-pink">
                    <li><a href="<?php echo base_url(); ?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                    <li class="active"><a href="<?php echo base_url(); ?>cambiarclave"><i class="material-icons">library_books</i> Cambio de contraseña</a></li>
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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <div class="header">
                            <h2>
                                Cambio de Contraseña
                            </h2>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <form id="cambioClave" method="POST" action="<?php echo base_url(); ?>Cchambistas/cambiarClave">
                                        <!--<div class="msg">Inicio de Sesión</div>-->
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="clave_actual" name="clave_actual" placeholder="Contraseña actual" maxlength="16" required autofocus>
                                                <?php echo form_error('clave_actual'); ?>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Contraseña Nueva" maxlength="16" required autofocus>
                                                <?php echo form_error('password'); ?>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="new_password" name="new_password" maxlength="16" placeholder="Repetir Contraseña Nueva" required autofocus>
                                                <?php echo form_error('new_password'); ?>
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

                                            <div class="col-xs-6 col-md-offset-4">
                                                <button class="btn btn-block bg-green waves-effect" id="boton" type="botton">Guardar</button>
                                            </div>
                                        </div>

                                    </form>
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

    <script src="<?php echo base_url(); ?>js/admin.js"></script>

    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>

    <script src="<?php echo base_url(); ?>plugins/jquery-validation/localization/messages_es.js"></script>

    <script src="<?php echo base_url(); ?>js/pages/examples/cambiarclave.js"></script>

    <script src="<?php echo base_url(); ?>js/demo.js"></script>

</body>

</html>