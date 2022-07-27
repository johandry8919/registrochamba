<div class="row clearfix">
    <div class="col-xs-4">
        <div class="card">
            <div class="card-header">
                <div class="row clearfix">
                    <div class="card-title"> Estructura/Brigada - (Codigo-<?php echo $estructura->codigo ?>)


                    </div>
                </div>
            </div>


            <div class="card-body">




                <form id="formulario-registro">

                    <div class="row">
                        <div class="col-md-3 ">


                            <div class="form-group">
                                <label class="form-label"> Estructura </label>
                                <div class="form-line">
                                    <input class="form-control" placeholder="" value="<?php echo $estructura->nombre_rol ?>" readonly>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Nombre Estrutura / Brigada</label>
                                <input class="input100 border-start-0 ms-0 form-control" type="text" id="nombre_brigada" maxlength="250" name="nombre_brigada" value="<?php echo $estructura->nombre_brigada ?>" readonly placeholder="Brigada" required autofocus>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">sector/ comunidad</label>
                                <input type="text" class="form-control" id="nombre_comunidad" value="<?php echo $estructura->nombre_sector ?>" readonly>


                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label class="form-label"> Dirección Especifica</label>
                                <div class="form-line">
                                    <input maxlength="255" rows="4" class="form-control no-resize zindex" class="direccion" name="direccion" id="direccion" maxlength="250" placeholder="Por favor indica donde resides..." data-parsley-error-message="Este campo es requerido" required value="<?php echo $estructura->direccion ?>" readonly autofocus />
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Estado</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre_comunidad" value="<?php echo $estructura->nombre_estado ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Municipio</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre_comunidad" value="<?php echo $estructura->municipio ?>" readonly>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Parroquia</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre_comunidad" value="<?php echo $estructura->parroquia ?>" readonly>
                            </div>

                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <div class="row clearfix">
            <div class="card-title"> (<?php echo $estructura->nombre_brigada ?> - <?php echo $estructura->nombre_rol ?>) <a href="<?php echo base_url('admin/registro/integrante-estructura') . '/' . $estructura->id_brigada ?>" class="ml-10 btn btn-primary">+ Agregar integrante</a></div>
        </div>
    </div>


    <div class="card-body">


        <div class="table-responsive">
            <table class="table table-bordered border text-nowrap text-center mb-0" id="basic-datatable">
                <thead>
                    <tr>
                        <th name="bstable-actions">Acciones</th>
                     
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Responsabilidad</th>

                    </tr>
                </thead>
                <tbody>

                
             
                    <?php foreach ($integrantes as $integrante) : ?>
                        <tr>
                            <td>
                         <a class="text-white  btn btn-primary sm-btn btn-sm" href="  <?php echo base_url().'admin/registro/estructuras/'.$integrante->id_estructura ?>"> &#9998;</a>
                         <button type="button" class="btn btn-sm btn-danger btn-eliminar-integrante" data-id="<?php echo $integrante->id_estructura?>">
                                              <i class="side-menu__icon fe fe-trash-2"></i>
                                              </button>
                        
                        </td>
                            <td><?php echo $integrante->nombre ?></td>
                            <td><?php echo $integrante->apellidos ?></td>
                            <td><?php echo $integrante->cedula ?></td>
                            <td><?php echo $integrante->tlf_celular ?></td>
                            <td><?php echo $integrante->reponsabilidad ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if(empty ($integrantes)) echo "<tr>Esta brigada no tiene integrantes registrados </tr>" ?>
                </tbody>
            </table>
        </div>
    </div>

</div>