<div class="card">
	<div class="card-body">
		<h5 class="card-title">Cambiar claves  Estructura</h5>

	
			<div class="row justify-content-center">
				<div class="col-lg-auto center">
                        <form id="form-buscar" action> 

					<div class="iti iti--allow-dropdown">
				
						<input
							id="cedula"
							name="cedula"
							type="text"
							autocomplete="off"
							data-intl-tel-input-id="0"
                            placeholder="Ingrese cedula"
                            required 
						/>
					</div>

					<button class="btn btn-primary py-1 px-4 mb-1">Buscar</button>
                </form>
				</div>
			</div>
	

            <hr>
            <br><br>
          <div id="tabla-chambista">
            <div>
			<div class="form-group">
                                <div class=" validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="password" id="clave_actual" name="clave_actual" placeholder="Contraseña actual" maxlength="16" data-parsley-error-message="Este campo es requerido" required autofocus>
                                    <?php echo form_error('clave_actual'); ?>
                                </div>


                            </div>



                            <div class="form-group">
                                <div class=" validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" data-parsley-error-message="Este campo es requerido" placeholder="Contraseña Nueva" maxlength="16" required autofocus>
                                    <?php echo form_error('password'); ?>

                                </div>

                                <div class="form-group mt-2">
                                    <div class=" validate-input input-group" id="Password-toggle">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="password" id="new_password" name="new_password" maxlength="16" placeholder="Repetir Contraseña Nueva" data-parsley-error-message="Este campo es requerido" required autofocus>
                                        <?php echo form_error('new_password'); ?>
                                    </div>


                                </div>

                                <div class="col-12 mt-3 mb-6">

                                    <button id="boton" onclick="alert('hola')" type="botton" class="login100-form-btn btn-primary">
                                        Guardar
                                    </button>
                                </div>


                                <input type="hidden" name="id_admin" id="id_admin" value="<?php if(isset($id_admin)){echo $id_admin;}
                                ?>">  




                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
            </div>

          </div>
	</div>
</div>
