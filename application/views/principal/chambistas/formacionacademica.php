<section class="container">

    <!-- <?php print_r($usuarioacademico)?> -->

        <?php if(!isset($id_usuario)){?>
            <div class="row">
        <div class="mb-2 col-12 col-md-6 text-wrap">

            <?php
            if (isset($usuarioacademico) and count($usuarioacademico) < '5') {
            ?>

                <div class="alert alert-info"> <strong>Importante:</strong> Solo podras agregar máximo 5 opciones.</div>

            <?php
            }
            ?>

        </div>


       
    </div>
        <?php }?>



    <div class="card">


        <div class="body">
            <div class="card-header">
                <div class="card-title">Formación Académica</div>
            </div>

            <div class="col-12 ">
                <?php
                if (isset($usuarioacademico) and count($usuarioacademico) < '5') {
                ?>

                    <div class="">
                        <!--oculta el btn si existe un id-->
                        <?php if (!isset($id_usuario)) { ?>
                            <a href="<?php 
                                        if(!isset($id_usuario)){
                                            echo base_url()."formacionacademicaform";
                                        }
                                       
                                    ?>" class="btn btn-primary btn-block " style="margin: 20px auto;">Agregar</a>
                        
                        
                    </div>
                <?php } ?>
                <?php
                }
                ?>

            </div>
            <div class="col-12 col-md-11 col-lg-11 ">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Centro Educativo</th>
                                        <th>Nivel Educativo</th>
                                        <th>Período</th>

                                        <th name="bstable-actions">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        if (isset($usuarioacademico) and $usuarioacademico != "") {
                                            $i = 1;
                                            foreach ($usuarioacademico as $key => $usuaca) {
                                                echo '<tr>';
                                                echo '<th scope="row">' . $i . '</th>';
                                                echo '<td>' . $usuaca->centro_educ . '</td>';
                                                echo '<td>' . $usuaca->nivel . ' - ' . $usuaca->nombre . '</td>';
                                                echo '<td>' . $usuaca->rango_fecha . '</td>';
                                                echo '<td >';
                                                // hacer una condicion if para que muestre el boton de editar
                                                if (isset($id_usuario)) {
                                                    echo '<div class="btn-list">';
                                                    echo '<button type="button" class="btn btn-sm btn-primary m-auto  ">';
                                                    echo '<span class="fs-6">';
                                                    echo '<a class="text-white" href="' . base_url() . 'admin/editar_formacion/' . $usuaca->id_usu_aca . '">&#9998;</a>';
                                                    echo '</span ">';
    
                                                    echo '</button ">';
    
                                                    
    
                                                    echo '</div">';
                                                }else{
                                                    echo '<div class="btn-list">';
                                                    echo '<button  type="button" class="btn btn-sm btn-primary ">';
                                                    echo '<span class="fs-6">';
                                                    echo '<a class="text-white" href="' . base_url() . 'formacionacademicaform/' . $usuaca->id_usu_aca . '">&#9998;</a>';
                                                    echo '</span ">';
    
                                                    echo '</button ">';
    
                                                    echo '<button  type="button" class="btn  btn-sm btn-danger ">';
                                                    echo '<span class="fs-6">';
                                                    echo '<a class="text-white" href="' . base_url() . 'eliminaracademico/' . $usuaca->id_usu_aca . '">&#9747;</a>';
                                                    echo '</span ">';
    
                                                    echo '</button ">';
    
                                                    echo '</div">';
                                                }

                                                
                                        


                                                echo '</td>';
                                                echo '</tr>';
                                                $i++;
                                            }
                                        }
                                        ?>
                                       
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">
            <?php if(!isset($id_usuario)):?>
                <?php if($this->session->flashdata('mensajeexito')){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">  <?php echo $this->session->flashdata('mensajeexito'); ?></div>
        </div>
        </div>
        <?php }?>
     <?php  ?>
     <?php endif;?>
           
        
        <?php if(!isset($id_usuario)):?>
            <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?></div>
                </div>
                </div>
        <?php }?> 
     <?php  ?>
     <?php endif;?>
        <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
                </div>
        <?php }?> 
            </div>



        </div>

        
</section>

<!-- <input type="hidden" name="id_usu_aca" id="id_usu_aca" value="<?php if(isset($id_usuario)){
    if($acausuario){
        echo $acausuario->id_usu_aca;
    }
}
                                ?> -->

