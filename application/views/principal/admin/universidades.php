        <!-- Row -->
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
                                                        <th class="wd-15p border-bottom-0">Razon Social</th>
                                                        <th class="wd-15p border-bottom-0">RIF</th>
                                                        <th class="wd-20p border-bottom-0">Actividad Economica</th>
                                                        <th class="wd-15p border-bottom-0">Sector de Especialización</th>
                                                        <th class="wd-10p border-bottom-0">Nombre representante</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($univerdidad as $empresa): ?>
                                                    <tr>
                                                        <td> <?php  echo $empresa->nombre_razon_social ?></td>
                                                        <td><?php  echo $empresa->rif ?></td>
                                                        <td><?php  echo $empresa->actividad_economica ?></td>
                                                        <td><?php  echo $empresa->productivo ?></td>
                                                        <td><?php  echo $empresa->noombre_representante ?> <?php  echo $empresa->apellido_representante ?></td>
                                                   
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