        <!-- Row -->
        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Roles</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                    <th class="wd-15p border-bottom-0">Acciones</th>
                                                        <th class="wd-15p border-bottom-0">Nombre</th>
                                                        <th class="wd-15p border-bottom-0">Perfil</th>
                                                    
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($roles as $rol): ?>
                                                    <tr>
                                                    <td>
                                            <div class="btn-list">
                                                <button type="button" id="btn-editar" data-id="<?php  echo $rol->id_rol ?>" class="btn btn-sm btn-primary btn-editar ">
                                                    <span class="">
                                                        Editar
                                                    </span>
                                                </button>

                                              
                                            </div>
                                            
                                        </td>
                                                      
                                                        <td> <?php  echo $rol->nombre ?></td>
                                                        <td><?php  echo $rol->perfil ?></td>
                                                   
                                                   
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


                        <!-- Button trigger modal -->


                        <div class="modal fade" id="modalrol">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo modal-lg">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Roles</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                      <th scope="col">Acciones</th>
                                                      <th scope="col">Menu</th>
                                                      <th scope="col">Sub Menu</th>
                                                      <th scope="col">Handle</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>Otto</td>
                                                      <td>@mdo</td>
                                                    </tr>
                                          
                                                  </tbody>
                                            </table>
                                          </div>
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Save changes</button> <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
