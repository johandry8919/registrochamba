        <!-- Row -->
        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header   justify-content-between">
                                        <h3 class="card-title">Roles</h3>
                                            <div class="form-group">
                                              <label for="" class="form-label">Rol</label>

                                                    <select class="form-control" id="tipo_rol">
                                                        <option value="admin"  <?php if(isset($_GET['p']) && $_GET['p'] =='admin') echo 'selected' ?>>Admin</option>
                                                        <option value="estructuras" <?php if(isset($_GET['p']) && $_GET['p'] =='estructuras') echo 'selected' ?>>Estructura</option>
                                                    </select>

                                            
                                            </div>

                                        <button type="button" class="ml-5 btn btn-info nuevo_rol"
                                        <?php if(isset($_GET['p']) && $_GET['p'] =='estructuras') echo 'disabled' ?>
                                        >Nuevo rol</button> 
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
                                                <button type="button" id="btn-editar<?php  echo $rol->id_rol ?>" data-id_rol="<?php  echo $rol->id_rol ?>" class="btn btn-sm btn-primary btn-editar "
                                                
                                           
                                                
                                                >
                                                    <span class="">
                                                        Menu rol
                                                    </span>
                                                </button>

                                              
                                                <button type="button" id="btn-permisos<?php  echo $rol->id_rol ?>" data-id_rol="<?php  echo $rol->id_rol ?>" class="btn btn-sm btn-success btn-permisos ">
                                                    <span class="">
                                                        Permisos
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


                        <div class="modal fade" id="modal_nuevo_rol">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo modal-lg">
                                    <form id="form-nuevo-rol">
                                    <div class="modal-header justify-content-between row">
                                        
                                        <h6 class="modal-title">Nuevo rol</h6>
                                        
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Nombre rol</label>

                                                <input type="text" class="form-control"  placeholder="nombre rol" id="nombre_rol">
                                            </div>
                                        </div>
                                      </div>
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary   btn-guardar-rol">Guardar</button> 
                                        
                                        
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                    </div>
                                    </form>

                                </div>
                            </div>
     


                            <div class="modal fade" id="modalrol">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content modal-content-demo modal-lg">
                                        <form id="form-menu">
                                        <div class="modal-header justify-content-between row">
                                            
                                            <h6 class="modal-title">Roles</h6>
                                            
                                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table" id="tabla-roles">
                                                    <thead>
                                                        <tr>
                                                          <th scope="col">Permitir</th>
                                                          <th scope="col">Menu</th>
                                                          <th scope="col">Sub Menu</th>
                                               
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                   
                                                      </tbody>
                                                </table>
                                              </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-guardar-menu">Guardar</button> 
                                            
                                            
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                        </div>
                                        </form>
    
                                    </div>
                                </div>


                                <div class="modal fade" id="modalpermisos">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content modal-content-demo modal-lg">
                                            <form id="form-menu">
                                            <div class="modal-header justify-content-between row">
                                                
                                                <h6 class="modal-title">Permisos</h6>
                                                
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table" id="tabla-permisos">
                                                        <thead>
                                                            <tr>
                                                              <th scope="col">Guardar/Crear</th>
                                                              <th scope="col">Editar/modificar</th>
                                                              <th scope="col">Vincular</th>
                                                              <th scope="col">Eiminar</th>
                                                   
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                        
                                                       
                                                          </tbody>
                                                    </table>
                                                  </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-guardar-permiso">Guardar</button> 
                                                
                                                
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                            </div>
                                            </form>
        
                                        </div>
                                    </div>       
                    <input type="hidden" id="id_rol">