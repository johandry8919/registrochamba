        <!-- Row -->
              <?php if($this->session->flashdata('mensajeerror')){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('mensajeerror'); ?>
               
                    </div>
                </div>
                </div>
                <br>
        <?php }?> 
     <?php  ?>
       

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ofertas de estudios</h3>

                    </div>
                    <div class="card-body">
                        <br>
                        <div class="row">
                        <div class="col-4">
                            
                        <div class="form-group">
                            <div class="form-line">
                            
                          
                            </div>
                        </div>
                        </div>

                        </div>



                        <div class="table-responsive">
                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th name="bstable-actions">Acciones</th>
                                        <th class="wd-15p border-bottom-0">Razon Social</th>
                                        <th class="wd-15p border-bottom-0">Mencion</th>
                                        <th class="wd-20p border-bottom-0">Area de formación</th>
                                        <th class="wd-15p border-bottom-0">Descripcion</th>
                                        <th class="wd-10p border-bottom-0">Estatus</th>
                                        <th class="wd-10p border-bottom-0">cantidad disponible</th>
                                   

                                   
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
        
                                    foreach ($ofertas as $oferta): ?>
                                    <tr>
                                        <td>
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-sm btn-primary ">
                                                    <span class="fs-6">
                                                        <a class="text-white"  data-bs-toggle="tooltip" data-bs-original-title="Editar oferta" 
                                                            href="<?php echo base_url().ruta_actual()?>/editaOfertas/<?php echo $oferta->id_solicitud?>">&#9998;</a>
                                                    </span>
                                                </button>

                                                <button type="button" class="btn btn-sm btn-success ">
                                                    <span class="fs-6">
                                                        <a class="text-white"     data-bs-toggle="tooltip" data-bs-original-title="Ver oferta" 
                                                            href="<?php echo  base_url().ruta_actual()?>/ver_ofertas/<?php echo $oferta->id_solicitud ?>">
                                                            <i class="side-menu__icon fe fe-eye"></i>
                                                            
                                                        </a>
                                                    </span>
                                                </button>
                                            </div>
                                            
                                        </td>
                                        <td> <?php  echo $oferta->nombre_razon_social ?></td>
                                        <td><?php  echo $oferta->mencion ?></td>
                                        <td><?php  echo $oferta->formacion ?></td>
                                        <td><?php  echo $oferta->descripcion_solicitud ?></td>    
                                        <td><?php  echo $oferta->estatus?> </td>                             
                                        <td><?php  echo $oferta->cupos_disponibles?> </td>
                                      

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                            <?php if(!isset($ofertas[0]->id_solicitud)):?>
                        <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        No hay oferta que mostrar 
               
                    </div>
                </div>
                </div>
            <?php endif;?>
                    </div>
                </div>
            
            </div>
        </div>



        <!-- End Row -->