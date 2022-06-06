
    <section class="container">
       
       

         
 
    <?php if(!isset($id_usuario)):?>
        <?php if ($this->session->flashdata('mensajeerror')) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
            </div>
        </div>
        <br>
    <?php } ?>
     <?php  ?>
     <?php endif;?>
            <?php if ($this->session->flashdata('mensaje')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning"> <?php echo $this->session->flashdata('mensaje'); ?></div>
                    </div>
                </div>
                <br>
            <?php } ?>

            <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
                </div>
                <br>
        <?php }?> 
        
       
           
               
                    <div class="card">
                        <div class="header">
                            <div class="card-title h3 m-2">Curriculum : Vitual</div>

                        </div>
                        <div class="card-body">
                            <div id="real_time_chart" class="">

                            <div class="row text-center">
                            <div class="col-md-12 col-md-offset-3">
                                   <?php if(isset($usuarioexperiencia) and !empty($usuarioexperiencia) 
                                    and isset($usuarioacademico) and !empty($usuarioacademico)
                                    and isset($personal) and !empty($personal)
                                    ){?>
                                     <a target="_blank" href="<?php echo base_url()?>descargarpdfusuario" class="btn bg-cyan btn-block btn-lg waves-effect">Descargar Curriculum</a>                               
                                    <?php }else{ ?>
                                        <p class="alert alert-warning text-red">Debes completar tus datos para poder descargar tu CV</p>
                                       
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
              
      
    </section>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>
   

  





