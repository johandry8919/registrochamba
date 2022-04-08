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
                    <li><a href="javascript:void(0);"><i class="material-icons">home</i> Inicio</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Mi Perfil</li>
                </ol>
            </div>

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Progreso de Perfil
                            </h2>
                        </div>
                        <div class="body">

                            <div class="col-xs-12 col-md-12 text-center">
                                <?php if ($this->session->flashdata('mensajeexito')) { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->flashdata('mensajeerror')) { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
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
                                <?php } ?>
                            </div>
                                    <div class="col-md-12 text-center" style="display: inline;">
                                        <p class="font-bold"><span class="badge bg-teal" style="background:#37A77D !important;">&nbsp;</span> Información Completada
                                        <span class="badge bg-teal" style="background:#e65d01eb !important;" >&nbsp;</span> Información por Completar</p>
                                    </div>
                            <div class="col-xs-12 col-md-6 text-center">

                                <p class="font-bold requerido">Requerido (<span class="aste">*</span>)</p>

                                <?php if (isset($personal) and !empty($personal)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Datos Personales</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>datospersonales" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Datos Personales</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>datospersonales" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>


                                <?php if (isset($usuarioacademico) and !empty($usuarioacademico)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Formación Académica</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>formacionacademica" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Formación Académica</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>formacionacademica" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>

                                <?php if (isset($redessociales) and !empty($redessociales)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Redes Sociales</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>redessociales" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Redes Sociales</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>redessociales" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>

                                <?php if (isset($usuarioproductivo) and !empty($usuarioproductivo)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Productivo - Emprender<span class="aste">*</span> <a href="<?php echo base_url() ?>productivo" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Productivo - Emprender<span class="aste">*</span> <a href="<?php echo base_url() ?>productivo" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>

                                <?php if (isset($usuariobrigada) and !empty($usuariobrigada)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Organizativo - Brigadas<span class="aste">*</span> <a href="<?php echo base_url() ?>brigadas" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Organizativo - Brigadas<span class="aste">*</span> <a href="<?php echo base_url() ?>brigadas" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>

                                <?php if (isset($usuariovivienda) and !empty($usuariovivienda)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Social - Vivienda Joven<span class="aste">*</span> <a href="<?php echo base_url() ?>viviendajoven" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Social - Vivienda Joven<span class="aste">*</span> <a href="<?php echo base_url() ?>viviendajoven" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>

                                <?php if (isset($usuarioexperiencia) and !empty($usuarioexperiencia)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Experiencia Laboral</abbr> <a href="<?php echo base_url() ?>experiencialaboral" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible efectohover2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Experiencia Laboral</abbr> <a href="<?php echo base_url() ?>experiencialaboral" class="alert-link">Presiona Aquí</a>.
                                    </div>
                                <?php } ?>


                            </div>


                            <div class="col-xs-12 col-md-6 text-center">
                                <br><br>
                                <input type="text" class="knob" data-thickness="0.5" data-angleArc="250" data-angleOffset="-125" value="<?php echo $porcentaje_perfil; ?>" data-width="150" data-height="150" data-fgColor="<?php if ($porcentaje_perfil == 100) echo "#0069A6";
                                                                                                                                                                                                                            else echo "#EE0125"; ?>" data-readonly="true">
                                <?php
                                if ($porcentaje_perfil == 100) {
                                    echo '<div class="knob-label">Perfil completado en un 100%.</div>';
                                } else {
                                    echo '<div class="knob-label">Debe Completar el 100% de los datos requeridos para ser seleccionado.</div>';
                                }
                                ?>

                                <?php if (isset($porcentaje_perfil) and $porcentaje_perfil == 100) { ?>
                                    <br>
                                    <a target="_blank" href="<?php echo base_url() ?>descargarpdfusuario" class="btn bg-cyan btn-block btn-lg waves-effect">Descargar Curriculum</a>
                                <?php } ?>

                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <!--                                 <?php if (
                                                                            isset($usuarioexperiencia) and !empty($usuarioexperiencia)
                                                                            and isset($usuarioacademico) and !empty($usuarioacademico)
                                                                            and isset($personal) and !empty($personal)
                                                                            and isset($redessociales) and !empty($redessociales)
                                                                            and isset($usuarioproductivo) and !empty($usuarioproductivo)
                                                                            and isset($usuariobrigada) and !empty($usuariobrigada)
                                                                            and isset($redessociales) and !empty($redessociales)
                                                                        ) { ?>
                                <a target="_blank" href="<?php echo base_url() ?>descargarpdfusuario" class="btn bg-cyan btn-block btn-lg waves-effect">Descargar Curriculum</a>                                 
                                <?php } ?> -->
                            </div>
                        </div>


                        <div class="footer">
                            <h4>
                                Nota:
                                <small>Completa tu perfil para descargar el Curriculum Vitae.</small>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <h2>Chamba Juvenil</h2>

                                    <div class="info-box">
                                          
                                        <div class="icon bg-orange">
                                            <div class="chart chart-pie">
                                            <i class="material-icons">bubble_chart</i>
                                            </div>
                                        </div>
                                      <div class="content">
                                            <div class="text">Completar perfil Chamba Juvenil para poder se tomado en cuenta y descargar Curriculum Vitae</div>

                                                <div class='number'>10%</div>

                                            ?>
                                            
                                        </div> 
                                        
                                    </div>

                                </div>
                                
                            </div>

                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
                -->

                <!--                 
                <div class="col-md-2">
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Pago</strong> Usted a recibido un pago el dia <?php echo date('Y m d') . " "; ?><a href="javascript:void(0);" class="alert-link">Leer Mas</a>.
                    </div>                
                    <div class="alert bg-orange alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Pago</strong> Debe modificar sus datos bancarios <?php echo date('Y m d') . " "; ?><a href="javascript:void(0);" class="alert-link">Leer Mas</a>.
                    </div>
                    <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Pago</strong> Su pago a sido rechazado debe modificar sus datos bancarios <?php echo date('Y m d') . " "; ?><a href="javascript:void(0);" class="alert-link">Leer Mas</a>.
                    </div>                                           
                </div>   
                -->

            </div>
        </div>
    </section>



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
    <script src="<?php echo base_url(); ?>plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/widgets/infobox/infobox-2.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>


    <script>
        $(function() {
            /* jQueryKnob */

            $(".knob").knob({
                /*change : function (value) {
                 //console.log("change : " + value);
                 },
                 release : function (value) {
                 console.log("release : " + value);
                 },
                 cancel : function () {
                 console.log("cancel : " + this.value);
                 },*/
                draw: function() {

                    // "tron" case
                    if (this.$.data('skin') == 'tron') {

                        var a = this.angle(this.cv) // Angle
                            ,
                            sa = this.startAngle // Previous start angle
                            ,
                            sat = this.startAngle // Start angle
                            ,
                            ea // Previous end angle
                            , eat = sat + a // End angle
                            ,
                            r = true;

                        this.g.lineWidth = this.lineWidth;

                        this.o.cursor &&
                            (sat = eat - 0.3) &&
                            (eat = eat + 0.3);

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value);
                            this.o.cursor &&
                                (sa = ea - 0.3) &&
                                (ea = ea + 0.3);
                            this.g.beginPath();
                            this.g.strokeStyle = this.previousColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                            this.g.stroke();
                        }

                        this.g.beginPath();
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                        this.g.stroke();

                        this.g.lineWidth = 2;
                        this.g.beginPath();
                        this.g.strokeStyle = this.o.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                        this.g.stroke();

                        return false;
                    }
                }
            });
            /* END JQUERY KNOB */

            //INITIALIZE SPARKLINE CHARTS
            $(".sparkline").each(function() {
                var $this = $(this);
                $this.sparkline('html', $this.data());
            });



        });
    </script>


</body>

</html>