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
                                                    <select required  class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" id="id_rol">
                                                            <option label="Select" value="2">Administrador</option>
                                                     
                                                        </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;">
                                                            <span class="selection">
                                                                <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-lfc9-container">
                                                                    <span class="select2-selection__rendered" id="select2-lfc9-container" title="Country">Admin</span>
                                                                    <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span>
                                                                    <span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            </div>
                                            <button class="btn btn-primary mt-4 mb-0">Guardar</button>
                                        </form>
                                    </div>
                                </div>