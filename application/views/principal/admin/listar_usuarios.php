        <!-- Row -->
        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Usuarios</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Nombre</th>
                                                        <th class="wd-15p border-bottom-0">Correo</th>
                                                        <th class="wd-20p border-bottom-0">Rol</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($usuarios as $usuario): ?>
                                                    <tr>
                                                        <td> <?php  echo $usuario->nombre ?></td>
                                                        <td><?php  echo $usuario->email ?></td>
                                                        <td>Admin</td>
                                                      
                                                   
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