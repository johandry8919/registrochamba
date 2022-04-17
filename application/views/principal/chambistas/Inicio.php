<section class="container">
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
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <div class="card-title"> Progreso de Perfil</div>
                </div>

                <div>
                    <p class="font-bold requerido border">Requerido (<span class="aste">*</span>)</p>
                </div>

                <div class="col-12">
                    <?php if (isset($personal) and !empty($personal)) { ?>
                        <div class="alert bg-green alert-dismissible efectohover" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <abbr title="Se añade a tu CV ">Datos Personales</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>datospersonales" class="alert-link">Listo</a>.
                        </div>
                    <?php } else { ?>


                        <div class="col-12 col-lg-12  d-grid gap-2 ">
                        
                            <button class="btn btn-warning-light mb-1"><a href="<?php echo base_url() ?>datospersonales" class="link-danger"><abbr title="Se añade a tu CV ">Datos Personales</abbr>: Presiona Aquí</a></button>

                        </div>



                    <?php } ?>

                    <?php if (isset($usuarioacademico) and !empty($usuarioacademico)) { ?>
                                    <div class="alert bg-green alert-dismissible efectohover" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <abbr title="Se añade a tu CV ">Formación Académica</abbr><span class="aste">*</span> <a href="<?php echo base_url() ?>formacionacademica" class="alert-link">Listo</a>.
                                    </div>
                                <?php } else { ?>
                                    <div class="col-12  d-grid gap-2 text-wrap">
                                    <button class="btn btn-warning-light mb-1"><a href="<?php echo base_url() ?>formacionacademica" class="link-danger "><abbr title="Se añade a tu CV ">Formación Académica</abbr>: Presiona Aquí</a>
                                    </button>

                                    </div>
                                <?php } ?>

                                <?php if (isset($redessociales) and !empty($redessociales)) { ?>
                                    <div class="col-12  d-grid gap-2 text-wrap">
                                    <button class="btn btn-green mb-1"><a href="<?php echo base_url() ?>redessociales" class="link-primary"><abbr title="Se añade a tu CV ">redessociales</abbr>: Presiona Aquí</a>
                                    </button>

                                    </div>
                                <?php } else { ?>
                                    <div class="col-12  d-grid gap-2 ">
                                    <button class="btn btn-warning-light mb-1"><a href="<?php echo base_url() ?>redessociales" class="link-danger"><abbr title="Se añade a tu CV ">redessociales</abbr>: Presiona Aquí</a>
                                    </button>

                                    </div>
                                <?php } ?>

                </div>


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