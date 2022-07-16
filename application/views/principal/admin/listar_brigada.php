

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de brigada</h3>

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
                                        <th class="wd-15p border-bottom-0">Nombre brigada</th>
                                        <th class="wd-15p border-bottom-0">Nombre sector</th>
                                        <th class="wd-20p border-bottom-0">Area de formación</th>
                                        <th class="wd-15p border-bottom-0">Descripcion</th>
                                        <th class="wd-10p border-bottom-0">Estatus</th>
                                   
                                   

                                   
                                    </tr>
                                </thead>
                                <?php if(isset($brigada)):?>
                                    <tbody>
                                    
                                        <?php foreach ($brigada as $brigadas):?>
                                        <tr>
                                            <td>
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-sm btn-primary ">
                                                    <span class="fs-6">
                                                        <a class="text-white"
                                                            href="<?php echo base_url()?>admin/registro/integrante-estructura/<?php echo $brigadas->id_brigada?>">&#9998;</a>
                                                    </span>
                                                </button>
<!-- 
                                                <button type="button" class="btn btn-sm btn-success ">
                                                    <span class="fs-6">
                                                        <a class="text-white"
                                                            href="<?php echo base_url().ruta_actual()?>/ver_oferta/<?php echo $brigadas->id_brigada ?>">
                                                            <i class="side-menu__icon fe fe-eye"></i>
                                                            
                                                        </a>
                                                    </span>
                                                </button> -->
                                            </div>
                                            
                                        </td>
                                        <td> <?php  if(isset($brigadas->nombre_brigada)){
                                            echo $brigadas->nombre_brigada;
                                        } ?></td>
                                        <td><?php  echo $brigadas->nombre_sector ?></td>
                                        <td><?php  echo $brigadas->nombre_brigada ?></td>
                                        <td><?php  echo $brigadas->nombre_brigada ?></td>    
                                        <td><?php  echo $brigadas->nombre_brigada?> </td>                             
                                  
                                      

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <?php endif;?>
                            </table>
                        </div>
                    </div>
         
                </div>
            </div>

            
        </div>




        <!-- End Row -->