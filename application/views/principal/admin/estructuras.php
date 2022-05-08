<?php if($this->session->flashdata('mensajeexito')){ ?>
        <div class="row" id="mensajeexito">
        <div class="col-md-12">
            <div class="alert alert-success text-center">  <?php echo $this->session->flashdata('mensajeexito'); ?>
            
            </div>
        </div>
        </div>
        <?php }?>
        <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?>
                    
                    </div>
                </div>
                </div>
                <br>
        <?php }?> 
        <?php if($this->session->flashdata('mensaje')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info"> <?php echo $this->session->flashdata('mensaje'); ?>
                   
                    </div>
                </div>
                </div>
                <br>
        <?php }?> 
<section class="container">


    <div class="card">
        <div class="card-body">
            <div class="card-header h2">Registro de Estructuras</div>

            


                        
                            <div class="table-responsive">
                            <table class="table table-bordered border text-nowrap text-center mb-0" id="basic-edit">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Cedula</th>
                                        <th>Telefono</th>
                                        <th>Correo Eletronico</th>
                                        <th>Tipo de estructura</th>
                                        

                                        <th name="bstable-actions">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        if (isset($estruturas) and $estruturas ) {
                                            $i = 1;
                                            foreach ($estruturas as $key => $usuaca) {
                                                echo '<tr>';
                                                echo '<th scope="row">' . $i . '</th>';
                                                echo '<td>' .$usuaca->nombre . '</td>';
                                                echo '<td>' . $usuaca->apellidos.'</td>';
                                                echo '<td>' .$usuaca->cedula . '</td>';
                                                
                                               
                                                echo '<td>' . $usuaca->tlf_celular.'</td>';
                                                
                                                
                                                echo '<td>' .$usuaca->email . '</td>';
                                                echo '<td>' .$usuaca->tipo_estructura . '</td>';
                                                echo '<td >';
                                                
                                                echo '<div class="btn-list">';
                                                echo '<button type="button" class="btn btn-sm btn-primary ">';
                                                echo '<span class="fs-6">';
                                                echo '<a class="text-white" href="'. base_url() .'admin/registro/estructuras/' . $usuaca->id_usuario. '">&#9998;</a>';
                                                echo '</span ">';

                                                echo '</button ">';

                                               

                                                echo '</div">';


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

                           
                        
                                        
                          
                      <!-- si si hay Registros --> 
                                    
                            <?php if (!$estruturas) { ?>
                              
                                <div id="alert" class="alert alert-danger" role="alert">
                                    
                                    <p class="alert-heading">No hay estructuras registradas</p>

                                </div>
                            <?php } ?>

                                
                            
                       


                        
                    

                       

               
                        

    </div>
</div>

</section>