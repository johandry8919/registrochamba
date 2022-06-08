<div class="card">
    <div class="card-header">
        <div class="row clearfix">
            <div class="card-title">Oferta de empleo - <?php echo $oferta->nombre_razon_social?></div>


        </div>
    </div>


    <div class="card-body"></div>

    <ul class="demo-accordion accordionjs m-0">
        <li class="acc_section acc_active">
            <div class="acc_head">
                <h3>Datos de la oferta</h3>
            </div>
            <div class="acc_content" style="">
                <div class="">

                    <div class=" text-center card-title">PERFIL ACADEMICO</div>


             


                        <div class="row">


                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label class="form-label">Nivel de Estudios</label>

                                    <select readonly class="form-control" id="id_instruccion" name="id_instruccion">
                                        <option value="">Seleccione una opción</option>
                                        <!-- <option selected value='1'>Educación Básica Primaria</option>  -->
                                        <option <?php if (isset($oferta->id_nivel_instruccion) and $oferta->id_nivel_instruccion == '1') {
                                                    echo 'selected';
                                                } ?> value='1'>Educación Básica Primaria</option>
                                        <option <?php if (isset($oferta->id_nivel_instruccion) and $oferta->id_nivel_instruccion == '2') {
                                                    echo 'selected';
                                                } ?> value='2'>Educación Básica Secundaria</option>
                                        <option <?php if (isset($oferta->id_nivel_instruccion) and $oferta->id_nivel_instruccion == '3') {
                                                    echo 'selected';
                                                } ?> value='3'>Bachillerato / Educación Media</option>
                                        <option <?php if (isset($oferta->id_nivel_instruccion) and $oferta->id_nivel_instruccion == '4') {
                                                    echo 'selected';
                                                } ?> value='4'>Educación Técnico/Profesional</option>
                                        <option <?php if (isset($oferta->id_nivel_instruccion) and $oferta->id_nivel_instruccion == '5') {
                                                    echo 'selected';
                                                } ?> value='5'>Universidad</option>
                                        <option <?php if (isset($oferta->id_nivel_instruccion) and $oferta->id_nivel_instruccion == '1') {
                                                    echo 'selected';
                                                } ?> value='6'>Postgrado</option>
                                    </select>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <label class="form-label"> Profesión Oficio</label>
                                <div class="form-group">



                                    <select required class="form-control show-tick" id="id_profesion"
                                        name="id_profesion" readonly>
                                        <option value="">Seleccione una Profesión u Oficio</option>



                                        <?php if(isset($profesion_oficio)): ?>
                                        <?php foreach ($profesion_oficio as $key => $profesion):?>

                                        <?php  if($oferta->id_profesion_oficio == $profesion->id_profesion):?>



                                        <?php    echo "<option selected value='".$profesion->id_profesion."'>".$profesion->desc_profesion."</option>";     
                                               else:
                                                    echo "<option value='".$profesion->id_profesion."'>".$profesion->desc_profesion."</option>";
                                                endif;
                                           endforeach;
                                        endif;
                                    ?>
                                    </select>

                                </div>

                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Área de Formación</label>

                                    <select class="form-control" id="id_area_form" name="id_area_form" readonly>
                                        <option value="">Seleccione una opción</option>
                                        <?php
                                foreach ($areaform as $key => $value) {
                                    if ($value->id_area_form == $oferta->id_area_formacion) {
                                        echo "<option selected value='" . $value->id_area_form . "'>$value->nombre</option>";
                                    } else {
                                        echo "<option value='" . $value->id_area_form . "'>$value->nombre</option>";
                                    }
                                }
                                ?>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class=" row mt-5 ">
                            <div class="text-center card-title">DATOS DEL EMPLEO</div>
                            <div class=" col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Tiempo de experiencias</label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="fe fe-watch" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text"
                                            id="experiencia_laboral" maxlength="30" name="nombres"
                                            value="<?php echo $oferta->experiencia?>" placeholder="" required autofocus
                                            readonly>

                                    </div>

                                </div>



                            </div>
                            <!--col-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Cargo</label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-account" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text" id="cargo"
                                            maxlength="30" name="apellidos" value="<?php echo $oferta->cargo?>"
                                            placeholder="" required autofocus readonly>

                                    </div>

                                </div>



                            </div>

                            <!--col-->


                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label class="form-label">Sexo</label>

                                    <select class="form-control" id="sexo" name="sexo" readonly>
                                        <option value="">Seleccione una opción</option>
                                        <option <?php if($oferta->sexo=="Indiferente") echo "selected" ?>
                                            value="Indiferente">Indiferente</option>
                                        <option <?php if($oferta->sexo=="Masculino") echo "selected" ?>
                                            value="Masculino">Masculino</option>
                                        <option <?php if($oferta->sexo=="Femenino") echo "selected" ?> value="Femenino">
                                            Femenino</option>
                                    </select>

                                </div>
                            </div>





                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Descripcion de la ofera</label>

                                    <textarea readonly class="form-control"
                                        id="descripcion_oferta"><?php echo $oferta->descripcion_oferta?> </textarea>

                                </div>



                            </div>

                            <!--col-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Edad</label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="fe fe-calendar" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text" readonly
                                            id="edad" maxlength="2" name="edad" value="<?php echo $oferta->edad?>"
                                            placeholder="edad" required autofocus>

                                    </div>

                                </div>
                            </div>
                            <!--col-->
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-label">Cantidad de oferta</label>
                                    <div class="wrap-input100 validate-input input-group"
                                        data-bs-validate="Valid email is required: ex@abc.xyz">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="mdi mdi-account" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 border-start-0 ms-0 form-control" type="text"
                                            id="cantidad_oferta" maxlength="30" name="nombres"
                                            value="<?php echo $oferta->cantidad_oferta?>" placeholder="Cantidad"
                                            required autofocus readonly>

                                    </div>

                                </div>



                            </div>

                            <!--col-->


                        </div>
                        <!--row-->


                </div>



            </div>
        </li>
        <li class="acc_section">
            <div class="acc_head">
                <h3>Chambistas Postulados</h3>
            </div>
            <div class="acc_content" style="display: none;">

            <?php if(empty($chambista_ofertas)): ?> 
            <h3>No hay chambista postulados </h3>
            <?php endif; ?> 

            
            <div class="table-responsive">
                            <table class="table text-nowrap  key-buttons" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th name="bstable-actions">Acciones</th>
                                        <th class="wd-15p border-bottom-0">Nombre</th>
                                        <th class="wd-15p border-bottom-0">Apellido</th>
                                        <th class="wd-20p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Profesión/Oficio</th>

                                    
                                   
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($chambista_ofertas as $oferta): ?>
                                    <tr>
                                        <td>
                                            <div class="btn-list">
                                                <button type="button"  id="eliminar-chambista" class="btn btn-sm btn-danger "
                                                data-id_oferta_chambista="<?php  echo $oferta->id_oferta_chambista ?>"
                                                >
                                                <i class="fe fe-trash-2"></i>
                                                </button>

                                               
                                            </div>
                                            
                                        </td>
                                        <td> <?php  echo $oferta->nombres ?></td>
                                        <td><?php  echo $oferta->apellidos ?></td>
                                        <td><?php  echo $oferta->email ?></td>
                                        <td><?php  echo $oferta->desc_profesion ?></td>                                  

                                                                 

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

  

            </div>
        </li>
        <li class="acc_section">
            <div class="acc_head">
                <h3>Postular Chambista</h3>
            </div>
            <div class="acc_content" style="display: none;">



                <div class="row  justify-content-center  mt-2 mb-2">
                    <div class="col-lg-auto center">
                        <form id="form-buscar" action> 

					<div class="iti iti--allow-dropdown">
				
						<input
							id="cedula"
							name="cedula"
							type="text"
							autocomplete="off"
							data-intl-tel-input-id="0"
                            placeholder="Ingrese cedula del chabista"
                            required 
                            
						/>
					</div>

					<button class="btn btn-info py-1 px-4 mb-1">Buscar</button>
                </form>
				</div>
              
            
                </div>

            </div>
        </li>

    </ul>



</div>

    <!-- MODAL EFFECTS -->
    <div class="modal fade" id="modalchambista">
        <div class="modal-dialog modal-dialog-centered text-center modal-lg " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Datos del Chambista</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                             
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                    </a>
                                    <input readonly
                                     class="input100 border-start-0 ms-0 form-control" type="text" id="nombre" maxlength="200" name="nombre" value="" placeholder="NOMBRE" required autofocus>
                                </div>
                            </div>

                        </div>
                        <div class="col-6">
                                 <div class="form-group">
                               
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="mdi mdi-account" aria-hidden="true"></i>
                                    </a>
                                    <input readonly
                                     class="input100 border-start-0 ms-0 form-control" type="text" id="apellido" maxlength="200" name="apellido" value="" placeholder="APELIDO" required autofocus>
                            
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                        <label>Cedula</label>
                                    <input readonly
                                     class="input100 border-start-0 ms-0 form-control" type="text" id="ccedula" maxlength="200" name="cedula" value="" placeholder="Cedula" required autofocus>
                            
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                        <label>Fecha de Nacimiento</label>
                                    <input readonly
                                     class="input100 border-start-0 ms-0 form-control" type="text" id="fecha_nac" maxlength="200" name="fecha_nac" value="" placeholder="fecha_nac" required autofocus>
                            
                            </div>

                        </div>
                      

                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                             
                                <label>Estado</label>
                                <input readonly
                                 class="input100 border-start-0 ms-0 form-control" type="text" id="estado" maxlength="200" name="estado" value="" placeholder="Estado" required autofocus>
                        
                        </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">

                                        <label>Municipio</label>
                                    <input readonly
                                     class="input100 border-start-0 ms-0 form-control" type="text" id="municipio" maxlength="200" name="municipio" value="" placeholder="Municipio" required autofocus>
                            
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="form-group">
                             
                                <label>Parroquia</label>
                                <input readonly
                                 class="input100 border-start-0 ms-0 form-control" type="text" id="parroquia" maxlength="200" name="parroquia" value="" placeholder="Parroquia" required autofocus>
                        
                        </div>
                        </div>

                    </div>

                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                             
                                <label>Celular</label>
                                <input readonly
                                 class="input100 border-start-0 ms-0 form-control" type="text" id="celular" maxlength="200" name="celular" value="" placeholder="celular" required autofocus>
                        
                        </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">

                                        <label>Tlf Local</label>
                                    <input readonly
                                     class="input100 border-start-0 ms-0 form-control" type="text" id="tlflocal" maxlength="200" name="tlflocal" value="" placeholder="tlflocal" required autofocus>
                            
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="form-group">
                             
                                <label>Situación Laboral</label>
                                <input readonly
                                 class="input100 border-start-0 ms-0 form-control" type="text" id="laboral" maxlength="200" name="laboral" value="" placeholder="laboral" required autofocus>
                        
                        </div>
                        </div>

                    </div>
              
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn-postular">Postular</button> <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="id_usario_chambista" >
    <input type="hidden" name="" id="id_oferta"  value="<?php echo $id_oferta; ?>" >
    