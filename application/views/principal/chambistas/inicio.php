


    <div class="col-xs-12 col-md-12 text-center ">
        <?php if ($this->session->flashdata('mensajeexito')) { ?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?>

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
            <div class="row ">
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
                    <div class="card-title animate__animated animate__bounce"> Progreso de Perfil:</div>
                    
                    

                </div>


                <div class="container-fluid">

                    <div class="col-12">
                        <div class="progress-bar progress-bar-striped progress-bar-animated   mb-2 <?php if ($porcentaje_perfil == 100) {
                                                                                                            echo "bg-green-1";
                                                                                                        } else {
                                                                                                            echo "bg-blue-1";
                                                                                                        } ?>  " style="width: <?php echo $porcentaje_perfil; ?>%; ">

                            <?php echo $porcentaje_perfil; ?>%

                        </div>
                        <?php
                        if ($porcentaje_perfil == 100) {
                            echo '<div mb-3 class="card-text">Perfil completado en un 100%.</div>';
                        } else {
                            echo '<div class="card-text">Debe Completar el 100% de los datos requeridos para ser seleccionado.</div>';
                        }
                        ?>


                    </div>



                </div>
                <!-- Datos Personales -->
                <div class="col-12 col-lg-12 mt-2">

                    <?php if (isset($personal) and !empty($personal)) { ?>

                        <div role="alert" class=" col-12  d-grid gap-2 text-wrap">
                        <button class="btn btn-green mb-2">
                           
                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>datospersonales" class="link-primary text-white"><p  data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV" class="card-title">Datos Personales</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>datospersonales" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip" data-bs-original-title="Ver Datos Personales " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>
                           
                           </button>

                        </div>
                    <?php } else { ?>


                        <div class="col-12 col-lg-12  d-grid gap-2 ">

                            <button class="btn btn-warning-light mb-2">
                            
                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>datospersonales" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Datos Personales</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>datospersonales" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de Datos Personales"></i></a>
                               </div>
                                </div>
                            </button>

                        </div>



                    <?php } ?>
                    <!-- Formación Académica -->

                    <?php
               
                    
                    if (isset($usuarioacademico) and !empty($usuarioacademico)) { ?>
                        <div class="col-12  d-grid gap-2 text-wrap">
                            <button class="btn btn-green mb-2">
                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>formacionacademica" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title">Formación Académica</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>formacionacademica" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip" data-bs-original-title="Ver Formación Académica " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>
                               

                     
                           
                            </button>
                           
                            

                        </div>
                    <?php } else { ?>
                        <div class="col-12  d-grid gap-2 text-wrap">
                            <button class="btn btn-warning-light mb-2">
                           
                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>formacionacademica" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Formación Académica</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>formacionacademica" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de Formación Académica"></i></a>
                               </div>
                                </div>
                            </button>

                        </div>
                    <?php } ?>

                    <?php if (isset($redessociales) and !empty($redessociales)) { ?>
                        <div class="col-12  d-grid gap-2 text-wrap ">
                            <button class="btn btn-green mb-2">
                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>redessociales" class="link-primary text-white"><p  data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title">Redes Sociales</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>redessociales" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip"  data-bs-original-title="Ver Redes Sociales " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>
                               

                           
                            </button>

                        </div>
                    <?php } else { ?>
                        <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-warning-light mb-2">
                               

                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>redessociales" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Redes Sociales</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>redessociales" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de Redes Sociales"></i></a>
                               </div>
                                </div>
                            </button>

                        </div>

                    <?php } ?>
                    <!-- Productivo - Emprender -->
                        
                    <?php if (isset($usuarioproductivo) and !empty($usuarioproductivo)) { ?>

                        <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-green mb-2">
                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>productivo" class="link-primary text-white"><p  data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title">Productivo - Emprender</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>productivo" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip"  data-bs-original-title="Ver Productivo - Emprender " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>
                             
                               
                                
                            </button>

                        </div>
                    <?php } else { ?>
                        <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-warning-light mb-2">
                               
                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>productivo" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Productivo - Emprender</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>productivo" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de productivo "></i></a>
                               </div>
                                </div>
                            </button>

                        </div>
                    <?php } ?>
                    <!-- Organizativo - Brigadas -->

                    <?php if (isset($usuariobrigada) and !empty($usuariobrigada)) { ?>
                        <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-green mb-2">
                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>brigadas" class="link-primary text-white"><p  data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title">Organizativo - Brigadas</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>brigadas" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip" title="" data-bs-original-title="Ver Organizativo - Brigadas " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>
                              
                          
                            </button>

                        </div>
                    <?php } else { ?>
                        <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-warning-light mb-2">
                               

                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>brigadas" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Organizativo - Brigadas</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>brigadas" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de Organizativo - Brigadas "></i></a>
                               </div>
                                </div>
                            </button>

                        </div>
                    <?php } ?>
                    <!-- Social - Vivienda Joven -->
                    <?php if (isset($usuariovivienda) and !empty($usuariovivienda)) { ?>
                        <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-green mb-2">
                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>viviendajoven" class="link-primary text-white"><p  data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title">Social - Vivienda Joven</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>viviendajoven" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip" title="" data-bs-original-title="Ver Social - Vivienda Joven " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>
                                
                               

                           
                            </button>

                        </div>
                                    
                                <?php } else { ?>
                                    <div role="alert" class="col-12  d-grid gap-2 ">
                            <button class="btn btn-warning-light mb-2">
                                

                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>viviendajoven" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Social - Vivienda Joven</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>viviendajoven" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de Vivienda Joven "></i></a>
                               </div>
                                </div>
                            </button>

                        </div>
                               
                                <?php } ?>

                                <!-- Experiencia Laboral -->
                                <?php if (isset($usuarioexperiencia) and !empty($usuarioexperiencia)) { ?>
                                    <div class="col-12  d-grid gap-2 ">
                            <button class="btn btn-green mb-2">
                                <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>experiencialaboral" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title">Experiencia Laboral</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>experiencialaboral" class="link-primary text-white"><i class="fe fe-thumbs-up h3" data-bs-toggle="tooltip" data-bs-original-title="Ver Experiencia Laboral " aria-label="fe fe-thumbs-up"></i></a>
                               </div>
                                </div>

                           
                            </button>

                           

                        </div>
                                 
                                <?php } else { ?>
                                    <div role="alert" class="col-12  d-grid gap-2 ">
                            <button class="btn btn-warning-light mb-2">
                               

                            <div class="row">
                                <div class="col-10 col-md-11">
                               <a href="<?php echo base_url() ?>experiencialaboral" class="link-primary text-white"><p data-bs-toggle="tooltip" data-bs-original-title="Se añade a tu CV"  class="card-title text-red">Experiencia Laboral</p></a>

                              

                               </div>

                               <div class="col-1">
                        

                               <a href="<?php echo base_url() ?>experiencialaboral" class="link-primary text-white"><i class="fe fe-info h3 text-red" data-bs-toggle="tooltip" data-bs-original-title="Completa los Datos de Experiencia Laboral "></i></a>
                               </div>
                                </div>

                            </button>

                        </div>
                               
                                   
                                <?php } ?>
                    <!-- Descargar Curriculum -->

                    <div class="col-12">
                        <?php if (isset($porcentaje_perfil) and $porcentaje_perfil == 100) { ?>
                            <br>
                            <a target="_blank" href="<?php echo base_url() ?>descargarpdfusuario" class="btn bg-cyan btn-block btn-lg waves-effect">Descargar Curriculum</a>
                        <?php } ?>
                    </div>




                </div>



            </div>

            <div class="container">

                <div class="row justify-content-center">

                    <div class=" col-lg-4 col-md-12">
                        <p class="font-bold"><span class="badge bg-teal" style="background:#37A77D !important;">&nbsp;</span> Información Completada

                    </div>
                    <div class="col-lg-4 col-md-12 ">
                        <span class="badge bg-teal" style="background:#e65d01eb !important;">&nbsp;</span> Información por Completar</p>
                    </div>
                </div>
            </div>



        </div>
        <div class="footer">
            <h4>
                Nota:
                <small>Completa tu perfil para descargar el Curriculum Vitae.</small>
            </h4>
        </div>
    </div>




<script>
       
    $(function() {
        /* jQueryKnob */

        $(".knob").knob({

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