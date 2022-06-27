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
                                        <h3 class="card-title">Empresas / Entes</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                    <th name="bstable-actions">Acciones</th>
                                                        <th class="wd-15p border-bottom-0">Razon Social</th>
                                                        <th class="wd-15p border-bottom-0">RIF</th>
                                                        <th class="wd-20p border-bottom-0">Actividad Economica</th>
                                                        <th class="wd-15p border-bottom-0">Sector Economino</th>
                                                        <th class="wd-10p border-bottom-0">Nombre representante</th>
                                                        <th class="wd-10p border-bottom-0">Estado</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($empresas as $empresa): ?>
                                                    <tr>
                                                    <td>
                                                        <div class="btn-list">
                                                        <button type="button" class="btn btn-sm btn-primary ">
                                                        <span class="fs-6">
                                                        <a class="text-white" href="<?php base_url()?>registro/empresas/<?php echo $empresa->id_empresas?>">&#9998;</a>
                                                        </span>
                                                        </button>

                                                        <button type="button" class="btn btn-sm btn-success ">
                                                    <span class="fs-6">
                                                
                                                        <a class="text-white"
                                                            href="<?php base_url()?>usuario/<?php echo $empresa->id_empresas?>">
                                                            <i
                                                            data-bs-toggle="tooltip" data-bs-original-title="Ver oferta "class="side-menu__icon fe fe-eye"></i>
                                                            
                                                        </a>
                                                    </span>
                                                </button>
                                                        <button type="button" class="btn btn-sm btn-success ">
                                                    <span class="fs-6">
                                                        <a class="text-white"
                                                            href="<?php base_url()?>nueva_oferta/<?php echo $empresa->id_empresas?>">
                                                            <i class="side-menu__icon fe fe-plus">Nueva oferta</i>
                                                            
                                                        </a>
                                                    </span>
                                                </button>
                                                        </div>
                                                        </td>
                                                        <td> <?php  echo $empresa->nombre_razon_social ?></td>
                                                        <td><?php  echo $empresa->rif ?></td>
                                                        <td><?php  echo $empresa->actividad_economica ?></td>
                                                        <td><?php  echo $empresa->productivo ?></td>
                                                        <td><?php  echo $empresa->noombre_representante ?> <?php  echo $empresa->apellido_representante ?></td>
                                                        <td><?php  echo $empresa->nombre_estado?> </td>
                                                      
                                                   
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   

            
                        <!-- End Row -->