
<div class="container-fluid">
<?php if ($this->session->flashdata('mensajeerror')) { ?>
        <div class="row ocultal">
            <div class="col-md-12">
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
            </div>
        </div>
        <br>
    <?php } ?>
    <?php if($this->session->flashdata('mensajeexito')){ ?>
                <div class="row " >
                <div class="col-md-12">
                    <div class="alert alert-success"> <?php echo $this->session->flashdata('mensajeexito'); ?>
                   
                    </div>
                </div>
                </div>
                <br>
        <?php }?> 

<div class="card">


<div class="card-header">
    <h3 class="card-title">Editar Chambista</h3>
</div>
<div class="card-body">
    <div class="panel panel-primary">
        <div class="tab-menu-heading">
            <div class="tabs-menu">
                <!-- Tabs -->
                <ul class="nav panel-tabs panel-danger">
                    <li><a href="#tab13" class="active" data-bs-toggle="tab"><span><i class="fe fe-user me-1"></i></span>Datos Personales</a></li>
                    <li><a href="#tab14" data-bs-toggle="tab" class=""><span><i class="fe fe-calendar me-1"></i></span>Formacion academica</a></li>
                    <li><a href="#tab15" data-bs-toggle="tab"><span><i class="fe fe-settings me-1"></i></span>Productivo</a></li>
                    <li><a href="#tab16" data-bs-toggle="tab"><span><i class="fe fe-settings me-1"></i></span>Curriculum</a></li>

                </ul>
            </div>
        </div>
        <div class="panel-body tabs-menu-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab13">
                
               <?php     $this->load->view("principal/chambistas/datos_personales"); 
               ?>

                </div>
                <div class="tab-pane" id="tab14">

                <?php     $this->load->view("principal/chambistas/formacionacademica");?>

                <?php if(!isset($acausuario->id_usu_aca)):?>
            <footer>
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" alert alert-warning text-red">
                                <p>El usuario aun no ah Registrado Formacion acadimica</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif;?>
            </div>
                <div class="tab-pane" id="tab15">
                <?php     $this->load->view("principal/chambistas/productivo");?>

            </div>
                <div class="tab-pane" id="tab16">
                    
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
                                     <a target="_blank" href="<?php echo base_url()?>descargarpdfusuarios/<?php echo $id_usuario?>" class="btn bg-cyan btn-block btn-primary">Descargar Curriculum</a>                              
                                    <?php }else{ ?>
                                        <p class="alert alert-warning text-red">El usuario no ah   completado sus datos para poder descargar su CV</p>
                                       
                                        <?php }?>
                                </div>
                                <!-- <input type="hidden" name="codigo" id="codigo" value="<?php if(isset($id_usuario)){
                                    if(isset($acausuario)    ){
                                        echo $acausuario->codigo;
                                    }
                                }?>"> -->
                               
                            </div>
                            </div>
                        </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<link id="style" href="<?php echo base_url(); ?>assets/css/ocultal.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/mensajeexito.js"></script>
