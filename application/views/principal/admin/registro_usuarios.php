<div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Nuevo Usuario</h4>
                                    </div>
                                    <div class="card-body">
                                        <form id="formulario-registro" action="POST" >
                                            <div class="">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Nombre  Completo</label>
                                                    <input type="text" class="form-control" required id="nombre" placeholder="ingrese nombre"  name="nombre">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                                                    <input type="text" class="form-control" required id="cedula" placeholder="ingrese cedula"  name="cedula">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Email </label>
                                                    <input type="email" class="form-control" required  id="email" placeholder="ingrese email"  name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                                    <input type="password" required class="form-control" id="password" placeholder="Password">
                                                </div>
                                                
                                         
                                                <div class="form-group">
                                                    <label class="form-label">Rol <span class="text-red">*</span></label>
                                                    <select required  class="form-control form-select" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" id="id_rol">
                                                           
                                                    <?php  foreach ($roles as $rol ): ?>
                                                    <option label="<?php echo $rol->nombre ?>" value="<?php echo $rol->id_rol ?>"><?php echo $rol->nombre ?></option>
                                                    <?php  endforeach; ?>
                                                        </select>
                                                </div>
                                            </div>
                                            </div>
                                            <button class="btn btn-primary mt-4 mb-0">Guardar</button>
                                        </form>
                                    </div>
                                </div>