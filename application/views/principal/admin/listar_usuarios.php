        <div class="row row-sm ">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header   justify-content-center">
                          
                                            <div class="form-group">
                                              <label for="" class="form-label">Rol</label>

                                                    <select class="form-control" id="tipo_rol">
                                                        <option value="admin" <?php if(isset($_GET['p']) && $_GET['p'] =='admin') echo 'selected' ?>>Admin</option>
                                                        <option value="estructura" <?php if(isset($_GET['p']) && $_GET['p'] =='estructura') echo 'selected' ?>>Estructura</option>
                                                    </select>

                                            
                                            </div>

                                   
                                    </div>
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Editar</th>
                                        <th class="wd-15p border-bottom-0">Nombre</th>
                                        <th class="wd-15p border-bottom-0">Correo</th>
                                        <th class="wd-20p border-bottom-0">Rol</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <tr>
                                            <td>

                                         
                                              <input id="edit_rol" type="button"  class=" btn btn-sm btn-primary " data-bs-target="#modalQuill" data-bs-toggle="modal" value="Editar" name="edit" onclick="Editar(<?php echo $usuario->id_usuarios_admin?>)">

                                              <div class="modal fade" id="modalQuill" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header pd-20">
                        <h6 class="modal-title">Editar roles</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
                    </div>


                    <form  method="POST" >
                    <div class="card">

                        <div class="card-body" id="body_card">

                        </div>




                        <button type="submit" id="guarda_usuario" class="btn btn-primary">Guardar</button> 
                    </div>
                    </form>


                    <div class="modal-footer pd-20"><button class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

</input>

                                            </td>

                        </div>
                        </td>
                        <td> <?php echo $usuario->nombre ?></td>
                        <td><?php echo $usuario->email ?></td>
                        <td><?php echo $usuario->nombre_rol ?></td>


                        </tr>

                           <!-- Modal -->
     
                    <?php endforeach ?>
                    </tbody>
                    </table>

                    
                    </div>
                </div>
                <div class="card-body" id="card-body">
            </div>

            

            

            </div>

        </div>






     
        </div>
        <!-- End Row -->