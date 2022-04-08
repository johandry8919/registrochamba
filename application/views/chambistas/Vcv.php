<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
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
    </div>
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
                <li><a href="<?php echo base_url();?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                    <li class="active"><a href="<?php echo base_url();?>cv"><i class="material-icons">library_books</i>CV</a></li>
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
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CV virtual</h2>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <?php if(isset($usuarioexperiencia) and !empty($usuarioexperiencia) 
                                    and isset($usuarioacademico) and !empty($usuarioacademico)
                                    and isset($personal) and !empty($personal)
                                    ){?>
                                    <a target="_blank" href="<?php echo base_url()?>descargarpdfusuario" class="btn bg-cyan btn-block btn-lg waves-effect">Descargar Curriculum</a>                                 
                                    <?php }else{ ?>
                                        <p>Debes completar tus datos para poder descargar tu CV</p>
                                        <?php }?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="footer">
                            <h4>
                                Nota:
                                <small>Ir al listado para completar tu información. <a href="<?php echo base_url()?>inicio">Verificar</a></small>
                            </h4>
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

    <script src="<?php echo base_url(); ?>js/pages/examples/redessociales.js"></script>



</body>

</html>