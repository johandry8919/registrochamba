        <!-- Row -->

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ofertas</h3>

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
                                        <th class="wd-15p border-bottom-0">Profesión Oficio</th>
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
                                                        <a class="text-white"
                                                            href="<?php base_url()?>editarOferta/<?php echo $oferta->id_oferta?>">&#9998;</a>
                                                    </span>
                                                </button>

                                                <button type="button" class="btn btn-sm btn-success ">
                                                    <span class="fs-6">
                                                        <a class="text-white"
                                                            href="<?php base_url()?>ver_oferta/<?php echo $oferta->id_oferta ?>">
                                                            <i class="side-menu__icon fe fe-eye"></i>
                                                            
                                                        </a>
                                                    </span>
                                                </button>
                                            </div>
                                            
                                        </td>
                                        <td> <?php  echo $oferta->nombre_razon_social ?></td>
                                        <td><?php  echo $oferta->desc_profesion ?></td>
                                        <td><?php  echo $oferta->formacion ?></td>
                                        <td><?php  echo $oferta->descripcion_oferta ?></td>    
                                        <td><?php  echo $oferta->estatus?> </td>                             
                                        <td><?php  echo $oferta->cantidad_oferta?> </td>
                                      

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id_rol" id="id_rol" value="<?php if(isset($id_rol)){
        echo $id_rol;
    }?>">



        <!-- End Row -->