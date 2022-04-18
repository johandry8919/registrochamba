<section class="container">
    <div class="row">
        <div class="mb-2 col-12 col-md-6 text-wrap">

            <?php
            if (isset($usuarioacademico) and count($usuarioacademico) < '5') {
            ?>

                <div class="alert alert-info"> <strong>Importante:</strong> Solo podras agregar máximo 5 opciones.</div>

            <?php
            }
            ?>

        </div>
    </div>



    <div class="card">


        <div class="body">
            <div class="card-header">
                <div class="card-title">Formación Académica</div>
            </div>

            <div class="col-12 ">
                <?php
                if (isset($usuarioacademico) and count($usuarioacademico) < '5') {
                ?>

                    <div class="">
                        <a href="<?php echo base_url() ?>formacionacademicaform" class="btn btn-primary btn-block " style="margin: 20px auto;">Agregar</a>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="col-12 col-ms-8 col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Basic Edit Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Centro Educativo</th>
                                        <th>Nivel Educativo</th>
                                        <th>Período</th>

                                        <th name="bstable-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        if (isset($usuarioacademico) and $usuarioacademico != "") {
                                            $i = 1;
                                            foreach ($usuarioacademico as $key => $usuaca) {
                                                echo '<tr>';
                                                echo '<th scope="row">' . $i . '</th>';
                                                echo '<td>' . $usuaca->centro_educ . '</td>';
                                                echo '<td>' . $usuaca->nivel . ' - ' . $usuaca->nombre . '</td>';
                                                echo '<td>' . $usuaca->rango_fecha . '</td>';
                                                echo '<td name="bstable-actions>';
                                                echo '<div class="btn-list">';
                                                echo '<button type="button" class="btn btn-sm btn-primary ">';
                                                echo '<span class="fe fe-edit">';
                                                echo '<a class="text-white" href="' . base_url() . 'formacionacademicaform/' . $usuaca->id_usu_aca . '">Edit</a>';
                                                echo '</span ">';

                                                echo '</button ">';

                                                echo '<button  type="button" class="btn  btn-sm btn-danger ">';
                                                echo '<span class="fe fe-trash-2">';
                                                echo '<a class="text-white" href="' . base_url() . 'eliminaracademico/' . $usuaca->id_usu_aca . '">Delet</a>';
                                                echo '</span ">';

                                                echo '</button ">';

                                                echo '</div">';


                                                echo '</td>';
                                                echo '</tr>';
                                                $i++;
                                            }
                                        }
                                        ?>
                                       
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
</section>

