<section class="container">


    <div class="card">
        <div class="card-body">
            <div class="card-header h2">Registro de Estructuras</div>





            <div class="table-responsive">
                <table class="table table-bordered border text-nowrap text-center mb-0" id="basic-edit">
                    <thead>
                        <tr>
                            <th name="bstable-actions">Editar</th>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Correo Eletronico</th>
                            <th>Tipo de estructura</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Parroquia</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if (isset($estruturas) and $estruturas) {
                            $i = 1;
                            foreach ($estruturas as $key => $usuaca) {
                                echo '<tr>';
                                echo '<td >';

                                echo '<div class="btn-list">';
                                echo '<button type="button" class="btn btn-sm btn-primary ">';
                                echo '<span class="fs-6">';
                                echo '<a class="text-white" href="' . base_url() . 'admin/registro/estructuras/' . $usuaca->id_estructura . '">&#9998;</a>';
                                echo '</span ">';

                                echo '</button ">';



                                echo '</div">';


                                echo '</td>';
                                echo '<td scope="row">' . $i . '</td>';
                                echo '<td>' . $usuaca->nombre . '</td>';
                                echo '<td>' . $usuaca->apellidos . '</td>';
                                echo '<td>' . $usuaca->cedula . '</td>';


                                echo '<td>' . $usuaca->tlf_celular . '</td>';


                                echo '<td>' . $usuaca->email . '</td>';
                                echo '<td>' . $usuaca->tipo_estructura . '</td>';
                                echo '<td>' . $usuaca->estado . '</td>';
                                echo '<td>' . $usuaca->municipio . '</td>';
                                echo '<td>' . $usuaca->parroquia . '</td>';
                                echo '</tr>';
                                $i++;
                            }
                        }
                        ?>



                    </tbody>
                </table>
            </div>





            <!-- si si hay Registros -->

            <?php if (!$estruturas) { ?>

                <div id="alert" class="alert alert-danger" role="alert">

                    <p class="alert-heading">No hay estructuras registradas</p>

                </div>
            <?php } ?>














        </div>
    </div>

</section>