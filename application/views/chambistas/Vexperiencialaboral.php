
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

    <?php include('nav.php');?>

    <?php include('sidebar.php');?>


    <section class="content">
        <div class="container-fluid">

        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-pink">
            <li><a href="<?php echo base_url();?>inicio"><i class="material-icons">home</i> Inicio</a></li>
                <li class="active"><a href="<?php echo base_url();?>experiencialaboral"><i class="material-icons">library_books</i> Experencia Laboral</a></li>
            </ol>
        </div>

        <?php if($this->session->flashdata('mensajeexito')){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">  <?php echo $this->session->flashdata('mensajeexito'); ?></div>
        </div>
        </div>
        <?php }?>
        <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                </div>
                </div>
        <?php }?> 
        <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                </div>
                </div>
        <?php }?> 
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card" style="overflow: auto;">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h2>Experiencia Laboral</h2>
                                </div>
                            </div>
                        </div>    
                        <div class="body">    
                            <div class="row">    
                                <?php
                                if(isset($usuarioexperiencia) and count($usuarioexperiencia) <'5'){?>
                                <div class="col-md-12">
                                    <div class="alert alert-warning"> <strong>Importante:</strong> Solo podras agregar máximo 5 opciones.</div>
                                </div>
                                <?php }
                                if(count($usuarioexperiencia) <'5'){?>
                                <div class="col-xs-12 col-sm-6">
                                    <a href="<?php echo base_url()?>experiencialaboralform" class="btn bg-cyan btn-block btn-lg waves-effect" style="margin: 20px auto;">Agregar</a>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                        <th>#</th>
                                        <th>Empresa </th>
                                        <th>Cargo</th>
                                        <th>Periodo</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    /* var_dump($usuarioacademico); */
                                    if(isset($usuarioexperiencia) and $usuarioexperiencia!=""){
                                            $i=1;
                                        foreach ($usuarioexperiencia as $key => $usuexp) {
                                            echo '<tr>';
                                                echo '<th scope="row">'.$i.'</th>';
                                                echo '<td>'.$usuexp->empresa.'</td>';
                                                echo '<td>'.$usuexp->cargo.'</td>';
                                                echo '<td>'.$usuexp->rango_fecha.'</td>';
                                                echo '<td>';
                                                    echo '<a href="'.base_url().'experiencialaboralform/'.$usuexp->id__exp_lab.'"><i class="material-icons">create</i></a>';
                                                    echo '<a href="'.base_url().'eliminarexp/'.$usuexp->id__exp_lab.'"><i class="material-icons">close</i></a>';
                                                echo '</td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                            
                                    }
                                ?>


                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </section>
    <script type="text/javascript"> var base_url = "<?php echo base_url();?>";</script>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
        <script src="<?php echo base_url();?>plugins/momentjs/moment.js"></script>
        <script src="<?php echo base_url();?>plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url();?>plugins/bootstrap-select/js/bootstrap-select.js"></script>     
    <script src="<?php echo base_url();?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
    <script src="<?php echo base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>       

    <script src="<?php echo base_url();?>js/admin.js"></script> 
    <script src="<?php echo base_url();?>js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
 <!--     <script src="<?php echo base_url();?>js/demo.js"></script> -->

    <script src="<?php echo base_url();?>plugins/jquery-validation/jquery.validate.js"></script>
    
    <script src="<?php echo base_url();?>plugins/jquery-validation/localization/messages_es.js"></script>

    <script src="<?php echo base_url();?>js/pages/examples/datospersonales.js"></script>



</body>

</html>